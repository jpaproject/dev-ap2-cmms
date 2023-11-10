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
    <form method="POST" action="{{ route('form.ps3.crane-genset-tiga-bulanan.update', $detailWorkOrderForm->id) }}"
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
                                <div class="col-12 d-flex justify-content-center align-items-center">
                                    <h5>PEMERIKSAAN ARUS MOTOR CRANE</h5>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <span>CRANE (A)</span>
                                        </div>
                                        <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('arus_motor_crane_a') is-invalid @enderror" id="arus_motor_crane_a"
                                                name="arus_motor_crane_a"
                                                value="{{ old('arus_motor_crane_a') ?? $formPs3CraneGensetTigaBulanan->arus_motor_crane_a }}"
                                                placeholder="">

                                            @error('arus_motor_crane_a')
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
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <span>CRANE (B)</span>
                                        </div>
                                        <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('arus_motor_crane_b') is-invalid @enderror" id="arus_motor_crane_b"
                                                name="arus_motor_crane_b"
                                                value="{{ old('arus_motor_crane_b') ?? $formPs3CraneGensetTigaBulanan->arus_motor_crane_b }}"
                                                placeholder="">

                                            @error('arus_motor_crane_b')
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
                                <hr class="bg-primary">
                                <div class="col-12 d-flex justify-content-center align-items-center">
                                    <h5>TEGANGAN INPUT PANEL CRANE</h5>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <span>CRANE (A)</span>
                                        </div>
                                        <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('panel_crane_a') is-invalid @enderror" id="panel_crane_a"
                                                name="panel_crane_a"
                                                value="{{ old('panel_crane_a') ?? $formPs3CraneGensetTigaBulanan->panel_crane_a }}"
                                                placeholder="">

                                            @error('panel_crane_a')
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
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <span>CRANE (B)</span>
                                        </div>
                                        <div class="col-10 col-lg-7 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('panel_crane_b') is-invalid @enderror" id="panel_crane_b"
                                                name="panel_crane_b"
                                                value="{{ old('panel_crane_b') ?? $formPs3CraneGensetTigaBulanan->panel_crane_b }}"
                                                placeholder="">

                                            @error('panel_crane_b')
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
                                                placeholder="Deskripsi">{!! $formPs3CraneGensetTigaBulanan->catatan ?? 'Peralatan dan Segala Aspek dalam Kondisi Normal.' !!}</textarea>
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
