@extends('layouts.app')

@section('breadcumb')
    <li class="breadcrumb-item"><a href="{{ route('work-orders.index') }}">Work Order</a></li>
    <li class="breadcrumb-item active">Add</li>
@endsection

@section('style')
    <style>
        input.largerCheckbox {
            width: 20px;
            height: 20px;
        }
    </style>
@endsection

@section('content')
    <section class="content">
        <form action="" method="post">
            @method('patch')
            @csrf

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title" style="text-align: right;">Tasklist Pengerjaan WO Dua Mingguan</h3>
                            </div>
                        </div>

                        <div class="card card-body">
                            @foreach ($task_list as $item)
                                <div class="row">
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <table class="w-100">
                                            <tr>
                                                <td>Nama SOP</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control @error('nama_sop') is-invalid @enderror"
                                                    id="nama_sop" name="nama_sop" value="{{ $item['nama_sop'] }}"
                                                    placeholder="Enter nama SOP" readonly>

                                                    @error('nama_sop')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-12 col-md-5 col-lg-5">
                                        <table class="w-100">
                                            <tr>
                                                <td>Langkah-langkah Perbaikan</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control @error('langkah_perbaikan') is-invalid @enderror"
                                                        id="langkah_perbaikan" name="langkah_perbaikan" value="{{ $item['langkah_perbaikan'] }}"
                                                        placeholder="Enter langkah-langkah perbaikan" readonly>

                                                    @error('langkah_perbaikan')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-12 col-md-1 col-lg-1">
                                        <table class="w-100">
                                            <tr>
                                                <td class="text-center">Yes / No</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex justify-content-center mt-2">
                                                        <input type="checkbox" class="flat largerCheckbox @error('check') is-invalid @enderror"
                                                        id="check" name="check" value="{{ old('check') }}">
    
                                                        @error('check')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-12 col-md-2 col-lg-2">
                                        <table class="w-100">
                                            <tr>
                                                <td>Estimasi</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="number" class="form-control @error('estimasi') is-invalid @enderror"
                                                    id="estimasi" name="estimasi" value="{{ $item['estimasi'] }}"
                                                    placeholder="Enter estimasi" readonly>

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
        </form>
    </section>
@endsection

@section('script')
@endsection