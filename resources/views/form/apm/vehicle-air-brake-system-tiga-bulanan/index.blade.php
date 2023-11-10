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
    </style>
@endsection

@section('content')

    <section class="content">

        <form method="POST" action="{{ route('form.apm.vehicle-air-brake-system-tiga-bulanan.update', $detailWorkOrderForm) }}"
            enctype="multipart/form-data" id="form2">

            @csrf
            @method('patch')
            @if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanans->isNotEmpty())
                {{-- Air Compressor --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir1">
                        <div class="card">
                            <div class="card-header" id="Air1">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir1" aria-expanded="true" aria-controls="collapseAir1"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Air Compressor
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir1" class="collapse" aria-labelledby="1" data-parent="#accordionAir1">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleAirBrakeSystemTigaBulanans as $key => $formApmMekanikalVehicleAirBrakeSystemTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group == 'Air Compressor')
                                        
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="container-fluid">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            2</label>
                                                        <input type="hidden" name="hasil_mc1[]" value="">
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="form-group row">
                                                <label class="d-flex justify-content-center">Referensi</label>
                                                <textarea name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Safety Valve --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir2">
                        <div class="card">
                            <div class="card-header" id="Air2">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir2" aria-expanded="true" aria-controls="collapseAir2"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Safety Valve
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir2" class="collapse" aria-labelledby="1" data-parent="#accordionAir2">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleAirBrakeSystemTigaBulanans as $key => $formApmMekanikalVehicleAirBrakeSystemTigaBulanan)
                                    
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group == 'Safety Valve')
                                        <input type="hidden" name="hasil_mc1[]" value="">
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="container-fluid">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="form-group row">
                                                <label class="d-flex justify-content-center">Referensi</label>
                                                <textarea name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Twin Tower Air Dryer --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir3">
                        <div class="card">
                            <div class="card-header" id="Air3">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir3" aria-expanded="true" aria-controls="collapseAir3"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Twin Tower Air Dryer
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir3" class="collapse" aria-labelledby="1" data-parent="#accordionAir3">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleAirBrakeSystemTigaBulanans as $key => $formApmMekanikalVehicleAirBrakeSystemTigaBulanan)
                                    
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group == 'Twin Tower Air Dryer')
                                        <input type="hidden" name="hasil_mc1[]" value="">
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="container-fluid">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="form-group row">
                                                <label class="d-flex justify-content-center">Referensi</label>
                                                <textarea name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Micro Filter --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir4">
                        <div class="card">
                            <div class="card-header" id="Air4">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir4" aria-expanded="true" aria-controls="collapseAir4"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Micro Filter
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir4" class="collapse" aria-labelledby="1" data-parent="#accordionAir4">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleAirBrakeSystemTigaBulanans as $key => $formApmMekanikalVehicleAirBrakeSystemTigaBulanan)
                                    
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group == 'Micro Filter')
                                        <input type="hidden" name="hasil_mc1[]" value="">
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="container-fluid">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="form-group row">
                                                <label class="d-flex justify-content-center">Referensi</label>
                                                <textarea name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Pressure Switch --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir5">
                        <div class="card">
                            <div class="card-header" id="Air5">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir5" aria-expanded="true" aria-controls="collapseAir5"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Pressure Switch
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir5" class="collapse" aria-labelledby="1" data-parent="#accordionAir5">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleAirBrakeSystemTigaBulanans as $key => $formApmMekanikalVehicleAirBrakeSystemTigaBulanan)
                                    
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group == 'Pressure Switch')
                                        <input type="hidden" name="hasil_mc1[]" value="">
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="container-fluid">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="form-group row">
                                                <label class="d-flex justify-content-center">Referensi</label>
                                                <textarea name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Cut Out Cock woth S-V&E-S --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir6">
                        <div class="card">
                            <div class="card-header" id="Air6">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir6" aria-expanded="true" aria-controls="collapseAir6"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Cut Out Cock woth S-V&E-S
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir6" class="collapse" aria-labelledby="1" data-parent="#accordionAir6">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleAirBrakeSystemTigaBulanans as $key => $formApmMekanikalVehicleAirBrakeSystemTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group == 'Cut Out Cock woth S-V&E-S')
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            1</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc1.' . $key) is-invalid @enderror"
                                                            name="hasil_mc1[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="d-flex justify-content-center">Referensi</label>
                                                <textarea name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Air Filter --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir7">
                        <div class="card">
                            <div class="card-header" id="Air7">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir7" aria-expanded="true" aria-controls="collapseAir7"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Air Filter
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir7" class="collapse" aria-labelledby="1" data-parent="#accordionAir7">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleAirBrakeSystemTigaBulanans as $key => $formApmMekanikalVehicleAirBrakeSystemTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group == 'Air Filter')
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            1</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc1.' . $key) is-invalid @enderror"
                                                            name="hasil_mc1[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="d-flex justify-content-center">Referensi</label>
                                                <textarea name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MS15 Air Filter --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir8">
                        <div class="card">
                            <div class="card-header" id="Air8">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir8" aria-expanded="true" aria-controls="collapseAir8"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        MS15 Air Filter
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir8" class="collapse" aria-labelledby="1" data-parent="#accordionAir8">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleAirBrakeSystemTigaBulanans as $key => $formApmMekanikalVehicleAirBrakeSystemTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group == 'MS15 Air Filter')
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            1</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc1.' . $key) is-invalid @enderror"
                                                            name="hasil_mc1[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="d-flex justify-content-center">Referensi</label>
                                                <textarea name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Cut Out Cock --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir9">
                        <div class="card">
                            <div class="card-header" id="Air9">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir9" aria-expanded="true" aria-controls="collapseAir9"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Cut Out Cock
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir9" class="collapse" aria-labelledby="1" data-parent="#accordionAir9">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleAirBrakeSystemTigaBulanans as $key => $formApmMekanikalVehicleAirBrakeSystemTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group == 'Cut Out Cock')
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            1</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc1.' . $key) is-invalid @enderror"
                                                            name="hasil_mc1[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="d-flex justify-content-center">Referensi</label>
                                                <textarea name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Cut Out Cock with Side vent --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir10">
                        <div class="card">
                            <div class="card-header" id="Air10">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir10" aria-expanded="true" aria-controls="collapseAir10"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Cut Out Cock with Side vent
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir10" class="collapse" aria-labelledby="1" data-parent="#accordionAir10">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleAirBrakeSystemTigaBulanans as $key => $formApmMekanikalVehicleAirBrakeSystemTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group == 'Cut Out Cock with Side vent')
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            1</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc1.' . $key) is-invalid @enderror"
                                                            name="hasil_mc1[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="d-flex justify-content-center">Referensi</label>
                                                <textarea name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- EP Brake Valve --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir11">
                        <div class="card">
                            <div class="card-header" id="Air11">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir11" aria-expanded="true" aria-controls="collapseAir11"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        EP Brake Valve
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir11" class="collapse" aria-labelledby="1" data-parent="#accordionAir11">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleAirBrakeSystemTigaBulanans as $key => $formApmMekanikalVehicleAirBrakeSystemTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group == 'EP Brake Valve')
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            1</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc1.' . $key) is-invalid @enderror"
                                                            name="hasil_mc1[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="d-flex justify-content-center">Referensi</label>
                                                <textarea name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Parking Brake Unit --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir12">
                        <div class="card">
                            <div class="card-header" id="Air12">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir12" aria-expanded="true" aria-controls="collapseAir12"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Parking Brake Unit
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir12" class="collapse" aria-labelledby="1" data-parent="#accordionAir12">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleAirBrakeSystemTigaBulanans as $key => $formApmMekanikalVehicleAirBrakeSystemTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group == 'Parking Brake Unit')
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            1</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc1.' . $key) is-invalid @enderror"
                                                            name="hasil_mc1[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="d-flex justify-content-center">Referensi</label>
                                                <textarea name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Check Valve --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir13">
                        <div class="card">
                            <div class="card-header" id="Air13">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir13" aria-expanded="true" aria-controls="collapseAir13"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Check Valve
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir13" class="collapse" aria-labelledby="1" data-parent="#accordionAir13">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleAirBrakeSystemTigaBulanans as $key => $formApmMekanikalVehicleAirBrakeSystemTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group == 'Check Valve')
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            1</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc1.' . $key) is-invalid @enderror"
                                                            name="hasil_mc1[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="d-flex justify-content-center">Referensi</label>
                                                <textarea name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Test Fitting --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir14">
                        <div class="card">
                            <div class="card-header" id="Air14">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir14" aria-expanded="true" aria-controls="collapseAir14"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Test Fitting
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir14" class="collapse" aria-labelledby="1" data-parent="#accordionAir14">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleAirBrakeSystemTigaBulanans as $key => $formApmMekanikalVehicleAirBrakeSystemTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system_group == 'Test Fitting')
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->pemeriksaan_air_brake_system }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            1</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc1.' . $key) is-invalid @enderror"
                                                            name="hasil_mc1[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC
                                                            2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="d-flex justify-content-center">Referensi</label>
                                                <textarea name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleAirBrakeSystemTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
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
                                        class="col-12 col-lg-3 control-label d-flex justify-content-center align-items-center">Catatan</label>
                                    <div class="col-12 col-lg-9">

                                        <textarea name="catatan" class="form-control @error('catatan.' . $key) is-invalid @enderror" id="catatan"
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
            if (child.hasClass('fa-chevron-up')) {
                child.removeClass('fa-chevron-up').addClass('fa-chevron-down');; // logs "This is the child element"
            } else if (child.hasClass('fa-chevron-down')) {
                child.removeClass('fa-chevron-down').addClass('fa-chevron-up'); // logs "This is the child element"
            }
        }
    </script>
@endsection
