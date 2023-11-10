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
        <form method="POST"
            action="{{ route('form.snt.checklist-perawatan-incinerator-456-bulanan.update', $detailWorkOrderForm) }}"
            enctype="multipart/form-data" id="form">
            @csrf
            @method('patch')
            @if ($formSntChecklistPerawatanIncinerator456Bulanans->isNotEmpty())

            {{-- INCINERATOR NOMER 4 --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeatMajor4">
                        <div class="card">
                            <div class="card-header" id="SeatMajor4">
                                <h2 class="mb-0">
                                    <button class="bg-primary btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseSeatMajor4" aria-expanded="true"
                                        aria-controls="collapseSeatMajor4" onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        INCINERATOR NOMER 4
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeatMajor4" class="collapse" aria-labelledby="1"
                                data-parent="#accordionSeatMajor4">
                                <div class="card-body">
                                    {{-- PRIMARY CHAMBER --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionSeat1">
                                            <div class="card">
                                                <div class="card-header" id="Seat1">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseSeat1"
                                                            aria-expanded="true" aria-controls="collapseSeat1"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            PRIMARY CHAMBER
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseSeat1" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionSeat1">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 4')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'PRIMARY CHAMBER')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- BLOWER  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionSeat2">
                                            <div class="card">
                                                <div class="card-header" id="Seat2">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseSeat2"
                                                            aria-expanded="true" aria-controls="collapseSeat2"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            BLOWER
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseSeat2" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionSeat2">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 4')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'BLOWER')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- BURNER  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionSeat3">
                                            <div class="card">
                                                <div class="card-header" id="Seat3">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseSeat3"
                                                            aria-expanded="true" aria-controls="collapseSeat3"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            BURNER
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseSeat3" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionSeat3">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 4')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'BURNER')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- SCRUBBER PUMP  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionSeat8">
                                            <div class="card">
                                                <div class="card-header" id="Seat8">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseSeat8"
                                                            aria-expanded="true" aria-controls="collapseSeat8"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            SCRUBBER PUMP
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseSeat8" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionSeat8">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 4')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'SCRUBBER PUMP')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- MOTOR GEARBOX ROTARY  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionSeat4">
                                            <div class="card">
                                                <div class="card-header" id="Seat4">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseSeat4"
                                                            aria-expanded="true" aria-controls="collapseSeat4"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            MOTOR GEARBOX ROTARY
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseSeat4" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionSeat4">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 4')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'MOTOR GEARBOX ROTARY')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- MOTOR CONVEYOR  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionSeat5">
                                            <div class="card">
                                                <div class="card-header" id="Seat5">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseSeat5"
                                                            aria-expanded="true" aria-controls="collapseSeat5"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            MOTOR CONVEYOR
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseSeat5" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionSeat5">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 4')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'MOTOR CONVEYOR')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- MOTOR SCRUW  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionSeat6">
                                            <div class="card">
                                                <div class="card-header" id="Seat6">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseSeat6"
                                                            aria-expanded="true" aria-controls="collapseSeat6"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            MOTOR SCRUW
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseSeat6" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionSeat6">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 4')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'MOTOR SCRUW')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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
                        </div>
                    </div>
                </div>

                {{-- INCINERATOR NOMER 5 --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeatMajor2">
                        <div class="card">
                            <div class="card-header" id="SeatMajor2">
                                <h2 class="mb-0">
                                    <button class="bg-primary btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseSeatMajor2" aria-expanded="true"
                                        aria-controls="collapseSeatMajor2" onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        INCINERATOR NOMER 5
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeatMajor2" class="collapse" aria-labelledby="1"
                                data-parent="#accordionSeatMajor2">
                                <div class="card-body">
                                    {{-- MECHANICAL LIFTER --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionInce1">
                                            <div class="card">
                                                <div class="card-header" id="Ince1">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseInce1"
                                                            aria-expanded="true" aria-controls="collapseInce1"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            MECHANICAL LIFTER
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseInce1" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionInce1">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 5')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'MECHANICAL LIFTER')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- RUANG BAKAR I  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionInce2">
                                            <div class="card">
                                                <div class="card-header" id="Ince2">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseInce2"
                                                            aria-expanded="true" aria-controls="collapseInce2"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            RUANG BAKAR I
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseInce2" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionInce2">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 5')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'RUANG BAKAR I')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- RUANG BAKAR II  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionInce3">
                                            <div class="card">
                                                <div class="card-header" id="Ince3">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseInce3"
                                                            aria-expanded="true" aria-controls="collapseInce3"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            RUANG BAKAR II
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseInce3" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionInce3">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 5')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'RUANG BAKAR II')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- WET SCRUBBER  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionInce8">
                                            <div class="card">
                                                <div class="card-header" id="Ince8">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseInce8"
                                                            aria-expanded="true" aria-controls="collapseInce8"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            WET SCRUBBER
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseInce8" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionInce8">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 5')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'WET SCRUBBER')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- CEROBONG  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionInce4">
                                            <div class="card">
                                                <div class="card-header" id="Ince4">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseInce4"
                                                            aria-expanded="true" aria-controls="collapseInce4"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            CEROBONG
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseInce4" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionInce4">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 5')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'CEROBONG')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- LAMPU PENERANGAN  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionInce5">
                                            <div class="card">
                                                <div class="card-header" id="Ince5">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseInce5"
                                                            aria-expanded="true" aria-controls="collapseInce5"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            LAMPU PENERANGAN
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseInce5" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionInce5">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 5')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'LAMPU PENERANGAN')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- POMPA SOLAR  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionInce6">
                                            <div class="card">
                                                <div class="card-header" id="Ince6">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseInce6"
                                                            aria-expanded="true" aria-controls="collapseInce6"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            POMPA SOLAR
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseInce6" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionInce6">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 5')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'POMPA SOLAR')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- PANEL KONTROL  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionInce7">
                                            <div class="card">
                                                <div class="card-header" id="Ince7">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseInce7"
                                                            aria-expanded="true" aria-controls="collapseInce7"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            PANEL KONTROL
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseInce7" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionInce7">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 5')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'PANEL KONTROL')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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
                        </div>
                    </div>
                </div>

                {{-- INCINERATOR NOMER 6 --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeatMajor3">
                        <div class="card">
                            <div class="card-header" id="SeatMajor3">
                                <h2 class="mb-0">
                                    <button class="bg-primary btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseSeatMajor3" aria-expanded="true"
                                        aria-controls="collapseSeatMajor3" onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        INCINERATOR NOMER 6
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeatMajor3" class="collapse" aria-labelledby="1"
                                data-parent="#accordionSeatMajor3">
                                <div class="card-body">
                                    {{-- MECHANICAL LIFTER --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionIncenerator1">
                                            <div class="card">
                                                <div class="card-header" id="Incenerator1">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseIncenerator1"
                                                            aria-expanded="true" aria-controls="collapseIncenerator1"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            MECHANICAL LIFTER
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseIncenerator1" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionIncenerator1">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 6')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'MECHANICAL LIFTER')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- RUANG BAKAR I  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionIncenerator2">
                                            <div class="card">
                                                <div class="card-header" id="Incenerator2">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseIncenerator2"
                                                            aria-expanded="true" aria-controls="collapseIncenerator2"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            RUANG BAKAR I
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseIncenerator2" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionIncenerator2">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 6')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'RUANG BAKAR I')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- RUANG BAKAR II  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionIncenerator3">
                                            <div class="card">
                                                <div class="card-header" id="Incenerator3">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseIncenerator3"
                                                            aria-expanded="true" aria-controls="collapseIncenerator3"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            RUANG BAKAR II
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseIncenerator3" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionIncenerator3">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 6')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'RUANG BAKAR II')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- WET SCRUBBER  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionIncenerator8">
                                            <div class="card">
                                                <div class="card-header" id="Incenerator8">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseIncenerator8"
                                                            aria-expanded="true" aria-controls="collapseIncenerator8"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            WET SCRUBBER
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseIncenerator8" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionIncenerator8">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 6')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'WET SCRUBBER')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- CEROBONG  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionIncenerator4">
                                            <div class="card">
                                                <div class="card-header" id="Incenerator4">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseIncenerator4"
                                                            aria-expanded="true" aria-controls="collapseIncenerator4"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            CEROBONG
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseIncenerator4" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionIncenerator4">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 6')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'CEROBONG')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- LAMPU PENERANGAN  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionIncenerator5">
                                            <div class="card">
                                                <div class="card-header" id="Incenerator5">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseIncenerator5"
                                                            aria-expanded="true" aria-controls="collapseIncenerator5"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            LAMPU PENERANGAN
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseIncenerator5" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionIncenerator5">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 6')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'LAMPU PENERANGAN')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- POMPA SOLAR  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionIncenerator6">
                                            <div class="card">
                                                <div class="card-header" id="Incenerator6">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseIncenerator6"
                                                            aria-expanded="true" aria-controls="collapseIncenerator6"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            POMPA SOLAR
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseIncenerator6" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionIncenerator6">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 6')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'POMPA SOLAR')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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

                                    {{-- PANEL KONTROL  --}}
                                    <div class="container-fluid">
                                        <div class="accordion" id="accordionIncenerator7">
                                            <div class="card">
                                                <div class="card-header" id="Incenerator7">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseIncenerator7"
                                                            aria-expanded="true" aria-controls="collapseIncenerator7"
                                                            onclick="showHide(this)">
                                                            <i class="fas fa-chevron-up d-flex justify-content-end"
                                                                id="accordion"></i>
                                                            PANEL KONTROL
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseIncenerator7" class="collapse" aria-labelledby="1"
                                                    data-parent="#accordionIncenerator7">
                                                    <div class="card-body">
                                                        @include('components.form-message')
                                                        @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                                            @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 6')
                                                                @if ($formSntChecklistPerawatanIncinerator456Bulanan->group == 'PANEL KONTROL')
                                                                    <div class="row">
                                                                        <span
                                                                            class="col-12 d-flex justify-content-center fw-bolder">Kondisi</span>
                                                                        <div
                                                                            class="col-6 d-flex justify-content-center align-items-center">
                                                                            <h5>
                                                                                {{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="d-flex justify-content-center"></label>
                                                                                <select
                                                                                    class="form-control  @error('kondisi.' . $key) is-invalid @enderror"
                                                                                    name="kondisi[]">
                                                                                    <option selected value="">Choose
                                                                                        Selection
                                                                                    </option>
                                                                                    <option value="BAIK"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? 'selected' : '' }}>
                                                                                        BAIK</option>
                                                                                    <option value="TROUBLE"
                                                                                        {{ old('kondisi.' . $key) ?? $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? 'selected' : '' }}>
                                                                                        TROUBLE</option>
                                                                                </select>

                                                                                @error('kondisi.' . $key)
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
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
