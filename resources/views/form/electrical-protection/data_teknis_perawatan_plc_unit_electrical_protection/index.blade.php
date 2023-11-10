@extends('layouts.app')

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

        .select2-container--default .select2-selection--single {
            height: 40px;
            /* adjust the height value as needed */
            line-height: 40px;
            /* ensure the text is vertically centered */
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
        }
    </style>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-5 col-md-4">
                <table class="table table-bordered head table-responsive d-md-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="head" scope="col">No.</th>
                            <th class="head" scope="col">Personil Yang Ditugaskan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="head">1.</th>
                            <td class="head">Dimas Aryasatya</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-lg-7 col-md-8">
                <table class="table table-bordered head table-responsive d-md-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="head" scope="col">HARI/TANGGAL</th>
                            <th class="head" scope="col">DINAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="head">Friday, 25/02/2023 09:15</th>
                            <td class="head">DINAS</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
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
                                    <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i> T11
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="" data-parent="#accordionOne">
                            <div class="card-body">
                                <div class="row">
                                    <label class="col-12 d-flex justify-content-center">TEGANGAN POWER
                                        SUPPLY</label>
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">AC</label>
                                            <input type="number" class="form-control @error('input2') is-invalid @enderror"
                                                id="input2" name="input2" value="{{ old('input2') }}" step="0.01"
                                                min="0" placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">DC</label>
                                            <input type="number" class="form-control @error('input2') is-invalid @enderror"
                                                id="input2" name="input2" value="{{ old('input2') }}" step="0.01"
                                                min="0" placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">LN</label>
                                            <input type="number" class="form-control @error('input2') is-invalid @enderror"
                                                id="input2" name="input2" value="{{ old('input2') }}" step="0.01"
                                                min="0" placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">LG</label>
                                            <input type="number" class="form-control @error('input2') is-invalid @enderror"
                                                id="input2" name="input2" value="{{ old('input2') }}" step="0.01"
                                                min="0" placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-lg-3 my-1">
                                        <label class="d-flex justify-content-center">MODUL POWER SUPPLY</label>
                                        <label class="d-flex justify-content-center">POWER OK</label>
                                        <div class="form-group d-flex justify-content-center">
                                            <input type="checkbox" class="flat largerCheckbox" name="">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-1 my-1">
                                        <label class="d-flex justify-content-center">CPU</label>
                                        <label class="d-flex justify-content-center">RUN</label>
                                        <div class="form-group d-flex justify-content-center">
                                            <input type="checkbox" class="flat largerCheckbox" name="">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-1 my-1">
                                        <br>
                                        <label class="d-flex justify-content-center">LCD</label>
                                        <div class="form-group d-flex justify-content-center">
                                            <input type="checkbox" class="flat largerCheckbox" name="">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-1 my-1">
                                        <label class="d-flex justify-content-center">PTQ</label>
                                        <label class="d-flex justify-content-center">ACTIVE</label>
                                        <div class="form-group d-flex justify-content-center">
                                            <input type="checkbox" class="flat largerCheckbox" name="">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-1 my-1">
                                        <br>
                                        <label class="d-flex justify-content-center">E DATA</label>
                                        <div class="form-group d-flex justify-content-center">
                                            <input type="checkbox" class="flat largerCheckbox" name="">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-1 my-1">
                                        <br>
                                        <label class="d-flex justify-content-center">E UNK</label>
                                        <div class="form-group d-flex justify-content-center">
                                            <input type="checkbox" class="flat largerCheckbox" name="">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-1 my-1">
                                        <label class="d-flex justify-content-center">DDI</label>
                                        <label class="d-flex justify-content-center">ACTIVE</label>
                                        <div class="form-group d-flex justify-content-center">
                                            <input type="checkbox" class="flat largerCheckbox" name="">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-1 my-1">
                                        <label class="d-flex justify-content-center">DRA</label>
                                        <label class="d-flex justify-content-center">ACTIVE</label>
                                        <div class="form-group d-flex justify-content-center">
                                            <input type="checkbox" class="flat largerCheckbox" name="">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-1 my-1">
                                        <label class="d-flex justify-content-center">NOE</label>
                                        <label class="d-flex justify-content-center">ACTIVE</label>
                                        <div class="form-group d-flex justify-content-center">
                                            <input type="checkbox" class="flat largerCheckbox" name="">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-2 my-1">
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">EGX</label>
                                            <hr>
                                            <div class="col-6">
                                                <label class="d-flex justify-content-center">TX</label>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

                                                    @error('input2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="d-flex justify-content-center">RX</label>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

                                                    @error('input2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-1 my-1">
                                        <label class="d-flex justify-content-center">NOE</label>
                                        <label class="d-flex justify-content-center">ACTIVE</label>
                                        <div class="form-group d-flex justify-content-center">
                                            <input type="checkbox" class="flat largerCheckbox" name="">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-12 d-flex justify-content-center">SUHU PLC</label>
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">POWER SUPPLY</label>
                                            <input type="number"
                                                class="form-control @error('input2') is-invalid @enderror" id="input2"
                                                name="input2" value="{{ old('input2') }}" step="0.01"
                                                min="0" placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">FUSE</label>
                                            <input type="number"
                                                class="form-control @error('input2') is-invalid @enderror" id="input2"
                                                name="input2" value="{{ old('input2') }}" step="0.01"
                                                min="0" placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">MCB</label>
                                            <input type="number"
                                                class="form-control @error('input2') is-invalid @enderror" id="input2"
                                                name="input2" value="{{ old('input2') }}" step="0.01"
                                                min="0" placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">FAN</label>
                                            <input type="number"
                                                class="form-control @error('input2') is-invalid @enderror" id="input2"
                                                name="input2" value="{{ old('input2') }}" step="0.01"
                                                min="0" placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">KONTAK TERMINAL</label>
                                            <input type="number"
                                                class="form-control @error('input2') is-invalid @enderror" id="input2"
                                                name="input2" value="{{ old('input2') }}" step="0.01"
                                                min="0" placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">RELAY LATCHING</label>
                                            <input type="number"
                                                class="form-control @error('input2') is-invalid @enderror" id="input2"
                                                name="input2" value="{{ old('input2') }}" step="0.01"
                                                min="0" placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">LAMPU</label>
                                            <select class="form-control  @error('gs5') is-invalid @enderror"
                                                name="gs5">
                                                <option disabled selected>Choose Selection</option>
                                                <option value="ON" {{ old('gs5') == 'ON' ? 'selected' : '' }}>
                                                    ON</option>
                                                <option value="OFF" {{ old('gs5') == 'OFF' ? 'selected' : '' }}>
                                                    OFF</option>
                                            </select>

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">FAN</label>
                                            <select class="form-control  @error('gs5') is-invalid @enderror"
                                                name="gs5">
                                                <option disabled selected>Choose Selection</option>
                                                <option value="ON" {{ old('gs5') == 'ON' ? 'selected' : '' }}>
                                                    ON</option>
                                                <option value="OFF" {{ old('gs5') == 'OFF' ? 'selected' : '' }}>
                                                    OFF</option>
                                            </select>

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">CLEANING PERALATAN</label>
                                            <select class="form-control  @error('gs5') is-invalid @enderror"
                                                name="gs5">
                                                <option disabled selected>Choose Selection</option>
                                                <option value="ON" {{ old('gs5') == 'ON' ? 'selected' : '' }}>
                                                    ON</option>
                                                <option value="OFF" {{ old('gs5') == 'OFF' ? 'selected' : '' }}>
                                                    OFF</option>
                                            </select>

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-12 col-lg-3 control-label d-flex justify-content-center align-items-center">KETERANGAN</label>
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


            <div class="container-fluid">
                <div class="row">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-footer">Add</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-footer">Back</a>
                    </div>
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
