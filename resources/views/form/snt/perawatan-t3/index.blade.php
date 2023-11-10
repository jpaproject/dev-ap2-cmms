@extends('layouts.app')

@section('breadcumb')
    <li class="breadcrumb-item">
        <a href="{{ route('work-orders.index') }}">Work Order</a>
    </li>
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

        .container {
            width: 100%;
            /* Lebar container 100% untuk full-width */
            box-sizing: border-box;
            border: 2px solid black;
            padding-bottom: 20px;
            /* Ketebalan dan warna border */
        }

        table,
        tr,
        th,
        td {
            border: 1px solid black;
        }
    </style>
@endsection

@section('content')

    <section class="content">

        <form method="POST"
            action="{{ route('form.snt.perawatan-t3.update', $detailWorkOrderForm) }}"
            enctype="multipart/form-data" id="form2">

            @csrf
            @method('patch')
            @if ($formSntPerawatanT3VIPs->isNotEmpty())
                        <div class="col-lg-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title" style="text-align: right;">PERAWATAN T3 VIP</h3>
                                </div>
                                
                                <div class="container-fluid">
                                    <div class="card-body">
                                        <div class="row">
                                        <div class="col-3">
                                            <label class="d-flex justify-content-center">PERIODE PERAWATAN</label>
                                        </div>
                                        <div class="col-6">
                                                        
                                                        <select class="form-control @error('periode.') is-invalid @enderror"
                                                            name="periode">
                                                            <option value="">Choose Or Type Selection
                                                            </option>
                                                            <option value="HARIAN";>
                                                                HARIAN
                                                            </option>
                                                            <option value="MINGGUAN">
                                                                MINGGUAN
                                                            </option>
                                                            <option value="BULANAN">
                                                                BULANAN
                                                            </option>
                                                        </select>
                                        </div>
                                        </div>
                                        <hr class="bg-primary">
                                        @foreach ($formSntPerawatanT3VIPs as $key => $formSntPerawatanT3VIP)
                                            @include('components.form-message')

                                            <h4 style="text-align: center">
                                                {{ $formSntPerawatanT3VIP->nama_peralatan }}
                                            </h4>

                                            <div class="row">
                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PENGECEKAN</label>
                                                        <select class="form-control @error('operasi.') is-invalid @enderror"
                                                            name="operasi[]">
                                                            <option value="">Choose Or Type Selection
                                                            </option>
                                                            <option value="OPERASI";
                                                                {{ old('operasi.') ?? $formSntPerawatanT3VIP->operasi == 'OPERASI' ? 'selected' : '' }}>
                                                                OPERASI
                                                            </option>
                                                            <option value="TIDAK BEROPERASI (stan by)"
                                                                {{ old('operasi.') ?? $formSntPerawatanT3VIP->operasi == 'TIDAK BEROPERASI (stan by)' ? 'selected' : '' }}>
                                                                TIDAK BEROPERASI (stan by)
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">TEGANGAN</label>
                                                        <input type="number" class="form-control" name="tegangan[]"
                                                        value="{{ old('tegangan.') ?? $formSntPerawatanT3VIP->tegangan }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">ARUS</label>
                                                        <input type="number" class="form-control" name="arus[]" 
                                                        value="{{ old('arus.') ?? $formSntPerawatanT3VIP->arus }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PELAMPUNG</label>
                                                        <input type="text" class="form-control" name="pelampung[]"
                                                        value="{{ old('pelampung.') ?? $formSntPerawatanT3VIP->pelampung }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">CEK PEMIPAAN</label>
                                                        <input type="text" class="form-control" name="pemipaan[]"
                                                        value="{{ old('pemipaan.') ?? $formSntPerawatanT3VIP->pemipaan }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">BERIHKAN SAMPAH</label>
                                                        <input type="text" class="form-control" name="sampah[]"
                                                        value="{{ old('sampah.') ?? $formSntPerawatanT3VIP->sampah }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">KETERANGAN</label>
                                                        <select class="form-control @error('keterangan.') is-invalid @enderror"
                                                            name="keterangan[]">
                                                            <option value="">Choose Or Type Selection
                                                            </option>
                                                            <option value="NORMAL OPERASI";
                                                                {{ old('keterangan.') ?? $formSntPerawatanT3VIP->keterangan == 'NORMAL OPERASI' ? 'selected' : '' }}>
                                                                NORMAL OPERASI
                                                            </option>
                                                            <option value="OFF / RUSAK"
                                                                {{ old('keterangan.') ?? $formSntPerawatanT3VIP->keterangan == 'OFF / RUSAK' ? 'selected' : '' }}>
                                                                OFF / RUSAK
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <hr class="bg-primary">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        
            @endif
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label
                                        class="col-12 control-label d-flex justify-content-center align-items-center">Catatan</label>
                                    <div class="col-12">

                                        <textarea name="catatan" class="form-control @error('catatan.'.$key) is-invalid @enderror"
                                            id="catatan" placeholder="Deskripsi"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-footer">Simpan</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-footer">Back</a>
                </div>
            </div>

        </form>
    </section>
@endsection
@section('script')
    <script>
        function showHide(button) {
            const child = $(button).parent().find("#accordion"); // get child element
            if (child.hasClass('fa-chevron-up')) {
                child.removeClass('fa-chevron-up').addClass('fa-chevron-down');; // logs "This is the child element"
            } else if (child.hasClass('fa-chevron-down')) {
                child.removeClass('fa-chevron-down').addClass('fa-chevron-up'); // logs "This is the child element"
            }
        }
    </script>
@endsection
