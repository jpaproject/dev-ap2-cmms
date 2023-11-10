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

        <form method="POST" action="{{ route('form.power-station.genset-running.update', $detailWorkOrderForm->id) }}" enctype="multipart/form-data" id="form">
            @method('patch')
            @csrf
            @foreach ($formPs2GensetRunningHarians as $key => $value)
                <?php $count = $key + 1; ?>

                <div class="container-fluid">
                    <div class="accordion" id="accordion{{ $count }}">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <button class="btn btn-link btn-block text-left text-white" type="button" data-toggle="collapse"
                                            data-target="#collapse{{ $count }}" aria-expanded="true"
                                            aria-controls="collapse{{ $count }}" onclick="showHide(this)">
                                            <i class="fas fa-chevron-down " id="accordion"></i> GENSET {{ $count }}
                                        </button>
                                    </h3>
                                    </div>
                                    <div id="collapse{{ $count }}" class="collapse"
                                    aria-labelledby="heading{{ $count }}" data-parent="#accordion{{ $count }}"">
                                        <div class="card-body">
                                            @include('components.form-message')
                                            <div class="form-group">
                                                <label>1. Mode operasi</label>
                                                <select class="form-control  @error('mode_operasi_.' . $key) is-invalid @enderror" name="mode_operasi_[]">
                                                    <option disabled selected>Choose Selection</option>
                                                    <option value="auto" {{ old('mode_operasi_.' . $key) ?? $value->mode_operasi == 'auto' ? 'selected' : '' }}>
                                                        Auto</option>
                                                    <option value="semi" {{ old('mode_operasi_.' . $key) ?? $value->mode_operasi == 'semi' ? 'selected' : '' }}>
                                                        Semi</option>
                                                    <option value="man" {{ old('mode_operasi_.' . $key) ?? $value->mode_operasi == 'man' ? 'selected' : '' }}>
                                                        Man</option>
                                                    <option value="off" {{ old('mode_operasi_.' . $key) ?? $value->mode_operasi == 'off' ? 'selected' : '' }}>
                                                        Off</option>
                                                </select>
                                                @error('mode_operasi_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>2. Waktu<span class="text-muted"></span>( Menit )</label>
                                                <input type="text" class="form-control @error('waktu_.' . $key) is-invalid @enderror"
                                                    id="waktu_[]" name="waktu_[]" value="{{ $value->waktu }}" placeholder="Menit">

                                                @error('waktu_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>3. Tegangan Output (TR)</label>
                                            </div>
                                            <div class="row">

                                                <div class="col-12 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>LT 1 <span class="text-muted">(Volt)</span></label>
                                                        <input type="text" class="form-control @error('tegangan1_.' . $key) is-invalid @enderror"
                                                            id="tegangan1_[]" name="tegangan1_[]" value="{{ $value->tegangan1 }}"
                                                            placeholder="Volt">

                                                        @error('tegangan1_.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>LT 2 <span class="text-muted">(Volt)</span></label>
                                                        <input type="text" class="form-control @error('tegangan2_.' . $key) is-invalid @enderror"
                                                            id="tegangan2_[]" name="tegangan2_[]" value="{{ $value->tegangan2 }}"
                                                            placeholder="Volt">

                                                        @error('tegangan2_.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>LT 3 <span class="text-muted">(Volt)</span></label>
                                                        <input type="text" class="form-control @error('tegangan3_.' . $key) is-invalid @enderror"
                                                            id="tegangan3_[]" name="tegangan3_[]" value="{{ $value->tegangan3 }}"
                                                            placeholder="Volt">

                                                        @error('tegangan3_.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>4. Beban (arus)</label>
                                            </div>
                                            <div class="row">

                                                <div class="col-12 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>LT 1 <span class="text-muted">(Ampere)</span></label>
                                                        <input type="text" class="form-control @error('beban_arus1_.' . $key) is-invalid @enderror"
                                                            id="beban_arus1_[]" name="beban_arus1_[]" value="{{ $value->beban_arus1 }}"
                                                            placeholder="Ampere">

                                                        @error('beban_arus1_.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>LT 2 <span class="text-muted">(Ampere)</span></label>
                                                        <input type="text" class="form-control @error('beban_arus2_.' . $key) is-invalid @enderror"
                                                            id="beban_arus2_[]" name="beban_arus2_[]" value="{{ $value->beban_arus2 }}"
                                                            placeholder="Ampere">

                                                        @error('beban_arus2_.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>LT 3 <span class="text-muted">(Ampere)</span></label>
                                                        <input type="text" class="form-control @error('beban_arus3_.' . $key) is-invalid @enderror"
                                                            id="beban_arus3_[]" name="beban_arus3_[]" value="{{ $value->beban_arus3 }}"
                                                            placeholder="Ampere">

                                                        @error('beban_arus3_.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>5. Daya (P)</label>
                                                <input type="text" class="form-control @error('daya_.' . $key) is-invalid @enderror"
                                                    id="daya_[]" name="daya_[]" value="{{ $value->daya }}" placeholder="Kw">

                                                @error('daya_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>6. Freqwensi</label>
                                                <input type="text" class="form-control @error('frekuensi_.' . $key) is-invalid @enderror"
                                                    id="frekuensi_[]" name="frekuensi_[]" value="{{ $value->frekuensi }}" placeholder="Hz">

                                                @error('frekuensi_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>7. Speed </label>
                                                <input type="text" class="form-control @error('speed_.' . $key) is-invalid @enderror"
                                                    id="speed_[]" name="speed_[]" value="{{ $value->speed }}" placeholder="Rpm">

                                                @error('speed_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>8. Tekanan Oli mesin </label>
                                                <input type="text" class="form-control @error('tekanan_oli_mesin_.' . $key) is-invalid @enderror"
                                                    id="tekanan_oli_mesin_[]" name="tekanan_oli_mesin_[]" value="{{ $value->tekanan_oli_mesin }}" placeholder="Bar">

                                                @error('tekanan_oli_mesin_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>9. Temperature Oli mesin </label>
                                                <input type="text" class="form-control @error('temperature_oli_mesin_.' . $key) is-invalid @enderror"
                                                    id="temperature_oli_mesin_[]" name="temperature_oli_mesin_[]" value="{{ $value->temperature_oli_mesin }}" placeholder="°C">

                                                @error('temperature_oli_mesin_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>10. Temperature coolant </label>
                                                <input type="text" class="form-control @error('temperature_coolant_.' . $key) is-invalid @enderror"
                                                    id="temperature_coolant_[]" name="temperature_coolant_[]" value="{{ $value->temperature_coolant }}" placeholder="°C">

                                                @error('temperature_coolant_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>11. Engine hours counter </label>
                                                <input type="text" class="form-control @error('engine_hours_counter_.' . $key) is-invalid @enderror"
                                                    id="engine_hours_counter_[]" name="engine_hours_counter_[]" value="{{ $value->engine_hours_counter }}"
                                                    placeholder="Engine hours counter">

                                                @error('engine_hours_counter_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>12. Pembebanan (%)</label>
                                                <input type="text" class="form-control @error('pembebanan_.' . $key) is-invalid @enderror"
                                                    id="pembebanan_[]" name="pembebanan_[]" value="{{ $value->pembebanan }}"
                                                    placeholder="Engine hours counter">

                                                @error('pembebanan_.' . $key)
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
            @endforeach

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Keterangan</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-12 col-lg-4 col-md-4">
                                        <div class="form-group">
                                            <label>PLN OFF</label>
                                            <input type="text" class="form-control @error('pln_off') is-invalid @enderror"
                                                id="pln_off" name="pln_off" value="{{ $formPs2GensetRunningHarianKeterangan->pln_off }}"
                                                placeholder="Volt">

                                            @error('pln_off')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-4">
                                        <div class="form-group">
                                            <label>CB CLOSE (MCf)</label>
                                            <input type="text" class="form-control @error('cb_close') is-invalid @enderror"
                                                id="cb_close" name="cb_close" value="{{ $formPs2GensetRunningHarianKeterangan->cb_close }}"
                                                placeholder="Volt">

                                            @error('cb_close')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-4">
                                        <div class="form-group">
                                            <label>PLN NORMAL</label>
                                            <input type="text" class="form-control @error('pln_normal') is-invalid @enderror"
                                                id="pln_normal" name="pln_normal" value="{{ $formPs2GensetRunningHarianKeterangan->pln_normal }}"
                                                placeholder="Volt">

                                            @error('pln_normal')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-4">
                                        <div class="form-group">
                                            <label>CB OPEN (MCf)</label>
                                            <input type="text" class="form-control @error('cb_open') is-invalid @enderror"
                                                id="cb_open" name="cb_open" value="{{ $formPs2GensetRunningHarianKeterangan->cb_open }}"
                                                placeholder="Volt">

                                            @error('cb_open')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-4">
                                        <div class="form-group">
                                            <label>Genset Off / Shutdown</label>
                                            <input type="text" class="form-control @error('genset_off') is-invalid @enderror"
                                                id="genset_off" name="genset_off" value="{{ $formPs2GensetRunningHarianKeterangan->genset_off }}"
                                                placeholder="Volt">

                                            @error('genset_off')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Catatan</label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror"
                                            id="catatan" placeholder="Deskripsi">{!! $formPs2GensetRunningHarianKeterangan->catatan !!}</textarea>
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
        </form>
    </section>
@endsection

@section('script')
    <script>
        function showHide(button) {
            const child = $(button).parent().find("#accordion"); // get child element
            if (child.hasClass('fa-chevron-down')) {
                child.removeClass('fa-chevron-down').addClass('fa-chevron-up');; // logs "This is the child element"
            } else if (child.hasClass('fa-chevron-up')) {
                child.removeClass('fa-chevron-up').addClass('fa-chevron-down'); // logs "This is the child element"
            }
        }
    </script>
@endsection
