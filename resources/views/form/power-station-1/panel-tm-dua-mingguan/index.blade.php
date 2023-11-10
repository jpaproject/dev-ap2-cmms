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
        <form method="POST" action="{{ route('form.ps1.panel-tm-dua-mingguan.update', $detailWorkOrderForm->id) }}"
            enctype="multipart/form-data" id="form">
            @method('patch')
            @csrf

            {{-- Panel Synchron --}}
            <div class="container-fluid">
                <div class="accordion" id="accordionOne">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                    onclick="showHide(this)">
                                    PANEL Synchron
                                    <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="show collapse" aria-labelledby="headingOne"
                            data-parent="#accordionOne">
                            <div class="card-body">
                                <div class="row d-flex align-items-center">
                                    <div class="col-12 col-md-3 col-lg-3 d-flex align-items-center justify-content-center">
                                        <span>Asset</span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6"><input type="text" class="form-control"
                                            id="panel-synchron-asset" placeholder="Enter..">

                                        @error('pick-time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3"><button type="button"
                                            class="btn btn-outline-primary w-100" id="btn-add-document"
                                            onclick="addField('panel-synchron')">
                                            <i class="fas fa-plus-square"> <span
                                                    style="font-family: Poppins, sans-serif !important;"> Add New</span>
                                            </i>
                                        </button>
                                    </div>
                                </div>
                                <hr class="bg-primary mb-4 mt-5">
                                @include('components.form-message')
                                <div class="panel-synchron-area">
                                    @foreach ($panelSynchrons as $panelSynchron)
                                    @if(!$loop->first)<hr class="border-secondary">@endif
                                        <div class="panel-synchron-row">
                                            <div class="row d-flex justify-content-end mb-2">
                                                <button type="button" class="btn btn-outline-danger btn-remove"
                                                    onclick="deleteAccordion(this)">Hapus <i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                                    <span>{{ $panelSynchron->asset_name }}</span>
                                                    <input type="hidden" name="panel_synchron_asset_name[]" value="{{ $panelSynchron->asset_name }}">
                                                </div>
                                                <div class="col-12 col-lg-9">
                                                    <div class="row">
                                                        @foreach ($datas as $data)
                                                            @if (is_array($data['satuan']))
                                                                <div class="col-4 col-lg-3 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>{{ $data['data_teknis'] }}</label>
                                                                        <select
                                                                            class="form-control @error('panel_synchron_' . $data['name'] . '.' . $loop->index) is-invalid @enderror"
                                                                            name="{{ 'panel_synchron_' . $data['name'] }}[]">
                                                                            <option value=" " selected>Choose Selection
                                                                            </option>
                                                                            @foreach ($datas[$loop->index]['satuan'] as $satuan)
                                                                                <option value="{{ $satuan }}"
                                                                                    {{ (old('panel_synchron_' . $data['name'] . '.' . $loop->index) ?? $panelSynchron[$data['name']]) == $satuan ? 'selected' : '' }}>
                                                                                    {{ $satuan }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('panel_synchron_' . $data['name'] . '.' .
                                                                            $loop->index)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="col-4 col-lg-3 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>{{ $data['data_teknis'] }}</label>
                                                                        <input type="text"
                                                                            class="form-control @error('panel_synchron_' . $data['name'] . '.' . $loop->index)) is-invalid @enderror"
                                                                            id="{{ 'panel_synchron_' . $data['name'] }}[]"
                                                                            name="{{ 'panel_synchron_' . $data['name'] }}[]"
                                                                            value="{{ old('panel_synchron_' . $data['name'] . '.' . $loop->index) ?? $panelSynchron[$datas[$loop->iteration]['name']] }}"
                                                                            placeholder="{{ $data['name'] }}">

                                                                        @error('panel_synchron_' . $data['name'] . '.' .
                                                                            $loop->index)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Keterangan</label>
                                                                <textarea name="panel_synchron_keterangan[]"
                                                                    class="form-control @error('panel_synchron_keterangan.' . $loop->index) is-invalid @enderror"
                                                                    id="panel_synchron_keterangan" placeholder="Deskripsi">{!! old('panel_synchron_keterangan.' . $loop->index) ?? $panelSynchron->keterangan !!}</textarea>


                                                                @error('panel_synchron_keterangan.' . $loop->index)
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
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- ER1B --}}
            <div class="container-fluid">
                <div class="accordion" id="accordionTwo">
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"
                                    onclick="showHide(this)">
                                    ER1B
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionTwo">
                            <div class="card-body">
                                <div class="row d-flex align-items-center">
                                    <div class="col-12 col-md-3 col-lg-3 d-flex align-items-center justify-content-center">
                                        <span>Asset</span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6"><input type="text" class="form-control"
                                            id="er1b-asset" placeholder="Enter..">

                                        @error('pick-time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3"><button type="button"
                                            class="btn btn-outline-primary w-100" id="btn-add-document"
                                            onclick="addField('er1b')">
                                            <i class="fas fa-plus-square"> <span
                                                    style="font-family: Poppins, sans-serif !important;"> Add New</span>
                                            </i>
                                        </button>
                                    </div>
                                </div>
                                <hr class="bg-primary mb-4 mt-5">
                                @include('components.form-message')
                                <div class="er1b-area">
                                    @foreach ($er1bs as $er1b)
                                    @if(!$loop->first)<hr class="border-secondary">@endif
                                        <div class="er1b-row">
                                            <div class="row d-flex justify-content-end mb-2">
                                                <button type="button" class="btn btn-outline-danger btn-remove"
                                                    onclick="deleteAccordion(this)">Hapus <i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                                    <span>{{ $er1b->asset_name }}</span>
                                                    <input type="hidden" name="er1b_asset_name[]" value="{{ $er1b->asset_name }}">
                                                </div>
                                                <div class="col-12 col-lg-9">
                                                    <div class="row">
                                                        @foreach ($datas as $data)
                                                            @if (is_array($data['satuan']))
                                                                <div class="col-4 col-lg-3 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>{{ $data['data_teknis'] }}</label>
                                                                        <select
                                                                            class="form-control @error('er1b_' . $data['name'] . '.' . $loop->index) is-invalid @enderror"
                                                                            name="{{ 'er1b_' . $data['name'] }}[]">
                                                                            <option value=" " selected>Choose Selection
                                                                            </option>
                                                                            @foreach ($datas[$loop->index]['satuan'] as $satuan)
                                                                                <option value="{{ $satuan }}"
                                                                                    {{ (old('er1b_' . $data['name'] . '.' . $loop->index) ?? $er1b[$data['name']]) == $satuan ? 'selected' : '' }}>
                                                                                    {{ $satuan }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('er1b_' . $data['name'] . '.' .
                                                                            $loop->index)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="col-4 col-lg-3 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>{{ $data['data_teknis'] }}</label>
                                                                        <input type="text"
                                                                            class="form-control @error('er1b_' . $data['name'] . '.' . $loop->index)) is-invalid @enderror"
                                                                            id="{{ 'er1b_' . $data['name'] }}[]"
                                                                            name="{{ 'er1b_' . $data['name'] }}[]"
                                                                            value="{{ old('er1b_' . $data['name'] . '.' . $loop->index) ?? $er1b[$datas[$loop->iteration]['name']] }}"
                                                                            placeholder="{{ $data['name'] }}">

                                                                        @error('er1b_' . $data['name'] . '.' .
                                                                            $loop->index)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Keterangan</label>
                                                                <textarea name="er1b_keterangan[]"
                                                                    class="form-control @error('er1b_keterangan.' . $loop->index) is-invalid @enderror"
                                                                    id="er1b_keterangan" placeholder="Deskripsi">{!! old('er1b_keterangan.' . $loop->index) ?? $er1b->keterangan !!}</textarea>


                                                                @error('er1b_keterangan.' . $loop->index)
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
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ER7 --}}
            <div class="container-fluid">
                <div class="accordion" id="accordionThree">
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"
                                    onclick="showHide(this)">
                                    ER7
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordionThree">
                            <div class="card-body">
                                <div class="row d-flex align-items-center">
                                    <div class="col-12 col-md-3 col-lg-3 d-flex align-items-center justify-content-center">
                                        <span>Asset</span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6"><input type="text" class="form-control"
                                            id="er7-asset" placeholder="Enter..">

                                        @error('pick-time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3"><button type="button"
                                            class="btn btn-outline-primary w-100" id="btn-add-document"
                                            onclick="addField('er7')">
                                            <i class="fas fa-plus-square"> <span
                                                    style="font-family: Poppins, sans-serif !important;"> Add New</span>
                                            </i>
                                        </button>
                                    </div>
                                </div>
                                <hr class="bg-primary mb-4 mt-5">
                                @include('components.form-message')
                                <div class="er7-area">
                                    @foreach ($er7s as $er7)
                                    @if(!$loop->first)<hr class="border-secondary">@endif
                                        <div class="er7-row">
                                            <div class="row d-flex justify-content-end mb-2">
                                                <button type="button" class="btn btn-outline-danger btn-remove"
                                                    onclick="deleteAccordion(this)">Hapus <i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                                    <span>{{ $er7->asset_name }}</span>
                                                    <input type="hidden" name="er7_asset_name[]" value="{{ $er7->asset_name }}">
                                                </div>
                                                <div class="col-12 col-lg-9">
                                                    <div class="row">
                                                        @foreach ($datas as $data)
                                                            @if (is_array($data['satuan']))
                                                                <div class="col-4 col-lg-3 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>{{ $data['data_teknis'] }}</label>
                                                                        <select
                                                                            class="form-control @error('er7_' . $data['name'] . '.' . $loop->index) is-invalid @enderror"
                                                                            name="{{ 'er7_' . $data['name'] }}[]">
                                                                            <option value=" " selected>Choose Selection
                                                                            </option>
                                                                            @foreach ($datas[$loop->index]['satuan'] as $satuan)
                                                                                <option value="{{ $satuan }}"
                                                                                    {{ (old('er7_' . $data['name'] . '.' . $loop->index) ?? $er7[$data['name']]) == $satuan ? 'selected' : '' }}>
                                                                                    {{ $satuan }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('er7_' . $data['name'] . '.' .
                                                                            $loop->index)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="col-4 col-lg-3 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>{{ $data['data_teknis'] }}</label>
                                                                        <input type="text"
                                                                            class="form-control @error('er7_' . $data['name'] . '.' . $loop->index)) is-invalid @enderror"
                                                                            id="{{ 'er7_' . $data['name'] }}[]"
                                                                            name="{{ 'er7_' . $data['name'] }}[]"
                                                                            value="{{ old('er7_' . $data['name'] . '.' . $loop->index) ?? $er7[$datas[$loop->iteration]['name']] }}"
                                                                            placeholder="{{ $data['name'] }}">

                                                                        @error('er7_' . $data['name'] . '.' .
                                                                            $loop->index)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Keterangan</label>
                                                                <textarea name="er7_keterangan[]"
                                                                    class="form-control @error('er7_keterangan.' . $loop->index) is-invalid @enderror"
                                                                    id="er7_keterangan" placeholder="Deskripsi">{!! old('er7_keterangan.' . $loop->index) ?? $er7->keterangan !!}</textarea>


                                                                @error('er7_keterangan.' . $loop->index)
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
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ER6 --}}
            <div class="container-fluid">
                <div class="accordion" id="accordionFour">
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour"
                                    onclick="showHide(this)">
                                    ER6
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                            data-parent="#accordionFour">
                            <div class="card-body">
                                <div class="row d-flex align-items-center">
                                    <div class="col-12 col-md-3 col-lg-3 d-flex align-items-center justify-content-center">
                                        <span>Asset</span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6"><input type="text" class="form-control"
                                            id="er6-asset" placeholder="Enter..">

                                        @error('pick-time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3"><button type="button"
                                            class="btn btn-outline-primary w-100" id="btn-add-document"
                                            onclick="addField('er6')">
                                            <i class="fas fa-plus-square"> <span
                                                    style="font-family: Poppins, sans-serif !important;"> Add New</span>
                                            </i>
                                        </button>
                                    </div>
                                </div>
                                <hr class="bg-primary mb-4 mt-5">
                                @include('components.form-message')
                                <div class="er6-area">
                                    @foreach ($er6s as $er6)
                                    @if(!$loop->first)<hr class="border-secondary">@endif
                                        <div class="er6-row">
                                            <div class="row d-flex justify-content-end mb-2">
                                                <button type="button" class="btn btn-outline-danger btn-remove"
                                                    onclick="deleteAccordion(this)">Hapus <i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                                    <span>{{ $er6->asset_name }}</span>
                                                    <input type="hidden" name="er6_asset_name[]" value="{{ $er6->asset_name }}">
                                                </div>
                                                <div class="col-12 col-lg-9">
                                                    <div class="row">
                                                        @foreach ($datas as $data)
                                                            @if (is_array($data['satuan']))
                                                                <div class="col-4 col-lg-3 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>{{ $data['data_teknis'] }}</label>
                                                                        <select
                                                                            class="form-control @error('er6_' . $data['name'] . '.' . $loop->index) is-invalid @enderror"
                                                                            name="{{ 'er6_' . $data['name'] }}[]">
                                                                            <option value=" " selected>Choose Selection
                                                                            </option>
                                                                            @foreach ($datas[$loop->index]['satuan'] as $satuan)
                                                                                <option value="{{ $satuan }}"
                                                                                    {{ (old('er6_' . $data['name'] . '.' . $loop->index) ?? $er6[$data['name']]) == $satuan ? 'selected' : '' }}>
                                                                                    {{ $satuan }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('er6_' . $data['name'] . '.' .
                                                                            $loop->index)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="col-4 col-lg-3 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>{{ $data['data_teknis'] }}</label>
                                                                        <input type="text"
                                                                            class="form-control @error('er6_' . $data['name'] . '.' . $loop->index)) is-invalid @enderror"
                                                                            id="{{ 'er6_' . $data['name'] }}[]"
                                                                            name="{{ 'er6_' . $data['name'] }}[]"
                                                                            value="{{ old('er6_' . $data['name'] . '.' . $loop->index) ?? $er6[$datas[$loop->iteration]['name']] }}"
                                                                            placeholder="{{ $data['name'] }}">

                                                                        @error('er6_' . $data['name'] . '.' .
                                                                            $loop->index)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Keterangan</label>
                                                                <textarea name="er6_keterangan[]"
                                                                    class="form-control @error('er6_keterangan.' . $loop->index) is-invalid @enderror"
                                                                    id="er6_keterangan" placeholder="Deskripsi">{!! old('er6_keterangan.' . $loop->index) ?? $er6->keterangan !!}</textarea>


                                                                @error('er6_keterangan.' . $loop->index)
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
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ER2A --}}
            <div class="container-fluid">
                <div class="accordion" id="accordionFive">
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive"
                                    onclick="showHide(this)">
                                    ER2A
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                            data-parent="#accordionFive">
                            <div class="card-body">
                                <div class="row d-flex align-items-center">
                                    <div class="col-12 col-md-3 col-lg-3 d-flex align-items-center justify-content-center">
                                        <span>Asset</span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6"><input type="text" class="form-control"
                                            id="er2a-asset" placeholder="Enter..">

                                        @error('pick-time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3"><button type="button"
                                            class="btn btn-outline-primary w-100" id="btn-add-document"
                                            onclick="addField('er2a')">
                                            <i class="fas fa-plus-square"> <span
                                                    style="font-family: Poppins, sans-serif !important;"> Add New</span>
                                            </i>
                                        </button>
                                    </div>
                                </div>
                                <hr class="bg-primary mb-4 mt-5">
                                @include('components.form-message')
                                <div class="er2a-area">
                                    @foreach ($er2as as $er2a)
                                    @if(!$loop->first)<hr class="border-secondary">@endif
                                        <div class="er2a-row">
                                            <div class="row d-flex justify-content-end mb-2">
                                                <button type="button" class="btn btn-outline-danger btn-remove"
                                                    onclick="deleteAccordion(this)">Hapus <i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                                    <span>{{ $er2a->asset_name }}</span>
                                                    <input type="hidden" name="er2a_asset_name[]" value="{{ $er2a->asset_name }}">
                                                </div>
                                                <div class="col-12 col-lg-9">
                                                    <div class="row">
                                                        @foreach ($datas as $data)
                                                            @if (is_array($data['satuan']))
                                                                <div class="col-4 col-lg-3 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>{{ $data['data_teknis'] }}</label>
                                                                        <select
                                                                            class="form-control @error('er2a_' . $data['name'] . '.' . $loop->index) is-invalid @enderror"
                                                                            name="{{ 'er2a_' . $data['name'] }}[]">
                                                                            <option value=" " selected>Choose Selection
                                                                            </option>
                                                                            @foreach ($datas[$loop->index]['satuan'] as $satuan)
                                                                                <option value="{{ $satuan }}"
                                                                                    {{ (old('er2a_' . $data['name'] . '.' . $loop->index) ?? $er2a[$data['name']]) == $satuan ? 'selected' : '' }}>
                                                                                    {{ $satuan }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('er2a_' . $data['name'] . '.' .
                                                                            $loop->index)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="col-4 col-lg-3 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>{{ $data['data_teknis'] }}</label>
                                                                        <input type="text"
                                                                            class="form-control @error('er2a_' . $data['name'] . '.' . $loop->index)) is-invalid @enderror"
                                                                            id="{{ 'er2a_' . $data['name'] }}[]"
                                                                            name="{{ 'er2a_' . $data['name'] }}[]"
                                                                            value="{{ old('er2a_' . $data['name'] . '.' . $loop->index) ?? $er2a[$datas[$loop->iteration]['name']] }}"
                                                                            placeholder="{{ $data['name'] }}">

                                                                        @error('er2a_' . $data['name'] . '.' .
                                                                            $loop->index)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Keterangan</label>
                                                                <textarea name="er2a_keterangan[]"
                                                                    class="form-control @error('er2a_keterangan.' . $loop->index) is-invalid @enderror"
                                                                    id="er2a_keterangan" placeholder="Deskripsi">{!! old('er2a_keterangan.' . $loop->index) ?? $er2a->keterangan !!}</textarea>


                                                                @error('er2a_keterangan.' . $loop->index)
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
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ER2B --}}
            <div class="container-fluid">
                <div class="accordion" id="accordionSix">
                    <div class="card">
                        <div class="card-header" id="headingSix">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix"
                                    onclick="showHide(this)">
                                    ER2B
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                            data-parent="#accordionSix">
                            <div class="card-body">
                                <div class="row d-flex align-items-center">
                                    <div class="col-12 col-md-3 col-lg-3 d-flex align-items-center justify-content-center">
                                        <span>Asset</span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6"><input type="text" class="form-control"
                                            id="er2b-asset" placeholder="Enter..">

                                        @error('pick-time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3"><button type="button"
                                            class="btn btn-outline-primary w-100" id="btn-add-document"
                                            onclick="addField('er2b')">
                                            <i class="fas fa-plus-square"> <span
                                                    style="font-family: Poppins, sans-serif !important;"> Add New</span>
                                            </i>
                                        </button>
                                    </div>
                                </div>
                                <hr class="bg-primary mb-4 mt-5">
                                @include('components.form-message')
                                <div class="er2b-area">
                                    @foreach ($er2bs as $er2b)
                                    @if(!$loop->first)<hr class="border-secondary">@endif
                                        <div class="er2b-row">
                                            <div class="row d-flex justify-content-end mb-2">
                                                <button type="button" class="btn btn-outline-danger btn-remove"
                                                    onclick="deleteAccordion(this)">Hapus <i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                                    <span>{{ $er2b->asset_name }}</span>
                                                    <input type="hidden" name="er2b_asset_name[]" value="{{ $er2b->asset_name }}">
                                                </div>
                                                <div class="col-12 col-lg-9">
                                                    <div class="row">
                                                        @foreach ($datas as $data)
                                                            @if (is_array($data['satuan']))
                                                                <div class="col-4 col-lg-3 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>{{ $data['data_teknis'] }}</label>
                                                                        <select
                                                                            class="form-control @error('er2b_' . $data['name'] . '.' . $loop->index) is-invalid @enderror"
                                                                            name="{{ 'er2b_' . $data['name'] }}[]">
                                                                            <option value=" " selected>Choose Selection
                                                                            </option>
                                                                            @foreach ($datas[$loop->index]['satuan'] as $satuan)
                                                                                <option value="{{ $satuan }}"
                                                                                    {{ (old('er2b_' . $data['name'] . '.' . $loop->index) ?? $er2b[$data['name']]) == $satuan ? 'selected' : '' }}>
                                                                                    {{ $satuan }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('er2b_' . $data['name'] . '.' .
                                                                            $loop->index)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="col-4 col-lg-3 col-md-4">
                                                                    <div class="form-group">
                                                                        <label>{{ $data['data_teknis'] }}</label>
                                                                        <input type="text"
                                                                            class="form-control @error('er2b_' . $data['name'] . '.' . $loop->index)) is-invalid @enderror"
                                                                            id="{{ 'er2b_' . $data['name'] }}[]"
                                                                            name="{{ 'er2b_' . $data['name'] }}[]"
                                                                            value="{{ old('er2b_' . $data['name'] . '.' . $loop->index) ?? $er2b[$datas[$loop->iteration]['name']] }}"
                                                                            placeholder="{{ $data['name'] }}">

                                                                        @error('er2b_' . $data['name'] . '.' .
                                                                            $loop->index)
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Keterangan</label>
                                                                <textarea name="er2b_keterangan[]"
                                                                    class="form-control @error('er2b_keterangan.' . $loop->index) is-invalid @enderror"
                                                                    id="er2b_keterangan" placeholder="Deskripsi">{!! old('er2b_keterangan.' . $loop->index) ?? $er2b->keterangan !!}</textarea>


                                                                @error('er2b_keterangan.' . $loop->index)
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
                                    @endforeach
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
                                            placeholder="Deskripsi">{!! $er2bs[0]->catatan ?? '' !!}</textarea>
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
        // Access the PHP data and convert it to a JavaScript variable
        let datas = @json($datas);

        function showHide(button) {
            const child = $(button).parent().find("#accordion"); // get child element
            if (child.hasClass('fa-chevron-up')) {
                child.removeClass('fa-chevron-up').addClass('fa-chevron-down');; // logs "This is the child element"
            } else if (child.hasClass('fa-chevron-down')) {
                child.removeClass('fa-chevron-down').addClass('fa-chevron-up'); // logs "This is the child element"
            }
        }

        
        function addField(groupName) {
            const getAsset = $(`#${groupName}-asset`).val();
            const countAsset = $(`.${groupName}-row`).length;
            const underScoreGroupName = groupName.replace(/-/g, "_");
            if (getAsset == false) {
                $.alert({
                    icon: 'fas fa-exclamation-triangle',
                    title: 'Perhatian!',
                    type: 'warning',
                    content: 'Asset harus diisi!',
                });
            } else {
                // area panel-synchron-area hanyalah untuk penentuan lokasi dalam div
                $(`.${groupName}-area`).append(`
                <div class="${groupName}-row">
                    ${countAsset > 0 ? `<hr class="bg-secondary">` : ``}
                        <div class="row d-flex justify-content-end mb-2">
                            <button type="button" class="btn btn-outline-danger btn-remove"
                                onclick="deleteAccordion(this)">Hapus <i
                                    class="fa fa-trash"></i></button>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                <span>${getAsset}</span>
                                <input type="hidden" name="${underScoreGroupName}_asset_name[]" value="${getAsset}">
                            </div>
                            <div class="col-12 col-lg-9">
                                <div class="row">` +
                    loopDataTeknis(underScoreGroupName) + `
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea name="${underScoreGroupName}_keterangan[]" class="form-control"
                                            id="${underScoreGroupName}_keterangan" placeholder="Deskripsi"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`);
            }
            $(`#${groupName}-asset`).val('');
        }

        function loopDataTeknis(underScoreGroupName) {
            let result = ""; // Initialize the result variable here
            datas.forEach(function(data) {
                if (Array.isArray(data.satuan)) {
                    result +=
                        `<div class="col-4 col-lg-3 col-md-4">
                        <div class="form-group">
                            <label>${data.data_teknis}</label>
                            <select class="form-control" name="${underScoreGroupName}_${data.name}[]">
                                <option value="" selected>Choose Selection</option>` +
                        loopSatuan(data) +
                        `</select>
                        </div>
                    </div>`
                } else {
                    result +=
                        `<div class="col-4 col-lg-3 col-md-4">
                            <div class="form-group">
                                <label>${data.data_teknis}</label>
                                <input type="text" class="form-control" id="${underScoreGroupName}_${data.name}[]" name="${underScoreGroupName}_${data.name}[]"
                                value="" placeholder="${data.name}">
                            </div>
                        </div>`;
                }
            });
            return result; // Return the generated HTML
        };

        function loopSatuan(data) {
            let result = ""; // Initialize the result variable here
            data.satuan.forEach(function(satuan) {
                result += `<option value="${satuan}">${satuan}</option>`
            });
            return result; // Return the generated HTML
        };

        function deleteAccordion(e) {
            var parent = $(event.target).parent().parent();
            parent.remove();
        }
    </script>
@endsection
