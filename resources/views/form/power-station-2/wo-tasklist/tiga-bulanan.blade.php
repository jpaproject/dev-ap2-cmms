@extends('layouts.app')

@section('breadcumb')
    <li class="breadcrumb-item"><a href="{{ route('work-orders.index') }}">Work Order</a></li>
    <li class="breadcrumb-item active">Add</li>
@endsection

@section('style')
    <style>
        .document {
            width: 100%;
            height: 25rem;
            overflow-y: scroll;
            padding-right: .5rem;
            margin-bottom: 1rem;
        }

        .mycheckbox {
            margin-top: 5px;
            margin-left: 5px;
        }

        .mycheckboxdiv {
            text-align: right;
        }

        head {
            text-align: center;
        }

        input.largerCheckbox {
            width: 20px;
            height: 20px;
        }

        input[type=radio] {
            width: 20px;
            height: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Ps2 Work Order Tiga Bulanan</h3>
                    </div>
                </div>

                <div class="card card-body">
                    @foreach($task_list as $item)
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3">
                            <table class="w-100">
                                <tr>
                                    <td>Nama SOP</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control @error('nama_sop') is-invalid @enderror" id="nama_sop"
                                        name="nama_sop" value="{{ $item['nama_sop'] }}" placeholder="Enter.." readonly>
                            
                                        @error('nama_sop')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <table class="w-100">
                                <tr>
                                    <td>Langkah Perbaikan</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control @error('langkah_perbaikan') is-invalid @enderror" id="langkah_perbaikan"
                                        name="langkah_perbaikan" value="{{ $item['langkah_perbaikan'] }}" placeholder="Enter.." readonly>
                                        
                                        @error('langkah_perbaikan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <table class="w-100">
                                <tr>
                                    <td style="text-align: center">Yes / No</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group d-flex justify-content-center mt-2">
                                            <input type="checkbox" class="flat largerCheckbox">
                                            
                                            @error('option')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <table class="w-100">
                                <tr>
                                    <td>Estimasi</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control @error('estimasi') is-invalid @enderror" id="estimasi"
                                        name="estimasi" value="{{ $item['estimasi'] }}" placeholder="Enter.." readonly>
                            
                                        @error('estimasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection