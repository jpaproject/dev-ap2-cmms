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
        <form method="POST" action="{{ route('form.ps1.panel-tr-aux-tahunan.update', $detailWorkOrderForm->id) }}"
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
                                    <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i> PANEL A & B
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="show collapse" aria-labelledby="headingOne"
                            data-parent="#accordionOne">
                            <div class="card-body">

                                @include('components.form-message')
                                @foreach ($forms->panelADanBs as $keyADanB => $panelADanB)
                                    <div class="row">
                                        <div
                                            class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                            <span>{{ $panelADanB['pertanyaan'] }}</span>
                                        </div>
                                        <div class="col-12 col-lg-9">
                                            <div class="row">
                                                @foreach ($forms->columnPanelADanBs as $columnPanelADanB)
                                                
                                                    @if (is_array($panelADanB['satuan']))
                                                        <div class="col-4 col-lg-4 col-md-4">
                                                            <div class="form-group">
                                                                <label>{{ $columnPanelADanB['title'] }}</label>
                                                                <select
                                                                    class="form-control @error('panel_a_dan_b_' . $columnPanelADanB['name'] . '.' . $keyADanB) is-invalid @enderror"
                                                                    name="{{ 'panel_a_dan_b_' . $columnPanelADanB['name'] }}[]">
                                                                    <option value=" " selected>Choose Selection
                                                                    </option>
                                                                    @foreach ($panelADanB['satuan'] as $satuan)
                                                                        <option value="{{ $satuan }}"
                                                                            {{ ($formPs1PanelTrAuxTahunanPanelADanBs[$keyADanB][$columnPanelADanB['name']] ?? old('panel_a_dan_b_' . $columnPanelADanB['name'] . '.' . $keyADanB)) == $satuan ? 'selected' : '' }}>
                                                                            {{ $satuan }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('panel_a_dan_b_' . $columnPanelADanB['name'] . '.' . $keyADanB)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="col-4 col-lg-4 col-md-4">
                                                            <div class="form-group">
                                                                <label>{{ $columnPanelADanB['title'] }}</label>
                                                                <input type="text"
                                                                    class="form-control @error('panel_a_dan_b_' . $columnPanelADanB['name'] . '.' . $keyADanB)) is-invalid @enderror"
                                                                    id="{{ 'panel_a_dan_b_' . $columnPanelADanB['name'] }}[]"
                                                                    name="{{ 'panel_a_dan_b_' . $columnPanelADanB['name'] }}[]" 
                                                                    value="{{ $formPs1PanelTrAuxTahunanPanelADanBs[$keyADanB][$columnPanelADanB['name']] ?? old('panel_a_dan_b_' . $columnPanelADanB['name'] . '.' . $keyADanB) }}"
                                                                    placeholder="{{ $columnPanelADanB['title'] }}">

                                                                @error('panel_a_dan_b_' . $columnPanelADanB['name'] . '.' . $keyADanB)
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
                                                        <textarea name="panel_a_dan_b_keterangan[]"
                                                            class="form-control @error('panel_a_dan_b_keterangan.' . $keyADanB) is-invalid @enderror" id="panel_a_dan_b_keterangan"
                                                            placeholder="Deskripsi">{!! $formPs1PanelTrAuxTahunanPanelADanBs[$keyADanB]['keterangan'] ??old('panel_a_dan_b_keterangan.' . $keyADanB) !!}</textarea>
                                                            


                                                        @error('panel_a_dan_b_keterangan.' . $keyADanB)
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
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PANEL SDP
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionTwo">
                            <div class="card-body">

                                @include('components.form-message')
                                @foreach ($forms->panelSdps as $keySdp => $panelSdp)
                                    <div class="row">
                                        <div
                                            class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                            <span>{{ $panelSdp['pertanyaan'] }}</span>
                                        </div>
                                        <div class="col-12 col-lg-9">
                                            <div class="row">
                                                @foreach ($forms->columnPanelSdps as $columnPanelSdp)
                                                    @if (is_array($panelSdp['satuan']))
                                                        <div class="col-4 col-lg-4 col-md-4">
                                                            <div class="form-group">
                                                                <label>{{ $columnPanelSdp['title'] }}</label>
                                                                <select
                                                                    class="form-control @error('panel_sdp_' . $columnPanelSdp['name'] . '.' . $keySdp) is-invalid @enderror"
                                                                    name="{{ 'panel_sdp_' . $columnPanelSdp['name'] }}[]">
                                                                    <option value=" " selected>Choose Selection
                                                                    </option>
                                                                    @foreach ($panelSdp['satuan'] as $satuan)
                                                                        <option value="{{ $satuan }}"
                                                                            {{ ($formPs1PanelTrAuxTahunanPanelSdps[$keySdp][$columnPanelSdp['name']] ?? old('panel_sdp_' . $columnPanelSdp['name'] . '.' . $keySdp)) == $satuan ? 'selected' : '' }}>
                                                                            {{ $satuan }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('panel_sdp_' . $columnPanelSdp['name'] . '.' . $keySdp)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="col-4 col-lg-4 col-md-4">
                                                            <div class="form-group">
                                                                <label>{{ $columnPanelSdp['title'] }}</label>
                                                                <input type="text"
                                                                    class="form-control @error('panel_sdp_' . $columnPanelSdp['name'] . '.' . $keySdp)) is-invalid @enderror"
                                                                    id="{{ 'panel_sdp_' . $columnPanelSdp['name'] }}[]"
                                                                    name="{{ 'panel_sdp_' . $columnPanelSdp['name'] }}[]"
                                                                    value="{{ $formPs1PanelTrAuxTahunanPanelSdps[$keySdp][$columnPanelSdp['name']] ?? old('panel_sdp_' . $columnPanelSdp['name'] . '.' . $keySdp) }}"
                                                                    placeholder="{{ $columnPanelSdp['title'] }}">

                                                                @error('panel_sdp_' . $columnPanelSdp['name'] . '.' . $keySdp)
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
                                                        <textarea name="panel_sdp_keterangan[]"
                                                            class="form-control @error('panel_sdp_keterangan.' . $keySdp) is-invalid @enderror" id="panel_sdp_keterangan"
                                                            placeholder="Deskripsi">{!! $formPs1PanelTrAuxTahunanPanelSdps[$keySdp]->keterangan ?? old('panel_sdp_keterangan.' . $keySdp) !!}</textarea>


                                                        @error('panel_sdp_keterangan.' . $keySdp)
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
