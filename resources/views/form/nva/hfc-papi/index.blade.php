@section('style')
    <style>
        a {
            margin: 10px
        }

        table,
        tr,
        th,
        td {
            border: 1px solid black;
        }
        h5 {
            font-size: 20px;
            text-align: center
        }
        input,
        ::placeholder {
            font-size: 9px;
        }
    </style>
@endsection

@extends('layouts.app')
@section('content')
    {{-- <div class="container-fluid">


        <div class="row">
            <a href="{{ route('form.electrical-utility.checklist1') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECK LIST 1</a>
            <a href="{{ route('form.electrical-utility.checklist2') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECK LIST 2</a>
            
        </div>
    </div> --}}


    <section class="content">
        <form method="POST" action="{{ route('form.nva.hfc-papi.update', $detailWorkOrderForm->id) }}"
            enctype="multipart/form-data" id="form">
            @method('patch')
            @csrf

            {{-- </form> --}}




            @include('components.form-message')
            @if ($formNvaHFCPapiHarians->isNotEmpty())
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title" style="text-align: right;">HASIL FLIGHT CALIBRATION PAPI</h3>
                                </div>

                                <div class="card-body">

                                    @include('components.form-message')

                                    <div class="form-group row">
                                        <label class="col-12 col-lg-3">Tanggal</label>
                                        <div class="col-lg-3 col-10">
                                            <input type="date" class="form-control" name="tanggal[]" id="tanggal"
                                                value="{{ $formNvaHFCPapiHarians[0]->tanggal ?? (date('Y-m-d', strtotime($workOrder->date_generate)) ?? '') }}">
                                        </div>

                                        <label class="col-2 col-lg-3"></label>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="container-fluid">
                    <div class="accordion" id="accordionAir7">
                        <div class="card">
                            <div class="card-header" id="Air7">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseAir7" aria-expanded="true" aria-controls="collapseAir7"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        RUNWAY 07R - 25L (UTARA)
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir7" class="collapse" aria-labelledby="1" data-parent="#accordionAir7">
                                <div class="container-fluid">
                                    @foreach ($formNvaHFCPapiHarians as $key => $formNvaHFCPapiHarian)
                                        @if ($formNvaHFCPapiHarian->judul == 'RUNWAY 07R - 25L (UTARA)')
                                            @include('components.form-message')
                                            @if ($key == 0 || $key == 3)
                                                <div class="row">
                                                    <div class="col-3 d-flex justify-content-center align-items-center">
                                                        <h5>STANDAR (ILS)</h5>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="row">
                                                            <span
                                                                class="col-12 d-flex justify-content-center fw-bolder">PAPI
                                                                SLOPE ANGLE</span>
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="d-flex justify-content-center">A
                                                                    </label>
                                                                    <div class="form-group row">
                                                                        <div class="col-6">
                                                                            <input type="number" name="glide_a_derajat[]"
                                                                                class="form-control" value="2"
                                                                                readonly></input>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <input type="number" name="glide_a_menit[]"
                                                                                class="form-control" value="25"
                                                                                readonly></input>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="d-flex justify-content-center">B
                                                                    </label>
                                                                    <div class="form-group row">
                                                                        <div class="col-6">
                                                                            <input type="number" name="glide_b_derajat[]"
                                                                                class="form-control" value="2"
                                                                                readonly></input>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <input type="number" name="glide_b_menit[]"
                                                                                class="form-control" value="45"
                                                                                readonly></input>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="d-flex justify-content-center">C
                                                                    </label>
                                                                    <div class="form-group row">
                                                                        <div class="col-6">
                                                                            <input type="number" name="glide_c_derajat[]"
                                                                                class="form-control" value="3"
                                                                                readonly></input>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <input type="number" name="glide_c_menit[]"
                                                                                class="form-control" value="15"
                                                                                readonly></input>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="d-flex justify-content-center">D
                                                                    </label>
                                                                    <div class="form-group row">
                                                                        <div class="col-6">
                                                                            <input type="number" name="glide_d_derajat[]"
                                                                                class="form-control" value="3"
                                                                                readonly></input>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <input type="number" name="glide_d_menit[]"
                                                                                class="form-control" value="35"
                                                                                readonly></input>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <span
                                                                        class=" col-6 d-flex justify-content-center align-items-center">FLIGHT
                                                                        CHECK ON
                                                                        SLOPE</span>
                                                                    <input name="ccos[]"
                                                                        class="col-6 form-control @error('ccos.' . $key) is-invalid @enderror"
                                                                        id="ccos" value="3,00°" readonly></input>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <input type="hidden" name="current_calibration[]" value="">
                                                <input type="hidden" name="next_calibration[]" value="">

                                                <div class="row " style="padding-top: 20px">
                                                    <div class="col-3 d-flex justify-content-center align-items-center">


                                                        @if ($key == 2 || $key == 5)
                                                            <h5>GROUND CALIBRATION RESULT</h5>
                                                        @else
                                                            <h5>FLIGHT CALIBRATION RESULT</h5>
                                                        @endif
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="row">
                                                            <span
                                                                class="col-12 d-flex justify-content-center fw-bolder">PAPI
                                                                SLOPE ANGLE</span>
                                                            <div class="col-3">
                                                                <label class="d-flex justify-content-center">A
                                                                </label>
                                                                <div class="form-group row">
                                                                    <div class="col-6">
                                                                        <input type="number" name="glide_a_derajat[]"
                                                                            class="form-control" placeholder="Derajat"
                                                                            value="{{ $formNvaHFCPapiHarian->glide_a_derajat }}"></input>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="number" name="glide_a_menit[]"
                                                                            class="form-control" placeholder="Menit"
                                                                            value="{{ $formNvaHFCPapiHarian->glide_a_menit }}"></input>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <label class="d-flex justify-content-center">B
                                                                </label>
                                                                <div class="form-group row">
                                                                    <div class="col-6">
                                                                        <input type="number" name="glide_b_derajat[]"
                                                                            class="form-control" placeholder="Derajat"
                                                                            value="{{ $formNvaHFCPapiHarian->glide_b_derajat }}"></input>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="number" name="glide_b_menit[]"
                                                                            class="form-control" placeholder="Menit"
                                                                            value="{{ $formNvaHFCPapiHarian->glide_b_menit }}"></input>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <label class="d-flex justify-content-center">C
                                                                </label>
                                                                <div class="form-group row">
                                                                    <div class="col-6">
                                                                        <input type="number" name="glide_c_derajat[]"
                                                                            class="form-control" placeholder="Derajat"
                                                                            value="{{ $formNvaHFCPapiHarian->glide_c_derajat }}"></input>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="number" name="glide_c_menit[]"
                                                                            class="form-control" placeholder="Menit"
                                                                            value="{{ $formNvaHFCPapiHarian->glide_c_menit }}"></input>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <label class="d-flex justify-content-center">D
                                                                </label>
                                                                <div class="form-group row">
                                                                    <div class="col-6">
                                                                        <input type="number" name="glide_d_derajat[]"
                                                                            class="form-control" placeholder="Derajat"
                                                                            value="{{ $formNvaHFCPapiHarian->glide_d_derajat }}"></input>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="number" name="glide_d_menit[]"
                                                                            class="form-control" placeholder="Menit"
                                                                            value="{{ $formNvaHFCPapiHarian->glide_d_menit }}"></input>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12" style="padding-right: 30px">
                                                                <div class="row">
                                                                    <span
                                                                        class=" col-6 d-flex justify-content-center align-items-center">FLIGHT
                                                                        CHECK ON
                                                                        SLOPE</span>
                                                                    <input name="ccos[]" type="number"
                                                                        class="col-6 form-control @error('ccos.' . $key) is-invalid @enderror"
                                                                        id="ccos"
                                                                        value="{{ $formNvaHFCPapiHarian->ccos }}"></input>
                                                                </div>
                                                            </div>
                                                        </div>



                                                    </div>
                                                    @if ($key == 2 || $key == 5)
                                                        <div
                                                            class="col-3 d-flex justify-content-center align-items-center">
                                                            <h5>{{ $formNvaHFCPapiHarian->Fi }}</h5>
                                                        </div>
                                                        <div class="col-9">
                                                            <div class="row " style="margin:20px">
                                                                <div class="col-6">
                                                                    <label>Current Calibration</label>
                                                                    <input name="current_calibration[]" type="date"
                                                                        class="form-control @error('current_calibration.' . $key) is-invalid @enderror"
                                                                        id="current_calibration"
                                                                        value="{{ $formNvaHFCPapiHarian->current_calibration }}"></input>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label>Next Calibration</label>
                                                                    <input name="next_calibration[]" type="date"
                                                                        class="form-control @error('nc.' . $key) is-invalid @enderror"
                                                                        id="nc"
                                                                        value="{{ $formNvaHFCPapiHarian->nc }}"></input>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    @endif
                                                    <div class="col-12">
                                                        @if ($key == 2)
                                                            <hr class="bg-primary">
                                                        @elseif($key == 5)
                                                            <hr>
                                                        @endif
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

                <div class="container-fluid">
                    <div class="accordion" id="accordionAir8">
                        <div class="card">
                            <div class="card-header" id="Air8">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseAir8" aria-expanded="true"
                                        aria-controls="collapseAir8" onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        RUNWAY 06 - 24 (UTARA)
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseAir8" class="collapse" aria-labelledby="1" data-parent="#accordionAir8">
                                <div class="container-fluid">
                                    @foreach ($formNvaHFCPapiHarians as $key => $formNvaHFCPapiHarian)
                                        @if ($formNvaHFCPapiHarian->judul == 'RUNWAY 06 - 24 (UTARA)')
                                            @include('components.form-message')
                                            @if ($key == 6 || $key == 9)
                                                <div class="row">
                                                    <div class="col-3 d-flex justify-content-center align-items-center">
                                                        <h5>STANDAR (ILS)</h5>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="row">
                                                            <span
                                                                class="col-12 d-flex justify-content-center fw-bolder">PAPI
                                                                SLOPE ANGLE</span>
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="d-flex justify-content-center">A
                                                                    </label>
                                                                    <div class="form-group row">
                                                                        <div class="col-6">
                                                                            <input type="number" name="glide_a_derajat[]"
                                                                                class="form-control" value="2"
                                                                                readonly></input>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <input type="number" name="glide_a_menit[]"
                                                                                class="form-control" value="25"
                                                                                readonly></input>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="d-flex justify-content-center">B
                                                                    </label>
                                                                    <div class="form-group row">
                                                                        <div class="col-6">
                                                                            <input type="number" name="glide_b_derajat[]"
                                                                                class="form-control" value="2"
                                                                                readonly></input>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <input type="number" name="glide_b_menit[]"
                                                                                class="form-control" value="45"
                                                                                readonly></input>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="d-flex justify-content-center">C
                                                                    </label>
                                                                    <div class="form-group row">
                                                                        <div class="col-6">
                                                                            <input type="number" name="glide_c_derajat[]"
                                                                                class="form-control" value="3"
                                                                                readonly></input>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <input type="number" name="glide_c_menit[]"
                                                                                class="form-control" value="15"
                                                                                readonly></input>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <label class="d-flex justify-content-center">D
                                                                    </label>
                                                                    <div class="form-group row">
                                                                        <div class="col-6">
                                                                            <input type="number" name="glide_d_derajat[]"
                                                                                class="form-control" value="3"
                                                                                readonly></input>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <input type="number" name="glide_d_menit[]"
                                                                                class="form-control" value="35"
                                                                                readonly></input>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <span
                                                                        class=" col-6 d-flex justify-content-center align-items-center">FLIGHT
                                                                        CHECK ON
                                                                        SLOPE</span>
                                                                    <input name="ccos[]"
                                                                        class="col-6 form-control @error('ccos.' . $key) is-invalid @enderror"
                                                                        id="ccos" value="2,99°" readonly></input>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <input type="hidden" name="current_calibration[]" value="">
                                                <input type="hidden" name="next_calibration[]" value="">

                                                <div class="row " style="padding-top: 20px">
                                                    <div class="col-3 d-flex justify-content-center align-items-center">


                                                        @if ($key == 8 || $key == 11)
                                                            <h5>GROUND CALIBRATION RESULT</h5>
                                                        @else
                                                            <h5>FLIGHT CALIBRATION RESULT</h5>
                                                        @endif
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="row">
                                                            <span
                                                                class="col-12 d-flex justify-content-center fw-bolder">PAPI
                                                                SLOPE ANGLE</span>
                                                            <div class="col-3">
                                                                <label class="d-flex justify-content-center">A
                                                                </label>
                                                                <div class="form-group row">
                                                                    <div class="col-6">
                                                                        <input type="number" name="glide_a_derajat[]"
                                                                            class="form-control" placeholder="Derajat"
                                                                            value="{{ $formNvaHFCPapiHarian->glide_a_derajat }}"></input>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="number" name="glide_a_menit[]"
                                                                            class="form-control" placeholder="Menit"
                                                                            value="{{ $formNvaHFCPapiHarian->glide_a_menit }}"></input>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <label class="d-flex justify-content-center">B
                                                                </label>
                                                                <div class="form-group row">
                                                                    <div class="col-6">
                                                                        <input type="number" name="glide_b_derajat[]"
                                                                            class="form-control" placeholder="Derajat"
                                                                            value="{{ $formNvaHFCPapiHarian->glide_b_derajat }}"></input>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="number" name="glide_b_menit[]"
                                                                            class="form-control" placeholder="Menit"
                                                                            value="{{ $formNvaHFCPapiHarian->glide_b_menit }}"></input>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <label class="d-flex justify-content-center">C
                                                                </label>
                                                                <div class="form-group row">
                                                                    <div class="col-6">
                                                                        <input type="number" name="glide_c_derajat[]"
                                                                            class="form-control" placeholder="Derajat"
                                                                            value="{{ $formNvaHFCPapiHarian->glide_c_derajat }}"></input>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="number" name="glide_c_menit[]"
                                                                            class="form-control" placeholder="Menit"
                                                                            value="{{ $formNvaHFCPapiHarian->glide_c_menit }}"></input>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <label class="d-flex justify-content-center">D
                                                                </label>
                                                                <div class="form-group row">
                                                                    <div class="col-6">
                                                                        <input type="number" name="glide_d_derajat[]"
                                                                            class="form-control" placeholder="Derajat"
                                                                            value="{{ $formNvaHFCPapiHarian->glide_d_derajat }}"></input>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="number" name="glide_d_menit[]"
                                                                            class="form-control" placeholder="Menit"
                                                                            value="{{ $formNvaHFCPapiHarian->glide_d_menit }}"></input>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12" style="padding-right: 30px">
                                                                <div class="row">
                                                                    <span
                                                                        class=" col-6 d-flex justify-content-center align-items-center">FLIGHT
                                                                        CHECK ON
                                                                        SLOPE</span>
                                                                    <input name="ccos[]" type="number"
                                                                        class="col-6 form-control @error('ccos.' . $key) is-invalid @enderror"
                                                                        id="ccos"
                                                                        value="{{ $formNvaHFCPapiHarian->ccos }}"></input>
                                                                </div>
                                                            </div>
                                                        </div>



                                                    </div>
                                                    @if ($key == 8 || $key == 11)
                                                        <div
                                                            class="col-3 d-flex justify-content-center align-items-center">
                                                            <h5>{{ $formNvaHFCPapiHarian->Fi }}</h5>
                                                        </div>
                                                        <div class="col-9">
                                                            <div class="row " style="margin:20px">
                                                                <div class="col-6">
                                                                    <label>Current Calibration</label>
                                                                    <input name="current_calibration[]" type="date"
                                                                        class="form-control @error('current_calibration.' . $key) is-invalid @enderror"
                                                                        id="current_calibration"
                                                                        value="{{ $formNvaHFCPapiHarian->current_calibration }}"></input>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label>Next Calibration</label>
                                                                    <input name="next_calibration[]" type="date"
                                                                        class="form-control @error('nc.' . $key) is-invalid @enderror"
                                                                        id="nc"
                                                                        value="{{ $formNvaHFCPapiHarian->nc }}"></input>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    @endif
                                                    <div class="col-12">
                                                        @if ($key == 8)
                                                            <hr class="bg-primary">
                                                        @elseif($key == 11)
                                                            <hr>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
            @endif
            <div class="container-fluid">
                <div class="row">
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
            if (child.hasClass('fa-minus')) {
                child.removeClass('fa-minus').addClass('fa-plus');; // logs "This is the child element"
            } else if (child.hasClass('fa-plus')) {
                child.removeClass('fa-plus').addClass('fa-minus'); // logs "This is the child element"
            }
        }
    </script>
@endsection
