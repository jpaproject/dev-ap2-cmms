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
        <table class="table table-bordered head table-responsive w-100 d-block d-md-table">
            <thead class="thead-light">
                <tr>
                    <th class="head" scope="col">ENGINE</th>
                    <th class="head" scope="col">MERK</th>
                    <th class="head" scope="col">TYPE</th>
                    <th class="head" scope="col">CAP</th>
                    <th class="head" scope="col">DINAS</th>
                    <th class="head" scope="col">HARI/TANGGAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="head"></th>
                    <td class="head">MTU</td>
                    <td class="head">12V 2000 G16F</td>
                    <td class="head">750 KVA</td>
                    <td class="head">DIMAS ARYASATYA</td>
                    <td class="head">23-02-2023</td>
                </tr>
            </tbody>
        </table> --}}
        <form method="POST"
            action="{{ route('form.ps2.genset-ph-aocc-dua-mingguan.update', $detailWorkOrderForm->id) }}"
            enctype="multipart/form-data" id="form">
            @method('patch')
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Data Baru</h3>
                            </div>
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>Waktu</span>
                                    </div>
                                    <div class="col-12 col-lg-5 col-md-6">
                                        <div class="form-group">
                                            <input type="datetime-local"
                                                class="form-control @error('waktu') is-invalid @enderror" id="pick-time"
                                                name="pick-time" value="{{ old('pick-time') }}"
                                                placeholder="Enter sugested completion">
                                            <input type="hidden" name="waktu" id="waktu" value="">
                                            @error('waktu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-6">
                                        <button type="button" class="btn btn-outline-primary w-100" id="btn-add-document"
                                            onclick="addField()">
                                            <i class="fas fa-plus-square"> <span
                                                    style="font-family: Poppins, sans-serif !important;"> Add New</span>
                                            </i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-schedule">
                @if ($formPs2GensetPhAoccDuaMingguans->isNotEmpty())
                    @foreach ($formPs2GensetPhAoccDuaMingguans as $key => $value)
                        @php
                            $count = $key + 1;
                        @endphp
                        <div class="container-fluid">
                            <div class="accordion" id="accordion{{ $count }}">
                                <div class="card">
                                    <div class="card-header" id="heading{{ $count }}">
                                        <h2 class="mb-0 row">
                                            <div class="col-6">
                                                <button class="btn btn-link btn-block text-left" type="button"
                                                    data-toggle="collapse" data-target="#collapse{{ $count }}"
                                                    aria-expanded="true" aria-controls="collapse{{ $count }}"
                                                    onclick="showHide(this)">
                                                    <i class="fas fa-plus" id="accordion"></i>
                                                    {{ $value->waktu ?? 'Belum ada waktu' }}
                                                    <input type="hidden" id="waktu" name="waktu[]"
                                                        value="{{ $value->waktu }}">
                                                </button>
                                            </div>
                                            <div class="col-6 d-flex justify-content-end">
                                                <button type="button" class="btn btn-outline-danger btn-remove"
                                                    onclick="confirmDelete(this)"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </h2>
                                    </div>

                                    <div id="collapse{{ $count }}" class="collapse"
                                        aria-labelledby="heading{{ $count }}"
                                        data-parent="#accordion{{ $count }}">
                                        <div class="card-body">
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                                    <span>TEGANGAN (VOLT)</span>
                                                </div>
                                                <div class="col-12 col-lg-auto col-md-6">
                                                    <div class="form-group">
                                                        <label>R</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('tegangan_r') is-invalid @enderror"
                                                            id="tegangan_r" name="tegangan_r[]"
                                                            value="{{ $value->tegangan_r }}" placeholder="Tegangan R">

                                                        @error('tegangan_r')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-auto col-md-6">
                                                    <div class="form-group">
                                                        <label>S</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('tegangan_s') is-invalid @enderror"
                                                            id="tegangan_s" name="tegangan_s[]"
                                                            value="{{ $value->tegangan_s }}" placeholder="Tegangan S">

                                                        @error('tegangan_s')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-auto col-md-6">
                                                    <div class="form-group">
                                                        <label>T</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('tegangan_t') is-invalid @enderror"
                                                            id="tegangan_t" name="tegangan_t[]"
                                                            value="{{ $value->tegangan_t }}" placeholder="Tegangan T">

                                                        @error('tegangan_t')
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
                                                <div class="col-12 col-lg-auto col-md-6">
                                                    <div class="form-group">
                                                        <label>R</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('arus_r') is-invalid @enderror"
                                                            id="arus_r" name="arus_r[]" value="{{ $value->arus_r }}"
                                                            placeholder="Arus R">

                                                        @error('arus_r')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-auto col-md-6">
                                                    <div class="form-group">
                                                        <label>S</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('arus_s') is-invalid @enderror"
                                                            id="arus_s" name="arus_s[]" value="{{ $value->arus_s }}"
                                                            placeholder="Arus S">

                                                        @error('arus_s')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-auto col-md-6">
                                                    <div class="form-group">
                                                        <label>T</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('arus_t') is-invalid @enderror"
                                                            id="arus_t" name="arus_t[]" value="{{ $value->arus_t }}"
                                                            placeholder="Arus T">

                                                        @error('arus_t')
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
                                                <div class="col-12 col-lg-auto col-md-6">
                                                    <div class="form-group">
                                                        <label></label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('daya') is-invalid @enderror"
                                                            id="daya" name="daya[]" value="{{ $value->daya }}"
                                                            placeholder="Daya KW">

                                                        @error('daya')
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
                                                <div class="col-12 col-lg-auto col-md-6">
                                                    <div class="form-group">
                                                        <label>PRES(BAR)</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('oil_pres') is-invalid @enderror"
                                                            id="oil_pres" name="oil_pres[]"
                                                            value="{{ $value->oil_pres }}" placeholder="Enter..">

                                                        @error('oil_pres')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-auto col-md-6">
                                                    <div class="form-group">
                                                        <label>TEMP(◦C)</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('oil_temp') is-invalid @enderror"
                                                            id="oil_temp" name="oil_temp[]"
                                                            value="{{ $value->oil_temp }}" placeholder="Enter..">

                                                        @error('oil_temp')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-12 col-lg-auto col-md-6">
                                                    <div class="form-group">
                                                        <label>COOLAN | TEMP(◦C)</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('coolant_temp') is-invalid @enderror"
                                                            id="coolant_temp" name="coolant_temp[]"
                                                            value="{{ $value->coolant_temp }}" placeholder="Enter..">

                                                        @error('coolant_temp')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-auto col-md-6">
                                                    <div class="form-group">
                                                        <label>BATT (VOLT)</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('batt') is-invalid @enderror"
                                                            id="batt" name="batt[]" value="{{ $value->batt }}"
                                                            placeholder="Enter..">

                                                        @error('batt')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-auto col-md-6">
                                                    <div class="form-group">
                                                        <label>HC</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('hc') is-invalid @enderror"
                                                            id="hc" name="hc[]" value="{{ $value->hc }}"
                                                            placeholder="Enter..">

                                                        @error('hc')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-auto col-md-6">
                                                    <div class="form-group">
                                                        <label>FREQUENCY (HZ)</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('frequency') is-invalid @enderror"
                                                            id="frequency" name="frequency[]"
                                                            value="{{ $value->frequency }}" placeholder="Enter..">

                                                        @error('frequency')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-auto col-md-6">
                                                    <div class="form-group">
                                                        <label>COS PHI</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('cos_phi') is-invalid @enderror"
                                                            id="cos_phi" name="cos_phi[]"
                                                            value="{{ $value->cos_phi }}" placeholder="Enter..">

                                                        @error('cos_phi')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-auto col-md-6">
                                                    <div class="form-group">
                                                        <label>DURASI (MENIT)</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('durasi') is-invalid @enderror"
                                                            id="durasi" name="durasi[]" value="{{ $value->durasi }}"
                                                            placeholder="Enter..">

                                                        @error('durasi')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-auto col-md-6">
                                                    <div class="form-group">
                                                        <label>BBM (Liter)</label>
                                                        <input type="number" step="0.1"
                                                            class="form-control @error('bbm') is-invalid @enderror"
                                                            id="bbm" name="bbm[]" value="{{ $value->bbm }}"
                                                            placeholder="Enter..">

                                                        @error('bbm')
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
                @endif
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
                                            placeholder="Deskripsi">{!! $formPs2GensetPhAoccDuaMingguans[0]->catatan ?? '' !!}</textarea>
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
            if (child.hasClass('fa-minus')) {
                child.removeClass('fa-minus').addClass('fa-plus');; // logs "This is the child element"
            } else if (child.hasClass('fa-plus')) {
                child.removeClass('fa-plus').addClass('fa-minus'); // logs "This is the child element"
            }
        }

        function addField() {
            // Get the input value of pick-time element
            const inputTime = $('#pick-time').val();
            
            // Get the current date
            const currentDate = new Date();

            // Extract hours and minutes from the input time
            const [hours, minutes] = inputTime.split(':');

            // Set the hours and minutes to the current date
            if (hours >= 0 && hours <= 23 && minutes >= 0 && minutes <= 59) {
                currentDate.setHours(hours);
                currentDate.setMinutes(minutes);
            } else {
                console.log("Invalid input time!");
            }

            // Format the date to the desired format
            const formattedDate = currentDate.toISOString().slice(0, 16);

            console.log(formattedDate); // Output: "2023-04-17T14:30"

            const countAccordionRow = $('.accordion').length;
            if (inputTime == '' || inputTime == null) {
                $.alert('Waktu Harus Dipilih');
            } else {
                $('#waktu').val(formattedDate);
                $('.content-schedule').append(`
            <div class="container-fluid">
                <div class="accordion" id="accordion${countAccordionRow+1}">
                    <div class="card">
                        <div class="card-header" id="heading${countAccordionRow+1}">
                            <h2 class="mb-0 row">
                                <div class="col-6">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapse${countAccordionRow+1}" aria-expanded="true" aria-controls="collapse${countAccordionRow+1}"
                                        onclick="showHide(this)">
                                        <i class="fas fa-plus" id="accordion"></i> ${formattedDate}
                                        <input type="hidden" id="waktu" name="waktu[]" value="${formattedDate}">
                                    </button>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <button type="button" class="btn btn-outline-danger btn-remove" onclick="confirmDelete(this)"><i class="fa fa-trash"></i></button>
                                </div>
                            </h2>
                        </div>

                        <div id="collapse${countAccordionRow+1}" class="collapse" aria-labelledby="heading${countAccordionRow+1}"
                            data-parent="#accordion${countAccordionRow+1}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>R</label>
                                            <input type="number" step="0.1"
                                                class="form-control @error('tegangan_r') is-invalid @enderror" id="tegangan_r"
                                                name="tegangan_r[]" value="{{ old('tegangan_r') }}" placeholder="Tegangan R">

                                            @error('tegangan_r')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>S</label>
                                            <input type="number" step="0.1"
                                                class="form-control @error('tegangan_s') is-invalid @enderror"
                                                id="tegangan_s" name="tegangan_s[]" value="{{ old('tegangan_s') }}"
                                                placeholder="Tegangan S">

                                            @error('tegangan_s')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>T</label>
                                            <input type="number" step="0.1"
                                                class="form-control @error('tegangan_t') is-invalid @enderror"
                                                id="tegangan_t" name="tegangan_t[]" value="{{ old('tegangan_t') }}"
                                                placeholder="Tegangan T">

                                            @error('tegangan_t')
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
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>R</label>
                                            <input type="number" step="0.1"
                                                class="form-control @error('arus_r') is-invalid @enderror" id="arus_r"
                                                name="arus_r[]" value="{{ old('arus_r') }}" placeholder="Arus R">

                                            @error('arus_r')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>S</label>
                                            <input type="number" step="0.1"
                                                class="form-control @error('arus_s') is-invalid @enderror" id="arus_s"
                                                name="arus_s[]" value="{{ old('arus_s') }}" placeholder="Arus S">

                                            @error('arus_s')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>T</label>
                                            <input type="number" step="0.1"
                                                class="form-control @error('arus_t') is-invalid @enderror" id="arus_t"
                                                name="arus_t[]" value="{{ old('arus_t') }}" placeholder="Arus T">

                                            @error('arus_t')
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
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label></label>
                                            <input type="number" step="0.1"
                                                class="form-control @error('daya') is-invalid @enderror" id="daya"
                                                name="daya[]" value="{{ old('daya') }}" placeholder="Daya KW">

                                            @error('daya')
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
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>PRES(BAR)</label>
                                            <input type="number" step="0.1"
                                                class="form-control @error('oil_pres') is-invalid @enderror"
                                                id="oil_pres" name="oil_pres[]" value="{{ old('oil_pres') }}"
                                                placeholder="Enter..">

                                            @error('oil_pres')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>TEMP(◦C)</label>
                                            <input type="number" step="0.1"
                                                class="form-control @error('oil_temp') is-invalid @enderror"
                                                id="oil_temp" name="oil_temp[]" value="{{ old('oil_temp') }}"
                                                placeholder="Enter..">

                                            @error('oil_temp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>COOLAN | TEMP(◦C)</label>
                                            <input type="number" step="0.1"
                                                class="form-control @error('coolant_temp') is-invalid @enderror"
                                                id="coolant_temp" name="coolant_temp[]" value="{{ old('coolant_temp') }}"
                                                placeholder="Enter..">

                                            @error('coolant_temp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>BATT (VOLT)</label>
                                            <input type="number" step="0.1"
                                                class="form-control @error('batt') is-invalid @enderror"
                                                id="batt" name="batt[]" value="{{ old('batt') }}"
                                                placeholder="Enter..">

                                            @error('batt')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>HC</label>
                                            <input type="number" step="0.1" class="form-control @error('hc') is-invalid @enderror"
                                                id="hc" name="hc[]" value="{{ old('hc') }}"
                                                placeholder="Enter..">

                                            @error('hc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>FREQUENCY (HZ)</label>
                                            <input type="number" step="0.1"
                                                class="form-control @error('frequency') is-invalid @enderror"
                                                id="frequency" name="frequency[]" value="{{ old('frequency') }}"
                                                placeholder="Enter..">

                                            @error('frequency')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>COS PHI</label>
                                            <input type="number" step="0.1"
                                                class="form-control @error('cos_phi') is-invalid @enderror" id="cos_phi"
                                                name="cos_phi[]" value="{{ old('cos_phi') }}" placeholder="Enter..">

                                            @error('cos_phi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>DURASI (MENIT)</label>
                                            <input type="number" step="0.1"
                                                class="form-control @error('durasi') is-invalid @enderror"
                                                id="durasi" name="durasi[]" value="{{ old('durasi') }}"
                                                placeholder="Enter..">

                                            @error('durasi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>BBM (Liter)</label>
                                            <input type="number" step="0.1"
                                                class="form-control @error('bbm') is-invalid @enderror"
                                                id="bbm" name="bbm[]" value="{{ old('bbm') }}"
                                                placeholder="Enter..">

                                            @error('bbm')
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
            `);
            }
        }

        function confirmDelete(e) {
            var parent = $(event.target).parent().parent().parent().parent().parent().parent();
            parent.remove();
        }
    </script>
@endsection
