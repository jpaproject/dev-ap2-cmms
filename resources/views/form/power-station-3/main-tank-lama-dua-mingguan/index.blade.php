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
    <form method="POST" action="{{ route('form.ps3.main-tank-lama-dua-mingguan.update', $detailWorkOrderForm->id) }}"
        enctype="multipart/form-data" id="form">
        @method('patch')
        @csrf
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                PEMERIKSAAN ARUS MOTOR POMPA TRANSFER
                            </div>
                            <div class="card-body">
                                @include('components.form-message')
                                <span>MAIN TANK</span>
                                {{-- MAIN TANK --}}
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                            <span>P1A</span>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('main_tank_p1a') is-invalid @enderror"
                                                id="main_tank_p1a" name="main_tank_p1a"
                                                value="{{ old('main_tank_p1a') ?? $formPs3MainTankLamaDuaMingguan->main_tank_p1a }}"
                                                placeholder="">

                                            @error('main_tank_p1a')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('main_tank_p1a_2') is-invalid @enderror"
                                                id="main_tank_p1a_2" name="main_tank_p1a_2"
                                                value="{{ old('main_tank_p1a_2') ?? $formPs3MainTankLamaDuaMingguan->main_tank_p1a_2 }}"
                                                placeholder="">

                                            @error('main_tank_p1a_2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('main_tank_p1a_3') is-invalid @enderror"
                                                id="main_tank_p1a_3" name="main_tank_p1a_3"
                                                value="{{ old('main_tank_p1a_3') ?? $formPs3MainTankLamaDuaMingguan->main_tank_p1a_3 }}"
                                                placeholder="">

                                            @error('main_tank_p1a_3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                            <span>P1B</span>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('main_tank_p1b') is-invalid @enderror"
                                                id="main_tank_p1b" name="main_tank_p1b"
                                                value="{{ old('main_tank_p1b') ?? $formPs3MainTankLamaDuaMingguan->main_tank_p1b }}"
                                                placeholder="">

                                            @error('main_tank_p1b')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('main_tank_p1b_2') is-invalid @enderror"
                                                id="main_tank_p1b_2" name="main_tank_p1b_2"
                                                value="{{ old('main_tank_p1b_2') ?? $formPs3MainTankLamaDuaMingguan->main_tank_p1b_2 }}"
                                                placeholder="">

                                            @error('main_tank_p1b_2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('main_tank_p1b_3') is-invalid @enderror"
                                                id="main_tank_p1b_3" name="main_tank_p1b_3"
                                                value="{{ old('main_tank_p1b_3') ?? $formPs3MainTankLamaDuaMingguan->main_tank_p1b_3 }}"
                                                placeholder="">

                                            @error('main_tank_p1b_3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                            <span>P2A</span>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('main_tank_p2a') is-invalid @enderror"
                                                id="main_tank_p2a" name="main_tank_p2a"
                                                value="{{ old('main_tank_p2a') ?? $formPs3MainTankLamaDuaMingguan->main_tank_p2a }}"
                                                placeholder="">

                                            @error('main_tank_p2a')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('main_tank_p2a_2') is-invalid @enderror"
                                                id="main_tank_p2a_2" name="main_tank_p2a_2"
                                                value="{{ old('main_tank_p2a_2') ?? $formPs3MainTankLamaDuaMingguan->main_tank_p2a_2 }}"
                                                placeholder="">

                                            @error('main_tank_p2a_2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('main_tank_p2a_3') is-invalid @enderror"
                                                id="main_tank_p2a_3" name="main_tank_p2a_3"
                                                value="{{ old('main_tank_p2a_3') ?? $formPs3MainTankLamaDuaMingguan->main_tank_p2a_3 }}"
                                                placeholder="">

                                            @error('main_tank_p2a_3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                            <span>P2B</span>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('main_tank_p2b') is-invalid @enderror"
                                                id="main_tank_p2b" name="main_tank_p2b"
                                                value="{{ old('main_tank_p2b') ?? $formPs3MainTankLamaDuaMingguan->main_tank_p2b }}"
                                                placeholder="">

                                            @error('main_tank_p2b')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('main_tank_p2b_2') is-invalid @enderror"
                                                id="main_tank_p2b_2" name="main_tank_p2b_2"
                                                value="{{ old('main_tank_p2b_2') ?? $formPs3MainTankLamaDuaMingguan->main_tank_p2b_2 }}"
                                                placeholder="">

                                            @error('main_tank_p2b_2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('main_tank_p2b_3') is-invalid @enderror"
                                                id="main_tank_p2b_3" name="main_tank_p2b_3"
                                                value="{{ old('main_tank_p2b_3') ?? $formPs3MainTankLamaDuaMingguan->main_tank_p2b_3 }}"
                                                placeholder="">

                                            @error('main_tank_p2b_3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                            <span>P4</span>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('main_tank_p4') is-invalid @enderror"
                                                id="main_tank_p4"
                                                name="main_tank_p4"
                                                value="{{ old('main_tank_p4') ?? $formPs3MainTankLamaDuaMingguan->main_tank_p4 }}"
                                                placeholder="">

                                            @error('main_tank_p4')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('main_tank_p4_2') is-invalid @enderror"
                                                id="main_tank_p4_2"
                                                name="main_tank_p4_2"
                                                value="{{ old('main_tank_p4_2') ?? $formPs3MainTankLamaDuaMingguan->main_tank_p4_2 }}"
                                                placeholder="">

                                            @error('main_tank_p4_2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('main_tank_p4_3') is-invalid @enderror"
                                                id="main_tank_p4_3"
                                                name="main_tank_p4_3"
                                                value="{{ old('main_tank_p4_3') ?? $formPs3MainTankLamaDuaMingguan->main_tank_p4_3 }}"
                                                placeholder="">

                                            @error('main_tank_p4_3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <hr class="border-primary">
                                <span>SUMP TANK</span>
                                {{-- SUMP TANK --}}
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                            <span>P1</span>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('sump_tank_p1') is-invalid @enderror"
                                                id="sump_tank_p1"
                                                name="sump_tank_p1"
                                                value="{{ old('sump_tank_p1') ?? $formPs3MainTankLamaDuaMingguan->sump_tank_p1 }}"
                                                placeholder="">

                                            @error('sump_tank_p1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('sump_tank_p1_2') is-invalid @enderror"
                                                id="sump_tank_p1_2"
                                                name="sump_tank_p1_2"
                                                value="{{ old('sump_tank_p1_2') ?? $formPs3MainTankLamaDuaMingguan->sump_tank_p1_2 }}"
                                                placeholder="">

                                            @error('sump_tank_p1_2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('sump_tank_p1_3') is-invalid @enderror"
                                                id="sump_tank_p1_3"
                                                name="sump_tank_p1_3"
                                                value="{{ old('sump_tank_p1_3') ?? $formPs3MainTankLamaDuaMingguan->sump_tank_p1_3 }}"
                                                placeholder="">

                                            @error('sump_tank_p1_3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                            <span>P2</span>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('sump_tank_p2') is-invalid @enderror"
                                                id="sump_tank_p2"
                                                name="sump_tank_p2"
                                                value="{{ old('sump_tank_p2') ?? $formPs3MainTankLamaDuaMingguan->sump_tank_p2 }}"
                                                placeholder="">

                                            @error('sump_tank_p2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('sump_tank_p2_2') is-invalid @enderror"
                                                id="sump_tank_p2_2"
                                                name="sump_tank_p2_2"
                                                value="{{ old('sump_tank_p2_2') ?? $formPs3MainTankLamaDuaMingguan->sump_tank_p2_2 }}"
                                                placeholder="">

                                            @error('sump_tank_p2_2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('sump_tank_p2_3') is-invalid @enderror"
                                                id="sump_tank_p2_3"
                                                name="sump_tank_p2_3"
                                                value="{{ old('sump_tank_p2_3') ?? $formPs3MainTankLamaDuaMingguan->sump_tank_p2_3 }}"
                                                placeholder="">

                                            @error('sump_tank_p2_3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <hr class="border-primary">
                                {{-- POMPA SUMPIT MAIN TANK	 --}}
                                <span>POMPA SUMPIT MAIN TANK</span>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                            <span>P1</span>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('pompa_sumpit_main_tank_p1') is-invalid @enderror"
                                                id="pompa_sumpit_main_tank_p1"
                                                name="pompa_sumpit_main_tank_p1"
                                                value="{{ old('pompa_sumpit_main_tank_p1') ?? $formPs3MainTankLamaDuaMingguan->pompa_sumpit_main_tank_p1 }}"
                                                placeholder="">

                                            @error('pompa_sumpit_main_tank_p1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('pompa_sumpit_main_tank_p1_2') is-invalid @enderror"
                                                id="pompa_sumpit_main_tank_p1_2"
                                                name="pompa_sumpit_main_tank_p1_2"
                                                value="{{ old('pompa_sumpit_main_tank_p1_2') ?? $formPs3MainTankLamaDuaMingguan->pompa_sumpit_main_tank_p1_2 }}"
                                                placeholder="">

                                            @error('pompa_sumpit_main_tank_p1_2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('pompa_sumpit_main_tank_p1_3') is-invalid @enderror"
                                                id="pompa_sumpit_main_tank_p1_3"
                                                name="pompa_sumpit_main_tank_p1_3"
                                                value="{{ old('pompa_sumpit_main_tank_p1_3') ?? $formPs3MainTankLamaDuaMingguan->pompa_sumpit_main_tank_p1_3 }}"
                                                placeholder="">

                                            @error('pompa_sumpit_main_tank_p1_3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                            <span>P2</span>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('pompa_sumpit_main_tank_p2') is-invalid @enderror"
                                                id="pompa_sumpit_main_tank_p2"
                                                name="pompa_sumpit_main_tank_p2"
                                                value="{{ old('pompa_sumpit_main_tank_p2') ?? $formPs3MainTankLamaDuaMingguan->pompa_sumpit_main_tank_p2 }}"
                                                placeholder="">

                                            @error('pompa_sumpit_main_tank_p2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('pompa_sumpit_main_tank_p2_2') is-invalid @enderror"
                                                id="pompa_sumpit_main_tank_p2_2"
                                                name="pompa_sumpit_main_tank_p2_2"
                                                value="{{ old('pompa_sumpit_main_tank_p2_2') ?? $formPs3MainTankLamaDuaMingguan->pompa_sumpit_main_tank_p2_2 }}"
                                                placeholder="">

                                            @error('pompa_sumpit_main_tank_p2_2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('pompa_sumpit_main_tank_p2_3') is-invalid @enderror"
                                                id="pompa_sumpit_main_tank_p2_3"
                                                name="pompa_sumpit_main_tank_p2_3"
                                                value="{{ old('pompa_sumpit_main_tank_p2_3') ?? $formPs3MainTankLamaDuaMingguan->pompa_sumpit_main_tank_p2_3 }}"
                                                placeholder="">

                                            @error('pompa_sumpit_main_tank_p2_3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <hr class="border-primary">
                                <span>POMPA SUMPIT SUMP TANK</span>
                                {{-- POMPA SUMPIT SUMP TANK	 --}}
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                            <span>P1</span>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('pompa_sumpit_sump_tank_p1') is-invalid @enderror"
                                                id="pompa_sumpit_sump_tank_p1"
                                                name="pompa_sumpit_sump_tank_p1"
                                                value="{{ old('pompa_sumpit_sump_tank_p1') ?? $formPs3MainTankLamaDuaMingguan->pompa_sumpit_sump_tank_p1 }}"
                                                placeholder="">

                                            @error('pompa_sumpit_sump_tank_p1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('pompa_sumpit_sump_tank_p1_2') is-invalid @enderror"
                                                id="pompa_sumpit_sump_tank_p1_2"
                                                name="pompa_sumpit_sump_tank_p1_2"
                                                value="{{ old('pompa_sumpit_sump_tank_p1_2') ?? $formPs3MainTankLamaDuaMingguan->pompa_sumpit_sump_tank_p1_2 }}"
                                                placeholder="">

                                            @error('pompa_sumpit_sump_tank_p1_2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('pompa_sumpit_sump_tank_p1_3') is-invalid @enderror"
                                                id="pompa_sumpit_sump_tank_p1_3"
                                                name="pompa_sumpit_sump_tank_p1_3"
                                                value="{{ old('pompa_sumpit_sump_tank_p1_3') ?? $formPs3MainTankLamaDuaMingguan->pompa_sumpit_sump_tank_p1_3 }}"
                                                placeholder="">

                                            @error('pompa_sumpit_sump_tank_p1_3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                            <span>P2</span>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('pompa_sumpit_sump_tank_p2') is-invalid @enderror"
                                                id="pompa_sumpit_sump_tank_p2"
                                                name="pompa_sumpit_sump_tank_p2"
                                                value="{{ old('pompa_sumpit_sump_tank_p2') ?? $formPs3MainTankLamaDuaMingguan->pompa_sumpit_sump_tank_p2 }}"
                                                placeholder="">

                                            @error('pompa_sumpit_sump_tank_p2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('pompa_sumpit_sump_tank_p2_2') is-invalid @enderror"
                                                id="pompa_sumpit_sump_tank_p2_2"
                                                name="pompa_sumpit_sump_tank_p2_2"
                                                value="{{ old('pompa_sumpit_sump_tank_p2_2') ?? $formPs3MainTankLamaDuaMingguan->pompa_sumpit_sump_tank_p2_2 }}"
                                                placeholder="">

                                            @error('pompa_sumpit_sump_tank_p2_2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('pompa_sumpit_sump_tank_p2_3') is-invalid @enderror"
                                                id="pompa_sumpit_sump_tank_p2_3"
                                                name="pompa_sumpit_sump_tank_p2_3"
                                                value="{{ old('pompa_sumpit_sump_tank_p2_3') ?? $formPs3MainTankLamaDuaMingguan->pompa_sumpit_sump_tank_p2_3 }}"
                                                placeholder="">

                                            @error('pompa_sumpit_sump_tank_p2_3')
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

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                LEVEL BAHAN BAKAR
                            </div>
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <span>MAIN TANK1</span>
                                        </div>
                                        <div class="col-12 col-lg-7 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('main_tank1') is-invalid @enderror"
                                                id="main_tank1" name="main_tank1"
                                                value="{{ old('main_tank1') ?? $formPs3MainTankLamaDuaMingguan->main_tank1 }}"
                                                placeholder="">

                                            @error('main_tank1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <span>MAIN TANK2</span>
                                        </div>
                                        <div class="col-12 col-lg-7 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('main_tank2') is-invalid @enderror"
                                                id="main_tank2" name="main_tank2"
                                                value="{{ old('main_tank2') ?? $formPs3MainTankLamaDuaMingguan->main_tank2 }}"
                                                placeholder="">

                                            @error('main_tank2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <span>MAIN TANK3</span>
                                        </div>
                                        <div class="col-12 col-lg-7 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('main_tank3') is-invalid @enderror"
                                                id="main_tank3" name="main_tank3"
                                                value="{{ old('main_tank3') ?? $formPs3MainTankLamaDuaMingguan->main_tank3 }}"
                                                placeholder="">

                                            @error('main_tank3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <span>SUMP TANK1</span>
                                        </div>
                                        <div class="col-12 col-lg-7 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('sump_tank1') is-invalid @enderror"
                                                id="sump_tank1" name="sump_tank1"
                                                value="{{ old('sump_tank1') ?? $formPs3MainTankLamaDuaMingguan->sump_tank1 }}"
                                                placeholder="">

                                            @error('sump_tank1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <span>SUMP TANK2</span>
                                        </div>
                                        <div class="col-12 col-lg-7 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('sump_tank2') is-invalid @enderror"
                                                id="sump_tank2"
                                                name="sump_tank2"
                                                value="{{ old('sump_tank2') ?? $formPs3MainTankLamaDuaMingguan->sump_tank2 }}"
                                                placeholder="">

                                            @error('sump_tank2')
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

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                TEGANGAN INPUT PANEL POMPA
                            </div>
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <span>PANEL HMI MAIN TANK</span>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-6 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('panel_hmi_main_tank') is-invalid @enderror"
                                                id="panel_hmi_main_tank" name="panel_hmi_main_tank"
                                                value="{{ old('panel_hmi_main_tank') ?? $formPs3MainTankLamaDuaMingguan->panel_hmi_main_tank }}"
                                                placeholder="">

                                            @error('panel_hmi_main_tank')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-4 col-md-6 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('panel_hmi_main_tank_2') is-invalid @enderror"
                                                id="panel_hmi_main_tank_2" name="panel_hmi_main_tank_2"
                                                value="{{ old('panel_hmi_main_tank_2') ?? $formPs3MainTankLamaDuaMingguan->panel_hmi_main_tank_2 }}"
                                                placeholder="">

                                            @error('panel_hmi_main_tank_2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <span>PANEL KONTROL MAIN TANK</span>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-6 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('panel_kontrol_main_tank') is-invalid @enderror"
                                                id="panel_kontrol_main_tank" name="panel_kontrol_main_tank"
                                                value="{{ old('panel_kontrol_main_tank') ?? $formPs3MainTankLamaDuaMingguan->panel_kontrol_main_tank }}"
                                                placeholder="">

                                            @error('panel_kontrol_main_tank')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-4 col-md-6 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('panel_kontrol_main_tank_2') is-invalid @enderror"
                                                id="panel_kontrol_main_tank_2" name="panel_kontrol_main_tank_2"
                                                value="{{ old('panel_kontrol_main_tank_2') ?? $formPs3MainTankLamaDuaMingguan->panel_kontrol_main_tank_2 }}"
                                                placeholder="">

                                            @error('panel_kontrol_main_tank_2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <span>PANEL KONTROL SUMP TANK</span>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-6 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('panel_kontrol_sump_tank') is-invalid @enderror"
                                                id="panel_kontrol_sump_tank" name="panel_kontrol_sump_tank"
                                                value="{{ old('panel_kontrol_sump_tank') ?? $formPs3MainTankLamaDuaMingguan->panel_kontrol_sump_tank }}"
                                                placeholder="">

                                            @error('panel_kontrol_sump_tank')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-4 col-md-6 mt-1 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('panel_kontrol_sump_tank_2') is-invalid @enderror"
                                                id="panel_kontrol_sump_tank_2" name="panel_kontrol_sump_tank_2"
                                                value="{{ old('panel_kontrol_sump_tank_2') ?? $formPs3MainTankLamaDuaMingguan->panel_kontrol_sump_tank_2 }}"
                                                placeholder="">

                                            @error('panel_kontrol_sump_tank_2')
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
                                            placeholder="Deskripsi">{!! $formPs3MainTankLamaDuaMingguan->catatan ??
                                                'Visual Check Kondisi Panel , Peralatan dan Segala Aspek dalam Kondisi Normal Selesai Perawatan , Peralatan Kembali Ke Posisi Auto ' !!}</textarea>
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
                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-footer">Back</a>
                    </div>
                </div>
            </div>

        </section>
    </form>
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
