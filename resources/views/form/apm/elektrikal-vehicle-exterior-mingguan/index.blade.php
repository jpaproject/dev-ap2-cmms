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

        <form method="POST" action="{{ route('form.apm.elektrikal-vehicle-exterior-mingguan.update', $detailWorkOrderForm) }}"
            enctype="multipart/form-data" id="form2">

            @csrf
            @method('patch')
            @if ($formApmElektrikalVehicleExteriorMingguans->isNotEmpty())
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
                                        Filter VVVF
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir7" class="collapse" aria-labelledby="1" data-parent="#accordionAir7">
                                <div class="card-body">
                                    @foreach ($formApmElektrikalVehicleExteriorMingguans as $key => $formApmElektrikalVehicleExteriorMingguan)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleExteriorMingguan->pemeriksaan_exterior_group == 'Filter VVVF')
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleExteriorMingguan->pemeriksaan_exterior }}</h4>
                                            </div>
                                            <div class="row">
                                                <span class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <select
                                                            class="form-control  @error('hasil_mc1.' . $key) is-invalid @enderror"
                                                            name="hasil_mc1[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleExteriorMingguan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleExteriorMingguan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
                                                                Nok</option>
                                                        </select>

                                                        @error('hasil_mc1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MC 2</label>
                                                        <select
                                                            class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                            name="hasil_mc2[]">
                                                            <option selected value="">Choose Selection
                                                            </option>
                                                            <option value="ok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleExteriorMingguan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleExteriorMingguan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmElektrikalVehicleExteriorMingguan->referensi !!}</textarea>
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
                                        Filter VAC
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir8" class="collapse" aria-labelledby="1" data-parent="#accordionAir8">
                                <div class="card-body">
                                    @foreach ($formApmElektrikalVehicleExteriorMingguans as $key => $formApmElektrikalVehicleExteriorMingguan)
                                        @include('components.form-message')
                                        @if ($formApmElektrikalVehicleExteriorMingguan->pemeriksaan_exterior_group == 'Filter VAC')
                                            <div class="container-fluid">
                                                <h4 style="text-align: center">
                                                    {{ $formApmElektrikalVehicleExteriorMingguan->pemeriksaan_exterior }}</h4>
                                                
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
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleExteriorMingguan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleExteriorMingguan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
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
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleExteriorMingguan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                Ok</option>
                                                            <option value="nok"
                                                                {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleExteriorMingguan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
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
                                                    placeholder="Referensi">{!! $formApmElektrikalVehicleExteriorMingguan->referensi !!}</textarea>
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
