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

        label {
            display: flex;
            justify-content: center;
        }
    </style>
@endsection

@section('content')
    <form method="POST" action="{{ route('form.ps3.panel-pompa-bbm-baru-enam-bulanan-tahunan.update', $detailWorkOrderForm->id) }}"
        enctype="multipart/form-data" id="form">
        @method('patch')
        @csrf

        <div class="container-fluid">
            <div class="accordion" id="accordionOne">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                onclick="showHide(this)">
                                <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>PEMERIKSAAN ARUS
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="show collapse" aria-labelledby="headingOne" data-parent="#accordionOne">
                        <div class="card-body">
                            @include('components.form-message')
                            <div class="col-12 d-flex justify-content-center align-items-center mb-3">
                                <span>PENGECEKAN ARUS MAIN TANK</span>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                        <span>TRANSFER PUMP ANTAR TANK 1</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump_antar_tank1_1') is-invalid @enderror"
                                            id="transfer_pump_antar_tank1_1" name="transfer_pump_antar_tank1_1"
                                            value="{{ old('transfer_pump_antar_tank1_1') ?? $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump_antar_tank1_1 }}"
                                            placeholder="">

                                        @error('transfer_pump_antar_tank1_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump_antar_tank1_2') is-invalid @enderror"
                                            id="transfer_pump_antar_tank1_2" name="transfer_pump_antar_tank1_2"
                                            value="{{ old('transfer_pump_antar_tank1_2') ?? $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump_antar_tank1_2 }}"
                                            placeholder="">

                                        @error('transfer_pump_antar_tank1_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump_antar_tank1_3') is-invalid @enderror"
                                            id="transfer_pump_antar_tank1_3" name="transfer_pump_antar_tank1_3"
                                            value="{{ old('transfer_pump_antar_tank1_3') ?? $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump_antar_tank1_3 }}"
                                            placeholder="">

                                        @error('transfer_pump_antar_tank1_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                        <span>TRANSFER PUMP ANTAR TANK 2</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump_antar_tank2_1') is-invalid @enderror"
                                            id="transfer_pump_antar_tank2_1" name="transfer_pump_antar_tank2_1"
                                            value="{{ old('transfer_pump_antar_tank2_1') ?? $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump_antar_tank2_1 }}"
                                            placeholder="">

                                        @error('transfer_pump_antar_tank2_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump_antar_tank2_2') is-invalid @enderror"
                                            id="transfer_pump_antar_tank2_2" name="transfer_pump_antar_tank2_2"
                                            value="{{ old('transfer_pump_antar_tank2_2') ?? $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump_antar_tank2_2 }}"
                                            placeholder="">

                                        @error('transfer_pump_antar_tank2_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump_antar_tank2_3') is-invalid @enderror"
                                            id="transfer_pump_antar_tank2_3" name="transfer_pump_antar_tank2_3"
                                            value="{{ old('transfer_pump_antar_tank2_3') ?? $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump_antar_tank2_3 }}"
                                            placeholder="">

                                        @error('transfer_pump_antar_tank2_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                        <span>TRANSFER PUMP 1</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump1_1') is-invalid @enderror"
                                            id="transfer_pump1_1" name="transfer_pump1_1"
                                            value="{{ old('transfer_pump1_1') ?? $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump1_1 }}"
                                            placeholder="">

                                        @error('transfer_pump1_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump1_2') is-invalid @enderror"
                                            id="transfer_pump1_2" name="transfer_pump1_2"
                                            value="{{ old('transfer_pump1_2') ?? $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump1_2 }}"
                                            placeholder="">

                                        @error('transfer_pump1_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump1_3') is-invalid @enderror"
                                            id="transfer_pump1_3" name="transfer_pump1_3"
                                            value="{{ old('transfer_pump1_3') ?? $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump1_3 }}"
                                            placeholder="">

                                        @error('transfer_pump1_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                        <span>TRANSFER PUMP 2</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump2_1') is-invalid @enderror"
                                            id="transfer_pump2_1" name="transfer_pump2_1"
                                            value="{{ old('transfer_pump2_1') ?? $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump2_1 }}"
                                            placeholder="">

                                        @error('transfer_pump2_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump2_2') is-invalid @enderror"
                                            id="transfer_pump2_2" name="transfer_pump2_2"
                                            value="{{ old('transfer_pump2_2') ?? $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump2_2 }}"
                                            placeholder="">

                                        @error('transfer_pump2_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('transfer_pump2_3') is-invalid @enderror"
                                            id="transfer_pump2_3" name="transfer_pump2_3"
                                            value="{{ old('transfer_pump2_3') ?? $formPs3PanelPompaBbmBaruEnamBulananTahunan->transfer_pump2_3 }}"
                                            placeholder="">

                                        @error('transfer_pump2_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center align-items-center mb-3">
                                <span>TEGANGAN INPUT PANEL POMPA</span>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                        <span>PANEL MAIN TANK</span>
                                    </div>
                                    <div class="col-10 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('panel_main_tank') is-invalid @enderror"
                                            id="panel_main_tank" name="panel_main_tank"
                                            value="{{ old('panel_main_tank') ?? $formPs3PanelPompaBbmBaruEnamBulananTahunan->panel_main_tank }}"
                                            placeholder="">

                                        @error('panel_main_tank')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>VAC</span>
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

                                    <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                                        placeholder="Deskripsi">{!! $formPs3PanelPompaBbmBaruEnamBulananTahunan->catatan ?? '' !!}</textarea>
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
                    <a href="{{ route('work-orders.index') }}" class="btn btn-secondary btn-footer">Back</a>
                </div>
            </div>
        </div>

    </form>
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
