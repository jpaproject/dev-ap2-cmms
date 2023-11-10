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

        <table class="table table-bordered head table-responsive w-100 d-block d-md-table">
            <thead class="thead-light">
                <tr>
                    <th class="head" scope="col">WORKING ORDER NUMBER</th>
                    <th class="head" scope="col">LOCATION</th>
                    <th class="head" scope="col">DATE</th>
                    <th class="head" scope="col">MONTH</th>
                    <th class="head" scope="col">YEAR</th>
                    <th class="head" scope="col">SUPERVISED BY</th>
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
                </tr>
            </tbody>
        </table>
        <form method="POST"
            action="{{ route('form.power-station.checklist-harian-genset-ps3.genset-room.update', $detailWorkOrderForm->id) }}"
            id="form">
            @method('patch')
            @csrf
            @include('components.form-message')
            @foreach ($formPs3GensetRoomHarians as $key => $value)
                <?php $count = $key + 1; ?>
                <div class="container-fluid">
                    <div class="accordion" id="accordion{{ $count }}">
                        <div class="card">
                            <div class="card-header" id="heading{{ $count }}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapse{{ $count }}" aria-expanded="true"
                                        aria-controls="collapse{{ $count }}" onclick="showHide(this)">
                                        <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> GENSET
                                        {{ $count }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse{{ $count }}" class="collapse"
                                aria-labelledby="heading{{ $count }}" data-parent="#accordion{{ $count }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label>1. Mode operasi kontrol genset(Deif)</label>
                                                <select class="form-control  @error('q1_.' . $key) is-invalid @enderror"
                                                    name="q1_[]">
                                                    <option selected value="">Choose Selection</option>
                                                    <option value="auto"
                                                        {{ old('q1_.' . $key) ?? $value->q1 == 'auto' ? 'selected' : '' }}>
                                                        Auto</option>
                                                    <option value="semi"
                                                        {{ old('q1_.' . $key) ?? $value->q1 == 'semi' ? 'selected' : '' }}>
                                                        Semi</option>
                                                    <option value="man"
                                                        {{ old('q1_.' . $key) ?? $value->q1 == 'man' ? 'selected' : '' }}>
                                                        Man</option>
                                                    <option value="off"
                                                        {{ old('q1_.' . $key) ?? $value->q1 == 'off' ? 'selected' : '' }}>
                                                        Off</option>
                                                </select>
                                                @error('q1_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6 col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label>2. Tegangan battery starter <span class="text-muted"></span>( ≥24 Vdc
                                                    )</label>
                                                <input type="number"
                                                    class="form-control @error('q2_.0') is-invalid @enderror" id="q2_[]"
                                                    name="q2_[]" value="{{ old('q2_.' . $key) ?? $value->q2 }}"
                                                    placeholder="Vdc" step="0.1">

                                                @error('q2_.0')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6 col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label>3. Kondisi Battery charger</label>
                                                <select class="form-control  @error('q3_.' . $key) is-invalid @enderror"
                                                    name="q3_[]">
                                                    <option selected value="">Choose Selection</option>
                                                    <option value="on"
                                                        {{ old('q3_.' . $key) ?? $value->q3 == 'on' ? 'selected' : '' }}>
                                                        On</option>
                                                    <option value="off"
                                                        {{ old('q3_.' . $key) ?? $value->q3 == 'off' ? 'selected' : '' }}>
                                                        Off</option>
                                                </select>
                                                @error('q3_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6 col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label>4. Kondisi indikator Battery Starter</label>
                                                <select class="form-control  @error('q4_.' . $key) is-invalid @enderror"
                                                    name="q4_[]">
                                                    <option selected value="">Choose Selection</option>
                                                    <option value="hijau"
                                                        {{ old('q4_.' . $key) ?? $value->q4 == 'hijau' ? 'selected' : '' }}>
                                                        Hijau</option>
                                                    <option value="clear"
                                                        {{ old('q4_.' . $key) ?? $value->q4 == 'clear' ? 'selected' : '' }}>
                                                        Clear</option>
                                                </select>
                                                @error('q4_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6 col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label>5. Lampu indikator ECU</label>
                                                <select class="form-control  @error('q5_.' . $key) is-invalid @enderror"
                                                    name="q5_[]">
                                                    <option selected value="">Choose Selection</option>
                                                    <option value="on"
                                                        {{ old('q5_.' . $key) ?? $value->q5 == 'on' ? 'selected' : '' }}>
                                                        On</option>
                                                    <option value="blinking"
                                                        {{ old('q5_.' . $key) ?? $value->q5 == 'blinking' ? 'selected' : '' }}>
                                                        Blinking</option>
                                                    <option value="off"
                                                        {{ old('q5_.' . $key) ?? $value->q5 == 'off' ? 'selected' : '' }}>
                                                        Off</option>
                                                </select>
                                                @error('q5_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6 col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label>6. Panel Motor fan radiator</label>
                                                <select class="form-control  @error('q6_.' . $key) is-invalid @enderror"
                                                    name="q6_[]">
                                                    <option selected value="">Choose Selection</option>
                                                    <option value="man"
                                                        {{ old('q6_.' . $key) ?? $value->q6 == 'man' ? 'selected' : '' }}>
                                                        Man</option>
                                                    <option value="off"
                                                        {{ old('q6_.' . $key) ?? $value->q6 == 'off' ? 'selected' : '' }}>
                                                        Off</option>
                                                    <option value="auto"
                                                        {{ old('q6_.' . $key) ?? $value->q6 == 'auto' ? 'selected' : '' }}>
                                                        Auto</option>
                                                </select>
                                                @error('q6_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6 col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label>7. Panel Exhaust fan</label>
                                                <select class="form-control  @error('q7_.' . $key) is-invalid @enderror"
                                                    name="q7_[]">
                                                    <option selected value="">Choose Selection</option>
                                                    <option value="man"
                                                        {{ old('q7_.' . $key) ?? $value->q7 == 'man' ? 'selected' : '' }}>
                                                        Man</option>
                                                    <option value="off"
                                                        {{ old('q7_.' . $key) ?? $value->q7 == 'off' ? 'selected' : '' }}>
                                                        Off</option>
                                                    <option value="auto"
                                                        {{ old('q7_.' . $key) ?? $value->q7 == 'auto' ? 'selected' : '' }}>
                                                        Auto</option>
                                                </select>
                                                @error('q7_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6 col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label>8. Level Oli mesin</label>
                                                <select class="form-control  @error('q8_.' . $key) is-invalid @enderror"
                                                    name="q8_[]">
                                                    <option selected value="">Choose Selection</option>
                                                    <option value="low"
                                                        {{ old('q8_.' . $key) ?? $value->q8 == 'low' ? 'selected' : '' }}>
                                                        Low</option>
                                                    <option value="med"
                                                        {{ old('q8_.' . $key) ?? $value->q8 == 'med' ? 'selected' : '' }}>
                                                        Med</option>
                                                    <option value="max"
                                                        {{ old('q8_.' . $key) ?? $value->q8 == 'max' ? 'selected' : '' }}>
                                                        Max</option>
                                                </select>
                                                @error('q8_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6 col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label>9. Level air radiator</label>
                                                <select class="form-control  @error('q9_.' . $key) is-invalid @enderror"
                                                    name="q9_[]">
                                                    <option selected value="">Choose Selection</option>
                                                    <option value="low"
                                                        {{ old('q9_.' . $key) ?? $value->q9 == 'low' ? 'selected' : '' }}>
                                                        Low</option>
                                                    <option value="med"
                                                        {{ old('q9_.' . $key) ?? $value->q9 == 'med' ? 'selected' : '' }}>
                                                        Med</option>
                                                    <option value="max"
                                                        {{ old('q9_.' . $key) ?? $value->q9 == 'max' ? 'selected' : '' }}>
                                                        Max</option>
                                                </select>
                                                @error('q9_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6 col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label>10. Level bbm tangki harian <span class="text-muted">(%
                                                        Liter)</span></label>
                                                <input type="number"
                                                    class="form-control @error('q10_.' . $key) is-invalid @enderror"
                                                    id="q10_[]" name="q10_[]"
                                                    value="{{ old('q10_.' . $key) ?? $value->q10 }}"
                                                    placeholder="Enter Busbar A" step="0.1">

                                                @error('q10_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6 col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label>11. Indikator filter udara intake</label>
                                                <select class="form-control  @error('q11_.' . $key) is-invalid @enderror"
                                                    name="q11_[]">
                                                    <option selected value="">Choose Selection</option>
                                                    <option value="green"
                                                        {{ old('q11_.' . $key) ?? $value->q11 == 'green' ? 'selected' : '' }}>
                                                        Green</option>
                                                    <option value="yellow"
                                                        {{ old('q11_.' . $key) ?? $value->q11 == 'yellow' ? 'selected' : '' }}>
                                                        Yellow</option>
                                                    <option value="red"
                                                        {{ old('q11_.' . $key) ?? $value->q11 == 'red' ? 'selected' : '' }}>
                                                        Red</option>
                                                </select>
                                                @error('q11_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6 col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label>12. Water heater pump</label>
                                                <select class="form-control  @error('q12_.' . $key) is-invalid @enderror"
                                                    name="q12_[]">
                                                    <option selected value="">Choose Selection</option>
                                                    <option value="on"
                                                        {{ old('q12_.' . $key) ?? $value->q12 == 'on' ? 'selected' : '' }}>
                                                        On</option>
                                                    <option value="off"
                                                        {{ old('q12_.' . $key) ?? $value->q12 == 'off' ? 'selected' : '' }}>
                                                        Off</option>
                                                </select>
                                                @error('q12_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6 col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    13. Oil / engine temperature ( 27 - 98 °C )</label>
                                                <input type="number"
                                                    class="form-control @error('q13_.' . $key) is-invalid @enderror"
                                                    id="q13_[]" name="q13_[]"
                                                    value="{{ old('q13_.' . $key) ?? $value->q13 }}" placeholder="°C"
                                                    step="0.1">

                                                @error('q13_.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6 col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label>14. Valve bbm genset</label>
                                                <select class="form-control  @error('q14_.' . $key) is-invalid @enderror"
                                                    name="q14_[]">
                                                    <option selected value="">Choose Selection</option>
                                                    <option value="open"
                                                        {{ old('q14_.' . $key) ?? $value->q14 == 'open' ? 'selected' : '' }}>
                                                        Open</option>
                                                    <option value="close"
                                                        {{ old('q14_.' . $key) ?? $value->q14 == 'close' ? 'selected' : '' }}>
                                                        Closed</option>
                                                </select>
                                                @error('q14_.' . $key)
                                                    <span class="invaliClosedeedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6 col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label>15. Kondisi Switch Battery</label>
                                                <select class="form-control  @error('q15_.' . $key) is-invalid @enderror"
                                                    name="q15_[]">
                                                    <option selected value="">Choose Selection</option>
                                                    <option value="open"
                                                        {{ old('q15_.' . $key) ?? $value->q15 == 'open' ? 'selected' : '' }}>
                                                        Open</option>
                                                    <option value="close"
                                                        {{ old('q15_.' . $key) ?? $value->q15 == 'close' ? 'selected' : '' }}>
                                                        Closed</option>
                                                </select>
                                                @error('q15_.' . $key)
                                                    <span class="invaliClosedeedback" role="alert">
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
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                        <span class="fw-bolder">16. Level BBM Ground Tank</span>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-4">
                                        <div class="form-group">
                                            <label>GT 1 <span class="text-muted">(% Liter)</span></label>
                                            <input type="number"
                                                class="form-control @error('q16_gt1_.' . $key) is-invalid @enderror"
                                                id="q16_gt1" name="q16_gt1"
                                                value="{{ old('q16_gt1_.' . $key) ?? $value->q16_gt1 }}"
                                                placeholder="Liter" step="0.1">

                                            @error('q16_gt1_.' . $key)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-4">
                                        <div class="form-group">
                                            <label>GT 2 <span class="text-muted">(% Liter)</span></label>
                                            <input type="number"
                                                class="form-control @error('q16_gt2_.' . $key) is-invalid @enderror"
                                                id="q16_gt2" name="q16_gt2"
                                                value="{{ old('q16_gt2_.' . $key) ?? $value->q16_gt2 }}"
                                                placeholder="Liter" step="0.1">

                                            @error('q16_gt2_.' . $key)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-4">
                                        <div class="form-group">
                                            <label>GT 3 <span class="text-muted">(% Liter)</span></label>
                                            <input type="number"
                                                class="form-control @error('q16_gt3_.' . $key) is-invalid @enderror"
                                                id="q16_gt3" name="q16_gt3"
                                                value="{{ old('q16_gt3_.' . $key) ?? $value->q16_gt3 }}"
                                                placeholder="Liter" step="0.1">

                                            @error('q16_gt3_.' . $key)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>17. Kondisi Pintu Ruang Genset </label>
                                    <select class="form-control  @error('q17_.' . $key) is-invalid @enderror"
                                        name="q17">
                                        <option selected value="">Choose Selection</option>
                                        <option value="tertutup&terkunci"
                                            {{ old('q17') ?? $formPs3GensetRoomHarians[0]->q17 == 'tertutup&terkunci' ? 'selected' : '' }}>
                                            Tertutup & Terkunci</option>
                                    </select>
                                    @error('q17_.' . $key)
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label
                                        class="col-12 col-lg-3 control-label d-flex justify-content-center align-items-center">Catatan</label>
                                    <div class="col-12 col-lg-9">

                                        <textarea name="catatan" class="form-control @error('remote-orders-rcms') is-invalid @enderror" id="catatan"
                                            placeholder="Deskripsi">{!! $formPs3GensetRoomHarians[0]->catatan ?? '' !!}</textarea>
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
            if (child.hasClass('fa-chevron-up')) {
                child.removeClass('fa-chevron-up').addClass('fa-chevron-down');; // logs "This is the child element"
            } else if (child.hasClass('fa-chevron-down')) {
                child.removeClass('fa-chevron-down').addClass('fa-chevron-up'); // logs "This is the child element"
            }
        }
    </script>
@endsection
