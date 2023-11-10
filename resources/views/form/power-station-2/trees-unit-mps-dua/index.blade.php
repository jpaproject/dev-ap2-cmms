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
                                    <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i> RUANG GENSET
                                    MPS 2
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionOne">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">GENSET NO.1 3000
                                                KVA</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">GENSET NO.2 3000
                                                KVA</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">GENSET NO.3 3000
                                                KVA</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">GENSET NO.4 3000
                                                KVA</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">GENSET NO.5 3000
                                                KVA</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">GENSET NO.6 3000
                                                KVA</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">GENSET NO.7 3000
                                                KVA</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>TRAFO GENSET NO.1</label>
                                            <input type="text"
                                                class="form-control @error('busbarA') is-invalid @enderror" id="busbarA"
                                                name="busbarA" value="{{ old('busbarA') }}" placeholder="Enter..">

                                            @error('busbarA')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>TRAFO GENSET NO.2</label>
                                            <input type="text"
                                                class="form-control @error('busbarA') is-invalid @enderror" id="busbarA"
                                                name="busbarA" value="{{ old('busbarA') }}" placeholder="Enter..">

                                            @error('busbarA')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>TRAFO GENSET NO.3</label>
                                            <input type="text"
                                                class="form-control @error('busbarA') is-invalid @enderror" id="busbarA"
                                                name="busbarA" value="{{ old('busbarA') }}" placeholder="Enter..">

                                            @error('busbarA')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>TRAFO GENSET NO.4</label>
                                            <input type="text"
                                                class="form-control @error('busbarA') is-invalid @enderror" id="busbarA"
                                                name="busbarA" value="{{ old('busbarA') }}" placeholder="Enter..">

                                            @error('busbarA')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>TRAFO GENSET NO.5</label>
                                            <input type="text"
                                                class="form-control @error('busbarA') is-invalid @enderror" id="busbarA"
                                                name="busbarA" value="{{ old('busbarA') }}" placeholder="Enter..">

                                            @error('busbarA')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>TRAFO GENSET NO.6</label>
                                            <input type="text"
                                                class="form-control @error('busbarA') is-invalid @enderror" id="busbarA"
                                                name="busbarA" value="{{ old('busbarA') }}" placeholder="Enter..">

                                            @error('busbarA')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>TRAFO GENSET NO.7</label>
                                            <input type="text"
                                                class="form-control @error('busbarA') is-invalid @enderror" id="busbarA"
                                                name="busbarA" value="{{ old('busbarA') }}" placeholder="Enter..">

                                            @error('busbarA')
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
                <div class="accordion" id="accordionTwo">
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> RUANG
                                    PANEL MPS 2
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionTwo">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">Panel ER 2 A
                                                (MSC)</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">Panel ER 2 A
                                                (MSD)</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">Panel ER 2 A
                                                (MSE)</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">Panel ER 2 A
                                                (MSF)</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">Panel ER 2 A
                                                (MSG)</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                Panel ER 2 A (MSH)</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">Panel ER 2 A
                                                (MSI)</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">Panel ER 2 A
                                                (MSS)</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">Panel ER 2 A
                                                (MST)</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">Panel ER 2 A
                                                (MSB)</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                Panel ER 2 B (MSL)</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                Panel ER 2 B (MSM)</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">

                                                Panel ER 2 B (MSN)</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">

                                                Panel ER 2 B (MSO)</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                Panel ER 2 B (MSP)</label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                Panel ER 2 B (MSQ)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                Panel ER 2 B (MSR)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                Panel ER 2 B (MSV)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                Panel ER 2 B (MSW)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                Panel ER 2 B (MSX)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                Panel ER 2 B (MSK)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                Panel ER 2 A (MCC)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                Panel ER 2 B (MCC)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                Panel ER 2 A (MSA)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                Panel ER 2 B (MSJ)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 1 A (XSA)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 1 A (XSB)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 1 A (XSC)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 1 A (XSD)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 1 A (XSE)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 1 A (XSF)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 1 A (XSG)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 1 B (XSL)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 1 B (XSM)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 1 B (XSN)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 1 B (XSO)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 1 B (XSP)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 1 B (XSQ)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 1 B (XSR)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL MV GENSET (XDA)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL MV GENSET (XDB)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL MV GENSET (XDC)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL MV GENSET (XDD)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL MV GENSET (XDE)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL MV GENSET (XDF)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL MV GENSET (XDG)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 2 A (MCA)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 2 A (MCB)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 2 A (MCF)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 2 A (MCD)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 2 A (MCE)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 2 A (MCG)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 1 A (XCA)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL ER 1 B (XCB)
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL LVMDP PS2 A
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL LVMDP PS2 B
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL OUTGOING PH AOCC A
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-9 col-form-label">
                                                PANEL OUTGOING PH AOCC B
                                            </label>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <input type="checkbox" class="flat largerCheckbox" name="">

                                                @error('teganganR')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>TRAFO AUXILIARY 1</label>
                                            <input type="text"
                                                class="form-control @error('busbarA') is-invalid @enderror" id="busbarA"
                                                name="busbarA" value="{{ old('busbarA') }}" placeholder="Enter..">

                                            @error('busbarA')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>TRAFO AUXILIARY 2</label>
                                            <input type="text"
                                                class="form-control @error('busbarA') is-invalid @enderror" id="busbarA"
                                                name="busbarA" value="{{ old('busbarA') }}" placeholder="Enter..">

                                            @error('busbarA')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>TRAFO NGR 1</label>
                                            <input type="text"
                                                class="form-control @error('busbarA') is-invalid @enderror" id="busbarA"
                                                name="busbarA" value="{{ old('busbarA') }}" placeholder="Enter..">

                                            @error('busbarA')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>TRAFO NGR 2</label>
                                            <input type="text"
                                                class="form-control @error('busbarA') is-invalid @enderror"
                                                id="busbarA" name="busbarA" value="{{ old('busbarA') }}"
                                                placeholder="Enter..">

                                            @error('busbarA')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>TRAFO NER 1</label>
                                            <input type="text"
                                                class="form-control @error('busbarA') is-invalid @enderror"
                                                id="busbarA" name="busbarA" value="{{ old('busbarA') }}"
                                                placeholder="Enter..">

                                            @error('busbarA')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>TRAFO NER 2</label>
                                            <input type="text"
                                                class="form-control @error('busbarA') is-invalid @enderror"
                                                id="busbarA" name="busbarA" value="{{ old('busbarA') }}"
                                                placeholder="Enter..">

                                            @error('busbarA')
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
                <div class="container-fluid">
                    <div class="accordion" id="accordionThree">
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
                                        aria-controls="collapseThree" onclick="showHide(this)">
                                        <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                        Ruang Panel PH AOCC
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionThree">
                                <div class="card-body">
                                    @include('components.form-message')
                                    <div class="row">
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-9 col-form-label">
                                                    PANEL ACTS +03</label>
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-9 col-form-label">PANEL ACTS
                                                    +04</label>
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-9 col-form-label">
                                                    PANEL ACTS +05</label>
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-9 col-form-label">
                                                    PANEL ACTS +06</label>
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-9 col-form-label">
                                                    PANEL ACTS +01</label>
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-9 col-form-label">
                                                    PANEL ACTS +02
                                                </label>
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-9 col-form-label">PANEL LVMDP
                                                    +01</label>
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-9 col-form-label">PANEL LVMDP
                                                    +02</label>
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-9 col-form-label">
                                                    PANEL LVMDP +03</label>
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-9 col-form-label">PANEL LVMDP
                                                    +04</label>
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-9 col-form-label">

                                                    PANEL LVMDP +05</label>
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-9 col-form-label">

                                                    PANEL LVMDP +06</label>
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-9 col-form-label">

                                                    PANEL LVMDP +07</label>
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

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
                </div>
                <div class="container-fluid">
                    <div class="accordion" id="accordionFour">
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
                                        aria-controls="collapseFour" onclick="showHide(this)">
                                        <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                        GENSET PH AOCC
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                data-parent="#accordionFour">
                                <div class="card-body">
                                    @include('components.form-message')
                                    <div class="row">
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-9 col-form-label">
                                                    GENSET 750 KVA</label>
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-9 col-form-label">
                                                    MONTHLY TANK</label>
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

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
                </div>
                <div class="container-fluid">
                    <div class="accordion" id="accordionFive">
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseFive" aria-expanded="true"
                                        aria-controls="collapseFive" onclick="showHide(this)">
                                        <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                        GROUNTANK
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                data-parent="#accordionFive">
                                <div class="card-body">
                                    @include('components.form-message')
                                    <div class="row">
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-9 col-form-label">
                                                    MAINTANK 1</label>
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-9 col-form-label">
                                                    MAINTANK 2</label>
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-9 col-form-label">
                                                    MAINTANK 3</label>
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

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
                </div>
                <div class="container-fluid">
                    <div class="accordion" id="accordionSix">
                        <div class="card">
                            <div class="card-header" id="headingSix">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseSix" aria-expanded="true"
                                        aria-controls="collapseSix" onclick="showHide(this)">
                                        <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                        RUANG KONTROL
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                data-parent="#accordionSix">
                                <div class="card-body">
                                    @include('components.form-message')
                                    <div class="row">
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-9 col-form-label">
                                                    PANEL EPCC</label>
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <input type="checkbox" class="flat largerCheckbox" name="">

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
                </div>
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeven">
                        <div class="card">
                            <div class="card-header" id="headingSeven">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true"
                                        aria-controls="collapseSeven" onclick="showHide(this)">
                                        <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                        PARKIRAN
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                                data-parent="#accordionSeven">
                                <div class="card-body">
                                    @include('components.form-message')
                                    <div class="row">
                                        <div class="col-12 col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label>TRAFO GENSET NO.1</label>
                                                <input type="text"
                                                    class="form-control @error('busbarA') is-invalid @enderror"
                                                    id="busbarA" name="busbarA" value="{{ old('busbarA') }}"
                                                    placeholder="Enter..">

                                                @error('busbarA')
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
                <div class="container-fluid">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-footer">Add</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-footer">Back</a>
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
