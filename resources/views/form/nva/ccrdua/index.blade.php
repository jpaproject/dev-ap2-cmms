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

        <form method="POST" action="{{ route('form.nva.ccrdua.update', $detailWorkOrderForm) }}" enctype="multipart/form-data"
            id="form2">

            @csrf
            @method('patch')
            @if ($formNvaConstantCurrentRegulationDuas->isNotEmpty())
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
                                                value="{{ $formNvaConstantCurrentRegulationDuas[0]->tanggal }}">
                                        </div>
                                        <label class="col-2 col-lg-3"></label>
                                    </div>
                                    <hr>
                                    
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            {{-- Substation T11 --}}
            <div class="container-fluid">
                <div class="accordion" id="accordionAir7">
                    <div class="card">
                        <div class="card-header" id="Air7">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseAir7" aria-expanded="true" aria-controls="collapseAir7"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                    Substation T11
                                </button>
                            </h2>
                        </div>


                        <div id="collapseAir7" class="collapse" aria-labelledby="1" data-parent="#accordionAir7">
                            <div class="card-body">
                                @foreach ($formNvaConstantCurrentRegulationDuas as $key => $formNvaConstantCurrentRegulationDua)
                                    @include('components.form-message')
                                    @if ($formNvaConstantCurrentRegulationDua->substation == 'Substation T11')
                                        <input type="hidden" name="tanggal[]" value="">
                                        <div class="container">
                                            <div class="container-fluid">

                                                <h4 style="text-align: center">
                                                    {{ $formNvaConstantCurrentRegulationDua->peralatan }}</h4>
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
                                                    {{ $formNvaConstantCurrentRegulationDua->merk }}</p>
                                                <p class="col-2 d-flex justify-content-center fw-bolder">
                                                    {{ $formNvaConstantCurrentRegulationDua->tipe }}</p>
                                                <p class="col-2 d-flex justify-content-center fw-bolder">
                                                    {{ $formNvaConstantCurrentRegulationDua->kapasitas }}</p>
                                                <p class="col-2 d-flex justify-content-center fw-bolder">
                                                    {{ $formNvaConstantCurrentRegulationDua->tahun_pemasangan }}</p>
                                                <input type="number" placeholder="Hasil " name="supply_voltage[]"
                                                    class="col-2 d-flex justify-content-center fw-bolder"></input>
                                                <input type="number" placeholder="Hasil " name="system_remote[]"
                                                    class="col-2 d-flex justify-content-center fw-bolder"></input>

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
                                                        class="col-2 d-flex justify-content-center fw-bolder" value="{{ old('running_hours') ?? $formNvaConstantCurrentRegulationDua->running_hours }}"></input>
                                                    <input type="number" placeholder="Hasil "
                                                        name="ampere[]"class="col-2 d-flex justify-content-center fw-bolder" value="{{ old('ampere') ?? $formNvaConstantCurrentRegulationDua->ampere }}"></input>
                                                    <input type="number" placeholder="Hasil "
                                                        name="step1[]"class="col-1 d-flex justify-content-center fw-bolder" value="{{ old('step1') ?? $formNvaConstantCurrentRegulationDua->step1 }}"></input>
                                                    <input type="number" placeholder="Hasil "
                                                        name="step2[]"class="col-1 d-flex justify-content-center fw-bolder" value="{{ old('step2') ?? $formNvaConstantCurrentRegulationDua->step2 }}"></input>
                                                    <input type="number" placeholder="Hasil "
                                                        name="step3[]"class="col-1 d-flex justify-content-center fw-bolder" value="{{ old('step3') ?? $formNvaConstantCurrentRegulationDua->step3 }}"></input>
                                                    <input type="number" placeholder="Hasil "
                                                        name="step4[]"class="col-1 d-flex justify-content-center fw-bolder" value="{{ old('step4') ?? $formNvaConstantCurrentRegulationDua->step4 }}"></input>
                                                    <input type="number" placeholder="Hasil "
                                                        name="step5[]"class="col-1 d-flex justify-content-center fw-bolder" value="{{ old('step5') ?? $formNvaConstantCurrentRegulationDua->step5 }}"></input>
                                                    <input type="number" placeholder="Hasil "
                                                        name="cg[]"class="col-1 d-flex justify-content-center fw-bolder" value="{{ old('cg') ?? $formNvaConstantCurrentRegulationDua->cg }}"></input>
                                                    <input type="number" placeholder="Hasil "
                                                        name="cc[]"class="col-1 d-flex justify-content-center fw-bolder" value="{{ old('cc') ?? $formNvaConstantCurrentRegulationDua->cc }}"></input>
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
            {{-- Substation T12 --}}
            <div class="container-fluid">
                <div class="accordion" id="accordionAir9">
                    <div class="card">
                        <div class="card-header" id="Air9">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button"
                                    data-toggle="collapse" data-target="#collapseAir9" aria-expanded="true"
                                    aria-controls="collapseAir9" onclick="showHide(this)">
                                    <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                    Substation T12
                                </button>
                            </h2>
                        </div>


                        <div id="collapseAir9" class="collapse" aria-labelledby="1" data-parent="#accordionAir9">
                            <div class="card-body">
                                @foreach ($formNvaConstantCurrentRegulationDuas as $key => $formNvaConstantCurrentRegulationDua)
                                    @include('components.form-message')
                                    @if ($formNvaConstantCurrentRegulationDua->substation == 'Substation T12')
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
                                                    {{ $formNvaConstantCurrentRegulationDua->peralatan }}</h4>
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
                                                    {{ $formNvaConstantCurrentRegulationDua->merk }}</p>
                                                <p class="col-2 d-flex justify-content-center fw-bolder">
                                                    {{ $formNvaConstantCurrentRegulationDua->tipe }}</p>
                                                <p class="col-2 d-flex justify-content-center fw-bolder">
                                                    {{ $formNvaConstantCurrentRegulationDua->kapasitas }}</p>
                                                <p class="col-2 d-flex justify-content-center fw-bolder">
                                                    {{ $formNvaConstantCurrentRegulationDua->tahun_pemasangan }}</p>
                                                <input type="number" placeholder="Hasil " name="supply_voltage[]"
                                                    class="col-2 d-flex justify-content-center fw-bolder"></input>
                                                <input type="number" placeholder="Hasil " name="system_remote[]"
                                                    class="col-2 d-flex justify-content-center fw-bolder"></input>

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
                                                        class="col-2 d-flex justify-content-center fw-bolder" value="{{ old('running_hours') ?? $formNvaConstantCurrentRegulationDua->running_hours }}"></input>
                                                    <input type="number" placeholder="Hasil "
                                                        name="ampere[]"class="col-2 d-flex justify-content-center fw-bolder" value="{{ old('ampere') ?? $formNvaConstantCurrentRegulationDua->ampere }}"></input>
                                                    <input type="number" placeholder="Hasil "
                                                        name="step1[]"class="col-1 d-flex justify-content-center fw-bolder" value="{{ old('step1') ?? $formNvaConstantCurrentRegulationDua->step1 }}"></input>
                                                    <input type="number" placeholder="Hasil "
                                                        name="step2[]"class="col-1 d-flex justify-content-center fw-bolder" value="{{ old('step2') ?? $formNvaConstantCurrentRegulationDua->step2 }}"></input>
                                                    <input type="number" placeholder="Hasil "
                                                        name="step3[]"class="col-1 d-flex justify-content-center fw-bolder" value="{{ old('step3') ?? $formNvaConstantCurrentRegulationDua->step3 }}"></input>
                                                    <input type="number" placeholder="Hasil "
                                                        name="step4[]"class="col-1 d-flex justify-content-center fw-bolder" value="{{ old('step4') ?? $formNvaConstantCurrentRegulationDua->step4 }}"></input>
                                                    <input type="number" placeholder="Hasil "
                                                        name="step5[]"class="col-1 d-flex justify-content-center fw-bolder" value="{{ old('step5') ?? $formNvaConstantCurrentRegulationDua->step5 }}"></input>
                                                    <input type="number" placeholder="Hasil "
                                                        name="cg[]"class="col-1 d-flex justify-content-center fw-bolder" value="{{ old('cg') ?? $formNvaConstantCurrentRegulationDua->cg }}"></input>
                                                    <input type="number" placeholder="Hasil "
                                                        name="cc[]"class="col-1 d-flex justify-content-center fw-bolder" value="{{ old('cc') ?? $formNvaConstantCurrentRegulationDua->cc }}"></input>
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
