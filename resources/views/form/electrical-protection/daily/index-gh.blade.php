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
        <form method="POST" action="{{ route('form.elp.daily-gh.update', $detailWorkOrderForm->id) }}"
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
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i> GH 126 EXT
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="show collapse" aria-labelledby="headingOne"
                                data-parent="#accordionOne">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($gh_123_exts as $key => $gh_123_ext)
                                        <div class="row mb-3" id="row-check">
                                            <div
                                                class="col-12 col-lg-2 col-md-12 d-flex justify-content-center align-items-center">
                                                <span>{{ $key }}</span>
                                            </div>
                                            <div class="col-12 col-lg-10">
                                                <div class="row justify-content-center">
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7SD8051</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q1_a.' . $loop->index) is-invalid @enderror"
                                                                name="q1_a[]"
                                                                @if (!$gh_123_ext[0]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_123_ext[0])
                                                                    <option value="alarm"
                                                                        {{ old('q1_a.' . $loop->index) ?? $formElpDailyGh123Exts[$loop->index]->q1 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q1_a.' . $loop->index) ?? $formElpDailyGh123Exts[$loop->index]->q1 == 'normal' ? 'selected' : '' }}>
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
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7SJ8041</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q2_a.' . $loop->index) is-invalid @enderror"
                                                                name="q2_a[]"
                                                                @if (!$gh_123_ext[1]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_123_ext[1])
                                                                    <option value="alarm"
                                                                        {{ old('q2_a.' . $loop->index) ?? $formElpDailyGh123Exts[$loop->index]->q2 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q2_a.' . $loop->index) ?? $formElpDailyGh123Exts[$loop->index]->q2 == 'normal' ? 'selected' : '' }}>
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
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7RW801</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q3_a.' . $loop->index) is-invalid @enderror"
                                                                name="q3_a[]"
                                                                @if (!$gh_123_ext[2]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_123_ext[2])
                                                                    <option value="alarm"
                                                                        {{ old('q3_a.' . $loop->index) ?? $formElpDailyGh123Exts[$loop->index]->q3 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q3_a.' . $loop->index) ?? $formElpDailyGh123Exts[$loop->index]->q3 == 'normal' ? 'selected' : '' }}>
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
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <br>
                                                        <label class="d-flex justify-content-center mt-2"
                                                            for="">FO</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q4_a.' . $loop->index) is-invalid @enderror"
                                                                name="q4_a[]"
                                                                @if (!$gh_123_ext[3]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_123_ext[3])
                                                                    <option value="alarm"
                                                                        {{ old('q4_a.' . $loop->index) ?? $formElpDailyGh123Exts[$loop->index]->q4 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q4_a.' . $loop->index) ?? $formElpDailyGh123Exts[$loop->index]->q4 == 'normal' ? 'selected' : '' }}>
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
                                        <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> GH 127 - ER1
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionTwo">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($gh_127_er1s as $key => $gh_127_er1)
                                        <div class="row mb-3" id="row-check">
                                            <div
                                                class="col-12 col-lg-2 col-md-12 d-flex justify-content-center align-items-center">
                                                <span>{{ $key }}</span>
                                            </div>
                                            <div class="col-12 col-lg-10">
                                                <div class="row justify-content-center">
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7SD8051</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q1_b.' . $loop->index) is-invalid @enderror"
                                                                name="q1_b[]"
                                                                @if (!$gh_127_er1[0]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_127_er1[0])
                                                                    <option value="alarm"
                                                                        {{ old('q1_b.' . $loop->index) ?? $formElpDailyGh127Er1s[$loop->index]->q1 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q1_b.' . $loop->index) ?? $formElpDailyGh127Er1s[$loop->index]->q1 == 'normal' ? 'selected' : '' }}>
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
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7SJ8041</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q2_a.' . $loop->index) is-invalid @enderror"
                                                                name="q2_b[]"
                                                                @if (!$gh_127_er1[1]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_127_er1[1])
                                                                    <option value="alarm"
                                                                        {{ old('q2_b.' . $loop->index) ?? $formElpDailyGh127Er1s[$loop->index]->q2 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q2_b.' . $loop->index) ?? $formElpDailyGh127Er1s[$loop->index]->q2 == 'normal' ? 'selected' : '' }}>
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
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7RW801</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q3_b.' . $loop->index) is-invalid @enderror"
                                                                name="q3_b[]"
                                                                @if (!$gh_127_er1[2]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_127_er1[2])
                                                                    <option value="alarm"
                                                                        {{ old('q3_b.' . $loop->index) ?? $formElpDailyGh127Er1s[$loop->index]->q3 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q3_b.' . $loop->index) ?? $formElpDailyGh127Er1s[$loop->index]->q3 == 'normal' ? 'selected' : '' }}>
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
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <br>
                                                        <label class="d-flex justify-content-center mt-2"
                                                            for="">FO</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q4_b.' . $loop->index) is-invalid @enderror"
                                                                name="q4_b[]"
                                                                @if (!$gh_127_er1[3]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_127_er1[3])
                                                                    <option value="alarm"
                                                                        {{ old('q4_b.' . $loop->index) ?? $formElpDailyGh127Er1s[$loop->index]->q4 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q4_b.' . $loop->index) ?? $formElpDailyGh127Er1s[$loop->index]->q4 == 'normal' ? 'selected' : '' }}>
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
                                        GH 127 - ER2
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionThree">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($gh_127_er2s as $key => $gh_127_er2)
                                        <div class="row mb-3" id="row-check">
                                            <div
                                                class="col-12 col-lg-2 col-md-12 d-flex justify-content-center align-items-center">
                                                <span class="mr-1">NO.{{ $loop->iteration }} {{ $key }}</span>
                                            </div>
                                            <div class="col-12 col-lg-10">
                                                <div class="row justify-content-center">
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7SD8051</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q1_c.' . $loop->index) is-invalid @enderror"
                                                                name="q1_c[]"
                                                                @if (!$gh_127_er2[0]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_127_er2[0])
                                                                    <option value="alarm"
                                                                        {{ old('q1_c.' . $loop->index) ?? $formElpDailyGh127Er2s[$loop->index]->q1 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q1_c.' . $loop->index) ?? $formElpDailyGh127Er2s[$loop->index]->q1 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q1_c.' . $loop->index)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7SJ8041</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q2_a.' . $loop->index) is-invalid @enderror"
                                                                name="q2_c[]"
                                                                @if (!$gh_127_er2[1]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_127_er2[1])
                                                                    <option value="alarm"
                                                                        {{ old('q2_c.' . $loop->index) ?? $formElpDailyGh127Er2s[$loop->index]->q2 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q2_c.' . $loop->index) ?? $formElpDailyGh127Er2s[$loop->index]->q2 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q2_c.' . $loop->index)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7RW801</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q3_c.' . $loop->index) is-invalid @enderror"
                                                                name="q3_c[]"
                                                                @if (!$gh_127_er2[2]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_127_er2[2])
                                                                    <option value="alarm"
                                                                        {{ old('q3_c.' . $loop->index) ?? $formElpDailyGh127Er2s[$loop->index]->q3 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q3_c.' . $loop->index) ?? $formElpDailyGh127Er2s[$loop->index]->q3 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q3_c.' . $loop->index)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <br>
                                                        <label class="d-flex justify-content-center mt-2"
                                                            for="">FO</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q4_c.' . $loop->index) is-invalid @enderror"
                                                                name="q4_c[]"
                                                                @if (!$gh_127_er2[3]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_127_er2[3])
                                                                    <option value="alarm"
                                                                        {{ old('q4_c.' . $loop->index) ?? $formElpDailyGh127Er2s[$loop->index]->q4 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q4_c.' . $loop->index) ?? $formElpDailyGh127Er2s[$loop->index]->q4 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q4_c.' . $loop->index)
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
                    <div class="accordion" id="accordionFour">
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
                                        aria-controls="collapseFour" onclick="showHide(this)">
                                        <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                        GH 128 - ER1
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                data-parent="#accordionFour">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($gh_128_er1s as $key => $gh_128_er1)
                                        <div class="row mb-3" id="row-check">
                                            <div
                                                class="col-12 col-lg-2 col-md-12 d-flex justify-content-center align-items-center">
                                                <span class="mr-1">NO.{{ $loop->iteration }} {{ $key }}</span>
                                            </div>
                                            <div class="col-12 col-lg-10">
                                                <div class="row justify-content-center">
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7SD8051</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q1_d.' . $loop->index) is-invalid @enderror"
                                                                name="q1_d[]"
                                                                @if (!$gh_128_er1[0]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_128_er1[0])
                                                                    <option value="alarm"
                                                                        {{ old('q1_d.' . $loop->index) ?? $formElpDailyGh128Er1s[$loop->index]->q1 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q1_d.' . $loop->index) ?? $formElpDailyGh128Er1s[$loop->index]->q1 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q1_d.' . $loop->index)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7SJ8041</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q2_a.' . $loop->index) is-invalid @enderror"
                                                                name="q2_d[]"
                                                                @if (!$gh_128_er1[1]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_128_er1[1])
                                                                    <option value="alarm"
                                                                        {{ old('q2_d.' . $loop->index) ?? $formElpDailyGh128Er1s[$loop->index]->q2 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q2_d.' . $loop->index) ?? $formElpDailyGh128Er1s[$loop->index]->q2 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q2_d.' . $loop->index)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7RW801</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q3_d.' . $loop->index) is-invalid @enderror"
                                                                name="q3_d[]"
                                                                @if (!$gh_128_er1[2]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_128_er1[2])
                                                                    <option value="alarm"
                                                                        {{ old('q3_d.' . $loop->index) ?? $formElpDailyGh128Er1s[$loop->index]->q3 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q3_d.' . $loop->index) ?? $formElpDailyGh128Er1s[$loop->index]->q3 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q3_d.' . $loop->index)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <br>
                                                        <label class="d-flex justify-content-center mt-2"
                                                            for="">FO</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q4_d.' . $loop->index) is-invalid @enderror"
                                                                name="q4_d[]"
                                                                @if (!$gh_128_er1[3]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_128_er1[3])
                                                                    <option value="alarm"
                                                                        {{ old('q4_d.' . $loop->index) ?? $formElpDailyGh128Er1s[$loop->index]->q4 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q4_d.' . $loop->index) ?? $formElpDailyGh128Er1s[$loop->index]->q4 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q4_d.' . $loop->index)
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
                    <div class="accordion" id="accordionFive">
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseFive" aria-expanded="true"
                                        aria-controls="collapseFive" onclick="showHide(this)">
                                        <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                        GH 128 - ER2
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                data-parent="#accordionFive">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($gh_128_er2s as $key => $gh_128_er2)
                                        <div class="row mb-3" id="row-check">
                                            <div
                                                class="col-12 col-lg-2 col-md-12 d-flex justify-content-center align-items-center">
                                                <span class="mr-1">NO.{{ $loop->iteration }} {{ $key }}</span>
                                            </div>
                                            <div class="col-12 col-lg-10">
                                                <div class="row justify-content-center">
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7SD8051</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q1_e.' . $loop->index) is-invalid @enderror"
                                                                name="q1_e[]"
                                                                @if (!$gh_128_er2[0]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_128_er2[0])
                                                                    <option value="alarm"
                                                                        {{ old('q1_e.' . $loop->index) ?? $formElpDailyGh128Er2s[$loop->index]->q1 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q1_e.' . $loop->index) ?? $formElpDailyGh128Er2s[$loop->index]->q1 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q1_e.' . $loop->index)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7SJ8041</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q2_a.' . $loop->index) is-invalid @enderror"
                                                                name="q2_e[]"
                                                                @if (!$gh_128_er2[1]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_128_er2[1])
                                                                    <option value="alarm"
                                                                        {{ old('q2_e.' . $loop->index) ?? $formElpDailyGh128Er2s[$loop->index]->q2 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q2_e.' . $loop->index) ?? $formElpDailyGh128Er2s[$loop->index]->q2 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q2_e.' . $loop->index)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <label class="d-flex justify-content-center"
                                                            for="">SIPROTEC</label>
                                                        <label class="d-flex justify-content-center"
                                                            for="">7RW801</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q3_e.' . $loop->index) is-invalid @enderror"
                                                                name="q3_e[]"
                                                                @if (!$gh_128_er2[2]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_128_er2[2])
                                                                    <option value="alarm"
                                                                        {{ old('q3_e.' . $loop->index) ?? $formElpDailyGh128Er2s[$loop->index]->q3 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q3_e.' . $loop->index) ?? $formElpDailyGh128Er2s[$loop->index]->q3 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q3_e.' . $loop->index)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3 col-md-6">
                                                        <br>
                                                        <label class="d-flex justify-content-center mt-2"
                                                            for="">FO</label>
                                                        <div class="form-group d-flex justify-content-center">

                                                            <select
                                                                class="form-control @error('q4_e.' . $loop->index) is-invalid @enderror"
                                                                name="q4_e[]"
                                                                @if (!$gh_128_er2[3]) readonly @endif>
                                                                <option readonly selected value="">Choose Selection
                                                                </option>
                                                                @if ($gh_128_er2[3])
                                                                    <option value="alarm"
                                                                        {{ old('q4_e.' . $loop->index) ?? $formElpDailyGh128Er2s[$loop->index]->q4 == 'alarm' ? 'selected' : '' }}>
                                                                        Alarm</option>
                                                                    <option value="normal"
                                                                        {{ old('q4_e.' . $loop->index) ?? $formElpDailyGh128Er2s[$loop->index]->q4 == 'normal' ? 'selected' : '' }}>
                                                                        Normal</option>
                                                                @endif
                                                            </select>
                                                            @error('q4_e.' . $loop->index)
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
                                                GH 126 ext : MCA (TIDAK ADA PASANGAN RELAY LINE DIFF)
                                                GH 127 : MCB, MCE, MSM (TIDAK ADA PASANGAN RELAY LINE DIFF)
                                                GH128 : MSB, MSK, MCA, MCB, MCD, MCE ( TIDAK ADA PASANGAN RELAY LINE DIFF )
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
