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

        <form method="POST" action="{{ route('form.apm.vehicle-bogie-tiga-bulanan.update', $detailWorkOrderForm) }}"
            enctype="multipart/form-data" id="form2">

            @csrf
            @method('patch')
            @if ($formApmMekanikalVehicleBogieTigaBulanans->isNotEmpty())
                {{-- Axle --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir1">
                        <div class="card">
                            <div class="card-header" id="Air1">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir1" aria-expanded="true" aria-controls="collapseAir1"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Axle
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir1" class="collapse" aria-labelledby="1" data-parent="#accordionAir1">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Axle')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}</h4>
                                                <h5>
                                                    @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi Gear Oli')
                                                        {{ '*Ganti Oli setiap 24.000km' }}
                                                    @endif
                                                </h5>
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Slewing Ring --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir2">
                        <div class="card">
                            <div class="card-header" id="Air2">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir2" aria-expanded="true" aria-controls="collapseAir2"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Slewing Ring
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir2" class="collapse" aria-labelledby="1" data-parent="#accordionAir2">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Slewing Ring')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}
                                                </h4>
                                                <h5>
                                                    @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi Grease')
                                                        {{ '*inject grease 3 bulan sekali' }}
                                                    @endif
                                                </h5>
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Leveling Valve --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir3">
                        <div class="card">
                            <div class="card-header" id="Air3">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir3" aria-expanded="true"
                                        aria-controls="collapseAir3" onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Leveling Valve
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir3" class="collapse" aria-labelledby="1"
                                data-parent="#accordionAir3">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Leveling Valve')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Differential Valve --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir4">
                        <div class="card">
                            <div class="card-header" id="Air4">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir4" aria-expanded="true"
                                        aria-controls="collapseAir4" onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Differential Valve
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir4" class="collapse" aria-labelledby="1"
                                data-parent="#accordionAir4">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Differential Valve')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Mean Pressure Valve --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir5">
                        <div class="card">
                            <div class="card-header" id="Air5">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir5" aria-expanded="true"
                                        aria-controls="collapseAir5" onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Mean Pressure Valve
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir5" class="collapse" aria-labelledby="1"
                                data-parent="#accordionAir5">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Mean Pressure Valve')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Air Spring --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir6">
                        <div class="card">
                            <div class="card-header" id="Air6">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir6" aria-expanded="true"
                                        aria-controls="collapseAir6" onclick="showHide(this)">
                                        <i class="font-weight-bold fas fa-chevron-up d-flex justify-content-end"
                                            id="accordion"></i>
                                        Air Spring
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir6" class="collapse" aria-labelledby="1"
                                data-parent="#accordionAir6">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Air Spring')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Vertical Damper --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir7">
                        <div class="card">
                            <div class="card-header" id="Air7">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir7" aria-expanded="true"
                                        aria-controls="collapseAir7" onclick="showHide(this)">
                                        <i class="font-weight-bold fas fa-chevron-up d-flex justify-content-end"
                                            id="accordion"></i>
                                        Vertical Damper
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir7" class="collapse" aria-labelledby="1"
                                data-parent="#accordionAir7">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Vertical Damper')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Lateral Damper --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir8">
                        <div class="card">
                            <div class="card-header" id="Air8">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir8" aria-expanded="true"
                                        aria-controls="collapseAir8" onclick="showHide(this)">
                                        <i class="font-weight-bold fas fa-chevron-up d-flex justify-content-end"
                                            id="accordion"></i>
                                        Lateral Damper
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir8" class="collapse" aria-labelledby="1"
                                data-parent="#accordionAir8">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Lateral Damper')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Brake caliper --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir9">
                        <div class="card">
                            <div class="card-header" id="Air9">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir9" aria-expanded="true"
                                        aria-controls="collapseAir9" onclick="showHide(this)">
                                        <i class="font-weight-bold fas fa-chevron-up d-flex justify-content-end"
                                            id="accordion"></i>
                                        Brake caliper
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir9" class="collapse" aria-labelledby="1"
                                data-parent="#accordionAir9">
                                <div class="card-body">
                                    @php
                                        $number = 1;
                                        $counter = 1;
                                    @endphp
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Brake caliper')
                                            <div class="col-12">
                                                <h4 style="text-align: center">

                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}
                                                    @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Pemeriksan Keausan Pad')
                                                        @php
                                                            $counter++;
                                                        @endphp
                                                        @if ($counter % 2 == 0)
                                                            {{ $number }}{{ 'R' }}
                                                        @elseif($counter % 2 != 0)
                                                            {{ $number }}{{ 'L' }}
                                                            @php
                                                                $number++;
                                                            @endphp
                                                        @endif
                                                        
                                                    @elseif($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Pengukuran Keausan Brake disc')
                                                        {{ $number - 4 }}
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Chamber & Cylinder --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir10">
                        <div class="card">
                            <div class="card-header" id="Air10">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir10" aria-expanded="true"
                                        aria-controls="collapseAir10" onclick="showHide(this)">
                                        <i class="font-weight-bold fas fa-chevron-up d-flex justify-content-end"
                                            id="accordion"></i>
                                        Chamber & Cylinder
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir10" class="collapse" aria-labelledby="1"
                                data-parent="#accordionAir10">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Chamber & Cylinder')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Proppeler shaft --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir11">
                        <div class="card">
                            <div class="card-header" id="Air11">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir11" aria-expanded="true"
                                        aria-controls="collapseAir11" onclick="showHide(this)">
                                        <i class="font-weight-bold fas fa-chevron-up d-flex justify-content-end"
                                            id="accordion"></i>
                                        Proppeler shaft
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir11" class="collapse" aria-labelledby="1"
                                data-parent="#accordionAir11">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Proppeler shaft')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Bogie frame --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir12">
                        <div class="card">
                            <div class="card-header" id="Air12">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir12" aria-expanded="true"
                                        aria-controls="collapseAir12" onclick="showHide(this)">
                                        <i class="font-weight-bold fas fa-chevron-up d-flex justify-content-end"
                                            id="accordion"></i>
                                        Bogie frame
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir12" class="collapse" aria-labelledby="1"
                                data-parent="#accordionAir12">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Bogie frame')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Running wheel --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir13">
                        <div class="card">
                            <div class="card-header" id="Air13">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir13" aria-expanded="true"
                                        aria-controls="collapseAir13" onclick="showHide(this)">
                                        <i class="font-weight-bold fas fa-chevron-up d-flex justify-content-end"
                                            id="accordion"></i>
                                        Running wheel
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir13" class="collapse" aria-labelledby="1"
                                data-parent="#accordionAir13">
                                <div class="card-body">
                                    @php
                                        $number ==1;
                                    @endphp
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Running wheel')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}
                                                    @if($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Mengukur nilai tekanan ban')
                                                        {{ $number-8 }}
                                                        @php
                                                            $number++;
                                                        @endphp
                                                    @elseif($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Mengukur nilai pengikisan ban')
                                                        {{ $number - 12 }}
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Lateral stopper --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir14">
                        <div class="card">
                            <div class="card-header" id="Air14">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir14" aria-expanded="true"
                                        aria-controls="collapseAir14" onclick="showHide(this)">
                                        <i class="font-weight-bold fas fa-chevron-up d-flex justify-content-end"
                                            id="accordion"></i>
                                        Lateral stopper
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir14" class="collapse" aria-labelledby="1"
                                data-parent="#accordionAir14">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Lateral stopper')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Pipe Bogie --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir15">
                        <div class="card">
                            <div class="card-header" id="Air15">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir15" aria-expanded="true"
                                        aria-controls="collapseAir15" onclick="showHide(this)">
                                        <i class="font-weight-bold fas fa-chevron-up d-flex justify-content-end"
                                            id="accordion"></i>
                                        Pipe Bogie
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir15" class="collapse" aria-labelledby="1"
                                data-parent="#accordionAir15">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Pipe Bogie')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Traction Link device --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir16">
                        <div class="card">
                            <div class="card-header" id="Air16">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir16" aria-expanded="true"
                                        aria-controls="collapseAir16" onclick="showHide(this)">
                                        <i class="font-weight-bold fas fa-chevron-up d-flex justify-content-end"
                                            id="accordion"></i>
                                        Traction Link device
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir16" class="collapse" aria-labelledby="1"
                                data-parent="#accordionAir16">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Traction Link device')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Anti-roll bar device --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir17">
                        <div class="card">
                            <div class="card-header" id="Air17">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir17" aria-expanded="true"
                                        aria-controls="collapseAir15" onclick="showHide(this)">
                                        <i class="font-weight-bold fas fa-chevron-up d-flex justify-content-end"
                                            id="accordion"></i>
                                        Anti-roll bar device
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir17" class="collapse" aria-labelledby="1"
                                data-parent="#accordionAir17">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Anti-roll bar device')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}
                                                </h4>
                                                <h5>
                                                    @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Kondisi Grease')
                                                        {{ '*inject grease 3 bulan sekali' }}
                                                    @endif
                                                </h5>
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Guide System --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir18">
                        <div class="card">
                            <div class="card-header" id="Air18">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir18" aria-expanded="true"
                                        aria-controls="collapseAir18" onclick="showHide(this)">
                                        <i class="font-weight-bold fas fa-chevron-up d-flex justify-content-end"
                                            id="accordion"></i>
                                        Guide System
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir18" class="collapse" aria-labelledby="1"
                                data-parent="#accordionAir18">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Guide System')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}
                                                    @if($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Pengukuran nilai diameter guide wheel')
                                                        {{ $number- 16 }}
                                                        @php
                                                            $number++;
                                                        @endphp
                                                    @elseif($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie == 'Pengukuran nilai diameter turnout wheel')
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Burst detector --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir19">
                        <div class="card">
                            <div class="card-header" id="Air19">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir19" aria-expanded="true"
                                        aria-controls="collapseAir15" onclick="showHide(this)">
                                        <i class="font-weight-bold fas fa-chevron-up d-flex justify-content-end"
                                            id="accordion"></i>
                                        Burst detector
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir19" class="collapse" aria-labelledby="1"
                                data-parent="#accordionAir19">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Burst detector')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Return Spring --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir20">
                        <div class="card">
                            <div class="card-header" id="Air20">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir20" aria-expanded="true"
                                        aria-controls="collapseAir15" onclick="showHide(this)">
                                        <i class="font-weight-bold fas fa-chevron-up d-flex justify-content-end"
                                            id="accordion"></i>
                                        Return Spring
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir20" class="collapse" aria-labelledby="1"
                                data-parent="#accordionAir20">
                                <div class="card-body">
                                    @foreach ($formApmMekanikalVehicleBogieTigaBulanans as $key => $formApmMekanikalVehicleBogieTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie_group == 'Return Spring')
                                            <div class="col-12">
                                                <h4 style="text-align: center">
                                                    {{ $formApmMekanikalVehicleBogieTigaBulanan->pemeriksaan_bogie }}
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmMekanikalVehicleBogieTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmMekanikalVehicleBogieTigaBulanan->referensi !!}</textarea>
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
