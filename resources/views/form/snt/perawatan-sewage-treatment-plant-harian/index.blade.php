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
        <form method="POST" action="{{ route('form.snt.perawatan-sewage-treatment-plant-harian.update', $detailWorkOrderForm) }}"
            enctype="multipart/form-data" id="form">
            @csrf
            @method('patch')
            @if ($formSntPerawatanSewageTreatmentPlantHarians->isNotEmpty())
                {{-- SCREW PUMP --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeat1">
                        <div class="card">
                            <div class="card-header" id="Seat1">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseSeat1" aria-expanded="true" aria-controls="collapseSeat1"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        SCREW PUMP
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeat1" class="show collapse" aria-labelledby="1" data-parent="#accordionSeat1">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($formSntPerawatanSewageTreatmentPlantHarians as $key => $formSntPerawatanSewageTreatmentPlantHarian)
                                        @if ($formSntPerawatanSewageTreatmentPlantHarian->group_peralatan == 'SCREW PUMP')
                                            <div class="row">
                                                <div
                                                    class="col-12 d-flex justify-content-center align-items-center">
                                                    <h5>
                                                        {{ $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan }}</h5>
                                                </div>
                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center"></label>
                                                                    <select class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                    name="kondisi[]">
                                                                    <option selected value="">Choose Selection</option>
                                                                    <option value="√"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == '√' ? 'selected' : '' }}>
                                                                        √</option>
                                                                    <option value="X"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == 'X' ? 'selected' : '' }}>
                                                                        X</option>
                                                                </select>

                                                                @error('kondisi.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="d-flex justify-content-center">keterangan</label>
                                                            <textarea name="keterangan[]" class="form-control @error('keterangan.'.$key) is-invalid @enderror"
                                                                id="keterangan" placeholder="keterangan">{{ $formSntPerawatanSewageTreatmentPlantHarian->keterangan }}</textarea>
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

                {{-- CLARIFIER UNIT --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeat2">
                        <div class="card">
                            <div class="card-header" id="Seat2">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseSeat2" aria-expanded="true" aria-controls="collapseSeat2"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        CLARIFIER UNIT
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeat2" class="collapse" aria-labelledby="1" data-parent="#accordionSeat2">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($formSntPerawatanSewageTreatmentPlantHarians as $key => $formSntPerawatanSewageTreatmentPlantHarian)
                                        @if ($formSntPerawatanSewageTreatmentPlantHarian->group_peralatan == 'CLARIFIER UNIT')
                                            <div class="row">
                                                <div
                                                    class="col-12 d-flex justify-content-center align-items-center">
                                                    <h5>
                                                        {{ $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan }}</h5>
                                                </div>
                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center"></label>
                                                                    <select class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                    name="kondisi[]">
                                                                    <option selected value="">Choose Selection</option>
                                                                    <option value="√"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == '√' ? 'selected' : '' }}>
                                                                        √</option>
                                                                    <option value="X"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == 'X' ? 'selected' : '' }}>
                                                                        X</option>
                                                                </select>

                                                                @error('kondisi.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="d-flex justify-content-center">keterangan</label>
                                                            <textarea name="keterangan[]" class="form-control @error('keterangan.'.$key) is-invalid @enderror"
                                                                id="keterangan" placeholder="keterangan">{{ $formSntPerawatanSewageTreatmentPlantHarian->keterangan }}</textarea>
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

                {{-- PANEL POMPA SDB --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeat3">
                        <div class="card">
                            <div class="card-header" id="Seat3">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseSeat3" aria-expanded="true" aria-controls="collapseSeat3"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        PANEL POMPA SDB
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeat3" class="collapse" aria-labelledby="1" data-parent="#accordionSeat3">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($formSntPerawatanSewageTreatmentPlantHarians as $key => $formSntPerawatanSewageTreatmentPlantHarian)
                                        @if ($formSntPerawatanSewageTreatmentPlantHarian->group_peralatan == 'PANEL POMPA SDB')
                                            <div class="row">
                                                <div
                                                    class="col-12 d-flex justify-content-center align-items-center">
                                                    <h5>
                                                        {{ $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan }}</h5>
                                                </div>
                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center"></label>
                                                                    <select class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                    name="kondisi[]">
                                                                    <option selected value="">Choose Selection</option>
                                                                    <option value="√"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == '√' ? 'selected' : '' }}>
                                                                        √</option>
                                                                    <option value="X"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == 'X' ? 'selected' : '' }}>
                                                                        X</option>
                                                                </select>

                                                                @error('kondisi.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="d-flex justify-content-center">keterangan</label>
                                                            <textarea name="keterangan[]" class="form-control @error('keterangan.'.$key) is-invalid @enderror"
                                                                id="keterangan" placeholder="keterangan">{{ $formSntPerawatanSewageTreatmentPlantHarian->keterangan }}</textarea>
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

                {{-- SCREENING UNIT --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeat4">
                        <div class="card">
                            <div class="card-header" id="Seat4">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseSeat4" aria-expanded="true" aria-controls="collapseSeat4"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        SCREENING UNIT
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeat4" class="collapse" aria-labelledby="1" data-parent="#accordionSeat4">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($formSntPerawatanSewageTreatmentPlantHarians as $key => $formSntPerawatanSewageTreatmentPlantHarian)
                                        @if ($formSntPerawatanSewageTreatmentPlantHarian->group_peralatan == 'SCREENING UNIT')
                                            <div class="row">
                                                <div
                                                    class="col-12 d-flex justify-content-center align-items-center">
                                                    <h5>
                                                        {{ $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan }}</h5>
                                                </div>
                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center"></label>
                                                                    <select class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                    name="kondisi[]">
                                                                    <option selected value="">Choose Selection</option>
                                                                    <option value="√"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == '√' ? 'selected' : '' }}>
                                                                        √</option>
                                                                    <option value="X"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == 'X' ? 'selected' : '' }}>
                                                                        X</option>
                                                                </select>

                                                                @error('kondisi.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="d-flex justify-content-center">keterangan</label>
                                                            <textarea name="keterangan[]" class="form-control @error('keterangan.'.$key) is-invalid @enderror"
                                                                id="keterangan" placeholder="keterangan">{{ $formSntPerawatanSewageTreatmentPlantHarian->keterangan }}</textarea>
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

                {{-- PANEL POMPA SRP --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeat5">
                        <div class="card">
                            <div class="card-header" id="Seat5">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseSeat5" aria-expanded="true" aria-controls="collapseSeat5"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        PANEL POMPA SRP
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeat5" class="collapse" aria-labelledby="1" data-parent="#accordionSeat5">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($formSntPerawatanSewageTreatmentPlantHarians as $key => $formSntPerawatanSewageTreatmentPlantHarian)
                                        @if ($formSntPerawatanSewageTreatmentPlantHarian->group_peralatan == 'PANEL POMPA SRP')
                                            <div class="row">
                                                <div
                                                    class="col-12 d-flex justify-content-center align-items-center">
                                                    <h5>
                                                        {{ $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan }}</h5>
                                                </div>
                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center"></label>
                                                                    <select class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                    name="kondisi[]">
                                                                    <option selected value="">Choose Selection</option>
                                                                    <option value="√"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == '√' ? 'selected' : '' }}>
                                                                        √</option>
                                                                    <option value="X"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == 'X' ? 'selected' : '' }}>
                                                                        X</option>
                                                                </select>

                                                                @error('kondisi.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="d-flex justify-content-center">keterangan</label>
                                                            <textarea name="keterangan[]" class="form-control @error('keterangan.'.$key) is-invalid @enderror"
                                                                id="keterangan" placeholder="keterangan">{{ $formSntPerawatanSewageTreatmentPlantHarian->keterangan }}</textarea>
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

                {{-- STABILIZATION TURBINE UNIT --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeat6">
                        <div class="card">
                            <div class="card-header" id="Seat6">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseSeat6" aria-expanded="true" aria-controls="collapseSeat6"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        STABILIZATION TURBINE UNIT
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeat6" class="collapse" aria-labelledby="1" data-parent="#accordionSeat6">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($formSntPerawatanSewageTreatmentPlantHarians as $key => $formSntPerawatanSewageTreatmentPlantHarian)
                                        @if ($formSntPerawatanSewageTreatmentPlantHarian->group_peralatan == 'STABILIZATION TURBINE UNIT')
                                            <div class="row">
                                                <div
                                                    class="col-12 d-flex justify-content-center align-items-center">
                                                    <h5>
                                                        {{ $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan }}</h5>
                                                </div>
                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center"></label>
                                                                    <select class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                    name="kondisi[]">
                                                                    <option selected value="">Choose Selection</option>
                                                                    <option value="√"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == '√' ? 'selected' : '' }}>
                                                                        √</option>
                                                                    <option value="X"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == 'X' ? 'selected' : '' }}>
                                                                        X</option>
                                                                </select>

                                                                @error('kondisi.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="d-flex justify-content-center">keterangan</label>
                                                            <textarea name="keterangan[]" class="form-control @error('keterangan.'.$key) is-invalid @enderror"
                                                                id="keterangan" placeholder="keterangan">{{ $formSntPerawatanSewageTreatmentPlantHarian->keterangan }}</textarea>
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

                {{-- AIR BLOWER COMPRESSOR --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeat7">
                        <div class="card">
                            <div class="card-header" id="Seat7">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseSeat7" aria-expanded="true" aria-controls="collapseSeat7"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        AIR BLOWER COMPRESSOR
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeat7" class="collapse" aria-labelledby="1" data-parent="#accordionSeat7">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($formSntPerawatanSewageTreatmentPlantHarians as $key => $formSntPerawatanSewageTreatmentPlantHarian)
                                        @if ($formSntPerawatanSewageTreatmentPlantHarian->group_peralatan == 'AIR BLOWER COMPRESSOR')
                                            <div class="row">
                                                <div
                                                    class="col-12 d-flex justify-content-center align-items-center">
                                                    <h5>
                                                        {{ $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan }}</h5>
                                                </div>
                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center"></label>
                                                                    <select class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                    name="kondisi[]">
                                                                    <option selected value="">Choose Selection</option>
                                                                    <option value="√"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == '√' ? 'selected' : '' }}>
                                                                        √</option>
                                                                    <option value="X"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == 'X' ? 'selected' : '' }}>
                                                                        X</option>
                                                                </select>

                                                                @error('kondisi.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="d-flex justify-content-center">keterangan</label>
                                                            <textarea name="keterangan[]" class="form-control @error('keterangan.'.$key) is-invalid @enderror"
                                                                id="keterangan" placeholder="keterangan">{{ $formSntPerawatanSewageTreatmentPlantHarian->keterangan }}</textarea>
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

                {{-- PANEL POMPA SGP --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeat8">
                        <div class="card">
                            <div class="card-header" id="Seat8">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseSeat8" aria-expanded="true" aria-controls="collapseSeat8"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        PANEL POMPA SGP
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeat8" class="collapse" aria-labelledby="1" data-parent="#accordionSeat8">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($formSntPerawatanSewageTreatmentPlantHarians as $key => $formSntPerawatanSewageTreatmentPlantHarian)
                                        @if ($formSntPerawatanSewageTreatmentPlantHarian->group_peralatan == 'PANEL POMPA SGP')
                                            <div class="row">
                                                <div
                                                    class="col-12 d-flex justify-content-center align-items-center">
                                                    <h5>
                                                        {{ $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan }}</h5>
                                                </div>
                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center"></label>
                                                                    <select class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                    name="kondisi[]">
                                                                    <option selected value="">Choose Selection</option>
                                                                    <option value="√"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == '√' ? 'selected' : '' }}>
                                                                        √</option>
                                                                    <option value="X"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == 'X' ? 'selected' : '' }}>
                                                                        X</option>
                                                                </select>

                                                                @error('kondisi.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="d-flex justify-content-center">keterangan</label>
                                                            <textarea name="keterangan[]" class="form-control @error('keterangan.'.$key) is-invalid @enderror"
                                                                id="keterangan" placeholder="keterangan">{{ $formSntPerawatanSewageTreatmentPlantHarian->keterangan }}</textarea>
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

                {{-- CONTROL DESK & MONITORING PLC --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeat9">
                        <div class="card">
                            <div class="card-header" id="Seat9">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseSeat9" aria-expanded="true" aria-controls="collapseSeat9"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        CONTROL DESK & MONITORING PLC
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeat9" class="collapse" aria-labelledby="1" data-parent="#accordionSeat9">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($formSntPerawatanSewageTreatmentPlantHarians as $key => $formSntPerawatanSewageTreatmentPlantHarian)
                                        @if ($formSntPerawatanSewageTreatmentPlantHarian->group_peralatan == 'CONTROL DESK & MONITORING PLC')
                                            <div class="row">
                                                <div
                                                    class="col-12 d-flex justify-content-center align-items-center">
                                                    <h5>
                                                        {{ $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan }}</h5>
                                                </div>
                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center"></label>
                                                                    <select class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                    name="kondisi[]">
                                                                    <option selected value="">Choose Selection</option>
                                                                    <option value="√"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == '√' ? 'selected' : '' }}>
                                                                        √</option>
                                                                    <option value="X"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == 'X' ? 'selected' : '' }}>
                                                                        X</option>
                                                                </select>

                                                                @error('kondisi.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="d-flex justify-content-center">keterangan</label>
                                                            <textarea name="keterangan[]" class="form-control @error('keterangan.'.$key) is-invalid @enderror"
                                                                id="keterangan" placeholder="keterangan">{{ $formSntPerawatanSewageTreatmentPlantHarian->keterangan }}</textarea>
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

                {{-- AERATION TURBINE UNIT --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeat10">
                        <div class="card">
                            <div class="card-header" id="Seat10">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseSeat10" aria-expanded="true" aria-controls="collapseSeat10"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        AERATION TURBINE UNIT
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeat10" class="collapse" aria-labelledby="1" data-parent="#accordionSeat10">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($formSntPerawatanSewageTreatmentPlantHarians as $key => $formSntPerawatanSewageTreatmentPlantHarian)
                                        @if ($formSntPerawatanSewageTreatmentPlantHarian->group_peralatan == 'AERATION TURBINE UNIT')
                                            <div class="row">
                                                <div
                                                    class="col-12 d-flex justify-content-center align-items-center">
                                                    <h5>
                                                        {{ $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan }}</h5>
                                                </div>
                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center"></label>
                                                                    <select class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                    name="kondisi[]">
                                                                    <option selected value="">Choose Selection</option>
                                                                    <option value="√"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == '√' ? 'selected' : '' }}>
                                                                        √</option>
                                                                    <option value="X"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == 'X' ? 'selected' : '' }}>
                                                                        X</option>
                                                                </select>

                                                                @error('kondisi.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="d-flex justify-content-center">keterangan</label>
                                                            <textarea name="keterangan[]" class="form-control @error('keterangan.'.$key) is-invalid @enderror"
                                                                id="keterangan" placeholder="keterangan">{{ $formSntPerawatanSewageTreatmentPlantHarian->keterangan }}</textarea>
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

                {{-- MDS ROOM CONTROL --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeat11">
                        <div class="card">
                            <div class="card-header" id="Seat11">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseSeat11" aria-expanded="true" aria-controls="collapseSeat11"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        MDS ROOM CONTROL
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeat11" class="collapse" aria-labelledby="1" data-parent="#accordionSeat11">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($formSntPerawatanSewageTreatmentPlantHarians as $key => $formSntPerawatanSewageTreatmentPlantHarian)
                                        @if ($formSntPerawatanSewageTreatmentPlantHarian->group_peralatan == 'MDS ROOM CONTROL')
                                            <div class="row">
                                                <div
                                                    class="col-12 d-flex justify-content-center align-items-center">
                                                    <h5>
                                                        {{ $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan }}</h5>
                                                </div>
                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center"></label>
                                                                    <select class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                    name="kondisi[]">
                                                                    <option selected value="">Choose Selection</option>
                                                                    <option value="√"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == '√' ? 'selected' : '' }}>
                                                                        √</option>
                                                                    <option value="X"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == 'X' ? 'selected' : '' }}>
                                                                        X</option>
                                                                </select>

                                                                @error('kondisi.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="d-flex justify-content-center">keterangan</label>
                                                            <textarea name="keterangan[]" class="form-control @error('keterangan.'.$key) is-invalid @enderror"
                                                                id="keterangan" placeholder="keterangan">{{ $formSntPerawatanSewageTreatmentPlantHarian->keterangan }}</textarea>
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

                {{-- GRIT GREASE & VACUM --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeat12">
                        <div class="card">
                            <div class="card-header" id="Seat12">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseSeat12" aria-expanded="true" aria-controls="collapseSeat12"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        GRIT GREASE & VACUM
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeat12" class="collapse" aria-labelledby="1" data-parent="#accordionSeat12">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($formSntPerawatanSewageTreatmentPlantHarians as $key => $formSntPerawatanSewageTreatmentPlantHarian)
                                        @if ($formSntPerawatanSewageTreatmentPlantHarian->group_peralatan == 'GRIT GREASE & VACUM')
                                            <div class="row">
                                                <div
                                                    class="col-12 d-flex justify-content-center align-items-center">
                                                    <h5>
                                                        {{ $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan }}</h5>
                                                </div>
                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center"></label>
                                                                    <select class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                    name="kondisi[]">
                                                                    <option selected value="">Choose Selection</option>
                                                                    <option value="√"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == '√' ? 'selected' : '' }}>
                                                                        √</option>
                                                                    <option value="X"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == 'X' ? 'selected' : '' }}>
                                                                        X</option>
                                                                </select>

                                                                @error('kondisi.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="d-flex justify-content-center">keterangan</label>
                                                            <textarea name="keterangan[]" class="form-control @error('keterangan.'.$key) is-invalid @enderror"
                                                                id="keterangan" placeholder="keterangan">{{ $formSntPerawatanSewageTreatmentPlantHarian->keterangan }}</textarea>
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

                {{-- PEMELIHARAAN DAN KEBERSIHAN INSTALASI PENGOLAHAN LIMBAH CAIR GED. 745 --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeat13">
                        <div class="card">
                            <div class="card-header" id="Seat13">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseSeat13" aria-expanded="true" aria-controls="collapseSeat13"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        PEMELIHARAAN DAN KEBERSIHAN INSTALASI PENGOLAHAN LIMBAH CAIR GED. 745
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeat13" class="collapse" aria-labelledby="1" data-parent="#accordionSeat13">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($formSntPerawatanSewageTreatmentPlantHarians as $key => $formSntPerawatanSewageTreatmentPlantHarian)
                                        @if ($formSntPerawatanSewageTreatmentPlantHarian->group_peralatan == 'PEMBERSIHAN LUMUT' || $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan == 'PENCABUTAN RUMPUT PADA DRYING BED'|| $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan == 'PEMOTONGAN RUMPUT DI DISCHARGE CHANNEL' || $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan == 'PEMBERSIHAN RUANG INSTALASI KONTROL PANEL')
                                            <div class="row">
                                                @if (!$loop->last)
                                                    <label class="col-12 d-flex justify-content-center align-items-center">{{ $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan }}</label>
                                                @endif
                                                
                                                <div
                                                    class="col-12 d-flex justify-content-center align-items-center">
                                                    <h5 style="text-align: center">
                                                        {{ $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan }}</h5>
                                                </div>
                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center"></label>
                                                                    <select class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                    name="kondisi[]">
                                                                    <option selected value="">Choose Selection</option>
                                                                    <option value="√"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == '√' ? 'selected' : '' }}>
                                                                        √</option>
                                                                    <option value="X"
                                                                        {{ old('kondisi.' . $key) ?? $formSntPerawatanSewageTreatmentPlantHarian->kondisi == 'X' ? 'selected' : '' }}>
                                                                        X</option>
                                                                </select>

                                                                @error('kondisi.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="d-flex justify-content-center">keterangan</label>
                                                            <textarea name="keterangan[]" class="form-control @error('keterangan.'.$key) is-invalid @enderror"
                                                                id="keterangan" placeholder="keterangan">{{ $formSntPerawatanSewageTreatmentPlantHarian->keterangan }}</textarea>
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
            @endif

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label
                                        class="col-12 control-label d-flex justify-content-center align-items-center">Catatan</label>
                                    <div class="col-12">

                                        <textarea name="catatan" class="form-control @error('catatan.'.$key) is-invalid @enderror"
                                            id="catatan" placeholder="Deskripsi"></textarea>
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
            if (child.hasClass('fa-chevron-up')) {
                child.removeClass('fa-chevron-up').addClass('fa-chevron-down');; // logs "This is the child element"
            } else if (child.hasClass('fa-chevron-down')) {
                child.removeClass('fa-chevron-down').addClass('fa-chevron-up'); // logs "This is the child element"
            }
        }
    </script>
@endsection
