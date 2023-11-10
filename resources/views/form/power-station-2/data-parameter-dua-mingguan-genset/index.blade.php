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
        </table> --}}
        <form method="POST"
            action="{{ route('form.ps2.data-parameter-dua-mingguan-genset-mps-dua.update', $detailWorkOrderForm->id) }}"
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
                                    <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i> GENSET
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionOne">
                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($formPs2GensetDuaMingguans as $key => $value)
                                    @php
                                        $count = $key + 1;
                                    @endphp
                                    <div class="row">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-center align-items-center">
                                            <label>GENSET {{ $count }}</label>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row">
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>LEVEL OIL</label>
                                                        {{-- <input type="text"
                                                            class="form-control @error('level_oil.' . $key) is-invalid @enderror"
                                                            id="level_oil[]" name="level_oil[]"
                                                            value="{{ old('level_oil.' . $key) ?? $formPs2GensetDuaMingguanGensets[$key]->level_oil }}"
                                                            placeholder="Enter.."> --}}
                                                        <select
                                                            class="form-control  @error('level_oil.' . $key) is-invalid @enderror"
                                                            name="level_oil[]">
                                                            <option value="" selected>Choose Selection</option>
                                                            <option value="max"
                                                                {{ old('level_oil.' . $key) ?? $formPs2GensetDuaMingguanGensets[$key]->level_oil == 'max' ? 'selected' : '' }}>
                                                                MAX</option>
                                                            <option value="medium"
                                                                {{ old('level_oil.' . $key) ?? $formPs2GensetDuaMingguanGensets[$key]->level_oil == 'medium' ? 'selected' : '' }}>
                                                                MEDIUM</option>
                                                            <option value="low"
                                                                {{ old('level_oil.' . $key) ?? $formPs2GensetDuaMingguanGensets[$key]->level_oil == 'low' ? 'selected' : '' }}>
                                                                LOW</option>
                                                        </select>
                                                        @error('level_oil.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>LEVEL AIR RADIATOR</label>
                                                        {{-- <input type="text"
                                                            class="form-control @error('level_air_radiator.' . $key) is-invalid @enderror"
                                                            id="level_air_radiator[]" name="level_air_radiator[]"
                                                            value="{{ old('level_air_radiator.' . $key) ?? $formPs2GensetDuaMingguanGensets[$key]->level_air_radiator }}"
                                                            placeholder="Enter.."> --}}
                                                        <select
                                                            class="form-control  @error('level_air_radiator.' . $key) is-invalid @enderror"
                                                            name="level_air_radiator[]">
                                                            <option value="" selected>Choose Selection</option>
                                                            <option value="max"
                                                                {{ old('level_air_radiator.' . $key) ?? $formPs2GensetDuaMingguanGensets[$key]->level_air_radiator == 'max' ? 'selected' : '' }}>
                                                                MAX</option>
                                                            <option value="medium"
                                                                {{ old('level_air_radiator.' . $key) ?? $formPs2GensetDuaMingguanGensets[$key]->level_air_radiator == 'medium' ? 'selected' : '' }}>
                                                                MEDIUM</option>
                                                            <option value="low"
                                                                {{ old('level_air_radiator.' . $key) ?? $formPs2GensetDuaMingguanGensets[$key]->level_air_radiator == 'low' ? 'selected' : '' }}>
                                                                LOW</option>
                                                        </select>
                                                        @error('level_air_radiator.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>WATER HEATER</label>
                                                        {{-- <input type="text"
                                                            class="form-control @error('water_heater.' . $key) is-invalid @enderror"
                                                            id="water_heater[]" name="water_heater[]"
                                                            value="{{ old('water_heater.' . $key) ?? $formPs2GensetDuaMingguanGensets[$key]->water_heater }}"
                                                            placeholder="Enter.."> --}}
                                                        <select
                                                            class="form-control  @error('water_heater.' . $key) is-invalid @enderror"
                                                            name="water_heater[]">
                                                            <option value="" selected>Choose Selection</option>
                                                            <option value="on"
                                                                {{ old('water_heater.' . $key) ?? $formPs2GensetDuaMingguanGensets[$key]->water_heater == 'on' ? 'selected' : '' }}>
                                                                ON</option>
                                                            <option value="off"
                                                                {{ old('water_heater.' . $key) ?? $formPs2GensetDuaMingguanGensets[$key]->water_heater == 'off' ? 'selected' : '' }}>
                                                                OFF</option>
                                                        </select>
                                                        @error('water_heater.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>GENERATOR HEATER
                                                        </label>
                                                        {{-- <input type="text"
                                                            class="form-control @error('generator_heater.' . $key) is-invalid @enderror"
                                                            id="generator_heater[]" name="generator_heater[]"
                                                            value="{{ old('generator_heater.' . $key) ?? $formPs2GensetDuaMingguanGensets[$key]->generator_heater }}"
                                                            placeholder="Enter.."> --}}
                                                        <select
                                                            class="form-control  @error('generator_heater.' . $key) is-invalid @enderror"
                                                            name="generator_heater[]">
                                                            <option value="" selected>Choose Selection</option>
                                                            <option value="open"
                                                                {{ old('generator_heater.' . $key) ?? $formPs2GensetDuaMingguanGensets[$key]->generator_heater == 'open' ? 'selected' : '' }}>
                                                                OPEN</option>
                                                            <option value="cloce"
                                                                {{ old('generator_heater.' . $key) ?? $formPs2GensetDuaMingguanGensets[$key]->generator_heater == 'cloce' ? 'selected' : '' }}>
                                                                CLOSE</option>
                                                        </select>
                                                        @error('generator_heater.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>BATT</label>
                                                        <input type="text"
                                                            class="form-control @error('batt_genset.' . $key) is-invalid @enderror"
                                                            id="batt_genset[]" name="batt_genset[]"
                                                            value="{{ old('batt_genset.' . $key) ?? $formPs2GensetDuaMingguanGensets[$key]->batt }}"
                                                            placeholder="Enter..">

                                                        @error('batt_genset.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>VALVE BBM
                                                        </label>
                                                        <input type="text"
                                                            class="form-control @error('valve_bbm.' . $key) is-invalid @enderror"
                                                            id="valve_bbm[]" name="valve_bbm[]"
                                                            value="{{ old('valve_bbm.' . $key) ?? $formPs2GensetDuaMingguanGensets[$key]->valve_bbm }}"
                                                            placeholder="Enter..">

                                                        @error('valve_bbm.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- <div class="col-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>KETERANGAN
                                                    </label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR.' . $key) is-invalid @enderror"
                                                        id="teganganR" name="teganganR" value="{{ old('teganganR.' . $key) }}"
                                                        placeholder="Enter..">

                                                    @error('teganganR.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div> --}}
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                                    <span>TEGANGAN (VOLT)</span>
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>R</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('tegangan_r.' . $key) is-invalid @enderror"
                                                            id="tegangan_r" name="tegangan_r[]"
                                                            value="{{ old('tegangan_r.' . $key) ?? $value->tegangan_r }}"
                                                            placeholder="Tegangan R">

                                                        @error('tegangan_r.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>S</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('tegangan_s.' . $key) is-invalid @enderror"
                                                            id="tegangan_s" name="tegangan_s[]"
                                                            value="{{ old('tegangan_s.' . $key) ?? $value->tegangan_s }}"
                                                            placeholder="Tegangan S">

                                                        @error('tegangan_s.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>T</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('tegangan_t.' . $key) is-invalid @enderror"
                                                            id="tegangan_t" name="tegangan_t[]"
                                                            value="{{ old('tegangan_t.' . $key) ?? $value->tegangan_t }}"
                                                            placeholder="Tegangan T">

                                                        @error('tegangan_t.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                                    <span>ARUS (AMPERE)</span>
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>R</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('arus_r.' . $key) is-invalid @enderror"
                                                            id="arus_r" name="arus_r[]"
                                                            value="{{ old('arus_r.' . $key) ?? $value->arus_r }}"
                                                            placeholder="Arus R">

                                                        @error('arus_r.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>S</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('arus_s.' . $key) is-invalid @enderror"
                                                            id="arus_s" name="arus_s[]"
                                                            value="{{ old('arus_s.' . $key) ?? $value->arus_s }}"
                                                            placeholder="Arus S">

                                                        @error('arus_s.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>T</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('arus_t.' . $key) is-invalid @enderror"
                                                            id="arus_t" name="arus_t[]"
                                                            value="{{ old('arus_t.' . $key) ?? $value->arus_t }}"
                                                            placeholder="Arus T">

                                                        @error('arus_t.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                                    <span>DAYA(KW)</span>
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label></label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('daya.' . $key) is-invalid @enderror"
                                                            id="daya" name="daya[]"
                                                            value="{{ old('daya.' . $key) ?? $value->daya }}"
                                                            placeholder="Daya KW">

                                                        @error('daya.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                                    <span>OIL</span>
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>PRES(BAR)</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('oil_pres.' . $key) is-invalid @enderror"
                                                            id="oil_pres" name="oil_pres[]"
                                                            value="{{ old('oil_pres.' . $key) ?? $value->oil_pres }}"
                                                            placeholder="Enter..">

                                                        @error('oil_pres.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>TEMP(◦C)</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('oil_temp.' . $key) is-invalid @enderror"
                                                            id="oil_temp" name="oil_temp[]"
                                                            value="{{ old('oil_temp.' . $key) ?? $value->oil_temp }}"
                                                            placeholder="Enter..">

                                                        @error('oil_temp.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>COOLANT | TEMP(◦C)</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('coolant_temp.' . $key) is-invalid @enderror"
                                                            id="coolant_temp" name="coolant_temp[]"
                                                            value="{{ old('coolant_temp.' . $key) ?? $value->coolant_temp }}"
                                                            placeholder="Enter..">

                                                        @error('coolant_temp.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>BATT (VOLT)</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('batt.' . $key) is-invalid @enderror"
                                                            id="batt" name="batt[]"
                                                            value="{{ old('batt.' . $key) ?? $value->batt }}"
                                                            placeholder="Enter..">

                                                        @error('batt.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>Hour Meter</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('hour_meter.' . $key) is-invalid @enderror"
                                                            id="hour_meter" name="hour_meter[]"
                                                            value="{{ old('hour_meter.' . $key) ?? $value->hour_meter }}"
                                                            placeholder="Enter..">

                                                        @error('hour_meter.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>FREQUENCY (HZ)</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('frequency.' . $key) is-invalid @enderror"
                                                            id="frequency" name="frequency[]"
                                                            value="{{ old('frequency.' . $key) ?? $value->frequency }}"
                                                            placeholder="Enter..">

                                                        @error('frequency.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>COS PHI</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('cos_phi.' . $key) is-invalid @enderror"
                                                            id="cos_phi" name="cos_phi[]"
                                                            value="{{ old('cos_phi.' . $key) ?? $value->cos_phi }}"
                                                            placeholder="Enter..">

                                                        @error('cos_phi.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>DURASI (MENIT)</label>
                                                        <input type="number"
                                                            class="form-control @error('durasi.' . $key) is-invalid @enderror"
                                                            id="durasi" name="durasi[]"
                                                            value="{{ old('durasi.' . $key) ?? $value->durasi }}"
                                                            placeholder="Enter..">

                                                        @error('durasi.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <div class="form-group">
                                                        <label>BBM (Liter)</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('bbm.' . $key) is-invalid @enderror"
                                                            id="bbm" name="bbm[]"
                                                            value="{{ old('bbm.' . $key) ?? $value->bbm }}"
                                                            placeholder="Enter..">

                                                        @error('bbm.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <input type="text"
                                                    class="form-control @error('keterangan_genset.' . $key) is-invalid @enderror"
                                                    id="keterangan_genset[]" name="keterangan_genset[]"
                                                    value="{{ old('keterangan_genset.' . $key) ?? $value->tegangan_r }}"
                                                    placeholder="Enter..">

                                                @error('keterangan_genset.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="border-primary">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="accordion" id="accordionTwo">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> TRAFO
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionTwo">
                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($formPs2GensetDuaMingguanTrafos as $key => $value)
                                    @php
                                        $count = $key + 1;
                                    @endphp
                                    <div class="row">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-center align-items-center">
                                            <label>TRAFO {{ $count }}</label>
                                            <input type="text"
                                                class="form-control @error('nama_peralatan_trafo.' . $key) is-invalid @enderror"
                                                id="nama_peralatan_trafo[]" name="nama_peralatan_trafo[]"
                                                value="{{ old('nama_peralatan.' . $key) ?? $value->nama_peralatan }}"
                                                placeholder="Enter.." hidden>

                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row">

                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">TEMPERATUR 1</label>
                                                        <input type="text"
                                                            class="form-control @error('temperatur1.' . $key)  is-invalid @enderror"
                                                            id="temperatur1[]" name="temperatur1[]"
                                                            value="{{ old('temperatur1.' . $key) ?? $value->temperatur1 }}"
                                                            placeholder="Enter..">

                                                        @error('temperatur1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">TEMPERATUR 2</label>
                                                        <input type="text"
                                                            class="form-control @error('temperatur2.' . $key) is-invalid @enderror"
                                                            id="temperatur2[]" name="temperatur2[]"
                                                            value="{{ old('temperatur2.' . $key) ?? $value->temperatur2 }}"
                                                            placeholder="Enter..">

                                                        @error('temperatur2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">TEMPERATUR 3</label>
                                                        <input type="text"
                                                            class="form-control @error('temperatur3.' . $key) is-invalid @enderror"
                                                            id="temperatur3[]" name="temperatur3[]"
                                                            value="{{ old('temperatur3.' . $key) ?? $value->temperatur3 }}"
                                                            placeholder="Enter..">

                                                        @error('temperatur3.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>FAN
                                                        </label>
                                                        {{-- <input type="text"
                                                            class="form-control @error('fan.' . $key) is-invalid @enderror"
                                                            id="fan[]" name="fan[]"
                                                            value="{{ old('fan.' . $key) ?? $value->fan }}"
                                                            placeholder="Enter.."> --}}
                                                        <select
                                                            class="form-control  @error('fan.' . $key) is-invalid @enderror"
                                                            name="fan[]">
                                                            <option value="" selected>Choose Selection</option>
                                                            <option value="on"
                                                                {{ old('fan.' . $key) ?? $formPs2GensetDuaMingguanGensets[$key]->fan == 'on' ? 'selected' : '' }}>
                                                                ON</option>
                                                            <option value="off"
                                                                {{ old('fan.' . $key) ?? $formPs2GensetDuaMingguanGensets[$key]->fan == 'off' ? 'selected' : '' }}>
                                                                OFF</option>
                                                        </select>
                                                        @error('fan.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>KETERANGAN</label>
                                                        <input type="text"
                                                            class="form-control @error('keterangan_trafo.' . $key) is-invalid @enderror"
                                                            id="keterangan_trafo[]" name="keterangan_trafo[]"
                                                            value="{{ old('keterangan_trafo.' . $key) ?? $value->keterangan }}"
                                                            placeholder="Enter..">

                                                        @error('keterangan_trafo.' . $key)
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
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="accordion" id="accordionThree">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> DAILY
                                    TANK
                                </button>
                            </h2>
                        </div>

                        <div id="collapseThree" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordionThree">
                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($formPs2GensetDuaMingguanTanks as $key => $value)
                                    @php
                                        $count = $key + 1;
                                    @endphp
                                    <div class="row">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-center align-items-center">
                                            <label>DAILY TANK {{ $count }}</label>
                                            <input type="text"
                                                class="form-control @error('nama_peralatan_tank.' . $key) is-invalid @enderror"
                                                id="nama_peralatan_tank[]" name="nama_peralatan_tank[]"
                                                value="{{ old('nama_peralatan.' . $key) ?? $value->nama_peralatan }}"
                                                placeholder="Enter.." hidden>

                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row">
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>VOLUME BBM</label>
                                                        <input type="text"
                                                            class="form-control @error('volume_bbm.' . $key) is-invalid @enderror"
                                                            id="volume_bbm[]" name="volume_bbm[]"
                                                            value="{{ old('volume_bbm.' . $key) ?? $value->volume_bbm }}"
                                                            placeholder="Enter..">

                                                        @error('volume_bbm.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>LEVEL ALARM</label>
                                                        <input type="text"
                                                            class="form-control @error('level_alarm.' . $key) is-invalid @enderror"
                                                            id="level_alarm[]" name="level_alarm[]"
                                                            value="{{ old('level_alarm.' . $key) ?? $value->level_alarm }}"
                                                            placeholder="Enter..">

                                                        @error('level_alarm.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>VALVE IN</label>
                                                        <input type="text"
                                                            class="form-control @error('valve_in.' . $key) is-invalid @enderror"
                                                            id="valve_in[]" name="valve_in[]"
                                                            value="{{ old('valve_in.' . $key) ?? $value->valve_in }}"
                                                            placeholder="Enter..">

                                                        @error('valve_in.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>VALVE OUT
                                                        </label>
                                                        <input type="text"
                                                            class="form-control @error('valve_out.' . $key) is-invalid @enderror"
                                                            id="valve_out[]" name="valve_out[]"
                                                            value="{{ old('valve_out.' . $key) ?? $value->valve_out }}"
                                                            placeholder="Enter..">

                                                        @error('valve_out.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>KETERANGAN</label>
                                                        <input type="text"
                                                            class="form-control @error('keterangan_tank.' . $key) is-invalid @enderror"
                                                            id="keterangan_tank[]" name="keterangan_tank[]"
                                                            value="{{ old('keterangan_tank.' . $key) ?? $value->keterangan }}"
                                                            placeholder="Enter..">

                                                        @error('keterangan_tank.' . $key)
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

                                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror"
                                            id="catatan" placeholder="Deskripsi">{!! $formPs2GensetDuaMingguanTanks[0]->catatan ?? '' !!}</textarea>
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
