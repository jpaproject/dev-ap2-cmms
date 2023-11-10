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

        .select2-container--default .select2-selection--single {
            height: 40px;
            /* adjust the height value as needed */
            line-height: 40px;
            /* ensure the text is vertically centered */
        }
    </style>
@endsection

@section('content')
    <section class="content">
        <form method="POST" id="myForm"
            action="{{ route('form.ups.pengukuran-peralatan-enam-bulanan.update', $detailWorkOrderForm) }}"
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
                                                <span>Nama Gardu</span>
                                            </div>
                                            <div class="col-8">
                                                <select
                                                    class="form-control select2 @error('nama_gardu') is-invalid @enderror"
                                                    id="nama_gardu" name="">
                                                    <option value="">Choose Or Type Selection</option>
                                                    </option>
                                                    <option value="NP 24">
                                                        NP 24
                                                    </option>
                                                    <option value="F9P50">
                                                        F9P50
                                                    </option>
                                                    <option value="F9P51">
                                                        F9P51
                                                    </option>
                                                </select>
                                                @error('nama_gardu')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-4 d-flex align-items-center justify-content-center">
                                                <span>Jumlah Merk</span>
                                            </div>
                                            <div class="col-8">
                                                <select class="form-control @error('banyak') is-invalid @enderror"
                                                    id="banyak" name="">
                                                    <option value="">Choose Or Type Selection</option>
                                                    </option>
                                                    <option value="1">
                                                        1
                                                    </option>
                                                    <option value="2">
                                                        2
                                                    </option>
                                                </select>
                                                @error('banyak')
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
                @if ($formUpsPengukuranPeralatanEnamBulanans->isNotEmpty())
                    @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
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
                                                    {{ $formUpsPengukuranPeralatanEnamBulanan->nama_gardu ?? '' }}
                                                    <input type="hidden" name="nama_gardu[]"
                                                        value="{{ $formUpsPengukuranPeralatanEnamBulanan->nama_gardu }}">
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
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>MERK UPS {{ $loop->iteration }}</label>
                                                    <input type="text"
                                                        class="form-control @error('merk_ups.' . $key) is-invalid @enderror"
                                                        id="merk_ups" name="merk_ups[]"
                                                        value="{{ old('merk_ups.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->merk_ups }}">

                                                    @error('merk_ups.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Kapasitas Input </label>
                                                    <input type="text"
                                                        class="form-control @error('shift.' . $key) is-invalid @enderror"
                                                        id="shift" name="shift[]"
                                                        value="{{ old('shift.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->shift }}">

                                                    @error('shift.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="d-flex justify-content-center">Teg. Input</label>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">V
                                                                L1-N/L1-L2</span>
                                                            <input type="number"
                                                                class="form-control @error('input_v_l1_n.' . $key) is-invalid @enderror"
                                                                id="input_v_l1_n" name="input_v_l1_n[]"
                                                                value="{{ old('input_v_l1_n.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->input_v_l1_n }}">

                                                            @error('input_v_l1_n.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">V
                                                                L2-N/L2-L3</span>
                                                            <input type="number"
                                                                class="form-control @error('input_v_l2_n.' . $key) is-invalid @enderror"
                                                                id="input_v_l2_n" name="input_v_l2_n[]"
                                                                value="{{ old('input_v_l2_n.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->input_v_l2_n }}">

                                                            @error('input_v_l2_n.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">V
                                                                L3-N/L1-L3</span>
                                                            <input type="number"
                                                                class="form-control @error('input_v_l3_n.' . $key) is-invalid @enderror"
                                                                id="input_v_l3_n" name="input_v_l3_n[]"
                                                                value="{{ old('input_v_l3_n.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->input_v_l3_n }}">

                                                            @error('input_v_l3_n.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="d-flex justify-content-center">Arus Input</label>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">I
                                                                L1</span>
                                                            <input type="number"
                                                                class="form-control @error('input_i_l1.' . $key) is-invalid @enderror"
                                                                id="input_i_l1" name="input_i_l1[]"
                                                                value="{{ old('input_i_l1.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->input_i_l1 }}">

                                                            @error('input_i_l1.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">I
                                                                L2</span>
                                                            <input type="number"
                                                                class="form-control @error('input_i_l2.' . $key) is-invalid @enderror"
                                                                id="input_i_l2" name="input_i_l2[]"
                                                                value="{{ old('input_i_l2.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->input_i_l2 }}">

                                                            @error('input_i_l2.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">I
                                                                L3</span>
                                                            <input type="number"
                                                                class="form-control @error('input_i_l3.' . $key) is-invalid @enderror"
                                                                id="input_i_l3" name="input_i_l3[]"
                                                                value="{{ old('input_i_l3.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->input_i_l3 }}">

                                                            @error('input_i_l3.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="d-flex justify-content-center">Freq.
                                                        Input</label>
                                                    <input type="text"
                                                        class="form-control @error('freq_input.' . $key) is-invalid @enderror"
                                                        id="freq_input" name="freq_input[]"
                                                        value="{{ old('freq_input.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->freq_input }}">

                                                    @error('freq_input.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <label class="d-flex justify-content-center">Teg
                                                    Battery</label>
                                                <div class="row">
                                                    <div class="col-12 col-lg-2">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">Teg
                                                                Floating</span>
                                                            <input type="number"
                                                                class="form-control @error('teg_floating.' . $key) is-invalid @enderror"
                                                                id="teg_floating" name="teg_floating[]"
                                                                value="{{ old('teg_floating.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->teg_floating }}">

                                                            @error('teg_floating.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-2">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">Teg
                                                                Rata2 percell</span>
                                                            <input type="number"
                                                                class="form-control @error('teg_rata2_percell.' . $key) is-invalid @enderror"
                                                                id="teg_rata2_percell" name="teg_rata2_percell[]"
                                                                value="{{ old('teg_rata2_percell.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->teg_rata2_percell }}">

                                                            @error('teg_rata2_percell.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-2">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">Teg Tot
                                                                Batt</span>
                                                            <input type="number"
                                                                class="form-control @error('teg_tot_batt.' . $key) is-invalid @enderror"
                                                                id="teg_tot_batt" name="teg_tot_batt[]"
                                                                value="{{ old('teg_tot_batt.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->teg_tot_batt }}">

                                                            @error('teg_tot_batt.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-2">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">Teg
                                                                Otonomi</span>
                                                            <input type="number"
                                                                class="form-control @error('teg_otonomi.' . $key) is-invalid @enderror"
                                                                id="teg_otonomi" name="teg_otonomi[]"
                                                                value="{{ old('teg_otonomi.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->teg_otonomi }}">

                                                            @error('teg_otonomi.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-2">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">Arus
                                                                Discharge</span>
                                                            <input type="number"
                                                                class="form-control @error('arus_discharge.' . $key) is-invalid @enderror"
                                                                id="arus_discharge" name="arus_discharge[]"
                                                                value="{{ old('arus_discharge.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->arus_discharge }}">

                                                            @error('arus_discharge.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-2">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">Arus
                                                                Bhoscarge</span>
                                                            <input type="number"
                                                                class="form-control @error('arus_bhoscarge.' . $key) is-invalid @enderror"
                                                                id="arus_bhoscarge" name="arus_bhoscarge[]"
                                                                value="{{ old('arus_bhoscarge.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->arus_bhoscarge }}">

                                                            @error('arus_bhoscarge.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <label class="d-flex justify-content-center">Teg.
                                                    Output</label>
                                                <div class="row">
                                                    <div class="col-12 col-lg-2">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">V
                                                                L1-N/L1-L2</span>
                                                            <input type="number"
                                                                class="form-control @error('output_v_l1_n.' . $key) is-invalid @enderror"
                                                                id="output_v_l1_n" name="output_v_l1_n[]"
                                                                value="{{ old('output_v_l1_n.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->output_v_l1_n }}">

                                                            @error('output_v_l1_n.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-2">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">V
                                                                L2-N/L2-L3</span>
                                                            <input type="number"
                                                                class="form-control @error('output_v_l2_n.' . $key) is-invalid @enderror"
                                                                id="output_v_l2_n" name="output_v_l2_n[]"
                                                                value="{{ old('output_v_l2_n.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->output_v_l2_n }}">

                                                            @error('output_v_l2_n.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-2">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">V
                                                                L3-N/L1-L3</span>
                                                            <input type="number"
                                                                class="form-control @error('output_v_l3_n.' . $key) is-invalid @enderror"
                                                                id="output_v_l3_n" name="output_v_l3_n[]"
                                                                value="{{ old('output_v_l3_n.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->output_v_l3_n }}">

                                                            @error('output_v_l3_n.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-2">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">V
                                                                L1-G</span>
                                                            <input type="number"
                                                                class="form-control @error('v_l1.' . $key) is-invalid @enderror"
                                                                id="v_l1" name="v_l1[]"
                                                                value="{{ old('v_l1.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->v_l1 }}">

                                                            @error('v_l1.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-2">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">V
                                                                L2-G</span>
                                                            <input type="number"
                                                                class="form-control @error('v_l2.' . $key) is-invalid @enderror"
                                                                id="v_l2" name="v_l2[]"
                                                                value="{{ old('v_l2.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->v_l2 }}">

                                                            @error('v_l2.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-2">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">V
                                                                L3-G</span>
                                                            <input type="number"
                                                                class="form-control @error('v_l3.' . $key) is-invalid @enderror"
                                                                id="v_l3" name="v_l3[]"
                                                                value="{{ old('v_l3.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->v_l3 }}">

                                                            @error('v_l3.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="d-flex justify-content-center">Freq.
                                                        Output</label>
                                                    <input type="text"
                                                        class="form-control @error('freq_output.' . $key) is-invalid @enderror"
                                                        id="freq_output" name="freq_output[]"
                                                        value="{{ old('freq_output.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->freq_output }}">

                                                    @error('freq_output.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="d-flex justify-content-center">Arus
                                                    Output</label>
                                                <div class="row">
                                                    <div class="col-12 col-lg-2">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">I
                                                                L1</span>
                                                            <input type="number"
                                                                class="form-control @error('output_i_l1.' . $key) is-invalid @enderror"
                                                                id="output_i_l1" name="output_i_l1[]"
                                                                value="{{ old('output_i_l1.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->output_i_l1 }}">

                                                            @error('output_i_l1.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-2">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">I
                                                                L2</span>
                                                            <input type="number"
                                                                class="form-control @error('output_i_l2.' . $key) is-invalid @enderror"
                                                                id="output_i_l2" name="output_i_l2[]"
                                                                value="{{ old('output_i_l2.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->output_i_l2 }}">

                                                            @error('output_i_l2.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-2">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">I
                                                                L3</span>
                                                            <input type="number"
                                                                class="form-control @error('output_i_l3.' . $key) is-invalid @enderror"
                                                                id="output_i_l3" name="output_i_l3[]"
                                                                value="{{ old('output_i_l3.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->output_i_l3 }}">

                                                            @error('output_i_l3.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-2">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">Load
                                                                Persen (%)</span>
                                                            <input type="number"
                                                                class="form-control @error('load_persen.' . $key) is-invalid @enderror"
                                                                id="load_persen" name="load_persen[]"
                                                                value="{{ old('load_persen.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->load_persen }}">

                                                            @error('load_persen.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-2">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">Load
                                                                Per Phase</span>
                                                            <input type="number"
                                                                class="form-control @error('load_perphase.' . $key) is-invalid @enderror"
                                                                id="load_perphase" name="load_perphase[]"
                                                                value="{{ old('load_perphase.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->load_perphase }}">

                                                            @error('load_perphase.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-2">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">Total
                                                                Load</span>
                                                            <input type="number"
                                                                class="form-control @error('total_load.' . $key) is-invalid @enderror"
                                                                id="total_load" name="total_load[]"
                                                                value="{{ old('total_load.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->total_load }}">

                                                            @error('total_load.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-12">
                                                <label class="d-flex justify-content-center">Temperatur</label>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">I
                                                                L1</span>
                                                            <input type="number"
                                                                class="form-control @error('temp_ruang.' . $key) is-invalid @enderror"
                                                                id="temp_ruang" name="temp_ruang[]"
                                                                value="{{ old('temp_ruang.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->temp_ruang }}">

                                                            @error('temp_ruang.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">Temp
                                                                Unit/Alat</span>
                                                            <input type="number"
                                                                class="form-control @error('temp_unit.' . $key) is-invalid @enderror"
                                                                id="temp_unit" name="temp_unit[]"
                                                                value="{{ old('temp_unit.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->temp_unit }}">

                                                            @error('temp_unit.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <span class="d-flex justify-content-center">Temp
                                                                Battery</span>
                                                            <input type="number"
                                                                class="form-control @error('temp_battery.' . $key) is-invalid @enderror"
                                                                id="temp_battery" name="temp_battery[]"
                                                                value="{{ old('temp_battery.' . $key) ?? $formUpsPengukuranPeralatanEnamBulanan->temp_battery }}">

                                                            @error('temp_battery.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="bg-primary">
                                        </div>
                                        </?div>
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

                                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                                            placeholder="Deskripsi"></textarea>
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
            const getnama_gardu = $('#nama_gardu').val();
            const getshift = $('#shift').val();
            const getbanyak = $('#banyak').val();
            const countAccordionRow = $('.accordion').length;
            console.log(countAccordionRow);

            if (!getnama_gardu) {
                $.alert({
                    icon: 'fas fa-exclamation-triangle',
                    title: 'Perhatian!',
                    type: 'warning',
                    content: 'Nama Gardu harus diisi!',
                });
            } else {
                const accordionContent = Array.from({
                    length: getbanyak
                }, (_, i) => `
                <input type="hidden" name="nama_gardu[]" value="${getnama_gardu}">
      <div class="col-6">
        <div class="form-group">
          <label>MERK UPS ${i + 1}</label>
          <input type="text"
            class="form-control @error('merk_ups . ${countAccordionRow - 1}') is-invalid @enderror"
            id="merk_ups" name="merk_ups[]"
            placeholder="Enter..">

          @error('merk_ups . ${countAccordionRow - 1}')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label>Kapasitas Input</label>
          <input type="text"
            class="form-control @error('shift . ${countAccordionRow - 1}') is-invalid @enderror"
            id="shift" name="shift[]"
            placeholder="Enter..">

          @error('shift . ${countAccordionRow - 1}')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    <div class="col-12">
        <label class="d-flex justify-content-center">Teg. Input</label>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <span class="d-flex justify-content-center">V L1-N/L1-L2</span>
                <input type="number"
            class="form-control @error('input_v_l1_n . ${countAccordionRow - 1}') is-invalid @enderror"
            id="input_v_l1_n" name="input_v_l1_n[]"
            placeholder="Enter..">

            @error('input_v_l1_n . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <span class="d-flex justify-content-center">V L2-N/L2-L3</span>
                <input type="number"
            class="form-control @error('input_v_l2_n . ${countAccordionRow - 1}') is-invalid @enderror"
            id="input_v_l2_n" name="input_v_l2_n[]"
            placeholder="Enter..">

            @error('input_v_l2_n . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <span class="d-flex justify-content-center">V L3-N/L1-L3</span>
                <input type="number"
            class="form-control @error('input_v_l3_n . ${countAccordionRow - 1}') is-invalid @enderror"
            id="input_v_l3_n" name="input_v_l3_n[]"
            placeholder="Enter..">

            @error('input_v_l3_n . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>
    </div>
    <div>

    <div class="col-12">
        <label class="d-flex justify-content-center">Arus Input</label>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <span class="d-flex justify-content-center">I L1</span>
                <input type="number"
            class="form-control @error('input_i_l1 . ${countAccordionRow - 1}') is-invalid @enderror"
            id="input_i_l1" name="input_i_l1[]"
            placeholder="Enter..">

            @error('input_i_l1 . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <span class="d-flex justify-content-center">I L2</span>
                <input type="number"
            class="form-control @error('input_i_l2 . ${countAccordionRow - 1}') is-invalid @enderror"
            id="input_i_l2" name="input_i_l2[]"
            placeholder="Enter..">

            @error('input_i_l2 . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <span class="d-flex justify-content-center">I L3</span>
                <input type="number"
            class="form-control @error('input_i_l3 . ${countAccordionRow - 1}') is-invalid @enderror"
            id="input_i_l3" name="input_i_l3[]"
            placeholder="Enter..">

            @error('input_i_l3 . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>
    </div>
    </div>


    <div class="col-12">
        <div class="form-group">
          <label class="d-flex justify-content-center">Freq. Input</label>
          <input type="number"
            class="form-control @error('freq_input . ${countAccordionRow - 1}') is-invalid @enderror"
            id="freq_input" name="freq_input[]"
            placeholder="Enter..">

          @error('freq_input . ${countAccordionRow - 1}')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

    
    <div class="col-12">
        <label class="d-flex justify-content-center">Teg Battery</label>
    <div class="row">
        <div class="col-12 col-lg-2">
            <div class="form-group">
                <span class="d-flex justify-content-center">Teg Floating</span>
                <input type="number"
            class="form-control @error('teg_floating . ${countAccordionRow - 1}') is-invalid @enderror"
            id="teg_floating" name="teg_floating[]"
            placeholder="Enter..">

            @error('teg_floating . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-12 col-lg-2">
            <div class="form-group">
                <span class="d-flex justify-content-center">Teg Rata2 percell</span>
                <input type="number"
            class="form-control @error('teg_rata2_percell . ${countAccordionRow - 1}') is-invalid @enderror"
            id="teg_rata2_percell" name="teg_rata2_percell[]"
            placeholder="Enter..">

            @error('teg_rata2_percell . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-12 col-lg-2">
            <div class="form-group">
                <span class="d-flex justify-content-center">Teg Tot Batt</span>
                <input type="number"
            class="form-control @error('teg_tot_batt . ${countAccordionRow - 1}') is-invalid @enderror"
            id="teg_tot_batt" name="teg_tot_batt[]"
            placeholder="Enter..">

            @error('teg_tot_batt . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-12 col-lg-2">
            <div class="form-group">
                <span class="d-flex justify-content-center">Teg Otonomi</span>
                <input type="number"
            class="form-control @error('teg_otonomi . ${countAccordionRow - 1}') is-invalid @enderror"
            id="teg_otonomi" name="teg_otonomi[]"
            placeholder="Enter..">

            @error('teg_otonomi . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-12 col-lg-2">
            <div class="form-group">
                <span class="d-flex justify-content-center">Arus Discharge</span>
                <input type="number"
            class="form-control @error('arus_discharge . ${countAccordionRow - 1}') is-invalid @enderror"
            id="arus_discharge" name="arus_discharge[]"
            placeholder="Enter..">

            @error('arus_discharge . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-12 col-lg-2">
            <div class="form-group">
                <span class="d-flex justify-content-center">Arus Bhoscarge</span>
                <input type="number"
            class="form-control @error('arus_bhoscarge . ${countAccordionRow - 1}') is-invalid @enderror"
            id="arus_bhoscarge" name="arus_bhoscarge[]"
            placeholder="Enter..">

            @error('arus_bhoscarge . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>
    </div>

        
    <div class="col-12">
        <label class="d-flex justify-content-center">Teg. Output</label>
    <div class="row">
        <div class="col-12 col-lg-2">
            <div class="form-group">
                <span class="d-flex justify-content-center">V L1-N/L1-L2</span>
                <input type="number"
            class="form-control @error('output_v_l1_n . ${countAccordionRow - 1}') is-invalid @enderror"
            id="output_v_l1_n" name="output_v_l1_n[]"
            placeholder="Enter..">

            @error('output_v_l1_n . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-12 col-lg-2">
            <div class="form-group">
                <span class="d-flex justify-content-center">V L2-N/L2-L3</span>
                <input type="number"
            class="form-control @error('output_v_l2_n . ${countAccordionRow - 1}') is-invalid @enderror"
            id="output_v_l2_n" name="output_v_l2_n[]"
            placeholder="Enter..">

            @error('output_v_l2_n . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-12 col-lg-2">
            <div class="form-group">
                <span class="d-flex justify-content-center">V L3-N/L1-L3</span>
                <input type="number"
            class="form-control @error('output_v_l3_n . ${countAccordionRow - 1}') is-invalid @enderror"
            id="output_v_l3_n" name="output_v_l3_n[]"
            placeholder="Enter..">

            @error('output_v_l3_n . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-12 col-lg-2">
            <div class="form-group">
                <span class="d-flex justify-content-center">V L1-G</span>
                <input type="number"
            class="form-control @error('v_l1 . ${countAccordionRow - 1}') is-invalid @enderror"
            id="v_l1" name="v_l1[]"
            placeholder="Enter..">

            @error('v_l1 . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-12 col-lg-2">
            <div class="form-group">
                <span class="d-flex justify-content-center">V L2-G</span>
                <input type="number"
            class="form-control @error('v_l2 . ${countAccordionRow - 1}') is-invalid @enderror"
            id="v_l2" name="v_l2[]"
            placeholder="Enter..">

            @error('v_l2 . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-12 col-lg-2">
            <div class="form-group">
                <span class="d-flex justify-content-center">V L3-G</span>
                <input type="number"
            class="form-control @error('v_l3 . ${countAccordionRow - 1}') is-invalid @enderror"
            id="v_l3" name="v_l3[]"
            placeholder="Enter..">

            @error('v_l3 . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>
    </div>
    </div>


    <div class="col-12">
        <div class="form-group">
          <label class="d-flex justify-content-center">Freq. Output</label>
          <input type="number"
            class="form-control @error('freq_output . ${countAccordionRow - 1}') is-invalid @enderror"
            id="freq_output" name="freq_output[]"
            placeholder="Enter..">

          @error('freq_output . ${countAccordionRow - 1}')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

    <div class="col-12">
        <label class="d-flex justify-content-center">Arus Output</label>
    <div class="row">
        <div class="col-12 col-lg-2">
            <div class="form-group">
                <span class="d-flex justify-content-center">I L1</span>
                <input type="number"
            class="form-control @error('output_i_l1 . ${countAccordionRow - 1}') is-invalid @enderror"
            id="output_i_l1" name="output_i_l1[]"
            placeholder="Enter..">

            @error('output_i_l1 . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-12 col-lg-2">
            <div class="form-group">
                <span class="d-flex justify-content-center">I L2</span>
                <input type="number"
            class="form-control @error('output_i_l2 . ${countAccordionRow - 1}') is-invalid @enderror"
            id="output_i_l2" name="output_i_l2[]"
            placeholder="Enter..">

            @error('output_i_l2 . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-12 col-lg-2">
            <div class="form-group">
                <span class="d-flex justify-content-center">I L3</span>
                <input type="number"
            class="form-control @error('output_i_l3 . ${countAccordionRow - 1}') is-invalid @enderror"
            id="output_i_l3" name="output_i_l3[]"
            placeholder="Enter..">

            @error('output_i_l3 . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-12 col-lg-2">
            <div class="form-group">
                <span class="d-flex justify-content-center">Load Persen (%)</span>
                <input type="number"
            class="form-control @error('load_persen . ${countAccordionRow - 1}') is-invalid @enderror"
            id="load_persen" name="load_persen[]"
            placeholder="Enter..">

            @error('load_persen . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-12 col-lg-2">
            <div class="form-group">
                <span class="d-flex justify-content-center">Load Per Phase</span>
                <input type="number"
            class="form-control @error('load_perphase . ${countAccordionRow - 1}') is-invalid @enderror"
            id="load_perphase" name="load_perphase[]"
            placeholder="Enter..">

            @error('load_perphase . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-12 col-lg-2">
            <div class="form-group">
                <span class="d-flex justify-content-center">Total Load</span>
                <input type="number"
            class="form-control @error('total_load . ${countAccordionRow - 1}') is-invalid @enderror"
            id="total_load" name="total_load[]"
            placeholder="Enter..">

            @error('total_load . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>
    </div>
    </div>

        

        <div class="col-12">
        <label class="d-flex justify-content-center">Temperatur</label>
        <div class="row">
        <div class="col-4">
            <div class="form-group">
                <span class="d-flex justify-content-center">I L1</span>
                <input type="number"
            class="form-control @error('temp_ruang . ${countAccordionRow - 1}') is-invalid @enderror"
            id="temp_ruang" name="temp_ruang[]"
            placeholder="Enter..">

            @error('temp_ruang . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <span class="d-flex justify-content-center">Temp Unit/Alat</span>
                <input type="number"
            class="form-control @error('temp_unit . ${countAccordionRow - 1}') is-invalid @enderror"
            id="temp_unit" name="temp_unit[]"
            placeholder="Enter..">

            @error('temp_unit . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <span class="d-flex justify-content-center">Temp Battery</span>
                <input type="number"
            class="form-control @error('temp_battery . ${countAccordionRow - 1}') is-invalid @enderror"
            id="temp_battery" name="temp_battery[]"
            placeholder="Enter..">

            @error('temp_battery . ${countAccordionRow - 1}')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
        </div>
    </div>
    </div>

    <hr class="bg-primary">
    
    `).join('');

                const accordionTemplate = `
      <div class="container-fluid">
        <div class="accordion" id="accordion${countAccordionRow + 1}">
          <div class="card">
            <div class="card-header" id="${countAccordionRow + 1}">
              <h2 class="row mb-0">
                <div class="col-6">
                  <button class="btn btn-link btn-block text-left" type="button"
                    data-toggle="collapse" data-target="#collapse${countAccordionRow + 1}"
                    aria-expanded="true" aria-controls="collapse${countAccordionRow + 1}"
                    onclick="showHide(this)">
                    <i class="fas ${countAccordionRow + 1 === 1 ? 'fa-minus' : 'fa-plus'}"
                      id="accordion"></i>
                    ${getnama_gardu}
                  </button>
                </div>
                <div class="col-6 d-flex justify-content-end">
                  <button type="button" class="btn btn-outline-danger btn-remove"
                    onclick="deleteAccordion(this)"><i class="fa fa-trash"></i></button>
                </div>
              </h2>
            </div>
            <div id="collapse${countAccordionRow + 1}"
              class="${countAccordionRow + 1 === 1 ? 'show' : ''} collapse"
              aria-labelledby="head${countAccordionRow + 1}"
              data-parent="#accordion${countAccordionRow + 1}">
              <div class="card-body">
                <div class="row">
                  ${accordionContent}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    `;

                $('.add-substation-area').append(accordionTemplate);
            }

            $('#nama_gardu').val('');
            $('#banyak').val('');
            $('#shift').val('');
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
                        content: 'Nama Bank harus diisi!',
                    });
                }
                console.log("berhenti count :" + countAccordionRow)
            });

        });
    </script>
@endsection
