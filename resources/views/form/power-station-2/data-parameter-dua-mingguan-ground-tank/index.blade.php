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
        <div class="row">
            {{-- <div class="col-12 col-lg-5 col-md-4">
                <table class="table table-bordered head table-responsive d-md-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="head" scope="col">No.</th>
                            <th class="head" scope="col">Personil Yang Ditugaskan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="head">1.</th>
                            <td class="head">Dimas Aryasatya</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-lg-7 col-md-8">
                <table class="table table-bordered head table-responsive d-md-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="head" scope="col">HARI/TANGGAL</th>
                            <th class="head" scope="col">DINAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="head">Friday, 25/02/2023 09:15</th>
                            <td class="head">DINAS</td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}

        </div>
        <form method="POST"
            action="{{ route('form.ps2.ground-tank-dua-mingguan.update', $detailWorkOrderForm->id) }}"
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
                                    <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i> PANEL MAIN
                                    TANK
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionOne">
                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($formPs2GroundTankDuaMingguans as $formPs2GroundTankDuaMingguan)
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'MASTER SELEKTOR POMPA')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>MASTER SELEKTOR POMPA </h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="MASTER SELEKTOR POMPA">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>STATUS</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 0) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="" selected>Choose Selection</option>
                                                                <option value="AUTO"
                                                                    {{ old('q1.' . 0) ?? $formPs2GroundTankDuaMingguans[0]->q1 == 'AUTO' ? 'selected' : '' }}>
                                                                    Auto</option>
                                                            </select>
                                                            @error('q1.' . 0)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SEBELUM</label>
                                                            <select
                                                                class="form-control select2 @error('q2.' . 0) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name="q2[]">
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q2.' . 0) ?? $formPs2GroundTankDuaMingguans[0]->q2 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[0]->q2 != 'NORMAL' && $formPs2GroundTankDuaMingguans[0]->q2 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[0]->q2 }}"
                                                                        selected>{{ $formPs2GroundTankDuaMingguans[0]->q2 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q2.' . 0)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SESUDAH</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 0) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name="q3[]">
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 0) ?? $formPs2GroundTankDuaMingguans[0]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[0]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[0]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[0]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[0]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 0)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 0) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name="q4[]">
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 0) ?? $formPs2GroundTankDuaMingguans[0]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[0]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[0]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[0]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[0]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 0)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'MASTER SELEKTOR SELENOID')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>MASTER SELEKTOR SELENOID </h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="MASTER SELEKTOR SELENOID">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>STATUS</label>
                                                            <select
                                                                class="form-control @error('q1.' . 1) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="" selected>Choose Selection</option>
                                                                <option value="AUTO"
                                                                    {{ old('q1.' . 1) ?? $formPs2GroundTankDuaMingguans[1]->q1 == 'AUTO' ? 'selected' : '' }}>
                                                                    Auto</option>
                                                            </select>
                                                            @error('q1.' . 1)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SEBELUM</label>
                                                            <select
                                                                class="form-control select2 @error('q2.' . 1) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name="q2[]">
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q2.' . 1) ?? $formPs2GroundTankDuaMingguans[1]->q2 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[1]->q2 != 'NORMAL' && $formPs2GroundTankDuaMingguans[1]->q2 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[1]->q2 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[1]->q2 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q2.' . 1)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SESUDAH</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 1) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name="q3[]">
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 1) ?? $formPs2GroundTankDuaMingguans[1]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal
                                                                </option>
                                                                @if ($formPs2GroundTankDuaMingguans[1]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[1]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[1]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[1]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 1)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 1) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name="q4[]">
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 1) ?? $formPs2GroundTankDuaMingguans[1]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[1]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[1]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[1]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[1]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 1)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'MCB')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>MCB </h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="MCB">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>STATUS</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 2) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="" selected>Choose Selection</option>
                                                                <option value="ON(CLOSE)"
                                                                    {{ old('q1.' . 2) ?? $formPs2GroundTankDuaMingguans[2]->q1 == 'ON(CLOSE)' ? 'selected' : '' }}>
                                                                    ON(CLOSE)</option>
                                                            </select>
                                                            @error('q1.' . 2)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SEBELUM</label>
                                                            <select
                                                                class="form-control select2 @error('q2.' . 2) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name="q2[]">
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q2.' . 2) ?? $formPs2GroundTankDuaMingguans[2]->q2 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[2]->q2 != 'NORMAL' && $formPs2GroundTankDuaMingguans[2]->q2 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[2]->q2 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[2]->q2 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q2.' . 2)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SESUDAH</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 2) is-invalid @enderror""
                                                                style="width: 100%; height:50px;" name="q3[]">
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 2) ?? $formPs2GroundTankDuaMingguans[2]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[2]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[2]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[2]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[2]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 2)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 2) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name="q4[]">
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 2) ?? $formPs2GroundTankDuaMingguans[2]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[2]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[2]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[2]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[2]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 2)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
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
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PANEL
                                    FCP 2
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionTwo">
                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($formPs2GroundTankDuaMingguans as $formPs2GroundTankDuaMingguan)
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'MAIN TANK 1 (PANEL FCP 2)')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>MAIN TANK 1</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]"
                                                value="MAIN TANK 1 (PANEL FCP 2)">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>STATUS</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 3) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="AUTO" readonly selected>AUTO</option>
                                                            </select>
                                                            @error('q1.' . 3)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SEBELUM</label>
                                                            <select
                                                                class="form-control select2 @error('q2.' . 3) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q2[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q2.' . 3) ?? $formPs2GroundTankDuaMingguans[3]->q2 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[3]->q2 != 'NORMAL' && $formPs2GroundTankDuaMingguans[3]->q2 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[3]->q2 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[3]->q2 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q2.' . 3)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SESUDAH</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 3) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 3) ?? $formPs2GroundTankDuaMingguans[3]->q2 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[3]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[3]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[3]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[3]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 3)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 3) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 3) ?? $formPs2GroundTankDuaMingguans[3]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[3]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[3]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[3]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[3]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 3)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'MAIN TANK 2 (PANEL FCP 2)')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>MAIN TANK 2</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]"
                                                value="MAIN TANK 2 (PANEL FCP 2)">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>STATUS</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 4) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="AUTO" readonly selected>AUTO</option>
                                                            </select>
                                                            @error('q1.' . 4)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SEBELUM</label>
                                                            <select
                                                                class="form-control select2 @error('q2.' . 4) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q2[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q2.' . 4) ?? $formPs2GroundTankDuaMingguans[4]->q2 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[4]->q2 != 'NORMAL' && $formPs2GroundTankDuaMingguans[4]->q2 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[4]->q2 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[4]->q2 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q2.' . 4)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SESUDAH</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 4) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q2.' . 4) ?? $formPs2GroundTankDuaMingguans[4]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[4]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[4]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[4]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[4]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 4)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 4) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 4) ?? $formPs2GroundTankDuaMingguans[4]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[4]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[4]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[4]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[4]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 4)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'MAIN TANK 3 (PANEL FCP 2)')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>MAIN TANK 3</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]"
                                                value="MAIN TANK 3 (PANEL FCP 2)">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>STATUS</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 5) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="AUTO" readonly selected>AUTO</option>
                                                            </select>
                                                            @error('q1.' . 5)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SEBELUM</label>
                                                            <select
                                                                class="form-control select2 @error('q2.' . 5) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q2[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q2.' . 5) ?? $formPs2GroundTankDuaMingguans[5]->q2 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[5]->q2 != 'NORMAL' && $formPs2GroundTankDuaMingguans[5]->q2 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[5]->q2 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[5]->q2 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q2.' . 5)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SESUDAH</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 5) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 5) ?? $formPs2GroundTankDuaMingguans[5]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[5]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[5]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[5]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[5]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 5)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 5) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 5) ?? $formPs2GroundTankDuaMingguans[5]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[5]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[5]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[5]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[5]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 5)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'DAILY TANK 1')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>DAILY TANK 1</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="DAILY TANK 1">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>STATUS</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 6) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="AUTO" readonly selected>AUTO</option>
                                                            </select>
                                                            @error('q1.' . 6)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SEBELUM</label>
                                                            <select
                                                                class="form-control select2 @error('q2.' . 6) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q2[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q2.' . 6) ?? $formPs2GroundTankDuaMingguans[6]->q2 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[6]->q2 != 'NORMAL' && $formPs2GroundTankDuaMingguans[6]->q2 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[6]->q2 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[6]->q2 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q2.' . 6)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SESUDAH</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 6) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 6) ?? $formPs2GroundTankDuaMingguans[6]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[6]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[6]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[6]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[6]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 6)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 6) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 6) ?? $formPs2GroundTankDuaMingguans[6]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[6]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[6]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[6]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[6]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 6)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'DAILY TANK 2')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>DAILY TANK 2</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="DAILY TANK 2">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>STATUS</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 7) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="AUTO" readonly selected>AUTO</option>
                                                            </select>
                                                            @error('q1.' . 7)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SEBELUM</label>
                                                            <select
                                                                class="form-control select2 @error('q2.' . 7) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q2[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q2.' . 7) ?? $formPs2GroundTankDuaMingguans[7]->q2 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[7]->q2 != 'NORMAL' && $formPs2GroundTankDuaMingguans[7]->q2 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[7]->q2 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[7]->q2 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q2.' . 7)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SESUDAH</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 7) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 7) ?? $formPs2GroundTankDuaMingguans[7]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[7]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[7]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[7]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[7]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 7)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 7) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 7) ?? $formPs2GroundTankDuaMingguans[7]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[7]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[7]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[7]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[7]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 7)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'DAILY TANK 3')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>DAILY TANK 3</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="DAILY TANK 3">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>STATUS</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 8) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="AUTO" readonly selected>AUTO</option>
                                                            </select>
                                                            @error('q1.' . 8)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SEBELUM</label>
                                                            <select
                                                                class="form-control select2 @error('q2.' . 8) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q2[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q2.' . 8) ?? $formPs2GroundTankDuaMingguans[8]->q2 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[8]->q2 != 'NORMAL' && $formPs2GroundTankDuaMingguans[8]->q2 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[8]->q2 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[8]->q2 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q2.' . 8)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SESUDAH</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 8) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 8) ?? $formPs2GroundTankDuaMingguans[8]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[8]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[8]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[8]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[8]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 8)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 8) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 8) ?? $formPs2GroundTankDuaMingguans[8]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[8]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[8]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[8]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[8]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 8)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'DAILY TANK 4')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>DAILY TANK 4</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="DAILY TANK 4">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>STATUS</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 9) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="AUTO" readonly selected>AUTO</option>
                                                            </select>
                                                            @error('q1.' . 9)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SEBELUM</label>
                                                            <select
                                                                class="form-control select2 @error('q2.' . 9) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q2[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q2.' . 9) ?? $formPs2GroundTankDuaMingguans[9]->q2 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[9]->q2 != 'NORMAL' && $formPs2GroundTankDuaMingguans[9]->q2 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[9]->q2 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[9]->q2 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q2.' . 9)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SESUDAH</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 9) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 9) ?? $formPs2GroundTankDuaMingguans[9]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[9]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[9]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[9]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[9]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 9)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 9) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 9) ?? $formPs2GroundTankDuaMingguans[9]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[9]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[9]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[9]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[9]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 9)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'DAILY TANK 5')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>DAILY TANK 5</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="DAILY TANK 5">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>STATUS</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 10) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="AUTO" readonly selected>AUTO</option>
                                                            </select>
                                                            @error('q1.' . 10)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SEBELUM</label>
                                                            <select
                                                                class="form-control select2 @error('q2.' . 10) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q2[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q2.' . 10) ?? $formPs2GroundTankDuaMingguans[10]->q2 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[10]->q2 != 'NORMAL' && $formPs2GroundTankDuaMingguans[10]->q2 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[10]->q2 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[10]->q2 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q2.' . 10)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SESUDAH</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 10) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 10) ?? $formPs2GroundTankDuaMingguans[10]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[10]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[10]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[10]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[10]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 10)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 10) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 10) ?? $formPs2GroundTankDuaMingguans[10]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[10]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[10]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[10]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[10]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 10)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'DAILY TANK 6')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>DAILY TANK 6</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="DAILY TANK 6">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>STATUS</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 11) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="AUTO" readonly selected>AUTO</option>
                                                            </select>
                                                            @error('q1.' . 11)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SEBELUM</label>
                                                            <select
                                                                class="form-control select2 @error('q2.' . 11) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q2[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q2.' . 11) ?? $formPs2GroundTankDuaMingguans[11]->q2 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[11]->q2 != 'NORMAL' && $formPs2GroundTankDuaMingguans[11]->q2 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[11]->q2 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[11]->q2 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q2.' . 11)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SESUDAH</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 11) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 11) ?? $formPs2GroundTankDuaMingguans[11]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[11]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[11]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[11]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[11]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 11)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 11) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 11) ?? $formPs2GroundTankDuaMingguans[11]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[11]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[11]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[11]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[11]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'DAILY TANK 7')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>DAILY TANK 7</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="DAILY TANK 7">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>STATUS</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 12) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="AUTO" readonly selected>AUTO</option>
                                                            </select>
                                                            @error('q1.' . 12)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SEBELUM</label>
                                                            <select
                                                                class="form-control select2 @error('q2.' . 12) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q2[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q2.' . 12) ?? $formPs2GroundTankDuaMingguans[12]->q2 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[12]->q2 != 'NORMAL' && $formPs2GroundTankDuaMingguans[12]->q2 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[12]->q2 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[12]->q2 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q2.' . 12)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VOLUME SESUDAH</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 12) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 12) ?? $formPs2GroundTankDuaMingguans[12]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[12]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[12]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[12]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[12]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 12)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 12) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 12) ?? $formPs2GroundTankDuaMingguans[12]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[12]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[12]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[12]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[12]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'POMPA P1A')
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>POMPA P1A</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="POMPA P1A">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 13) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q1.' . 13) ?? $formPs2GroundTankDuaMingguans[13]->q1 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q1.' . 13)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control  @error('q2.' . 13) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q2.' . 13) ?? $formPs2GroundTankDuaMingguans[2]->q2 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q2.' . 13)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 13) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 13) ?? $formPs2GroundTankDuaMingguans[13]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[13]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[13]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[13]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[13]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 13)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 13) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 13) ?? $formPs2GroundTankDuaMingguans[13]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[13]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[13]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[13]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[13]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'POMPA P1B')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>POMPA P1B</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="POMPA P1B">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 14) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q1.' . 14) ?? $formPs2GroundTankDuaMingguans[14]->q1 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q1.' . 14)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control @error('q2.' . 14) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q2.' . 14) ?? $formPs2GroundTankDuaMingguans[14]->q2 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q2.' . 14)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 14) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 14) ?? $formPs2GroundTankDuaMingguans[14]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[14]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[14]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[14]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[14]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 14)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 14) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 14) ?? $formPs2GroundTankDuaMingguans[14]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[14]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[14]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[14]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[14]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 14)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'POMPA P2A')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>POMPA P2A</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="POMPA P2A">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 15) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q1.' . 15) ?? $formPs2GroundTankDuaMingguans[15]->q1 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q1.' . 15)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control  @error('q2.' . 15) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q2.' . 15) ?? $formPs2GroundTankDuaMingguans[15]->q2 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q2.' . 15)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 15) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 15) ?? $formPs2GroundTankDuaMingguans[15]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[15]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[15]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[15]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[15]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 15)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 15) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 15) ?? $formPs2GroundTankDuaMingguans[15]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[15]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[15]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[15]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[15]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 15)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'POMPA P2B')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>POMPA P2B</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="POMPA P2B">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 16) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q1.' . 16) ?? $formPs2GroundTankDuaMingguans[16]->q1 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q1.' . 16)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control  @error('q2.' . 16) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="AUTO" readonly selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q2.' . 16) ?? $formPs2GroundTankDuaMingguans[16]->q2 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q2.' . 16)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 16) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 16) ?? $formPs2GroundTankDuaMingguans[16]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[16]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[16]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[16]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[16]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 16)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 16) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 16) ?? $formPs2GroundTankDuaMingguans[16]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[16]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[16]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[16]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[16]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 16)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'POMPA P4')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>POMPA P4</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="POMPA P4">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 17) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q1.' . 17) ?? $formPs2GroundTankDuaMingguans[17]->q1 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q1.' . 17)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control  @error('q2.' . 17) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q2.' . 17) ?? $formPs2GroundTankDuaMingguans[17]->q2 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q2.' . 17)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 17) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 17) ?? $formPs2GroundTankDuaMingguans[17]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[17]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[17]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[17]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[17]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 17)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 17) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 17) ?? $formPs2GroundTankDuaMingguans[17]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[17]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[17]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[17]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[17]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 17)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'VALVE OUT MAIN TANK 1')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>VALVE OUT MAIN TANK 1</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="VALVE OUT MAIN TANK 1">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 18) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="-" readonly selected>-</option>
                                                            </select>
                                                            @error('q1.' . 18)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control  @error('q2.' . 18) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q2.' . 18) ?? $formPs2GroundTankDuaMingguans[18]->q2 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q2.' . 18)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 18) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 18) ?? $formPs2GroundTankDuaMingguans[18]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[18]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[18]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[18]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[18]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 18)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 18) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 18) ?? $formPs2GroundTankDuaMingguans[18]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[18]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[18]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[18]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[18]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 18)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'VALVE OUT MAIN TANK 2')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>VALVE OUT MAIN TANK 2</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="VALVE OUT MAIN TANK 2">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 19) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="-" readonly selected>-</option>
                                                            </select>
                                                            @error('q1.' . 19)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control  @error('q2.' . 19) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q2.' . 19) ?? $formPs2GroundTankDuaMingguans[19]->q2 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q2.' . 19)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 19) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 19) ?? $formPs2GroundTankDuaMingguans[19]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[19]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[19]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[19]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[19]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 19)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 19) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 19) ?? $formPs2GroundTankDuaMingguans[19]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[19]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[19]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[19]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[19]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 19)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'VALVE OUT MAIN TANK 3')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>VALVE OUT MAIN TANK 3</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="VALVE OUT MAIN TANK 3">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 20) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="-" readonly selected>-</option>
                                                            </select>
                                                            @error('q1.' . 20)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control  @error('q2.' . 20) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q2.' . 20) ?? $formPs2GroundTankDuaMingguans[20]->q2 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q2.' . 20)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 20) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 20) ?? $formPs2GroundTankDuaMingguans[20]->q3 == 'OPEN' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[20]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[20]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[20]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[20]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 20)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 20) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 20) ?? $formPs2GroundTankDuaMingguans[20]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[20]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[20]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[20]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[20]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 20)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'VALVE MAIN TANK-D TANK')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>VALVE MAIN TANK-D TANK</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="VALVE MAIN TANK-D TANK">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 21) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="-" selected>-</option>
                                                            </select>
                                                            @error('q1.' . 21)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control  @error('q2.' . 21) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="-" readonly selected>-</option>
                                                            </select>
                                                            @error('q2.' . 21)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 21) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 21) ?? $formPs2GroundTankDuaMingguans[21]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[21]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[21]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[21]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[21]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 21)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 21) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 21) ?? $formPs2GroundTankDuaMingguans[21]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[21]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[21]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[21]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[21]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 21)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == '1A')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>1A</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="1A">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 22) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="-" readonly selected>-</option>
                                                            </select>
                                                            @error('q1.' . 22)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control  @error('q2.' . 22) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q2.' . 22) ?? $formPs2GroundTankDuaMingguans[22]->q2 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q2.' . 22)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 22) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 22) ?? $formPs2GroundTankDuaMingguans[22]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[22]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[22]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[22]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[22]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 22)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 22) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 22) ?? $formPs2GroundTankDuaMingguans[22]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[22]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[22]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[22]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[22]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 22)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == '1B')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>1B</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="1B">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 23) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="-" readonly selected>-</option>
                                                            </select>
                                                            @error('q1.' . 23)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control  @error('q2.' . 23) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q2.' . 23) ?? $formPs2GroundTankDuaMingguans[23]->q2 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q2.' . 23)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 23) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 23) ?? $formPs2GroundTankDuaMingguans[23]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[23]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[23]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[23]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[23]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 23)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 23) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 23) ?? $formPs2GroundTankDuaMingguans[23]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[23]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[23]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[23]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[23]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 23)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == '2A')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>2A</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="2A">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 24) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="AUTO" readonly selected>-</option>
                                                            </select>
                                                            @error('q1.' . 24)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control  @error('q2.' . 24) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q2.' . 24) ?? $formPs2GroundTankDuaMingguans[24]->q2 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q2.' . 24)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 24) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 24) ?? $formPs2GroundTankDuaMingguans[24]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[24]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[24]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[24]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[24]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 24)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 24) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 24) ?? $formPs2GroundTankDuaMingguans[24]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[24]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[24]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[24]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[24]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 24)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == '2B')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>2B</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="2B">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 25) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="-" readonly selected>-</option>
                                                            </select>
                                                            @error('q1.' . 25)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control  @error('q2.' . 25) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q2.' . 25) ?? $formPs2GroundTankDuaMingguans[25]->q2 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q2.' . 25)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 25) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 25) ?? $formPs2GroundTankDuaMingguans[25]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[25]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[25]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[25]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[25]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 25)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 25) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 25) ?? $formPs2GroundTankDuaMingguans[25]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[25]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[25]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[25]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[25]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 25)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == '3A')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>3A</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="3A">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 26) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="-" readonly selected>-</option>
                                                            </select>
                                                            @error('q1.' . 26)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control  @error('q2.' . 26) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q2.' . 26) ?? $formPs2GroundTankDuaMingguans[26]->q2 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q2.' . 26)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 26) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 26) ?? $formPs2GroundTankDuaMingguans[26]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[26]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[26]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[26]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[26]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 26)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 26) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 26) ?? $formPs2GroundTankDuaMingguans[26]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[26]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[26]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[26]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[26]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 26)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == '3B')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>3B</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="3B">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 27) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="-" readonly selected>-</option>
                                                            </select>
                                                            @error('q1.' . 27)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control  @error('q2.' . 27) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q2.' . 27) ?? $formPs2GroundTankDuaMingguans[27]->q2 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q2.' . 27)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 27) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 27) ?? $formPs2GroundTankDuaMingguans[27]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[27]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[27]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[27]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[27]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 27)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 27) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 27) ?? $formPs2GroundTankDuaMingguans[27]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[27]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[27]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[27]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[27]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 27)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'VALVE RETURN ENGINE-M TANK')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>VALVE RETURN ENGINE-M TANK</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]"
                                                value="VALVE RETURN ENGINE-M TANK">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 28) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="-" readonly selected>-</option>
                                                            </select>
                                                            @error('q1.' . 28)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control  @error('q2.' . 28) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="-" readonly selected>-</option>
                                                            </select>
                                                            @error('q2.' . 28)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 28) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 28) ?? $formPs2GroundTankDuaMingguans[28]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[28]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[28]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[28]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[28]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 28)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 28) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 28) ?? $formPs2GroundTankDuaMingguans[28]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[28]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[28]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[28]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[28]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 28)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'MAIN TANK 1')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>MAIN TANK 1</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="MAIN TANK 1">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 29) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q1.' . 29) ?? $formPs2GroundTankDuaMingguans[29]->q1 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q1.' . 29)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control  @error('q2.' . 29) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="-" readonly selected>-</option>
                                                            </select>
                                                            @error('q2.' . 29)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 29) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 29) ?? $formPs2GroundTankDuaMingguans[29]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[29]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[29]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[29]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[29]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 29)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 29) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 29) ?? $formPs2GroundTankDuaMingguans[29]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[29]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[29]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[29]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[29]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 29)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'MAIN TANK 2')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>MAIN TANK 2</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="MAIN TANK 2">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 30) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="OPEN"
                                                                    {{ old('q1.' . 30) ?? $formPs2GroundTankDuaMingguans[30]->q1 == 'OPEN' ? 'selected' : '' }}>
                                                                    OPEN</option>
                                                            </select>
                                                            @error('q1.' . 30)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control  @error('q2.' . 30) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="-" readonly selected>-</option>
                                                            </select>
                                                            @error('q2.' . 30)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 30) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 30) ?? $formPs2GroundTankDuaMingguans[30]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[30]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[30]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[30]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[30]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 30)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 30) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 30) ?? $formPs2GroundTankDuaMingguans[30]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[30]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[30]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[30]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[30]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 30)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'MAIN TANK 3')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>MAIN TANK 3</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="MAIN TANK 3">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 31) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="CLOSE"
                                                                    {{ old('q1.' . 31) ?? $formPs2GroundTankDuaMingguans[31]->q1 == 'CLOSE' ? 'selected' : '' }}>
                                                                    CLOSE</option>
                                                            </select>
                                                            @error('q1.' . 31)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control  @error('q2.' . 31) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="-" readonly selected>-</option>
                                                            </select>
                                                            @error('q2.' . 31)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 31) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 31) ?? $formPs2GroundTankDuaMingguans[31]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[31]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[31]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[31]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[31]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 31)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 31) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 31) ?? $formPs2GroundTankDuaMingguans[31]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[31]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[31]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[31]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[31]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 31)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($formPs2GroundTankDuaMingguan->nama_peralatan == 'LAMPU PENERANGAN')
                                        <div class="row">
                                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                                <h5>LAMPU PENERANGAN</h5>
                                            </div>
                                            <input type="hidden" name="nama_peralatan[]" value="LAMPU PENERANGAN">
                                            <div class="col-12 col-lg-8">
                                                <div class="row">
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE IN</label>
                                                            <select
                                                                class="form-control  @error('q1.' . 32) is-invalid @enderror"
                                                                name="q1[]">
                                                                <option value="" selected>Choose Selection
                                                                </option>
                                                                <option value="12TOTAL"
                                                                    {{ old('q1.' . 32) ?? $formPs2GroundTankDuaMingguans[32]->q1 == '12TOTAL' ? 'selected' : '' }}>
                                                                    12TOTAL</option>
                                                            </select>
                                                            @error('q1.' . 32)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>VALVE OUT</label>
                                                            <select
                                                                class="form-control  @error('q2.' . 32) is-invalid @enderror"
                                                                name="q2[]">
                                                                <option value="-" readonly selected>-</option>
                                                            </select>
                                                            @error('q2.' . 32)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>PRESS</label>
                                                            <select
                                                                class="form-control select2 @error('q3.' . 32) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q3[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q3.' . 32) ?? $formPs2GroundTankDuaMingguans[32]->q3 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[32]->q3 != 'NORMAL' && $formPs2GroundTankDuaMingguans[32]->q3 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[32]->q3 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[32]->q3 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q3.' . 32)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>KETERANGAN</label>
                                                            <select
                                                                class="form-control select2 @error('q4.' . 32) is-invalid @enderror"
                                                                style="width: 100%; height:50px;" name=q4[]>
                                                                <option value="">Choose Or Type Selection</option>
                                                                <option value="NORMAL"
                                                                    {{ old('q4.' . 32) ?? $formPs2GroundTankDuaMingguans[32]->q4 == 'NORMAL' ? 'selected' : '' }}>
                                                                    Normal</option>
                                                                @if ($formPs2GroundTankDuaMingguans[32]->q4 != 'NORMAL' && $formPs2GroundTankDuaMingguans[32]->q4 != null)
                                                                    <option
                                                                        value="{{ $formPs2GroundTankDuaMingguans[32]->q4 }}"
                                                                        selected>
                                                                        {{ $formPs2GroundTankDuaMingguans[32]->q4 }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error('q4.' . 32)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
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
                                            id="catatan" placeholder="Deskripsi">{!! $formPs2GroundTankDuaMingguans[0]->catatan ?? '' !!}</textarea>
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
