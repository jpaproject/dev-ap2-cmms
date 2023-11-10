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
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <th class="head">{{ $detailWorkOrderForm->workOrder->id }}</th>
                    <td class="head">{{ $detailWorkOrderForm->workOrder->asset->location->name ?? '' }}</td>
                    <td class="head">{{ $detailWorkOrderForm->created_at->format('l, j F Y') ?? '' }}</td>
                </tr>
            </tbody>
        </table>
        <form method="POST"
            action="{{ route('form.power-station.checklist-harian-genset-ps3.control-room.update', $detailWorkOrderForm->id) }}"
            id="form">
            @method('patch')
            @csrf
            <div class="container-fluid">
                @include('components.form-message')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">I. PLN INCOMINGS</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>DEIF
                                            controller</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>ER2A.MCA</label>
                                                    <select class="form-control  @error('er2a_mca') is-invalid @enderror"
                                                        name="er2a_mca">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="alarm"
                                                            {{ old('er2a_mca') ?? $formPs3ControlRoomHarian->er2a_mca == 'alarm' ? 'selected' : '' }}>
                                                            Alarm</option>
                                                        <option value="normal"
                                                            {{ old('er2a_mca') ?? $formPs3ControlRoomHarian->er2a_mca == 'normal' ? 'selected' : '' }}>
                                                            Normal</option>
                                                    </select>
                                                    @error('er2a_mca')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>ER2A.MCB</label>
                                                    <select class="form-control  @error('er2a_mcb') is-invalid @enderror"
                                                        name="er2a_mcb">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="alarm"
                                                            {{ old('er2a_mcb') ?? $formPs3ControlRoomHarian->er2a_mcb == 'alarm' ? 'selected' : '' }}>
                                                            Alarm</option>
                                                        <option value="normal"
                                                            {{ old('er2a_mcb') ?? $formPs3ControlRoomHarian->er2a_mcb == 'normal' ? 'selected' : '' }}>
                                                            Normal</option>
                                                    </select>
                                                    @error('er2a_mcb')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>ER2B.MCD</label>
                                                    <select class="form-control  @error('er2b_mcd') is-invalid @enderror"
                                                        name="er2b_mcd">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="alarm"
                                                            {{ old('er2b_mcd') ?? $formPs3ControlRoomHarian->er2b_mcd == 'alarm' ? 'selected' : '' }}>
                                                            Alarm</option>
                                                        <option value="normal"
                                                            {{ old('er2b_mcd') ?? $formPs3ControlRoomHarian->er2b_mcd == 'normal' ? 'selected' : '' }}>
                                                            Normal</option>
                                                    </select>
                                                    @error('er2b_mcd')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>ER2B.MCE</label>
                                                    <select class="form-control  @error('er2b_mce') is-invalid @enderror"
                                                        name="er2b_mce">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="alarm"
                                                            {{ old('er2b_mce') ?? $formPs3ControlRoomHarian->er2b_mce == 'alarm' ? 'selected' : '' }}>
                                                            Alarm</option>
                                                        <option value="normal"
                                                            {{ old('er2b_mce') ?? $formPs3ControlRoomHarian->er2b_mce == 'normal' ? 'selected' : '' }}>
                                                            Normal</option>
                                                    </select>
                                                    @error('er2b_mce')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <select
                                                        class="form-control  @error('keterangan_pln_incoming') is-invalid @enderror"
                                                        name="keterangan_pln_incoming">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="alarm"
                                                            {{ old('keterangan_pln_incoming') ?? $formPs3ControlRoomHarian->keterangan_pln_incoming == 'alarm' ? 'selected' : '' }}>
                                                            Alarm</option>
                                                        <option value="normal"
                                                            {{ old('keterangan_pln_incoming') ?? $formPs3ControlRoomHarian->keterangan_pln_incoming == 'normal' ? 'selected' : '' }}>
                                                            Normal</option>
                                                    </select>
                                                    @error('keterangan_pln_incoming')
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
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">II. GENSET INCOMING</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                        <span>DEIF
                                            controller</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-12 col-lg-4">
                                                <div class="form-group">
                                                    <label>ER2A.MCF</label>
                                                    <select class="form-control  @error('er2a_mcf') is-invalid @enderror"
                                                        name="er2a_mcf">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="alarm"
                                                            {{ old('er2a_mcf') ?? $formPs3ControlRoomHarian->er2a_mcf == 'alarm' ? 'selected' : '' }}>
                                                            Alarm</option>
                                                        <option value="normal"
                                                            {{ old('er2a_mcf') ?? $formPs3ControlRoomHarian->er2a_mcf == 'normal' ? 'selected' : '' }}>
                                                            Normal</option>
                                                    </select>
                                                    @error('er2a_mcf')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <div class="form-group">
                                                    <label>ER2B.MCG</label>
                                                    <select class="form-control  @error('er2b_mcg') is-invalid @enderror"
                                                        name="er2b_mcg">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="alarm"
                                                            {{ old('er2b_mcg') ?? $formPs3ControlRoomHarian->er2b_mcg == 'alarm' ? 'selected' : '' }}>
                                                            Alarm</option>
                                                        <option value="normal"
                                                            {{ old('er2b_mcg') ?? $formPs3ControlRoomHarian->er2b_mcg == 'normal' ? 'selected' : '' }}>
                                                            Normal</option>
                                                    </select>
                                                    @error('er2b_mcg')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <select
                                                        class="form-control  @error('keterangan_genset_incoming') is-invalid @enderror"
                                                        name="keterangan_genset_incoming">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="alarm"
                                                            {{ old('keterangan_genset_incoming') ?? $formPs3ControlRoomHarian->keterangan_genset_incoming == 'alarm' ? 'selected' : '' }}>
                                                            Alarm</option>
                                                        <option value="normal"
                                                            {{ old('keterangan_genset_incoming') ?? $formPs3ControlRoomHarian->keterangan_genset_incoming == 'normal' ? 'selected' : '' }}>
                                                            Normal</option>
                                                    </select>
                                                    @error('keterangan_genset_incoming')
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
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">III. HMI</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-2 d-flex justify-content-center align-items-center">
                                        <span>Overview Genset</span>
                                    </div>
                                    <div class="col-12 col-lg-9 col-md-10">
                                        <div class="row">
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>GS1</label>
                                                    <select class="form-control  @error('genset1') is-invalid @enderror"
                                                        name="genset1">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="alarm"
                                                            {{ old('genset1') ?? $formPs3ControlRoomHarian->genset1 == 'alarm' ? 'selected' : '' }}>
                                                            Alarm</option>
                                                        <option value="normal"
                                                            {{ old('genset1') ?? $formPs3ControlRoomHarian->genset1 == 'normal' ? 'selected' : '' }}>
                                                            Normal</option>
                                                    </select>
                                                    @error('genset1')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>GS2</label>
                                                    <select class="form-control  @error('genset2') is-invalid @enderror"
                                                        name="genset2">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="alarm"
                                                            {{ old('genset2') ?? $formPs3ControlRoomHarian->genset2 == 'alarm' ? 'selected' : '' }}>
                                                            Alarm</option>
                                                        <option value="normal"
                                                            {{ old('genset2') ?? $formPs3ControlRoomHarian->genset2 == 'normal' ? 'selected' : '' }}>
                                                            Normal</option>
                                                    </select>
                                                    @error('genset2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>GS3</label>
                                                    <select class="form-control  @error('genset3') is-invalid @enderror"
                                                        name="genset3">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="alarm"
                                                            {{ old('genset3') ?? $formPs3ControlRoomHarian->genset3 == 'alarm' ? 'selected' : '' }}>
                                                            Alarm</option>
                                                        <option value="normal"
                                                            {{ old('genset3') ?? $formPs3ControlRoomHarian->genset3 == 'normal' ? 'selected' : '' }}>
                                                            Normal</option>
                                                    </select>
                                                    @error('genset3')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>GS4</label>
                                                    <select class="form-control  @error('genset4') is-invalid @enderror"
                                                        name="genset4">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="alarm"
                                                            {{ old('genset4') ?? $formPs3ControlRoomHarian->genset4 == 'alarm' ? 'selected' : '' }}>
                                                            Alarm</option>
                                                        <option value="normal"
                                                            {{ old('genset4') ?? $formPs3ControlRoomHarian->genset4 == 'normal' ? 'selected' : '' }}>
                                                            Normal</option>
                                                    </select>
                                                    @error('genset4')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>GS5</label>
                                                    <select class="form-control  @error('genset5') is-invalid @enderror"
                                                        name="genset5">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="alarm"
                                                            {{ old('genset5') ?? $formPs3ControlRoomHarian->genset5 == 'alarm' ? 'selected' : '' }}>
                                                            Alarm</option>
                                                        <option value="normal"
                                                            {{ old('genset5') ?? $formPs3ControlRoomHarian->genset5 == 'normal' ? 'selected' : '' }}>
                                                            Normal</option>
                                                    </select>
                                                    @error('genset5')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>GS6</label>
                                                    <select class="form-control  @error('genset6') is-invalid @enderror"
                                                        name="genset6">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="alarm"
                                                            {{ old('genset6') ?? $formPs3ControlRoomHarian->genset6 == 'alarm' ? 'selected' : '' }}>
                                                            Alarm</option>
                                                        <option value="normal"
                                                            {{ old('genset6') ?? $formPs3ControlRoomHarian->genset6 == 'normal' ? 'selected' : '' }}>
                                                            Normal</option>
                                                    </select>
                                                    @error('genset6')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>GS7</label>
                                                    <select class="form-control  @error('genset7') is-invalid @enderror"
                                                        name="genset7">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="alarm"
                                                            {{ old('genset7') ?? $formPs3ControlRoomHarian->genset7 == 'alarm' ? 'selected' : '' }}>
                                                            Alarm</option>
                                                        <option value="normal"
                                                            {{ old('genset7') ?? $formPs3ControlRoomHarian->genset7 == 'normal' ? 'selected' : '' }}>
                                                            Normal</option>
                                                    </select>
                                                    @error('genset7')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>GS8</label>
                                                    <select class="form-control  @error('genset8') is-invalid @enderror"
                                                        name="genset8">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="alarm"
                                                            {{ old('genset8') ?? $formPs3ControlRoomHarian->genset8 == 'alarm' ? 'selected' : '' }}>
                                                            Alarm</option>
                                                        <option value="normal"
                                                            {{ old('genset8') ?? $formPs3ControlRoomHarian->genset8 == 'normal' ? 'selected' : '' }}>
                                                            Normal</option>
                                                    </select>
                                                    @error('genset8')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-auto col-md-6">
                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <select
                                                        class="form-control  @error('keterangan_hmi') is-invalid @enderror"
                                                        name="keterangan_hmi">
                                                        <option disabled selected>Choose Selection</option>
                                                        <option value="alarm"
                                                            {{ old('keterangan_hmi') ?? $formPs3ControlRoomHarian->keterangan_hmi == 'alarm' ? 'selected' : '' }}>
                                                            Alarm</option>
                                                        <option value="normal"
                                                            {{ old('keterangan_hmi') ?? $formPs3ControlRoomHarian->keterangan_hmi == 'normal' ? 'selected' : '' }}>
                                                            Normal</option>
                                                    </select>
                                                    @error('keterangan_hmi')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="row">
                                    <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                        <span>Busbar Active</span>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-9 col-form-label">Busbar A</label>
                                            <input type="checkbox"
                                                class="flat largerCheckbox @error('busbarA') is-invalid @enderror"
                                                name="busbar_a" value="1"
                                                {{ old('busbar_a') ?? $formPs3ControlRoomHarian->busbar_a ? 'checked' : '' }}>

                                            @error('busbarA')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-9 col-form-label">Busbar B</label>
                                            <input type="checkbox"
                                                class="flat largerCheckbox @error('busbarB') is-invalid @enderror"
                                                name="busbar_b" value="1"
                                                {{ old('busbar_b') ?? $formPs3ControlRoomHarian->busbar_b ? 'checked' : '' }}>

                                            @error('busbarB')
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

                                        <textarea name="catatan" class="form-control @error('remote-orders-rcms') is-invalid @enderror" id="catatan"
                                            placeholder="Deskripsi">{!! $formPs3ControlRoomHarian->catatan !!}</textarea>
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
                        <button type="submit" class="btn btn-success btn-footer">Simpan</button>
                        <a href="{{ route('work-orders.show', $detailWorkOrderForm->work_order_id) }}"
                            class="btn btn-secondary btn-footer">Back</a>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('script')
@endsection
