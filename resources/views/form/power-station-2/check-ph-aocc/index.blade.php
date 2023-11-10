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

        <form method="POST" action="{{ route('form.ps2.panel-ph-aocc.update', $detailWorkOrderForm->id) }}"
            enctype="multipart/form-data" id="form">
            @method('patch')
            @csrf

            {{-- Panel lvmdps --}}
            <div class="container-fluid">
                <div class="accordion" id="accordionOne">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i> PANEL LVMDP
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="show collapse" aria-labelledby="headingOne"
                            data-parent="#accordionOne">
                            <div class="card-body">
                                @include('components.form-message')

                                @foreach ($datas->panelLvmdps as $panelLvmdpKey => $panelLvmdp)
                                    <div class="row">
                                        <div
                                            class="col-12 col-lg-2 col-md-2 d-flex justify-content-center align-items-center">
                                            <h3>Modul {{ $panelLvmdp['modul'] }}</h3>
                                        </div>
                                        <div class="col-12 col-lg-10 col-md-10">
                                            <div class="row">
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>POSISI CB</label>
                                                        <select
                                                            class="form-control @error('posisi_cb_panel_lvmdp.' . $panelLvmdpKey) is-invalid @enderror"
                                                            name="posisi_cb_panel_lvmdp[]"
                                                            @if (!is_array($panelLvmdp['posisi_cb'])) readonly @endif>
                                                            <option value="" selected>Choose Selection</option>
                                                            @if (is_array($panelLvmdp['posisi_cb']))
                                                                @foreach ($panelLvmdp['posisi_cb'] as $posisi_cb)
                                                                    <option value="{{ $posisi_cb }}"
                                                                        {{ ($dbPanelLvmdps[$panelLvmdpKey]->posisi_cb ?? old('posisi_cb_panel_lvmdp.' . $panelLvmdpKey)) == $posisi_cb ? 'selected' : '' }}>
                                                                        {{ $posisi_cb }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('posisi_cb_panel_lvmdp.' . $panelLvmdpKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>CB SPRING</label>
                                                        <select
                                                            class="form-control @error('cb_spring_panel_lvmdp.' . $panelLvmdpKey) is-invalid @enderror"
                                                            name="cb_spring_panel_lvmdp[]"
                                                            @if (!is_array($panelLvmdp['cb_spring'])) readonly @endif>
                                                            <option value="" selected>Choose Selection</option>
                                                            @if (is_array($panelLvmdp['cb_spring']))
                                                                @foreach ($panelLvmdp['cb_spring'] as $cb_spring)
                                                                    <option value="{{ $posisi_cb }}"
                                                                        {{ ($dbPanelLvmdps[$panelLvmdpKey]->cb_spring ?? old('cb_spring_panel_lvmdp.' . $panelLvmdpKey)) == $cb_spring ? 'selected' : '' }}>
                                                                        {{ $cb_spring }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('cb_spring_panel_lvmdp.' . $panelLvmdpKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>LOCAL/REMOTE</label>
                                                        <select
                                                            class="form-control @error('local_remote_panel_lvmdp.' . $panelLvmdpKey) is-invalid @enderror"
                                                            name="local_remote_panel_lvmdp[]"
                                                            @if (!is_array($panelLvmdp['local_remote'])) readonly @endif>
                                                            <option value="" selected>Choose Selection</option>
                                                            @if (is_array($panelLvmdp['local_remote']))
                                                                @foreach ($panelLvmdp['local_remote'] as $local_remote)
                                                                    <option value="{{ $local_remote }}"
                                                                        {{ ($dbPanelLvmdps[$panelLvmdpKey]->local_remote ?? old('local_remote_panel_lvmdp.' . $panelLvmdpKey)) == $local_remote ? 'selected' : '' }}>
                                                                        {{ $local_remote }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('local_remote_panel_lvmdp.' . $panelLvmdpKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>MODE KONTROL MODUL</label>
                                                        <select
                                                            class="form-control @error('mode_kontrol_modul_panel_lvmdp.' . $panelLvmdpKey) is-invalid @enderror"
                                                            name="mode_kontrol_modul_panel_lvmdp[]"
                                                            @if (!is_array($panelLvmdp['mode_kontrol_modul'])) readonly @endif>
                                                            <option value="" selected>Choose Selection</option>
                                                            @if (is_array($panelLvmdp['mode_kontrol_modul']))
                                                                @foreach ($panelLvmdp['mode_kontrol_modul'] as $mode_kontrol_modul)
                                                                    <option value="{{ $mode_kontrol_modul }}"
                                                                        {{ ($dbPanelLvmdps[$panelLvmdpKey]->mode_kontrol_modul ?? old('mode_kontrol_modul_panel_lvmdp.' . $panelLvmdpKey)) == $mode_kontrol_modul ? 'selected' : '' }}>
                                                                        {{ $mode_kontrol_modul }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('mode_kontrol_modul_panel_lvmdp.' . $panelLvmdpKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>MODE KONTROL SCADA</label>
                                                        <select
                                                            class="form-control @error('mode_kontrol_scada_panel_lvmdp.' . $panelLvmdpKey) is-invalid @enderror"
                                                            name="mode_kontrol_scada_panel_lvmdp[]"
                                                            @if (!is_array($panelLvmdp['mode_kontrol_scada'])) readonly @endif>
                                                            <option value="" selected>Choose Selection</option>
                                                            @if (is_array($panelLvmdp['mode_kontrol_scada']))
                                                                @foreach ($panelLvmdp['mode_kontrol_scada'] as $mode_kontrol_scada)
                                                                    <option value="{{ $mode_kontrol_scada }}"
                                                                        {{ ($dbPanelLvmdps[$panelLvmdpKey]->mode_kontrol_scada ?? old('mode_kontrol_scada_panel_lvmdp.' . $panelLvmdpKey)) == $mode_kontrol_scada ? 'selected' : '' }}>
                                                                        {{ $mode_kontrol_scada }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('mode_kontrol_scada_panel_lvmdp.' . $panelLvmdpKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-12 text-center">TEGANGAN (V)</label>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('tegangan_v_1_panel_lvmdp.' . $panelLvmdpKey) is-invalid @enderror"
                                                            id="tegangan_v_1_panel_lvmdp[]"
                                                            name="tegangan_v_1_panel_lvmdp[]"
                                                            value="{{ $dbPanelLvmdps[$panelLvmdpKey]->tegangan_v_1 ?? $panelLvmdp['tegangan_v_1'] }}"
                                                            placeholder="Enter.."
                                                            @if ($panelLvmdp['tegangan_v_1'] === null) readonly @endif>

                                                        @error('tegangan_v_1_panel_lvmdp.' . $panelLvmdpKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('tegangan_v_2_panel_lvmdp.' . $panelLvmdpKey) is-invalid @enderror"
                                                            id="tegangan_v_2_panel_lvmdp[]"
                                                            name="tegangan_v_2_panel_lvmdp[]"
                                                            value="{{ $dbPanelLvmdps[$panelLvmdpKey]->tegangan_v_2 ?? $panelLvmdp['tegangan_v_2'] }}"
                                                            placeholder="Enter.."
                                                            @if ($panelLvmdp['tegangan_v_2'] === null) readonly @endif>

                                                        @error('tegangan_v_2_panel_lvmdp.' . $panelLvmdpKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('tegangan_v_3_panel_lvmdp.' . $panelLvmdpKey) is-invalid @enderror"
                                                            id="tegangan_v_3_panel_lvmdp[]"
                                                            name="tegangan_v_3_panel_lvmdp[]"
                                                            value="{{ $dbPanelLvmdps[$panelLvmdpKey]->tegangan_v_3 ?? $panelLvmdp['tegangan_v_3'] }}"
                                                            placeholder="Enter.."
                                                            @if ($panelLvmdp['tegangan_v_3'] === null) readonly @endif>

                                                        @error('tegangan_v_3_panel_lvmdp.' . $panelLvmdpKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-12 text-center">ARUS (A)</label>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('arus_1_panel_lvmdp.' . $panelLvmdpKey) is-invalid @enderror"
                                                            id="arus_1_panel_lvmdp[]" name="arus_1_panel_lvmdp[]"
                                                            value="{{ $dbPanelLvmdps[$panelLvmdpKey]->arus_1 ?? $panelLvmdp['arus_1'] }}"
                                                            placeholder="Enter.."
                                                            @if ($panelLvmdp['arus_1'] === null) readonly @endif>

                                                        @error('arus_1_panel_lvmdp.' . $panelLvmdpKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('arus_2_panel_lvmdp.' . $panelLvmdpKey) is-invalid @enderror"
                                                            id="arus_2_panel_lvmdp[]" name="arus_2_panel_lvmdp[]"
                                                            value="{{ $dbPanelLvmdps[$panelLvmdpKey]->arus_2 ?? $panelLvmdp['arus_2'] }}"
                                                            placeholder="Enter.."
                                                            @if ($panelLvmdp['arus_2'] === null) readonly @endif>

                                                        @error('arus_2_panel_lvmdp.' . $panelLvmdpKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('arus_3_panel_lvmdp.' . $panelLvmdpKey) is-invalid @enderror"
                                                            id="arus_3_panel_lvmdp[]" name="arus_3_panel_lvmdp[]"
                                                            value="{{ $dbPanelLvmdps[$panelLvmdpKey]->arus_3 ?? $panelLvmdp['arus_3'] }}"
                                                            placeholder="Enter.."
                                                            @if ($panelLvmdp['arus_3'] === null) readonly @endif>

                                                        @error('arus_3_panel_lvmdp.' . $panelLvmdpKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-12 text-center">DAYA (KW)</label>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('daya_1_panel_lvmdp.' . $panelLvmdpKey) is-invalid @enderror"
                                                            id="daya_1_panel_lvmdp[]" name="daya_1_panel_lvmdp[]"
                                                            value="{{ $dbPanelLvmdps[$panelLvmdpKey]->daya_1 ?? $panelLvmdp['daya_1'] }}"
                                                            placeholder="Enter.."
                                                            @if ($panelLvmdp['daya_1'] === null) readonly @endif>

                                                        @error('daya_1_panel_lvmdp.' . $panelLvmdpKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('daya_2_panel_lvmdp.' . $panelLvmdpKey) is-invalid @enderror"
                                                            id="daya_2_panel_lvmdp[]" name="daya_2_panel_lvmdp[]"
                                                            value="{{ $dbPanelLvmdps[$panelLvmdpKey]->daya_2 ?? $panelLvmdp['daya_2'] }}"
                                                            placeholder="Enter.."
                                                            @if ($panelLvmdp['daya_2'] === null) readonly @endif>

                                                        @error('daya_2_panel_lvmdp.' . $panelLvmdpKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('daya_3_panel_lvmdp.' . $panelLvmdpKey) is-invalid @enderror"
                                                            id="daya_3_panel_lvmdp[]" name="daya_3_panel_lvmdp[]"
                                                            value="{{ $dbPanelLvmdps[$panelLvmdpKey]->daya_3 ?? $panelLvmdp['daya_3'] }}"
                                                            placeholder="Enter.."
                                                            @if ($panelLvmdp['daya_3'] === null) readonly @endif>

                                                        @error('daya_3_panel_lvmdp.' . $panelLvmdpKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-12 text-center">KETERANGAN</label>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('keterangan_panel_lvmdp.' . $panelLvmdpKey) is-invalid @enderror"
                                                            id="keterangan_panel_lvmdp[]" name="keterangan_panel_lvmdp[]"
                                                            value="{{ $dbPanelLvmdps[$panelLvmdpKey]->keterangan ?? $panelLvmdp['keterangan'] }}"
                                                            placeholder="Enter.." readonly>

                                                        @error('keterangan_panel_lvmdp.' . $panelLvmdpKey)
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

            {{-- PANEL ACTS - GENSET --}}
            <div class="container-fluid">
                <div class="accordion" id="accordionTwo">
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block collapsed text-left" type="button"
                                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> PANEL
                                    ACTS - GENSET
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionTwo">
                            <div class="card-body">
                                @include('components.form-message')

                                @foreach ($datas->panelActsGensets as $panelActsGensetKey => $panelActsGenset)
                                    <div class="row">
                                        <div
                                            class="col-12 col-lg-2 col-md-2 d-flex justify-content-center align-items-center">
                                            <h3>Modul {{ $panelActsGenset['modul'] }}</h3>
                                        </div>
                                        <div class="col-12 col-lg-10 col-md-10">
                                            <div class="row">
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>POSISI CB</label>
                                                        <select
                                                            class="form-control @error('posisi_cb_panel_acts_genset.' . $panelActsGensetKey) is-invalid @enderror"
                                                            name="posisi_cb_panel_acts_genset[]"
                                                            @if (!is_array($panelActsGenset['posisi_cb'])) readonly @endif>
                                                            <option value="" selected>Choose Selection</option>
                                                            @if (is_array($panelActsGenset['posisi_cb']))
                                                                @foreach ($panelActsGenset['posisi_cb'] as $posisi_cb)
                                                                    <option value="{{ $posisi_cb }}"
                                                                        {{ ($dbPanelActsGensets[$panelActsGensetKey]->posisi_cb ?? old('posisi_cb_panel_acts_genset.' . $panelActsGensetKey)) == $posisi_cb ? 'selected' : '' }}>
                                                                        {{ $posisi_cb }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('posisi_cb_panel_acts_genset.' . $panelActsGensetKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>CB SPRING</label>
                                                        <select
                                                            class="form-control @error('cb_spring_panel_acts_genset.' . $panelActsGensetKey) is-invalid @enderror"
                                                            name="cb_spring_panel_acts_genset[]"
                                                            @if (!is_array($panelActsGenset['cb_spring'])) readonly @endif>
                                                            <option value="" selected>Choose Selection</option>
                                                            @if (is_array($panelActsGenset['cb_spring']))
                                                                @foreach ($panelActsGenset['cb_spring'] as $cb_spring)
                                                                    <option value="{{ $cb_spring }}"
                                                                        {{ ($dbPanelActsGensets[$panelActsGensetKey]->cb_spring ?? old('cb_spring_panel_acts_genset.' . $panelActsGensetKey)) == $cb_spring ? 'selected' : '' }}>
                                                                        {{ $cb_spring }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('cb_spring_panel_acts_genset.' . $panelActsGensetKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>LOCAL/REMOTE</label>
                                                        <select
                                                            class="form-control @error('local_remote_panel_acts_genset.' . $panelActsGensetKey) is-invalid @enderror"
                                                            name="local_remote_panel_acts_genset[]"
                                                            @if (!is_array($panelActsGenset['local_remote'])) readonly @endif>
                                                            <option value="" selected>Choose Selection</option>
                                                            @if (is_array($panelActsGenset['local_remote']))
                                                                @foreach ($panelActsGenset['local_remote'] as $local_remote)
                                                                    <option value="{{ $local_remote }}"
                                                                        {{ ($dbPanelActsGensets[$panelActsGensetKey]->local_remote ?? old('local_remote_panel_acts_genset.' . $panelActsGensetKey)) == $local_remote ? 'selected' : '' }}>
                                                                        {{ $local_remote }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('local_remote_panel_acts_genset.' . $panelActsGensetKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>MODE KONTROL MODUL</label>
                                                        <select
                                                            class="form-control @error('mode_kontrol_modul_panel_acts_genset.' . $panelActsGensetKey) is-invalid @enderror"
                                                            name="mode_kontrol_modul_panel_acts_genset[]"
                                                            @if (!is_array($panelActsGenset['mode_kontrol_modul'])) readonly @endif>
                                                            <option value="" selected>Choose Selection</option>
                                                            @if (is_array($panelActsGenset['mode_kontrol_modul']))
                                                                @foreach ($panelActsGenset['mode_kontrol_modul'] as $mode_kontrol_modul)
                                                                    <option value="{{ $mode_kontrol_modul }}"
                                                                        {{ ($dbPanelActsGensets[$panelActsGensetKey]->mode_kontrol_modul ?? old('mode_kontrol_modul_panel_acts_genset.' . $panelActsGensetKey)) == $mode_kontrol_modul ? 'selected' : '' }}>
                                                                        {{ $mode_kontrol_modul }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('mode_kontrol_modul_panel_acts_genset.' .
                                                            $panelActsGensetKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>MODE KONTROL SCADA</label>
                                                        <select
                                                            class="form-control @error('mode_kontrol_scada_panel_acts_genset.' . $panelActsGensetKey) is-invalid @enderror"
                                                            name="mode_kontrol_scada_panel_acts_genset[]"
                                                            @if (!is_array($panelActsGenset['mode_kontrol_scada'])) readonly @endif>
                                                            <option value="" selected>Choose Selection</option>
                                                            @if (is_array($panelActsGenset['mode_kontrol_scada']))
                                                                @foreach ($panelActsGenset['mode_kontrol_scada'] as $mode_kontrol_scada)
                                                                    <option value="{{ $mode_kontrol_scada }}"
                                                                        {{ ($dbPanelActsGensets[$panelActsGensetKey]->mode_kontrol_scada ?? old('mode_kontrol_scada_panel_acts_genset.' . $panelActsGensetKey)) == $mode_kontrol_scada ? 'selected' : '' }}>
                                                                        {{ $mode_kontrol_scada }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('mode_kontrol_scada_panel_acts_genset.' .
                                                            $panelActsGensetKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-12 text-center">TEGANGAN (V)</label>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('tegangan_v_1_panel_acts_genset.' . $panelActsGensetKey) is-invalid @enderror"
                                                            id="tegangan_v_1_panel_acts_genset[]"
                                                            name="tegangan_v_1_panel_acts_genset[]"
                                                            value="{{ $dbPanelActsGensets[$panelActsGensetKey]->tegangan_v_1 ?? $panelActsGenset['tegangan_v_1'] }}"
                                                            placeholder="Enter.."
                                                            @if ($panelActsGenset['tegangan_v_1'] === null) readonly @endif>

                                                        @error('tegangan_v_1_panel_acts_genset.' . $panelActsGensetKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('tegangan_v_2_panel_acts_genset.' . $panelActsGensetKey) is-invalid @enderror"
                                                            id="tegangan_v_2_panel_acts_genset[]"
                                                            name="tegangan_v_2_panel_acts_genset[]"
                                                            value="{{ $dbPanelActsGensets[$panelActsGensetKey]->tegangan_v_2 ?? $panelActsGenset['tegangan_v_2'] }}"
                                                            placeholder="Enter.."
                                                            @if ($panelActsGenset['tegangan_v_2'] === null) readonly @endif>

                                                        @error('tegangan_v_2_panel_acts_genset.' . $panelActsGensetKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('tegangan_v_3_panel_acts_genset.' . $panelActsGensetKey) is-invalid @enderror"
                                                            id="tegangan_v_3_panel_acts_genset[]"
                                                            name="tegangan_v_3_panel_acts_genset[]"
                                                            value="{{ $dbPanelActsGensets[$panelActsGensetKey]->tegangan_v_3 ?? $panelActsGenset['tegangan_v_3'] }}"
                                                            placeholder="Enter.."
                                                            @if ($panelActsGenset['tegangan_v_3'] === null) readonly @endif>

                                                        @error('tegangan_v_3_panel_acts_genset.' . $panelActsGensetKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-12 text-center">ARUS (A)</label>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('arus_1_panel_acts_genset.' . $panelActsGensetKey) is-invalid @enderror"
                                                            id="arus_1_panel_acts_genset[]"
                                                            name="arus_1_panel_acts_genset[]"
                                                            value="{{ $dbPanelActsGensets[$panelActsGensetKey]->arus_1 ?? $panelActsGenset['arus_1'] }}"
                                                            placeholder="Enter.."
                                                            @if ($panelActsGenset['arus_1'] === null) readonly @endif>

                                                        @error('arus_1_panel_acts_genset.' . $panelActsGensetKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('arus_2_panel_acts_genset.' . $panelActsGensetKey) is-invalid @enderror"
                                                            id="arus_2_panel_acts_genset[]"
                                                            name="arus_2_panel_acts_genset[]"
                                                            value="{{ $dbPanelActsGensets[$panelActsGensetKey]->arus_2 ?? $panelActsGenset['arus_2'] }}"
                                                            placeholder="Enter.."
                                                            @if ($panelActsGenset['arus_2'] === null) readonly @endif>

                                                        @error('arus_2_panel_acts_genset.' . $panelActsGensetKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('arus_3_panel_acts_genset.' . $panelActsGensetKey) is-invalid @enderror"
                                                            id="arus_3_panel_acts_genset[]"
                                                            name="arus_3_panel_acts_genset[]"
                                                            value="{{ $dbPanelActsGensets[$panelActsGensetKey]->arus_3 ?? $panelActsGenset['arus_3'] }}"
                                                            placeholder="Enter.."
                                                            @if ($panelActsGenset['arus_3'] === null) readonly @endif>

                                                        @error('arus_3_panel_acts_genset.' . $panelActsGensetKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-12 text-center">DAYA (KW)</label>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('daya_1_panel_acts_genset.' . $panelActsGensetKey) is-invalid @enderror"
                                                            id="daya_1_panel_acts_genset[]"
                                                            name="daya_1_panel_acts_genset[]"
                                                            value="{{ $dbPanelActsGensets[$panelActsGensetKey]->daya_1 ?? $panelActsGenset['daya_1'] }}"
                                                            placeholder="Enter.."
                                                            @if ($panelActsGenset['daya_1'] === null) readonly @endif>

                                                        @error('daya_1_panel_acts_genset.' . $panelActsGensetKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('daya_2_panel_acts_genset.' . $panelActsGensetKey) is-invalid @enderror"
                                                            id="daya_2_panel_acts_genset[]"
                                                            name="daya_2_panel_acts_genset[]"
                                                            value="{{ $dbPanelActsGensets[$panelActsGensetKey]->daya_2 ?? $panelActsGenset['daya_2'] }}"
                                                            placeholder="Enter.."
                                                            @if ($panelActsGenset['daya_2'] === null) readonly @endif>

                                                        @error('daya_2_panel_acts_genset.' . $panelActsGensetKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('daya_3_panel_acts_genset.' . $panelActsGensetKey) is-invalid @enderror"
                                                            id="daya_3_panel_acts_genset[]"
                                                            name="daya_3_panel_acts_genset[]"
                                                            value="{{ $dbPanelActsGensets[$panelActsGensetKey]->daya_3 ?? $panelActsGenset['daya_3'] }}"
                                                            placeholder="Enter.."
                                                            @if ($panelActsGenset['daya_3'] === null) readonly @endif>

                                                        @error('daya_3_panel_acts_genset.' . $panelActsGensetKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-12 text-center">KETERANGAN</label>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('keterangan_panel_acts_genset.' . $panelActsGensetKey) is-invalid @enderror"
                                                            id="keterangan_panel_acts_genset[]"
                                                            name="keterangan_panel_acts_genset[]"
                                                            value="{{ $dbPanelActsGensets[$panelActsGensetKey]->keterangan ?? $panelActsGenset['keterangan'] }}"
                                                            placeholder="Enter.." readonly>

                                                        @error('keterangan_panel_acts_genset.' . $panelActsGensetKey)
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

            {{-- ACTS --}}
            <div class="container-fluid">
                <div class="accordion" id="accordionThree">
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block collapsed text-left" type="button"
                                    data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                    ACTS
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordionThree">
                            <div class="card-body">
                                @include('components.form-message')

                                @foreach ($datas->acts as $panelActsKey => $act)
                                    <div class="row">
                                        <div
                                            class="col-12 col-lg-2 col-md-2 d-flex justify-content-center align-items-center">
                                            <h3>Modul {{ $act['modul'] }}</h3>
                                        </div>
                                        <div class="col-12 col-lg-10 col-md-10">
                                            <div class="row">
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>NORMAL SOURCE</label>
                                                        <select
                                                            class="form-control @error('normal_source_acts.' . $panelActsKey) is-invalid @enderror"
                                                            name="normal_source_acts[]"
                                                            @if (!is_array($act['normal_source'])) readonly @endif>
                                                            <option value="" selected>Choose Selection</option>
                                                            @if (is_array($act['normal_source']))
                                                                @foreach ($act['normal_source'] as $normal_source)
                                                                    <option value="{{ $normal_source }}"
                                                                        {{ ($dbActs[$panelActsKey]->normal_source ?? old('normal_source_acts.' . $panelActsKey)) == $normal_source ? 'selected' : '' }}>
                                                                        {{ $normal_source }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('normal_source_acts.' . $panelActsKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>TEGANGAN</label>
                                                        <select
                                                            class="form-control @error('tegangan_acts.' . $panelActsKey) is-invalid @enderror"
                                                            name="tegangan_acts[]"
                                                            @if (!is_array($act['tegangan'])) readonly @endif>
                                                            <option value="" selected>Choose Selection</option>
                                                            @if (is_array($act['tegangan']))
                                                                @foreach ($act['tegangan'] as $tegangan)
                                                                    <option value="{{ $tegangan }}"
                                                                        {{ ($dbActs[$panelActsKey]->tegangan ?? old('tegangan_acts.' . $panelActsKey)) == $tegangan ? 'selected' : '' }}>
                                                                        {{ $tegangan }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('tegangan_acts.' . $panelActsKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>TRANSFER SWITCH</label>
                                                        <select
                                                            class="form-control @error('transfer_switch_acts.' . $panelActsKey) is-invalid @enderror"
                                                            name="transfer_switch_acts[]"
                                                            @if (!is_array($act['transfer_switch'])) readonly @endif>
                                                            <option value="" selected>Choose Selection</option>
                                                            @if (is_array($act['transfer_switch']))
                                                                @foreach ($act['transfer_switch'] as $transfer_switch)
                                                                    <option value="{{ $transfer_switch }}"
                                                                        {{ ($dbActs[$panelActsKey]->transfer_switch ?? old('transfer_switch_acts.' . $panelActsKey)) == $transfer_switch ? 'selected' : '' }}>
                                                                        {{ $transfer_switch }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('transfer_switch_acts.' . $panelActsKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-12 text-center">KETERANGAN</label>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('keterangan_acts.' . $panelActsKey) is-invalid @enderror"
                                                            id="keterangan_acts[]" name="keterangan_acts[]"
                                                            value="{{ $dbActs[$panelActsKey]->keterangan ?? $act['keterangan'] }}"
                                                            placeholder="Enter.." readonly>

                                                        @error('keterangan_acts.' . $panelActsKey)
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

            {{-- MAIN DISTRIBUTION PANEL --}}
            <div class="container-fluid">
                <div class="accordion" id="accordionFour">
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block collapsed text-left" type="button"
                                    data-toggle="collapse" data-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                    MAIN DISTRIBUTION PANEL
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                            data-parent="#accordionFour">
                            <div class="card-body">
                                @include('components.form-message')

                                @foreach ($datas->mainDistributionPanels as $panelActsKey => $mainDistributionPanel)
                                    <div class="row">
                                        <div
                                            class="col-12 col-lg-2 col-md-2 d-flex justify-content-center align-items-center">
                                            <h3>Modul {{ $mainDistributionPanel['modul'] }}</h3>
                                        </div>
                                        <div class="col-12 col-lg-10 col-md-10">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>POSISI MCCB</label>
                                                        <select
                                                            class="form-control @error('posisi_mccb_main_distribution_panel.' . $panelActsKey) is-invalid @enderror"
                                                            name="posisi_mccb_main_distribution_panel[]"
                                                            @if (!is_array($mainDistributionPanel['posisi_mccb'])) readonly @endif>
                                                            <option value="" selected>Choose Selection</option>
                                                            @if (is_array($mainDistributionPanel['posisi_mccb']))
                                                                @foreach ($mainDistributionPanel['posisi_mccb'] as $posisi_mccb)
                                                                    <option value="{{ $posisi_mccb }}"
                                                                        {{ ($dbMainDistributionPanels[$panelActsKey]->posisi_mccb ?? old('posisi_mccb_main_distribution_panel.' . $panelActsKey)) == $posisi_mccb  ? 'selected' : '' }}>
                                                                        {{ $posisi_mccb }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('posisi_mccb_main_distribution_panel.' . $panelActsKey)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-12 text-center">KETERANGAN</label>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('keterangan_main_distribution_panel.' . $panelActsKey) is-invalid @enderror"
                                                            id="keterangan_main_distribution_panel[]"
                                                            name="keterangan_main_distribution_panel[]"
                                                            value="{{ $dbMainDistributionPanels[$panelActsKey]->keterangan ?? $mainDistributionPanel['keterangan'] }}"
                                                            placeholder="Enter.." readonly>

                                                        @error('keterangan_main_distribution_panel.' . $panelActsKey)
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
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label
                                        class="col-12 col-lg-3 control-label d-flex justify-content-center align-items-center">Catatan</label>
                                    <div class="col-12 col-lg-9">

                                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                                            placeholder="Deskripsi">{!! $dbPanelLvmdps[0]->catatan ?? '' !!}</textarea>
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
    </script>
@endsection
