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
    </style>
@endsection

@section('content')
    <section class="content">

        {{-- <table class="table table-bordered head table-responsive w-100 d-block d-md-table">
            <thead class="thead-light">
                <tr>
                    <th class="head" scope="col">WORKING ORDER NUMBER</th>
                    <th class="head" scope="col">LOCATION</th>
                    <th class="head" scope="col">DATE</th>
                    <th class="head" scope="col">MONTH</th>
                    <th class="head" scope="col">YEAR</th>
                    <th class="head" scope="col">SUPERVISED BY</th>
                    <th class="head" scope="col">DINAS</th>
                    <th class="head" scope="col">HARI/TANGGAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="head">WO</th>
                    <td class="head">NP</td>
                    <td class="head">18</td>
                    <td class="head">JAN</td>
                    <td class="head">2023</td>
                    <td class="head">ALAN</td>
                    <td class="head">DIMAS ARYASATYA</td>
                    <td class="head">23-02-2023</td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-12 col-lg-5 col-md-4">
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
            </div>

        </div> --}}
        <form method="POST"
            action="{{ route('form.ps2.data-parameter-dua-mingguan-panel-sdp-epcc-exhaust-fan.update', $detailWorkOrderForm->id) }}"
            enctype="multipart/form-data" id="form">
            @method('patch')
            @csrf

            @foreach ($formPs2PanelDuaMingguans as $key => $value)
                @php
                    $count = $key + 1;
                @endphp

                <div class="container-fluid">
                    <div class="accordion" id="accordion{{ $count }}">
                        <div class="card">
                            <div class="card-header" id="heading{{ $count }}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapse{{ $count }}" aria-expanded="true"
                                        aria-controls="collapse{{ $count }}" onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        {{ $value->nama_peralatan }}
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse{{ $count }}"
                                class="collapse @if ($count == 1) show @endif"
                                aria-labelledby="heading{{ $count }}" data-parent="#accordion{{ $count }}">
                                <div class="card-body">
                                    @include('components.form-message')
                                    <div class="row">
                                        <div
                                            class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                            <span>TEGANGAN (VOLT)</span>
                                        </div>
                                        <div class="col-12 col-lg-9">
                                            <div class="row">
                                                <div class="col-6 col-lg-3 col-md-4">
                                                    <div class="form-group">
                                                        <label>R</label>
                                                        <input type="text"
                                                            class="form-control @error('tegangan_r.' . $key) is-invalid @enderror"
                                                            id="tegangan_r[]" name="tegangan_r[]"
                                                            value="{{ old('tegangan_r.' . $key) ?? $value->tegangan_r }}"
                                                            placeholder="Tegangan R">

                                                        @error('tegangan_r.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3 col-md-4">
                                                    <div class="form-group">
                                                        <label>S</label>
                                                        <input type="text"
                                                            class="form-control @error('tegangan_s.' . $key) is-invalid @enderror"
                                                            id="tegangan_s[]" name="tegangan_s[]"
                                                            value="{{ old('tegangan_s.' . $key) ?? $value->tegangan_s }}"
                                                            placeholder="Tegangan S">

                                                        @error('tegangan_s.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3 col-md-4">
                                                    <div class="form-group">
                                                        <label>T</label>
                                                        <input type="text"
                                                            class="form-control @error('tegangan_t.' . $key) is-invalid @enderror"
                                                            id="tegangan_t[]" name="tegangan_t[]"
                                                            value="{{ old('tegangan_t.' . $key) ?? $value->tegangan_t }}"
                                                            placeholder="Tegangan T">

                                                        @error('tegangan_t.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3 col-md-4">
                                                    <div class="form-group">
                                                        <label>R - N</label>
                                                        <input type="text"
                                                            class="form-control @error('tegangan_rn.' . $key) is-invalid @enderror"
                                                            id="tegangan_rn[]" name="tegangan_rn[]"
                                                            value="{{ old('tegangan_rn.' . $key) ?? $value->tegangan_rn }}"
                                                            placeholder="Tegangan R - N">

                                                        @error('tegangan_rn.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3 col-md-4">
                                                    <div class="form-group">
                                                        <label>S - N</label>
                                                        <input type="text"
                                                            class="form-control @error('tegangan_sn.' . $key) is-invalid @enderror"
                                                            id="tegangan_sn[]" name="tegangan_sn[]"
                                                            value="{{ old('tegangan_sn.' . $key) ?? $value->tegangan_sn }}"
                                                            placeholder="Tegangan S - N">

                                                        @error('tegangan_sn.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3 col-md-4">
                                                    <div class="form-group">
                                                        <label>T - N</label>
                                                        <input type="text"
                                                            class="form-control @error('tegangan_tn.' . $key) is-invalid @enderror"
                                                            id="tegangan_tn[]" name="tegangan_tn[]"
                                                            value="{{ old('tegangan_tn.' . $key) ?? $value->tegangan_tn }}"
                                                            placeholder="Tegangan T - N">

                                                        @error('tegangan_tn.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3 col-md-4">
                                                    <div class="form-group">
                                                        <label>R - G</label>
                                                        <input type="text"
                                                            class="form-control @error('tegangan_rg.' . $key) is-invalid @enderror"
                                                            id="tegangan_rg[]" name="tegangan_rg[]"
                                                            value="{{ old('tegangan_rg.' . $key) ?? $value->tegangan_rg }}"
                                                            placeholder="Tegangan R - G">

                                                        @error('tegangan_rg.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3 col-md-4">
                                                    <div class="form-group">
                                                        <label>S - G</label>
                                                        <input type="text"
                                                            class="form-control @error('tegangan_sg.' . $key) is-invalid @enderror"
                                                            id="tegangan_sg[]" name="tegangan_sg[]"
                                                            value="{{ old('tegangan_sg.' . $key) ?? $value->tegangan_sg }}"
                                                            placeholder="Tegangan S - G">

                                                        @error('tegangan_sg.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3 col-md-4">
                                                    <div class="form-group">
                                                        <label>T - G</label>
                                                        <input type="text"
                                                            class="form-control @error('tegangan_tg.' . $key) is-invalid @enderror"
                                                            id="tegangan_tg[]" name="tegangan_tg[]"
                                                            value="{{ old('tegangan_tg.' . $key) ?? $value->tegangan_tg }}"
                                                            placeholder="Tegangan T - G">

                                                        @error('tegangan_tg.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3 col-md-4">
                                                    <div class="form-group">
                                                        <label>G - N</label>
                                                        <input type="text"
                                                            class="form-control @error('tegangan_gn.' . $key) is-invalid @enderror"
                                                            id="tegangan_gn[]" name="tegangan_gn[]"
                                                            value="{{ old('tegangan_gn.' . $key) ?? $value->tegangan_gn }}"
                                                            placeholder="Tegangan G - N">

                                                        @error('tegangan_gn.' . $key)
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
                                        <div
                                            class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                            <span>ARUS (VOLT)</span>
                                        </div>
                                        <div class="col-12 col-lg-9">
                                            <div class="row">
                                                <div class="col-6 col-lg-3 col-md-4">
                                                    <div class="form-group">
                                                        <label>R</label>
                                                        <input type="text"
                                                            class="form-control @error('arus_r.' . $key) is-invalid @enderror"
                                                            id="arus_r[]" name="arus_r[]"
                                                            value="{{ old('arus_r.' . $key) ?? $value->arus_r }}"
                                                            placeholder="Arus R">

                                                        @error('arus_r.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3 col-md-4">
                                                    <div class="form-group">
                                                        <label>S</label>
                                                        <input type="text"
                                                            class="form-control @error('arus_s.' . $key) is-invalid @enderror"
                                                            id="arus_s[]" name="arus_s[]"
                                                            value="{{ old('arus_s.' . $key) ?? $value->arus_s }}"
                                                            placeholder="Arus S">

                                                        @error('arus_s.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3 col-md-4">
                                                    <div class="form-group">
                                                        <label>T</label>
                                                        <input type="text"
                                                            class="form-control @error('arus_t.' . $key) is-invalid @enderror"
                                                            id="arus_t[]" name="arus_t[]"
                                                            value="{{ old('arus_t.' . $key) ?? $value->arus_t }}"
                                                            placeholder="Arus T">

                                                        @error('arus_t.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3 col-md-4">
                                                    <div class="form-group">
                                                        <label>N</label>
                                                        <input type="text"
                                                            class="form-control @error('arus_n.' . $key) is-invalid @enderror"
                                                            id="arus_n[]" name="arus_n[]"
                                                            value="{{ old('arus_n.' . $key) ?? $value->arus_n }}"
                                                            placeholder="Arus N">

                                                        @error('arus_n.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3 col-md-4">
                                                    <div class="form-group">
                                                        <label>G</label>
                                                        <input type="text"
                                                            class="form-control @error('arus_g.' . $key) is-invalid @enderror"
                                                            id="arus_g[]" name="arus_g[]"
                                                            value="{{ old('arus_g.' . $key) ?? $value->arus_g }}"
                                                            placeholder="Arus G">

                                                        @error('arus_g.' . $key)
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
                                    <div class="row">
                                        <div class="col-6 col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label>DAYA (Watt)</label>
                                                <input type="text"
                                                    class="form-control @error('daya.' . $key) is-invalid @enderror"
                                                    id="daya[]" name="daya[]"
                                                    value="{{ old('daya.' . $key) ?? $value->daya }}" placeholder="DAYA">

                                                @error('daya.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label>FREKUENSI (Hz)</label>
                                                <input type="text"
                                                    class="form-control @error('frekuensi.' . $key) is-invalid @enderror"
                                                    id="frekuensi[]" name="frekuensi[]"
                                                    value="{{ old('frekuensi.' . $key) ?? $value->frekuensi }}"
                                                    placeholder="FREKUENSI">

                                                @error('frekuensi.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label>POSISI PANEL</label>
                                                <input type="text"
                                                    class="form-control @error('posisi.' . $key) is-invalid @enderror"
                                                    id="posisi[]" name="posisi[]"
                                                    value="{{ old('posisi.' . $key) ?? $value->posisi }}" readonly
                                                    disabled>

                                                @error('posisi.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label>BATT (Vdc)</label>
                                                <input type="text"
                                                    class="form-control @error('batt.' . $key) is-invalid @enderror"
                                                    id="batt[]" name="batt[]"
                                                    value="{{ old('batt.' . $key) ?? $value->batt }}" placeholder="BATT">

                                                @error('batt.' . $key)
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
            @endforeach

            {{--
            <div class="container-fluid">
                <div class="accordion" id="accordionOne">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i> PS2 SDP 007
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionOne">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                        placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS" value="{{ old('teganganS') }}"
                                                        placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                        placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS" value="{{ old('teganganS') }}"
                                                        placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.GENSET" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionTwo">
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PS2 SDP
                                    001C
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionTwo">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                        placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS" value="{{ old('teganganS') }}"
                                                        placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                        placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS" value="{{ old('teganganS') }}"
                                                        placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.GENSET" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionThree">
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PS2 SDP
                                    008
                                </button>
                            </h2>
                        </div>

                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordionThree">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                        placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS" value="{{ old('teganganS') }}"
                                                        placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                        placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS" value="{{ old('teganganS') }}"
                                                        placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.GENSET" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionFour">
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PS2 SDP
                                    006
                                </button>
                            </h2>
                        </div>

                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                            data-parent="#accordionFour">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                        placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS" value="{{ old('teganganS') }}"
                                                        placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                        placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS" value="{{ old('teganganS') }}"
                                                        placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.GENSET" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionFive">
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PS2 SDP
                                    003
                                </button>
                            </h2>
                        </div>

                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                            data-parent="#accordionFive">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                        placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS" value="{{ old('teganganS') }}"
                                                        placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT" value="{{ old('teganganT') }}"
                                                        placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="GH 128" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionSix">
                    <div class="card">
                        <div class="card-header" id="headingSix">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PS2
                                    SDP 001A
                                </button>
                            </h2>
                        </div>

                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                            data-parent="#accordionSix">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.TENAGA" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionSeven">
                    <div class="card">
                        <div class="card-header" id="headingSeven">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PS2
                                    SDP 004
                                </button>
                            </h2>
                        </div>

                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                            data-parent="#accordionSeven">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R"
                                                        readonly disabled>

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S"
                                                        readonly disabled>

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T"
                                                        readonly disabled>

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T"
                                                        readonly disabled>

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T"
                                                        readonly disabled>

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T"
                                                        readonly disabled>

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T"
                                                        readonly disabled>

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T"
                                                        readonly disabled>

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T"
                                                        readonly disabled>

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T"
                                                        readonly disabled>

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R"
                                                        readonly disabled>

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S"
                                                        readonly disabled>

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T"
                                                        readonly disabled>

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T"
                                                        readonly disabled>

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T"
                                                        readonly disabled>

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="GROUND TANK" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R" readonly disabled>

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionEight">
                    <div class="card">
                        <div class="card-header" id="headingEight">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PS2
                                    SDP 001B
                                </button>
                            </h2>
                        </div>

                        <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                            data-parent="#accordionEight">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="L.2" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionNine">
                    <div class="card">
                        <div class="card-header" id="headingNine">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PS2
                                    SDP 002
                                </button>
                            </h2>
                        </div>

                        <div id="collapseNine" class="collapse" aria-labelledby="headingNine"
                            data-parent="#accordionNine">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="L.2" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionTen">
                    <div class="card">
                        <div class="card-header" id="headingTen">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PS2
                                    SDP UPS 05 D
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTen" class="collapse" aria-labelledby="headingTen"
                            data-parent="#accordionTen">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.SERVER" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionEleven">
                    <div class="card">
                        <div class="card-header" id="headingEleven">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PS2
                                    SDP UPS 05 C
                                </button>
                            </h2>
                        </div>

                        <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven"
                            data-parent="#accordionEleven">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.SERVER" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionTwelve">
                    <div class="card">
                        <div class="card-header" id="headingTwelve">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseTwelve" aria-expanded="true" aria-controls="collapseTwelve"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PS2
                                    SDP 05A
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve"
                            data-parent="#accordionTwelve">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.SERVER" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionThirteen">
                    <div class="card">
                        <div class="card-header" id="headingThirteen">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseThirteen" aria-expanded="true"
                                    aria-controls="collapseThirteen" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PS2
                                    SDP 05B
                                </button>
                            </h2>
                        </div>

                        <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen"
                            data-parent="#accordionThirteen">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.SERVER" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionFourteen">
                    <div class="card">
                        <div class="card-header" id="headingFourteen">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseFourteen" aria-expanded="true"
                                    aria-controls="collapseFourteen" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PS2
                                    SDP 02B
                                </button>
                            </h2>
                        </div>

                        <div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen"
                            data-parent="#accordionFourteen">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.SERVER" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionFifteen">
                    <div class="card">
                        <div class="card-header" id="headingFifteen">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseFifteen" aria-expanded="true"
                                    aria-controls="collapseFifteen" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PS2
                                    SDP AC LT 2
                                </button>
                            </h2>
                        </div>

                        <div id="collapseFifteen" class="collapse" aria-labelledby="headingFifteen"
                            data-parent="#accordionFifteen">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="L.2" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionSixteen">
                    <div class="card">
                        <div class="card-header" id="headingSixteen">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseSixteen" aria-expanded="true"
                                    aria-controls="collapseSixteen" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> MCA
                                </button>
                            </h2>
                        </div>

                        <div id="collapseSixteen" class="collapse" aria-labelledby="headingSixteen"
                            data-parent="#accordionSixteen">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.CONTROL" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionSeventeen">
                    <div class="card">
                        <div class="card-header" id="headingSeventeen">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseSeventeen" aria-expanded="true"
                                    aria-controls="collapseSeventeen" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> MCB
                                </button>
                            </h2>
                        </div>

                        <div id="collapseSeventeen" class="collapse" aria-labelledby="headingSeventeen"
                            data-parent="#accordionSeventeen">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.CONTROL" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionEighteen">
                    <div class="card">
                        <div class="card-header" id="headingEighteen">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseEighteen" aria-expanded="true"
                                    aria-controls="collapseEighteen" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> MCD
                                </button>
                            </h2>
                        </div>

                        <div id="collapseEighteen" class="collapse" aria-labelledby="headingEighteen"
                            data-parent="#accordionEighteen">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.CONTROL" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionNinehteen">
                    <div class="card">
                        <div class="card-header" id="headingNinehteen">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseNinehteen" aria-expanded="true"
                                    aria-controls="collapseNinehteen" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> MCE
                                </button>
                            </h2>
                        </div>

                        <div id="collapseNinehteen" class="collapse" aria-labelledby="headingNinehteen"
                            data-parent="#accordionNinehteen">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.CONTROL" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionTwenty">
                    <div class="card">
                        <div class="card-header" id="headingTwenty">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseTwenty" aria-expanded="true" aria-controls="collapseTwenty"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> MCF
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwenty" class="collapse" aria-labelledby="headingTwenty"
                            data-parent="#accordionTwenty">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.CONTROL" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionTwentyOne">
                    <div class="card">
                        <div class="card-header" id="headingTwentyOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseTwentyOne" aria-expanded="true"
                                    aria-controls="collapseTwentyOne" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> MCG
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwentyOne" class="collapse" aria-labelledby="headingTwentyOne"
                            data-parent="#accordionTwentyOne">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.CONTROL" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionTwentyTwo">
                    <div class="card">
                        <div class="card-header" id="headingTwentyTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseTwentyTwo" aria-expanded="true"
                                    aria-controls="collapseTwentyTwo" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> FAN1
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwentyTwo" class="collapse" aria-labelledby="headingTwentyTwo"
                            data-parent="#accordionTwentyTwo">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.GENSET" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionTwentyThree">
                    <div class="card">
                        <div class="card-header" id="headingTwentyThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseTwentyThree" aria-expanded="true"
                                    aria-controls="collapseTwentyThree" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> FAN2
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwentyThree" class="collapse" aria-labelledby="headingTwentyThree"
                            data-parent="#accordionTwentyThree">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.GENSET" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionTwentyFour">
                    <div class="card">
                        <div class="card-header" id="headingTwentyFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseTwentyFour" aria-expanded="true"
                                    aria-controls="collapseTwentyFour" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> FAN3
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwentyFour" class="collapse" aria-labelledby="headingTwentyFour"
                            data-parent="#accordionTwentyFour">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.GENSET" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionTwentyFive">
                    <div class="card">
                        <div class="card-header" id="headingTwentyFive">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseTwentyFive" aria-expanded="true"
                                    aria-controls="collapseTwentyFive" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> FAN4
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwentyFive" class="collapse" aria-labelledby="headingTwentyFive"
                            data-parent="#accordionTwentyFive">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.GENSET" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionTwentySix">
                    <div class="card">
                        <div class="card-header" id="headingTwentySix">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseTwentySix" aria-expanded="true"
                                    aria-controls="collapseTwentySix" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> FAN5
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwentySix" class="collapse" aria-labelledby="headingTwentySix"
                            data-parent="#accordionTwentySix">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.GENSET" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionTwentySeven">
                    <div class="card">
                        <div class="card-header" id="headingTwentySeven">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseTwentySeven" aria-expanded="true"
                                    aria-controls="collapseTwentySeven" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> FAN6
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwentySeven" class="collapse" aria-labelledby="headingTwentySeven"
                            data-parent="#accordionTwentySeven">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.GENSET" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionTwentyEight">
                    <div class="card">
                        <div class="card-header" id="headingTwentyEight">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseTwentyEight" aria-expanded="true"
                                    aria-controls="collapseTwentyEight" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> FAN7
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwentyEight" class="collapse" aria-labelledby="headingTwentyEight"
                            data-parent="#accordionTwentyEight">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="R.GENSET" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionTwentyNine">
                    <div class="card">
                        <div class="card-header" id="headingTwentyNine">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseTwentyNine" aria-expanded="true"
                                    aria-controls="collapseTwentyNine" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PANEL
                                    CHARGING
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwentyNine" class="collapse" aria-labelledby="headingTwentyNine"
                            data-parent="#accordionTwentyNine">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="PARKIRAN" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            <div class="container-fluid">
                <div class="accordion" id="accordionThirty">
                    <div class="card">
                        <div class="card-header" id="headingThirty">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseThirty" aria-expanded="true" aria-controls="collapseThirty"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PANEL
                                    RTU
                                </button>
                            </h2>
                        </div>

                        <div id="collapseThirty" class="collapse" aria-labelledby="headingThirty"
                            data-parent="#accordionThirty">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T - G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G - N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                    <div
                                        class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                        <span>TEGANGAN (VOLT)</span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>R</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganR') is-invalid @enderror"
                                                        id="teganganR" name="teganganR"
                                                        value="{{ old('teganganR') }}" placeholder="Tegangan R">

                                                    @error('teganganR')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>S</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganS') is-invalid @enderror"
                                                        id="teganganS" name="teganganS"
                                                        value="{{ old('teganganS') }}" placeholder="Tegangan S">

                                                    @error('teganganS')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>T</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>N</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>G</label>
                                                    <input type="text"
                                                        class="form-control @error('teganganT') is-invalid @enderror"
                                                        id="teganganT" name="teganganT"
                                                        value="{{ old('teganganT') }}" placeholder="Tegangan T">

                                                    @error('teganganT')
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
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>DAYA (Watt)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>FREKUENSI (Hz)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>POSISI PANEL</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="RUANG KABEL" readonly disabled>

                                            @error('teganganR')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label>BATT (Vdc)</label>
                                            <input type="text"
                                                class="form-control @error('teganganR') is-invalid @enderror"
                                                id="teganganR" name="teganganR" value="{{ old('teganganR') }}"
                                                placeholder="Tegangan R">

                                            @error('teganganR')
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
            </div> --}}
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
                                            id="catatan" placeholder="Deskripsi" >{!! $formPs2PanelDuaMingguans[0]->catatan ??
'PANEL RTU =
F100 =
F530 =
INC.A =
F510 =
F540 =
INC.B =
F520 ='!!}
                                        </textarea>
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
