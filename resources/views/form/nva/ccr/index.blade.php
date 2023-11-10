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

        .container {
            width: 100%;
            /* Lebar container 100% untuk full-width */
            box-sizing: border-box;
            border: 2px solid black;
            padding-bottom: 20px;
            /* Ketebalan dan warna border */
        }

        table,
        tr,
        th,
        td {
            border: 1px solid black;
        }
    </style>
@endsection

@section('content')
    <section class="content">

        <form method="POST" action="{{ route('form.nva.ccr.update', $detailWorkOrderForm) }}" enctype="multipart/form-data"
            id="form2">

            @csrf
            @method('patch')
            @if ($formNvaConstantCurrentRegulations->isNotEmpty())
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title" style="text-align: right;"></h3>
                                </div>

                                <div class="card-body">

                                    @include('components.form-message')

                                    <div class="form-group row">
                                        <label class="col-12 col-lg-3">Tanggal</label>
                                        <div class="col-lg-3 col-10">
                                            <input type="date" class="form-control" name="tanggal[]" id="tanggal"
                                                value="{{ $formNvaConstantCurrentRegulations[0]->tanggal }}">
                                        </div>
                                        <label class="col-2 col-lg-3"></label>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label class="col-12 col-lg-3">Suhu Substation T8</label>
                                        <div class="col-lg-3 col-10">
                                            <input type="number" name="suhu[]" id="suhu" class="form-control"
                                                value="{{ old('suhu') ?? $formNvaConstantCurrentRegulations[0]->suhu }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-lg-3">Suhu Substation T9</label>
                                        <div class="col-lg-3 col-10">
                                            <input type="number" name="suhu[]" id="suhu" class="form-control"
                                                value="{{ old('suhu') ?? $formNvaConstantCurrentRegulations[1]->suhu }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-lg-3">Suhu Substation T10</label>
                                        <div class="col-lg-3 col-10">
                                            <input type="number" name="suhu[]" id="suhu" class="form-control"
                                                value="{{ old('suhu') ?? $formNvaConstantCurrentRegulations[2]->suhu }}">
                                        </div>
                                        <label class="col-2 col-lg-3"></label>
                                    </div>
                                    <hr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Substation T8 --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir7">
                        <div class="card">
                            <div class="card-header" id="Air7">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir7" aria-expanded="true" aria-controls="collapseAir7"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Substation T8
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir7" class="collapse" aria-labelledby="1" data-parent="#accordionAir7">
                                <div class="card-body">
                                    @foreach ($formNvaConstantCurrentRegulations as $key => $formNvaConstantCurrentRegulation)
                                        @include('components.form-message')
                                        @if ($formNvaConstantCurrentRegulation->substation == 'Substation T8')
                                            <input type="hidden" name="tanggal[]" value="">
                                            @if ($key != 13)
                                                <input type="hidden" name="suhu[]" value="">
                                            @endif
                                            <div class="container">
                                                <div class="container-fluid">

                                                    <h4 style="text-align: center">
                                                        {{ $formNvaConstantCurrentRegulation->peralatan }}</h4>
                                                    <hr>
                                                </div>
                                                <div style="background-color: grey; font-size:12px;vertical-align:middle"
                                                    class="row">
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">MERK</span>
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">TIPE</span>
                                                    <span
                                                        class="col-2 d-flex justify-content-center fw-bolder">KAPASITAS</span>
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">TAHUN
                                                        PEMASANGAN</span>
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">SUPPLY
                                                        VOLTAGE
                                                    </span>
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">SYSTEM
                                                        REMOTE
                                                    </span>

                                                </div>
                                                <div style="font-size:12px;vertical-align:middle"class="row">
                                                    <p class="col-2 d-flex justify-content-center fw-bolder">
                                                        {{ $formNvaConstantCurrentRegulation->merk }}</p>
                                                    <p class="col-2 d-flex justify-content-center fw-bolder">
                                                        {{ $formNvaConstantCurrentRegulation->tipe }}</p>
                                                    <p class="col-2 d-flex justify-content-center fw-bolder">
                                                        {{ $formNvaConstantCurrentRegulation->kapasitas }}</p>
                                                    <p class="col-2 d-flex justify-content-center fw-bolder">
                                                        {{ $formNvaConstantCurrentRegulation->tahun_pemasangan }}</p>
                                                    <p class="col-2 d-flex justify-content-center fw-bolder">
                                                        {{ $formNvaConstantCurrentRegulation->supply_voltage }}</p>
                                                    <p class="col-2 d-flex justify-content-center fw-bolder">
                                                        {{ $formNvaConstantCurrentRegulation->system_remote }}</p>

                                                </div>
                                                <div style="background-color: grey; font-size:12px;vertical-align:middle"
                                                    class="row">
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">RUNNING
                                                        HOURS
                                                    </span>
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">AMPERE IN
                                                        STEP
                                                        5</span>
                                                    <span class="col-4 d-flex justify-content-center fw-bolder">METER
                                                        READING
                                                        (LOCAL)
                                                    </span>
                                                    <span class="col-4 d-flex justify-content-center fw-bolder">TAHANAN
                                                        ISOLASI</span>

                                                </div>

                                                <div style="font-size:12px;vertical-align:middle"class="row">
                                                    <span class="col-2 d-flex justify-content-center fw-bolder"></span>
                                                    <span class="col-2 d-flex justify-content-center fw-bolder"></span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">STEP1
                                                        (A)</span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">STEP2
                                                        (A)</span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">STEP3
                                                        (A)</span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">STEP4
                                                        (A)</span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">STEP5
                                                        (A)</span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">CG
                                                        TEST</span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">CC
                                                        TEST</span>
                                                    <hr>
                                                </div>
                                                <div style="font-size:12px;vertical-align:middle"class="col-lg-12">
                                                    <div style="font-size:12px;vertical-align:middle"class="row">
                                                        <input type="number" placeholder="Hasil " name="running_hours[]"
                                                            class="col-2 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->running_hours }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="ampere[]"class="col-2 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->ampere }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step1[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->step1 }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step2[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->step2 }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step3[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->step3 }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step4[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->step4 }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step5[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->step5 }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="cg[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->cg }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="cc[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->cc }}"></input>
                                                        <hr>
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
                {{-- Substation T9 --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir8">
                        <div class="card">
                            <div class="card-header" id="Air8">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir8" aria-expanded="true"
                                        aria-controls="collapseAir8" onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Substation T9
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir8" class="collapse" aria-labelledby="1" data-parent="#accordionAir8">
                                <div class="card-body">
                                    @foreach ($formNvaConstantCurrentRegulations as $key => $formNvaConstantCurrentRegulation)
                                        @include('components.form-message')
                                        @if ($formNvaConstantCurrentRegulation->substation == 'Substation T9')
                                            <input type="hidden" name="tanggal[]" value="">
                                            @if ($key != 24)
                                                <input type="hidden" name="suhu[]" value="">
                                            @endif
                                            <div class="container">
                                                <div class="container-fluid">

                                                    <h4 style="text-align: center">
                                                        {{ $formNvaConstantCurrentRegulation->peralatan }}</h4>
                                                    <hr>
                                                </div>
                                                <div style="background-color: grey; font-size:12px;vertical-align:middle"
                                                    class="row">
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">MERK</span>
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">TIPE</span>
                                                    <span
                                                        class="col-2 d-flex justify-content-center fw-bolder">KAPASITAS</span>
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">TAHUN
                                                        PEMASANGAN</span>
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">SUPPLY
                                                        VOLTAGE
                                                    </span>
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">SYSTEM
                                                        REMOTE
                                                    </span>

                                                </div>
                                                <div style="font-size:12px;vertical-align:middle"class="row">
                                                    <p class="col-2 d-flex justify-content-center fw-bolder">
                                                        {{ $formNvaConstantCurrentRegulation->merk }}</p>
                                                    <p class="col-2 d-flex justify-content-center fw-bolder">
                                                        {{ $formNvaConstantCurrentRegulation->tipe }}</p>
                                                    <p class="col-2 d-flex justify-content-center fw-bolder">
                                                        {{ $formNvaConstantCurrentRegulation->kapasitas }}</p>
                                                    <p class="col-2 d-flex justify-content-center fw-bolder">
                                                        {{ $formNvaConstantCurrentRegulation->tahun_pemasangan }}</p>
                                                    <p class="col-2 d-flex justify-content-center fw-bolder">
                                                        {{ $formNvaConstantCurrentRegulation->supply_voltage }}</p>
                                                    <p class="col-2 d-flex justify-content-center fw-bolder">
                                                        {{ $formNvaConstantCurrentRegulation->system_remote }}</p>

                                                </div>
                                                <div style="background-color: grey; font-size:12px;vertical-align:middle"
                                                    class="row">
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">RUNNING
                                                        HOURS
                                                    </span>
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">AMPERE IN
                                                        STEP
                                                        5</span>
                                                    <span class="col-4 d-flex justify-content-center fw-bolder">METER
                                                        READING
                                                        (LOCAL)
                                                    </span>
                                                    <span class="col-4 d-flex justify-content-center fw-bolder">TAHANAN
                                                        ISOLASI</span>

                                                </div>

                                                <div style="font-size:12px;vertical-align:middle"class="row">
                                                    <span class="col-2 d-flex justify-content-center fw-bolder"></span>
                                                    <span class="col-2 d-flex justify-content-center fw-bolder"></span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">STEP1
                                                        (A)</span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">STEP2
                                                        (A)</span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">STEP3
                                                        (A)</span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">STEP4
                                                        (A)</span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">STEP5
                                                        (A)</span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">CG
                                                        TEST</span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">CC
                                                        TEST</span>
                                                    <hr>
                                                </div>
                                                <div style="font-size:12px;vertical-align:middle"class="col-lg-12">
                                                    <div style="font-size:12px;vertical-align:middle"class="row">
                                                        <input type="number" placeholder="Hasil " name="running_hours[]"
                                                            class="col-2 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->running_hours }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="ampere[]"class="col-2 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->ampere }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step1[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->step1 }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step2[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->step2 }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step3[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->step3 }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step4[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->step4 }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step5[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->step5 }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="cg[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->cg }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="cc[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->cc }}"></input>
                                                        <hr>
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
                {{-- Substation T10 --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir9">
                        <div class="card">
                            <div class="card-header" id="Air9">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir9" aria-expanded="true"
                                        aria-controls="collapseAir9" onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        Substation T10
                                    </button>
                                </h2>
                            </div>


                            <div id="collapseAir9" class="collapse" aria-labelledby="1" data-parent="#accordionAir9">
                                <div class="card-body">
                                    @foreach ($formNvaConstantCurrentRegulations as $key => $formNvaConstantCurrentRegulation)
                                        @include('components.form-message')
                                        @if ($formNvaConstantCurrentRegulation->substation == 'Substation T10')
                                            @if ($loop->last)
                                                {{-- This is the last iteration --}}
                                            @else
                                                <input type="hidden" name="tanggal[]" value="">
                                                @if ($key != 40)
                                                    <input type="hidden" name="suhu[]" value="">
                                                @endif
                                            @endif
                                            <div class="container">
                                                <div class="container-fluid">

                                                    <h4 style="text-align: center">
                                                        {{ $formNvaConstantCurrentRegulation->peralatan }}</h4>
                                                    <hr>
                                                </div>
                                                <div style="background-color: grey; font-size:12px;vertical-align:middle"
                                                    class="row">
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">MERK</span>
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">TIPE</span>
                                                    <span
                                                        class="col-2 d-flex justify-content-center fw-bolder">KAPASITAS</span>
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">TAHUN
                                                        PEMASANGAN</span>
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">SUPPLY
                                                        VOLTAGE
                                                    </span>
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">SYSTEM
                                                        REMOTE
                                                    </span>

                                                </div>
                                                <div style="font-size:12px;vertical-align:middle"class="row">
                                                    <p class="col-2 d-flex justify-content-center fw-bolder">
                                                        {{ $formNvaConstantCurrentRegulation->merk }}</p>
                                                    <p class="col-2 d-flex justify-content-center fw-bolder">
                                                        {{ $formNvaConstantCurrentRegulation->tipe }}</p>
                                                    <p class="col-2 d-flex justify-content-center fw-bolder">
                                                        {{ $formNvaConstantCurrentRegulation->kapasitas }}</p>
                                                    <p class="col-2 d-flex justify-content-center fw-bolder">
                                                        {{ $formNvaConstantCurrentRegulation->tahun_pemasangan }}</p>
                                                    <p class="col-2 d-flex justify-content-center fw-bolder">
                                                        {{ $formNvaConstantCurrentRegulation->supply_voltage }}</p>
                                                    <p class="col-2 d-flex justify-content-center fw-bolder">
                                                        {{ $formNvaConstantCurrentRegulation->system_remote }}</p>

                                                </div>
                                                <div style="background-color: grey; font-size:12px;vertical-align:middle"
                                                    class="row">
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">RUNNING
                                                        HOURS
                                                    </span>
                                                    <span class="col-2 d-flex justify-content-center fw-bolder">AMPERE IN
                                                        STEP
                                                        5</span>
                                                    <span class="col-4 d-flex justify-content-center fw-bolder">METER
                                                        READING
                                                        (LOCAL)
                                                    </span>
                                                    <span class="col-4 d-flex justify-content-center fw-bolder">TAHANAN
                                                        ISOLASI</span>

                                                </div>

                                                <div style="font-size:12px;vertical-align:middle"class="row">
                                                    <span class="col-2 d-flex justify-content-center fw-bolder"></span>
                                                    <span class="col-2 d-flex justify-content-center fw-bolder"></span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">STEP1
                                                        (A)</span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">STEP2
                                                        (A)</span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">STEP3
                                                        (A)</span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">STEP4
                                                        (A)</span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">STEP5
                                                        (A)</span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">CG
                                                        TEST</span>
                                                    <span class="col-1 d-flex justify-content-center fw-bolder">CC
                                                        TEST</span>
                                                    <hr>
                                                </div>
                                                <div style="font-size:12px;vertical-align:middle"class="col-lg-12">
                                                    <div style="font-size:12px;vertical-align:middle"class="row">
                                                        <input type="number" placeholder="Hasil " name="running_hours[]"
                                                            class="col-2 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->running_hours }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="ampere[]"class="col-2 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->ampere }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step1[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->step1 }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step2[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->step2 }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step3[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->step3 }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step4[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->step4 }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step5[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->step5 }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="cg[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->cg }}"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="cc[]"class="col-1 d-flex justify-content-center fw-bolder"
                                                            value="{{ $formNvaConstantCurrentRegulation->cc }}"></input>
                                                        <hr>
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
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-footer">Simpan</button>
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
