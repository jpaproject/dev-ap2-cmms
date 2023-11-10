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
    <form method="POST" action="{{ route('form.ps3.epcc-dua-mingguan.update', $detailWorkOrderForm->id) }}"
        enctype="multipart/form-data" id="form">
        @method('patch')
        @csrf
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <span>TEGANGAN BATTERY EPCC</span>
                                        </div>
                                        <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('tegangan_battery_epcc') is-invalid @enderror"
                                                id="tegangan_battery_epcc" name="tegangan_battery_epcc"
                                                value="{{ old('tegangan_battery_epcc') ?? $formPs3EpccDuaMingguan->tegangan_battery_epcc }}"
                                                placeholder="">

                                            @error('tegangan_battery_epcc')
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
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <span>TEGANGAN HMI (MAIN TANK LAMA)</span>
                                        </div>
                                        <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('tegangan_hmi') is-invalid @enderror"
                                                id="tegangan_hmi" name="tegangan_hmi"
                                                value="{{ old('tegangan_hmi') ?? $formPs3EpccDuaMingguan->tegangan_hmi }}"
                                                placeholder="">

                                            @error('tegangan_hmi')
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
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <span>TEGANGAN PANEL POMPA BBM (MAIN TANK LAMA)</span>
                                        </div>
                                        <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('tegangan_panel_pompa_bbm') is-invalid @enderror"
                                                id="tegangan_panel_pompa_bbm" name="tegangan_panel_pompa_bbm"
                                                value="{{ old('tegangan_panel_pompa_bbm') ?? $formPs3EpccDuaMingguan->tegangan_panel_pompa_bbm }}"
                                                placeholder="">

                                            @error('tegangan_panel_pompa_bbm')
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
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <span>TEGANGAN PANEL MONITORING (MAIN TANK LAMA)</span>
                                        </div>
                                        <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('tegangan_panel_monitoring') is-invalid @enderror"
                                                id="tegangan_panel_monitoring" name="tegangan_panel_monitoring"
                                                value="{{ old('tegangan_panel_monitoring') ?? $formPs3EpccDuaMingguan->tegangan_panel_monitoring }}"
                                                placeholder="">

                                            @error('tegangan_panel_monitoring')
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
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <span>TEGANGAN PANEL KONTROL POMPA (MAIN TANK BARU)</span>
                                        </div>
                                        <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('tegangan_panel_kontrol_pompa_main_tank_baru') is-invalid @enderror"
                                                id="tegangan_panel_kontrol_pompa_main_tank_baru"
                                                name="tegangan_panel_kontrol_pompa_main_tank_baru"
                                                value="{{ old('tegangan_panel_kontrol_pompa_main_tank_baru') ?? $formPs3EpccDuaMingguan->tegangan_panel_kontrol_pompa_main_tank_baru }}"
                                                placeholder="">

                                            @error('tegangan_panel_kontrol_pompa_main_tank_baru')
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
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <span>TEGANGAN PANEL KONTROL POMPA (RUMAH POMPA)</span>
                                        </div>
                                        <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('tegangan_panel_kontrol_rumah_pompa') is-invalid @enderror"
                                                id="tegangan_panel_kontrol_rumah_pompa"
                                                name="tegangan_panel_kontrol_rumah_pompa"
                                                value="{{ old('tegangan_panel_kontrol_rumah_pompa') ?? $formPs3EpccDuaMingguan->tegangan_panel_kontrol_rumah_pompa }}"
                                                placeholder="">

                                            @error('tegangan_panel_kontrol_rumah_pompa')
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
                                                placeholder="Deskripsi">{!! $formPs3EpccDuaMingguan->catatan ??
                                                    'Visual Check Kondisi Panel , Peralatan dan Segala Aspek dalam Kondisi Normal Selesai Perawatan , Peralatan Kembali Ke Posisi Auto ' !!}</textarea>
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

        </section>
    </form>
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
