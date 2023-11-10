@extends('layouts.app')

@section('breadcumb')
    <li class="breadcrumb-item"><a href="{{ route('master-data.index') }}">Master Data</a></li>
    <li class="breadcrumb-item active">Roles</li>
@endsection

@section('style')
    
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <span class="tx-bold text-lg">
                                    <i class="icon ion ion-ios-speedometer text-lg"></i>
                                    Roles
                                </span>
                            </div>

                            @can('role-create')
                            <div class="col-6 d-flex justify-content-end">
                                <a href="{{ route('roles.create') }}" class="btn btn-md btn-info">
                                    <i class="fa fa-plus"></i> 
                                    Role
                                </a>
                            </div>
                            @endcan
                        </div>

                        @include('components.flash-message')

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="RoleTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        @can('role-detail')
                                        <th>Permission</th>
                                        @endcan
                                        @if(auth()->user()->can('role-delete') || auth()->user()->can('role-edit'))
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <button onclick="detailModal('Permission User', 'roles/' + {{ $role->id }}, 'small')" class="btn btn-md btn-primary">
                                                <i class="fa fa-info-circle"></i>Show Permissions
                                            </button>
                                        </td>
                                        @if(auth()->user()->can('role-delete') ||
                                        auth()->user()->can('role-edit'))
                                        <td>
                                            <div class="btn-group">
                                                @can('role-edit')
                                                <a href="{{ route('roles.edit', $role->id) }}"
                                                    class="btn btn-warning text-white">
                                                    <i class="far fa-edit"></i>
                                                    Edit
                                                </a>
                                                @endcan

                                                @can('role-delete')
                                                <a href="#" class="btn btn-danger f-12" onclick="modalDelete('Role', '{{ $role->name }}', 'roles/' + {{ $role->id }}, '/roles/')">
                                                    <i class="far fa-trash-alt"></i>
                                                    Delete
                                                </a>
                                                @endcan
                                            </div>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- Zero Configuration  Ends-->
        </div>
    </div> <!-- /.container-fluid -->


    @foreach ($roles as $role)
    <div class="modal fade w-500" id="showModal{{ $role->id }}" tabindex="-1" role="dialog"
        aria-labelledby="ShowPermission" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Permission {{ $role->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <ul>
                        @foreach ($role->permissions as $permission)
                        <li>{{ $loop->iteration . '. ' . $permission->name }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</section>
@endsection

@section('script')

@endsection