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

        .select2-container--default .select2-selection--single {
            height: 40px;
            /* adjust the height value as needed */
            line-height: 40px;
            /* ensure the text is vertically centered */
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
        }
    </style>
@endsection

@section('content')
    <section class="content">
        <form method="POST" action="{{ route('form.ps2.data-parameter-dua-mingguan-ruang-tenaga.update', $detailWorkOrderForm->id) }}" enctype="multipart/form-data" id="form">
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
                                    ER 1A BUS A
                                    <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionOne">
                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($formPs2RuangTenagaDuaMingguanER1A as $key => $value)
                                    @php
                                        $count = $key + 1;
                                    @endphp
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>{{$value->nama_peralatan}}</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">TEGANGAN</label>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_r_er1a.' . $key) is-invalid @enderror"
                                                        id="tegangan_r_er1a[]" name="tegangan_r_er1a[]" value="{{ old('tegangan_r.' . $key) ?? $value->tegangan_r }}"
                                                        placeholder="Tegangan R">

                                                    @error('tegangan_r_er1a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_s_er1a.' . $key) is-invalid @enderror"
                                                        id="tegangan_s_er1a[]" name="tegangan_s_er1a[]" value="{{ old('tegangan_s.' . $key) ?? $value->tegangan_s }}"
                                                        placeholder="Tegangan S">

                                                    @error('tegangan_s_er1a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_t_er1a.' . $key) is-invalid @enderror"
                                                        id="tegangan_t_er1a[]" name="tegangan_t_er1a[]" value="{{ old('tegangan_t.' . $key) ?? $value->tegangan_t }}"
                                                        placeholder="Tegangan T">

                                                    @error('tegangan_t_er1a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">ARUS</label>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_r_er1a.' . $key) is-invalid @enderror"
                                                        id="arus_r_er1a[]" name="arus_r_er1a[]" value="{{ old('arus_r.' . $key) ?? $value->arus_r }}"
                                                        placeholder="Arus R">

                                                    @error('arus_r_er1a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_s_er1a.' . $key) is-invalid @enderror"
                                                        id="arus_s_er1a[]" name="arus_s_er1a[]" value="{{ old('arus_s.' . $key) ?? $value->arus_s }}"
                                                        placeholder="Arus S">

                                                    @error('arus_s_er1a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_t_er1a.' . $key) is-invalid @enderror"
                                                        id="arus_t_er1a[]" name="arus_t_er1a[]" value="{{ old('arus_t.' . $key) ?? $value->arus_t }}"
                                                        placeholder="Arus T">

                                                    @error('arus_t_er1a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>DAYA</label>
                                                    <input type="text"
                                                        class="form-control @error('daya_er1a.' . $key) is-invalid @enderror"
                                                        id="daya_er1a[]" name="daya_er1a[]" value="{{ old('daya.' . $key) ?? $value->daya }}"
                                                        placeholder="Daya">

                                                    @error('daya_er1a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>FREK</label>
                                                    <input type="text"
                                                        class="form-control @error('frekuensi_er1a.' . $key) is-invalid @enderror"
                                                        id="frekuensi_er1a[]" name="frekuensi_er1a[]" value="{{ old('frekuensi.' . $key) ?? $value->frekuensi}}"
                                                        placeholder="Frekuensi">

                                                    @error('frekuensi_er1a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>COS PHI</label>
                                                    <input type="text"
                                                        class="form-control @error('cos_phi_er1a.' . $key) is-invalid @enderror"
                                                        id="cos_phi_er1a[]" name="cos_phi_er1a[]" value="{{ old('cos_phi.' . $key) ?? $value->cos_phi }}"
                                                        placeholder="Cos Phi">

                                                    @error('cos_phi_er1a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>STATUS</label>
                                                    @if ($key == 1 )

                                                    <select class="form-control  @error('status_er1a.' . $key) is-invalid @enderror"
                                                        name="status_er1a[]">
                                                        <option value="auto" disabled selected>Choose Selection</option>
                                                        <option value="DS"
                                                            {{ old('status.' . $key) ?? $value->status == 'DS' ? 'selected' : '' }}>
                                                            DS</option>
                                                        <option value="CLOSE"
                                                            {{ old('status.' . $key) ?? $value->status == 'CLOSE' ? 'selected' : '' }}>
                                                            CLOSE</option>
                                                    </select>
                                                    @else
                                                    <select class="form-control  @error('status_er1a.' . $key) is-invalid @enderror"
                                                        name="status_er1a[]">
                                                        <option value="auto" disabled selected>Choose Selection</option>
                                                        <option value="REMOTE"
                                                            {{ old('status.' . $key) ?? $value->status == 'REMOTE' ? 'selected' : '' }}>
                                                            REMOTE</option>
                                                        <option value="OPEN"
                                                            {{ old('status.' . $key) ?? $value->status == 'OPEN' ? 'selected' : '' }}>
                                                            OPEN</option>
                                                    </select>
                                                    @endif

                                                    @error('status_er1a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>KETERANGAN</label>
                                                    <select
                                                        class="form-control select2 @error('keterangan_er1a.' . $key) is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name=keterangan_er1a[]>
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value="NORMAL"
                                                            {{ old('keterangan.' . $key) ?? $value->keterangan == 'NORMAL' ? 'selected' : '' }}>
                                                            Normal</option>
                                                        @if ($value->keterangan != 'NORMAL' && $value->keterangan != null)
                                                            <option
                                                                value="{{ $value->keterangan }}"
                                                                selected>
                                                                {{ $value->keterangan }}
                                                            </option>
                                                        @endif
                                                    </select>
                                                    @error('keterangan_er1a.' . $key)
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
                                    ER 1B BUS B
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionTwo">
                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($formPs2RuangTenagaDuaMingguanER1B as $key => $value)
                                    @php
                                        $count = $key + 1;
                                    @endphp
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>{{$value->nama_peralatan}}</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">TEGANGAN</label>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_r_er1b.' . $key) is-invalid @enderror"
                                                        id="tegangan_r_er1b[]" name="tegangan_r_er1b[]" value="{{ old('tegangan_r.' . $key) ?? $value->tegangan_r }}"
                                                        placeholder="Tegangan R">

                                                    @error('tegangan_r_er1b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_s_er1b.' . $key) is-invalid @enderror"
                                                        id="tegangan_s_er1b[]" name="tegangan_s_er1b[]" value="{{ old('tegangan_s.' . $key) ?? $value->tegangan_s }}"
                                                        placeholder="Tegangan S">

                                                    @error('tegangan_s_er1b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_t_er1b.' . $key) is-invalid @enderror"
                                                        id="tegangan_t_er1b[]" name="tegangan_t_er1b[]" value="{{ old('tegangan_t.' . $key) ?? $value->tegangan_t }}"
                                                        placeholder="Tegangan T">

                                                    @error('tegangan_t_er1b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">ARUS</label>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_r_er1b.' . $key) is-invalid @enderror"
                                                        id="arus_r_er1b[]" name="arus_r_er1b[]" value="{{ old('arus_r.' . $key) ?? $value->arus_r }}"
                                                        placeholder="Arus R">

                                                    @error('arus_r_er1b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_s_er1b.' . $key) is-invalid @enderror"
                                                        id="arus_s_er1b[]" name="arus_s_er1b[]" value="{{ old('arus_s.' . $key) ?? $value->arus_s }}"
                                                        placeholder="Arus S">

                                                    @error('arus_s_er1b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_t_er1b.' . $key) is-invalid @enderror"
                                                        id="arus_t_er1b[]" name="arus_t_er1b[]" value="{{ old('arus_t.' . $key) ?? $value->arus_t }}"
                                                        placeholder="Arus T">

                                                    @error('arus_t_er1b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>DAYA</label>
                                                    <input type="text"
                                                        class="form-control @error('daya_er1b.' . $key) is-invalid @enderror"
                                                        id="daya_er1b[]" name="daya_er1b[]" value="{{ old('daya.' . $key) ?? $value->daya }}"
                                                        placeholder="Daya">

                                                    @error('daya_er1b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>FREK</label>
                                                    <input type="text"
                                                        class="form-control @error('frekuensi_er1b.' . $key) is-invalid @enderror"
                                                        id="frekuensi_er1b[]" name="frekuensi_er1b[]" value="{{ old('frekuensi.' . $key) ?? $value->frekuensi}}"
                                                        placeholder="Frekuensi">

                                                    @error('frekuensi_er1b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>COS PHI</label>
                                                    <input type="text"
                                                        class="form-control @error('cos_phi_er1b.' . $key) is-invalid @enderror"
                                                        id="cos_phi_er1b[]" name="cos_phi_er1b[]" value="{{ old('cos_phi.' . $key) ?? $value->cos_phi }}"
                                                        placeholder="Cos Phi">

                                                    @error('cos_phi_er1b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>STATUS</label>
                                                    @if ($key == 1 )

                                                    <select class="form-control  @error('status_er1b.' . $key) is-invalid @enderror"
                                                        name="status_er1b[]">
                                                        <option value="auto" disabled selected>Choose Selection</option>
                                                        <option value="DS"
                                                            {{ old('status.' . $key) ?? $value->status == 'DS' ? 'selected' : '' }}>
                                                            DS</option>
                                                        <option value="CLOSE"
                                                            {{ old('status.' . $key) ?? $value->status == 'CLOSE' ? 'selected' : '' }}>
                                                            CLOSE</option>
                                                    </select>
                                                    @else
                                                    <select class="form-control  @error('status_er1b.' . $key) is-invalid @enderror"
                                                        name="status_er1b[]">
                                                        <option value="auto" disabled selected>Choose Selection</option>
                                                        <option value="REMOTE"
                                                            {{ old('status.' . $key) ?? $value->status == 'REMOTE' ? 'selected' : '' }}>
                                                            REMOTE</option>
                                                        <option value="CLOSE"
                                                            {{ old('status.' . $key) ?? $value->status == 'CLOSE' ? 'selected' : '' }}>
                                                            CLOSE</option>
                                                    </select>
                                                    @endif
                                                    @error('status_er1b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>KETERANGAN</label>
                                                    <select
                                                        class="form-control select2 @error('keterangan_er1b.' . $key) is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name=keterangan_er1b[]>
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value="NORMAL"
                                                            {{ old('keterangan.' . $key) ?? $value->keterangan == 'NORMAL' ? 'selected' : '' }}>
                                                            Normal</option>
                                                        @if ($value->keterangan != 'NORMAL' && $value->keterangan != null)
                                                            <option
                                                                value="{{ $value->keterangan }}"
                                                                selected>
                                                                {{ $value->keterangan }}
                                                            </option>
                                                        @endif
                                                    </select>
                                                    @error('keterangan_er1b.' . $key)
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
                                 @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="accordion" id="accordionThree">
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"
                                    onclick="showHide(this)">
                                    ER 2A
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordionThree">
                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($formPs2RuangTenagaDuaMingguanER2A as $key => $value)
                                    @php
                                        $count = $key + 1;
                                    @endphp
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>{{$value->nama_peralatan}}</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">TEGANGAN</label>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_r_er2a.' . $key) is-invalid @enderror"
                                                        id="tegangan_r_er2a[]" name="tegangan_r_er2a[]" value="{{ old('tegangan_r.' . $key) ?? $value->tegangan_r }}"
                                                        placeholder="Tegangan R">

                                                    @error('tegangan_r_er2a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_s_er2a.' . $key) is-invalid @enderror"
                                                        id="tegangan_s_er2a[]" name="tegangan_s_er2a[]" value="{{ old('tegangan_s.' . $key) ?? $value->tegangan_s }}"
                                                        placeholder="Tegangan S">

                                                    @error('tegangan_s_er2a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_t_er2a.' . $key) is-invalid @enderror"
                                                        id="tegangan_t_er2a[]" name="tegangan_t_er2a[]" value="{{ old('tegangan_t.' . $key) ?? $value->tegangan_t }}"
                                                        placeholder="Tegangan T">

                                                    @error('tegangan_t_er2a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">ARUS</label>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_r_er2a.' . $key) is-invalid @enderror"
                                                        id="arus_r_er2a[]" name="arus_r_er2a[]" value="{{ old('arus_r.' . $key) ?? $value->arus_r }}"
                                                        placeholder="Arus R">

                                                    @error('arus_r_er2a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_s_er2a.' . $key) is-invalid @enderror"
                                                        id="arus_s_er2a[]" name="arus_s_er2a[]" value="{{ old('arus_s.' . $key) ?? $value->arus_s }}"
                                                        placeholder="Arus S">

                                                    @error('arus_s_er2a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_t_er2a.' . $key) is-invalid @enderror"
                                                        id="arus_t_er2a[]" name="arus_t_er2a[]" value="{{ old('arus_t.' . $key) ?? $value->arus_t }}"
                                                        placeholder="Arus T">

                                                    @error('arus_t_er2a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>DAYA</label>
                                                    <input type="text"
                                                        class="form-control @error('daya_er2a.' . $key) is-invalid @enderror"
                                                        id="daya_er2a[]" name="daya_er2a[]" value="{{ old('daya.' . $key) ?? $value->daya }}"
                                                        placeholder="Daya">

                                                    @error('daya_er2a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>FREK</label>
                                                    <input type="text"
                                                        class="form-control @error('frekuensi_er2a.' . $key) is-invalid @enderror"
                                                        id="frekuensi_er2a[]" name="frekuensi_er2a[]" value="{{ old('frekuensi.' . $key) ?? $value->frekuensi}}"
                                                        placeholder="Frekuensi">

                                                    @error('frekuensi_er2a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>COS PHI</label>
                                                    <input type="text"
                                                        class="form-control @error('cos_phi_er2a.' . $key) is-invalid @enderror"
                                                        id="cos_phi_er2a[]" name="cos_phi_er2a[]" value="{{ old('cos_phi.' . $key) ?? $value->cos_phi }}"
                                                        placeholder="Cos Phi">

                                                    @error('cos_phi_er2a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>STATUS</label>
                                                    {{-- <select class="form-control  @error('status_er2a.' . $key) is-invalid @enderror"
                                                        name="status_er2a[]">
                                                        <option value="auto" disabled selected>Choose Selection</option>
                                                        <option value="REMOTE"
                                                            {{ old('status.' . $key) ?? $value->status == 'REMOTE' ? 'selected' : '' }}>
                                                            REMOTE</option>
                                                        <option value="OPEN"
                                                            {{ old('status.' . $key) ?? $value->status == 'OPEN' ? 'selected' : '' }}>
                                                            OPEN</option>
                                                    </select> --}}
                                                    @if ($key == 13 || $key == 14)

                                                    <select class="form-control  @error('status_er2a.' . $key) is-invalid @enderror"
                                                        name="status_er2a[]">
                                                        <option value="auto" disabled selected>Choose Selection</option>
                                                        <option value="DS"
                                                            {{ old('status.' . $key) ?? $value->status == 'DS' ? 'selected' : '' }}>
                                                            DS</option>
                                                        <option value="CLOSE"
                                                            {{ old('status.' . $key) ?? $value->status == 'CLOSE' ? 'selected' : '' }}>
                                                            CLOSE</option>
                                                    </select>
                                                    @elseif ($key == 0)
                                                    <select class="form-control  @error('status_er2a.' . $key) is-invalid @enderror"
                                                        name="status_er2a[]">
                                                        <option value="auto" disabled selected>Choose Selection</option>
                                                        <option value="LOCAL"
                                                            {{ old('status.' . $key) ?? $value->status == 'LOCAL' ? 'selected' : '' }}>
                                                            LOCAL</option>
                                                        <option value="OPEN"
                                                            {{ old('status.' . $key) ?? $value->status == 'OPEN' ? 'selected' : '' }}>
                                                            OPEN</option>
                                                    </select>
                                                    @elseif ($key == 15)
                                                    <select class="form-control  @error('status_er2a.' . $key) is-invalid @enderror"
                                                        name="status_er2a[]">
                                                        <option value="auto" disabled selected>Choose Selection</option>
                                                        <option value="LOCAL"
                                                            {{ old('status.' . $key) ?? $value->status == 'LOCAL' ? 'selected' : '' }}>
                                                            LOCAL</option>
                                                        <option value="CLOSE"
                                                            {{ old('status.' . $key) ?? $value->status == 'CLOSE' ? 'selected' : '' }}>
                                                            CLOSE</option>
                                                    </select>
                                                    @elseif ($key == 3 || $key == 4)
                                                    <select class="form-control  @error('status_er2a.' . $key) is-invalid @enderror"
                                                        name="status_er2a[]">
                                                        <option value="auto" disabled selected>Choose Selection</option>
                                                        <option value="REMOTE"
                                                            {{ old('status.' . $key) ?? $value->status == 'REMOTE' ? 'selected' : '' }}>
                                                            REMOTE</option>
                                                        <option value="OPEN"
                                                            {{ old('status.' . $key) ?? $value->status == 'OPEN' ? 'selected' : '' }}>
                                                            OPEN</option>
                                                    </select>
                                                    @else
                                                    <select class="form-control  @error('status_er2a.' . $key) is-invalid @enderror"
                                                        name="status_er2a[]">
                                                        <option value="auto" disabled selected>Choose Selection</option>
                                                        <option value="REMOTE"
                                                            {{ old('status.' . $key) ?? $value->status == 'REMOTE' ? 'selected' : '' }}>
                                                            REMOTE</option>
                                                        <option value="CLOSE"
                                                            {{ old('status.' . $key) ?? $value->status == 'CLOSE' ? 'selected' : '' }}>
                                                            CLOSE</option>
                                                    </select>
                                                    @endif
                                                    @error('status_er2a.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>KETERANGAN</label>
                                                    <select
                                                        class="form-control select2 @error('keterangan_er2a.' . $key) is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name=keterangan_er2a[]>
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value="NORMAL"
                                                            {{ old('keterangan.' . $key) ?? $value->keterangan == 'NORMAL' ? 'selected' : '' }}>
                                                            Normal</option>
                                                        @if ($value->keterangan != 'NORMAL' && $value->keterangan != null)
                                                            <option
                                                                value="{{ $value->keterangan }}"
                                                                selected>
                                                                {{ $value->keterangan }}
                                                            </option>
                                                        @endif
                                                    </select>
                                                    @error('keterangan_er2a.' . $key)
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
                                 @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="accordion" id="accordionSix">
                    <div class="card">
                        <div class="card-header" id="headingSix">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix"
                                    onclick="showHide(this)">
                                    ER 2B
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                            data-parent="#accordionSix">
                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($formPs2RuangTenagaDuaMingguanER2B as $key => $value)
                                    @php
                                        $count = $key + 1;
                                    @endphp
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>{{$value->nama_peralatan}}</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">TEGANGAN</label>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_r_er2b.' . $key) is-invalid @enderror"
                                                        id="tegangan_r_er2b[]" name="tegangan_r_er2b[]" value="{{ old('tegangan_r.' . $key) ?? $value->tegangan_r }}"
                                                        placeholder="Tegangan R">

                                                    @error('tegangan_r_er2b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_s_er2b.' . $key) is-invalid @enderror"
                                                        id="tegangan_s_er2b[]" name="tegangan_s_er2b[]" value="{{ old('tegangan_s.' . $key) ?? $value->tegangan_s }}"
                                                        placeholder="Tegangan S">

                                                    @error('tegangan_s_er2b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_t_er2b.' . $key) is-invalid @enderror"
                                                        id="tegangan_t_er2b[]" name="tegangan_t_er2b[]" value="{{ old('tegangan_t.' . $key) ?? $value->tegangan_t }}"
                                                        placeholder="Tegangan T">

                                                    @error('tegangan_t_er2b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">ARUS</label>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_r_er2b.' . $key) is-invalid @enderror"
                                                        id="arus_r_er2b[]" name="arus_r_er2b[]" value="{{ old('arus_r.' . $key) ?? $value->arus_r }}"
                                                        placeholder="Arus R">

                                                    @error('arus_r_er2b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_s_er2b.' . $key) is-invalid @enderror"
                                                        id="arus_s_er2b[]" name="arus_s_er2b[]" value="{{ old('arus_s.' . $key) ?? $value->arus_s }}"
                                                        placeholder="Arus S">

                                                    @error('arus_s_er2b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_t_er2b.' . $key) is-invalid @enderror"
                                                        id="arus_t_er2b[]" name="arus_t_er2b[]" value="{{ old('arus_t.' . $key) ?? $value->arus_t }}"
                                                        placeholder="Arus T">

                                                    @error('arus_t_er2b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>DAYA</label>
                                                    <input type="text"
                                                        class="form-control @error('daya_er2b.' . $key) is-invalid @enderror"
                                                        id="daya_er2b[]" name="daya_er2b[]" value="{{ old('daya.' . $key) ?? $value->daya }}"
                                                        placeholder="Daya">

                                                    @error('daya_er2b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>FREK</label>
                                                    <input type="text"
                                                        class="form-control @error('frekuensi_er2b.' . $key) is-invalid @enderror"
                                                        id="frekuensi_er2b[]" name="frekuensi_er2b[]" value="{{ old('frekuensi.' . $key) ?? $value->frekuensi}}"
                                                        placeholder="Frekuensi">

                                                    @error('frekuensi_er2b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>COS PHI</label>
                                                    <input type="text"
                                                        class="form-control @error('cos_phi_er2b.' . $key) is-invalid @enderror"
                                                        id="cos_phi_er2b[]" name="cos_phi_er2b[]" value="{{ old('cos_phi.' . $key) ?? $value->cos_phi }}"
                                                        placeholder="Cos Phi">

                                                    @error('cos_phi_er2b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>STATUS</label>
                                                    {{-- <select class="form-control  @error('status_er2b.' . $key) is-invalid @enderror"
                                                        name="status_er2b[]">
                                                        <option value="auto" disabled selected>Choose Selection</option>
                                                        <option value="REMOTE"
                                                            {{ old('status.' . $key) ?? $value->status == 'REMOTE' ? 'selected' : '' }}>
                                                            REMOTE</option>
                                                        <option value="OPEN"
                                                            {{ old('status.' . $key) ?? $value->status == 'OPEN' ? 'selected' : '' }}>
                                                            OPEN</option>
                                                    </select> --}}

                                                    @if ($key == 13 )

                                                    <select class="form-control  @error('status_er2b.' . $key) is-invalid @enderror"
                                                        name="status_er2b[]">
                                                        <option value="auto" disabled selected>Choose Selection</option>
                                                        <option value="DS"
                                                            {{ old('status.' . $key) ?? $value->status == 'DS' ? 'selected' : '' }}>
                                                            DS</option>
                                                        <option value="CLOSE"
                                                            {{ old('status.' . $key) ?? $value->status == 'CLOSE' ? 'selected' : '' }}>
                                                            CLOSE</option>
                                                    </select>
                                                    @elseif ($key == 0 || $key == 1)
                                                    <select class="form-control  @error('status_er2b.' . $key) is-invalid @enderror"
                                                        name="status_er2b[]">
                                                        <option value="auto" disabled selected>Choose Selection</option>
                                                        <option value="REMOTE"
                                                            {{ old('status.' . $key) ?? $value->status == 'REMOTE' ? 'selected' : '' }}>
                                                            REMOTE</option>
                                                        <option value="OPEN"
                                                            {{ old('status.' . $key) ?? $value->status == 'OPEN' ? 'selected' : '' }}>
                                                            OPEN</option>
                                                    </select>
                                                    @else
                                                    <select class="form-control  @error('status_er2b.' . $key) is-invalid @enderror"
                                                        name="status_er2b[]">
                                                        <option value="auto" disabled selected>Choose Selection</option>
                                                        <option value="REMOTE"
                                                            {{ old('status.' . $key) ?? $value->status == 'REMOTE' ? 'selected' : '' }}>
                                                            REMOTE</option>
                                                        <option value="CLOSE"
                                                            {{ old('status.' . $key) ?? $value->status == 'CLOSE' ? 'selected' : '' }}>
                                                            CLOSE</option>
                                                    </select>
                                                    @endif

                                                    @error('status_er2b.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>KETERANGAN</label>
                                                    <select
                                                        class="form-control select2 @error('keterangan_er2b.' . $key) is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name=keterangan_er2b[]>
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value="NORMAL"
                                                            {{ old('keterangan.' . $key) ?? $value->keterangan == 'NORMAL' ? 'selected' : '' }}>
                                                            Normal</option>
                                                        @if ($value->keterangan != 'NORMAL' && $value->keterangan != null)
                                                            <option
                                                                value="{{ $value->keterangan }}"
                                                                selected>
                                                                {{ $value->keterangan }}
                                                            </option>
                                                        @endif
                                                    </select>
                                                    @error('keterangan_er2b.' . $key)
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
                                 @endforeach
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="accordion" id="accordionFour">
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour"
                                    onclick="showHide(this)">
                                    PANEL MV GENSET
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                            data-parent="#accordionFour">
                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($formPs2RuangTenagaDuaMingguanMV as $key => $value)
                                    @php
                                        $count = $key + 1;
                                    @endphp
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>{{$value->nama_peralatan}}</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">TEGANGAN</label>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_r_mv.' . $key) is-invalid @enderror"
                                                        id="tegangan_r_mv[]" name="tegangan_r_mv[]" value="{{ old('tegangan_r.' . $key) ?? $value->tegangan_r }}"
                                                        placeholder="Tegangan R">

                                                    @error('tegangan_r_mv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_s_mv.' . $key) is-invalid @enderror"
                                                        id="tegangan_s_mv[]" name="tegangan_s_mv[]" value="{{ old('tegangan_s.' . $key) ?? $value->tegangan_s }}"
                                                        placeholder="Tegangan S">

                                                    @error('tegangan_s_mv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_t_mv.' . $key) is-invalid @enderror"
                                                        id="tegangan_t_mv[]" name="tegangan_t_mv[]" value="{{ old('tegangan_t.' . $key) ?? $value->tegangan_t }}"
                                                        placeholder="Tegangan T">

                                                    @error('tegangan_t_mv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">ARUS</label>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_r_mv.' . $key) is-invalid @enderror"
                                                        id="arus_r_mv[]" name="arus_r_mv[]" value="{{ old('arus_r.' . $key) ?? $value->arus_r }}"
                                                        placeholder="Arus R">

                                                    @error('arus_r_mv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_s_mv.' . $key) is-invalid @enderror"
                                                        id="arus_s_mv[]" name="arus_s_mv[]" value="{{ old('arus_s.' . $key) ?? $value->arus_s }}"
                                                        placeholder="Arus S">

                                                    @error('arus_s_mv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_t_mv.' . $key) is-invalid @enderror"
                                                        id="arus_t_mv[]" name="arus_t_mv[]" value="{{ old('arus_t.' . $key) ?? $value->arus_t }}"
                                                        placeholder="Arus T">

                                                    @error('arus_t_mv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>DAYA</label>
                                                    <input type="text"
                                                        class="form-control @error('daya_mv.' . $key) is-invalid @enderror"
                                                        id="daya_mv[]" name="daya_mv[]" value="{{ old('daya.' . $key) ?? $value->daya }}"
                                                        placeholder="Daya">

                                                    @error('daya_mv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>FREK</label>
                                                    <input type="text"
                                                        class="form-control @error('frekuensi_mv.' . $key) is-invalid @enderror"
                                                        id="frekuensi_mv[]" name="frekuensi_mv[]" value="{{ old('frekuensi.' . $key) ?? $value->frekuensi}}"
                                                        placeholder="Frekuensi">

                                                    @error('frekuensi_mv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>COS PHI</label>
                                                    <input type="text"
                                                        class="form-control @error('cos_phi_mv.' . $key) is-invalid @enderror"
                                                        id="cos_phi_mv[]" name="cos_phi_mv[]" value="{{ old('cos_phi.' . $key) ?? $value->cos_phi }}"
                                                        placeholder="Cos Phi">

                                                    @error('cos_phi_mv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>STATUS</label>
                                                    <select class="form-control  @error('status_mv.' . $key) is-invalid @enderror"
                                                        name="status_mv[]">
                                                        <option value="auto" disabled selected>Choose Selection</option>
                                                        <option value="REMOTE"
                                                            {{ old('status.' . $key) ?? $value->status == 'REMOTE' ? 'selected' : '' }}>
                                                            REMOTE</option>
                                                        <option value="OPEN"
                                                            {{ old('status.' . $key) ?? $value->status == 'OPEN' ? 'selected' : '' }}>
                                                            OPEN</option>
                                                    </select>

                                                    @error('status_mv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>KETERANGAN</label>
                                                    <select
                                                        class="form-control select2 @error('keterangan_mv.' . $key) is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name=keterangan_mv[]>
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value="NORMAL"
                                                            {{ old('keterangan.' . $key) ?? $value->keterangan == 'NORMAL' ? 'selected' : '' }}>
                                                            Normal</option>
                                                        @if ($value->keterangan != 'NORMAL' && $value->keterangan != null)
                                                            <option
                                                                value="{{ $value->keterangan }}"
                                                                selected>
                                                                {{ $value->keterangan }}
                                                            </option>
                                                        @endif
                                                    </select>
                                                    @error('keterangan_mv.' . $key)
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
                                 @endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="accordion" id="accordionFive">
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive"
                                    onclick="showHide(this)">
                                    LV PANEL
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                            data-parent="#accordionFive">
                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($formPs2RuangTenagaDuaMingguanLV as $key => $value)
                                    @php
                                        $count = $key + 1;
                                    @endphp
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>{{$value->nama_peralatan}}</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">TEGANGAN</label>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_r_lv.' . $key) is-invalid @enderror"
                                                        id="tegangan_r_lv[]" name="tegangan_r_lv[]" value="{{ old('tegangan_r.' . $key) ?? $value->tegangan_r }}"
                                                        placeholder="Tegangan R">

                                                    @error('tegangan_r_lv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_s_lv.' . $key) is-invalid @enderror"
                                                        id="tegangan_s_lv[]" name="tegangan_s_lv[]" value="{{ old('tegangan_s.' . $key) ?? $value->tegangan_s }}"
                                                        placeholder="Tegangan S">

                                                    @error('tegangan_s_lv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('tegangan_t_lv.' . $key) is-invalid @enderror"
                                                        id="tegangan_t_lv[]" name="tegangan_t_lv[]" value="{{ old('tegangan_t.' . $key) ?? $value->tegangan_t }}"
                                                        placeholder="Tegangan T">

                                                    @error('tegangan_t_lv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <label class="col-12 d-flex justify-content-center">ARUS</label>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_r_lv.' . $key) is-invalid @enderror"
                                                        id="arus_r_lv[]" name="arus_r_lv[]" value="{{ old('arus_r.' . $key) ?? $value->arus_r }}"
                                                        placeholder="Arus R">

                                                    @error('arus_r_lv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_s_lv.' . $key) is-invalid @enderror"
                                                        id="arus_s_lv[]" name="arus_s_lv[]" value="{{ old('arus_s.' . $key) ?? $value->arus_s }}"
                                                        placeholder="Arus S">

                                                    @error('arus_s_lv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('arus_t_lv.' . $key) is-invalid @enderror"
                                                        id="arus_t_lv[]" name="arus_t_lv[]" value="{{ old('arus_t.' . $key) ?? $value->arus_t }}"
                                                        placeholder="Arus T">

                                                    @error('arus_t_lv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>DAYA</label>
                                                    <input type="text"
                                                        class="form-control @error('daya_lv.' . $key) is-invalid @enderror"
                                                        id="daya_lv[]" name="daya_lv[]" value="{{ old('daya.' . $key) ?? $value->daya }}"
                                                        placeholder="Daya">

                                                    @error('daya_lv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>FREK</label>
                                                    <input type="text"
                                                        class="form-control @error('frekuensi_lv.' . $key) is-invalid @enderror"
                                                        id="frekuensi_lv[]" name="frekuensi_lv[]" value="{{ old('frekuensi.' . $key) ?? $value->frekuensi}}"
                                                        placeholder="Frekuensi">

                                                    @error('frekuensi_lv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label>COS PHI</label>
                                                    <input type="text"
                                                        class="form-control @error('cos_phi_lv.' . $key) is-invalid @enderror"
                                                        id="cos_phi_lv[]" name="cos_phi_lv[]" value="{{ old('cos_phi.' . $key) ?? $value->cos_phi }}"
                                                        placeholder="Cos Phi">

                                                    @error('cos_phi_lv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>STATUS</label>
                                                    {{-- <select class="form-control  @error('status_lv.' . $key) is-invalid @enderror"
                                                        name="status_lv[]">
                                                        <option value="auto" disabled selected>Choose Selection</option>
                                                        <option value="REMOTE"
                                                            {{ old('status.' . $key) ?? $value->status == 'REMOTE' ? 'selected' : '' }}>
                                                            REMOTE</option>
                                                        <option value="OPEN"
                                                            {{ old('status.' . $key) ?? $value->status == 'OPEN' ? 'selected' : '' }}>
                                                            OPEN</option>
                                                    </select> --}}

                                                    @if ($key == 0 || $key == 1 || $key == 3 || $key == 4)

                                                    <select class="form-control  @error('status_lv.' . $key) is-invalid @enderror"
                                                        name="status_lv[]">
                                                        <option value="auto" disabled selected>Choose Selection</option>
                                                        <option value="LOCAL"
                                                            {{ old('status.' . $key) ?? $value->status == 'LOCAL' ? 'selected' : '' }}>
                                                            LOCAL</option>
                                                        <option value="CLOSE"
                                                            {{ old('status.' . $key) ?? $value->status == 'CLOSE' ? 'selected' : '' }}>
                                                            CLOSE</option>
                                                    </select>
                                                    @elseif ($key == 2)
                                                    <select class="form-control  @error('status_lv.' . $key) is-invalid @enderror"
                                                        name="status_lv[]">
                                                        <option value="auto" disabled selected>Choose Selection</option>
                                                        <option value="AUTO"
                                                            {{ old('status.' . $key) ?? $value->status == 'AUTO' ? 'selected' : '' }}>
                                                            AUTO</option>
                                                        <option value="OPEN"
                                                            {{ old('status.' . $key) ?? $value->status == 'OPEN' ? 'selected' : '' }}>
                                                            OPEN</option>
                                                    </select>
                                                    @else
                                                    <select class="form-control  @error('status_lv.' . $key) is-invalid @enderror"
                                                        name="status_lv[]">
                                                        <option value="auto" disabled selected>Choose Selection</option>
                                                        <option value="TEMPERATUR"
                                                            {{ old('status.' . $key) ?? $value->status == 'TEMPERATUR' ? 'selected' : '' }}>
                                                            TEMPERATUR</option>
                                                    </select>
                                                    @endif

                                                    @error('status_lv.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>KETERANGAN</label>
                                                    <select
                                                        class="form-control select2 @error('keterangan_lv.' . $key) is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name=keterangan_lv[]>
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value="NORMAL"
                                                            {{ old('keterangan.' . $key) ?? $value->keterangan == 'NORMAL' ? 'selected' : '' }}>
                                                            Normal</option>
                                                        @if ($value->keterangan != 'NORMAL' && $value->keterangan != null)
                                                            <option
                                                                value="{{ $value->keterangan }}"
                                                                selected>
                                                                {{ $value->keterangan }}
                                                            </option>
                                                        @endif
                                                    </select>
                                                    @error('keterangan_lv.' . $key)
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

                                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror"
                                            id="catatan" placeholder="Deskripsi">{!! $formPs2RuangTenagaDuaMingguanLV[0]->catatan ?? '' !!}</textarea>
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

        $(document).ready(function() {
            $('.select2').select2({
                tags: true
            });
        });
    </script>
@endsection
