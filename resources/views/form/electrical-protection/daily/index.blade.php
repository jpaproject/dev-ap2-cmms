@extends('layouts.app')

@section('breadcumb')
    <li class="breadcrumb-item"><a href="{{ route('work-orders.index') }}">Work Order</a></li>
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

        {{-- <table class="table table-bordered head table-responsive w-100 d-block d-md-table">
            <thead class="thead-light">
                <tr>
                    <th class="head" scope="col">WORKING ORDER NUMBER</th>
                    <th class="head" scope="col">LOCATION</th>
                    <th class="head" scope="col">DATE</th>
                    <th class="head" scope="col">MONTH</th>
                    <th class="head" scope="col">YEAR</th>
                    <th class="head" scope="col">SUPERVISED BY</th>
                    <th class="head" scope="col">DINAS</th>
                    <th class="head" scope="col">HARI/TANGGAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="head">WO</th>
                    <td class="head">NP</td>
                    <td class="head">18</td>
                    <td class="head">JAN</td>
                    <td class="head">2023</td>
                    <td class="head">ALAN</td>
                    <td class="head">DIMAS ARYASATYA</td>
                    <td class="head">23-02-2023</td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-12 col-lg-5 col-md-4">
                <table class="table table-bordered head table-responsive d-md-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="head" scope="col">No.</th>
                            <th class="head" scope="col">Personil Yang Ditugaskan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="head">1.</th>
                            <td class="head">Dimas Aryasatya</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-lg-7 col-md-8">
                <table class="table table-bordered head table-responsive d-md-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="head" scope="col">HARI/TANGGAL</th>
                            <th class="head" scope="col">DINAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="head">Friday, 25/02/2023 09:15</th>
                            <td class="head">DINAS</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div> --}}
        <form method="POST" action="{{ route('form.elp.daily.update', $detailWorkOrderForm->id) }}"
            enctype="multipart/form-data" id="form">
            @method('patch')
            @csrf
                <div class="container-fluid">
                    <div class="accordion" id="accordionOne">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i> ER 2A
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="show collapse" aria-labelledby="headingOne"
                                data-parent="#accordionOne">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($er2as as $key => $er2a)
                                        <div class="row mb-3" id="row-check">
                                            <div
                                                class="col-12 col-lg-2 col-md-12 d-flex justify-content-center align-items-center">
                                                <span>{{ $key }}</span>
                                            </div>
                                            <div class="col-12 col-lg-10">
                                                <div class="row justify-content-center">
                                                    <div class="col-6 col-lg-4 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7SD8051</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q1_a.' . $loop->index) is-invalid @enderror"
                                                                name="q1_a[]"
                                                                @if (!$er2a[0]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($er2a[0])
                                                                    <option value="alarm"
                                                                        {{ old('q1_a.' . $loop->index) ?? $formElpDailyEr2as[$loop->index]->q1 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q1_a.' . $loop->index) ?? $formElpDailyEr2as[$loop->index]->q1 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q1_a.' . $loop->index)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-4 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7SJ8041</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q2_a.' . $loop->index) is-invalid @enderror"
                                                                name="q2_a[]"
                                                                @if (!$er2a[1]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($er2a[1])
                                                                    <option value="alarm"
                                                                        {{ old('q2_a.' . $loop->index) ?? $formElpDailyEr2as[$loop->index]->q2 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q2_a.' . $loop->index) ?? $formElpDailyEr2as[$loop->index]->q2 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q2_a.' . $loop->index)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-4 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7RW801</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q3_a.' . $loop->index) is-invalid @enderror"
                                                                name="q3_a[]"
                                                                @if (!$er2a[2]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($er2a[2])
                                                                    <option value="alarm"
                                                                        {{ old('q3_a.' . $loop->index) ?? $formElpDailyEr2as[$loop->index]->q3 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q3_a.' . $loop->index) ?? $formElpDailyEr2as[$loop->index]->q3 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q3_a.' . $loop->index)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-4 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">MICOM</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">P543</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q4_a.' . $loop->index) is-invalid @enderror"
                                                                name="q4_a[]"
                                                                @if (!$er2a[3]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($er2a[3])
                                                                    <option value="alarm"
                                                                        {{ old('q4_a.' . $loop->index) ?? $formElpDailyEr2as[$loop->index]->q4 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q4_a.' . $loop->index) ?? $formElpDailyEr2as[$loop->index]->q4 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q4_a.' . $loop->index)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <hr class="bg-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="accordion" id="accordionTwo">
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> ER
                                        2B
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionTwo">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($er2bs as $key => $er2b)
                                        <div class="row mb-3" id="row-check">
                                            <div
                                                class="col-12 col-lg-2 col-md-12 d-flex justify-content-center align-items-center">
                                                <span>{{ $key }}</span>
                                            </div>
                                            <div class="col-12 col-lg-10">
                                                <div class="row justify-content-center">
                                                    <div class="col-6 col-lg-4 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7SD8051</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q1_b.' . $loop->index) is-invalid @enderror"
                                                                name="q1_b[]"
                                                                @if (!$er2b[0]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($er2b[0])
                                                                    <option value="alarm"
                                                                        {{ old('q1_b.' . $loop->index) ?? $formElpDailyEr2bs[$loop->index]->q1 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q1_b.' . $loop->index) ?? $formElpDailyEr2bs[$loop->index]->q1 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q1_b.' . $loop->index)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-4 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7SJ8041</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q2_a.' . $loop->index) is-invalid @enderror"
                                                                name="q2_b[]"
                                                                @if (!$er2b[1]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($er2b[1])
                                                                    <option value="alarm"
                                                                        {{ old('q2_b.' . $loop->index) ?? $formElpDailyEr2bs[$loop->index]->q2 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q2_b.' . $loop->index) ?? $formElpDailyEr2bs[$loop->index]->q2 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q2_b.' . $loop->index)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-4 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7RW801</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q3_b.' . $loop->index) is-invalid @enderror"
                                                                name="q3_b[]"
                                                                @if (!$er2b[2]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($er2b[2])
                                                                    <option value="alarm"
                                                                        {{ old('q3_b.' . $loop->index) ?? $formElpDailyEr2bs[$loop->index]->q3 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q3_b.' . $loop->index) ?? $formElpDailyEr2bs[$loop->index]->q3 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q3_b.' . $loop->index)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-4 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">MICOM</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">P543</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q4_b.' . $loop->index) is-invalid @enderror"
                                                                name="q4_b[]"
                                                                @if (!$er2b[3]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($er2b[3])
                                                                    <option value="alarm"
                                                                        {{ old('q4_b.' . $loop->index) ?? $formElpDailyEr2bs[$loop->index]->q4 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q4_b.' . $loop->index) ?? $formElpDailyEr2bs[$loop->index]->q4 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q4_b.' . $loop->index)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <hr class="bg-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="accordion" id="accordionThree">
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
                                        aria-controls="collapseThree" onclick="showHide(this)">
                                        <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                        NETWORK SCADA & RCMS
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionThree">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($gardus as $key => $gardu)
                                        <div class="row mb-3" id="row-check">
                                            <div
                                                class="col-12 col-lg-2 col-md-12 d-flex justify-content-center align-items-center">
                                                <span class="mr-1">NO.{{ $loop->iteration }} {{ $key }}</span>
                                            </div>
                                            <div class="col-12 col-lg-10">
                                                <div class="row justify-content-center">
                                                    <label class="col-12 d-flex justify-content-center">KONDISI</label>
                                                    <div class="col-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SCADA</label>
                                                        <div class="form-group">
                                                            <select
                                                                class="form-control @error('kondisi_scada.' . $loop->index) is-invalid @enderror"
                                                                name="kondisi_scada[]"
                                                                @if (!$gardu[0]) readonly @endif>
                                                                <option readoonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gardu[0])
                                                                    <option value="alarm"
                                                                        {{ old('kondisi_scada.' . $loop->index) ?? $formElpNetworkScadaRcmsDailies[$loop->index]->kondisi_scada == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('kondisi_scada.' . $loop->index) ?? $formElpNetworkScadaRcmsDailies[$loop->index]->kondisi_scada == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('kondisi_scada.' . $loop->index)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">RCMS</label>
                                                        <div class="form-group">
                                                            <select
                                                                class="form-control @error('kondisi_rcms.' . $loop->index) is-invalid @enderror"
                                                                name="kondisi_rcms[]"
                                                                @if (!$gardu[1]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gardu[1])
                                                                    <option value="alarm"
                                                                        {{ old('kondisi_rcms.' . $loop->index) ?? $formElpNetworkScadaRcmsDailies[$loop->index]->kondisi_rcms == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('kondisi_rcms.' . $loop->index) ?? $formElpNetworkScadaRcmsDailies[$loop->index]->kondisi_rcms == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('kondisi_rcms.' . $loop->index)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="bg-primary">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label
                                            class="col-12 col-lg-3 control-label d-flex justify-content-center align-items-center">Catatan</label>
                                        <div class="col-12 col-lg-9">

                                            <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                                                placeholder="Deskripsi">Catatan :
                                    Server RCMS     :
                                    Server SCADA    :
                                    Server SAS PS2  :
                                    Server SAS PS3  :
                                    Server SAS PS1  :
                                    Server SAS GIS  :
                                    Server SAS APMS :
                                    Server SAS ILCMS:
                                    SUHU TRAFO AUX A:
                                    SUHU TRAFO AUX B:
                                    POWER METER A   :
                                    POWER METER B   :
                                            </textarea>
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
