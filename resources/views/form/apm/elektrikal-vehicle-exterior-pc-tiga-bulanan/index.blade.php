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

        <form method="POST" action="{{ route('form.apm.elektrikal-vehicle-exterior-pc-tiga-bulanan.update', $detailWorkOrderForm) }}"
            enctype="multipart/form-data" id="form2">

            @csrf
            @method('patch')
            @if ($formApmElektrikalVehicleExteriorPCTigaBulanans->isNotEmpty())

                {{-- POWER COLLECTOR (MC 1) [PC 1 & PC 2] --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir7">
                        <div class="card">
                            <div class="card-header" id="Air7">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir7" aria-expanded="true" aria-controls="collapseAir7"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        POWER COLLECTOR (MC 1) [PC 1 & PC 2]
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir7" class="collapse" aria-labelledby="1" data-parent="#accordionAir7">
                                <div class="card-body">
                                    @foreach ($formApmElektrikalVehicleExteriorPCTigaBulanans as $key => $formApmElektrikalVehicleExteriorPCTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc_group == 'POWER COLLECTOR (MC 1)')
                                        @if ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc == 'Kondisi ketebalan Power Collector Shoe')
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                                    <h5>{{ $formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc }}</h5>
                                                </div>
                                                <div class="col-12 col-lg-9">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">PC 1 (+)
                                                                    </label>
                                                                    <textarea type="text" name="hasil_pc1_plus[]" class="container-fluid" placeholder="Masukan Hasil Pengukuran"></textarea>

                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">PC 1 (-)
                                                                    </label>
                                                                    <textarea type="text" name="hasil_pc1_min[]" class="container-fluid" placeholder="Masukan Hasil Pengukuran"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">PC 2 (+)
                                                                    </label>
                                                                    <textarea type="text" name="hasil_pc2_plus[]" class="container-fluid" placeholder="Masukan Hasil Pengukuran"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">PC 2 (-)
                                                                    </label>
                                                                    <textarea type="text" name="hasil_pc2_min[]" class="container-fluid" placeholder="Masukan Hasil Pengukuran"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="d-flex justify-content-center">Referensi</label>
                                                            <textarea name="referensi[]" class="form-control @error('referensi.'.$key) is-invalid @enderror"
                                                                id="referensi" placeholder="Referensi">{!! $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi !!}</textarea>
                                                    </div>
                                            @else
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PC 1 (+)</label>
                                                        <select
                                                            class="form-control  @error('hasil_pc1_plus.' . $key) is-invalid @enderror"
                                                            name="hasil_pc1_plus[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_pc1_plus.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc1_plus == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc1_plus.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc1_plus == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_pc1_plus.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PC 1 (-)</label>
                                                        <select
                                                            class="form-control  @error('hasil_pc1_min.' . $key) is-invalid @enderror"
                                                            name="hasil_pc1_min[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_pc1_min.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc1_min == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc1_min.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc1_min == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_pc1_min.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PC 2 (+)</label>
                                                        <select
                                                            class="form-control  @error('hasil_pc2_plus.' . $key) is-invalid @enderror"
                                                            name="hasil_pc2_plus[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_pc2_plus.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc2_plus == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc2_plus.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc2_plus == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_pc2_plus.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PC 2 (-)</label>
                                                        <select
                                                            class="form-control  @error('hasil_pc2_min.' . $key) is-invalid @enderror"
                                                            name="hasil_pc2_min[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_pc2_min.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc2_min == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc2_min.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc2_min == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_pc2_min.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>

                {{-- POWER COLLECTOR (MC 1) [PC 3 & PC 4] --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir8">
                        <div class="card">
                            <div class="card-header" id="Air8">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir8" aria-expanded="true" aria-controls="collapseAir8"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        POWER COLLECTOR (MC 1) [PC 3 & PC 4]
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir8" class="collapse" aria-labelledby="1" data-parent="#accordionAir8">
                                <div class="card-body">
                                    @foreach ($formApmElektrikalVehicleExteriorPCTigaBulanans as $key => $formApmElektrikalVehicleExteriorPCTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc_group == 'POWER COLLECTOR (MC 1)')
                                        @if ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc == 'Kondisi ketebalan Power Collector Shoe')
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                                    <h5>{{ $formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc }}</h5>
                                                </div>
                                                <div class="col-12 col-lg-9">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">PC 3 (+)
                                                                    </label>
                                                                    <textarea type="text" name="hasil_pc3_plus[]" class="container-fluid" placeholder="Masukan Hasil Pengukuran"></textarea>

                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">PC 3 (-)
                                                                    </label>
                                                                    <textarea type="text" name="hasil_pc3_min[]" class="container-fluid" placeholder="Masukan Hasil Pengukuran"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">PC 4 (+)
                                                                    </label>
                                                                    <textarea type="text" name="hasil_pc4_plus[]" class="container-fluid" placeholder="Masukan Hasil Pengukuran"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">PC 4 (-)
                                                                    </label>
                                                                    <textarea type="text" name="hasil_pc4_min[]" class="container-fluid" placeholder="Masukan Hasil Pengukuran"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="d-flex justify-content-center">Referensi</label>
                                                            <textarea name="referensi[]" class="form-control @error('referensi.'.$key) is-invalid @enderror"
                                                                id="referensi" placeholder="Referensi">{!! $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi !!}</textarea>
                                                    </div>
                                            @else
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PC 3 (+)</label>
                                                        <select
                                                            class="form-control  @error('hasil_pc3_plus.' . $key) is-invalid @enderror"
                                                            name="hasil_pc3_plus[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_pc3_plus.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc3_plus == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc3_plus.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc3_plus == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_pc3_plus.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PC 3 (-)</label>
                                                        <select
                                                            class="form-control  @error('hasil_pc3_min.' . $key) is-invalid @enderror"
                                                            name="hasil_pc3_min[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_pc3_min.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc3_min == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc3_min.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc3_min == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_pc3_min.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PC 4 (+)</label>
                                                        <select
                                                            class="form-control  @error('hasil_pc4_plus.' . $key) is-invalid @enderror"
                                                            name="hasil_pc4_plus[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_pc4_plus.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc4_plus == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc4_plus.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc4_plus == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_pc4_plus.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PC 4 (-)</label>
                                                        <select
                                                            class="form-control  @error('hasil_pc4_min.' . $key) is-invalid @enderror"
                                                            name="hasil_pc4_min[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_pc4_min.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc4_min == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc4_min.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc4_min == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_pc4_min.' . $key)
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
                                                    placeholder="Referensi">{!! $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi !!}</textarea>
                                            </div>
                                        
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                {{-- POWER COLLECTOR (MC 2) [PC 1 & PC 2] --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir9">
                        <div class="card">
                            <div class="card-header" id="Air9">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir9" aria-expanded="true" aria-controls="collapseAir9"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        POWER COLLECTOR (MC 2) [PC 1 & PC 2]
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir9" class="collapse" aria-labelledby="1" data-parent="#accordionAir9">
                                <div class="card-body">
                                    @foreach ($formApmElektrikalVehicleExteriorPCTigaBulanans as $key => $formApmElektrikalVehicleExteriorPCTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc_group == 'POWER COLLECTOR (MC 2)')
                                        @if ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc == 'Kondisi ketebalan Power Collector Shoe')
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                                    <h5>{{ $formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc }}</h5>
                                                </div>
                                                <div class="col-12 col-lg-9">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">PC 1 (+)
                                                                    </label>
                                                                    <textarea type="text" name="hasil_pc1_plus[]" class="container-fluid" placeholder="Masukan Hasil Pengukuran"></textarea>

                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">PC 1 (-)
                                                                    </label>
                                                                    <textarea type="text" name="hasil_pc1_min[]" class="container-fluid" placeholder="Masukan Hasil Pengukuran"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">PC 2 (+)
                                                                    </label>
                                                                    <textarea type="text" name="hasil_pc2_plus[]" class="container-fluid" placeholder="Masukan Hasil Pengukuran"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">PC 2 (-)
                                                                    </label>
                                                                    <textarea type="text" name="hasil_pc2_min[]" class="container-fluid" placeholder="Masukan Hasil Pengukuran"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="d-flex justify-content-center">Referensi</label>
                                                            <textarea name="referensi[]" class="form-control @error('referensi.'.$key) is-invalid @enderror"
                                                                id="referensi" placeholder="Referensi">{!! $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi !!}</textarea>
                                                    </div>
                                            @else
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PC 1 (+)</label>
                                                        <select
                                                            class="form-control  @error('hasil_pc1_plus.' . $key) is-invalid @enderror"
                                                            name="hasil_pc1_plus[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_pc1_plus.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc1_plus == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc1_plus.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc1_plus == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_pc1_plus.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PC 1 (-)</label>
                                                        <select
                                                            class="form-control  @error('hasil_pc1_min.' . $key) is-invalid @enderror"
                                                            name="hasil_pc1_min[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_pc1_min.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc1_min == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc1_min.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc1_min == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_pc1_min.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PC 2 (+)</label>
                                                        <select
                                                            class="form-control  @error('hasil_pc2_plus.' . $key) is-invalid @enderror"
                                                            name="hasil_pc2_plus[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_pc2_plus.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc2_plus == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc2_plus.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc2_plus == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_pc2_plus.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PC 2 (-)</label>
                                                        <select
                                                            class="form-control  @error('hasil_pc2_min.' . $key) is-invalid @enderror"
                                                            name="hasil_pc2_min[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_pc2_min.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc2_min == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc2_min.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc2_min == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_pc2_min.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>

                {{-- POWER COLLECTOR (MC 2) [PC 3 & PC 4] --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir10">
                        <div class="card">
                            <div class="card-header" id="Air10">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir10" aria-expanded="true" aria-controls="collapseAir10"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        POWER COLLECTOR (MC 2) [PC 3 & PC 4]
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir10" class="collapse" aria-labelledby="1" data-parent="#accordionAir10">
                                <div class="card-body">
                                    @foreach ($formApmElektrikalVehicleExteriorPCTigaBulanans as $key => $formApmElektrikalVehicleExteriorPCTigaBulanan)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc_group == 'POWER COLLECTOR (MC 2)')
                                        @if ($formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc == 'Kondisi ketebalan Power Collector Shoe')
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                                    <h5>{{ $formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc }}</h5>
                                                </div>
                                                <div class="col-12 col-lg-9">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">PC 3 (+)
                                                                    </label>
                                                                    <textarea type="text" name="hasil_pc3_plus[]" class="container-fluid" placeholder="Masukan Hasil Pengukuran"></textarea>

                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">PC 3 (-)
                                                                    </label>
                                                                    <textarea type="text" name="hasil_pc3_min[]" class="container-fluid" placeholder="Masukan Hasil Pengukuran"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">PC 4 (+)
                                                                    </label>
                                                                    <textarea type="text" name="hasil_pc4_plus[]" class="container-fluid" placeholder="Masukan Hasil Pengukuran"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">PC 4 (-)
                                                                    </label>
                                                                    <textarea type="text" name="hasil_pc4_min[]" class="container-fluid" placeholder="Masukan Hasil Pengukuran"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="d-flex justify-content-center">Referensi</label>
                                                            <textarea name="referensi[]" class="form-control @error('referensi.'.$key) is-invalid @enderror"
                                                                id="referensi" placeholder="Referensi">{!! $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi !!}</textarea>
                                                    </div>
                                            @else
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleExteriorPCTigaBulanan->pemeriksaan_pc }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PC 3 (+)</label>
                                                        <select
                                                            class="form-control  @error('hasil_pc3_plus.' . $key) is-invalid @enderror"
                                                            name="hasil_pc3_plus[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_pc3_plus.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc3_plus == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc3_plus.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc3_plus == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_pc3_plus.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PC 3 (-)</label>
                                                        <select
                                                            class="form-control  @error('hasil_pc3_min.' . $key) is-invalid @enderror"
                                                            name="hasil_pc3_min[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_pc3_min.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc3_min == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc3_min.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc3_min == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_pc3_min.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PC 4 (+)</label>
                                                        <select
                                                            class="form-control  @error('hasil_pc4_plus.' . $key) is-invalid @enderror"
                                                            name="hasil_pc4_plus[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_pc4_plus.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc4_plus == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc4_plus.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc4_plus == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_pc4_plus.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PC 4 (-)</label>
                                                        <select
                                                            class="form-control  @error('hasil_pc4_min.' . $key) is-invalid @enderror"
                                                            name="hasil_pc4_min[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_pc4_min.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc4_min == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc4_min.' . $key) ?? $formApmElektrikalVehicleExteriorPCTigaBulanan->hasil_pc4_min == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_pc4_min.' . $key)
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
                                                    placeholder="Referensi">{!! $formApmElektrikalVehicleExteriorPCTigaBulanan->referensi !!}</textarea>
                                            </div>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
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
