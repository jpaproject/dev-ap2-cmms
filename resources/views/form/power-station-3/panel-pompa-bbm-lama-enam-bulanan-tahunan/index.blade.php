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
    <form method="POST" action="{{ route('form.ps3.panel-pompa-bbm-lama-enam-bulanan-tahunan.update', $detailWorkOrderForm->id) }}"
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
                                MOTOR POMPA TRANSFER
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
                                        <span>P1A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p1a_1') is-invalid @enderror"
                                            id="p1a_1" name="p1a_1"
                                            value="{{ old('p1a_1') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->p1a_1 }}"
                                            placeholder="">

                                        @error('p1a_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p1a_2') is-invalid @enderror"
                                            id="p1a_2" name="p1a_2"
                                            value="{{ old('p1a_2') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->p1a_2 }}"
                                            placeholder="">

                                        @error('p1a_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p1a_3') is-invalid @enderror"
                                            id="p1a_3" name="p1a_3"
                                            value="{{ old('p1a_3') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->p1a_3 }}"
                                            placeholder="">

                                        @error('p1a_3')
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
                                        <span>P1B</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p1b_1') is-invalid @enderror"
                                            id="p1b_1" name="p1b_1"
                                            value="{{ old('p1b_1') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->p1b_1 }}"
                                            placeholder="">

                                        @error('p1b_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p1b_2') is-invalid @enderror"
                                            id="p1b_2" name="p1b_2"
                                            value="{{ old('p1b_2') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->p1b_2 }}"
                                            placeholder="">

                                        @error('p1b_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p1b_3') is-invalid @enderror"
                                            id="p1b_3" name="p1b_3"
                                            value="{{ old('p1b_3') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->p1b_3 }}"
                                            placeholder="">

                                        @error('p1b_3')
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
                                        <span>P2A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p2a_1') is-invalid @enderror"
                                            id="p2a_1" name="p2a_1"
                                            value="{{ old('p2a_1') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->p2a_1 }}"
                                            placeholder="">

                                        @error('p2a_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p2a_2') is-invalid @enderror"
                                            id="p2a_2" name="p2a_2"
                                            value="{{ old('p2a_2') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->p2a_2 }}"
                                            placeholder="">

                                        @error('p2a_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p2a_3') is-invalid @enderror"
                                            id="p2a_3" name="p2a_3"
                                            value="{{ old('p2a_3') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->p2a_3 }}"
                                            placeholder="">

                                        @error('p2a_3')
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
                                        <span>P2B</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p2b_1') is-invalid @enderror"
                                            id="p2b_1" name="p2b_1"
                                            value="{{ old('p2b_1') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->p2b_1 }}"
                                            placeholder="">

                                        @error('p2b_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p2b_2') is-invalid @enderror"
                                            id="p2b_2" name="p2b_2"
                                            value="{{ old('p2b_2') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->p2b_2 }}"
                                            placeholder="">

                                        @error('p2b_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p2b_3') is-invalid @enderror"
                                            id="p2b_3" name="p2b_3"
                                            value="{{ old('p2b_3') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->p2b_3 }}"
                                            placeholder="">

                                        @error('p2b_3')
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
                                        <span>P4</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p4_1') is-invalid @enderror"
                                            id="p4_1" name="p4_1"
                                            value="{{ old('p4_1') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->p4_1 }}"
                                            placeholder="">

                                        @error('p4_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p4_2') is-invalid @enderror"
                                            id="p4_2" name="p4_2"
                                            value="{{ old('p4_2') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->p4_2 }}"
                                            placeholder="">

                                        @error('p4_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p4_3') is-invalid @enderror"
                                            id="p4_3" name="p4_3"
                                            value="{{ old('p4_3') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->p4_3 }}"
                                            placeholder="">

                                        @error('p4_3')
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
                                        <span>P4</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p4_1') is-invalid @enderror"
                                            id="p4_1" name="p4_1"
                                            value="{{ old('p4_1') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->p4_1 }}"
                                            placeholder="">

                                        @error('p4_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p4_2') is-invalid @enderror"
                                            id="p4_2" name="p4_2"
                                            value="{{ old('p4_2') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->p4_2 }}"
                                            placeholder="">

                                        @error('p4_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>A</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('p4_3') is-invalid @enderror"
                                            id="p4_3" name="p4_3"
                                            value="{{ old('p4_3') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->p4_3 }}"
                                            placeholder="">

                                        @error('p4_3')
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
                                        <span>PANEL KONTROL MAIN TANK</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('panel_kontrol_main_tank_1') is-invalid @enderror"
                                            id="panel_kontrol_main_tank_1" name="panel_kontrol_main_tank_1"
                                            value="{{ old('panel_kontrol_main_tank_1') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->panel_kontrol_main_tank_1 }}"
                                            placeholder="">

                                        @error('panel_kontrol_main_tank_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>VAC</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('panel_kontrol_main_tank_2') is-invalid @enderror"
                                            id="panel_kontrol_main_tank_2" name="panel_kontrol_main_tank_2"
                                            value="{{ old('panel_kontrol_main_tank_2') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->panel_kontrol_main_tank_2 }}"
                                            placeholder="">

                                        @error('panel_kontrol_main_tank_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>VAC</span>
                                    </div>
                                    <div class="col-10 col-lg-2 mt-1 d-flex justify-content-center align-items-center">
                                        <input type="text"
                                            class="form-control @error('panel_kontrol_main_tank_3') is-invalid @enderror"
                                            id="panel_kontrol_main_tank_3" name="panel_kontrol_main_tank_3"
                                            value="{{ old('panel_kontrol_main_tank_3') ?? $formPs3PanelPompaBbmLamaEnamBulananTahunan->panel_kontrol_main_tank_3 }}"
                                            placeholder="">

                                        @error('panel_kontrol_main_tank_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <span>VDC</span>
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
                                        placeholder="Deskripsi">{!! $formPs3PanelPompaBbmLamaEnamBulananTahunan->catatan ?? '' !!}</textarea>
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
