<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Divisi;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DivisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:divisi-list', ['only' => 'index']);
        $this->middleware('permission:divisi-create', ['only' => ['create','store']]);
        $this->middleware('permission:divisi-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:divisi-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data['page_title'] = 'Divisi';
        $data['divisis'] = Divisi::orderBy('id', 'desc')->get();

        return view('divisis.index', $data);
    }

    public function create()
    {
        $data['page_title'] = 'Add Divisi';

        return view('divisis.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => ['required', 'string', 'max:3', 'unique:divisis,code'],
            'name' => ['required', 'string', 'max:20', 'unique:divisis,name'],
            'description' => ['nullable', 'min:3'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);
        $divisi = new Divisi();
        $divisi->code = $request->get('kode');
        $divisi->name = $request->get('name');
        $divisi->description = $request->get('description');
        $divisi->save();

        return redirect()->route('divisis.index')->with(['success' => 'Divisi added successfully!']);
    }

    public function edit($id)
    {
        $data['page_title'] = 'Edit Divisi';
        $data['divisi'] = Divisi::findOrFail($id);

        return view('divisis.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => ['required', 'string', 'max:5', 'unique:divisis,kode,' . $id],
            'name' => ['required', 'string', 'max:20', 'unique:divisis,name,' . $id],
            'description' => ['nullable', 'min:3'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $divisi = Divisi::findOrFail($id);
        $divisi->kode = $request->get('kode');
        $divisi->name = $request->get('name');
        $divisi->description = $request->get('description');
        $divisi->save();

        return redirect()->route('divisis.index')->with(['success' => 'Divisi updated successfully!']);
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $divisi = Divisi::findOrFail($id);

            // WorkOrder::where('divisi_id', $id)->update(['divisi_id' => null]);
            // Asset::where('divisi_id', $id)->update(['divisi_id' => null]);
            $divisi->delete();
        });
        
        Session::flash('success', 'Divisi deleted successfully!');
        return response()->json(['status' => '200']);
    }
}
