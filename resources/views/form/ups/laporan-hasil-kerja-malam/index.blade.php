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
    <section class="content">
        <form method="POST" action="{{ route('form.ups.laporan-hasil-kerja-malam.update', $detailWorkOrderForm->id) }}"
            id="form">
            @method('patch')
            @csrf
            <div class="container-fluid">
                @include('components.form-message')
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">LAPORAN HASIL KERJA OPERASIONAL MALAM</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                            <span>Koordinasi dengan petugas AP2 dinas UPS & Converter a/n Bapak/Ibu :</span>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row">
                                                <div class="col-12 ">
                                                    <input type="text" class="form-control" placeholder="Nama....."
                                                        name="koordinasi"
                                                        {{ old('koordinasi') ?? $formUpsLaporanHasilKerjaMalam->koordinasi }}>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-2">
                                    <div class="row">
                                        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                            <label>Cek Visual Peralatan Via Monitoring RCMS : </label>

                                        </div>
                                        <div class="col-12 col-lg-9">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <span class="d-flex justify-content-center">HASIL
                                                        </span> </span>
                                                        <select
                                                            class="form-control @error('hasil_visual.') is-invalid @enderror"
                                                            name="hasil_visual">
                                                            <option value="">Choose Or Type Selection</option>
                                                            <option value="Normal Operasi";
                                                                {{ old('hasil_visual.') ?? $formUpsLaporanHasilKerjaMalam->hasil_visual == 'Normal Operasi' ? 'selected' : '' }}>
                                                                Normal Operasi
                                                            </option>
                                                            <option value="Tidak Normal"
                                                                {{ old('hasil_visual.') ?? $formUpsLaporanHasilKerjaMalam->hasil_visual == 'Tidak Normal' ? 'selected' : '' }}>
                                                                Tidak Normal
                                                            </option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="col-12">
                                <div class="col-12 d-flex justify-content-center align-items-center">
                                        <label>Cek kelengkapan alat kerja, antara lain :</label>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 col-lg-2">
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-9">Toolkit</label>
                                            <input type="checkbox"
                                                class="flat largerCheckbox @error('toolkit') is-invalid @enderror"
                                                name="toolkit" value="1"
                                                {{ old('toolkit') ?? $formUpsLaporanHasilKerjaMalam->toolkit ? 'checked' : '' }}>

                                            @error('toolkit')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-2">
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-9">Avometer</label>
                                            <input type="checkbox"
                                                class="flat largerCheckbox @error('avometer') is-invalid @enderror"
                                                name="avometer" value="1"
                                                {{ old('avometer') ?? $formUpsLaporanHasilKerjaMalam->avometer ? 'checked' : '' }}>

                                            @error('avometer')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-9">Kendaraan Operasional</label>
                                            <input type="checkbox"
                                                class="flat largerCheckbox @error('kendaraan') is-invalid @enderror"
                                                name="kendaraan" value="1"
                                                {{ old('kendaraan') ?? $formUpsLaporanHasilKerjaMalam->kendaraan ? 'checked' : '' }}>

                                            @error('kendaraan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-2">
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-9">APD</label>
                                            <input type="checkbox"
                                                class="flat largerCheckbox @error('apd') is-invalid @enderror"
                                                name="apd" value="1"
                                                {{ old('apd') ?? $formUpsLaporanHasilKerjaMalam->apd ? 'checked' : '' }}>
                                                {{-- seharusnya apd --}}

                                            @error('apd')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-2">
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-9">Reytex</label>
                                            <input type="checkbox"
                                                class="flat largerCheckbox @error('reytex') is-invalid @enderror"
                                                name="reytex" value="1"
                                                {{ old('reytex') ?? $formUpsLaporanHasilKerjaMalam->reytex ? 'checked' : '' }}>

                                            @error('reytex')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-2">
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-9">Alat Cleaning</label>
                                            <input type="checkbox"
                                                class="flat largerCheckbox @error('alat_cleaning') is-invalid @enderror"
                                                name="alat_cleaning" value="1"
                                                {{ old('alat_cleaning') ?? $formUpsLaporanHasilKerjaMalam->alat_cleaning ? 'checked' : '' }}>

                                            @error('alat_cleaning')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-2">
                                    <div class="col-12">
                                            <label for="inputPassword" class="col-9">Cek pengukuran Tegangan input/output, Arus input/output, Tegangan baterai pada peralatan dengan AVO meter</label>
                                            <input type="checkbox"
                                                class="flat largerCheckbox @error('pengukuran') is-invalid @enderror"
                                                name="pengukuran" value="1"
                                                {{ old('pengukuran') ?? $formUpsLaporanHasilKerjaMalam->pengukuran ? 'checked' : '' }}>

                                            @error('pengukuran')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <hr class="my-2">
                                    <div class="col-12">
                                            <label for="inputPassword" class="col-9">Mengecek temperatur peralatan dan ruangan sekitar peralatan.</label>
                                            <input type="checkbox"
                                                class="flat largerCheckbox @error('temperatur') is-invalid @enderror"
                                                name="temperatur" value="1"
                                                {{ old('temperatur') ?? $formUpsLaporanHasilKerjaMalam->temperatur ? 'checked' : '' }}>

                                            @error('temperatur')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <hr class="my-2">
                                    <div class="col-12">
                                            <label for="inputPassword" class="col-9">Membersihkan bagian-bagian peralatan dan area sekitar peralatan.</label>
                                            <input type="checkbox"
                                                class="flat largerCheckbox @error('membersihkan') is-invalid @enderror"
                                                name="membersihkan" value="1"
                                                {{ old('membersihkan') ?? $formUpsLaporanHasilKerjaMalam->membersihkan ? 'checked' : '' }}>

                                            @error('membersihkan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <hr class="my-2">
                                    <div class="col-12">
                                            <label for="inputPassword" class="col-9">Data dan dokumetasi selama kegiatan terlampir.</label>
                                            <input type="checkbox"
                                                class="flat largerCheckbox @error('dokumentasi') is-invalid @enderror"
                                                name="dokumentasi" value="1"
                                                {{ old('dokumentasi') ?? $formUpsLaporanHasilKerjaMalam->dokumentasi ? 'checked' : '' }}>

                                            @error('dokumentasi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <hr class="my-2">
                                    <div class="col-12">
                                            <label for="inputPassword" class="col-9">Serah terima tugas dengan petugas dinas Pagi Siang (PS)</label>
                                            <input type="checkbox"
                                                class="flat largerCheckbox @error('serahterima') is-invalid @enderror"
                                                name="serahterima" value="1"
                                                {{ old('serahterima') ?? $formUpsLaporanHasilKerjaMalam->serahterima ? 'checked' : '' }}>

                                            @error('serahterima')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label
                                        class="col-12 col-lg-3 control-label d-flex justify-content-center align-items-center">Catatan</label>
                                    <div class="col-12 col-lg-9">

                                        <textarea name="catatan" class="form-control" id="catatan" placeholder="Deskripsi">{!! $formUpsLaporanHasilKerjaMalam->catatan !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-footer">Simpan</button>
                        <a href="{{ route('work-orders.show', $detailWorkOrderForm->work_order_id) }}"
                            class="btn btn-secondary btn-footer">Back</a>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('script')
@endsection
