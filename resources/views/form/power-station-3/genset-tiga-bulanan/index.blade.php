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
    <form method="POST" action="{{ route('form.ps3.genset-tiga-bulanan.update', $detailWorkOrderForm->id) }}"
        enctype="multipart/form-data" id="form">
        @method('patch')
        @csrf
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                @foreach ($formPs3GensetTigaBulanans as $key => $formPs3GensetTigaBulanan)
                                <h2 class="text-center font-weight-bold"><u>Genset {{ $loop->iteration }}</u></h2>
                                    <div class="row">
                                        @include('components.form-message')
                                        <div class="col-sm-12 col-md-4 col-lg-4 form-group">
                                            <label class="d-flex justify-content-center">LEVEL OLI MESIN</label>
                                            <select class="form-control @error('level_oli_mesin.'.$key) is-invalid @enderror"
                                                id="level_oli_mesin" name="level_oli_mesin[]">
                                                <option value="" selected>Choose Selection</option>
                                                <option value="low"
                                                    {{ (old('level_oli_mesin.'.$key) ?? $formPs3GensetTigaBulanan->level_oli_mesin) == 'low' ? 'selected' : '' }}>
                                                    Low</option>
                                                <option value="med"
                                                    {{ (old('level_oli_mesin.'.$key) ?? $formPs3GensetTigaBulanan->level_oli_mesin) == 'med' ? 'selected' : '' }}>
                                                    Med</option>
                                                <option value="max"
                                                    {{ (old('level_oli_mesin.'.$key) ?? $formPs3GensetTigaBulanan->level_oli_mesin) == 'max' ? 'selected' : '' }}>
                                                    Max</option>
                                            </select>

                                            @error('level_oli_mesin.'.$key)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-4 form-group">
                                            <label class="d-flex justify-content-center">LEVEL AIR RADIATOR</label>
                                            <select class="form-control @error('level_air_radiator.'.$key) is-invalid @enderror"
                                                id="level_air_radiator" name="level_air_radiator[]">
                                                <option value="" selected>Choose Selection</option>
                                                <option value="low"
                                                    {{ (old('level_air_radiator.'.$key) ?? $formPs3GensetTigaBulanan->level_air_radiator) == 'low' ? 'selected' : '' }}>
                                                    Low</option>
                                                <option value="med"
                                                    {{ (old('level_air_radiator.'.$key) ?? $formPs3GensetTigaBulanan->level_air_radiator) == 'med' ? 'selected' : '' }}>
                                                    Med</option>
                                                <option value="max"
                                                    {{ (old('level_air_radiator.'.$key) ?? $formPs3GensetTigaBulanan->level_air_radiator) == 'max' ? 'selected' : '' }}>
                                                    Max</option>
                                            </select>

                                            @error('level_air_radiator.'.$key)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-4 form-group">
                                            <label class="d-flex justify-content-center">LEVEL AIR BATTERY/ACCU</label>
                                            <select class="form-control @error('level_air_battery.'.$key) is-invalid @enderror"
                                                id="level_air_battery" name="level_air_battery[]">
                                                <option value="" selected>Choose Selection</option>
                                                <option value="low"
                                                    {{ (old('level_air_battery.'.$key) ?? $formPs3GensetTigaBulanan->level_air_battery) == 'low' ? 'selected' : '' }}>
                                                    Low</option>
                                                <option value="med"
                                                    {{ (old('level_air_battery.'.$key) ?? $formPs3GensetTigaBulanan->level_air_battery) == 'med' ? 'selected' : '' }}>
                                                    Med</option>
                                                <option value="max"
                                                    {{ (old('level_air_battery.'.$key) ?? $formPs3GensetTigaBulanan->level_air_battery) == 'max' ? 'selected' : '' }}>
                                                    Max</option>
                                            </select>

                                            @error('level_air_battery.'.$key)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-11 col-md-4 col-lg-4 form-group">
                                            <label class="d-flex justify-content-center">LEVEL BAHAN BAKAR (L)</label>
                                            <input type="text"
                                                class="form-control @error('level_bahan_bakar.'.$key) is-invalid @enderror"
                                                id="level_bahan_bakar" name="level_bahan_bakar[]"
                                                value="{{ old('level_bahan_bakar.'.$key) ?? $formPs3GensetTigaBulanan->level_bahan_bakar }}"
                                                placeholder="">

                                            @error('level_bahan_bakar.'.$key)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-11 col-md-4 col-lg-4 form-group">
                                            <label class="d-flex justify-content-center">TEGANGAN BATTERY STARTER (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('tegangan_battery_starter.'.$key) is-invalid @enderror"
                                                id="tegangan_battery_starter" name="tegangan_battery_starter[]"
                                                value="{{ old('tegangan_battery_starter.'.$key) ?? $formPs3GensetTigaBulanan->tegangan_battery_starter }}"
                                                placeholder="">

                                            @error('tegangan_battery_starter.'.$key)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-11 col-md-4 col-lg-4 form-group">
                                            <label class="d-flex justify-content-center">TEGANGAN BATTERY STARTER (C)</label>
                                            <input type="text"
                                                class="form-control @error('coolant_temperature.'.$key) is-invalid @enderror"
                                                id="coolant_temperature" name="coolant_temperature[]"
                                                value="{{ old('coolant_temperature.'.$key) ?? $formPs3GensetTigaBulanan->coolant_temperature }}"
                                                placeholder="">

                                            @error('coolant_temperature.'.$key)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-11 col-md-4 col-lg-4 form-group">
                                            <label class="d-flex justify-content-center">HOUR METER (Hour)</label>
                                            <input type="text"
                                                class="form-control @error('hour_meter.'.$key) is-invalid @enderror"
                                                id="hour_meter" name="hour_meter[]"
                                                value="{{ old('hour_meter.'.$key) ?? $formPs3GensetTigaBulanan->hour_meter }}"
                                                placeholder="">

                                            @error('hour_meter.'.$key)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-11 col-md-4 col-lg-4 form-group">
                                            <label class="d-flex justify-content-center">ALTERNATOR HEATER (C)</label>
                                            <input type="text"
                                                class="form-control @error('alternator_heater.'.$key) is-invalid @enderror"
                                                id="alternator_heater" name="alternator_heater[]"
                                                value="{{ old('alternator_heater.'.$key) ?? $formPs3GensetTigaBulanan->alternator_heater }}"
                                                placeholder="">

                                            @error('alternator_heater.'.$key)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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
                                            placeholder="Deskripsi">{!! $formPs3GensetTigaBulanans[0]->catatan ??
                                                'Visual Check Kondisi Genset , Peralatan dan Segala Aspek dalam Kondisi Normal.' .
                                                    "\n" .
                                                    'Selesai Perawatan , Peralatan Kembali Ke Posisi Auto.' !!}</textarea>
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
