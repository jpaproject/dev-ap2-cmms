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
    <form method="POST" action="{{ route('form.ps3.ground-tank-baru-dua-mingguan.update', $detailWorkOrderForm->id) }}"
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
                                <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>PEMERIKSAAN ARUS
                                MOTOR POMPA TRANSFER
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="show collapse" aria-labelledby="headingOne" data-parent="#accordionOne">
                        <div class="card-body">
                            @include('components.form-message')
                            <div class="col-12 d-flex justify-content-center align-items-center mb-3">
                                <span>PEMERIKSAAN ARUS MOTOR POMPA TRANSFER</span>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                        <span>TRANFER PUMP ANTAR TANK 1</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump_antar_tank1_1') is-invalid @enderror"
                                            id="transfer_pump_antar_tank1_1" name="transfer_pump_antar_tank1_1"
                                            value="{{ old('transfer_pump_antar_tank1_1') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump_antar_tank1_1 }}"
                                            placeholder="">

                                        @error('transfer_pump_antar_tank1_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump_antar_tank1_2') is-invalid @enderror"
                                            id="transfer_pump_antar_tank1_2" name="transfer_pump_antar_tank1_2"
                                            value="{{ old('transfer_pump_antar_tank1_2') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump_antar_tank1_2 }}"
                                            placeholder="">

                                        @error('transfer_pump_antar_tank1_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump_antar_tank1_3') is-invalid @enderror"
                                            id="transfer_pump_antar_tank1_3" name="transfer_pump_antar_tank1_3"
                                            value="{{ old('transfer_pump_antar_tank1_3') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump_antar_tank1_3 }}"
                                            placeholder="">

                                        @error('transfer_pump_antar_tank1_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                        <span>TRANSFER PUMP ANTAR TANK 2</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump_antar_tank2_1') is-invalid @enderror"
                                            id="transfer_pump_antar_tank2_1" name="transfer_pump_antar_tank2_1"
                                            value="{{ old('transfer_pump_antar_tank2_1') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump_antar_tank2_1 }}"
                                            placeholder="">

                                        @error('transfer_pump_antar_tank2_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump_antar_tank2_2') is-invalid @enderror"
                                            id="transfer_pump_antar_tank2_2" name="transfer_pump_antar_tank2_2"
                                            value="{{ old('transfer_pump_antar_tank2_2') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump_antar_tank2_2 }}"
                                            placeholder="">

                                        @error('transfer_pump_antar_tank2_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump_antar_tank2_3') is-invalid @enderror"
                                            id="transfer_pump_antar_tank2_3" name="transfer_pump_antar_tank2_3"
                                            value="{{ old('transfer_pump_antar_tank2_3') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump_antar_tank2_3 }}"
                                            placeholder="">

                                        @error('transfer_pump_antar_tank2_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                        <span>TRANSFER PUMP 1</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump1_1') is-invalid @enderror"
                                            id="transfer_pump1_1" name="transfer_pump1_1"
                                            value="{{ old('transfer_pump1_1') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump1_1 }}"
                                            placeholder="">

                                        @error('transfer_pump1_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump1_2') is-invalid @enderror"
                                            id="transfer_pump1_2" name="transfer_pump1_2"
                                            value="{{ old('transfer_pump1_2') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump1_2 }}"
                                            placeholder="">

                                        @error('transfer_pump1_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump1_3') is-invalid @enderror"
                                            id="transfer_pump1_3" name="transfer_pump1_3"
                                            value="{{ old('transfer_pump1_3') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump1_3 }}"
                                            placeholder="">

                                        @error('transfer_pump1_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                        <span>TRANSFER PUMP 2</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump2_1') is-invalid @enderror"
                                            id="transfer_pump2_1" name="transfer_pump2_1"
                                            value="{{ old('transfer_pump2_1') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump2_1 }}"
                                            placeholder="">

                                        @error('transfer_pump2_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump2_2') is-invalid @enderror"
                                            id="transfer_pump2_2" name="transfer_pump2_2"
                                            value="{{ old('transfer_pump2_2') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump2_2 }}"
                                            placeholder="">

                                        @error('transfer_pump2_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump2_3') is-invalid @enderror"
                                            id="transfer_pump2_3" name="transfer_pump2_3"
                                            value="{{ old('transfer_pump2_3') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->transfer_pump2_3 }}"
                                            placeholder="">

                                        @error('transfer_pump2_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                </div>
                            </div>
                            <hr class="bg-primary">
                            <div class="col-12 d-flex justify-content-center align-items-center mb-3">
                                <span>SUMP TANK</span>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                        <span>DRAIN PUMP</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('drain_pump_1') is-invalid @enderror"
                                            id="drain_pump_1" name="drain_pump_1"
                                            value="{{ old('drain_pump_1') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->drain_pump_1 }}"
                                            placeholder="">

                                        @error('drain_pump_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('drain_pump_2') is-invalid @enderror"
                                            id="drain_pump_2" name="drain_pump_2"
                                            value="{{ old('drain_pump_2') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->drain_pump_2 }}"
                                            placeholder="">

                                        @error('drain_pump_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('drain_pump_3') is-invalid @enderror"
                                            id="drain_pump_3" name="drain_pump_3"
                                            value="{{ old('drain_pump_3') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->drain_pump_3 }}"
                                            placeholder="">

                                        @error('drain_pump_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                </div>
                            </div>
                            <hr class="bg-primary">
                            <div class="col-12 d-flex justify-content-center align-items-center mb-3">
                                <span>SUMPIT TANK</span>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                        <span>P1</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p1_1') is-invalid @enderror"
                                            id="p1_1" name="p1_1"
                                            value="{{ old('p1_1') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->p1_1 }}"
                                            placeholder="">

                                        @error('p1_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p1_2') is-invalid @enderror"
                                            id="p1_2" name="p1_2"
                                            value="{{ old('p1_2') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->p1_2 }}"
                                            placeholder="">

                                        @error('p1_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p1_3') is-invalid @enderror"
                                            id="p1_3" name="p1_3"
                                            value="{{ old('p1_3') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->p1_3 }}"
                                            placeholder="">

                                        @error('p1_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                        <span>P2</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p2_1') is-invalid @enderror"
                                            id="p2_1" name="p2_1"
                                            value="{{ old('p2_1') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->p2_1 }}"
                                            placeholder="">

                                        @error('p2_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p2_2') is-invalid @enderror"
                                            id="p2_2" name="p2_2"
                                            value="{{ old('p2_2') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->p2_2 }}"
                                            placeholder="">

                                        @error('p2_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p2_3') is-invalid @enderror"
                                            id="p2_3" name="p2_3"
                                            value="{{ old('p2_3') ?? $formPs3GroundTankBaruPemeriksaanArusDuaMingguan->p2_3 }}"
                                            placeholder="">

                                        @error('p2_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN BATTERY STARTER</span>
                                    </div>
                                    <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('tegangan_battery_starter_g1') is-invalid @enderror"
                                            id="tegangan_battery_starter_g1" name="tegangan_battery_starter_g1"
                                            value="{{ old('tegangan_battery_starter_g1') ?? $formPs3GensetTigaBulanan->tegangan_battery_starter_g1 }}"
                                            placeholder="">

                                        @error('tegangan_battery_starter_g1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>Vdc</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                        <span>COOLANT TEMPERATURE</span>
                                    </div>
                                    <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('coolant_temperature_g1') is-invalid @enderror"
                                            id="coolant_temperature_g1" name="coolant_temperature_g1"
                                            value="{{ old('coolant_temperature_g1') ?? $formPs3GensetTigaBulanan->coolant_temperature_g1 }}"
                                            placeholder="">

                                        @error('coolant_temperature_g1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>C</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                        <span>HOUR METER</span>
                                    </div>
                                    <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('hour_meter_g1') is-invalid @enderror"
                                            id="hour_meter_g1" name="hour_meter_g1"
                                            value="{{ old('hour_meter_g1') ?? $formPs3GensetTigaBulanan->hour_meter_g1 }}"
                                            placeholder="">

                                        @error('hour_meter_g1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>Hour</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                        <span>ALTERNATOR HEATER</span>
                                    </div>
                                    <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('alternator_heater_g1') is-invalid @enderror"
                                            id="alternator_heater_g1" name="alternator_heater_g1"
                                            value="{{ old('alternator_heater_g1') ?? $formPs3GensetTigaBulanan->alternator_heater_g1 }}"
                                            placeholder="">

                                        @error('alternator_heater_g1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>C</span>
                                    </div>
                                </div>
                            </div> --}}
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
                                <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>LEVEL BAHAN BAKAR & TEGANGAN INPUT PANEL POMPA
                            </button>
                        </h2>
                    </div>

                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#accordionTwo">
                        <div class="card-body">
                            @include('components.form-message')
                            <div class="col-12 d-flex justify-content-center align-items-center mb-3">
                                <span>LEVEL BAHAN BAKAR</span>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                        <span>MAIN TANK 1</span>
                                    </div>
                                    <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('main_tank1') is-invalid @enderror"
                                            id="main_tank1" name="main_tank1"
                                            value="{{ old('main_tank1') ?? $formPs3GroundTankBaruDuaMingguan->main_tank1 }}"
                                            placeholder="">

                                        @error('main_tank1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>L</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                        <span>MAIN TANK 2</span>
                                    </div>
                                    <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('main_tank2') is-invalid @enderror"
                                            id="main_tank2" name="main_tank2"
                                            value="{{ old('main_tank2') ?? $formPs3GroundTankBaruDuaMingguan->main_tank2 }}"
                                            placeholder="">

                                        @error('main_tank2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>L</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                        <span>MAIN TANK 3</span>
                                    </div>
                                    <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('main_tank3') is-invalid @enderror"
                                            id="main_tank3" name="main_tank3"
                                            value="{{ old('main_tank3') ?? $formPs3GroundTankBaruDuaMingguan->main_tank3 }}"
                                            placeholder="">

                                        @error('main_tank3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>L</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                        <span>SUMP TANK 1</span>
                                    </div>
                                    <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('sump_tank1') is-invalid @enderror"
                                            id="sump_tank1" name="sump_tank1"
                                            value="{{ old('sump_tank1') ?? $formPs3GroundTankBaruDuaMingguan->sump_tank1 }}"
                                            placeholder="">

                                        @error('sump_tank1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>L</span>
                                    </div>
                                </div>
                            </div>
                            <hr class="bg-primary">
                            <div class="col-12 d-flex justify-content-center align-items-center mb-3">
                                <span>POMPA</span>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                        <span>PANEL MONITOR MAIN TANK</span>
                                    </div>
                                    <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('panel_monitor_maint_tank') is-invalid @enderror"
                                            id="panel_monitor_maint_tank" name="panel_monitor_maint_tank"
                                            value="{{ old('panel_monitor_maint_tank') ?? $formPs3GroundTankBaruDuaMingguan->panel_monitor_maint_tank }}"
                                            placeholder="">

                                        @error('panel_monitor_maint_tank')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>VAC</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                        <span>PANEL KONTROL POMPA TRANSFER </span>
                                    </div>
                                    <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('panel_kontrol_pompa_transfer') is-invalid @enderror"
                                            id="panel_kontrol_pompa_transfer" name="panel_kontrol_pompa_transfer"
                                            value="{{ old('panel_kontrol_pompa_transfer') ?? $formPs3GroundTankBaruDuaMingguan->panel_kontrol_pompa_transfer }}"
                                            placeholder="">

                                        @error('panel_kontrol_pompa_transfer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>VAC</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                        <span>PANEL SUMPIT PUMP</span>
                                    </div>
                                    <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('panel_sumpit_pump') is-invalid @enderror"
                                            id="panel_sumpit_pump" name="panel_sumpit_pump"
                                            value="{{ old('panel_sumpit_pump') ?? $formPs3GroundTankBaruDuaMingguan->panel_sumpit_pump }}"
                                            placeholder="">

                                        @error('panel_sumpit_pump')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>VAC</span>
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
                                        placeholder="Deskripsi">{!! $formPs3GroundTankBaruDuaMingguan->catatan ?? '' !!}</textarea>
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
