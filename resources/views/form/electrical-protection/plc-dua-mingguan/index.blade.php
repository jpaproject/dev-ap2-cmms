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

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
        }
    </style>
@endsection

@section('content')
    <section class="content">
        <form method="POST" id="myForm" action="{{ route('form.elp.plc-dua-mingguan.update', $detailWorkOrderForm) }}"
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
                                    <div class="col-12 col-md-3 col-lg-3 d-flex align-items-center justify-content-center">
                                        <span>SUBSTATION</span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6"><input type="text" class="form-control" id="substation"
                                            name="" placeholder="Enter..">

                                        @error('pick-time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3"><button type="button"
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
                @if ($formElpPlcDuaMingguans->isNotEmpty())
                    @foreach ($formElpPlcDuaMingguans as $key => $formElpPlcDuaMingguan)
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
                                                    <i class="fas fa-minus" id="accordion"></i>
                                                    {{ $formElpPlcDuaMingguan->substation ?? '' }}
                                                    <input type="hidden" name="substation[]" value="{{ $formElpPlcDuaMingguan->substation ?? '' }}">
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
                                        aria-labelledby="head{{ $loop->iteration }}" data-parent="#accordion1">
                                        <div class="card-body">
                                            <div class="row">
                                                <span style="font-weight: bold"
                                                    class="col-12 d-flex justify-content-center fw-bolder">TEGANGAN POWER
                                                    SUPPLY</span>
                                                <div class="col-6 form-group">
                                                    <label class="d-flex justify-content-center">AC</label>
                                                    <input type="number"
                                                        class="form-control @error('tegangan_power_supply_ac.' . $key) is-invalid @enderror"
                                                        id="tegangan_power_supply_ac" name="tegangan_power_supply_ac[]"
                                                        value="{{ old('tegangan_power_supply_ac.' . $key) ?? $formElpPlcDuaMingguan->tegangan_power_supply_ac }}"
                                                        step="0.1" min="0" placeholder="Enter..">

                                                    @error('tegangan_power_supply_ac.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-6 form-group">
                                                    <label class="d-flex justify-content-center">DC</label>
                                                    <input type="number"
                                                        class="form-control @error('tegangan_power_supply_dc.' . $key) is-invalid @enderror"
                                                        id="tegangan_power_supply_dc" name="tegangan_power_supply_dc[]"
                                                        value="{{ old('tegangan_power_supply_dc.' . $key) ?? $formElpPlcDuaMingguan->tegangan_power_supply_dc }}"
                                                        step="0.1" min="0" placeholder="Enter..">

                                                    @error('tegangan_power_supply_dc.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <div class="col-4 form-group">
                                                    <br>
                                                    <label class="d-flex justify-content-center">MODUL POWER SUPPLY</label>
                                                    <select
                                                        class="form-control select2 @error('modul_power_supply_power_ok.' . $key) is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name="modul_power_supply_power_ok[]">
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value=&check;
                                                            {{ old('modul_power_supply_power_ok.' . $key) ?? $formElpPlcDuaMingguan->modul_power_supply_power_ok == 'yes' ? 'selected' : '' }}>
                                                            &check;
                                                        </option>
                                                        <option value=&#10007;
                                                            {{ old('modul_power_supply_power_ok.' . $key) ?? $formElpPlcDuaMingguan->modul_power_supply_power_ok == 'no' ? 'selected' : '' }}>
                                                            &#10007;
                                                        </option>
                                                        <option value=&minus;
                                                            {{ old('modul_power_supply_power_ok.' . $key) ?? $formElpPlcDuaMingguan->modul_power_supply_power_ok == 'none' ? 'selected' : '' }}>
                                                            &minus;
                                                        </option>

                                                        @if (
                                                            $formElpPlcDuaMingguan->modul_power_supply_power_ok != 'yes' &&
                                                                $formElpPlcDuaMingguan->modul_power_supply_power_ok != 'no' &&
                                                                $formElpPlcDuaMingguan->modul_power_supply_power_ok != 'none' &&
                                                                $formElpPlcDuaMingguan->modul_power_supply_power_ok != null)
                                                            <option value="{{ $formElpPlcDuaMingguan->modul_power_supply_power_ok }}"
                                                                selected>
                                                                {{ $formElpPlcDuaMingguan->modul_power_supply_power_ok }}
                                                            </option>
                                                        @endif
                                                    </select>
                                                    @error('modul_power_supply_power_ok.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-8">
                                                    <div class="row">
                                                        <span style="font-weight: bold"
                                                            class="col-12 d-flex justify-content-center fw-bolder">CPU</span>
                                                        <div class="col-6 form-group">
                                                            <label class="d-flex justify-content-center">RUN</label>
                                                            <select
                                                                class="form-control select2 @error('cpu_run.' . $key) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name="cpu_run[]">
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value=&check;
                                                                    {{ old('cpu_run.' . $key) ?? $formElpPlcDuaMingguan->cpu_run == 'yes' ? 'selected' : '' }}>
                                                                    &check;
                                                                </option>
                                                                <option value=&#10007;
                                                                    {{ old('cpu_run.' . $key) ?? $formElpPlcDuaMingguan->cpu_run == 'no' ? 'selected' : '' }}>
                                                                    &#10007;
                                                                </option>
                                                                <option value=&minus;
                                                                    {{ old('cpu_run.' . $key) ?? $formElpPlcDuaMingguan->cpu_run == 'none' ? 'selected' : '' }}>
                                                                    &minus;
                                                                </option>

                                                                @if (
                                                                    $formElpPlcDuaMingguan->cpu_run != 'yes' &&
                                                                        $formElpPlcDuaMingguan->cpu_run != 'no' &&
                                                                        $formElpPlcDuaMingguan->cpu_run != 'none' &&
                                                                        $formElpPlcDuaMingguan->cpu_run != null)
                                                                    <option value="{{ $formElpPlcDuaMingguan->cpu_run }}"
                                                                        selected>
                                                                        {{ $formElpPlcDuaMingguan->cpu_run }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('cpu_run.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label class="d-flex justify-content-center">LCD</label>
                                                            <select
                                                                class="form-control select2 @error('cpu_lcd.' . $key) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name="cpu_lcd[]">
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value=&check;
                                                                    {{ old('cpu_lcd.' . $key) ?? $formElpPlcDuaMingguan->cpu_lcd == 'yes' ? 'selected' : '' }}>
                                                                    &check;
                                                                </option>
                                                                <option value=&#10007;
                                                                    {{ old('cpu_lcd.' . $key) ?? $formElpPlcDuaMingguan->cpu_lcd == 'no' ? 'selected' : '' }}>
                                                                    &#10007;
                                                                </option>
                                                                <option value=&minus;
                                                                    {{ old('cpu_lcd.' . $key) ?? $formElpPlcDuaMingguan->cpu_lcd == 'none' ? 'selected' : '' }}>
                                                                    &minus;
                                                                </option>

                                                                @if (
                                                                    $formElpPlcDuaMingguan->cpu_lcd != 'yes' &&
                                                                        $formElpPlcDuaMingguan->cpu_lcd != 'no' &&
                                                                        $formElpPlcDuaMingguan->cpu_lcd != 'none' &&
                                                                        $formElpPlcDuaMingguan->cpu_lcd != null)
                                                                    <option value="{{ $formElpPlcDuaMingguan->cpu_lcd }}"
                                                                        selected>
                                                                        {{ $formElpPlcDuaMingguan->cpu_lcd }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('cpu_lcd.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <span style="font-weight: bold"
                                                    class="col-12 d-flex justify-content-center fw-bolder">PTQ</span>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">ACTIVE</label>
                                                    <select
                                                        class="form-control select2 @error('ptq_active.' . $key) is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name="ptq_active[]">
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value=&check;
                                                            {{ old('ptq_active.' . $key) ?? $formElpPlcDuaMingguan->ptq_active == 'yes' ? 'selected' : '' }}>
                                                            &check;
                                                        </option>
                                                        <option value=&#10007;
                                                            {{ old('ptq_active.' . $key) ?? $formElpPlcDuaMingguan->ptq_active == 'no' ? 'selected' : '' }}>
                                                            &#10007;
                                                        </option>
                                                        <option value=&minus;
                                                            {{ old('ptq_active.' . $key) ?? $formElpPlcDuaMingguan->ptq_active == 'none' ? 'selected' : '' }}>
                                                            &minus;
                                                        </option>

                                                        @if (
                                                            $formElpPlcDuaMingguan->ptq_active != 'yes' &&
                                                                $formElpPlcDuaMingguan->ptq_active != 'no' &&
                                                                $formElpPlcDuaMingguan->ptq_active != 'none' &&
                                                                $formElpPlcDuaMingguan->ptq_active != null)
                                                            <option value="{{ $formElpPlcDuaMingguan->ptq_active }}"
                                                                selected>
                                                                {{ $formElpPlcDuaMingguan->ptq_active }}
                                                            </option>
                                                        @endif
                                                    </select>
                                                    @error('ptq_active.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">E DATA</label>
                                                    <select
                                                        class="form-control select2 @error('ptq_e_data.' . $key) is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name="ptq_e_data[]">
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value=&check;
                                                            {{ old('ptq_e_data.' . $key) ?? $formElpPlcDuaMingguan->ptq_e_data == 'yes' ? 'selected' : '' }}>
                                                            &check;
                                                        </option>
                                                        <option value=&#10007;
                                                            {{ old('ptq_e_data.' . $key) ?? $formElpPlcDuaMingguan->ptq_e_data == 'no' ? 'selected' : '' }}>
                                                            &#10007;
                                                        </option>
                                                        <option value=&minus;
                                                            {{ old('ptq_e_data.' . $key) ?? $formElpPlcDuaMingguan->ptq_e_data == 'none' ? 'selected' : '' }}>
                                                            &minus;
                                                        </option>

                                                        @if (
                                                            $formElpPlcDuaMingguan->ptq_e_data != 'yes' &&
                                                                $formElpPlcDuaMingguan->ptq_e_data != 'no' &&
                                                                $formElpPlcDuaMingguan->ptq_e_data != 'none' &&
                                                                $formElpPlcDuaMingguan->ptq_e_data != null)
                                                            <option value="{{ $formElpPlcDuaMingguan->ptq_e_data }}"
                                                                selected>
                                                                {{ $formElpPlcDuaMingguan->ptq_e_data }}
                                                            </option>
                                                        @endif
                                                    </select>
                                                    @error('ptq_e_data.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">E LINK</label>
                                                    <select
                                                        class="form-control select2 @error('ptq_e_link.' . $key) is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name="ptq_e_link[]">
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value=&check;
                                                            {{ old('ptq_e_link.' . $key) ?? $formElpPlcDuaMingguan->ptq_e_link == 'yes' ? 'selected' : '' }}>
                                                            &check;
                                                        </option>
                                                        <option value=&#10007;
                                                            {{ old('ptq_e_link.' . $key) ?? $formElpPlcDuaMingguan->ptq_e_link == 'no' ? 'selected' : '' }}>
                                                            &#10007;
                                                        </option>
                                                        <option value=&minus;
                                                            {{ old('ptq_e_link.' . $key) ?? $formElpPlcDuaMingguan->ptq_e_link == 'none' ? 'selected' : '' }}>
                                                            &minus;
                                                        </option>

                                                        @if (
                                                            $formElpPlcDuaMingguan->ptq_e_link != 'yes' &&
                                                                $formElpPlcDuaMingguan->ptq_e_link != 'no' &&
                                                                $formElpPlcDuaMingguan->ptq_e_link != 'none' &&
                                                                $formElpPlcDuaMingguan->ptq_e_link != null)
                                                            <option value="{{ $formElpPlcDuaMingguan->ptq_e_link }}"
                                                                selected>
                                                                {{ $formElpPlcDuaMingguan->ptq_e_link }}
                                                            </option>
                                                        @endif
                                                    </select>
                                                    @error('ptq_e_link.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">DDI ACTIVE</label>
                                                    <select
                                                        class="form-control select2 @error('ddi_active.' . $key) is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name="ddi_active[]">
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value=&check;
                                                            {{ old('ddi_active.' . $key) ?? $formElpPlcDuaMingguan->ddi_active == 'yes' ? 'selected' : '' }}>
                                                            &check;
                                                        </option>
                                                        <option value=&#10007;
                                                            {{ old('ddi_active.' . $key) ?? $formElpPlcDuaMingguan->ddi_active == 'no' ? 'selected' : '' }}>
                                                            &#10007;
                                                        </option>
                                                        <option value=&minus;
                                                            {{ old('ddi_active.' . $key) ?? $formElpPlcDuaMingguan->ddi_active == 'none' ? 'selected' : '' }}>
                                                            &minus;
                                                        </option>

                                                        @if (
                                                            $formElpPlcDuaMingguan->ddi_active != 'yes' &&
                                                                $formElpPlcDuaMingguan->ddi_active != 'no' &&
                                                                $formElpPlcDuaMingguan->ddi_active != 'none' &&
                                                                $formElpPlcDuaMingguan->ddi_active != null)
                                                            <option value="{{ $formElpPlcDuaMingguan->ddi_active }}"
                                                                selected>
                                                                {{ $formElpPlcDuaMingguan->ddi_active }}
                                                            </option>
                                                        @endif
                                                    </select>
                                                    @error('ddi_active.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">DRA ACTIVE</label>
                                                    <select
                                                        class="form-control select2 @error('dra_active.' . $key) is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name="dra_active[]">
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value=&check;
                                                            {{ old('dra_active.' . $key) ?? $formElpPlcDuaMingguan->dra_active == 'yes' ? 'selected' : '' }}>
                                                            &check;
                                                        </option>
                                                        <option value=&#10007;
                                                            {{ old('dra_active.' . $key) ?? $formElpPlcDuaMingguan->dra_active == 'no' ? 'selected' : '' }}>
                                                            &#10007;
                                                        </option>
                                                        <option value=&minus;
                                                            {{ old('dra_active.' . $key) ?? $formElpPlcDuaMingguan->dra_active == 'none' ? 'selected' : '' }}>
                                                            &minus;
                                                        </option>

                                                        @if (
                                                            $formElpPlcDuaMingguan->dra_active != 'yes' &&
                                                                $formElpPlcDuaMingguan->dra_active != 'no' &&
                                                                $formElpPlcDuaMingguan->dra_active != 'none' &&
                                                                $formElpPlcDuaMingguan->dra_active != null)
                                                            <option value="{{ $formElpPlcDuaMingguan->dra_active }}"
                                                                selected>
                                                                {{ $formElpPlcDuaMingguan->dra_active }}
                                                            </option>
                                                        @endif
                                                    </select>
                                                    @error('dra_active.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-4 form-group">
                                                    <label class="d-flex justify-content-center">NOE ACTIVE</label>
                                                    <select
                                                        class="form-control select2 @error('noe_active.' . $key) is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name="noe_active[]">
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value=&check;
                                                            {{ old('noe_active.' . $key) ?? $formElpPlcDuaMingguan->noe_active == 'yes' ? 'selected' : '' }}>
                                                            &check;
                                                        </option>
                                                        <option value=&#10007;
                                                            {{ old('noe_active.' . $key) ?? $formElpPlcDuaMingguan->noe_active == 'no' ? 'selected' : '' }}>
                                                            &#10007;
                                                        </option>
                                                        <option value=&minus;
                                                            {{ old('noe_active.' . $key) ?? $formElpPlcDuaMingguan->noe_active == 'none' ? 'selected' : '' }}>
                                                            &minus;
                                                        </option>

                                                        @if (
                                                            $formElpPlcDuaMingguan->noe_active != 'yes' &&
                                                                $formElpPlcDuaMingguan->noe_active != 'no' &&
                                                                $formElpPlcDuaMingguan->noe_active != 'none' &&
                                                                $formElpPlcDuaMingguan->noe_active != null)
                                                            <option value="{{ $formElpPlcDuaMingguan->noe_active }}"
                                                                selected>
                                                                {{ $formElpPlcDuaMingguan->noe_active }}
                                                            </option>
                                                        @endif
                                                    </select>
                                                    @error('noe_active.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="row">
                                                        <span style="font-weight: bold"
                                                            class="col-12 d-flex justify-content-center fw-bolder">EGX</span>
                                                        <div class="col-6 form-group">
                                                            <label class="d-flex justify-content-center">TX</label>
                                                            <select
                                                                class="form-control select2 @error('egx_tx.' . $key) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name="egx_tx[]">
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value=&check;
                                                                    {{ old('egx_tx.' . $key) ?? $formElpPlcDuaMingguan->egx_tx == 'yes' ? 'selected' : '' }}>
                                                                    &check;
                                                                </option>
                                                                <option value=&#10007;
                                                                    {{ old('egx_tx.' . $key) ?? $formElpPlcDuaMingguan->egx_tx == 'no' ? 'selected' : '' }}>
                                                                    &#10007;
                                                                </option>
                                                                <option value=&minus;
                                                                    {{ old('egx_tx.' . $key) ?? $formElpPlcDuaMingguan->egx_tx == 'none' ? 'selected' : '' }}>
                                                                    &minus;
                                                                </option>

                                                                @if (
                                                                    $formElpPlcDuaMingguan->egx_tx != 'yes' &&
                                                                        $formElpPlcDuaMingguan->egx_tx != 'no' &&
                                                                        $formElpPlcDuaMingguan->egx_tx != 'none' &&
                                                                        $formElpPlcDuaMingguan->egx_tx != null)
                                                                    <option value="{{ $formElpPlcDuaMingguan->egx_tx }}"
                                                                        selected>
                                                                        {{ $formElpPlcDuaMingguan->egx_tx }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('egx_tx.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label class="d-flex justify-content-center">RX</label>
                                                            <select
                                                                class="form-control select2 @error('egx_rx.' . $key) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name="egx_rx[]">
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value=&check;
                                                                    {{ old('egx_rx.' . $key) ?? $formElpPlcDuaMingguan->egx_rx == 'yes' ? 'selected' : '' }}>
                                                                    &check;
                                                                </option>
                                                                <option value=&#10007;
                                                                    {{ old('egx_rx.' . $key) ?? $formElpPlcDuaMingguan->egx_rx == 'no' ? 'selected' : '' }}>
                                                                    &#10007;
                                                                </option>
                                                                <option value=&minus;
                                                                    {{ old('egx_rx.' . $key) ?? $formElpPlcDuaMingguan->egx_rx == 'none' ? 'selected' : '' }}>
                                                                    &minus;
                                                                </option>

                                                                @if (
                                                                    $formElpPlcDuaMingguan->egx_rx != 'yes' &&
                                                                        $formElpPlcDuaMingguan->egx_rx != 'no' &&
                                                                        $formElpPlcDuaMingguan->egx_rx != 'none' &&
                                                                        $formElpPlcDuaMingguan->egx_rx != null)
                                                                    <option value="{{ $formElpPlcDuaMingguan->egx_rx }}"
                                                                        selected>
                                                                        {{ $formElpPlcDuaMingguan->egx_rx }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('egx_rx.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4 form-group">
                                                    <br>
                                                    <label class="d-flex justify-content-center">CONEX ACTIVE</label>
                                                    <select
                                                        class="form-control select2 @error('conex_active.' . $key) is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name="conex_active[]">
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value=&check;
                                                            {{ old('conex_active.' . $key) ?? $formElpPlcDuaMingguan->conex_active == 'yes' ? 'selected' : '' }}>
                                                            &check;
                                                        </option>
                                                        <option value=&#10007;
                                                            {{ old('conex_active.' . $key) ?? $formElpPlcDuaMingguan->conex_active == 'no' ? 'selected' : '' }}>
                                                            &#10007;
                                                        </option>
                                                        <option value=&minus;
                                                            {{ old('conex_active.' . $key) ?? $formElpPlcDuaMingguan->conex_active == 'none' ? 'selected' : '' }}>
                                                            &minus;
                                                        </option>

                                                        @if (
                                                            $formElpPlcDuaMingguan->conex_active != 'yes' &&
                                                                $formElpPlcDuaMingguan->conex_active != 'no' &&
                                                                $formElpPlcDuaMingguan->conex_active != 'none' &&
                                                                $formElpPlcDuaMingguan->conex_active != null)
                                                            <option value="{{ $formElpPlcDuaMingguan->conex_active }}"
                                                                selected>
                                                                {{ $formElpPlcDuaMingguan->conex_active }}
                                                            </option>
                                                        @endif
                                                    </select>
                                                    @error('conex_active.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">SUHU PLC</label>
                                                        <input type="text"
                                                            class="form-control @error('suhu_plc.' . $key) is-invalid @enderror"
                                                            id="suhu_plc" name="suhu_plc[]"
                                                            value="{{ old('suhu_plc.' . $key) }}" placeholder="Enter..">

                                                        @error('suhu_plc.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">LAMPU</label>
                                                        <select
                                                            class="form-control @error('lampu.' . $key) is-invalid @enderror"
                                                            name="lampu[]">
                                                            <option readonly selected>Choose Selection</option>
                                                            <option value="ON"
                                                                {{ old('lampu') ?? $formElpPlcDuaMingguan->lampu == 'ON' ? 'selected' : '' }}>
                                                                ON</option>
                                                            <option value="OFF"
                                                                {{ old('lampu') ?? $formElpPlcDuaMingguan->lampu == 'OFF' ? 'selected' : '' }}>
                                                                OFF</option>
                                                        </select>

                                                        @error('lampu.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">FAN</label>
                                                        <select
                                                            class="form-control @error('fan.' . $key) is-invalid @enderror"
                                                            name="fan[]">
                                                            <option readonly selected>Choose Selection</option>
                                                            <option value="ON"
                                                                {{ old('fan') ?? $formElpPlcDuaMingguan->fan == 'ON' ? 'selected' : '' }}>
                                                                ON</option>
                                                            <option value="OFF"
                                                                {{ old('fan') ?? $formElpPlcDuaMingguan->fan == 'OFF' ? 'selected' : '' }}>
                                                                OFF</option>
                                                        </select>

                                                        @error('fan.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="border-primary">
                                            <div class="form-group row">
                                                <label
                                                    class="col-12 col-lg-3 control-label d-flex justify-content-center align-items-center">KETERANGAN</label>
                                                <div class="col-12 col-lg-9">

                                                    <textarea name="keterangan[]" class="form-control @error('keterangan .' . $key) is-invalid @enderror"
                                                        id="keterangan" placeholder="Deskripsi">{!! old('keterangan .' . $formElpPlcDuaMingguan->keterangan) ?? '' !!}</textarea>
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
                                            placeholder="Deskripsi">{!! $formElpPlcDuaMingguans->isNotEmpty() ? $formElpPlcDuaMingguans->catatan[0] : '' !!}</textarea>
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
            const countAccordionRow = $('.accordion').length;
            if (getSubstation == false) {
                $.alert({
                    icon: 'fas fa-exclamation-triangle',
                    title: 'Perhatian!',
                    type: 'warning',
                    content: 'SUBSTATION harus diisi!',
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
                                        <span style="font-weight: bold"
                                            class="col-12 d-flex justify-content-center fw-bolder">TEGANGAN POWER
                                            SUPPLY</span>
                                        <div class="col-6 form-group">
                                            <label class="d-flex justify-content-center">AC</label>
                                            <input type="number"
                                                class="form-control @error('tegangan_power_supply_ac.${countAccordionRow-1}') is-invalid @enderror"
                                                id="tegangan_power_supply_ac" name="tegangan_power_supply_ac[]"
                                                value="{{ old('tegangan_power_supply_ac.${countAccordionRow-1}') }}" step="0.1"
                                                min="0" placeholder="Enter..">

                                            @error('tegangan_power_supply_ac.${countAccordionRow-1}')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-6 form-group">
                                            <label class="d-flex justify-content-center">DC</label>
                                            <input type="number"
                                                class="form-control @error('tegangan_power_supply_dc.${countAccordionRow-1}') is-invalid @enderror"
                                                id="tegangan_power_supply_dc" name="tegangan_power_supply_dc[]"
                                                value="{{ old('tegangan_power_supply_dc.${countAccordionRow-1}') }}" step="0.1"
                                                min="0" placeholder="Enter..">

                                            @error('tegangan_power_supply_dc.${countAccordionRow-1}')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr class="border-primary">
                                    <div class="row">
                                        <div class="col-4 form-group">
                                            <br>
                                            <label class="d-flex justify-content-center">MODUL POWER SUPPLY</label>
                                            <select
                                                class="form-control select2 @error('modul_power_supply_power_ok.${countAccordionRow-1}') is-invalid @enderror"
                                                style="width: 100%; height:50px;" name="modul_power_supply_power_ok[]">
                                                <option value="">Choose Or Type Selection</option>
                                                <option value=&check;
                                                    {{ old('modul_power_supply_power_ok.${countAccordionRow-1}') == 'yes' ? 'selected' : '' }}>
                                                    &check;
                                                </option>
                                                <option value=&#10007;
                                                    {{ old('modul_power_supply_power_ok.${countAccordionRow-1}') == 'no' ? 'selected' : '' }}>
                                                    &#10007;
                                                </option>
                                                <option value=&minus;
                                                    {{ old('modul_power_supply_power_ok.${countAccordionRow-1}') == 'none' ? 'selected' : '' }}>
                                                    &minus;
                                                </option>

                                            </select>
                                            @error('modul_power_supply_power_ok.${countAccordionRow-1}')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-8">
                                            <div class="row">
                                                <span style="font-weight: bold"
                                                    class="col-12 d-flex justify-content-center fw-bolder">CPU</span>
                                                <div class="col-6 form-group">
                                                    <label class="d-flex justify-content-center">RUN</label>
                                                    <select
                                                        class="form-control select2 @error('cpu_run.${countAccordionRow-1}') is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name="cpu_run[]">
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value=&check;
                                                            {{ old('cpu_run.${countAccordionRow-1}') == 'yes' ? 'selected' : '' }}>
                                                            &check;
                                                        </option>
                                                        <option value=&#10007;
                                                            {{ old('cpu_run.${countAccordionRow-1}') == 'no' ? 'selected' : '' }}>
                                                            &#10007;
                                                        </option>
                                                        <option value=&minus;
                                                            {{ old('cpu_run.${countAccordionRow-1}') == 'none' ? 'selected' : '' }}>
                                                            &minus;
                                                        </option>

                                                    </select>
                                                    @error('cpu_run.${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-6 form-group">
                                                    <label class="d-flex justify-content-center">LCD</label>
                                                    <select
                                                        class="form-control select2 @error('cpu_lcd.${countAccordionRow-1}') is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name="cpu_lcd[]">
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value=&check;
                                                            {{ old('cpu_lcd.${countAccordionRow-1}') == 'yes' ? 'selected' : '' }}>
                                                            &check;
                                                        </option>
                                                        <option value=&#10007;
                                                            {{ old('cpu_lcd.${countAccordionRow-1}') == 'no' ? 'selected' : '' }}>
                                                            &#10007;
                                                        </option>
                                                        <option value=&minus;
                                                            {{ old('cpu_lcd.${countAccordionRow-1}') == 'none' ? 'selected' : '' }}>
                                                            &minus;
                                                        </option>

                                                    </select>
                                                    @error('cpu_lcd.${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="border-primary">
                                    <div class="row">
                                        <span style="font-weight: bold"
                                            class="col-12 d-flex justify-content-center fw-bolder">PTQ</span>
                                        <div class="col-4 form-group">
                                            <label class="d-flex justify-content-center">ACTIVE</label>
                                            <select
                                                class="form-control select2 @error('ptq_active.${countAccordionRow-1}') is-invalid @enderror"
                                                style="width: 100%; height:50px;" name="ptq_active[]">
                                                <option value="">Choose Or Type Selection</option>
                                                <option value=&check;
                                                    {{ old('ptq_active.${countAccordionRow-1}') == 'yes' ? 'selected' : '' }}>
                                                    &check;
                                                </option>
                                                <option value=&#10007;
                                                    {{ old('ptq_active.${countAccordionRow-1}') == 'no' ? 'selected' : '' }}>
                                                    &#10007;
                                                </option>
                                                <option value=&minus;
                                                    {{ old('ptq_active.${countAccordionRow-1}') == 'none' ? 'selected' : '' }}>
                                                    &minus;
                                                </option>

                                            </select>
                                            @error('ptq_active.${countAccordionRow-1}')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-4 form-group">
                                            <label class="d-flex justify-content-center">E DATA</label>
                                            <select
                                                class="form-control select2 @error('ptq_e_data.${countAccordionRow-1}') is-invalid @enderror"
                                                style="width: 100%; height:50px;" name="ptq_e_data[]">
                                                <option value="">Choose Or Type Selection</option>
                                                <option value=&check;
                                                    {{ old('ptq_e_data.${countAccordionRow-1}') == 'yes' ? 'selected' : '' }}>
                                                    &check;
                                                </option>
                                                <option value=&#10007;
                                                    {{ old('ptq_e_data.${countAccordionRow-1}') == 'no' ? 'selected' : '' }}>
                                                    &#10007;
                                                </option>
                                                <option value=&minus;
                                                    {{ old('ptq_e_data.${countAccordionRow-1}') == 'none' ? 'selected' : '' }}>
                                                    &minus;
                                                </option>

                                            </select>
                                            @error('ptq_e_data.${countAccordionRow-1}')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-4 form-group">
                                            <label class="d-flex justify-content-center">E LINK</label>
                                            <select
                                                class="form-control select2 @error('ptq_e_link.${countAccordionRow-1}') is-invalid @enderror"
                                                style="width: 100%; height:50px;" name="ptq_e_link[]">
                                                <option value="">Choose Or Type Selection</option>
                                                <option value=&check;
                                                    {{ old('ptq_e_link.${countAccordionRow-1}') == 'yes' ? 'selected' : '' }}>
                                                    &check;
                                                </option>
                                                <option value=&#10007;
                                                    {{ old('ptq_e_link.${countAccordionRow-1}') == 'no' ? 'selected' : '' }}>
                                                    &#10007;
                                                </option>
                                                <option value=&minus;
                                                    {{ old('ptq_e_link.${countAccordionRow-1}') == 'none' ? 'selected' : '' }}>
                                                    &minus;
                                                </option>

                                            </select>
                                            @error('ptq_e_link.${countAccordionRow-1}')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr class="border-primary">
                                    <div class="row">
                                        <div class="col-4 form-group">
                                            <label class="d-flex justify-content-center">DDI ACTIVE</label>
                                            <select
                                                class="form-control select2 @error('ddi_active.${countAccordionRow-1}') is-invalid @enderror"
                                                style="width: 100%; height:50px;" name="ddi_active[]">
                                                <option value="">Choose Or Type Selection</option>
                                                <option value=&check;
                                                    {{ old('ddi_active.${countAccordionRow-1}') == 'yes' ? 'selected' : '' }}>
                                                    &check;
                                                </option>
                                                <option value=&#10007;
                                                    {{ old('ddi_active.${countAccordionRow-1}') == 'no' ? 'selected' : '' }}>
                                                    &#10007;
                                                </option>
                                                <option value=&minus;
                                                    {{ old('ddi_active.${countAccordionRow-1}') == 'none' ? 'selected' : '' }}>
                                                    &minus;
                                                </option>

                                            </select>
                                            @error('ddi_active.${countAccordionRow-1}')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-4 form-group">
                                            <label class="d-flex justify-content-center">DRA ACTIVE</label>
                                            <select
                                                class="form-control select2 @error('dra_active.${countAccordionRow-1}') is-invalid @enderror"
                                                style="width: 100%; height:50px;" name="dra_active[]">
                                                <option value="">Choose Or Type Selection</option>
                                                <option value=&check;
                                                    {{ old('dra_active.${countAccordionRow-1}') == 'yes' ? 'selected' : '' }}>
                                                    &check;
                                                </option>
                                                <option value=&#10007;
                                                    {{ old('dra_active.${countAccordionRow-1}') == 'no' ? 'selected' : '' }}>
                                                    &#10007;
                                                </option>
                                                <option value=&minus;
                                                    {{ old('dra_active.${countAccordionRow-1}') == 'none' ? 'selected' : '' }}>
                                                    &minus;
                                                </option>

                                            </select>
                                            @error('dra_active.${countAccordionRow-1}')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-4 form-group">
                                            <label class="d-flex justify-content-center">NOE ACTIVE</label>
                                            <select
                                                class="form-control select2 @error('noe_active.${countAccordionRow-1}') is-invalid @enderror"
                                                style="width: 100%; height:50px;" name="noe_active[]">
                                                <option value="">Choose Or Type Selection</option>
                                                <option value=&check;
                                                    {{ old('noe_active.${countAccordionRow-1}') == 'yes' ? 'selected' : '' }}>
                                                    &check;
                                                </option>
                                                <option value=&#10007;
                                                    {{ old('noe_active.${countAccordionRow-1}') == 'no' ? 'selected' : '' }}>
                                                    &#10007;
                                                </option>
                                                <option value=&minus;
                                                    {{ old('noe_active.${countAccordionRow-1}') == 'none' ? 'selected' : '' }}>
                                                    &minus;
                                                </option>

                                            </select>
                                            @error('noe_active.${countAccordionRow-1}')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr class="border-primary">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="row">
                                                <span style="font-weight: bold"
                                                    class="col-12 d-flex justify-content-center fw-bolder">EGX</span>
                                                <div class="col-6 form-group">
                                                    <label class="d-flex justify-content-center">TX</label>
                                                    <select
                                                        class="form-control select2 @error('egx_tx.${countAccordionRow-1}') is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name="egx_tx[]">
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value=&check;
                                                            {{ old('egx_tx.${countAccordionRow-1}') == 'yes' ? 'selected' : '' }}>
                                                            &check;
                                                        </option>
                                                        <option value=&#10007;
                                                            {{ old('egx_tx.${countAccordionRow-1}') == 'no' ? 'selected' : '' }}>
                                                            &#10007;
                                                        </option>
                                                        <option value=&minus;
                                                            {{ old('egx_tx.${countAccordionRow-1}') == 'none' ? 'selected' : '' }}>
                                                            &minus;
                                                        </option>

                                                    </select>
                                                    @error('egx_tx.${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-6 form-group">
                                                    <label class="d-flex justify-content-center">RX</label>
                                                    <select
                                                        class="form-control select2 @error('egx_rx.${countAccordionRow-1}') is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name="egx_rx[]">
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value=&check;
                                                            {{ old('egx_rx.${countAccordionRow-1}') == 'yes' ? 'selected' : '' }}>
                                                            &check;
                                                        </option>
                                                        <option value=&#10007;
                                                            {{ old('egx_rx.${countAccordionRow-1}') == 'no' ? 'selected' : '' }}>
                                                            &#10007;
                                                        </option>
                                                        <option value=&minus;
                                                            {{ old('egx_rx.${countAccordionRow-1}') == 'none' ? 'selected' : '' }}>
                                                            &minus;
                                                        </option>

                                                    </select>
                                                    @error('egx_rx.${countAccordionRow-1}')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 form-group">
                                            <br>
                                            <label class="d-flex justify-content-center">CONEX ACTIVE</label>
                                            <select
                                                class="form-control select2 @error('conex_active.${countAccordionRow-1}') is-invalid @enderror"
                                                style="width: 100%; height:50px;" name="conex_active[]">
                                                <option value="">Choose Or Type Selection</option>
                                                <option value=&check;
                                                    {{ old('conex_active.${countAccordionRow-1}') == 'yes' ? 'selected' : '' }}>
                                                    &check;
                                                </option>
                                                <option value=&#10007;
                                                    {{ old('conex_active.${countAccordionRow-1}') == 'no' ? 'selected' : '' }}>
                                                    &#10007;
                                                </option>
                                                <option value=&minus;
                                                    {{ old('conex_active.${countAccordionRow-1}') == 'none' ? 'selected' : '' }}>
                                                    &minus;
                                                </option>

                                            </select>
                                            @error('conex_active.${countAccordionRow-1}')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr class="border-primary">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="d-flex justify-content-center">SUHU PLC</label>
                                                <input type="text"
                                                    class="form-control @error('suhu_plc.${countAccordionRow-1}') is-invalid @enderror"
                                                    id="suhu_plc" name="suhu_plc[]"
                                                    value="{{ old('suhu_plc.${countAccordionRow-1}') }}" placeholder="Enter..">

                                                @error('suhu_plc.${countAccordionRow-1}')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="d-flex justify-content-center">LAMPU</label>
                                                <select class="form-control @error('lampu.${countAccordionRow-1}') is-invalid @enderror"
                                                    name="lampu[]">
                                                    <option readonly selected>Choose Selection</option>
                                                    <option value="ON" {{ old('lampu') == 'ON' ? 'selected' : '' }}>
                                                        ON</option>
                                                    <option value="OFF" {{ old('lampu') == 'OFF' ? 'selected' : '' }}>
                                                        OFF</option>
                                                </select>

                                                @error('lampu.${countAccordionRow-1}')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="d-flex justify-content-center">FAN</label>
                                                <select class="form-control @error('fan.${countAccordionRow-1}') is-invalid @enderror"
                                                    name="fan[]">
                                                    <option readonly selected>Choose Selection</option>
                                                    <option value="ON" {{ old('fan') == 'ON' ? 'selected' : '' }}>
                                                        ON</option>
                                                    <option value="OFF" {{ old('fan') == 'OFF' ? 'selected' : '' }}>
                                                        OFF</option>
                                                </select>

                                                @error('fan.${countAccordionRow-1}')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="border-primary">
                                    <div class="form-group row">
                                        <label
                                            class="col-12 col-lg-3 control-label d-flex justify-content-center align-items-center">KETERANGAN</label>
                                        <div class="col-12 col-lg-9">

                                            <textarea name="keterangan[]" class="form-control @error('keterangan .${countAccordionRow-1}') is-invalid @enderror"
                                                id="keterangan" placeholder="Deskripsi"></textarea>
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
                        content: 'SUBSTATION harus diisi!',
                    });
                }
                console.log("berhenti count :" + countAccordionRow)
            });

        });

        $(document).ready(function() {
            $('.select2').select2({
                tags: true
            });
        });
    </script>
@endsection
