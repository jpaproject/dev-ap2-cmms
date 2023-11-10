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
        <form method="POST" id="myForm" action="{{ route('form.elp.trafo-dua-mingguan.update', $detailWorkOrderForm) }}"
            enctype="multipart/form-data" id="form">
            @csrf
            @method('patch')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Data Baru</h3>
                            </div>
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row d-flex align-items-center">
                                    <div class="col-12 col-lg-8 col-md-8">
                                        <div class="row mb-2">
                                            <div class="col-4 d-flex align-items-center justify-content-center">
                                                <span>SUBSTATION</span>
                                            </div>
                                            <div class="col-8"><input type="text" class="form-control" id="substation"
                                                    name="" placeholder="Enter..">

                                                @error('pick-time')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 d-flex align-items-center justify-content-center">
                                                <span>PANEL</span>
                                            </div>
                                            <div class="col-8"><input type="text" class="form-control" id="panel"
                                                    name="" placeholder="Enter..">

                                                @error('pick-time')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-4"><button type="button"
                                            class="btn btn-outline-primary w-100" id="btn-add-document"
                                            onclick="addField(this)">
                                            <i class="fas fa-plus-square"> <span
                                                    style="font-family: Poppins, sans-serif !important;"> Add New</span>
                                            </i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="add-substation-area">
                @if ($formElpTrafoDuaMingguans->isNotEmpty())
                    @foreach ($formElpTrafoDuaMingguans as $key => $formElpTrafoDuaMingguan)
                        <div class="container-fluid">
                            <div class="accordion" id="accordion{{ $loop->iteration }}">
                                <div class="card">
                                    <div class="card-header" id="{{ $loop->iteration }}">
                                        <h2 class="row mb-0">
                                            <div class="col-6">
                                                <button class="btn btn-link btn-block text-left" type="button"
                                                    data-toggle="collapse" data-target="#collapse{{ $loop->iteration }}"
                                                    aria-expanded="true" aria-controls="collapse{{ $loop->iteration }}"
                                                    onclick="showHide(this)">
                                                    <i class="fas {{ $loop->iteration === 1 ? 'fa-minus' : 'fa-plus' }}"
                                                        id="accordion"></i>
                                                    {{ $formElpTrafoDuaMingguan->substation ?? '' }}
                                                    <input type="hidden" name="substation[]" value="{{ $formElpTrafoDuaMingguan->substation }}">
                                                </button>
                                            </div>
                                            <div class="col-6 d-flex justify-content-end">
                                                <button type="button" class="btn btn-outline-danger btn-remove"
                                                    onclick="deleteAccordion(this)"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </h2>
                                    </div>

                                    <div id="collapse{{ $loop->iteration }}"
                                        class="{{ $loop->iteration === 1 ? 'show' : '' }} collapse"
                                        aria-labelledby="head{{ $loop->iteration }}"
                                        data-parent="#accordion{{ $loop->iteration }}">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">NAMA PANEL</label>
                                                        <input type="text"
                                                            class="form-control @error('panel.' . $key) is-invalid @enderror"
                                                            id="panelReadOnly" name="panel[]"
                                                            value="{{ old('panel.' . $key) ?? $formElpTrafoDuaMingguan->panel }}"
                                                            placeholder="Enter..">

                                                        @error('panel.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">JENIS TRAFO</label>
                                                        <select
                                                            class="form-control @error('jenis_trafo.' . $key) is-invalid @enderror"
                                                            name="jenis_trafo[]">
                                                            <option disabled selected>Choose Selection</option>
                                                            <option value="WET"
                                                                {{ old('jenis_trafo') ?? $formElpTrafoDuaMingguan->jenis_trafo == 'WET' ? 'selected' : '' }}>
                                                                WET</option>
                                                            <option value="DRY"
                                                                {{ old('jenis_trafo') ?? $formElpTrafoDuaMingguan->jenis_trafo == 'DRY' ? 'selected' : '' }}>
                                                                DRY</option>
                                                        </select>

                                                        @error('jenis_trafo.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">KAPASITAS TRAFO</label>
                                                        <input type="number"
                                                            class="form-control @error('kapasitas_trafo.' . $key) is-invalid @enderror"
                                                            id="kapasitas_trafo" name="kapasitas_trafo[]"
                                                            value="{{ old('kapasitas_trafo.' . $key) ?? $formElpTrafoDuaMingguan->kapasitas_trafo }}"
                                                            placeholder="Enter..">

                                                        @error('kapasitas_trafo.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">INDIKASI
                                                    TRAFO</span>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">SUHU (°C)</label>
                                                    <input type="number"
                                                        class="form-control @error('indikasi_trafo_suhu.' . $key) is-invalid @enderror"
                                                        id="indikasi_trafo_suhu" name="indikasi_trafo_suhu[]"
                                                        value="{{ old('indikasi_trafo_suhu.' . $key) ?? $formElpTrafoDuaMingguan->indikasi_trafo_suhu }}"
                                                        step="0.1" min="0" placeholder="Enter..">

                                                    @error('indikasi_trafo_suhu.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">LEVEL OLI</label>
                                                    <select
                                                        class="form-control @error('indikasi_trafo_level_oli.' . $key) is-invalid @enderror"
                                                        name="indikasi_trafo_level_oli[]">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="NORMAL"
                                                            {{ old('indikasi_trafo_level_oli . ' . $key) ?? $formElpTrafoDuaMingguan->indikasi_trafo_level_oli == 'NORMAL' ? 'selected' : '' }}>
                                                            NORMAL</option>
                                                        <option value="ABNORMAL"
                                                            {{ old('indikasi_trafo_level_oli . ' . $key) ?? $formElpTrafoDuaMingguan->indikasi_trafo_level_oli == 'ABNORMAL' ? 'selected' : '' }}>
                                                            ABNORMAL</option>
                                                    </select>

                                                    @error('indikasi_trafo_level_oli.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">PRESSURE</label>
                                                    <select
                                                        class="form-control @error('indikasi_trafo_pressure.' . $key) is-invalid @enderror"
                                                        name="indikasi_trafo_pressure[]">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="NORMAL"
                                                            {{ old('indikasi_trafo_pressure.' . $key) ?? $formElpTrafoDuaMingguan->indikasi_trafo_pressure == 'NORMAL' ? 'selected' : '' }}>
                                                            NORMAL</option>
                                                        <option value="ABNORMAL"
                                                            {{ old('indikasi_trafo_pressure.' . $key) ?? $formElpTrafoDuaMingguan->indikasi_trafo_pressure == 'ABNORMAL' ? 'selected' : '' }}>
                                                            ABNORMAL</option>
                                                    </select>

                                                    @error('indikasi_trafo_pressure.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">SUHU
                                                    (°C)
                                                </span>
                                                <div class="col-9">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">TRAFO</span>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">R</label>
                                                                <input type="number"
                                                                    class="form-control @error('suhu_trafo_r.' . $key) is-invalid @enderror"
                                                                    id="suhu_trafo_r" name="suhu_trafo_r[]"
                                                                    value="{{ old('suhu_trafo_r.' . $key) ?? $formElpTrafoDuaMingguan->suhu_trafo_r }}"
                                                                    step="0.1" min="0" placeholder="Enter..">

                                                                @error('suhu_trafo_r.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">S</label>
                                                                <input type="number"
                                                                    class="form-control @error('suhu_trafo_s.' . $key) is-invalid @enderror"
                                                                    id="suhu_trafo_s" name="suhu_trafo_s[]"
                                                                    value="{{ old('suhu_trafo_s.' . $key) ?? $formElpTrafoDuaMingguan->suhu_trafo_s }}"
                                                                    step="0.1" min="0" placeholder="Enter..">

                                                                @error('suhu_trafo_s.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">T</label>
                                                                <input type="number"
                                                                    class="form-control @error('suhu_trafo_t.' . $key) is-invalid @enderror"
                                                                    id="suhu_trafo_t" name="suhu_trafo_t[]"
                                                                    value="{{ old('suhu_trafo_t.' . $key) ?? $formElpTrafoDuaMingguan->suhu_trafo_t }}"
                                                                    step="0.1" min="0" placeholder="Enter..">

                                                                @error('suhu_trafo_t.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <br>
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">SUHU RUANG</label>
                                                        <input type="number"
                                                            class="form-control @error('suhu_ruang.' . $key) is-invalid @enderror"
                                                            id="suhu_ruang" name="suhu_ruang[]"
                                                            value="{{ old('suhu_ruang.' . $key) ?? $formElpTrafoDuaMingguan->suhu_ruang }}"
                                                            step="0.1" min="0" placeholder="Enter..">

                                                        @error('suhu_ruang.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">PROTEKSI
                                                    TRAFO</span>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">V (VOLT) <br>
                                                            KONTROL</label>
                                                        <input type="number"
                                                            class="form-control @error('proteksi_trafo_kontrol_v.' . $key) is-invalid @enderror"
                                                            id="proteksi_trafo_kontrol_v"
                                                            name="proteksi_trafo_kontrol_v[]"
                                                            value="{{ old('proteksi_trafo_kontrol_v.' . $key) ?? $formElpTrafoDuaMingguan->proteksi_trafo_kontrol_v }}"
                                                            step="0.1" min="0" placeholder="Enter..">

                                                        @error('proteksi_trafo_kontrol_v.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <br>
                                                        <label class="d-flex justify-content-center">SUHU 1</label>
                                                        <input type="number"
                                                            class="form-control @error('proteksi_trafo_suhu1.' . $key) is-invalid @enderror"
                                                            id="proteksi_trafo_suhu1" name="proteksi_trafo_suhu1[]"
                                                            value="{{ old('proteksi_trafo_suhu1.' . $key) ?? $formElpTrafoDuaMingguan->proteksi_trafo_suhu1 }}"
                                                            step="0.1" min="0" placeholder="Enter..">

                                                        @error('proteksi_trafo_suhu1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <br>
                                                        <label class="d-flex justify-content-center">SUHU 2 (TRIP)</label>
                                                        <input type="number"
                                                            class="form-control @error('proteksi_trafo_suhu2.' . $key) is-invalid @enderror"
                                                            id="proteksi_trafo_suhu2" name="proteksi_trafo_suhu2[]"
                                                            value="{{ old('proteksi_trafo_suhu2.' . $key) ?? $formElpTrafoDuaMingguan->proteksi_trafo_suhu2 }}"
                                                            step="0.1" min="0" placeholder="Enter..">

                                                        @error('proteksi_trafo_suhu2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">KONDISI</span>
                                                <div class="col-6 form-group">
                                                    <label class="d-flex justify-content-center">RELE TRAFO</label>
                                                    <select
                                                        class="form-control @error('proteksi_trafo_kondisi_rele_trafo.' . $key) is-invalid @enderror"
                                                        name="proteksi_trafo_kondisi_rele_trafo[]">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="NORMAL"
                                                            {{ old('proteksi_trafo_kondisi_rele_trafo.' . $key) ?? $formElpTrafoDuaMingguan->proteksi_trafo_kondisi_rele_trafo == 'NORMAL' ? 'selected' : '' }}>
                                                            NORMAL</option>
                                                        <option value="ABNORMAL"
                                                            {{ old('proteksi_trafo_kondisi_rele_trafo.' . $key) ?? $formElpTrafoDuaMingguan->proteksi_trafo_kondisi_rele_trafo == 'ABNORMAL' ? 'selected' : '' }}>
                                                            ABNORMAL</option>
                                                    </select>

                                                    @error('proteksi_trafo_kondisi_rele_trafo.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-6 form-group">
                                                    <label class="d-flex justify-content-center">KABEL KONTROL</label>
                                                    <select
                                                        class="form-control @error('proteksi_trafo_kondisi_kabel_kontrol.' . $key) is-invalid @enderror"
                                                        name="proteksi_trafo_kondisi_kabel_kontrol[]">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="NORMAL"
                                                            {{ old('proteksi_trafo_kondisi_kabel_kontrol.' . $key) ?? $formElpTrafoDuaMingguan->proteksi_trafo_kondisi_kabel_kontrol == 'NORMAL' ? 'selected' : '' }}>
                                                            NORMAL</option>
                                                        <option value="ABNORMAL"
                                                            {{ old('proteksi_trafo_kondisi_kabel_kontrol.' . $key) ?? $formElpTrafoDuaMingguan->proteksi_trafo_kondisi_kabel_kontrol == 'ABNORMAL' ? 'selected' : '' }}>
                                                            ABNORMAL</option>
                                                    </select>

                                                    @error('proteksi_trafo_kondisi_kabel_kontrol.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">TEGANGAN
                                                    TM</span>
                                                <div class="col-6 form-group">
                                                    <label class="d-flex justify-content-center">VL-L</label>
                                                    <input type="number"
                                                        class="form-control @error('tegangan_tm_vl_l.' . $key) is-invalid @enderror"
                                                        id="tegangan_tm_vl_l" name="tegangan_tm_vl_l[]"
                                                        value="{{ old('tegangan_tm_vl_l.' . $key) ?? $formElpTrafoDuaMingguan->tegangan_tm_vl_l }}"
                                                        step="0.1" min="0" placeholder="Enter..">

                                                    @error('tegangan_tm_vl_l.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-6 form-group">
                                                    <label class="d-flex justify-content-center">VL-N</label>
                                                    <input type="number"
                                                        class="form-control @error('tegangan_tm_vl_n.' . $key) is-invalid @enderror"
                                                        id="tegangan_tm_vl_n" name="tegangan_tm_vl_n[]"
                                                        value="{{ old('tegangan_tm_vl_n.' . $key) ?? $formElpTrafoDuaMingguan->tegangan_tm_vl_n }}"
                                                        step="0.1" min="0" placeholder="Enter..">

                                                    @error('tegangan_tm_vl_n.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">ARUS TM</span>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">R</label>
                                                    <input type="number"
                                                        class="form-control @error('arus_tm_r.' . $key) is-invalid @enderror"
                                                        id="arus_tm_r" name="arus_tm_r[]"
                                                        value="{{ old('arus_tm_r.' . $key) ?? $formElpTrafoDuaMingguan->arus_tm_r }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('arus_tm_r.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">S</label>
                                                    <input type="number"
                                                        class="form-control @error('arus_tm_s.' . $key) is-invalid @enderror"
                                                        id="arus_tm_s" name="arus_tm_s[]"
                                                        value="{{ old('arus_tm_s.' . $key) ?? $formElpTrafoDuaMingguan->arus_tm_s }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('arus_tm_s.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">T</label>
                                                    <input type="number"
                                                        class="form-control @error('arus_tm_t.' . $key) is-invalid @enderror"
                                                        id="arus_tm_t" name="arus_tm_t[]"
                                                        value="{{ old('arus_tm_t.' . $key) ?? $formElpTrafoDuaMingguan->arus_tm_t }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('arus_tm_t.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">DAYA TM</span>
                                                <div class="col-3 form-group">
                                                    <label class="d-flex justify-content-center">P</label>
                                                    <input type="number"
                                                        class="form-control @error('daya_tm_p.' . $key) is-invalid @enderror"
                                                        id="daya_tm_p" name="daya_tm_p[]"
                                                        value="{{ old('daya_tm_p.' . $key) ?? $formElpTrafoDuaMingguan->daya_tm_p }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('daya_tm_p.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-3 form-group">
                                                    <label class="d-flex justify-content-center">Q</label>
                                                    <input type="number"
                                                        class="form-control @error('daya_tm_q.' . $key) is-invalid @enderror"
                                                        id="daya_tm_q" name="daya_tm_q[]"
                                                        value="{{ old('daya_tm_q.' . $key) ?? $formElpTrafoDuaMingguan->daya_tm_q }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('daya_tm_q.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-3 form-group">
                                                    <label class="d-flex justify-content-center">S</label>
                                                    <input type="number"
                                                        class="form-control @error('daya_tm_s.' . $key) is-invalid @enderror"
                                                        id="daya_tm_s" name="daya_tm_s[]"
                                                        value="{{ old('daya_tm_s.' . $key) ?? $formElpTrafoDuaMingguan->daya_tm_s }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('daya_tm_s.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-3 form-group">
                                                    <label class="d-flex justify-content-center">PF</label>
                                                    <input type="number"
                                                        class="form-control @error('daya_tm_pf.' . $key) is-invalid @enderror"
                                                        id="daya_tm_pf" name="daya_tm_pf[]"
                                                        value="{{ old('daya_tm_pf.' . $key) ?? $formElpTrafoDuaMingguan->daya_tm_pf }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('daya_tm_pf.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">Δ DAYA
                                                    TRAFO</span>
                                                <span
                                                    class="col-12 d-flex justify-content-center fw-bolder">EFISIENSI</span>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">P</label>
                                                    <input type="number"
                                                        class="form-control @error('daya_trafo_efisiensi_p.' . $key) is-invalid @enderror"
                                                        id="daya_trafo_efisiensi_p" name="daya_trafo_efisiensi_p[]"
                                                        value="{{ old('daya_trafo_efisiensi_p.' . $key) ?? $formElpTrafoDuaMingguan->daya_trafo_efisiensi_p }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('daya_trafo_efisiensi_p.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">Q</label>
                                                    <input type="number"
                                                        class="form-control @error('daya_trafo_efisiensi_q.' . $key) is-invalid @enderror"
                                                        id="daya_trafo_efisiensi_q" name="daya_trafo_efisiensi_q[]"
                                                        value="{{ old('daya_trafo_efisiensi_q.' . $key) ?? $formElpTrafoDuaMingguan->daya_trafo_efisiensi_q }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('daya_trafo_efisiensi_q.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">S</label>
                                                    <input type="number"
                                                        class="form-control @error('daya_trafo_efisiensi_s.' . $key) is-invalid @enderror"
                                                        id="daya_trafo_efisiensi_s" name="daya_trafo_efisiensi_s[]"
                                                        value="{{ old('daya_trafo_efisiensi_s.' . $key) ?? $formElpTrafoDuaMingguan->daya_trafo_efisiensi_s }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('daya_trafo_efisiensi_s.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">Tahanan
                                                    (Ω)</span>
                                                <div class="col-3 form-group">
                                                    <br>
                                                    <label class="d-flex justify-content-center">NG-TRAFO</label>
                                                    <input type="number"
                                                        class="form-control @error('tahanan_n_g_trafo.' . $key) is-invalid @enderror"
                                                        id="tahanan_n_g_trafo" name="tahanan_n_g_trafo[]"
                                                        value="{{ old('tahanan_n_g_trafo.' . $key) ?? $formElpTrafoDuaMingguan->tahanan_n_g_trafo }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('tahanan_n_g_trafo.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-9">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">GARDU</span>
                                                        <div class="col-3 form-group">
                                                            <label class="d-flex justify-content-center">1</label>
                                                            <input type="number"
                                                                class="form-control @error('tahanan_gardu_1.' . $key) is-invalid @enderror"
                                                                id="tahanan_gardu_1" name="tahanan_gardu_1[]"
                                                                value="{{ old('tahanan_gardu_1.' . $key) ?? $formElpTrafoDuaMingguan->tahanan_gardu_1 }}"
                                                                step="0.01" min="0" placeholder="Enter..">

                                                            @error('tahanan_gardu_1.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-3 form-group">
                                                            <label class="d-flex justify-content-center">2</label>
                                                            <input type="number"
                                                                class="form-control @error('tahanan_gardu_2.' . $key) is-invalid @enderror"
                                                                id="tahanan_gardu_2" name="tahanan_gardu_2[]"
                                                                value="{{ old('tahanan_gardu_2.' . $key) ?? $formElpTrafoDuaMingguan->tahanan_gardu_2 }}"
                                                                step="0.01" min="0" placeholder="Enter..">

                                                            @error('tahanan_gardu_2.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-3 form-group">
                                                            <label class="d-flex justify-content-center">3</label>
                                                            <input type="number"
                                                                class="form-control @error('tahanan_gardu_3.' . $key) is-invalid @enderror"
                                                                id="tahanan_gardu_3" name="tahanan_gardu_3[]"
                                                                value="{{ old('tahanan_gardu_3.' . $key) ?? $formElpTrafoDuaMingguan->tahanan_gardu_3 }}"
                                                                step="0.01" min="0" placeholder="Enter..">

                                                            @error('tahanan_gardu_3.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-3 form-group">
                                                            <label class="d-flex justify-content-center">4</label>
                                                            <input type="number"
                                                                class="form-control @error('tahanan_gardu_4.' . $key) is-invalid @enderror"
                                                                id="tahanan_gardu_4" name="tahanan_gardu_4[]"
                                                                value="{{ old('tahanan_gardu_4.' . $key) ?? $formElpTrafoDuaMingguan->tahanan_gardu_4 }}"
                                                                step="0.01" min="0" placeholder="Enter..">

                                                            @error('tahanan_gardu_4.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="form-group row">
                                                <label
                                                    class="col-12 col-lg-3 control-label d-flex justify-content-center align-items-center">KETERANGAN</label>
                                                <div class="col-12 col-lg-9">

                                                    <textarea name="keterangan[]" class="form-control @error('keterangan.' . $key) is-invalid @enderror" id="keterangan"
                                                        placeholder="Deskripsi">{!! $formElpTrafoDuaMingguan->keterangan !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
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

                                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror"
                                            id="catatan" placeholder="Deskripsi">{!! $formElpTrafoDuaMingguans[0]->catatan ?? '' !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-footer">Add</button>
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
            if (child.hasClass('fa-minus')) {
                child.removeClass('fa-minus').addClass('fa-plus');; // logs "This is the child element"
            } else if (child.hasClass('fa-plus')) {
                child.removeClass('fa-plus').addClass('fa-minus'); // logs "This is the child element"
            }
        }

        function addField() {
            const getSubstation = $('#substation').val();
            const getPanel = $('#panel').val();
            const countAccordionRow = $('.accordion').length;
            console.log(countAccordionRow)
            if (getSubstation == false || getPanel == false) {
                $.alert({
                    icon: 'fas fa-exclamation-triangle',
                    title: 'Perhatian!',
                    type: 'warning',
                    content: 'SUBSTATION dan PANEL harus diisi!',
                });
            } else {
                // area add-substation-area hanyalah untuk penentuan lokasi dalam div
                $('.add-substation-area').append(`
                <div class="container-fluid">
                            <div class="accordion" id="accordion${(countAccordionRow+1)}">
                                <div class="card">
                                    <div class="card-header" id="${countAccordionRow+1}">
                                        <h2 class="row mb-0">
                                            <div class="col-6">
                                                <button class="btn btn-link btn-block text-left" type="button"
                                                    data-toggle="collapse" data-target="#collapse${countAccordionRow+1}"
                                                    aria-expanded="true" aria-controls="collapse${countAccordionRow+1}"
                                                    onclick="showHide(this)">
                                                    <i class="fas ${countAccordionRow+1 === 1 ? 'fa-minus' : 'fa-plus'}"
                                                        id="accordion"></i>
                                                    ${getSubstation}
                                                </button>
                                                <input type="hidden" name="substation[]" value="${getSubstation}">
                                            </div>
                                            <div class="col-6 d-flex justify-content-end">
                                                <button type="button" class="btn btn-outline-danger btn-remove"
                                                    onclick="deleteAccordion(this)"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </h2>
                                    </div>

                                    <div id="collapse${countAccordionRow+1}"
                                        class="${countAccordionRow+1 === 1 ? 'show' : ''} collapse"
                                        aria-labelledby="head${countAccordionRow+1}"
                                        data-parent="#accordion${countAccordionRow+1}">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">NAMA PANEL</label>
                                                        <input type="text"
                                                            class="form-control @error('panel . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="panelReadOnly" name="panel[]"
                                                            value="${getPanel}"
                                                            placeholder="Enter..">

                                                        @error('panel . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">JENIS TRAFO</label>
                                                        <select
                                                            class="form-control @error('jenis_trafo . ${countAccordionRow-1}') is-invalid @enderror"
                                                            name="jenis_trafo[]">
                                                            <option disabled selected>Choose Selection</option>
                                                            <option value="WET"
                                                                {{ old('jenis_trafo . ${countAccordionRow-1}') == 'WET' ? 'selected' : '' }}>
                                                                WET</option>
                                                            <option value="DRY"
                                                                {{ old('jenis_trafo . ${countAccordionRow-1}') == 'DRY' ? 'selected' : '' }}>
                                                                DRY</option>
                                                        </select>

                                                        @error('jenis_trafo . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">KAPASITAS TRAFO</label>
                                                        <input type="number"
                                                            class="form-control @error('kapasitas_trafo . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="kapasitas_trafo" name="kapasitas_trafo[]"
                                                            value="{{ old('kapasitas_trafo . ${countAccordionRow-1}') }}"
                                                            placeholder="Enter..">

                                                        @error('kapasitas_trafo . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">INDIKASI
                                                    TRAFO</span>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">SUHU (°C)</label>
                                                    <input type="number"
                                                        class="form-control @error('indikasi_trafo_suhu . ${countAccordionRow-1}') is-invalid @enderror"
                                                        id="indikasi_trafo_suhu" name="indikasi_trafo_suhu[]"
                                                        value="{{ old('indikasi_trafo_suhu . ${countAccordionRow-1}') }}"
                                                        step="0.1" min="0" placeholder="Enter..">

                                                    @error('indikasi_trafo_suhu . ${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">LEVEL OLI</label>
                                                    <select
                                                        class="form-control @error('indikasi_trafo_level_oli . ${countAccordionRow-1}') is-invalid @enderror"
                                                        name="indikasi_trafo_level_oli[]">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="NORMAL"
                                                            {{ old('indikasi_trafo_level_oli . ${countAccordionRow-1}') == 'NORMAL' ? 'selected' : '' }}>
                                                            NORMAL</option>
                                                        <option value="ABNORMAL"
                                                            {{ old('indikasi_trafo_level_oli . ${countAccordionRow-1}') == 'ABNORMAL' ? 'selected' : '' }}>
                                                            ABNORMAL</option>
                                                    </select>

                                                    @error('indikasi_trafo_level_oli . ${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">PRESSURE</label>
                                                    <select
                                                        class="form-control @error('indikasi_trafo_pressure . ${countAccordionRow-1}') is-invalid @enderror"
                                                        name="indikasi_trafo_pressure[]">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="NORMAL"
                                                            {{ old('indikasi_trafo_pressure . ${countAccordionRow-1}') == 'NORMAL' ? 'selected' : '' }}>
                                                            NORMAL</option>
                                                        <option value="ABNORMAL"
                                                            {{ old('indikasi_trafo_pressure . ${countAccordionRow-1}') == 'ABNORMAL' ? 'selected' : '' }}>
                                                            ABNORMAL</option>
                                                    </select>

                                                    @error('indikasi_trafo_pressure . ${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">SUHU
                                                    (°C)</span>
                                                <div class="col-9">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">TRAFO</span>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">R</label>
                                                                <input type="number"
                                                                    class="form-control @error('suhu_trafo_r . ${countAccordionRow-1}') is-invalid @enderror"
                                                                    id="suhu_trafo_r" name="suhu_trafo_r[]"
                                                                    value="{{ old('suhu_trafo_r . ${countAccordionRow-1}') }}"
                                                                    step="0.1" min="0" placeholder="Enter..">

                                                                @error('suhu_trafo_r . ${countAccordionRow-1}')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">S</label>
                                                                <input type="number"
                                                                    class="form-control @error('suhu_trafo_s . ${countAccordionRow-1}') is-invalid @enderror"
                                                                    id="suhu_trafo_s" name="suhu_trafo_s[]"
                                                                    value="{{ old('suhu_trafo_s . ${countAccordionRow-1}') }}"
                                                                    step="0.1" min="0" placeholder="Enter..">

                                                                @error('suhu_trafo_s . ${countAccordionRow-1}')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">T</label>
                                                                <input type="number"
                                                                    class="form-control @error('suhu_trafo_t . ${countAccordionRow-1}') is-invalid @enderror"
                                                                    id="suhu_trafo_t" name="suhu_trafo_t[]"
                                                                    value="{{ old('suhu_trafo_t . ${countAccordionRow-1}') }}"
                                                                    step="0.1" min="0" placeholder="Enter..">

                                                                @error('suhu_trafo_t . ${countAccordionRow-1}')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <br>
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">SUHU RUANG</label>
                                                        <input type="number"
                                                            class="form-control @error('suhu_ruang . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="suhu_ruang" name="suhu_ruang[]"
                                                            value="{{ old('suhu_ruang . ${countAccordionRow-1}') }}"
                                                            step="0.1" min="0" placeholder="Enter..">

                                                        @error('suhu_ruang . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">PROTEKSI
                                                    TRAFO</span>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">V (VOLT) <br>
                                                            KONTROL</label>
                                                        <input type="number"
                                                            class="form-control @error('proteksi_trafo_kontrol_v . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="proteksi_trafo_kontrol_v"
                                                            name="proteksi_trafo_kontrol_v[]"
                                                            value="{{ old('proteksi_trafo_kontrol_v . ${countAccordionRow-1}') }}"
                                                            step="0.1" min="0" placeholder="Enter..">

                                                        @error('proteksi_trafo_kontrol_v . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <br>
                                                        <label class="d-flex justify-content-center">SUHU 1</label>
                                                        <input type="number"
                                                            class="form-control @error('proteksi_trafo_suhu1 . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="proteksi_trafo_suhu1" name="proteksi_trafo_suhu1[]"
                                                            value="{{ old('proteksi_trafo_suhu1 . ${countAccordionRow-1}') }}"
                                                            step="0.1" min="0" placeholder="Enter..">

                                                        @error('proteksi_trafo_suhu1 . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <br>
                                                        <label class="d-flex justify-content-center">SUHU 2 (TRIP)</label>
                                                        <input type="number"
                                                            class="form-control @error('proteksi_trafo_suhu2 . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="proteksi_trafo_suhu2" name="proteksi_trafo_suhu2[]"
                                                            value="{{ old('proteksi_trafo_suhu2 . ${countAccordionRow-1}') }}"
                                                            step="0.1" min="0" placeholder="Enter..">

                                                        @error('proteksi_trafo_suhu2 . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">KONDISI</span>
                                                <div class="col-6 form-group">
                                                    <label class="d-flex justify-content-center">RELE TRAFO</label>
                                                    <select
                                                        class="form-control @error('proteksi_trafo_kondisi_rele_trafo . ${countAccordionRow-1}') is-invalid @enderror"
                                                        name="proteksi_trafo_kondisi_rele_trafo[]">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="NORMAL"
                                                            {{ old('proteksi_trafo_kondisi_rele_trafo . ${countAccordionRow-1}') == 'NORMAL' ? 'selected' : '' }}>
                                                            NORMAL</option>
                                                        <option value="ABNORMAL"
                                                            {{ old('proteksi_trafo_kondisi_rele_trafo . ${countAccordionRow-1}') == 'ABNORMAL' ? 'selected' : '' }}>
                                                            ABNORMAL</option>
                                                    </select>

                                                    @error('proteksi_trafo_kondisi_rele_trafo . ${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-6 form-group">
                                                    <label class="d-flex justify-content-center">KABEL KONTROL</label>
                                                    <select
                                                        class="form-control @error('proteksi_trafo_kondisi_kabel_kontrol . ${countAccordionRow-1}') is-invalid @enderror"
                                                        name="proteksi_trafo_kondisi_kabel_kontrol[]">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="NORMAL"
                                                            {{ old('proteksi_trafo_kondisi_kabel_kontrol . ${countAccordionRow-1}') == 'NORMAL' ? 'selected' : '' }}>
                                                            NORMAL</option>
                                                        <option value="ABNORMAL"
                                                            {{ old('proteksi_trafo_kondisi_kabel_kontrol . ${countAccordionRow-1}') == 'ABNORMAL' ? 'selected' : '' }}>
                                                            ABNORMAL</option>
                                                    </select>

                                                    @error('proteksi_trafo_kondisi_kabel_kontrol . ${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">TEGANGAN
                                                    TM</span>
                                                <div class="col-6 form-group">
                                                    <label class="d-flex justify-content-center">VL-L</label>
                                                    <input type="number"
                                                        class="form-control @error('tegangan_tm_vl_l . ${countAccordionRow-1}') is-invalid @enderror"
                                                        id="tegangan_tm_vl_l" name="tegangan_tm_vl_l[]"
                                                        value="{{ old('tegangan_tm_vl_l . ${countAccordionRow-1}') }}"
                                                        step="0.1" min="0" placeholder="Enter..">

                                                    @error('tegangan_tm_vl_l . ${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-6 form-group">
                                                    <label class="d-flex justify-content-center">VL-N</label>
                                                    <input type="number"
                                                        class="form-control @error('tegangan_tm_vl_n . ${countAccordionRow-1}') is-invalid @enderror"
                                                        id="tegangan_tm_vl_n" name="tegangan_tm_vl_n[]"
                                                        value="{{ old('tegangan_tm_vl_n . ${countAccordionRow-1}') }}"
                                                        step="0.1" min="0" placeholder="Enter..">

                                                    @error('tegangan_tm_vl_n . ${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">ARUS TM</span>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">R</label>
                                                    <input type="number"
                                                        class="form-control @error('arus_tm_r . ${countAccordionRow-1}') is-invalid @enderror"
                                                        id="arus_tm_r" name="arus_tm_r[]"
                                                        value="{{ old('arus_tm_r . ${countAccordionRow-1}') }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('arus_tm_r . ${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">S</label>
                                                    <input type="number"
                                                        class="form-control @error('arus_tm_s . ${countAccordionRow-1}') is-invalid @enderror"
                                                        id="arus_tm_s" name="arus_tm_s[]"
                                                        value="{{ old('arus_tm_s . ${countAccordionRow-1}') }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('arus_tm_s . ${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">T</label>
                                                    <input type="number"
                                                        class="form-control @error('arus_tm_t . ${countAccordionRow-1}') is-invalid @enderror"
                                                        id="arus_tm_t" name="arus_tm_t[]"
                                                        value="{{ old('arus_tm_t . ${countAccordionRow-1}') }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('arus_tm_t . ${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">DAYA TM</span>
                                                <div class="col-3 form-group">
                                                    <label class="d-flex justify-content-center">P</label>
                                                    <input type="number"
                                                        class="form-control @error('daya_tm_p . ${countAccordionRow-1}') is-invalid @enderror"
                                                        id="daya_tm_p" name="daya_tm_p[]"
                                                        value="{{ old('daya_tm_p . ${countAccordionRow-1}') }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('daya_tm_p . ${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-3 form-group">
                                                    <label class="d-flex justify-content-center">Q</label>
                                                    <input type="number"
                                                        class="form-control @error('daya_tm_q . ${countAccordionRow-1}') is-invalid @enderror"
                                                        id="daya_tm_q" name="daya_tm_q[]"
                                                        value="{{ old('daya_tm_q . ${countAccordionRow-1}') }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('daya_tm_q . ${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-3 form-group">
                                                    <label class="d-flex justify-content-center">S</label>
                                                    <input type="number"
                                                        class="form-control @error('daya_tm_s . ${countAccordionRow-1}') is-invalid @enderror"
                                                        id="daya_tm_s" name="daya_tm_s[]"
                                                        value="{{ old('daya_tm_s . ${countAccordionRow-1}') }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('daya_tm_s . ${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-3 form-group">
                                                    <label class="d-flex justify-content-center">PF</label>
                                                    <input type="number"
                                                        class="form-control @error('daya_tm_pf . ${countAccordionRow-1}') is-invalid @enderror"
                                                        id="daya_tm_pf" name="daya_tm_pf[]"
                                                        value="{{ old('daya_tm_pf . ${countAccordionRow-1}') }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('daya_tm_pf . ${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">Δ DAYA
                                                    TRAFO</span>
                                                <span
                                                    class="col-12 d-flex justify-content-center fw-bolder">EFISIENSI</span>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">P</label>
                                                    <input type="number"
                                                        class="form-control @error('daya_trafo_efisiensi_p . ${countAccordionRow-1}') is-invalid @enderror"
                                                        id="daya_trafo_efisiensi_p" name="daya_trafo_efisiensi_p[]"
                                                        value="{{ old('daya_trafo_efisiensi_p . ${countAccordionRow-1}') }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('daya_trafo_efisiensi_p . ${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">Q</label>
                                                    <input type="number"
                                                        class="form-control @error('daya_trafo_efisiensi_q . ${countAccordionRow-1}') is-invalid @enderror"
                                                        id="daya_trafo_efisiensi_q" name="daya_trafo_efisiensi_q[]"
                                                        value="{{ old('daya_trafo_efisiensi_q . ${countAccordionRow-1}') }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('daya_trafo_efisiensi_q . ${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">S</label>
                                                    <input type="number"
                                                        class="form-control @error('daya_trafo_efisiensi_s . ${countAccordionRow-1}') is-invalid @enderror"
                                                        id="daya_trafo_efisiensi_s" name="daya_trafo_efisiensi_s[]"
                                                        value="{{ old('daya_trafo_efisiensi_s . ${countAccordionRow-1}') }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('daya_trafo_efisiensi_s . ${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">Tahanan
                                                    (Ω)</span>
                                                <div class="col-3 form-group">
                                                    <br>
                                                    <label class="d-flex justify-content-center">NG-TRAFO</label>
                                                    <input type="number"
                                                        class="form-control @error('tahanan_n_g_trafo . ${countAccordionRow-1}') is-invalid @enderror"
                                                        id="tahanan_n_g_trafo" name="tahanan_n_g_trafo[]"
                                                        value="{{ old('tahanan_n_g_trafo . ${countAccordionRow-1}') }}"
                                                        step="0.01" min="0" placeholder="Enter..">

                                                    @error('tahanan_n_g_trafo . ${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-9">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">GARDU</span>
                                                        <div class="col-3 form-group">
                                                            <label class="d-flex justify-content-center">1</label>
                                                            <input type="number"
                                                                class="form-control @error('tahanan_gardu_1 . ${countAccordionRow-1}') is-invalid @enderror"
                                                                id="tahanan_gardu_1" name="tahanan_gardu_1[]"
                                                                value="{{ old('tahanan_gardu_1 . ${countAccordionRow-1}') }}"
                                                                step="0.01" min="0" placeholder="Enter..">

                                                            @error('tahanan_gardu_1 . ${countAccordionRow-1}')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-3 form-group">
                                                            <label class="d-flex justify-content-center">2</label>
                                                            <input type="number"
                                                                class="form-control @error('tahanan_gardu_2 . ${countAccordionRow-1}') is-invalid @enderror"
                                                                id="tahanan_gardu_2" name="tahanan_gardu_2[]"
                                                                value="{{ old('tahanan_gardu_2 . ${countAccordionRow-1}') }}"
                                                                step="0.01" min="0" placeholder="Enter..">

                                                            @error('tahanan_gardu_2 . ${countAccordionRow-1}')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-3 form-group">
                                                            <label class="d-flex justify-content-center">3</label>
                                                            <input type="number"
                                                                class="form-control @error('tahanan_gardu_3 . ${countAccordionRow-1}') is-invalid @enderror"
                                                                id="tahanan_gardu_3" name="tahanan_gardu_3[]"
                                                                value="{{ old('tahanan_gardu_3 . ${countAccordionRow-1}') }}"
                                                                step="0.01" min="0" placeholder="Enter..">

                                                            @error('tahanan_gardu_3 . ${countAccordionRow-1}')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-3 form-group">
                                                            <label class="d-flex justify-content-center">4</label>
                                                            <input type="number"
                                                                class="form-control @error('tahanan_gardu_4 . ${countAccordionRow-1}') is-invalid @enderror"
                                                                id="tahanan_gardu_4" name="tahanan_gardu_4[]"
                                                                value="{{ old('tahanan_gardu_4 . ${countAccordionRow-1}') }}"
                                                                step="0.01" min="0" placeholder="Enter..">

                                                            @error('tahanan_gardu_4 . ${countAccordionRow-1}')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="form-group row">
                                                <label
                                                    class="col-12 col-lg-3 control-label d-flex justify-content-center align-items-center">KETERANGAN</label>
                                                <div class="col-12 col-lg-9">

                                                    <textarea name="keterangan[]" class="form-control @error('keterangan . ${countAccordionRow-1}') is-invalid @enderror" id="keterangan"
                                                        placeholder="Deskripsi">{!! old('keterangan . ${countAccordionRow-1}') !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            `);
            }

            $('#substation').val('');
            $('#panel').val('');
        }

        function deleteAccordion(e) {
            var parent = $(event.target).parent().parent().parent().parent().parent().parent();
            parent.remove();
        }

        $(document).ready(function() {

            $("#myForm").submit(function(event) {
                const countAccordionRow = $('.accordion').length;
                if (countAccordionRow == 0) {
                    event.preventDefault(); // Prevents the form from being submitted

                    // Perform additional actions or validations if needed

                    // Example: Display an alert
                    $.alert({
                        icon: 'fas fa-exclamation-triangle',
                        title: 'Perhatian!',
                        type: 'warning',
                        content: 'SUBSTATION dan PANEL harus diisi!',
                    });
                }
                console.log("berhenti count :" + countAccordionRow)
            });

        });
    </script>
@endsection
