<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role-list', ['only' => 'index']);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data['page_title'] = 'Roles';
        $data['roles'] = Role::orderby('id', 'asc')->get();
        
        return view('roles.index', $data);
    }

    public function create()
    {
        $data['page_title'] = 'Add Roles';
        $data['permissions'] = Permission::all();

        return view('roles.create',$data);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ]);

        $role = new Role();
        $role->name = $validateData['name'];

        $role->save();
        $role->syncPermissions($validateData['permissions']);

        return redirect()->route('roles.index')->with('success','Role created successfully');
    }

    public function show($id)
    {
        $data['role'] = Role::findOrFail($id);

        return view('roles.show', $data);
    }

    public function edit($id)
    {
        $data['page_title'] = 'Edit Roles';
        $data['role'] = Role::find($id);
        $data['permissions'] = Permission::get();
        $data['rolePermissions'] = DB::table("role_has_permissions")
        ->where("role_has_permissions.role_id",$id)
        ->pluck('role_has_permissions.permission_id')
        ->all();

        return view('roles.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:roles,name,'.$id,
            'permissions' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $validateData['name'];

        $role->save();
        $role->syncPermissions($validateData['permissions']);

        return redirect()->route('roles.index')->with('success','Role updated successfully');
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $role = Role::findOrFail($id);
            $role->delete();
        });
        
        Session::flash('success', 'Role deleted successfully!');
        return response()->json(['status' => '200']);
    }
}
