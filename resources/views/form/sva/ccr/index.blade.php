
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

        h3 {
            font-size: 15px;
        }
    </style>
@endsection

@section('content')

    <section class="content">

        <form method="POST" action="{{ route('form.sva.ccr.update', $detailWorkOrderForm) }}" enctype="multipart/form-data"
            id="form2">

            @csrf
            @method('patch')
            @if ($formSvaConstantCurrentRegulations->isNotEmpty())
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
                                            <input type="date" class="form-control" name="tanggal" id="tanggal"
                                                value="{!! $formSvaConstantCurrentRegulations[0]->tanggal !!}">
                                        </div>

                                        <label class="col-2 col-lg-3"></label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                @foreach ($datas->substation as $item)
                    <div class="container-fluid">
                    <div class="accordion" id="accordion{{ $loop->index }}">
                        <div class="card">
                            <div class="card-header" id="{{ $loop->index }}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapse{{ $loop->index }}" aria-expanded="true" aria-controls="collapse{{ $loop->index }}"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        {{ $item }}
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse{{ $loop->index }}" class="collapse" aria-labelledby="1" data-parent="#accordion{{ $loop->index }}">
                                <div class="card-body">
                                    @foreach ($formSvaConstantCurrentRegulations as $key => $formSvaConstantCurrentRegulation)
                                        @include('components.form-message')
                                        @if ($formSvaConstantCurrentRegulation->substation == $item )
                                            <div class="container">
                                                <div class="container-fluid">

                                                    <h2 style="text-align: center">
                                                        {{ $formSvaConstantCurrentRegulation->peralatan }}</h2>
                                                    <hr>
                                                </div>
                                                <div style="background-color: grey; font-size:16px; text-align:center"
                                                    class="row justify-content-center">
                                                    <span class="col-3 d-flex justify-content-center fw-bolder">MERK</span>
                                                    <span class="col-3 d-flex justify-content-center fw-bolder">TIPE</span>
                                                    <span
                                                        class="col-3 d-flex justify-content-center fw-bolder">KAPASITAS</span>
                                                    <span class="col-3 d-flex justify-content-center fw-bolder">TAHUN
                                                        PEMASANGAN</span>

                                                </div>
                                                <div style="font-size:16px;vertical-align:middle"class="row">
                                                    <p class="col-3 d-flex justify-content-center fw-bolder">
                                                        {{ $formSvaConstantCurrentRegulation->merk }}</p>
                                                    <p class="col-3 d-flex justify-content-center fw-bolder">
                                                        {{ $formSvaConstantCurrentRegulation->tipe }}</p>
                                                    <p class="col-3 d-flex justify-content-center fw-bolder">
                                                        {{ $formSvaConstantCurrentRegulation->kapasitas }}</p>
                                                    <p class="col-3 d-flex justify-content-center fw-bolder">
                                                        {{ $formSvaConstantCurrentRegulation->tahun_pemasangan }}</p>

                                                </div>
                                                <div class="col-12">
                                                    <div class="row" style="margin: 20px">
                                                        <span class="col-3 d-flex justify-content-center fw-bolder">INPUT VOLTAGE (VAC)
                                                        </span>
                                                        <input type="number" placeholder="Hasil " name="supply_voltage[]"
                                                            class="col-3 form-control"
                                                            value="{{ $formSvaConstantCurrentRegulation->supply_voltage }}"></input>
                                                        <span class="col-3 d-flex justify-content-center fw-bolder">INPUT VOLTAGE (VAC)</span>
                                                        <input type="number" placeholder="Hasil "
                                                            name="system_remote[]"class="col-3 form-control"
                                                            value="{{ $formSvaConstantCurrentRegulation->system_remote }}"></input>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row" style="margin: 20px">
                                                        <span class="col-3 d-flex justify-content-center fw-bolder">RUNNING
                                                            HOURS (H)
                                                        </span>
                                                        <input type="number" placeholder="Hasil " name="running_hours[]"
                                                            class="col-3 form-control"
                                                            value="{{ $formSvaConstantCurrentRegulation->running_hours }}"></input>
                                                        <span class="col-3 d-flex justify-content-center fw-bolder">AMPERE
                                                            IN
                                                            STEP
                                                            5 (A)</span>
                                                        <input type="number" placeholder="Hasil "
                                                            name="ampere[]"class="col-3 form-control"
                                                            value="{{ $formSvaConstantCurrentRegulation->ampere }}"></input>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row" style="margin: 20px">
                                                        <span class="col-3 d-flex justify-content-center fw-bolder">C-G
                                                            TEST Ω
                                                        </span>
                                                        <input type="number" placeholder="Hasil " name="cg[]"
                                                            class="col-3 form-control"
                                                            value="{{ $formSvaConstantCurrentRegulation->cg }}"></input>
                                                        <span class="col-3 d-flex justify-content-center fw-bolder">C-C
                                                            TEST Ω
                                                        </span>
                                                        <input type="number" placeholder="Hasil"
                                                            name="cc[]"class="col-3 form-control"
                                                            value="{{ $formSvaConstantCurrentRegulation->cc }}"></input>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row" style="margin: 20px">
                                                        <span class="col-3 d-flex justify-content-center fw-bolder">SUHU TRAFO (°C)
                                                        </span>
                                                        <input type="number" placeholder="Hasil " name="suhu_trafo[]"
                                                            class="col-3 form-control"
                                                            value="{{ $formSvaConstantCurrentRegulation->suhu_trafo }}"></input>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <h3 class="col-12 d-flex justify-content-center fw-bolder"
                                                            style="padding-top: 20px">METER READING
                                                            (LOCAL)
                                                        </h3>
                                                    </div>
                                                    <div class="row">
                                                        <span class="col-2 d-flex justify-content-center fw-bolder"
                                                            style="margin:10px">STEP 1
                                                            (A)</span>
                                                        <span class="col-2 d-flex justify-content-center fw-bolder"
                                                            style="margin:10px">STEP 2
                                                            (A)</span>
                                                        <span class="col-2 d-flex justify-content-center fw-bolder"
                                                            style="margin:10px">STEP 3
                                                            (A)</span>
                                                        <span class="col-2 d-flex justify-content-center fw-bolder"
                                                            style="margin:10px">STEP 4
                                                            (A)</span>
                                                        <span class="col-2 d-flex justify-content-center fw-bolder"
                                                            style="margin:10px">STEP 5
                                                            (A)</span>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step1[]"class="col-2  form-control"
                                                            value="{{ $formSvaConstantCurrentRegulation->step1 }}"
                                                            style="margin:10px"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step2[]"class="col-2  form-control"
                                                            value="{{ $formSvaConstantCurrentRegulation->step2 }}"
                                                            style="margin:10px"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step3[]"class="col-2  form-control"
                                                            value="{{ $formSvaConstantCurrentRegulation->step3 }}"
                                                            style="margin:10px"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step4[]"class="col-2  form-control"
                                                            value="{{ $formSvaConstantCurrentRegulation->step4 }}"
                                                            style="margin:10px"></input>
                                                        <input type="number" placeholder="Hasil "
                                                            name="step5[]"class="col-2  form-control"
                                                            value="{{ $formSvaConstantCurrentRegulation->step5 }}"
                                                            style="margin:10px"></input>
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
                @endforeach
                
                
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
