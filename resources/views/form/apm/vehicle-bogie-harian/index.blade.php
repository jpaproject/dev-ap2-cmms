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

        <form method="POST" action="{{ route('form.apm.vehicle-bogie-harian.update', $detailWorkOrderForm) }}"
            enctype="multipart/form-data" id="form2">
        
            @csrf
            @method('patch')
            @if ($formApmMekanikalVehicleBogieHarians->isNotEmpty())
                {{-- Guide Wheel --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir1">
                        <div class="card">
                            <div class="card-header" id="Air1">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir1" aria-expanded="true" aria-controls="collapseAir1"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Guide Wheel
                                    </button>
                                </h2>
                            </div>
                            @php
                                $number = 1;
                            @endphp

                            <div id="collapseAir1" class="collapse" aria-labelledby="1" data-parent="#accordionAir1">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieHarians as $key => $formApmMekanikalVehicleBogieHarian)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie_group == 'Guide Wheel')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie }}
                                                    @if($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie == 'Visual Check Guide Wheel')
                                                        {{ $number }}
                                                        @php
                                                            $number++;
                                                        @endphp
                                                    @elseif($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie == 'Rolling Check Guide Wheel')
                                                        {{ $number - 8 }}
                                                        @php
                                                            $number++;
                                                        @endphp
                                                    @endif
                                                </h4>
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                <textarea readonly name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieHarian->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Turnout Wheel --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir2">
                        <div class="card">
                            <div class="card-header" id="Air2">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir2" aria-expanded="true" aria-controls="collapseAir2"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Turnout Wheel
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir2" class="collapse" aria-labelledby="1" data-parent="#accordionAir2">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieHarians as $key => $formApmMekanikalVehicleBogieHarian)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie_group == 'Turnout Wheel')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie }}
                                                    @if($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie == 'Visual Check Turnout Wheel')
                                                        {{ $number - 16 }}
                                                        @php
                                                            $number++;
                                                        @endphp
                                                    @elseif($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie == 'Rolling Check Turnout Wheel')
                                                        {{ $number - 24 }}
                                                        @php
                                                            $number++;
                                                        @endphp
                                                    @endif
                                                </h4>
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                <textarea readonly name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieHarian->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Axle --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir3">
                        <div class="card">
                            <div class="card-header" id="Air3">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir3" aria-expanded="true" aria-controls="collapseAir3"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Axle
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir3" class="collapse" aria-labelledby="1" data-parent="#accordionAir3">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieHarians as $key => $formApmMekanikalVehicleBogieHarian)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie_group == 'Axle')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie }}
                                                    @if($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie == 'Visual check kondisi fisik axle')
                                                        {{ $number - 32 }}
                                                        @php
                                                            $number++;
                                                        @endphp
                                                    @elseif($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie == 'Visual check kondisi level Oli')
                                                        {{ $number - 34 }}
                                                        @php
                                                            $number++;
                                                        @endphp
                                                    @endif
                                                </h4>
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                <textarea readonly name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieHarian->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Bogie Frame --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir4">
                        <div class="card">
                            <div class="card-header" id="Air4">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir4" aria-expanded="true" aria-controls="collapseAir4"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Bogie Frame
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir4" class="collapse" aria-labelledby="1" data-parent="#accordionAir4">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieHarians as $key => $formApmMekanikalVehicleBogieHarian)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie_group == 'Bogie Frame')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie }}
                                                    @if($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie == 'Visual check kondisi fisik bogie frame')
                                                        {{ $number - 36 }}
                                                        @php
                                                            $number++;
                                                        @endphp
                                                    @endif
                                                </h4>
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                <textarea readonly name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieHarian->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Chamber & Chylinder --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir5">
                        <div class="card">
                            <div class="card-header" id="Air5">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir5" aria-expanded="true" aria-controls="collapseAir5"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Chamber & Chylinder
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir5" class="collapse" aria-labelledby="1" data-parent="#accordionAir5">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieHarians as $key => $formApmMekanikalVehicleBogieHarian)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie_group == 'Chamber & Chylinder')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie }}
                                                    @if($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie == 'Visual check kondisi fisik chamber & chylinder')
                                                        {{ $number - 38 }}
                                                        @php
                                                            $number++;
                                                        @endphp
                                                    @elseif($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie == 'Visual check kondisi level Oli chamber & chylinder')
                                                        {{ $number - 42 }}
                                                        @php
                                                            $number++;
                                                        @endphp
                                                    @endif
                                                </h4>
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                <textarea readonly name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieHarian->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Running Wheel --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir6">
                        <div class="card">
                            <div class="card-header" id="Air6">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir6" aria-expanded="true" aria-controls="collapseAir6"
                                        onclick="showHide(this)">
                                        <i class="font-weight-bold fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Running Wheel
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir6" class="collapse" aria-labelledby="1" data-parent="#accordionAir6">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieHarians as $key => $formApmMekanikalVehicleBogieHarian)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie_group == 'Running Wheel')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie }}
                                                    @if($formApmMekanikalVehicleBogieHarian->pemeriksaan_bogie == 'Visal Check Kondisi fisik Running Wheel')
                                                        {{ $number - 46 }}
                                                        @php
                                                            $number++;
                                                        @endphp
                                                    @endif
                                                </h4>
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieHarian->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                <textarea readonly name="referensi[]" class="form-control @error('referensi.' . $key) is-invalid @enderror" id="referensi"
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieHarian->referensi !!}</textarea>
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
                                    <div class="col-12">

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
