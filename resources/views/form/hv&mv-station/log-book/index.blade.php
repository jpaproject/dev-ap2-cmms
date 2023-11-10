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
        </table> --}}
        <table class="table table-bordered head w-100">
            <thead class="thead-light">
                <tr>
                    <th class="head" scope="col">Hari</th>
                    <th class="head" scope="col">Tanggal</th>
                    <th class="head" scope="col">Shift</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="head">Kamis</th>
                    <td class="head">23-02-2023</td>
                    <td class="head">Alan</td>
                </tr>
            </tbody>
        </table>
        <div class="">
            <div class="col-lg-12">
                <div id="row">
                    <div class="input-group m-3">

                        {{-- <input type="text"
								class="form-control m-input"> --}}
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-danger" id="DeleteRow" type="button">
                                            <i class="bi bi-trash"></i>
                                            Delete
                                        </button>
                                    </div>
                                    <h2 class="mb-0">

                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        @include('components.form-message')
                                        <div class="row">
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>JAM</label>
                                                    <input type="time"
                                                        class="form-control @error('pick-time') is-invalid @enderror"
                                                        id="pick-time" name="pick-time" value="{{ old('pick-time') }}"
                                                        placeholder="Enter sugested completion">
                                                    {{-- <input type="text"
                                                                class="form-control @error('teganganR') is-invalid @enderror" id="teganganR"
                                                                name="teganganR" value="{{ old('teganganR') }}" placeholder="Enter.."> --}}

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>URAIAN KEJADIAN</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS" value="{{ old('teganganS') }}"
                                                        placeholder="Enter..">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>TINDAK LANJUT</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Enter..">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>SELESAI</label>
                                                    <input type="time"
                                                        class="form-control @error('pick-time') is-invalid @enderror"
                                                        id="pick-time" name="pick-time" value="{{ old('pick-time') }}"
                                                        placeholder="Enter sugested completion">

                                                    @error('arusS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>HASIL</label>
                                                    <input type="text"
                                                        class="form-control @error('arusT') is-invalid @enderror"
                                                        id="arusT" name="arusT" value="{{ old('arusT') }}"
                                                        placeholder="Enter..">

                                                    @error('arusT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>KET.</label>
                                                    <input type="text"
                                                        class="form-control @error('arusT') is-invalid @enderror"
                                                        id="arusT" name="arusT" value="{{ old('arusT') }}"
                                                        placeholder="Enter..">

                                                    @error('arusT')
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

                <div id="newinput"></div>
                <button id="rowAdder" type="button" class="btn btn-dark">
                    <span class="bi bi-plus-square-dotted">
                    </span> ADD
                </button>
            </div>
        </div>
        {{-- <form method="POST" action="{{ route('work-orders.store') }}" enctype="multipart/form-data" id="form">
            @csrf
            <div class="container-fluid">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                    onclick="showHide(this)">
                                    <i class="fas fa-minus" id="accordion"></i> <b> 1</b>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>JAM</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror" id="teganganR"
                                                name="teganganR" value="{{ old('teganganR') }}" placeholder="Enter..">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>URAIAN KEJADIAN</label>
                                            <input type="text"
                                                class="form-control @error('teganganS') is-invalid @enderror" id="teganganS"
                                                name="teganganS" value="{{ old('teganganS') }}" placeholder="Enter..">

                                            @error('teganganS')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>TINDAK LANJUT</label>
                                            <input type="text"
                                                class="form-control @error('teganganT') is-invalid @enderror" id="teganganT"
                                                name="teganganT" value="{{ old('teganganT') }}" placeholder="Enter..">

                                            @error('teganganT')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>SELESAI</label>
                                            <input type="text"
                                                class="form-control @error('arusS') is-invalid @enderror" id="arusS"
                                                name="arusS" value="{{ old('arusS') }}" placeholder="Enter..">

                                            @error('arusS')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>HASIL</label>
                                            <input type="text"
                                                class="form-control @error('arusT') is-invalid @enderror" id="arusT"
                                                name="arusT" value="{{ old('arusT') }}" placeholder="Enter..">

                                            @error('arusT')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>KET.</label>
                                            <input type="text"
                                                class="form-control @error('arusT') is-invalid @enderror" id="arusT"
                                                name="arusT" value="{{ old('arusT') }}" placeholder="Enter..">

                                            @error('arusT')
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary">
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>GANGGUAN PERMANEN</label>
                                            <textarea name="remote-orders-rcms" class="form-control @error('remote-orders-rcms') is-invalid @enderror"
                                                id="remote-orders-rcms" placeholder="Deskripsi"></textarea>
                                            
                                            @error('arusR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>LEVEL BBM DAILY TANK</label>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>TANGKI 1</label>
                                            <input type="text"
                                                class="form-control @error('arusR') is-invalid @enderror" id="arusR"
                                                name="arusR" value="{{ old('arusR') }}" placeholder="Enter..">

                                            @error('arusR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>TANGKI 2</label>
                                            <input type="text"
                                                class="form-control @error('arusR') is-invalid @enderror" id="arusR"
                                                name="arusR" value="{{ old('arusR') }}" placeholder="Enter..">

                                            @error('arusR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>TANGKI 3</label>
                                            <input type="text"
                                                class="form-control @error('arusR') is-invalid @enderror" id="arusR"
                                                name="arusR" value="{{ old('arusR') }}" placeholder="Enter..">

                                            @error('arusR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>TANGKI 4</label>
                                            <input type="text"
                                                class="form-control @error('arusR') is-invalid @enderror" id="arusR"
                                                name="arusR" value="{{ old('arusR') }}" placeholder="Enter..">

                                            @error('arusR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>TANGKI 5</label>
                                            <input type="text"
                                                class="form-control @error('arusR') is-invalid @enderror" id="arusR"
                                                name="arusR" value="{{ old('arusR') }}" placeholder="Enter..">

                                            @error('arusR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>TANGKI 6</label>
                                            <input type="text"
                                                class="form-control @error('arusR') is-invalid @enderror" id="arusR"
                                                name="arusR" value="{{ old('arusR') }}" placeholder="Enter..">

                                            @error('arusR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>TANGKI 7</label>
                                            <input type="text"
                                                class="form-control @error('arusR') is-invalid @enderror" id="arusR"
                                                name="arusR" value="{{ old('arusR') }}" placeholder="Enter..">

                                            @error('arusR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>   
                                <div class="form-group">
                                    <label>METERING</label>
                                </div>              
                                <div class="row">
                                    
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>INCOMING</label>
                                            <input type="text"
                                                class="form-control @error('oilPresBar') is-invalid @enderror"
                                                id="oilPresBar" name="oilPresBar" value="{{ old('oilPresBar') }}"
                                                placeholder="Enter..">

                                            @error('oilPresBar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>DAYA</label>
                                            <input type="text"
                                                class="form-control @error('oilTempC') is-invalid @enderror"
                                                id="oilTempC" name="oilTempC" value="{{ old('oilTempC') }}"
                                                placeholder="Enter..">

                                            @error('oilTempC')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>ARUS</label>
                                            <input type="text"
                                                class="form-control @error('oilTempC') is-invalid @enderror"
                                                id="oilTempC" name="oilTempC" value="{{ old('oilTempC') }}"
                                                placeholder="Enter..">

                                            @error('oilTempC')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>TEGANGAN</label>
                                            <input type="text"
                                                class="form-control @error('oilTempC') is-invalid @enderror"
                                                id="oilTempC" name="oilTempC" value="{{ old('oilTempC') }}"
                                                placeholder="Enter..">

                                            @error('oilTempC')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>COS PHI</label>
                                            <input type="text"
                                                class="form-control @error('oilTempC') is-invalid @enderror"
                                                id="oilTempC" name="oilTempC" value="{{ old('oilTempC') }}"
                                                placeholder="Enter..">

                                            @error('oilTempC')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>FREQUENSI</label>
                                            <input type="text"
                                                class="form-control @error('oilTempC') is-invalid @enderror"
                                                id="oilTempC" name="oilTempC" value="{{ old('oilTempC') }}"
                                                placeholder="Enter..">

                                            @error('oilTempC')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>CONTROL MONITORING</label>
                                </div>   
                                <div class="row">
                                    
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>SAS</label>
                                            <input type="text"
                                                class="form-control @error('coolantTempC') is-invalid @enderror"
                                                id="coolantTempC" name="coolantTempC" value="{{ old('coolantTempC') }}"
                                                placeholder="Enter..">

                                            @error('coolantTempC')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>EPCC</label>
                                            <input type="text"
                                                class="form-control @error('battVolt') is-invalid @enderror"
                                                id="battVolt" name="battVolt" value="{{ old('battVolt') }}"
                                                placeholder="Enter..">

                                            @error('battVolt')
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
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-footer">Add</button>
                            <a href="{{ route('work-orders.index') }}" class="btn btn-secondary btn-footer">Back</a>
                        </div>
                    </div>

                </div>
        </form> --}}
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>GANGGUAN PERMANEN</label>
                                        <textarea name="remote-orders-rcms" class="form-control @error('remote-orders-rcms') is-invalid @enderror"
                                            id="remote-orders-rcms" placeholder="Deskripsi"></textarea>

                                        @error('arusR')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>PRESSURE GAS</label>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>INCOMING 1</label>
                                        <select class="form-control  @error('incoming1') is-invalid @enderror" name="incoming1">
                                            <option disabled selected>Choose Selection</option>
                                            <option value="alarm"
                                                {{ old('incoming1') == 'abnormal' ? 'selected' : '' }}>
                                                Abnormal</option>
                                            <option value="normal"
                                                {{ old('incoming1') == 'normal' ? 'selected' : '' }}>
                                                Normal</option>
                                        </select>
                                        {{-- <input type="text" class="form-control @error('arusR') is-invalid @enderror"
                                            id="arusR" name="arusR" value="{{ old('arusR') }}"
                                            placeholder="Enter.."> --}}

                                        @error('incoming1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>INCOMING 2</label>
                                        <select class="form-control  @error('incoming2') is-invalid @enderror" name="incoming2">
                                            <option disabled selected>Choose Selection</option>
                                            <option value="alarm"
                                                {{ old('incoming2') == 'abnormal' ? 'selected' : '' }}>
                                                Abnormal</option>
                                            <option value="normal"
                                                {{ old('incoming2') == 'normal' ? 'selected' : '' }}>
                                                Normal</option>
                                        </select>
                                        {{-- <input type="text" class="form-control @error('arusR') is-invalid @enderror"
                                            id="arusR" name="arusR" value="{{ old('arusR') }}"
                                            placeholder="Enter.."> --}}

                                        @error('incoming2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>OUTGOING 1</label>
                                        <select class="form-control  @error('outgoing1') is-invalid @enderror" name="outgoing1">
                                            <option disabled selected>Choose Selection</option>
                                            <option value="alarm"
                                                {{ old('outgoing1') == 'abnormal' ? 'selected' : '' }}>
                                                Abnormal</option>
                                            <option value="normal"
                                                {{ old('outgoing1') == 'normal' ? 'selected' : '' }}>
                                                Normal</option>
                                        </select>
                                        {{-- <input type="text" class="form-control @error('arusR') is-invalid @enderror"
                                            id="arusR" name="arusR" value="{{ old('arusR') }}"
                                            placeholder="Enter.."> --}}

                                        @error('outgoing1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>OUTGOING 2</label>
                                        <select class="form-control  @error('outgoing2') is-invalid @enderror" name="outgoing2">
                                            <option disabled selected>Choose Selection</option>
                                            <option value="alarm"
                                                {{ old('outgoing2') == 'abnormal' ? 'selected' : '' }}>
                                                Abnormal</option>
                                            <option value="normal"
                                                {{ old('outgoing2') == 'normal' ? 'selected' : '' }}>
                                                Normal</option>
                                        </select>
                                        {{-- <input type="text" class="form-control @error('arusR') is-invalid @enderror"
                                            id="arusR" name="arusR" value="{{ old('arusR') }}"
                                            placeholder="Enter.."> --}}

                                        @error('outgoing2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>COUPLER 1</label>
                                        <select class="form-control  @error('coupler') is-invalid @enderror" name="coupler">
                                            <option disabled selected>Choose Selection</option>
                                            <option value="alarm"
                                                {{ old('coupler') == 'abnormal' ? 'selected' : '' }}>
                                                Abnormal</option>
                                            <option value="normal"
                                                {{ old('coupler') == 'normal' ? 'selected' : '' }}>
                                                Normal</option>
                                        </select>
                                        {{-- <input type="text" class="form-control @error('arusR') is-invalid @enderror"
                                            id="arusR" name="arusR" value="{{ old('arusR') }}"
                                            placeholder="Enter.."> --}}

                                        @error('coupler')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>BUS VT</label>
                                        <select class="form-control  @error('bus-vt') is-invalid @enderror" name="bus-vt">
                                            <option disabled selected>Choose Selection</option>
                                            <option value="alarm"
                                                {{ old('bus-vt') == 'abnormal' ? 'selected' : '' }}>
                                                Abnormal</option>
                                            <option value="normal"
                                                {{ old('bus-vt') == 'normal' ? 'selected' : '' }}>
                                                Normal</option>
                                        </select>
                                        {{-- <input type="text" class="form-control @error('arusR') is-invalid @enderror"
                                            id="arusR" name="arusR" value="{{ old('arusR') }}"
                                            placeholder="Enter.."> --}}

                                        @error('bus-vt')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>SPARE 1</label>
                                        <select class="form-control  @error('spare1') is-invalid @enderror" name="spare1">
                                            <option disabled selected>Choose Selection</option>
                                            <option value="alarm"
                                                {{ old('spare1') == 'abnormal' ? 'selected' : '' }}>
                                                Abnormal</option>
                                            <option value="normal"
                                                {{ old('spare1') == 'normal' ? 'selected' : '' }}>
                                                Normal</option>
                                        </select>
                                        {{-- <input type="text" class="form-control @error('arusR') is-invalid @enderror"
                                            id="arusR" name="arusR" value="{{ old('arusR') }}"
                                            placeholder="Enter.."> --}}

                                        @error('spare1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>METERING</label>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>INCOMING</label>
                                        <input type="text"
                                            class="form-control @error('oilPresBar') is-invalid @enderror"
                                            id="oilPresBar" name="oilPresBar" value="1" disabled
                                            placeholder="Enter..">

                                        @error('oilPresBar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>DAYA (Watt)</label>
                                        <input type="text"
                                            class="form-control @error('oilTempC') is-invalid @enderror" id="oilTempC"
                                            name="oilTempC" value="{{ old('oilTempC') }}" placeholder="Enter..">

                                        @error('oilTempC')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>ARUS</label>
                                        <input type="text"
                                            class="form-control @error('oilTempC') is-invalid @enderror" id="oilTempC"
                                            name="oilTempC" value="{{ old('oilTempC') }}" placeholder="Enter..">

                                        @error('oilTempC')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>TEGANGAN</label>
                                        <input type="text"
                                            class="form-control @error('oilTempC') is-invalid @enderror" id="oilTempC"
                                            name="oilTempC" value="{{ old('oilTempC') }}" placeholder="Enter..">

                                        @error('oilTempC')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>COS PHI</label>
                                        <input type="text"
                                            class="form-control @error('oilTempC') is-invalid @enderror" id="oilTempC"
                                            name="oilTempC" value="{{ old('oilTempC') }}" placeholder="Enter..">

                                        @error('oilTempC')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>FREQUENSI (Hz)</label>
                                        <input type="text"
                                            class="form-control @error('oilTempC') is-invalid @enderror" id="oilTempC"
                                            name="oilTempC" value="{{ old('oilTempC') }}" placeholder="Enter..">

                                        @error('oilTempC')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>INCOMING</label>
                                        <input type="text"
                                            class="form-control @error('oilPresBar') is-invalid @enderror"
                                            id="oilPresBar" name="oilPresBar" value="2" disabled
                                            placeholder="Enter..">

                                        @error('oilPresBar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>DAYA (Watt)</label>
                                        <input type="text"
                                            class="form-control @error('oilTempC') is-invalid @enderror" id="oilTempC"
                                            name="oilTempC" value="{{ old('oilTempC') }}" placeholder="Enter..">

                                        @error('oilTempC')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>ARUS</label>
                                        <input type="text"
                                            class="form-control @error('oilTempC') is-invalid @enderror" id="oilTempC"
                                            name="oilTempC" value="{{ old('oilTempC') }}" placeholder="Enter..">

                                        @error('oilTempC')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>TEGANGAN</label>
                                        <input type="text"
                                            class="form-control @error('oilTempC') is-invalid @enderror" id="oilTempC"
                                            name="oilTempC" value="{{ old('oilTempC') }}" placeholder="Enter..">

                                        @error('oilTempC')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>COS PHI</label>
                                        <input type="text"
                                            class="form-control @error('oilTempC') is-invalid @enderror" id="oilTempC"
                                            name="oilTempC" value="{{ old('oilTempC') }}" placeholder="Enter..">

                                        @error('oilTempC')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>FREQUENSI (Hz)</label>
                                        <input type="text"
                                            class="form-control @error('oilTempC') is-invalid @enderror" id="oilTempC"
                                            name="oilTempC" value="{{ old('oilTempC') }}" placeholder="Enter..">

                                        @error('oilTempC')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>CONTROL MONITORING</label>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>SAS</label>
                                        <input type="text"
                                            class="form-control @error('coolantTempC') is-invalid @enderror"
                                            id="coolantTempC" name="coolantTempC" value="{{ old('coolantTempC') }}"
                                            placeholder="Enter..">

                                        @error('coolantTempC')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>EPCC</label>
                                        <input type="text"
                                            class="form-control @error('battVolt') is-invalid @enderror" id="battVolt"
                                            name="battVolt" value="{{ old('battVolt') }}" placeholder="Enter..">

                                        @error('battVolt')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>TEMPERATURE</label>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>TRAFO 1</label>
                                        <input type="text"
                                            class="form-control @error('coolantTempC') is-invalid @enderror"
                                            id="coolantTempC" name="coolantTempC" value="{{ old('coolantTempC') }}"
                                            placeholder="Enter..">

                                        @error('coolantTempC')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>TAP</label>
                                        <input type="text"
                                            class="form-control @error('battVolt') is-invalid @enderror" id="battVolt"
                                            name="battVolt" value="{{ old('battVolt') }}" placeholder="Enter..">

                                        @error('battVolt')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>TRAFO 2</label>
                                        <input type="text"
                                            class="form-control @error('coolantTempC') is-invalid @enderror"
                                            id="coolantTempC" name="coolantTempC" value="{{ old('coolantTempC') }}"
                                            placeholder="Enter..">

                                        @error('coolantTempC')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto col-md-6">
                                    <div class="form-group">
                                        <label>TAP</label>
                                        <input type="text"
                                            class="form-control @error('battVolt') is-invalid @enderror" id="battVolt"
                                            name="battVolt" value="{{ old('battVolt') }}" placeholder="Enter..">

                                        @error('battVolt')
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
            if (child.hasClass('fa-minus')) {
                child.removeClass('fa-minus').addClass('fa-plus');; // logs "This is the child element"
            } else if (child.hasClass('fa-plus')) {
                child.removeClass('fa-plus').addClass('fa-minus'); // logs "This is the child element"
            }
        }

        $("#rowAdder").click(function() {
            newRowAdd =
                '<div id="row"> <div class="input-group m-3">' +
                '<div class="input-group-prepend">' +
                ' </div>' +
                // '<input type="text" class="form-control m-input">'+
                `<div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <button class="btn btn-danger" id="DeleteRow" type="button">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                            <h2 class="mb-0">
                                
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>JAM</label>
                                            <input type="time"
                                                class="form-control @error('pick-time') is-invalid @enderror" id="pick-time"
                                                name="pick-time" value="{{ old('pick-time') }}"
                                                placeholder="Enter sugested completion">
                                            

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>URAIAN KEJADIAN</label>
                                            <input type="text"
                                                class="form-control @error('teganganS') is-invalid @enderror" id="teganganS"
                                                name="teganganS" value="{{ old('teganganS') }}" placeholder="Enter..">

                                            @error('teganganS')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>TINDAK LANJUT</label>
                                            <input type="text"
                                                class="form-control @error('teganganT') is-invalid @enderror" id="teganganT"
                                                name="teganganT" value="{{ old('teganganT') }}" placeholder="Enter..">

                                            @error('teganganT')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>SELESAI</label>
                                            <input type="time"
                                                class="form-control @error('pick-time') is-invalid @enderror"
                                                id="pick-time" name="pick-time" value="{{ old('pick-time') }}"
                                                placeholder="Enter sugested completion">

                                            @error('arusS')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>HASIL</label>
                                            <input type="text"
                                                class="form-control @error('arusT') is-invalid @enderror" id="arusT"
                                                name="arusT" value="{{ old('arusT') }}" placeholder="Enter..">

                                            @error('arusT')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-6">
                                        <div class="form-group">
                                            <label>KET.</label>
                                            <input type="text"
                                                class="form-control @error('arusT') is-invalid @enderror" id="arusT"
                                                name="arusT" value="{{ old('arusT') }}" placeholder="Enter..">

                                            @error('arusT')
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
                </div>` +
                ' </div> </div>';

            $('#newinput').append(newRowAdd);
        });

        $("body").on("click", "#DeleteRow", function() {
            $(this).parents("#row").remove();
        })
    </script>
@endsection
