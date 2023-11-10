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
    <form method="POST" action="{{ route('form.ps3.form-trafo-genset-tiga-bulanan.update', $detailWorkOrderForm->id) }}"
        enctype="multipart/form-data" id="form">
        @method('patch')
        @csrf
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                SUHU BELITAN GENSET
                            </div>
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-2 d-flex justify-content-center align-items-center">
                                            <span>PHASE A</span>
                                        </div>
                                        <div class="col-12 col-lg-10 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('phase_a') is-invalid @enderror" id="phase_a"
                                                name="phase_a"
                                                value="{{ old('phase_a') ?? $formPs3TrafoGensetTigaBulanan->phase_a }}"
                                                placeholder="Enter Phase A">

                                            @error('phase_a')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-2 d-flex justify-content-center align-items-center">
                                            <span>PHASE B</span>
                                        </div>
                                        <div class="col-12 col-lg-10 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('phase_b') is-invalid @enderror" id="phase_b"
                                                name="phase_b"
                                                value="{{ old('phase_b') ?? $formPs3TrafoGensetTigaBulanan->phase_b }}"
                                                placeholder="Enter Phase B">

                                            @error('phase_b')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-2 d-flex justify-content-center align-items-center">
                                            <span>PHASE C</span>
                                        </div>
                                        <div class="col-12 col-lg-10 d-flex justify-content-center align-items-center">
                                            <input type="text"
                                                class="form-control @error('phase_c') is-invalid @enderror" id="phase_c"
                                                name="phase_c"
                                                value="{{ old('phase_c') ?? $formPs3TrafoGensetTigaBulanan->phase_c }}"
                                                placeholder="Enter Phase C">

                                            @error('phase_c')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label
                                        class="col-12 col-lg-3 control-label d-flex justify-content-center align-items-center"
                                        for="catatan">Catatan</label>
                                    <div class="col-12 col-lg-9">
                                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                                            placeholder="Deskripsi">{!! $formPs3TrafoGensetTigaBulanan->catatan ??
                                                'Visual Check Kondisi Panel, Peralatan dan Segala Aspek dalam Kondisi Normal.' .
                                                    "\n" .
                                                    'Selesai Perawatan, Peralatan Kembali Ke Posisi Auto.' !!}</textarea>
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
