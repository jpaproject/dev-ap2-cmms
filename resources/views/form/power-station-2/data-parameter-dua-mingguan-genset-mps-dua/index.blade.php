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
        </table>
        <form method="POST" action="{{ route('work-orders.store') }}" enctype="multipart/form-data" id="form">
            @csrf
            <div class="container-fluid">
                <div class="accordion" id="accordionOne">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i> GENSET 1
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionOne">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label>LEVEL OIL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror" id="teganganR"
                                                name="teganganR" value="{{ old('teganganR') }}" placeholder="Tegangan R">
                                            <select
                                                class="form-control  @error('posisi_cb_panel1.' . $key) is-invalid @enderror"
                                                name="posisi_cb_panel1[]">
                                                <option value="" selected>Choose Selection</option>
                                                <option value="open"
                                                    {{ old('posisi_cb_panel1.' . $key) ?? $item->posisi_cb == 'open' ? 'selected' : '' }}>
                                                    Open</option>
                                                <option value="close"
                                                    {{ old('posisi_cb_panel1.' . $key) ?? $item->posisi_cb == 'close' ? 'selected' : '' }}>
                                                    Close</option>
                                            </select>
                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label>LEVEL AIR RADIATOR</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror" id="teganganR"
                                                name="teganganR" value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label>WATER HEATER</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror" id="teganganR"
                                                name="teganganR" value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                            @error('teganganR')
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
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror" id="teganganR"
                                                name="teganganR" value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                            @error('teganganR')
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
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label>KETERANGAN
                                            </label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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

                                        <textarea name="remote-orders-rcms" class="form-control @error('remote-orders-rcms') is-invalid @enderror"
                                            id="remote-orders-rcms" placeholder="Deskripsi"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
        <div class="container-fluid">
            <div class="row">
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-footer">Simpan</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-footer">Back</a>
                </div>
            </div>
        </div>
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
