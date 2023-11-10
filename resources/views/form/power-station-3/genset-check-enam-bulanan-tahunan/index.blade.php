@extends($extends)

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

        label {
            display: flex;
            justify-content: center;
        }
    </style>
@endsection

@section('content')
    <form method="POST" action="{{ route('form.ps3.genset-check-enam-bulanan-tahunan.update', $detailWorkOrderForm->id) }}"
        enctype="multipart/form-data" id="form">
        @method('patch')
        @csrf

        @foreach ($formPs3GensetCheckEnamBulananTahunans as $key => $formPs3GensetCheckEnamBulananTahunan)
        <div class="container-fluid">
            <div class="accordion" id="accordion{{ $loop->iteration }}">
                <div class="card">
                    <div class="card-header" id="heading{{ $loop->iteration }}">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapse{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapse{{ $loop->iteration }}"
                                onclick="showHide(this)">
                                <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>GS {{ $loop->iteration }}
                            </button>
                        </h2>
                    </div>

                    <div id="collapse{{ $loop->iteration }}" class="collapse" aria-labelledby="heading{{ $loop->iteration }}" data-parent="#accordion{{ $loop->iteration }}">
                        <div class="card-body">
                            @include('components.form-message')
                            <div class="row">
                                <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                    <h5>PEMERIKSAAN TAHANAN BELITAN (AVOMETER)</h5>
                                </div>
                                <div class="col-12 col-lg-9">
                                    <div class="row">
                                        {{-- <label class="col-12 d-flex justify-content-center">ARUS (A)</label> --}}
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>U1 - U2</label>
                                                <input type="text"
                                                    class="form-control @error('motor_radiator_belitan_u1_u2') is-invalid @enderror"
                                                    id="motor_radiator_belitan_u1_u2[]" name="motor_radiator_belitan_u1_u2[]"
                                                    value="{{ old('motor_radiator_belitan_u1_u2') ?? $formPs3GensetCheckEnamBulananTahunan->motor_radiator_belitan_u1_u2 }}"
                                                    placeholder="">

                                                @error('motor_radiator_belitan_u1_u2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>V1- V2</label>
                                                <input type="text"
                                                    class="form-control @error('motor_radiator_belitan_v1_v2') is-invalid @enderror"
                                                    id="motor_radiator_belitan_v1_v2[]" name="motor_radiator_belitan_v1_v2[]"
                                                    value="{{ old('motor_radiator_belitan_v1_v2') ?? $formPs3GensetCheckEnamBulananTahunan->motor_radiator_belitan_v1_v2 }}"
                                                    placeholder="">

                                                @error('motor_radiator_belitan_v1_v2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>W1 - W2</label>
                                                <input type="text"
                                                    class="form-control @error('motor_radiator_belitan_w1_w2') is-invalid @enderror"
                                                    id="motor_radiator_belitan_w1_w2[]" name="motor_radiator_belitan_w1_w2[]"
                                                    value="{{ old('motor_radiator_belitan_w1_w2') ?? $formPs3GensetCheckEnamBulananTahunan->motor_radiator_belitan_w1_w2 }}"
                                                    placeholder="">

                                                @error('motor_radiator_belitan_w1_w2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>L1 - G</label>
                                                <input type="text"
                                                    class="form-control @error('motor_radiator_belitan_l1_g') is-invalid @enderror"
                                                    id="motor_radiator_belitan_l1_g[]" name="motor_radiator_belitan_l1_g[]"
                                                    value="{{ old('motor_radiator_belitan_l1_g') ?? $formPs3GensetCheckEnamBulananTahunan->motor_radiator_belitan_l1_g }}"
                                                    placeholder="">

                                                @error('motor_radiator_belitan_l1_g')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>L2 - G</label>
                                                <input type="text"
                                                    class="form-control @error('motor_radiator_belitan_l2_g') is-invalid @enderror"
                                                    id="motor_radiator_belitan_l2_g[]" name="motor_radiator_belitan_l2_g[]"
                                                    value="{{ old('motor_radiator_belitan_l2_g') ?? $formPs3GensetCheckEnamBulananTahunan->motor_radiator_belitan_l2_g }}"
                                                    placeholder="">

                                                @error('motor_radiator_belitan_l2_g')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>L3 - G</label>
                                                <input type="text"
                                                    class="form-control @error('motor_radiator_belitan_l3_g') is-invalid @enderror"
                                                    id="motor_radiator_belitan_l3_g[]" name="motor_radiator_belitan_l3_g[]"
                                                    value="{{ old('motor_radiator_belitan_l3_g') ?? $formPs3GensetCheckEnamBulananTahunan->motor_radiator_belitan_l3_g }}"
                                                    placeholder="">

                                                @error('motor_radiator_belitan_l3_g')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <hr class="border-primary">
                            <div class="row">
                                <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                    <h5>PEMERIKSAAN TAHANAN ISOLASI</h5>
                                </div>
                                <div class="col-12 col-lg-9">
                                    <div class="row">
                                        <label class="col-12 d-flex justify-content-center">L1 - G</label>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>1 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('motor_radiator_isolasi_l1_g_1m') is-invalid @enderror"
                                                    id="motor_radiator_isolasi_l1_g_1m[]" name="motor_radiator_isolasi_l1_g_1m[]"
                                                    value="{{ old('motor_radiator_isolasi_l1_g_1m') ?? $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l1_g_1m }}"
                                                    placeholder="">

                                                @error('motor_radiator_isolasi_l1_g_1m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>10 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('motor_radiator_isolasi_l1_g_10m') is-invalid @enderror"
                                                    id="motor_radiator_isolasi_l1_g_10m[]" name="motor_radiator_isolasi_l1_g_10m[]"
                                                    value="{{ old('motor_radiator_isolasi_l1_g_10m') ?? $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l1_g_10m }}"
                                                    placeholder="">

                                                @error('motor_radiator_isolasi_l1_g_10m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>1 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('motor_radiator_isolasi_l2_g_1m') is-invalid @enderror"
                                                    id="motor_radiator_isolasi_l2_g_1m[]" name="motor_radiator_isolasi_l2_g_1m[]"
                                                    value="{{ old('motor_radiator_isolasi_l2_g_1m') ?? $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l2_g_1m }}"
                                                    placeholder="">

                                                @error('motor_radiator_isolasi_l2_g_1m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>10 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('motor_radiator_isolasi_l2_g_10m') is-invalid @enderror"
                                                    id="motor_radiator_isolasi_l2_g_10m[]" name="motor_radiator_isolasi_l2_g_10m[]"
                                                    value="{{ old('motor_radiator_isolasi_l2_g_10m') ?? $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l2_g_10m }}"
                                                    placeholder="">

                                                @error('motor_radiator_isolasi_l2_g_10m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <label class="col-12 d-flex justify-content-center">L3 - G</label>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>1 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('motor_radiator_isolasi_l3_g_1m') is-invalid @enderror"
                                                    id="motor_radiator_isolasi_l3_g_1m[]" name="motor_radiator_isolasi_l3_g_1m[]"
                                                    value="{{ old('motor_radiator_isolasi_l3_g_1m') ?? $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l3_g_1m }}"
                                                    placeholder="">

                                                @error('motor_radiator_isolasi_l3_g_1m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>10 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('motor_radiator_isolasi_l3_g_10m') is-invalid @enderror"
                                                    id="motor_radiator_isolasi_l3_g_10m[]" name="motor_radiator_isolasi_l3_g_10m[]"
                                                    value="{{ old('motor_radiator_isolasi_l3_g_10m') ?? $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l3_g_10m }}"
                                                    placeholder="">

                                                @error('motor_radiator_isolasi_l3_g_10m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-12 d-flex justify-content-center">L1 - L2</label>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>1 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('motor_radiator_isolasi_l1_l2_1m') is-invalid @enderror"
                                                    id="motor_radiator_isolasi_l1_l2_1m[]" name="motor_radiator_isolasi_l1_l2_1m[]"
                                                    value="{{ old('motor_radiator_isolasi_l1_l2_1m') ?? $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l1_l2_1m }}"
                                                    placeholder="">

                                                @error('motor_radiator_isolasi_l1_l2_1m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>10 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('motor_radiator_isolasi_l1_l2_10m') is-invalid @enderror"
                                                    id="motor_radiator_isolasi_l1_l2_10m[]" name="motor_radiator_isolasi_l1_l2_10m[]"
                                                    value="{{ old('motor_radiator_isolasi_l1_l2_10m') ?? $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l1_l2_10m }}"
                                                    placeholder="">

                                                @error('motor_radiator_isolasi_l1_l2_10m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-12 d-flex justify-content-center">L1 - L3</label>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>1 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('motor_radiator_isolasi_l1_l3_1m') is-invalid @enderror"
                                                    id="motor_radiator_isolasi_l1_l3_1m[]" name="motor_radiator_isolasi_l1_l3_1m[]"
                                                    value="{{ old('motor_radiator_isolasi_l1_l3_1m') ?? $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l1_l3_1m }}"
                                                    placeholder="">

                                                @error('motor_radiator_isolasi_l1_l3_1m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>10 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('motor_radiator_isolasi_l1_l3_10m') is-invalid @enderror"
                                                    id="motor_radiator_isolasi_l1_l3_10m[]" name="motor_radiator_isolasi_l1_l3_10m[]"
                                                    value="{{ old('motor_radiator_isolasi_l1_l3_10m') ?? $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l1_l3_10m }}"
                                                    placeholder="">

                                                @error('motor_radiator_isolasi_l1_l3_10m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-12 d-flex justify-content-center">L2 - L3</label>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>1 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('motor_radiator_isolasi_l2_l3_1m') is-invalid @enderror"
                                                    id="motor_radiator_isolasi_l2_l3_1m[]" name="motor_radiator_isolasi_l2_l3_1m[]"
                                                    value="{{ old('motor_radiator_isolasi_l2_l3_1m') ?? $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l2_l3_1m }}"
                                                    placeholder="">

                                                @error('motor_radiator_isolasi_l2_l3_1m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>10 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('motor_radiator_isolasi_l2_l3_10m') is-invalid @enderror"
                                                    id="motor_radiator_isolasi_l2_l3_10m[]" name="motor_radiator_isolasi_l2_l3_10m[]"
                                                    value="{{ old('motor_radiator_isolasi_l2_l3_10m') ?? $formPs3GensetCheckEnamBulananTahunan->motor_radiator_isolasi_l2_l3_10m }}"
                                                    placeholder="">

                                                @error('motor_radiator_isolasi_l2_l3_10m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="border-primary">
                            <div class="row">
                                <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                    <h5>ALTERNATOR</h5>
                                </div>
                                <div class="col-12 col-lg-9">
                                    <div class="row">
                                        <label class="col-12 d-flex justify-content-center">L1 - G</label>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>1 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('alternator_isolasi_l1_g_1m') is-invalid @enderror"
                                                    id="alternator_isolasi_l1_g_1m[]" name="alternator_isolasi_l1_g_1m[]"
                                                    value="{{ old('alternator_isolasi_l1_g_1m') ?? $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l1_g_1m }}"
                                                    placeholder="">

                                                @error('alternator_isolasi_l1_g_1m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>10 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('alternator_isolasi_l1_g_10m') is-invalid @enderror"
                                                    id="alternator_isolasi_l1_g_10m[]" name="alternator_isolasi_l1_g_10m[]"
                                                    value="{{ old('alternator_isolasi_l1_g_10m') ?? $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l1_g_10m }}"
                                                    placeholder="">

                                                @error('alternator_isolasi_l1_g_10m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-12 d-flex justify-content-center">L2 - G</label>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>1 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('alternator_isolasi_l2_g_1m') is-invalid @enderror"
                                                    id="alternator_isolasi_l2_g_1m[]" name="alternator_isolasi_l2_g_1m[]"
                                                    value="{{ old('alternator_isolasi_l2_g_1m') ?? $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l2_g_1m }}"
                                                    placeholder="">

                                                @error('alternator_isolasi_l2_g_1m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>10 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('alternator_isolasi_l2_g_10m') is-invalid @enderror"
                                                    id="alternator_isolasi_l2_g_10m[]" name="alternator_isolasi_l2_g_10m[]"
                                                    value="{{ old('alternator_isolasi_l2_g_10m') ?? $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l2_g_10m }}"
                                                    placeholder="">

                                                @error('alternator_isolasi_l2_g_10m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <label class="col-12 d-flex justify-content-center">L3 - G</label>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>1 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('alternator_isolasi_l3_g_1m') is-invalid @enderror"
                                                    id="alternator_isolasi_l3_g_1m[]" name="alternator_isolasi_l3_g_1m[]"
                                                    value="{{ old('alternator_isolasi_l3_g_1m') ?? $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l3_g_1m }}"
                                                    placeholder="">

                                                @error('alternator_isolasi_l3_g_1m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>10 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('alternator_isolasi_l3_g_10m') is-invalid @enderror"
                                                    id="alternator_isolasi_l3_g_10m[]" name="alternator_isolasi_l3_g_10m[]"
                                                    value="{{ old('alternator_isolasi_l3_g_10m') ?? $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l3_g_10m }}"
                                                    placeholder="">

                                                @error('alternator_isolasi_l3_g_10m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-12 d-flex justify-content-center">L1 - L2 - L3 - G</label>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>1 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('alternator_isolasi_l1_l2_l3_g_1m') is-invalid @enderror"
                                                    id="alternator_isolasi_l1_l2_l3_g_1m[]" name="alternator_isolasi_l1_l2_l3_g_1m[]"
                                                    value="{{ old('alternator_isolasi_l1_l2_l3_g_1m') ?? $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l1_l2_l3_g_1m }}"
                                                    placeholder="">

                                                @error('alternator_isolasi_l1_l2_l3_g_1m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>10 MINUTE</label>
                                                <input type="text"
                                                    class="form-control @error('alternator_isolasi_l1_l2_l3_g_10m') is-invalid @enderror"
                                                    id="alternator_isolasi_l1_l2_l3_g_10m[]" name="alternator_isolasi_l1_l2_l3_g_10m[]"
                                                    value="{{ old('alternator_isolasi_l1_l2_l3_g_10m') ?? $formPs3GensetCheckEnamBulananTahunan->alternator_isolasi_l1_l2_l3_g_10m }}"
                                                    placeholder="">

                                                @error('alternator_isolasi_l1_l2_l3_g_10m')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
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
        @endforeach

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
                                        placeholder="Deskripsi">{!! $formPs3GensetCheckEnamBulananTahunans[0]->catatan ?? '' !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid">
            <div class="row">
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-footer">Add</button>
                    <a href="{{ route('work-orders.index') }}" class="btn btn-secondary btn-footer">Back</a>
                </div>
            </div>
        </div>

    </form>
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
