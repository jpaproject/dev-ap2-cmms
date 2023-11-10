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
        <form method="POST" id="myForm" action="{{ route('form.elp.relay-dua-mingguan.update', $detailWorkOrderForm) }}"
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
                @if ($formElpRelayDuaMingguans->isNotEmpty())
                    @foreach ($formElpRelayDuaMingguans as $key => $formElpRelayDuaMingguan)
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
                                                    {{ $formElpRelayDuaMingguan->substation ?? '' }}
                                                    <input type="hidden" name="substation[]"
                                                        value="{{ $formElpRelayDuaMingguan->substation }}">
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
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>NAMA PANEL</label>
                                                        <input type="text"
                                                            class="form-control @error('panel.' . $key) is-invalid @enderror"
                                                            id="panelReadOnly" name="panel[]"
                                                            value="{{ old('panel.' . $key) ?? $formElpRelayDuaMingguan->panel }}"
                                                            placeholder="Enter..">

                                                        @error('panel.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>MERK / TYPE RELAY</label>
                                                        <input type="text"
                                                            class="form-control @error('merek_type_relay.' . $key) is-invalid @enderror"
                                                            id="merek_type_relay" name="merek_type_relay[]"
                                                            value="{{ old('merek_type_relay.' . $key) ?? $formElpRelayDuaMingguan->merek_type_relay }}"
                                                            placeholder="Enter..">

                                                        @error('merek_type_relay.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>TEGANGAN POWER SUPLAY</label>
                                                        <input type="text"
                                                            class="form-control @error('tegangan_power_suplay.' . $key) is-invalid @enderror"
                                                            id="tegangan_power_suplay" name="tegangan_power_suplay[]"
                                                            value="{{ old('tegangan_power_suplay.' . $key) ?? $formElpRelayDuaMingguan->tegangan_power_suplay }}"
                                                            placeholder="Enter..">

                                                        @error('tegangan_power_suplay.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">TEGANGAN
                                                            KOMPONENSASI</label>
                                                        <input type="text"
                                                            class="form-control @error('tegangan_kompensasi.' . $key) is-invalid @enderror"
                                                            id="tegangan_kompensasi" name="tegangan_kompensasi[]"
                                                            value="{{ old('tegangan_kompensasi.' . $key) ?? $formElpRelayDuaMingguan->tegangan_kompensasi }}"
                                                            placeholder="Enter..">

                                                        @error('tegangan_kompensasi.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg-6">
                                                    <span class="d-flex justify-content-center">ARUS</span>
                                                    <div class="row">
                                                        <div class="col-6 form-group">
                                                            <label class="d-flex justify-content-center">I</label>
                                                            <input type="text"
                                                                class="form-control @error('arus_i.' . $key) is-invalid @enderror"
                                                                id="arus_i" name="arus_i[]"
                                                                value="{{ old('arus_i.' . $key) ?? $formElpRelayDuaMingguan->arus_i }}"
                                                                placeholder="Enter..">

                                                            @error('arus_i.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label class="d-flex justify-content-center">Ir</label>
                                                            <input type="text"
                                                                class="form-control @error('arus_ir.' . $key) is-invalid @enderror"
                                                                id="arus_ir" name="arus_ir[]"
                                                                value="{{ old('arus_ir.' . $key) ?? $formElpRelayDuaMingguan->arus_ir }}"
                                                                placeholder="Enter..">

                                                            @error('arus_ir.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4 col-lg-2">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Enter.. (+)
                                                            TO<br>GROUND</label>
                                                        <input type="text"
                                                            class="form-control @error('vdc_plus_to_ground.' . $key) is-invalid @enderror"
                                                            id="vdc_plus_to_ground" name="vdc_plus_to_ground[]"
                                                            value="{{ old('vdc_plus_to_ground.' . $key) ?? $formElpRelayDuaMingguan->vdc_plus_to_ground }}"
                                                            placeholder="Enter..">

                                                        @error('vdc_plus_to_ground.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4 col-lg-2">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Enter.. (-)
                                                            TO<br>GROUND</label>
                                                            <input type="text"
                                                            class="form-control @error('vdc_min_to_ground.' . $key) is-invalid @enderror"
                                                            id="vdc_min_to_ground" name="vdc_min_to_ground[]"
                                                            value="{{ old('vdc_min_to_ground.' . $key) ?? $formElpRelayDuaMingguan->vdc_min_to_ground }}"
                                                            placeholder="Enter..">

                                                        @error('vdc_min_to_ground.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4 col-lg-2">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">BODY
                                                            TO<br>GROUND</label>
                                                            <input type="text"
                                                            class="form-control @error('body_to_ground.' . $key) is-invalid @enderror"
                                                            id="body_to_ground" name="body_to_ground[]"
                                                            value="{{ old('body_to_ground.' . $key) ?? $formElpRelayDuaMingguan->body_to_ground }}"
                                                            placeholder="Enter..">

                                                        @error('body_to_ground.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">SUDUT ( ° )</label>
                                                        <input type="text"
                                                            class="form-control @error('sudut.' . $key) is-invalid @enderror"
                                                            id="sudut" name="sudut[]"
                                                            value="{{ old('sudut.' . $key) ?? $formElpRelayDuaMingguan->sudut }}"
                                                            placeholder="Enter..">

                                                        @error('sudut.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">KOMUNIKASI</label>
                                                        <select
                                                        class="form-control @error('komunikasi.' . $key) is-invalid @enderror"
                                                        name="komunikasi[]">
                                                        <option readonly selected>Choose Selection</option>
                                                        <option value="NORMAL"
                                                            {{ old('komunikasi . ' . $key) ?? $formElpRelayDuaMingguan->komunikasi == 'NORMAL' ? 'selected' : '' }}>
                                                            NORMAL</option>
                                                        <option value="ABNORMAL"
                                                            {{ old('komunikasi . ' . $key) ?? $formElpRelayDuaMingguan->komunikasi == 'ABNORMAL' ? 'selected' : '' }}>
                                                            ABNORMAL</option>
                                                    </select>

                                                    @error('komunikasi.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">I DIFF</label>
                                                        <input type="text"
                                                            class="form-control @error('i_diff.' . $key) is-invalid @enderror"
                                                            id="i_diff" name="i_diff[]"
                                                            value="{{ old('i_diff.' . $key) ?? $formElpRelayDuaMingguan->i_diff }}"
                                                            placeholder="Enter..">

                                                        @error('i_diff.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">I BIAS</label>
                                                        <input type="text"
                                                            class="form-control @error('i_bias.' . $key) is-invalid @enderror"
                                                            id="i_bias" name="i_bias[]"
                                                            value="{{ old('i_bias.' . $key) ?? $formElpRelayDuaMingguan->i_bias }}"
                                                            placeholder="Enter..">

                                                        @error('i_bias.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label
                                                            class="control-label d-flex justify-content-center align-items-center">KETERANGAN</label>
                                                        <div class="col-12">

                                                            <textarea name="keterangan[]" class="form-control @error('keterangan' . $key) is-invalid @enderror"
                                                                id="keterangan" placeholder="Deskripsi">{!! $formElpRelayDuaMingguan->keterangan ?? '' !!}</textarea>
                                                        </div>
                                                    </div>
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
                            <div class="accordion" id="accordion${countAccordionRow+1}">
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
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>NAMA PANEL</label>
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
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>MERK / TYPE RELAY</label>
                                                        <input type="text"
                                                            class="form-control @error('merek_type_relay . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="merek_type_relay" name="merek_type_relay[]"
                                                            value="{{ old('merek_type_relay . ${countAccordionRow-1}') }}"
                                                            placeholder="Enter..">

                                                        @error('merek_type_relay . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>TEGANGAN POWER SUPLAY</label>
                                                        <input type="text"
                                                            class="form-control @error('tegangan_power_suplay . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="tegangan_power_suplay" name="tegangan_power_suplay[]"
                                                            value="{{ old('tegangan_power_suplay . ${countAccordionRow-1}') }}"
                                                            placeholder="Enter..">

                                                        @error('tegangan_power_suplay . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">TEGANGAN
                                                            KOMPONENSASI</label>
                                                        <input type="text"
                                                            class="form-control @error('tegangan_kompensasi . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="tegangan_kompensasi" name="tegangan_kompensasi[]"
                                                            value="{{ old('tegangan_kompensasi . ${countAccordionRow-1}') }}"
                                                            placeholder="Enter..">

                                                        @error('tegangan_kompensasi . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg-6">
                                                    <span class="d-flex justify-content-center">ARUS</span>
                                                    <div class="row">
                                                        <div class="col-6 form-group">
                                                            <label class="d-flex justify-content-center">I</label>
                                                            <input type="text"
                                                                class="form-control @error('arus_i . ${countAccordionRow-1}') is-invalid @enderror"
                                                                id="arus_i" name="arus_i[]"
                                                                value="{{ old('arus_i . ${countAccordionRow-1}') }}"
                                                                placeholder="Enter..">

                                                            @error('arus_i . ${countAccordionRow-1}')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label class="d-flex justify-content-center">Ir</label>
                                                            <input type="text"
                                                                class="form-control @error('arus_ir . ${countAccordionRow-1}') is-invalid @enderror"
                                                                id="arus_ir" name="arus_ir[]"
                                                                value="{{ old('arus_ir . ${countAccordionRow-1}') }}"
                                                                placeholder="Enter..">

                                                            @error('arus_ir . ${countAccordionRow-1}')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4 col-lg-2">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Enter.. (+)
                                                            TO<br>GROUND</label>
                                                        <input type="text"
                                                            class="form-control @error('vdc_plus_to_ground . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="vdc_plus_to_ground" name="vdc_plus_to_ground[]"
                                                            value="{{ old('vdc_plus_to_ground . ${countAccordionRow-1}') }}"
                                                            placeholder="Enter..">

                                                        @error('vdc_plus_to_ground . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4 col-lg-2">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Enter.. (-)
                                                            TO<br>GROUND</label>
                                                            <input type="text"
                                                            class="form-control @error('vdc_min_to_ground . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="vdc_min_to_ground" name="vdc_min_to_ground[]"
                                                            value="{{ old('vdc_min_to_ground . ${countAccordionRow-1}') }}"
                                                            placeholder="Enter..">

                                                        @error('vdc_min_to_ground . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4 col-lg-2">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">BODY
                                                            TO<br>GROUND</label>
                                                            <input type="text"
                                                            class="form-control @error('body_to_ground . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="body_to_ground" name="body_to_ground[]"
                                                            value="{{ old('body_to_ground . ${countAccordionRow-1}') }}"
                                                            placeholder="Enter..">

                                                        @error('body_to_ground . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">SUDUT ( ° )</label>
                                                        <input type="text"
                                                            class="form-control @error('sudut . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="sudut" name="sudut[]"
                                                            value="{{ old('sudut . ${countAccordionRow-1}') }}"
                                                            placeholder="Enter..">

                                                        @error('sudut . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">KOMUNIKASI</label>
                                                        <select
                                                        class="form-control @error('komunikasi . ${countAccordionRow-1}') is-invalid @enderror"
                                                        name="komunikasi[]">
                                                        <option readonly selected>Choose Selection</option>
                                                        <option value="NORMAL"
                                                            {{ old('komunikasi . . ${countAccordionRow-1}') == 'NORMAL' ? 'selected' : '' }}>
                                                            NORMAL</option>
                                                        <option value="ABNORMAL"
                                                            {{ old('komunikasi . . ${countAccordionRow-1}') == 'ABNORMAL' ? 'selected' : '' }}>
                                                            ABNORMAL</option>
                                                    </select>

                                                    @error('komunikasi . ${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">I DIFF</label>
                                                        <input type="text"
                                                            class="form-control @error('i_diff . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="i_diff" name="i_diff[]"
                                                            value="{{ old('i_diff . ${countAccordionRow-1}') }}"
                                                            placeholder="Enter..">

                                                        @error('i_diff . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">I BIAS</label>
                                                        <input type="text"
                                                            class="form-control @error('i_bias . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="i_bias" name="i_bias[]"
                                                            value="{{ old('i_bias . ${countAccordionRow-1}') }}"
                                                            placeholder="Enter..">

                                                        @error('i_bias . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label
                                                            class="control-label d-flex justify-content-center align-items-center">KETERANGAN</label>
                                                        <div class="col-12">

                                                            <textarea name="keterangan[]" class="form-control @error('keterangan . ${countAccordionRow-1}') is-invalid @enderror"
                                                                id="keterangan" placeholder="Deskripsi"></textarea>
                                                        </div>
                                                    </div>
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
