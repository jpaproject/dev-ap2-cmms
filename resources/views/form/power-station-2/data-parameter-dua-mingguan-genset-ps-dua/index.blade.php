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
        <form method="POST" action="{{ route('form.ps2.genset-dua-mingguan.update', $detailWorkOrderForm->id) }}"
            enctype="multipart/form-data" id="form">
            @method('patch')
            @csrf
            @foreach ($formPs2GensetDuaMingguans as $key => $value)
                @php
                    $count = $key + 1;
                @endphp
                <div class="container-fluid">
                    <div class="accordion" id="accordion{{ $count }}">
                        <div class="card">
                            <div class="card-header" id="heading{{ $count }}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapse{{ $count }}" aria-expanded="true"
                                        aria-controls="collapse{{ $count }}" onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i> GENSET
                                        {{ $count }}
                                        <input type="hidden" name="genset[]" value="Genset {{ $count }}">
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse{{ $count }}"
                                class="collapse @if ($count == 1) show @endif"
                                aria-labelledby="heading{{ $count }}" data-parent="#accordion{{ $count }}">
                                <div class="card-body">
                                    @include('components.form-message')
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

                                        <textarea name="catatan" class="form-control @error('catatan.' . $key) is-invalid @enderror" id="catatan"
                                            placeholder="Deskripsi">{!! $formPs2GensetDuaMingguans[0]->catatan ?? '' !!}</textarea>
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
