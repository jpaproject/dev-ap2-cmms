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

        <form method="POST" action="{{ route('form.apm.elektrikal-vehicle-exterior-harian.update', $detailWorkOrderForm) }}"
            enctype="multipart/form-data" id="form2">

            @csrf
            @method('patch')
            @if ($formApmElektrikalVehicleExteriorHarians->isNotEmpty())

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
                                    @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group == 'POWER COLLECTOR (MC 1)')
                                        <input type="hidden" name="hasil_mc1[]" value="">
                                        <input type="hidden" name="hasil_mc2[]" value="">
                                        <input type="hidden" name="hasil_tm1[]" value="">
                                        <input type="hidden" name="hasil_tm2[]" value="">
                                        <input type="hidden" name="hasil_tm3[]" value="">
                                        <input type="hidden" name="hasil_tm4[]" value="">
                                        <input type="hidden" name="hasil_1_led1[]" value="">
                                        <input type="hidden" name="hasil_1_led2[]" value="">
                                        <input type="hidden" name="hasil_jp_hjb[]" value="">
                                        <input type="hidden" name="hasil_jp_ljb[]" value="">
                                        <input type="hidden" name="hasil_2_led1[]" value="">
                                        <input type="hidden" name="hasil_2_led2[]" value="">
                                        
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}</h4>
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
                                                                {{ old('hasil_pc1_plus.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc1_plus == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc1_plus.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc1_plus == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_pc1_min.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc1_min == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc1_min.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc1_min == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_pc2_plus.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc2_plus == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc2_plus.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc2_plus == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_pc2_min.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc2_min == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc2_min.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc2_min == 'nok' ? 'selected' : '' }}>
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
                                    @endforeach
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
                                    @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group == 'POWER COLLECTOR (MC 1)')
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}</h4>
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
                                                                {{ old('hasil_pc3_plus.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc3_plus == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc3_plus.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc3_plus == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_pc3_min.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc3_min == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc3_min.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc3_min == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_pc4_plus.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc4_plus == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc4_plus.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc4_plus == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_pc4_min.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc4_min == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc4_min.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc4_min == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmElektrikalVehicleExteriorHarian->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
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
                                    @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group == 'POWER COLLECTOR (MC 2)')
                                        <input type="hidden" name="hasil_mc1[]" value="">
                                        <input type="hidden" name="hasil_mc2[]" value="">
                                        <input type="hidden" name="hasil_tm1[]" value="">
                                        <input type="hidden" name="hasil_tm2[]" value="">
                                        <input type="hidden" name="hasil_tm3[]" value="">
                                        <input type="hidden" name="hasil_tm4[]" value="">
                                        <input type="hidden" name="hasil_1_led1[]" value="">
                                        <input type="hidden" name="hasil_1_led2[]" value="">
                                        <input type="hidden" name="hasil_jp_hjb[]" value="">
                                        <input type="hidden" name="hasil_jp_ljb[]" value="">
                                        <input type="hidden" name="hasil_2_led1[]" value="">
                                        <input type="hidden" name="hasil_2_led2[]" value="">
                                        
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}</h4>
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
                                                                {{ old('hasil_pc1_plus.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc1_plus == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc1_plus.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc1_plus == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_pc1_min.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc1_min == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc1_min.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc1_min == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_pc2_plus.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc2_plus == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc2_plus.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc2_plus == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_pc2_min.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc2_min == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc2_min.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc2_min == 'nok' ? 'selected' : '' }}>
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
                                    @endforeach
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
                                    @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group == 'POWER COLLECTOR (MC 2)')
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}</h4>
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
                                                                {{ old('hasil_pc3_plus.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc3_plus == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc3_plus.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc3_plus == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_pc3_min.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc3_min == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc3_min.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc3_min == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_pc4_plus.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc4_plus == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc4_plus.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc4_plus == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_pc4_min.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc4_min == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_pc4_min.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_pc4_min == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmElektrikalVehicleExteriorHarian->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- LED HEAD TAIL LIGHT  --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir11">
                        <div class="card">
                            <div class="card-header" id="Air11">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir11" aria-expanded="true" aria-controls="collapseAir11"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        LED HEAD TAIL LIGHT 
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir11" class="collapse" aria-labelledby="1" data-parent="#accordionAir11">
                                <div class="card-body">
                                    @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group == 'LED HEAD TAIL LIGHT')
                                        <input type="hidden" name="hasil_mc1[]" value="">
                                        <input type="hidden" name="hasil_mc2[]" value="">
                                        <input type="hidden" name="hasil_pc1_plus[]" value="">
                                        <input type="hidden" name="hasil_pc2_plus[]" value="">
                                        <input type="hidden" name="hasil_pc1_min[]" value="">
                                        <input type="hidden" name="hasil_pc2_min[]" value="">
                                        <input type="hidden" name="hasil_pc3_plus[]" value="">
                                        <input type="hidden" name="hasil_pc4_plus[]" value="">
                                        <input type="hidden" name="hasil_pc3_min[]" value="">
                                        <input type="hidden" name="hasil_pc4_min[]" value="">
                                        <input type="hidden" name="hasil_tm1[]" value="">
                                        <input type="hidden" name="hasil_tm2[]" value="">
                                        <input type="hidden" name="hasil_tm3[]" value="">
                                        <input type="hidden" name="hasil_tm4[]" value="">
                                        <input type="hidden" name="hasil_jp_hjb[]" value="">
                                        <input type="hidden" name="hasil_jp_ljb[]" value="">
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC 1 (LED 1)</label>
                                                        <select
                                                            class="form-control  @error('hasil_1_led1.' . $key) is-invalid @enderror"
                                                            name="hasil_1_led1[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_1_led1.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_1_led1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_1_led1.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_1_led1 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_1_led1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC 1 (LED 2)</label>
                                                        <select
                                                            class="form-control  @error('hasil_1_led2.' . $key) is-invalid @enderror"
                                                            name="hasil_1_led2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_1_led2.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_1_led2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_1_led2.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_1_led2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc1_led2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC 2 (LED 1)</label>
                                                        <select
                                                            class="form-control  @error('hasil_2_led1.' . $key) is-invalid @enderror"
                                                            name="hasil_2_led1[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_2_led1.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_2_led1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_2_led1.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_2_led1 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_2_led1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC 2 (LED 2)</label>
                                                        <select
                                                            class="form-control  @error('hasil_2_led2.' . $key) is-invalid @enderror"
                                                            name="hasil_2_led2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_2_led2.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_2_led2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_2_led2.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_2_led2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_2_led2.' . $key)
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
                                                    placeholder="Referensi">{!! $formApmElektrikalVehicleExteriorHarian->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ELECTRIC HORN  --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir12">
                        <div class="card">
                            <div class="card-header" id="Air12">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir12" aria-expanded="true" aria-controls="collapseAir12"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        ELECTRIC HORN 
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir12" class="collapse" aria-labelledby="1" data-parent="#accordionAir12">
                                <div class="card-body">
                                    @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group == 'ELECTRIC HORN')
                                        <input type="hidden" name="hasil_1_led1[]" value="">
                                        <input type="hidden" name="hasil_1_led2[]" value="">
                                        <input type="hidden" name="hasil_2_led1[]" value="">
                                        <input type="hidden" name="hasil_2_led2[]" value="">
                                        <input type="hidden" name="hasil_pc1_plus[]" value="">
                                        <input type="hidden" name="hasil_pc2_plus[]" value="">
                                        <input type="hidden" name="hasil_pc1_min[]" value="">
                                        <input type="hidden" name="hasil_pc2_min[]" value="">
                                        <input type="hidden" name="hasil_pc3_plus[]" value="">
                                        <input type="hidden" name="hasil_pc4_plus[]" value="">
                                        <input type="hidden" name="hasil_pc3_min[]" value="">
                                        <input type="hidden" name="hasil_pc4_min[]" value="">
                                        <input type="hidden" name="hasil_tm1[]" value="">
                                        <input type="hidden" name="hasil_tm2[]" value="">
                                        <input type="hidden" name="hasil_tm3[]" value="">
                                        <input type="hidden" name="hasil_tm4[]" value="">
                                        <input type="hidden" name="hasil_jp_hjb[]" value="">
                                        <input type="hidden" name="hasil_jp_ljb[]" value="">
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}</h4>
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmElektrikalVehicleExteriorHarian->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- KESELURUHAN BOX  --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir13">
                        <div class="card">
                            <div class="card-header" id="Air13">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir13" aria-expanded="true" aria-controls="collapseAir13"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        KESELURUHAN BOX 
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir13" class="collapse" aria-labelledby="1" data-parent="#accordionAir13">
                                <div class="card-body">
                                    @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group == 'KESELURUHAN BOX')
                                        <input type="hidden" name="hasil_1_led1[]" value="">
                                        <input type="hidden" name="hasil_1_led2[]" value="">
                                        <input type="hidden" name="hasil_2_led1[]" value="">
                                        <input type="hidden" name="hasil_2_led2[]" value="">
                                        <input type="hidden" name="hasil_pc1_plus[]" value="">
                                        <input type="hidden" name="hasil_pc2_plus[]" value="">
                                        <input type="hidden" name="hasil_pc1_min[]" value="">
                                        <input type="hidden" name="hasil_pc2_min[]" value="">
                                        <input type="hidden" name="hasil_pc3_plus[]" value="">
                                        <input type="hidden" name="hasil_pc4_plus[]" value="">
                                        <input type="hidden" name="hasil_pc3_min[]" value="">
                                        <input type="hidden" name="hasil_pc4_min[]" value="">
                                        <input type="hidden" name="hasil_tm1[]" value="">
                                        <input type="hidden" name="hasil_tm2[]" value="">
                                        <input type="hidden" name="hasil_tm3[]" value="">
                                        <input type="hidden" name="hasil_tm4[]" value="">
                                        <input type="hidden" name="hasil_jp_hjb[]" value="">
                                        <input type="hidden" name="hasil_jp_ljb[]" value="">
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}</h4>
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmElektrikalVehicleExteriorHarian->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TRACTION MOTOR (MC 1)  --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir14">
                        <div class="card">
                            <div class="card-header" id="Air14">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir14" aria-expanded="true" aria-controls="collapseAir14"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        TRACTION MOTOR (MC 1) 
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir14" class="collapse" aria-labelledby="1" data-parent="#accordionAir14">
                                <div class="card-body">
                                    @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group == 'TRACTION MOTOR (MC 1)')
                                        <input type="hidden" name="hasil_1_led1[]" value="">
                                        <input type="hidden" name="hasil_1_led2[]" value="">
                                        <input type="hidden" name="hasil_2_led1[]" value="">
                                        <input type="hidden" name="hasil_2_led2[]" value="">
                                        <input type="hidden" name="hasil_pc1_plus[]" value="">
                                        <input type="hidden" name="hasil_pc2_plus[]" value="">
                                        <input type="hidden" name="hasil_pc1_min[]" value="">
                                        <input type="hidden" name="hasil_pc2_min[]" value="">
                                        <input type="hidden" name="hasil_pc3_plus[]" value="">
                                        <input type="hidden" name="hasil_pc4_plus[]" value="">
                                        <input type="hidden" name="hasil_pc3_min[]" value="">
                                        <input type="hidden" name="hasil_pc4_min[]" value="">
                                        <input type="hidden" name="hasil_mc1[]" value="">
                                        <input type="hidden" name="hasil_mc2[]" value="">
                                        <input type="hidden" name="hasil_jp_hjb[]" value="">
                                        <input type="hidden" name="hasil_jp_ljb[]" value="">
                                        <input type="hidden" name="hasil_tm3[]" value="">
                                        <input type="hidden" name="hasil_tm4[]" value="">
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">TM 1</label>
                                                        <select
                                                            class="form-control  @error('hasil_tm1.' . $key) is-invalid @enderror"
                                                            name="hasil_tm1[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_tm1.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_tm1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_tm1.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_tm1 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_tm1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">TM 2</label>
                                                        <select
                                                            class="form-control  @error('hasil_tm2.' . $key) is-invalid @enderror"
                                                            name="hasil_tm2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_tm2.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_tm2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_tm2.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_tm2 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_tm2.' . $key)
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
                                                    placeholder="Referensi">{!! $formApmElektrikalVehicleExteriorHarian->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TRACTION MOTOR (MC 2)  --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir15">
                        <div class="card">
                            <div class="card-header" id="Air15">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir15" aria-expanded="true" aria-controls="collapseAir15"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        TRACTION MOTOR (MC 2) 
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir15" class="collapse" aria-labelledby="1" data-parent="#accordionAir15">
                                <div class="card-body">
                                    @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group == 'TRACTION MOTOR (MC 2)')
                                        <input type="hidden" name="hasil_1_led1[]" value="">
                                        <input type="hidden" name="hasil_1_led2[]" value="">
                                        <input type="hidden" name="hasil_2_led1[]" value="">
                                        <input type="hidden" name="hasil_2_led2[]" value="">
                                        <input type="hidden" name="hasil_pc1_plus[]" value="">
                                        <input type="hidden" name="hasil_pc2_plus[]" value="">
                                        <input type="hidden" name="hasil_pc1_min[]" value="">
                                        <input type="hidden" name="hasil_pc2_min[]" value="">
                                        <input type="hidden" name="hasil_pc3_plus[]" value="">
                                        <input type="hidden" name="hasil_pc4_plus[]" value="">
                                        <input type="hidden" name="hasil_pc3_min[]" value="">
                                        <input type="hidden" name="hasil_pc4_min[]" value="">
                                        <input type="hidden" name="hasil_mc1[]" value="">
                                        <input type="hidden" name="hasil_mc2[]" value="">
                                        <input type="hidden" name="hasil_jp_hjb[]" value="">
                                        <input type="hidden" name="hasil_jp_ljb[]" value="">
                                        <input type="hidden" name="hasil_tm1[]" value="">
                                        <input type="hidden" name="hasil_tm2[]" value="">
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">TM 3</label>
                                                        <select
                                                            class="form-control  @error('hasil_tm3.' . $key) is-invalid @enderror"
                                                            name="hasil_tm3[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_tm3.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_tm3 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_tm3.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_tm3 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_tm3.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">TM 4</label>
                                                        <select
                                                            class="form-control  @error('hasil_tm4.' . $key) is-invalid @enderror"
                                                            name="hasil_tm4[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_tm4.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_tm4 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_tm4.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_tm4 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_tm4.' . $key)
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
                                                    placeholder="Referensi">{!! $formApmElektrikalVehicleExteriorHarian->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- JUMPER PLUG  --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir16">
                        <div class="card">
                            <div class="card-header" id="Air16">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir16" aria-expanded="true" aria-controls="collapseAir16"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        JUMPER PLUG 
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir16" class="collapse" aria-labelledby="1" data-parent="#accordionAir16">
                                <div class="card-body">
                                    @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group == 'JUMPER PLUG')
                                        <input type="hidden" name="hasil_1_led1[]" value="">
                                        <input type="hidden" name="hasil_1_led2[]" value="">
                                        <input type="hidden" name="hasil_2_led1[]" value="">
                                        <input type="hidden" name="hasil_2_led2[]" value="">
                                        <input type="hidden" name="hasil_pc1_plus[]" value="">
                                        <input type="hidden" name="hasil_pc2_plus[]" value="">
                                        <input type="hidden" name="hasil_pc1_min[]" value="">
                                        <input type="hidden" name="hasil_pc2_min[]" value="">
                                        <input type="hidden" name="hasil_pc3_plus[]" value="">
                                        <input type="hidden" name="hasil_pc4_plus[]" value="">
                                        <input type="hidden" name="hasil_pc3_min[]" value="">
                                        <input type="hidden" name="hasil_pc4_min[]" value="">
                                        <input type="hidden" name="hasil_tm1[]" value="">
                                        <input type="hidden" name="hasil_tm2[]" value="">
                                        <input type="hidden" name="hasil_tm3[]" value="">
                                        <input type="hidden" name="hasil_tm4[]" value="">
                                        <input type="hidden" name="hasil_mc1[]" value="">
                                        <input type="hidden" name="hasil_mc2[]" value="">
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Jumper Pluge HJB</label>
                                                        <select
                                                            class="form-control  @error('hasil_jp_hjb.' . $key) is-invalid @enderror"
                                                            name="hasil_jp_hjb[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_jp_hjb.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_jp_hjb == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_jp_hjb.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_jp_hjb == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_jp_hjb.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Jumper Pluge LJB</label>
                                                        <select
                                                            class="form-control  @error('hasil_jp_ljb.' . $key) is-invalid @enderror"
                                                            name="hasil_jp_ljb[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_jp_ljb.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_jp_ljb == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_jp_ljb.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_jp_ljb == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_jp_ljb.' . $key)
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
                                                    placeholder="Referensi">{!! $formApmElektrikalVehicleExteriorHarian->referensi !!}</textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- WINSHIELD WIPER  --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir17">
                        <div class="card">
                            <div class="card-header" id="Air17">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir17" aria-expanded="true" aria-controls="collapseAir17"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        WINSHIELD WIPER 
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir17" class="collapse" aria-labelledby="1" data-parent="#accordionAir17">
                                <div class="card-body">
                                    @foreach ($formApmElektrikalVehicleExteriorHarians as $key => $formApmElektrikalVehicleExteriorHarian)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior_group == 'WINSHIELD WIPER')
                                        <input type="hidden" name="hasil_1_led1[]" value="">
                                        <input type="hidden" name="hasil_1_led2[]" value="">
                                        <input type="hidden" name="hasil_2_led1[]" value="">
                                        <input type="hidden" name="hasil_2_led2[]" value="">
                                        <input type="hidden" name="hasil_pc1_plus[]" value="">
                                        <input type="hidden" name="hasil_pc2_plus[]" value="">
                                        <input type="hidden" name="hasil_pc1_min[]" value="">
                                        <input type="hidden" name="hasil_pc2_min[]" value="">
                                        <input type="hidden" name="hasil_pc3_plus[]" value="">
                                        <input type="hidden" name="hasil_pc4_plus[]" value="">
                                        <input type="hidden" name="hasil_pc3_min[]" value="">
                                        <input type="hidden" name="hasil_pc4_min[]" value="">
                                        <input type="hidden" name="hasil_tm1[]" value="">
                                        <input type="hidden" name="hasil_tm2[]" value="">
                                        <input type="hidden" name="hasil_tm3[]" value="">
                                        <input type="hidden" name="hasil_tm4[]" value="">
                                        <input type="hidden" name="hasil_jp_hjb[]" value="">
                                        <input type="hidden" name="hasil_jp_ljb[]" value="">
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleExteriorHarian->pemeriksaan_exterior }}</h4>
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleExteriorHarian->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmElektrikalVehicleExteriorHarian->referensi !!}</textarea>
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
