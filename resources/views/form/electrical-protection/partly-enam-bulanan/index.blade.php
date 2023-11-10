@extends('layouts.app')

@section('breadcumb')
    <li class="breadcrumb-item">
        <a href="{{ route('work-orders.index') }}">Work Order</a>
    </li>
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

        
        <form method="POST" id="myForm" action="{{ route('form.elp.partly-enam-bulanan.update', $detailWorkOrderForm) }}"
            enctype="multipart/form-data" id="form">
            @csrf
            @method('patch')
            <div class="add-substation-area">
                <div class="container-fluid">
                    <div class="accordion" id="accordionLoop">
                        <div class="card">
                            <div class="card-header" id="Loop">
                                <h2 class="row mb-0">
                                    <div class="col-6">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapseLoop" aria-expanded="true"
                                            aria-controls="collapseLoop" onclick="showHide(this)">
                                            <i class="fas {{ 1 === 1 ? 'fa-minus' : 'fa-plus' }}" id="accordion"></i>
                                            {{ $element ?? '' }}
                                        </button>
                                    </div>
                                </h2>
                            </div>

                            <div id="collapseLoop" class="{{ 1 === 1 ? 'show' : '' }} collapse" aria-labelledby="Loop"
                                data-parent="#accordionLoop">
                                <div class="card-body">
                                    @include('components.form-message')
                                    <div class="row">
                                        <div class="col-12 col-lg-4">
                                            <label class="d-flex justify-content-center">SUBSTATION</label>
                                            <input type="text"
                                                class="form-control @error('substation') is-invalid @enderror"
                                                id="substation" name="substation" value="{{ old('substation') ?? $formElpPartlyEnamBulanans[0]->substation }}"
                                                placeholder="Enter..">

                                            @error('substation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <label class="d-flex justify-content-center">GARDU</label>
                                            <input type="text"
                                                class="form-control @error('gardu') is-invalid @enderror"
                                                id="gardu" name="gardu" value="{{ old('gardu') ?? $formElpPartlyEnamBulanans[0]->gardu }}" placeholder="Enter..">

                                            @error('gardu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <label class="d-flex justify-content-center">RELAY</label>
                                            <input type="text"
                                                class="form-control @error('relay') is-invalid @enderror"
                                                id="relay" name="relay" value="{{ old('relay') ?? $formElpPartlyEnamBulanans[0]->relay }}"
                                                placeholder="Enter..">

                                            @error('relay')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr class="bg-primary">
                                    @foreach ($formElpPartlyEnamBulanans as $formElpPartlyEnamBulanan)
                                        <div class="row mt-2">
                                            <div class="col-12 col-lg-2 d-flex justify-content-center align-items-center">
                                                <h5>{{ $formElpPartlyEnamBulanan->element }}</h5>
                                            </div>
                                            <div class="col-12 col-lg-10 align-items-end mt-2">
                                                <div class="row justify-content-center">
                                                    <h5>CURVE TRIPPING</h5>
                                                </div>
                                                <div class="row form-group">
                                                    <input type="text"
                                                        class="form-control @error('curve_tripping.' . 0) is-invalid @enderror"
                                                        id="calculation" name="curve_tripping[]"
                                                        value="{{ old('curve_tripping.' . 0) ?? $formElpPartlyEnamBulanan->curve_tripping }}" step="0.001"
                                                        placeholder="Enter..">

                                                    @error('curve_tripping.' . 0)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <hr>
                                                @foreach ($properties as $key => $property)
                                                @php
                                                    $tempName = $property['name'].'_';
                                                    $tempCalculation = $tempName . 'calculation';
                                                    $tempTestTripRelay = $tempName . 'test_trip_relay';
                                                    $tempTestTripCb= $tempName . 'test_trip_cb';
                                                @endphp
                                                    <div class="row justify-content-center align-items-end mt-2">
                                                        <h5>{{ $property['title'] }}</h5>
                                                    </div>
                                                    <div class="row align-items-end">
                                                        <div class="col-4">
                                                            <label
                                                                class="d-flex justify-content-center">CALCULATION</label>
                                                            <input type="text"
                                                                class="form-control @error($tempCalculation .'.'. 0) is-invalid @enderror"
                                                                id="calculation"
                                                                name="{{ $tempCalculation.'[]' }}"
                                                                value="{{ old($tempCalculation .'.'. 0) ?? $formElpPartlyEnamBulanan->$tempCalculation }}"
                                                                step="0.001" placeholder="Enter..">

                                                            @error($tempCalculation .'.'. 0)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="row justify-content-center"><span class="">TEST
                                                                    TRIP</span></div>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label
                                                                        class="d-flex justify-content-center">RELAY</label>
                                                                    <input type="text"
                                                                        class="form-control @error($tempTestTripRelay .'.'. 0) is-invalid @enderror"
                                                                        id="test_trip_relay"
                                                                        name="{{ $tempTestTripRelay.'[]' }}"
                                                                        value="{{ old($tempTestTripRelay .'.'. 0) ?? $formElpPartlyEnamBulanan->$tempTestTripRelay }}"
                                                                        step="0.001"                                                                         placeholder="Enter..">

                                                                    @error($tempTestTripRelay .'.'. 0)
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-6">
                                                                    <label class="d-flex justify-content-center">CB</label>
                                                                    <input type="text"
                                                                        class="form-control @error($tempTestTripCb .'.'. 0) is-invalid @enderror"
                                                                        id="test_trip_cb"
                                                                        name="{{ $tempTestTripCb.'[]' }}"
                                                                        value="{{ old($tempTestTripCb .'.'. 0) ?? $formElpPartlyEnamBulanan->$tempName }}"
                                                                        step="0.001"                                                                         placeholder="Enter..">

                                                                    @error($tempTestTripCb .'.'. 0)
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endforeach   
                                                <div class="row justify-content-center">
                                                    <h5>RASIO CT</h5>
                                                </div>
                                                <div class="row form-group">
                                                    <input type="text"
                                                        class="form-control @error('rasio_ct.' . 0) is-invalid @enderror"
                                                        id="calculation" name="rasio_ct[]"
                                                        value="{{ old('rasio_ct.' . 0) ?? $formElpPartlyEnamBulanan->rasio_ct }}" placeholder="Enter..">

                                                    @error('rasio_ct.' . 0)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="row justify-content-center">
                                                    <h5>KETERANGAN</h5>
                                                </div>
                                                <div class="row form-group">
                                                    <textarea name="keterangan[]" class="form-control @error('keterangan.' . 0) is-invalid @enderror" id="keterangan"
                                            placeholder="Deskripsi">{!! old('keterangan.' . 0) ?? $formElpPartlyEnamBulanan->keterangan !!}</textarea>

                                                    @error('keterangan.' . 0)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="bg-primary">
                                    @endforeach
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

                                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                                            placeholder="Deskripsi">{!! $formElpPartlyEnamBulanans[0]->catatan ?? '' !!}</textarea>
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
            if (child.hasClass('fa-minus')) {
                child.removeClass('fa-minus').addClass('fa-plus');; // logs "This is the child element"
            } else if (child.hasClass('fa-plus')) {
                child.removeClass('fa-plus').addClass('fa-minus'); // logs "This is the child element"
            }
        }
    </script>
@endsection
