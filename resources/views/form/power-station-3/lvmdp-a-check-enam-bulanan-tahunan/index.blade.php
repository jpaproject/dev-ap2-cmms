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
    <form method="POST" action="{{ route('form.ps3.lvmdp-check-enam-bulanan-tahunan.update', $detailWorkOrderForm->id) }}"
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
                                <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>LVMDP A
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="show collapse" aria-labelledby="headingOne" data-parent="#accordionOne">
                        <div class="card-body">
                            @include('components.form-message')
                            <h5 class="text-center font-weight-bold"><u>1.PEMERIKSAAN TEGANGAN DAN ARUS INCOMING</u></h5>
                            <div class="row">
                                <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                    <h5>{{ $formPs3LvmdpACheckEnamBulananTahunans[0]->panel }}</h5>
                                </div>
                                <div class="col-12 col-lg-9">
                                    <div class="row">
                                        <label class="col-12 d-flex justify-content-center">ARUS (A)</label>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>L1</label>
                                                <input type="text"
                                                    class="form-control @error('arus_l1_a.' . 0) is-invalid @enderror"
                                                    id="arus_l1[]" name="arus_l1_a[]"
                                                    value="{{ old('arus_l1_a.' . 0) ?? $formPs3LvmdpACheckEnamBulananTahunans[0]->arus_l1 }}"
                                                    placeholder="L1">

                                                @error('arus_l1_a.' . 0)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>L2</label>
                                                <input type="text"
                                                    class="form-control @error('arus_l2_a.' . 0) is-invalid @enderror"
                                                    id="arus_l2_a[]" name="arus_l2_a[]"
                                                    value="{{ old('arus_l2_a.' . 0) ?? $formPs3LvmdpACheckEnamBulananTahunans[0]->arus_l2 }}"
                                                    placeholder="L2">

                                                @error('arus_l2_a.' . 0)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>L3</label>
                                                <input type="text"
                                                    class="form-control @error('arus_l3_a.' . 0) is-invalid @enderror"
                                                    id="arus_l3_a[]" name="arus_l3_a[]"
                                                    value="{{ old('arus_l3_a.' . 0) ?? $formPs3LvmdpACheckEnamBulananTahunans[0]->arus_l3 }}"
                                                    placeholder="L3">

                                                @error('arus_l3_a.' . 0)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>TEGANGAN (V)</label>
                                                <input type="text"
                                                    class="form-control @error('tegangan_a.' . 0) is-invalid @enderror"
                                                    id="tegangan_a[]" name="tegangan_a[]"
                                                    value="{{ old('tegangan_a.' . 0) ?? $formPs3LvmdpACheckEnamBulananTahunans[0]->tegangan }}"
                                                    placeholder="TEGANGAN">

                                                @error('tegangan_a.' . 0)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>HZ</label>
                                                <input type="text"
                                                    class="form-control @error('hz_a.' . 0) is-invalid @enderror"
                                                    id="hz_a[]" name="hz_a[]"
                                                    value="{{ old('hz_a.' . 0) ?? $formPs3LvmdpACheckEnamBulananTahunans[0]->hz }}"
                                                    placeholder="HZ">

                                                @error('hz_a.' . 0)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>KETERANGAN</label>
                                                <input type="text"
                                                    class="form-control @error('keterangan_a.' . 0) is-invalid @enderror"
                                                    id="keterangan_a[]" name="keterangan_a[]"
                                                    value="{{ old('keterangan_a.' . 0) ?? $formPs3LvmdpACheckEnamBulananTahunans[0]->keterangan }}"
                                                    placeholder="KETERANGAN">

                                                @error('keterangan_a.' . 0)
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
                            <h5 class="text-center font-weight-bold"><u>2.PEMERIKSAAN TEGANGAN DAN ARUS OUTGOING</u></h5>
                            @foreach ($lvmdpA as $key => $value)
                                @php
                                    $outGoingKeyA = $key + 1;
                                @endphp
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <h5>{{ $formPs3LvmdpACheckEnamBulananTahunans[$outGoingKeyA]->panel }}</h5>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">ARUS (A)</label>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>L1</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_l1_a.' . $outGoingKeyA) is-invalid @enderror"
                                                        id="arus_l1_a[]" name="arus_l1_a[]"
                                                        value="{{ old('arus_l1_a.' . $outGoingKeyA) ?? $formPs3LvmdpACheckEnamBulananTahunans[$outGoingKeyA]->arus_l1 }}"
                                                        placeholder="L1">

                                                    @error('arus_l1_a.' . $outGoingKeyA)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>L2</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_l2_a.' . $outGoingKeyA) is-invalid @enderror"
                                                        id="arus_l2_a[]" name="arus_l2_a[]"
                                                        value="{{ old('arus_l2_a.' . $outGoingKeyA) ?? $formPs3LvmdpACheckEnamBulananTahunans[$outGoingKeyA]->arus_l2 }}"
                                                        placeholder="L2">

                                                    @error('arus_l2_a.' . $outGoingKeyA)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>L3</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_l3_a.' . $outGoingKeyA) is-invalid @enderror"
                                                        id="arus_l3_a[]" name="arus_l3_a[]"
                                                        value="{{ old('arus_l3_a.' . $outGoingKeyA) ?? $formPs3LvmdpACheckEnamBulananTahunans[$outGoingKeyA]->arus_l3 }}"
                                                        placeholder="L3">

                                                    @error('arus_l3_a.' . $outGoingKeyA)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>TEGANGAN (V)</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_a.' . $outGoingKeyA) is-invalid @enderror"
                                                        id="tegangan_a[]" name="tegangan_a[]"
                                                        value="{{ old('tegangan_a.' . $outGoingKeyA) ?? $formPs3LvmdpACheckEnamBulananTahunans[$outGoingKeyA]->tegangan }}"
                                                        placeholder="TEGANGAN">

                                                    @error('tegangan_a.' . $outGoingKeyA)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>HZ</label>
                                                    <input type="text"
                                                        class="form-control @error('hz_a.' . $outGoingKeyA) is-invalid @enderror"
                                                        id="hz_a[]" name="hz_a[]"
                                                        value="{{ old('hz_a.' . $outGoingKeyA) ?? $formPs3LvmdpACheckEnamBulananTahunans[$outGoingKeyA]->hz }}"
                                                        placeholder="HZ">

                                                    @error('hz_a.' . $outGoingKeyA)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>KETERANGAN</label>
                                                    <input type="text"
                                                        class="form-control @error('keterangan_a.' . $outGoingKeyA) is-invalid @enderror"
                                                        id="keterangan_a[]" name="keterangan_a[]"
                                                        value="{{ old('keterangan_a.' . $outGoingKeyA) ?? $formPs3LvmdpACheckEnamBulananTahunans[$outGoingKeyA]->keterangan }}"
                                                        placeholder="KETERANGAN">

                                                    @error('keterangan_a.' . $outGoingKeyA)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="accordion" id="accordionTwo">
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"
                                onclick="showHide(this)">
                                <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>LVMDP B
                            </button>
                        </h2>
                    </div>

                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionTwo">
                        <div class="card-body">
                            <h5 class="text-center font-weight-bold"><u>1.PEMERIKSAAN TEGANGAN DAN ARUS INCOMING</u></h5>
                            <div class="row">
                                <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                    <h5>{{ $formPs3LvmdpBCheckEnamBulananTahunans[0]->panel }}</h5>
                                </div>
                                <div class="col-12 col-lg-9">
                                    <div class="row">
                                        <label class="col-12 d-flex justify-content-center">ARUS (A)</label>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>L1</label>
                                                <input type="text"
                                                    class="form-control @error('arus_l1_b.' . 0) is-invalid @enderror"
                                                    id="arus_l1[]" name="arus_l1_b[]"
                                                    value="{{ old('arus_l1_b.' . 0) ?? $formPs3LvmdpBCheckEnamBulananTahunans[0]->arus_l1 }}"
                                                    placeholder="L1">

                                                @error('arus_l1_b.' . 0)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>L2</label>
                                                <input type="text"
                                                    class="form-control @error('arus_l2_b.' . 0) is-invalid @enderror"
                                                    id="arus_l2_b[]" name="arus_l2_b[]"
                                                    value="{{ old('arus_l2_b.' . 0) ?? $formPs3LvmdpBCheckEnamBulananTahunans[0]->arus_l2 }}"
                                                    placeholder="L2">

                                                @error('arus_l2_b.' . 0)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>L3</label>
                                                <input type="text"
                                                    class="form-control @error('arus_l3_b.' . 0) is-invalid @enderror"
                                                    id="arus_l3_b[]" name="arus_l3_b[]"
                                                    value="{{ old('arus_l3_b.' . 0) ?? $formPs3LvmdpBCheckEnamBulananTahunans[0]->arus_l3 }}"
                                                    placeholder="L3">

                                                @error('arus_l3_b.' . 0)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>TEGANGAN (V)</label>
                                                <input type="text"
                                                    class="form-control @error('tegangan_b.' . 0) is-invalid @enderror"
                                                    id="tegangan_b[]" name="tegangan_b[]"
                                                    value="{{ old('tegangan_b.' . 0) ?? $formPs3LvmdpBCheckEnamBulananTahunans[0]->tegangan }}"
                                                    placeholder="TEGANGAN">

                                                @error('tegangan_b.' . 0)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>HZ</label>
                                                <input type="text"
                                                    class="form-control @error('hz_b.' . 0) is-invalid @enderror"
                                                    id="hz_b[]" name="hz_b[]"
                                                    value="{{ old('hz_b.' . 0) ?? $formPs3LvmdpBCheckEnamBulananTahunans[0]->hz }}"
                                                    placeholder="HZ">

                                                @error('hz_b.' . 0)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>KETERANGAN</label>
                                                <input type="text"
                                                    class="form-control @error('keterangan_b.' . 0) is-invalid @enderror"
                                                    id="keterangan_b[]" name="keterangan_b[]"
                                                    value="{{ old('keterangan_b.' . 0) ?? $formPs3LvmdpBCheckEnamBulananTahunans[0]->keterangan }}"
                                                    placeholder="KETERANGAN">

                                                @error('keterangan_b.' . 0)
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
                            @include('components.form-message')
                            <h5 class="text-center font-weight-bold"><u>2.PEMERIKSAAN TEGANGAN DAN ARUS OUTGOING</u></h5>
                            @foreach ($lvmdpB as $key => $value)
                                @php
                                    $outGoingKeyB = $key + 1;
                                @endphp
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <h5>{{ $formPs3LvmdpBCheckEnamBulananTahunans[$outGoingKeyB]->panel }}</h5>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">ARUS (A)</label>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>L1</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_l1_b.' . $outGoingKeyB) is-invalid @enderror"
                                                        id="arus_l1_b[]" name="arus_l1_b[]"
                                                        value="{{ old('arus_l1_b.' . $outGoingKeyB) ?? $formPs3LvmdpBCheckEnamBulananTahunans[$outGoingKeyB]->arus_l1 }}"
                                                        placeholder="L1">

                                                    @error('arus_l1_b.' . $outGoingKeyB)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>L2</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_l2_b.' . $outGoingKeyB) is-invalid @enderror"
                                                        id="arus_l2_b[]" name="arus_l2_b[]"
                                                        value="{{ old('arus_l2_b.' . $outGoingKeyB) ?? $formPs3LvmdpBCheckEnamBulananTahunans[$outGoingKeyB]->arus_l2 }}"
                                                        placeholder="L2">

                                                    @error('arus_l2_b.' . $outGoingKeyB)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>L3</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_l3_b.' . $outGoingKeyB) is-invalid @enderror"
                                                        id="arus_l3_b[]" name="arus_l3_b[]"
                                                        value="{{ old('arus_l3_b.' . $outGoingKeyB) ?? $formPs3LvmdpBCheckEnamBulananTahunans[$outGoingKeyB]->arus_l3 }}"
                                                        placeholder="L3">

                                                    @error('arus_l3_b.' . $outGoingKeyB)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>TEGANGAN (V)</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_b.' . $outGoingKeyB) is-invalid @enderror"
                                                        id="tegangan_b[]" name="tegangan_b[]"
                                                        value="{{ old('tegangan_b.' . $outGoingKeyB) ?? $formPs3LvmdpBCheckEnamBulananTahunans[$outGoingKeyB]->tegangan }}"
                                                        placeholder="TEGANGAN">

                                                    @error('tegangan_b.' . $outGoingKeyB)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>HZ</label>
                                                    <input type="text"
                                                        class="form-control @error('hz_b.' . $outGoingKeyB) is-invalid @enderror"
                                                        id="hz_b[]" name="hz_b[]"
                                                        value="{{ old('hz_b.' . $outGoingKeyB) ?? $formPs3LvmdpBCheckEnamBulananTahunans[$outGoingKeyB]->hz }}"
                                                        placeholder="HZ">

                                                    @error('hz_b.' . $outGoingKeyB)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>KETERANGAN</label>
                                                    <input type="text"
                                                        class="form-control @error('keterangan_b.' . $outGoingKeyB) is-invalid @enderror"
                                                        id="keterangan_b[]" name="keterangan_b[]"
                                                        value="{{ old('keterangan_b.' . $outGoingKeyB) ?? $formPs3LvmdpBCheckEnamBulananTahunans[$outGoingKeyB]->keterangan }}"
                                                        placeholder="KETERANGAN">

                                                    @error('keterangan_b.' . $outGoingKeyB)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
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
                                        placeholder="Deskripsi">{!! $formPs3GroundTankBaruDuaMingguan->catatan ?? '' !!}</textarea>
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
