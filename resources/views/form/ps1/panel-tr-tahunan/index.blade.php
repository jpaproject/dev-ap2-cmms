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
        <form method="POST" action="{{ route('form.ps1.panel-tr-tahunan.update', $detailWorkOrderForm->id) }}"
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
                                    <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i> PANEL NP0
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="show collapse" aria-labelledby="headingOne"
                            data-parent="#accordionOne">
                            <div class="card-body">

                                @include('components.form-message')
                                @foreach ($panelNp0s as $keyNp0 => $panelNp0)
                                    <div class="row">
                                        <div
                                            class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                            <span>{{ $panelNp0['pertanyaan'] }}</span>
                                        </div>
                                        <div class="col-12 col-lg-9">
                                            <div class="row">
                                                @if ($loop->iteration < 4)
                                                    @foreach ($columns as $column)
                                                        @if (is_array($panelNp0['satuan']))
                                                            <div class="col-4 col-lg-4 col-md-4">
                                                                <div class="form-group">
                                                                    <label>{{ $column['title'] }}</label>
                                                                    <select
                                                                        class="form-control @error('panel_np0_' . $column['name'] . '.' . $keyNp0) is-invalid @enderror"
                                                                        name="{{ 'panel_np0_' . $column['name'] }}[]">
                                                                        <option value=" " selected>Choose Selection
                                                                        </option>
                                                                        @foreach ($panelNp0['satuan'] as $satuan)
                                                                            <option value="{{ $satuan }}"
                                                                                {{ (old('panel_np0_' . $column['name'] . '.' . $keyNp0) ?? $formPs1PanelTrTahunanNp0s[$keyNp0][$column['name']]) == $satuan ? 'selected' : '' }}>
                                                                                {{ $satuan }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('panel_np0_' . $column['name'] . '.' . $keyNp0)
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="col-4 col-lg-4 col-md-4">
                                                                <div class="form-group">
                                                                    <label>{{ $column['title'] }}</label>
                                                                    <input type="text"
                                                                        class="form-control @error('panel_np0_' . $column['name'] . '.' . $keyNp0)) is-invalid @enderror"
                                                                        id="{{ 'panel_np0_' . $column['name'] }}[]"
                                                                        name="{{ 'panel_np0_' . $column['name'] }}[]"
                                                                        value="{{ old('panel_np0_' . $column['name'] . '.' . $keyNp0) ?? $formPs1PanelTrTahunanNp0s[$keyNp0][$column['name']] }}"
                                                                        placeholder="{{ $column['title'] }}">

                                                                    @error('panel_np0_' . $column['name'] . '.' . $keyNp0)
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @if (is_array($panelNp0['satuan']))
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>{{ implode('/', $panelNp0['satuan']) }}</label>
                                                                <select
                                                                    class="form-control @error('panel_np0_q4' . '.' . $keyNp0) is-invalid @enderror"
                                                                    name="{{ 'panel_np0_q4' }}[]">
                                                                    <option value=" " selected>Choose Selection
                                                                    </option>
                                                                    @foreach ($panelNp0['satuan'] as $satuan)
                                                                        <option value="{{ $satuan }}"
                                                                            {{ (old('panel_np0_q4' . '.' . $keyNp0) ?? $formPs1PanelTrTahunanNp0s[$keyNp0]['q4']) == $satuan ? 'selected' : '' }}>
                                                                            {{ $satuan }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('panel_np0_q4' . '.' . $keyNp0)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>{{ $panelNp0['satuan'] }}</label>
                                                                <input type="text"
                                                                    class="form-control @error('panel_np0_q4' . '.' . $keyNp0)) is-invalid @enderror"
                                                                    id="{{ 'panel_np0_q4' }}[]"
                                                                    name="{{ 'panel_np0_q4' }}[]"
                                                                    value="{{ old('panel_np0_q4' . '.' . $keyNp0) ?? $formPs1PanelTrTahunanNp0s[$keyNp0]['q4'] }}"
                                                                    placeholder="{{ $panelNp0['satuan'] }}">

                                                                @error('panel_np0_q4' . '.' . $keyNp0)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <textarea name="panel_np0_keterangan[]"
                                                            class="form-control @error('panel_np0_keterangan.' . $keyNp0) is-invalid @enderror" id="panel_np0_keterangan"
                                                            placeholder="Deskripsi">{!! old('panel_np0_keterangan.' . $keyNp0) ?? $formPs1PanelTrTahunanNp0s[$keyNp0]['keterangan'] !!}</textarea>


                                                        @error('panel_np0_keterangan.' . $keyNp0)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if (!$loop->last)
                                        <hr class="bg-primary">
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
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PANEL T0
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionTwo">
                            <div class="card-body">

                                @include('components.form-message')
                                @foreach ($panelT0s as $keyT0 => $panelT0)
                                    <div class="row">
                                        <div
                                            class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                            <span>{{ $panelT0['pertanyaan'] }}</span>
                                        </div>
                                        <div class="col-12 col-lg-9">
                                            <div class="row">
                                                @if ($loop->iteration < 4)
                                                    @foreach ($columns as $column)
                                                        @if (is_array($panelT0['satuan']))
                                                            <div class="col-4 col-lg-4 col-md-4">
                                                                <div class="form-group">
                                                                    <label>{{ $column['title'] }}</label>
                                                                    <select
                                                                        class="form-control @error('panel_t0_' . $column['name'] . '.' . $keyT0) is-invalid @enderror"
                                                                        name="{{ 'panel_t0_' . $column['name'] }}[]">
                                                                        <option value=" " selected>Choose Selection
                                                                        </option>
                                                                        @foreach ($panelT0['satuan'] as $satuan)
                                                                            <option value="{{ $satuan }}"
                                                                                {{ (old('panel_t0_' . $column['name'] . '.' . $keyT0) ?? $formPs1PanelTrTahunanT0s[$keyT0][$column['name']]) == $satuan ? 'selected' : '' }}>
                                                                                {{ $satuan }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('panel_t0_' . $column['name'] . '.' . $keyT0)
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="col-4 col-lg-4 col-md-4">
                                                                <div class="form-group">
                                                                    <label>{{ $column['title'] }}</label>
                                                                    <input type="text"
                                                                        class="form-control @error('panel_t0_' . $column['name'] . '.' . $keyT0)) is-invalid @enderror"
                                                                        id="{{ 'panel_t0_' . $column['name'] }}[]"
                                                                        name="{{ 'panel_t0_' . $column['name'] }}[]"
                                                                        value="{{ old('panel_t0_' . $column['name'] . '.' . $keyT0) ?? $formPs1PanelTrTahunanT0s[$keyT0][$column['name']] }}"
                                                                        placeholder="{{ $column['title'] }}">

                                                                    @error('panel_t0_' . $column['name'] . '.' . $keyT0)
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @if (is_array($panelT0['satuan']))
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>{{ implode('/', $panelT0['satuan']) }}</label>
                                                                <select
                                                                    class="form-control @error('panel_t0_q4' . '.' . $keyT0) is-invalid @enderror"
                                                                    name="{{ 'panel_t0_q4' }}[]">
                                                                    <option value=" " selected>Choose Selection
                                                                    </option>
                                                                    @foreach ($panelT0['satuan'] as $satuan)
                                                                        <option value="{{ $satuan }}"
                                                                            {{ (old('panel_t0_q4' . '.' . $keyT0) ?? $formPs1PanelTrTahunanT0s[$keyT0]['q4']) == $satuan ? 'selected' : '' }}>
                                                                            {{ $satuan }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('panel_t0_q4' . '.' . $keyT0)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>{{ $panelT0['satuan'] }}</label>
                                                                <input type="text"
                                                                    class="form-control @error('panel_t0_q4' . '.' . $keyT0)) is-invalid @enderror"
                                                                    id="{{ 'panel_t0_q4' }}[]"
                                                                    name="{{ 'panel_t0_q4' }}[]"
                                                                    value="{{ old('panel_t0_q4' . '.' . $keyT0) ?? $formPs1PanelTrTahunanT0s[$keyT0]['q4'] }}"
                                                                    placeholder="{{ $panelT0['satuan'] }}">

                                                                @error('panel_t0_q4' . '.' . $keyT0)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <textarea name="panel_t0_keterangan[]"
                                                            class="form-control @error('panel_t0_keterangan.' . $keyT0) is-invalid @enderror" id="panel_t0_keterangan"
                                                            placeholder="Deskripsi">{!! old('panel_t0_keterangan.' . $keyT0) ?? $formPs1PanelTrTahunanT0s[$keyT0]->keterangan !!}</textarea>


                                                        @error('panel_t0_keterangan.' . $keyT0)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if (!$loop->last)
                                        <hr class="bg-primary">
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-footer">Simpan</button>
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
            if (child.hasClass('fa-minus')) {
                child.removeClass('fa-minus').addClass('fa-plus');; // logs "This is the child element"
            } else if (child.hasClass('fa-plus')) {
                child.removeClass('fa-plus').addClass('fa-minus'); // logs "This is the child element"
            }
        }

        $(document).ready(function() {
            $('.select2').select2({
                tags: true
            });
        });
    </script>
@endsection
