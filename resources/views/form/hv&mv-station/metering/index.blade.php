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

                    <th class="head" scope="col">Tanggal</th>
                    <th class="head" scope="col">Pukul</th>
                    <th class="head" scope="col">Shift</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="head">06 Februari 2023</td>
                    <td class="head">18:18:28</td>
                    <td class="head">PS</td>
                </tr>
            </tbody>
        </table> --}}
        <form method="POST" action="{{ route('form.hmv.metering.harian.update', $detailWorkOrderForm->id) }}" enctype="multipart/form-data"
        id="form">
        @method('patch')
        @csrf
            <div class="container-fluid">
                <div class="accordion" id="accordionExample1">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title" style="text-align: right;">
                                        <button class="btn btn-link btn-block text-left text-white" type="button"
                                            data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne" onclick="showHide(this)">
                                            <i class="fas fa-chevron-up" id="accordion"></i> METERING 1
                                        </button>
                                    </h3>
                                </div>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample1">
                                <div class="card card-body">
                                    @foreach ($formHmvMeteranHarians as $item)
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="w-100">
                                                    <tr>
                                                        <td><label for="">Panel</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                id="name" name="name[]" value="{{ $item->name}}" disabled
                                                                placeholder="Enter Cubicle">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Tegangan (KV)</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>L1 <span class="text-muted">(Volt)</span></label>
                                                    <input type="number" step="0.01" class="form-control @error('tengangan_l1') is-invalid @enderror"
                                                        id="tengangan_l1" name="tengangan_l1[]" value="{{ old('tengangan_l1') ?? $item->tengangan_l1 }}"
                                                        placeholder="Volt">

                                                    @error('tengangan_l1')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>L2 <span class="text-muted">(Volt)</span></label>
                                                    <input type="number" step="0.01" class="form-control @error('tengangan_l2') is-invalid @enderror"
                                                        id="tengangan_l2" name="tengangan_l2[]" value="{{ old('tengangan_l2') ?? $item->tengangan_l2 }}"
                                                        placeholder="Volt">

                                                    @error('tengangan_l2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>L3 <span class="text-muted">(Volt)</span></label>
                                                    <input type="number" step="0.01" class="form-control @error('tengangan_l3') is-invalid @enderror"
                                                        id="tengangan_l3" name="tengangan_l3[]" value="{{ old('tengangan_l3') ?? $item->tengangan_l3 }}"
                                                        placeholder="Volt">

                                                    @error('tengangan_l3')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Arus (A)</label>
                                        </div>
                                        <div class="row">

                                            <div class="col-12 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>L1 <span class="text-muted">(Volt)</span></label>
                                                    <input type="number" step="0.01" class="form-control @error('arus_l1') is-invalid @enderror"
                                                        id="arus_l1" name="arus_l1[]" value="{{ old('arus_l1') ?? $item->arus_l1 }}"
                                                        placeholder="Volt">

                                                    @error('arus_l1')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>L2 <span class="text-muted">(Volt)</span></label>
                                                    <input type="number" step="0.01" class="form-control @error('arus_l2') is-invalid @enderror"
                                                        id="arus_l2" name="arus_l2[]" value="{{ old('arus_l2') ?? $item->arus_l2 }}"
                                                        placeholder="Volt">

                                                    @error('arus_l2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>L3 <span class="text-muted">(Volt)</span></label>
                                                    <input type="number" step="0.01" class="form-control @error('arus_l3') is-invalid @enderror"
                                                        id="arus_l3" name="arus_l3[]" value="{{ old('arus_l3') ?? $item->arus_l3 }}"
                                                        placeholder="Volt">

                                                    @error('arus_l3')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Daya</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>MWH</label>
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>REC</label>
                                                                <input type="number" step="0.001" class="form-control @error('daya_mwh_rec') is-invalid @enderror"
                                                                    id="daya_mwh_rec" name="daya_mwh_rec[]" value="{{ old('daya_mwh_rec') ?? $item->daya_mwh_rec }}"
                                                                    placeholder="Volt">

                                                                @error('daya_mwh_rec')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>DEL</label>
                                                                <input type="number" step="0.001" class="form-control @error('daya_mwh_del') is-invalid @enderror"
                                                                    id="daya_mwh_del" name="daya_mwh_del[]" value="{{ old('daya_mwh_del') ?? $item->daya_mwh_del }}"
                                                                    placeholder="Volt">

                                                                @error('daya_mwh_del')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>MVARH</label>
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>REC</label>
                                                                <input type="number" step="0.001" class="form-control @error('daya_mvarh_rec') is-invalid @enderror"
                                                                    id="daya_mvarh_rec" name="daya_mvarh_rec[]" value="{{ old('daya_mvarh_rec') ?? $item->daya_mvarh_rec }}"
                                                                    placeholder="Volt">

                                                                @error('daya_mvarh_rec')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>DEL</label>
                                                                <input type="number" step="0.001" class="form-control @error('daya_mvarh_del') is-invalid @enderror"
                                                                    id="daya_mvarh_del" name="daya_mvarh_del[]" value="{{ old('daya_mvarh_del') ?? $item->daya_mvarh_del }}"
                                                                    placeholder="Volt">

                                                                @error('daya_mvarh_del')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('lt3')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-12 col-md-6">
                                                <table class="w-100">
                                                    <tr>
                                                        <td><label for="">Frekuensi</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="number" step="0.01"
                                                                class="form-control @error('frekuensi') is-invalid @enderror"
                                                                id="frekuensi" name="frekuensi[]" value="{{ old('frekuensi') ?? $item->frekuensi }}"
                                                                placeholder="Enter Frekuensi">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <table class="w-100">
                                                    <tr>
                                                        <td><label for="">Cos ( &pi; )</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="number" step="0.01"
                                                                class="form-control @error('raticoso-ct') is-invalid @enderror"
                                                                id="cos" name="cos[]" value="{{ old('cos') ?? $item->cos }}"
                                                                placeholder="Enter Cos Phi">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <hr class="border-primary">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="accordion" id="accordionExample2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title" style="text-align: right;">
                                        <button class="btn btn-link btn-block text-left text-white" type="button"
                                            data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo" onclick="showHide(this)">
                                            <i class="fas fa-chevron-down" id="accordion"></i> METERING 2
                                        </button>
                                    </h3>
                                </div>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordionExample2">
                                <div class="card card-body">
                                    @foreach ($formHmvMeteran2Harians as $item)
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="w-100">
                                                    <tr>
                                                        <td><label for="">Panel</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text"
                                                                class="form-control @error('panel') is-invalid @enderror"
                                                                id="panel" name="panel" value="{{ $item->name}}" disabled
                                                                placeholder="Enter Panel">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Tegangan (KV)</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>LT 1 <span class="text-muted">(Volt)</span></label>
                                                    <input type="number" step="0.01" class="form-control @error('tengangan_l1') is-invalid @enderror"
                                                        id="tengangan_l1" name="m2_tengangan_l1[]" value="{{ old('tengangan_l1') ?? $item->tengangan_l1 }}"
                                                        placeholder="Volt">

                                                    @error('tengangan_l1')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>tengangan_L 2 <span class="text-muted">(Volt)</span></label>
                                                    <input type="number" step="0.01" class="form-control @error('tengangan_l2') is-invalid @enderror"
                                                        id="tengangan_l2" name="m2_tengangan_l2[]" value="{{ old('tengangan_l2') ?? $item->tengangan_l2 }}"
                                                        placeholder="Volt">

                                                    @error('tengangan_l2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>tengangan_L 3 <span class="text-muted">(Volt)</span></label>
                                                    <input type="number" step="0.01" class="form-control @error('tengangan_l3') is-invalid @enderror"
                                                        id="tengangan_l3" name="m2_tengangan_l3[]" value="{{ old('tengangan_l3') ?? $item->tengangan_l3 }}"
                                                        placeholder="Volt">

                                                    @error('tengangan_l3')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Arus (A)</label>
                                        </div>
                                        <div class="row">

                                            <div class="col-12 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>LT 1 <span class="text-muted">(Volt)</span></label>
                                                    <input type="number" step="0.01" class="form-control @error('arus_l1') is-invalid @enderror"
                                                        id="arus_l1" name="m2_arus_l1[]" value="{{ old('arus_l1') ?? $item->arus_l1 }}"
                                                        placeholder="Volt">

                                                    @error('arus_l1')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>arus_L 2 <span class="text-muted">(Volt)</span></label>
                                                    <input type="number" step="0.01" class="form-control @error('arus_l2') is-invalid @enderror"
                                                        id="arus_l2" name="m2_arus_l2[]" value="{{ old('arus_l2') ?? $item->arus_l2 }}"
                                                        placeholder="Volt">

                                                    @error('arus_l2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>arus_L 3 <span class="text-muted">(Volt)</span></label>
                                                    <input type="number" step="0.01" class="form-control @error('arus_l3') is-invalid @enderror"
                                                        id="arus_l3" name="m2_arus_l3[]" value="{{ old('arus_l3') ?? $item->arus_l3 }}"
                                                        placeholder="Volt">

                                                    @error('arus_l3')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Daya</label>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12 col-md-4">
                                                <label>Aktif</label>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="number" step="0.01" class="form-control @error('daya_reaktif') is-invalid @enderror"
                                                                id="daya_aktif" name="m2_daya_aktif[]" value="{{ old('daya_aktif') ?? $item->daya_aktif }}"
                                                                placeholder="Volt">

                                                            @error('daya_aktif')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-4">
                                                <label>Semu</label>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="number" step="0.01" class="form-control @error('daya_semu') is-invalid @enderror"
                                                                id="daya_semu" name="m2_daya_semu[]" value="{{ old('daya_semu') ?? $item->daya_semu }}"
                                                                placeholder="Volt">

                                                            @error('daya_semu')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-4">
                                                <label>Reaktif</label>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="number" step="0.01" class="form-control @error('daya_reaktif') is-invalid @enderror"
                                                                id="daya_reaktif" name="m2_daya_reaktif[]" value="{{ old('daya_reaktif') ?? $item->daya_reaktif }}"
                                                                placeholder="Volt">

                                                            @error('daya_reaktif')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-12 col-md-6">
                                                <table class="w-100">
                                                    <tr>
                                                        <td><label for="">Frekuensi</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="number" step="0.01"
                                                                class="form-control @error('frekuensi') is-invalid @enderror"
                                                                id="frekuensi" name="m2_frekuensi[]" value="{{ old('frekuensi') ?? $item->frekuensi }}"
                                                                placeholder="Enter Frekuensi">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <table class="w-100">
                                                    <tr>
                                                        <td><label for="">Cos ( &pi; )</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="number" step="0.01"
                                                                class="form-control @error('raticoso-ct') is-invalid @enderror"
                                                                id="cos" name="m2_cos[]" value="{{ old('cos') ?? $item->cos }}"
                                                                placeholder="Enter Cos Phi">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <hr class="border-primary">
                                    @endforeach

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
