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
    <form method="POST" action="{{ route('form.ps3.trafo-genset-check-enam-bulanan-tahunan.update', $detailWorkOrderForm->id) }}"
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
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <h5>PEMERIKSAAN TAHANAN BELITAN (AVOMETER)</h5>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            {{-- <label class="col-12 d-flex justify-content-center">ARUS (A)</label> --}}
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>N1</label>
                                                    <input type="text"
                                                        class="form-control @error('n1') is-invalid @enderror"
                                                        id="n1" name="n1"
                                                        value="{{ old('n1') ?? $formPs3TrafoGensetCheckEnamBulananTahunan->n1 }}"
                                                        placeholder="">
    
                                                    @error('n1')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>N2</label>
                                                    <input type="text"
                                                        class="form-control @error('n2') is-invalid @enderror"
                                                        id="n2" name="n2"
                                                        value="{{ old('n2') ?? $formPs3TrafoGensetCheckEnamBulananTahunan->n2 }}"
                                                        placeholder="">
    
                                                    @error('n2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>N3</label>
                                                    <input type="text"
                                                        class="form-control @error('n3') is-invalid @enderror"
                                                        id="n3" name="n3"
                                                        value="{{ old('n3') ?? $formPs3TrafoGensetCheckEnamBulananTahunan->n3 }}"
                                                        placeholder="">
    
                                                    @error('n3')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <hr class="border-primary">
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <h5>PEMERIKSAAN TAHANAN ISOLASI</h5>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">HV - G ( 5000 V )</label>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>1 MINUTE</label>
                                                    <input type="text"
                                                        class="form-control @error('hv_g_1m') is-invalid @enderror"
                                                        id="hv_g_1m" name="hv_g_1m"
                                                        value="{{ old('hv_g_1m') ?? $formPs3TrafoGensetCheckEnamBulananTahunan->hv_g_1m }}"
                                                        placeholder="">
    
                                                    @error('hv_g_1m')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>10 MINUTE</label>
                                                    <input type="text"
                                                        class="form-control @error('hv_g_10m') is-invalid @enderror"
                                                        id="hv_g_10m" name="hv_g_10m"
                                                        value="{{ old('hv_g_10m') ?? $formPs3TrafoGensetCheckEnamBulananTahunan->hv_g_10m }}"
                                                        placeholder="">
    
                                                    @error('hv_g_10m')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">LV - G ( 1000 V )</label>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>1 MINUTE</label>
                                                    <input type="text"
                                                        class="form-control @error('lv_g_1m') is-invalid @enderror"
                                                        id="lv_g_1m" name="lv_g_1m"
                                                        value="{{ old('lv_g_1m') ?? $formPs3TrafoGensetCheckEnamBulananTahunan->lv_g_1m }}"
                                                        placeholder="">
    
                                                    @error('lv_g_1m')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>10 MINUTE</label>
                                                    <input type="text"
                                                        class="form-control @error('lv_g_10m') is-invalid @enderror"
                                                        id="lv_g_10m" name="lv_g_10m"
                                                        value="{{ old('lv_g_10m') ?? $formPs3TrafoGensetCheckEnamBulananTahunan->lv_g_10m }}"
                                                        placeholder="">
    
                                                    @error('lv_g_10m')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">HV - LV ( 5000 V )</label>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>1 MINUTE</label>
                                                    <input type="text"
                                                        class="form-control @error('hv_lv_1m') is-invalid @enderror"
                                                        id="hv_lv_1m" name="hv_lv_1m"
                                                        value="{{ old('hv_lv_1m') ?? $formPs3TrafoGensetCheckEnamBulananTahunan->hv_lv_1m }}"
                                                        placeholder="">
    
                                                    @error('hv_lv_1m')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>10 MINUTE</label>
                                                    <input type="text"
                                                        class="form-control @error('hv_lv_10m') is-invalid @enderror"
                                                        id="hv_lv_10m" name="hv_lv_10m"
                                                        value="{{ old('hv_lv_10m') ?? $formPs3TrafoGensetCheckEnamBulananTahunan->hv_lv_10m }}"
                                                        placeholder="">
    
                                                    @error('hv_lv_10m')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="border-primary">
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <h5>PENGUKURAN TAHANAN ISOLASI KABEL MV </h5>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">L1 - G</label>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>1 MINUTE</label>
                                                    <input type="text"
                                                        class="form-control @error('l1_g_1m') is-invalid @enderror"
                                                        id="l1_g_1m" name="l1_g_1m"
                                                        value="{{ old('l1_g_1m') ?? $formPs3TrafoGensetCheckEnamBulananTahunan->l1_g_1m }}"
                                                        placeholder="">
    
                                                    @error('l1_g_1m')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">L2 - G</label>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>1 MINUTE</label>
                                                    <input type="text"
                                                        class="form-control @error('l2_g_1m') is-invalid @enderror"
                                                        id="l2_g_1m" name="l2_g_1m"
                                                        value="{{ old('l2_g_1m') ?? $formPs3TrafoGensetCheckEnamBulananTahunan->l2_g_1m }}"
                                                        placeholder="">
    
                                                    @error('l2_g_1m')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">L3 - G</label>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>1 MINUTE</label>
                                                    <input type="text"
                                                        class="form-control @error('l3_g_1m') is-invalid @enderror"
                                                        id="l3_g_1m" name="l3_g_1m"
                                                        value="{{ old('l3_g_1m') ?? $formPs3TrafoGensetCheckEnamBulananTahunan->l3_g_1m }}"
                                                        placeholder="">
    
                                                    @error('l3_g_1m')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">L1-L2</label>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>1 MINUTE</label>
                                                    <input type="text"
                                                        class="form-control @error('l1_l2_1m') is-invalid @enderror"
                                                        id="l1_l2_1m" name="l1_l2_1m"
                                                        value="{{ old('l1_l2_1m') ?? $formPs3TrafoGensetCheckEnamBulananTahunan->l1_l2_1m }}"
                                                        placeholder="">
    
                                                    @error('l1_l2_1m')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">L2-L3</label>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>1 MINUTE</label>
                                                    <input type="text"
                                                        class="form-control @error('l2_l3_1m') is-invalid @enderror"
                                                        id="l2_l3_1m" name="l2_l3_1m"
                                                        value="{{ old('l2_l3_1m') ?? $formPs3TrafoGensetCheckEnamBulananTahunan->l2_l3_1m }}"
                                                        placeholder="">
    
                                                    @error('l2_l3_1m')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">L1-L3</label>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>1 MINUTE</label>
                                                    <input type="text"
                                                        class="form-control @error('l1_l3_1m') is-invalid @enderror"
                                                        id="l1_l3_1m" name="l1_l3_1m"
                                                        value="{{ old('l1_l3_1m') ?? $formPs3TrafoGensetCheckEnamBulananTahunan->l1_l3_1m }}"
                                                        placeholder="">
    
                                                    @error('l1_l3_1m')
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
                                                placeholder="Deskripsi">{!! $formPs3TrafoGensetCheckEnamBulananTahunan->catatan ??
                                                    'Visual Check Kondisi Panel, Peralatan dan Segala Aspek dalam Kondisi Normal.'
                                                    ."\n" .'Selesai Perawatan, Peralatan Normal Operasi.' !!}</textarea>
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
