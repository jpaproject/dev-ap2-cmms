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
        <form method="POST" id="myForm" action="{{ route('form.elp.tahunan.update', $detailWorkOrderForm) }}"
            enctype="multipart/form-data" id="form">
            @csrf
            @method('patch')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">A. GENERAL PREPARE CHECK</h3>
                            </div>
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row d-flex align-items-center">
                                    @foreach ($checklists as $key => $checklist)
                                        <div
                                            class="col-6 col-md-4 col-lg-3 d-flex align-items-center justify-content-center">
                                            @php
                                                $replaced = str_replace('_', ' ', $checklist);
                                                $converted = strtoupper($replaced);
                                            @endphp
                                            <span>{{ $converted }}</span>
                                        </div>
                                        <div
                                            class="col-6 col-md-2 col-lg-1 d-flex align-items-center justify-content-center">
                                            <input type="checkbox"
                                                class="flat largerCheckbox @error($checklist . '') is-invalid @enderror"
                                                name="{{ $checklist . '' }}" value="1"
                                                {{ old($checklist . '') ?? $formElpTahunan->$checklist ? 'checked' : '' }}>

                                            @error($checklist . '')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
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
                            <div class="card-header">
                                <h3 class="card-title">B. VISUAL CHECKLIST</h3>
                            </div>
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row d-flex align-items-center">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">RELAY CONDITION</label>
                                            <select class="form-control @error('relay_condition') is-invalid @enderror"
                                                name="relay_condition">
                                                <option readonly selected>Choose Selection</option>
                                                <option value="OK"
                                                    {{ old('relay_condition . ' . $key) ?? $formElpTahunan->relay_condition == 'OK' ? 'selected' : '' }}>
                                                    OK</option>
                                                <option value="NOT"
                                                    {{ old('relay_condition . ' . $key) ?? $formElpTahunan->relay_condition == 'NOT' ? 'selected' : '' }}>
                                                    NOT</option>
                                            </select>

                                            @error('relay_condition')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">WIRES CONDITION</label>
                                            <select class="form-control @error('wires_condition') is-invalid @enderror"
                                                name="wires_condition">
                                                <option readonly selected>Choose Selection</option>
                                                <option value="OK"
                                                    {{ old('wires_condition . ' . $key) ?? $formElpTahunan->wires_condition == 'OK' ? 'selected' : '' }}>
                                                    OK</option>
                                                <option value="NOT"
                                                    {{ old('wires_condition . ' . $key) ?? $formElpTahunan->wires_condition == 'NOT' ? 'selected' : '' }}>
                                                    NOT</option>
                                            </select>

                                            @error('wires_condition')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">TERMINALS CONDITION</label>
                                            <select class="form-control @error('terminals_condition') is-invalid @enderror"
                                                name="terminals_condition">
                                                <option readonly selected>Choose Selection</option>
                                                <option value="OK"
                                                    {{ old('terminals_condition . ' . $key) ?? $formElpTahunan->terminals_condition == 'OK' ? 'selected' : '' }}>
                                                    OK</option>
                                                <option value="NOT"
                                                    {{ old('terminals_condition . ' . $key) ?? $formElpTahunan->terminals_condition == 'NOT' ? 'selected' : '' }}>
                                                    NOT</option>
                                            </select>

                                            @error('terminals_condition')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row d-flex align-items-center">
                                    <div class="col-12 text-center">
                                        <h5>TYPE OF CONNECTION CT</h5>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control @error('type_of_connect_ct_1') is-invalid @enderror"
                                                id="type_of_connect_ct_1" name="type_of_connect_ct_1"
                                                value="{{ old('type_of_connect_ct_1') ?? $formElpTahunan->type_of_connect_ct_1 }}"
                                                placeholder="Enter..">

                                            @error('type_of_connect_ct_1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control @error('type_of_connect_ct_2') is-invalid @enderror"
                                                id="type_of_connect_ct_2" name="type_of_connect_ct_2"
                                                value="{{ old('type_of_connect_ct_2') ?? $formElpTahunan->type_of_connect_ct_2 }}"
                                                placeholder="Enter..">

                                            @error('type_of_connect_ct_2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row d-flex align-items-center">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">CLASS CT</label>
                                            <input type="text"
                                                class="form-control @error('type_of_connect_ct_1') is-invalid @enderror"
                                                id="type_of_connect_ct_1" name="type_of_connect_ct_1"
                                                value="{{ old('type_of_connect_ct_1') ?? $formElpTahunan->type_of_connect_ct_1 }}"
                                                placeholder="Enter..">

                                            @error('type_of_connect_ct_1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">BURDEN CT</label>
                                            <input type="text"
                                                class="form-control @error('burden_ct') is-invalid @enderror" id="burden_ct"
                                                name="burden_ct"
                                                value="{{ old('burden_ct') ?? $formElpTahunan->burden_ct }}"
                                                placeholder="Enter..">

                                            @error('burden_ct')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">RATIO CT</label>
                                            <input type="text"
                                                class="form-control @error('ratio_ct') is-invalid @enderror"
                                                id="ratio_ct" name="ratio_ct"
                                                value="{{ old('ratio_ct') ?? $formElpTahunan->ratio_ct }}"
                                                placeholder="Enter..">

                                            @error('ratio_ct')
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
                            <div class="card-header">
                                <h3 class="card-title">C. TRASNFORMATOR WARNING SYSTEM</h3>
                            </div>
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row d-flex align-items-center">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">TYPE OF PROTECTION</label>
                                            <input type="text"
                                                class="form-control @error('type_of_protection') is-invalid @enderror"
                                                id="type_of_protection" name="type_of_protection"
                                                value="{{ old('type_of_protection') ?? $formElpTahunan->type_of_protection }}"
                                                placeholder="Enter..">

                                            @error('type_of_protection')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">WIRES CONDITION</label>
                                            <select class="form-control @error('wires_condition') is-invalid @enderror"
                                                name="wires_condition">
                                                <option readonly selected>Choose Selection</option>
                                                <option value="OK"
                                                    {{ old('wires_condition . ' . $key) ?? $formElpTahunan->wires_condition == 'OK' ? 'selected' : '' }}>
                                                    OK</option>
                                                <option value="NOT"
                                                    {{ old('wires_condition . ' . $key) ?? $formElpTahunan->wires_condition == 'NOT' ? 'selected' : '' }}>
                                                    NOT</option>
                                            </select>

                                            @error('wires_condition')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">SETTING CHECK</label>
                                            <select class="form-control @error('setting_check') is-invalid @enderror"
                                                name="setting_check">
                                                <option readonly selected>Choose Selection</option>
                                                <option value="OK"
                                                    {{ old('setting_check . ' . $key) ?? $formElpTahunan->setting_check == 'OK' ? 'selected' : '' }}>
                                                    OK</option>
                                                <option value="NOT"
                                                    {{ old('setting_check . ' . $key) ?? $formElpTahunan->setting_check == 'NOT' ? 'selected' : '' }}>
                                                    NOT</option>
                                            </select>

                                            @error('setting_check')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">TEMPERATURE</label>
                                            <select class="form-control @error('temperature') is-invalid @enderror"
                                                name="temperature">
                                                <option readonly selected>Choose Selection</option>
                                                <option value="OK"
                                                    {{ old('temperature . ' . $key) ?? $formElpTahunan->temperature == 'OK' ? 'selected' : '' }}>
                                                    OK</option>
                                                <option value="NOT"
                                                    {{ old('temperature . ' . $key) ?? $formElpTahunan->temperature == 'NOT' ? 'selected' : '' }}>
                                                    NOT</option>
                                            </select>

                                            @error('temperature')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">PRESSURE</label>
                                            <select class="form-control @error('pressure') is-invalid @enderror"
                                                name="pressure">
                                                <option readonly selected>Choose Selection</option>
                                                <option value="OK"
                                                    {{ old('pressure . ' . $key) ?? $formElpTahunan->pressure == 'OK' ? 'selected' : '' }}>
                                                    OK</option>
                                                <option value="NOT"
                                                    {{ old('pressure . ' . $key) ?? $formElpTahunan->pressure == 'NOT' ? 'selected' : '' }}>
                                                    NOT</option>
                                            </select>

                                            @error('pressure')
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
                            <div class="card-header">
                                <h3 class="card-title">D. INPUT OUTPUT LIST TEST</h3>
                            </div>
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h5>INDICATIONS</h5>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center"
                                                for="indication_rcms_note">RCMS</label>
                                            <textarea name="indication_rcms_note" class="form-control @error('indication_rcms_note') is-invalid @enderror"
                                                id="indication_rcms_note" rows="5">{{ $formElpTahunan->indication_rcms_note ?? "1.
2.
3.
4.
5." }}</textarea>

                                            @error('indication_rcms_note')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center"
                                                for="indication_scada_note">SCADA</label>
                                            <textarea name="indication_scada_note" class="form-control @error('indication_scada_note') is-invalid @enderror"
                                                id="indication_scada_note" rows="5">{{ $formElpTahunan->indication_scada_note ?? "1.
2.
3.
4.
5." }}</textarea>
                                            @error('indication_scada_note')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h5>ORDERS</h5>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center"
                                                for="order_rcms_note">RCMS</label>
                                            <textarea name="order_rcms_note" class="form-control @error('order_rcms_note') is-invalid @enderror"
                                                id="order_rcms_note" rows="5">{{ $formElpTahunan->order_rcms_note ?? "1.
2.
3.
4.
5." }}</textarea>
                                            @error('order_rcms_note')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center"
                                                for="order_scada_note">SCADA</label>
                                            <textarea name="order_scada_note" class="form-control @error('order_scada_note') is-invalid @enderror"
                                                id="order_scada_note" rows="5">{{ $formElpTahunan->order_scada_note ?? "1.
2.
3.
4.
5." }}</textarea>

                                            @error('order_scada_note')
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
                            <div class="card-header">
                                <h3 class="card-title">E. FINAL CHECK</h3>
                            </div>
                            <div class="card-body">
                                @foreach ( $formElpFinalCheckTahunans as $key => $formElpFinalCheckTahunan )
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-12 col-lg-3 col-form-label text-center">{{ucwords(str_replace('_', ' ', $formElpFinalCheckTahunan->q1))}}</label>
                                    <div class="col-4 col-lg-3 d-flex justify-content-center align-items-center">
                                        <select class="form-control @error('status.'.$key) is-invalid @enderror"
                                            name="status[]">
                                            <option readonly selected>Choose Selection</option>
                                            <option value="OK"
                                                {{ old('status.'.$key) ?? $formElpFinalCheckTahunan->status == 'OK' ? 'selected' : '' }}>
                                                OK</option>
                                            <option value="NOT"
                                                {{ old('status.'.$key) ?? $formElpFinalCheckTahunan->status == 'NOT' ? 'selected' : '' }}>
                                                NOT</option>
                                        </select>
                                        @error('status.'.$key)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-8 col-lg-6 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('remarks.'.$key) is-invalid @enderror"
                                            id="remarks" name="remarks[]"
                                            value="{{ old('remarks.'.$key) ?? $formElpFinalCheckTahunan->status }}"
                                            placeholder="Enter..">
                                        @error('remarks.'.$key)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
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
                                            placeholder="Deskripsi">{!! $formElpTahunan->catatan !!}</textarea>
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
    <script></script>
@endsection
