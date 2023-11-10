@extends('layouts.app')

@section('breadcumb')
    <li class="breadcrumb-item"><a href="{{ route('master-data.index') }}">Master Data</a></li>
    <li class="breadcrumb-item active">Divisi Assets</li>
@endsection

@section('style')

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <span class="tx-bold text-lg">
                                    <i class="icon ion ion-ios-speedometer text-lg"></i>
                                    Divisi
                                </span>
                            </div>

                            @if (auth()->user()->can('divisi-list'))
                            <div class="col-6 d-flex justify-content-end">
                                <a href="{{ route('divisis.create') }}" class="btn btn-md btn-info">
                                    <i class="fa fa-plus"></i>
                                    Divisi
                                </a>
                            </div>
                            @endif
                        </div>

                        @include('components.flash-message')

                    </div>

                    <div class="card-body">
                        <table id="divisiTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    @if(auth()->user()->can('divisi-delete') || auth()->user()->can('divisi-edit'))
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($divisis as $divisi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $divisi->kode }}</td>
                                    <td>{{ $divisi->name }}</td>
                                    <td>{{ $divisi->description ?? "N/A"}}</td>
                                    @if(auth()->user()->can('divisi-delete') || auth()->user()->can('divisi-edit'))
                                    <td>
                                        <div class="btn-group">
                                            @if (auth()->user()->can('divisi-edit'))
                                            <a href="{{ route('divisis.edit', $divisi->id) }}"
                                                class="btn btn-warning text-white">
                                                <i class="far fa-edit"></i>
                                                Edit
                                            </a>
                                            @endif

                                            @if (auth()->user()->can('divisi-delete'))
                                            <a href="#" class="btn btn-danger f-12" onclick="modalDelete('Divisi', '{{ $divisi->name }}', 'divisis/' + {{ $divisi->id }}, `{{ route('divisis.index') }}`)">
                                                <i class="far fa-trash-alt"></i>
                                                Delete
                                            </a>
                                            @endif
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
        </div>
    </div>
</section>
@endsection

@section('script')

@endsection