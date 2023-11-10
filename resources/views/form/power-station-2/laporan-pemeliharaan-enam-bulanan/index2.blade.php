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
            action="{{ route('form.ps2.laporan-pemeliharaan-enam-bulanan.update', $detailWorkOrderForm->id) }}"
            enctype="multipart/form-data" id="form">
            @method('patch')
            @csrf

            {{-- <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Data Baru</h3>
                            </div>
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row d-flex align-items-center">
                                    <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center">
                                        <span>Nama Panel</span>
                                    </div>
                                    <div class="col-12 col-lg-5 col-md-6">
                                        <input type="text" class="form-control" id="panelName" name=""
                                            placeholder="Enter..">

                                        @error('pick-time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-6">
                                        <button type="button" class="btn btn-outline-primary w-100" id="btn-add-document"
                                            onclick="addField()">
                                            <i class="fas fa-plus-square"> <span
                                                    style="font-family: Poppins, sans-serif !important;"> Add New</span>
                                            </i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="container-fluid">
                <div class="accordion" id="accordionOne">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i> PANEL MV
                                    20
                                    KV
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionOne">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row mb-3" id="row-check">
                                    <div class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                        <span>NAMA PANEL</span>
                                    </div>
                                    <div class="col-12 col-lg-8">
                                        <div class="row justify-content-center add-check-panel-area">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control @error('panel.' . 0) is-invalid @enderror"
                                                        id="panel1" name="panel[]"
                                                        value="{{ $formPs2PemeliharaanEnamBulanans[0]->panel ?? old('panel' . 0) }}"
                                                        placeholder="Enter..">

                                                    @error('panel.' . 0)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control @error('panel.' . 1) is-invalid @enderror"
                                                        id="panel2" name="panel[]"
                                                        value="{{ $formPs2PemeliharaanEnamBulanans[1]->panel ?? old('panel' . 1) }}"
                                                        placeholder="Enter..">

                                                    @error('panel.' . 1)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control @error('panel.' . 2) is-invalid @enderror"
                                                        id="panel3" name="panel[]"
                                                        value="{{ $formPs2PemeliharaanEnamBulanans[2]->panel ?? old('panel' . 2) }}"
                                                        placeholder="Enter..">

                                                    @error('panel.' . 2)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @for ($i = 0; $i < 26; $i++)
                                    <hr>
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span>{{ $spesifikasi_pemeliharaan_panels[$i]['title'] }}</span>
                                        </div>
                                        @php
                                            $object = $spesifikasi_pemeliharaan_panels[$i]['name'];
                                        @endphp
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center add-check-panel-area">
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="{{ $object }}[]" value="1"
                                                            @if (($formPs2PemeliharaanEnamBulanans[0]->$object == 1) == 1) checked @endif>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="{{ $object }}[]" value="2"
                                                            @if (($formPs2PemeliharaanEnamBulanans[1]->$object == 2) == 2) checked @endif>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="{{ $object }}[]" value="3"
                                                            @if (($formPs2PemeliharaanEnamBulanans[2]->$object == 3) == 3) checked @endif>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                                <div class="row mb-3" id="row-check">
                                    <div class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                        <span>L1 - G (GΩ)</span>
                                    </div>
                                    <div class="col-12 col-lg-8">
                                        <div class="row justify-content-center">
                                            <input type="text"
                                                class="form-control @error('l1g_panel') is-invalid @enderror" id="l1g_panel"
                                                name="l1g_panel"
                                                value="{{ $formPs2PemeliharaanEnamBulanans[0]->l1g_panel ?? old('l1g_panel') }}"
                                                placeholder="Enter..">

                                            @error('l1g_panel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3" id="row-check">
                                    <div class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                        <span>L2 - G (GΩ)</span>
                                    </div>
                                    <div class="col-12 col-lg-8">
                                        <div class="row justify-content-center">
                                            <input type="text"
                                                class="form-control @error('l2g_panel') is-invalid @enderror"
                                                id="l2g_panel" name="l2g_panel"
                                                value="{{ $formPs2PemeliharaanEnamBulanans[0]->l2g_panel ?? old('l2g_panel') }}"
                                                placeholder="Enter..">

                                            @error('l2g_panel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3" id="row-check">
                                    <div class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                        <span>L3 - G (GΩ)</span>
                                    </div>
                                    <div class="col-12 col-lg-8">
                                        <div class="row justify-content-center">
                                            <input type="text"
                                                class="form-control @error('l3g_panel') is-invalid @enderror"
                                                id="l3g_panel" name="l3g_panel"
                                                value="{{ $formPs2PemeliharaanEnamBulanans[0]->l3g_panel ?? old('l3g_panel ') }}"
                                                placeholder="Enter..">

                                            @error('l3g_panel ')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @for ($i = 26; $i < 28; $i++)
                                    <hr>
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span>{{ $spesifikasi_pemeliharaan_panels[$i]['title'] }}</span>
                                        </div>
                                        @php
                                            $object = $spesifikasi_pemeliharaan_panels[$i]['name'];
                                        @endphp
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center add-check-panel-area">
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="{{ $object }}[]" value="1"
                                                            @if ($formPs2PemeliharaanEnamBulanans[0]->$object == 1) checked @endif>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="{{ $object }}[]" value="2"
                                                            @if ($formPs2PemeliharaanEnamBulanans[1]->$object == 2) checked @endif>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="{{ $object }}[]" value="3"
                                                            @if ($formPs2PemeliharaanEnamBulanans[2]->$object == 3) checked @endif>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="accordion" id="accordionTwo">
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                                        aria-controls="collapseTwo" onclick="showHide(this)">
                                        <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                        KABEL 20
                                        KV
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionTwo">
                                <div class="card-body">
                                    @for ($i = 0; $i < 4; $i++)
                                        <hr>
                                        <div class="row mb-3" id="row-check">
                                            <div
                                                class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                                <span>{{ $spesifikasi_pemeliharaan_kabels[$i]['title'] }}</span>
                                            </div>
                                            @php
                                                $object = $spesifikasi_pemeliharaan_kabels[$i]['name'];
                                            @endphp
                                            <div class="col-12 col-lg-8">
                                                <div class="row justify-content-center add-check-panel-area">
                                                    <div class="col-4">
                                                        <div class="form-group d-flex justify-content-center">
                                                            <input type="checkbox" class="flat largerCheckbox"
                                                                name="{{ $object }}[]" value="1"
                                                                @if ($formPs2PemeliharaanEnamBulanans[0]->$object == 1) checked @endif>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group d-flex justify-content-center">
                                                            <input type="checkbox" class="flat largerCheckbox"
                                                                name="{{ $object }}[]" value="2"
                                                                @if ($formPs2PemeliharaanEnamBulanans[1]->$object == 2) checked @endif>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group d-flex justify-content-center">
                                                            <input type="checkbox" class="flat largerCheckbox"
                                                                name="{{ $object }}[]" value="3"
                                                                @if ($formPs2PemeliharaanEnamBulanans[2]->$object == 3) checked @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                    <hr>
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span>L1 - G (GΩ)</span>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center">
                                                <input type="text"
                                                    class="form-control @error('l1g_kabel') is-invalid @enderror"
                                                    id="l1g_kabel" name="l1g_kabel"
                                                    value="{{ $formPs2PemeliharaanEnamBulanans[0]->l1g_kabel ?? old('l1g_kabel') }}"
                                                    placeholder="Enter..">

                                                @error('l1g_kabel')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span>L2 - G (GΩ)</span>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center">
                                                <input type="text"
                                                    class="form-control @error('l2g_kabel') is-invalid @enderror"
                                                    id="l2g_kabel" name="l2g_kabel"
                                                    value="{{ $formPs2PemeliharaanEnamBulanans[0]->l2g_kabel ?? old('l2g_kabel') }}"
                                                    placeholder="Enter..">

                                                @error('l2g_kabel')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span>L3 - G (GΩ)</span>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center">
                                                <input type="text"
                                                    class="form-control @error('l3g_kabel') is-invalid @enderror"
                                                    id="l3g_kabel" name="l3g_kabel"
                                                    value="{{ $formPs2PemeliharaanEnamBulanans[0]->l3g_kabel ?? old('l3g_kabel') }}"
                                                    placeholder="Enter..">

                                                @error('l3g_kabel')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span>L1 - L2 (GΩ)</span>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center">
                                                <input type="text"
                                                    class="form-control @error('l1_l2_kabel') is-invalid @enderror"
                                                    id="l1_l2_kabel" name="l1_l2_kabel"
                                                    value="{{ $formPs2PemeliharaanEnamBulanans[0]->l1_l2_kabel ?? old('l1_l2_kabel') }}"
                                                    placeholder="Enter..">

                                                @error('l1_l2_kabel')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span>L2 - L3 (GΩ)</span>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center">
                                                <input type="text"
                                                    class="form-control @error('l2_l3_kabel') is-invalid @enderror"
                                                    id="l2_l3_kabel" name="l2_l3_kabel"
                                                    value="{{ $formPs2PemeliharaanEnamBulanans[0]->l2_l3_kabel ?? old('l2_l3_kabel') }}"
                                                    placeholder="Enter..">

                                                @error('l2_l3_kabel')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span>L1 - L3 (GΩ)</span>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center">
                                                <input type="text"
                                                    class="form-control @error('l1_l3_kabel') is-invalid @enderror"
                                                    id="l1_l3_kabel" name="l1_l3_kabel"
                                                    value="{{ $formPs2PemeliharaanEnamBulanans[0]->l1_l3_kabel ?? old('l1_l3_kabel') }}"
                                                    placeholder="Enter..">

                                                @error('l1_l3_kabel')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    @for ($i = 4; $i < 6; $i++)
                                        <hr>
                                        <div class="row mb-3" id="row-check">
                                            <div
                                                class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                                <span>{{ $spesifikasi_pemeliharaan_kabels[$i]['title'] }}</span>
                                            </div>
                                            @php
                                                $object = $spesifikasi_pemeliharaan_kabels[$i]['name'];
                                            @endphp
                                            <div class="col-12 col-lg-8">
                                                <div class="row justify-content-center add-check-panel-area">
                                                    <div class="col-4">
                                                        <div class="form-group d-flex justify-content-center">
                                                            <input type="checkbox" class="flat largerCheckbox"
                                                                name="{{ $object }}[]" value="1"
                                                                @if ($formPs2PemeliharaanEnamBulanans[0]->$object == 1) checked @endif>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group d-flex justify-content-center">
                                                            <input type="checkbox" class="flat largerCheckbox"
                                                                name="{{ $object }}[]" value="2"
                                                                @if ($formPs2PemeliharaanEnamBulanans[1]->$object == 2) checked @endif>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group d-flex justify-content-center">
                                                            <input type="checkbox" class="flat largerCheckbox"
                                                                name="{{ $object }}[]" value="3"
                                                                @if ($formPs2PemeliharaanEnamBulanans[2]->$object == 3) checked @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                    {{-- <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span>PEMERIKSAAN KONDISI FISIK BAGIAN LUAR KABEL</span>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center add-check-panel-area">
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="q1_kabel1" value="{{ old('q1_kabel1') }}">

                                                        @error('q1_kabel1')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="q1_kabel2" value="{{ old('q1_kabel2') }}">

                                                        @error('q1_kabel2')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="q1_kabel3" value="{{ old('q1_kabel3') }}">

                                                        @error('q1_kabel3')
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
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span>PEMERIKSAAN KONDISI PEMEGANG KABEL (KABEL TRAY, BAUT, KLEM DAN
                                                LAINYA)</span>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center add-check-panel-area">
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="q2_kabel1" value="{{ old('q2_kabel1') }}">

                                                        @error('q2_kabel1')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="q2_kabel2" value="{{ old('q2_kabel2') }}">

                                                        @error('q2_kabel2')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="q2_kabel3" value="{{ old('q2_kabel3') }}">

                                                        @error('q2_kabel3')
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
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span>PEMERIKSAAN KONDISI TERMINAL SAMBUNGAN KABEL (PLUG IN)</span>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center add-check-panel-area">
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="q3_kabel1" value="{{ old('q3_kabel1') }}">

                                                        @error('q3_kabel1')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="q3_kabel2" value="{{ old('q3_kabel2') }}">

                                                        @error('q3_kabel2')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="q3_kabel3" value="{{ old('q3_kabel3') }}">

                                                        @error('q3_kabel3')
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
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span> PEMERIKSAAN & PENGUJIAN TAHANAN ISOLASI KABEL (GW)</span>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center add-check-panel-area">
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="q4_kabel1" value="{{ old('q4_kabel1') }}">

                                                        @error('q4_kabel1')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="q4_kabel2" value="{{ old('q4_kabel2') }}">

                                                        @error('q4_kabel2')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="q4_kabel3" value="{{ old('q4_kabel3') }}">

                                                        @error('q4_kabel3')
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
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span>L1 - G (GΩ)</span>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center">
                                                <input type="text"
                                                    class="form-control @error('l1g_kabel') is-invalid @enderror"
                                                    id="l1g_kabel" name="l1g_kabel" value="{{ old('l1g_kabel') }}"
                                                    placeholder="Enter..">

                                                @error('l1g_kabel')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span>L2 - G (GΩ)</span>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center">
                                                <input type="text"
                                                    class="form-control @error('l2g_kabel') is-invalid @enderror"
                                                    id="l2g_kabel" name="l2g_kabel" value="{{ old('l2g_kabel') }}"
                                                    placeholder="Enter..">

                                                @error('l2g_kabel')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span>L3 - G (GΩ)</span>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center">
                                                <input type="text"
                                                    class="form-control @error('l3g_kabel') is-invalid @enderror"
                                                    id="l3g_kabel" name="l3g_kabel" value="{{ old('l3g_kabel') }}"
                                                    placeholder="Enter..">

                                                @error('l3g_kabel')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span>L1 - L2 (GΩ)</span>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center">
                                                <input type="text"
                                                    class="form-control @error('l1_l2_kabel') is-invalid @enderror"
                                                    id="l1_l2_kabel" name="l1_l2_kabel" value="{{ old('l1_l2_kabel') }}"
                                                    placeholder="Enter..">

                                                @error('l1_l2_kabel')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span>L2 - L3 (GΩ)</span>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center">
                                                <input type="text"
                                                    class="form-control @error('l2_l3_kabel') is-invalid @enderror"
                                                    id="l2_l3_kabel" name="l2_l3_kabel" value="{{ old('l2_l3_kabel') }}"
                                                    placeholder="Enter..">

                                                @error('l2_l3_kabel')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span>L1 - L3 (GΩ)</span>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center">
                                                <input type="text"
                                                    class="form-control @error('l1_l3_kabel') is-invalid @enderror"
                                                    id="l1_l3_kabel" name="l1_l3_kabel" value="{{ old('l1_l3_kabel') }}"
                                                    placeholder="Enter..">

                                                @error('l1_l3_kabel')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span> MEMBERSIHKAN & MERAPIKAN AREA SEKITAR PERALATAN</span>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center add-check-panel-area">
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="q5_kabel1" value="{{ old('q5_kabel1') }}">

                                                        @error('q5_kabel1')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="q5_kabel2" value="{{ old('q5_kabel2') }}">

                                                        @error('q5_kabel2')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="q5_kabel3" value="{{ old('q5_kabel3') }}">

                                                        @error('q5_kabel3')
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
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <span> SELESAI PEKERJAAN PERALATAN NORMAL OPERASI </span>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center add-check-panel-area">
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="q6_kabel1" value="{{ old('q6_kabel1') }}">

                                                        @error('q6_kabel1')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="q6_kabel2" value="{{ old('q6_kabel2') }}">

                                                        @error('q6_kabel2')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="checkbox" class="flat largerCheckbox"
                                                            name="q6_kabel3" value="{{ old('q6_kabel3') }}">

                                                        @error('q6_kabel3')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
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
                                                placeholder="Deskripsi"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-footer">Add</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-footer">Back</a>
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

        function addField() {
            const getPanelName = $('#panelName').val();
            $('#row-check').removeClass('mb-3');
            if ($('#panelName').val() == '') {
                alert('Nama Panel Harus Diisi!');
            } else {
                // area disini hanyalah untuk penentuan lokasi dalam div
                $('.add-check-panel-area').append(`
                <div class="col-6 col-lg-4 col-md-6">
                    <label class="d-flex justify-content-center" for="">PANEL ${getPanelName}</label>
                    <div class="form-group d-flex justify-content-center">
                        <input type="checkbox" class="flat largerCheckbox" name="inputPanelArea[]">

                        @error('teganganR')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            `);

                $('.add-check-kabel-area').append(`
                <div class="col-6 col-lg-4 col-md-6">
                    <label class="d-flex justify-content-center" for="">PANEL ${getPanelName}</label>
                    <div class="form-group d-flex justify-content-center">
                        <input type="checkbox" class="flat largerCheckbox" name="inputKabelArea[]">

                        @error('teganganR')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            `);

            }

            $('#panelName').val('');
        }
    </script>
@endsection
