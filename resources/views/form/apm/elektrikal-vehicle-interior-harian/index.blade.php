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
@php
    $number = range(1, 10);
    $alphabet = range('A', 'Z');
@endphp
@php
    $number = 0;
@endphp

    <section class="content">

        <form method="POST" action="{{ route('form.apm.elektrikal-vehicle-interior-harian.update', $detailWorkOrderForm) }}"
            enctype="multipart/form-data" id="form2">

            @csrf
            @method('patch')
            @if ($formApmElektrikalVehicleInteriorHarians->isNotEmpty())
                {{-- 1 --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir7">
                        <div class="card">
                            <div class="card-header" id="Air7">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir7" aria-expanded="true" aria-controls="collapseAir7"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        LED PASSANGER LIGHT
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir7" class="collapse" aria-labelledby="1" data-parent="#accordionAir7">
                                <div class="card-body">
                                    @foreach ($formApmElektrikalVehicleInteriorHarians as $key => $formApmElektrikalVehicleInteriorHarian)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior_group == 'LED PASSANGER LIGHT')
                                        <input type="hidden" name="hasil_door1[]" value="">
                                        <input type="hidden" name="hasil_door2[]" value="">
                                        <input type="hidden" name="hasil_door3[]" value="">
                                        <input type="hidden" name="hasil_door4[]" value="">
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC 1</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc1.' . $key) is-invalid @enderror"
                                                            name="hasil_mc1[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                        <label class="d-flex justify-content-center">MC 2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmElektrikalVehicleInteriorHarian->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 2 --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir8">
                        <div class="card">
                            <div class="card-header" id="Air8">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir8" aria-expanded="true" aria-controls="collapseAir8"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        FIRE DETECTION SYSTEM
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir8" class="collapse" aria-labelledby="1" data-parent="#accordionAir8">
                                <div class="card-body">
                                    @foreach ($formApmElektrikalVehicleInteriorHarians as $key => $formApmElektrikalVehicleInteriorHarian)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior_group == 'FIRE DETECTION SYSTEM')
                                        <input type="hidden" name="hasil_door1[]" value="">
                                        <input type="hidden" name="hasil_door2[]" value="">
                                        <input type="hidden" name="hasil_door3[]" value="">
                                        <input type="hidden" name="hasil_door4[]" value="">
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior }}</h4>
                                                    @if($formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior == 'Visual Check Kondisi sensor Fire Detection System')
                                                        {{ $alphabet[$number] }}{{ ".Sensor " }}{{ $number }}
                                                        @php
                                                            $number++;
                                                        @endphp
                                                    @endif
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC 1</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc1.' . $key) is-invalid @enderror"
                                                            name="hasil_mc1[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                        <label class="d-flex justify-content-center">MC 2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmElektrikalVehicleInteriorHarian->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 3 --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir9">
                        <div class="card">
                            <div class="card-header" id="Air9">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir9" aria-expanded="true" aria-controls="collapseAir9"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        KONDISI SEMUA PANEL/BOX
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir9" class="collapse" aria-labelledby="1" data-parent="#accordionAir9">
                                <div class="card-body">
                                    @foreach ($formApmElektrikalVehicleInteriorHarians as $key => $formApmElektrikalVehicleInteriorHarian)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior_group == 'KONDISI SEMUA PANEL/BOX')
                                        <input type="hidden" name="hasil_door1[]" value="">
                                        <input type="hidden" name="hasil_door2[]" value="">
                                        <input type="hidden" name="hasil_door3[]" value="">
                                        <input type="hidden" name="hasil_door4[]" value="">
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC 1</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc1.' . $key) is-invalid @enderror"
                                                            name="hasil_mc1[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                        <label class="d-flex justify-content-center">MC 2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmElektrikalVehicleInteriorHarian->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 4 --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir10">
                        <div class="card">
                            <div class="card-header" id="Air10">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir10" aria-expanded="true" aria-controls="collapseAir10"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        MASTER CONTROL
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir10" class="collapse" aria-labelledby="1" data-parent="#accordionAir10">
                                <div class="card-body">
                                    @foreach ($formApmElektrikalVehicleInteriorHarians as $key => $formApmElektrikalVehicleInteriorHarian)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior_group == 'MASTER CONTROL')
                                        <input type="hidden" name="hasil_door1[]" value="">
                                        <input type="hidden" name="hasil_door2[]" value="">
                                        <input type="hidden" name="hasil_door3[]" value="">
                                        <input type="hidden" name="hasil_door4[]" value="">
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC 1</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc1.' . $key) is-invalid @enderror"
                                                            name="hasil_mc1[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                        <label class="d-flex justify-content-center">MC 2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmElektrikalVehicleInteriorHarian->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 5 --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir11">
                        <div class="card">
                            <div class="card-header" id="Air11">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir11" aria-expanded="true" aria-controls="collapseAir11"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        DOOR SYSTEM (MC 1)
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir11" class="collapse" aria-labelledby="1" data-parent="#accordionAir11">
                                <div class="card-body">
                                    @foreach ($formApmElektrikalVehicleInteriorHarians as $key => $formApmElektrikalVehicleInteriorHarian)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior_group == 'DOOR SYSTEM (MC 1)')
                                        <input type="hidden" name="hasil_mc1[]" value="">
                                        <input type="hidden" name="hasil_mc2[]" value="">
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">DOOR 1</label>
                                                        <select
                                                            class="form-control  @error('hasil_door1.' . $key) is-invalid @enderror"
                                                            name="hasil_door1[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_door1.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_door1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_door1.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_door1 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_door1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">DOOR 2</label>
                                                        <select
                                                            class="form-control  @error('hasil_door2.' . $key) is-invalid @enderror"
                                                            name="hasil_door2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_door2.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_door2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_door2.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_door2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_door2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">DOOR 3</label>
                                                        <select
                                                            class="form-control  @error('hasil_door3.' . $key) is-invalid @enderror"
                                                            name="hasil_door3[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_door3.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_door3 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_door3.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_door3 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_door3.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">DOOR 4</label>
                                                        <select
                                                            class="form-control  @error('hasil_door4.' . $key) is-invalid @enderror"
                                                            name="hasil_door4[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_door4.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_door4 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_door4.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_door4 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_door4.' . $key)
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
                                                    placeholder="Referensi">{!! $formApmElektrikalVehicleInteriorHarian->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 6 --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir12">
                        <div class="card">
                            <div class="card-header" id="Air12">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir12" aria-expanded="true" aria-controls="collapseAir12"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        DOOR SYSTEM (MC 2)
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir12" class="collapse" aria-labelledby="1" data-parent="#accordionAir12">
                                <div class="card-body">
                                    @foreach ($formApmElektrikalVehicleInteriorHarians as $key => $formApmElektrikalVehicleInteriorHarian)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior_group == 'DOOR SYSTEM (MC 2)')
                                        <input type="hidden" name="hasil_mc1[]" value="">
                                        <input type="hidden" name="hasil_mc2[]" value="">
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleInteriorHarian->pemeriksaan_exterior }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">DOOR 1</label>
                                                        <select
                                                            class="form-control  @error('hasil_door1.' . $key) is-invalid @enderror"
                                                            name="hasil_door1[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_door1.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_door1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_door1.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_door1 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_door1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">DOOR 2</label>
                                                        <select
                                                            class="form-control  @error('hasil_door2.' . $key) is-invalid @enderror"
                                                            name="hasil_door2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_door2.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_door2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_door2.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_door2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_door2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">DOOR 3</label>
                                                        <select
                                                            class="form-control  @error('hasil_door3.' . $key) is-invalid @enderror"
                                                            name="hasil_door3[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_door3.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_door3 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_door3.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_door3 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_door3.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">DOOR 4</label>
                                                        <select
                                                            class="form-control  @error('hasil_door4.' . $key) is-invalid @enderror"
                                                            name="hasil_door4[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_door4.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_door4 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_door4.' . $key) ?? $formApmElektrikalVehicleInteriorHarian->hasil_door4 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_door4.' . $key)
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
                                                    placeholder="Referensi">{!! $formApmElektrikalVehicleInteriorHarian->referensi !!}</textarea>
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
