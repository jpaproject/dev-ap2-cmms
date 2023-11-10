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
        <form method="POST"
            action="{{ route('form.ps1.harian-panel.update', $detailWorkOrderForm->id) }}"
            id="form">
            @method('patch')
            @csrf
        <div class="container-fluid">
            <div class="accordion" id="accordionExample3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title" style="text-align: right;">
                                    <button class="btn btn-link btn-block text-left text-white" type="button"
                                        data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
                                        aria-controls="collapseThree" onclick="showHide(this)">
                                        <i class="fas fa-chevron-down" id="accordion"></i> EXT GH 126
                                    </button>
                                </h3>
                            </div>
                        </div>
                        <div id="collapseThree" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample3">

                            <div class="card card-body">
                                @foreach ($formPs1PanelHarianEXT as $key => $item)
                                    <?php $count = $key + 1; ?>

                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <input type="text"
                                                class="form-control @error('grup_ext_.' . $key) is-invalid @enderror"
                                                id="grup_ext_[]" name="grup_ext_[]" value="{{$item['grup']}}" hidden
                                                placeholder="Enter Grup">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Cubicle</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('cubicle_ext_.' . $key) is-invalid @enderror"
                                                            id="cubicle_ext_[]" name="cubicle_ext_[]" value="{{$item['cubicle']}}" disabled
                                                            placeholder="Enter Cubicle">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Keterangan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('keterangan_ext_.' . $key) is-invalid @enderror"
                                                            id="keterangan_ext_[]" name="keterangan_ext_[]" value="{{$item['keterangan']}}" disabled
                                                            placeholder="Enter Keterangan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Local</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        {{-- <input type="text"
                                                            class="form-control @error('local_ext_.' . $key) is-invalid @enderror"
                                                            id="local_ext_[]" name="local_ext_[]" value="{{ $item['local'] }}"
                                                            placeholder="Enter Local"> --}}
                                                        <input type="checkbox"
                                                            class="flat largerCheckbox @error('local_ext_.' . $key) is-invalid @enderror"
                                                            name="local_ext_[]" value="1"
                                                            {{ old('local') ?? $item->local ? 'checked' : '' }}
                                                            >
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Remote</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        {{-- <input type="text"
                                                            class="form-control @error('remote_ext_.' . $key) is-invalid @enderror"
                                                            id="remote_ext_[]" name="remote_ext_[]" value="{{ $item['remote'] }}"
                                                            placeholder="Enter Remote"> --}}
                                                        <input type="checkbox"
                                                            class="flat largerCheckbox @error('remote_ext_.' . $key) is-invalid @enderror"
                                                            name="remote_ext_[]" value="1"
                                                            {{ old('remote') ?? $item->remote ? 'checked' : '' }}
                                                            >
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Posisi DS</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('posisi_ds_ext_.' . $key) is-invalid @enderror" aria-label="Default select example" name="posisi_ds_ext_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="open"
                                                        {{ old('posisi_ds_ext_.' . $key) ?? $item->posisi_ds == 'open' ? 'selected' : '' }}>
                                                            Open</option>
                                                            <option value="close"
                                                        {{ old('posisi_ds_ext_.' . $key) ?? $item->posisi_ds == 'close' ? 'selected' : '' }}>
                                                            Close</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Posisi CB</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('posisi_cb_ext_.' . $key) is-invalid @enderror" aria-label="Default select example" name="posisi_cb_ext_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="open"
                                                        {{ old('posisi_cb_ext_.' . $key) ?? $item->posisi_cb == 'open' ? 'selected' : '' }}>
                                                            Open</option>
                                                            <option value="close"
                                                        {{ old('posisi_cb_ext_.' . $key) ?? $item->posisi_cb == 'close' ? 'selected' : '' }}>
                                                            Close</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>CB Spring</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('cb_spring_ext_.' . $key) is-invalid @enderror" aria-label="Default select example" name="cb_spring_ext_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="charge"
                                                        {{ old('cb_spring_ext_.' . $key) ?? $item->cb_spring == 'charge' ? 'selected' : '' }}>
                                                            Charge</option>
                                                            <option value="discharge"
                                                        {{ old('cb_spring_ext_.' . $key) ?? $item->cb_spring == 'discharge' ? 'selected' : '' }}>
                                                            Discharge</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>SF6 LEV</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('sf6_lev_ext_.' . $key) is-invalid @enderror" aria-label="Default select example" name="sf6_lev_ext_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="r"
                                                        {{ old('sf6_lev_ext_.' . $key) ?? $item->sf6_lev == 'r' ? 'selected' : '' }}>
                                                            R</option>
                                                            <option value="g"
                                                        {{ old('sf6_lev_ext_.' . $key) ?? $item->sf6_lev == 'g' ? 'selected' : '' }}>
                                                            G</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Tegangan (KV)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('tegangan_ext_.' . $key) is-invalid @enderror"
                                                            id="tegangan_ext_[]" name="tegangan_ext_[]" value="{{ $item['tegangan'] }}"
                                                            placeholder="Enter Tegangan (KV)">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Arus (A)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('arus_ext_.' . $key) is-invalid @enderror"
                                                            id="arus_ext_[]" name="arus_ext_[]" value="{{ $item['arus'] }}"
                                                            placeholder="Enter Arus (A)">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Cos Phi</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('cos_phi_ext_.' . $key) is-invalid @enderror"
                                                            id="cos_phi_ext_[]" name="cos_phi_ext_[]" value="{{ $item['cos_phi'] }}"
                                                            placeholder="Enter Cos Phi">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Frekuensi</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('frekuensi_ext_.' . $key) is-invalid @enderror"
                                                            id="frekuensi_ext_[]" name="frekuensi_ext_[]" value="{{ $item['frekuensi'] }}"
                                                            placeholder="Enter Frekuensi">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Daya (MW)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('daya_ext_.' . $key) is-invalid @enderror"
                                                            id="daya_ext_[]" name="daya_ext_[]" value="{{ $item['daya'] }}"
                                                            placeholder="Enter Daya (MW)">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <hr class="border-primary">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="accordion" id="accordionExample1">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title" style="text-align: right;">
                                    <button class="btn btn-link btn-block text-left text-white" type="button"
                                        data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne" onclick="showHide(this)">
                                        <i class="fas fa-chevron-up" id="accordion"></i> ER 2A
                                    </button>
                                </h3>
                            </div>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordionExample1">
                            <div class="card card-body">
                                @foreach ($formPs1PanelHarianER2A as $key => $item)
                                    <?php $count = $key + 1; ?>

                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <input type="text"
                                                class="form-control @error('grup_er2a_.' . $key) is-invalid @enderror"
                                                id="grup_er2a_[]" name="grup_er2a_[]" value="{{$item['grup']}}" hidden
                                                placeholder="Enter Grup">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Cubicle</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('cubicle_er2a_.' . $key) is-invalid @enderror"
                                                            id="cubicle_er2a_[]" name="cubicle_er2a_[]" value="{{$item['cubicle']}}" disabled
                                                            placeholder="Enter Cubicle">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Keterangan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('keterangan_er2a_.' . $key) is-invalid @enderror"
                                                            id="keterangan_er2a_[]" name="keterangan_er2a_[]" value="{{$item['keterangan']}}" disabled
                                                            placeholder="Enter Keterangan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Local</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('local_er2a_.' . $key) is-invalid @enderror"
                                                            id="local_er2a_[]" name="local_er2a_[]" value="{{ $item['local'] }}"
                                                            placeholder="Enter Local">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Remote</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('remote_er2a_.' . $key) is-invalid @enderror"
                                                            id="remote_er2a_[]" name="remote_er2a_[]" value="{{ $item['remote'] }}"
                                                            placeholder="Enter Remote">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Posisi DS</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('posisi_ds_er2a_.' . $key) is-invalid @enderror" aria-label="Default select example" name="posisi_ds_er2a_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="open"
                                                        {{ old('posisi_ds_er2a_.' . $key) ?? $item->posisi_ds_er2a == 'open' ? 'selected' : '' }}>
                                                            Open</option>
                                                            <option value="close"
                                                        {{ old('posisi_ds_er2a_.' . $key) ?? $item->posisi_ds_er2a == 'close' ? 'selected' : '' }}>
                                                            Close</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Posisi CB</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('posisi_cb_er2a_.' . $key) is-invalid @enderror" aria-label="Default select example" name="posisi_cb_er2a_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="open"
                                                        {{ old('posisi_cb_er2a_.' . $key) ?? $item->posisi_cb == 'open' ? 'selected' : '' }}>
                                                            Open</option>
                                                            <option value="close"
                                                        {{ old('posisi_cb_er2a_.' . $key) ?? $item->posisi_cb == 'close' ? 'selected' : '' }}>
                                                            Close</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>CB Spring</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('cb_spring_er2a_.' . $key) is-invalid @enderror" aria-label="Default select example" name="cb_spring_er2a_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="charge"
                                                        {{ old('cb_spring_er2a_.' . $key) ?? $item->cb_spring == 'charge' ? 'selected' : '' }}>
                                                            Charge</option>
                                                            <option value="discharge"
                                                        {{ old('cb_spring_er2a_.' . $key) ?? $item->cb_spring == 'discharge' ? 'selected' : '' }}>
                                                            Discharge</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>SF6 LEV</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('sf6_lev_er2a_.' . $key) is-invalid @enderror" aria-label="Default select example" name="sf6_lev_er2a_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="r"
                                                        {{ old('sf6_lev_er2a_.' . $key) ?? $item->sf6_lev == 'r' ? 'selected' : '' }}>
                                                            R</option>
                                                            <option value="g"
                                                        {{ old('sf6_lev_er2a_.' . $key) ?? $item->sf6_lev == 'g' ? 'selected' : '' }}>
                                                            G</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Tegangan (KV)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('tegangan_er2a_.' . $key) is-invalid @enderror"
                                                            id="tegangan_er2a_[]" name="tegangan_er2a_[]" value="{{ $item['tegangan'] }}"
                                                            placeholder="Enter Tegangan (KV)">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Arus (A)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('arus_er2a_.' . $key) is-invalid @enderror"
                                                            id="arus_er2a_[]" name="arus_er2a_[]" value="{{ $item['arus'] }}"
                                                            placeholder="Enter Arus (A)">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Cos Phi</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('cos_phi_er2a_.' . $key) is-invalid @enderror"
                                                            id="cos_phi_er2a_[]" name="cos_phi_er2a_[]" value="{{ $item['cos_phi'] }}"
                                                            placeholder="Enter Cos Phi">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Frekuensi</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('frekuensi_er2a_.' . $key) is-invalid @enderror"
                                                            id="frekuensi_er2a_[]" name="frekuensi_er2a_[]" value="{{ $item['frekuensi'] }}"
                                                            placeholder="Enter Frekuensi">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Daya (MW)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('daya_er2a_.' . $key) is-invalid @enderror"
                                                            id="daya_er2a_[]" name="daya_er2a_[]" value="{{ $item['daya'] }}"
                                                            placeholder="Enter Daya (MW)">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <hr class="border-primary">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="accordion" id="accordionExample2">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title" style="text-align: right;">
                                    <button class="btn btn-link btn-block text-left text-white" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                                        aria-controls="collapseTwo" onclick="showHide(this)">
                                        <i class="fas fa-chevron-down" id="accordion"></i> ER 2B
                                    </button>
                                </h3>
                            </div>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordionExample2">

                            <div class="card card-body">
                                @foreach ($formPs1PanelHarianER2B as $key => $item)
                                    <?php $count = $key + 1; ?>

                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <input type="text"
                                                class="form-control @error('grup_er2b_.' . $key) is-invalid @enderror"
                                                id="grup_er2b_[]" name="grup_er2b_[]" value="{{$item['grup']}}" hidden
                                                placeholder="Enter Grup">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Cubicle</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('cubicle_er2b_.' . $key) is-invalid @enderror"
                                                            id="cubicle_er2b_[]" name="cubicle_er2b_[]" value="{{$item['cubicle']}}" disabled
                                                            placeholder="Enter Cubicle">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Keterangan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('keterangan_er2b_.' . $key) is-invalid @enderror"
                                                            id="keterangan_er2b_[]" name="keterangan_er2b_[]" value="{{$item['keterangan']}}" disabled
                                                            placeholder="Enter Keterangan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Local</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('local_er2b_.' . $key) is-invalid @enderror"
                                                            id="local_er2b_[]" name="local_er2b_[]" value="{{ $item['local'] }}"
                                                            placeholder="Enter Local">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Remote</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('remote_er2b_.' . $key) is-invalid @enderror"
                                                            id="remote_er2b_[]" name="remote_er2b_[]" value="{{ $item['remote'] }}"
                                                            placeholder="Enter Remote">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Posisi DS</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('posisi_ds_er2b_.' . $key) is-invalid @enderror" aria-label="Default select example" name="posisi_ds_er2b_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="open"
                                                        {{ old('posisi_ds_er2b_.' . $key) ?? $item->posisi_ds == 'open' ? 'selected' : '' }}>
                                                            Open</option>
                                                            <option value="close"
                                                        {{ old('posisi_ds_er2b_.' . $key) ?? $item->posisi_ds == 'close' ? 'selected' : '' }}>
                                                            Close</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Posisi CB</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('posisi_cb_er2b_.' . $key) is-invalid @enderror" aria-label="Default select example" name="posisi_cb_er2b_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="open"
                                                        {{ old('posisi_cb_er2b_.' . $key) ?? $item->posisi_cb == 'open' ? 'selected' : '' }}>
                                                            Open</option>
                                                            <option value="close"
                                                        {{ old('posisi_cb_er2b_.' . $key) ?? $item->posisi_cb == 'close' ? 'selected' : '' }}>
                                                            Close</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>CB Spring</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('cb_spring_er2b_.' . $key) is-invalid @enderror" aria-label="Default select example" name="cb_spring_er2b_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="charge"
                                                        {{ old('cb_spring_er2b_.' . $key) ?? $item->cb_spring == 'charge' ? 'selected' : '' }}>
                                                            Charge</option>
                                                            <option value="discharge"
                                                        {{ old('cb_spring_er2b_.' . $key) ?? $item->cb_spring == 'discharge' ? 'selected' : '' }}>
                                                            Discharge</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>SF6 LEV</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('sf6_lev_er2b_.' . $key) is-invalid @enderror" aria-label="Default select example" name="sf6_lev_er2b_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="r"
                                                        {{ old('sf6_lev_er2b_.' . $key) ?? $item->sf6_lev == 'r' ? 'selected' : '' }}>
                                                            R</option>
                                                            <option value="g"
                                                        {{ old('sf6_lev_er2b_.' . $key) ?? $item->sf6_lev == 'g' ? 'selected' : '' }}>
                                                            G</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Tegangan (KV)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('tegangan_er2b_.' . $key) is-invalid @enderror"
                                                            id="tegangan_er2b_[]" name="tegangan_er2b_[]" value="{{ $item['tegangan'] }}"
                                                            placeholder="Enter Tegangan (KV)">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Arus (A)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('arus_er2b_.' . $key) is-invalid @enderror"
                                                            id="arus_er2b_[]" name="arus_er2b_[]" value="{{ $item['arus'] }}"
                                                            placeholder="Enter Arus (A)">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Cos Phi</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('cos_phi_er2b_.' . $key) is-invalid @enderror"
                                                            id="cos_phi_er2b_[]" name="cos_phi_er2b_[]" value="{{ $item['cos_phi'] }}"
                                                            placeholder="Enter Cos Phi">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Frekuensi</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('frekuensi_er2b_.' . $key) is-invalid @enderror"
                                                            id="frekuensi_er2b_[]" name="frekuensi_er2b_[]" value="{{ $item['frekuensi'] }}"
                                                            placeholder="Enter Frekuensi">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Daya (MW)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('daya_er2b_.' . $key) is-invalid @enderror"
                                                            id="daya_er2b_[]" name="daya_er2b_[]" value="{{ $item['daya'] }}"
                                                            placeholder="Enter Daya (MW)">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <hr class="border-primary">
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="accordion" id="accordionExample4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title" style="text-align: right;">
                                    <button class="btn btn-link btn-block text-left text-white" type="button"
                                        data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
                                        aria-controls="collapseFour" onclick="showHide(this)">
                                        <i class="fas fa-chevron-down" id="accordion"></i> ER 1B
                                    </button>
                                </h3>
                            </div>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordionExample4">
                            <div class="card card-body">
                                @foreach ($formPs1PanelHarianER1B as $key => $item)
                                    <?php $count = $key + 1; ?>

                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <input type="text"
                                                class="form-control @error('grup_er1b_.' . $key) is-invalid @enderror"
                                                id="grup_er1b_[]" name="grup_er1b_[]" value="{{$item['grup']}}" hidden
                                                placeholder="Enter Grup">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Cubicle</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('cubicle_er1b_.' . $key) is-invalid @enderror"
                                                            id="cubicle_er1b_[]" name="cubicle_er1b_[]" value="{{$item['cubicle']}}" disabled
                                                            placeholder="Enter Cubicle">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Keterangan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('keterangan_er1b_.' . $key) is-invalid @enderror"
                                                            id="keterangan_er1b_[]" name="keterangan_er1b_[]" value="{{$item['keterangan']}}" disabled
                                                            placeholder="Enter Keterangan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Local</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('local_er1b_.' . $key) is-invalid @enderror"
                                                            id="local_er1b_[]" name="local_er1b_[]" value="{{ $item['local'] }}"
                                                            placeholder="Enter Local">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Remote</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('remote_er1b_.' . $key) is-invalid @enderror"
                                                            id="remote_er1b_[]" name="remote_er1b_[]" value="{{ $item['remote'] }}"
                                                            placeholder="Enter Remote">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Posisi DS</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('posisi_ds_er1b_.' . $key) is-invalid @enderror" aria-label="Default select example" name="posisi_ds_er1b_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="open"
                                                        {{ old('posisi_ds_er1b_.' . $key) ?? $item->posisi_ds == 'open' ? 'selected' : '' }}>
                                                            Open</option>
                                                            <option value="close"
                                                        {{ old('posisi_ds_er1b_.' . $key) ?? $item->posisi_ds == 'close' ? 'selected' : '' }}>
                                                            Close</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Posisi CB</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('posisi_cb_er1b_.' . $key) is-invalid @enderror" aria-label="Default select example" name="posisi_cb_er1b_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="open"
                                                        {{ old('posisi_cb_er1b_.' . $key) ?? $item->posisi_cb == 'open' ? 'selected' : '' }}>
                                                            Open</option>
                                                            <option value="close"
                                                        {{ old('posisi_cb_er1b_.' . $key) ?? $item->posisi_cb == 'close' ? 'selected' : '' }}>
                                                            Close</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>CB Spring</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('cb_spring_er1b_.' . $key) is-invalid @enderror" aria-label="Default select example" name="cb_spring_er1b_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="charge"
                                                        {{ old('cb_spring_er1b_.' . $key) ?? $item->cb_spring == 'charge' ? 'selected' : '' }}>
                                                            Charge</option>
                                                            <option value="discharge"
                                                        {{ old('cb_spring_er1b_.' . $key) ?? $item->cb_spring == 'discharge' ? 'selected' : '' }}>
                                                            Discharge</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>SF6 LEV</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('sf6_lev_er1b_.' . $key) is-invalid @enderror" aria-label="Default select example" name="sf6_lev_er1b_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="r"
                                                        {{ old('sf6_lev_er1b_.' . $key) ?? $item->sf6_lev == 'r' ? 'selected' : '' }}>
                                                            R</option>
                                                            <option value="g"
                                                        {{ old('sf6_lev_er1b_.' . $key) ?? $item->sf6_lev == 'g' ? 'selected' : '' }}>
                                                            G</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Tegangan (KV)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('tegangan_er1b_.' . $key) is-invalid @enderror"
                                                            id="tegangan_er1b_[]" name="tegangan_er1b_[]" value="{{ $item['tegangan'] }}"
                                                            placeholder="Enter Tegangan (KV)">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Arus (A)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('arus_er1b_.' . $key) is-invalid @enderror"
                                                            id="arus_er1b_[]" name="arus_er1b_[]" value="{{ $item['arus'] }}"
                                                            placeholder="Enter Arus (A)">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Cos Phi</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('cos_phi_er1b_.' . $key) is-invalid @enderror"
                                                            id="cos_phi_er1b_[]" name="cos_phi_er1b_[]" value="{{ $item['cos_phi'] }}"
                                                            placeholder="Enter Cos Phi">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Frekuensi</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('frekuensi_er1b_.' . $key) is-invalid @enderror"
                                                            id="frekuensi_er1b_[]" name="frekuensi_er1b_[]" value="{{ $item['frekuensi'] }}"
                                                            placeholder="Enter Frekuensi">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Daya (MW)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('daya_er1b_.' . $key) is-invalid @enderror"
                                                            id="daya_er1b_[]" name="daya_er1b_[]" value="{{ $item['daya'] }}"
                                                            placeholder="Enter Daya (MW)">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <hr class="border-primary">
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="accordion" id="accordionExample">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title" style="text-align: right;">
                                    <button class="btn btn-link btn-block text-left text-white" type="button"
                                        data-toggle="collapse" data-target="#collapseFive" aria-expanded="true"
                                        aria-controls="collapseFive" onclick="showHide(this)">
                                        <i class="fas fa-chevron-down" id="accordion"></i> PANEL MV GENSET
                                    </button>
                                </h3>
                            </div>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card card-body">
                                @foreach ($formPs1PanelHarianPanel as $key => $item)
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <input type="text"
                                                class="form-control @error('grup_panel_.' . $key) is-invalid @enderror"
                                                id="grup_panel_[]" name="grup_panel_[]" value="{{$item['grup']}}" hidden
                                                placeholder="Enter Grup">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Cubicle</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('cubicle_panel_.' . $key) is-invalid @enderror"
                                                            id="cubicle_panel_[]" name="cubicle_panel_[]" value="{{$item['cubicle']}}" disabled
                                                            placeholder="Enter Cubicle">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Keterangan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('keterangan_panel_.' . $key) is-invalid @enderror"
                                                            id="keterangan_panel_[]" name="keterangan_panel_[]" value="{{$item['keterangan']}}" disabled
                                                            placeholder="Enter Keterangan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Local</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('local_panel_.' . $key) is-invalid @enderror"
                                                            id="local_panel_[]" name="local_panel_[]" value="{{ $item['local'] }}"
                                                            placeholder="Enter Local">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Remote</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('remote_panel_.' . $key) is-invalid @enderror"
                                                            id="remote_panel_[]" name="remote_panel_[]" value="{{ $item['remote'] }}"
                                                            placeholder="Enter Remote">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Posisi DS</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('posisi_ds_panel_.' . $key) is-invalid @enderror" aria-label="Default select example" name="posisi_ds_panel_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="open"
                                                        {{ old('posisi_ds_panel_.' . $key) ?? $item->posisi_ds == 'open' ? 'selected' : '' }}>
                                                            Open</option>
                                                            <option value="close"
                                                        {{ old('posisi_ds_panel_.' . $key) ?? $item->posisi_ds == 'close' ? 'selected' : '' }}>
                                                            Close</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Posisi CB</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('posisi_cb_panel_.' . $key) is-invalid @enderror" aria-label="Default select example" name="posisi_cb_panel_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="open"
                                                        {{ old('posisi_cb_panel_.' . $key) ?? $item->posisi_cb == 'open' ? 'selected' : '' }}>
                                                            Open</option>
                                                            <option value="close"
                                                        {{ old('posisi_cb_panel_.' . $key) ?? $item->posisi_cb == 'close' ? 'selected' : '' }}>
                                                            Close</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>CB Spring</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('cb_spring_panel_.' . $key) is-invalid @enderror" aria-label="Default select example" name="cb_spring_panel_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="charge"
                                                        {{ old('cb_spring_panel_.' . $key) ?? $item->cb_spring == 'charge' ? 'selected' : '' }}>
                                                            Charge</option>
                                                            <option value="discharge"
                                                        {{ old('cb_spring_panel_.' . $key) ?? $item->cb_spring == 'discharge' ? 'selected' : '' }}>
                                                            Discharge</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>SF6 LEV</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control @error('sf6_lev_panel_.' . $key) is-invalid @enderror" aria-label="Default select example" name="sf6_lev_panel_[]">
                                                            <option value=" " selected>Open this select menu</option>
                                                            <option value="r"
                                                        {{ old('sf6_lev_panel_.' . $key) ?? $item->sf6_lev == 'r' ? 'selected' : '' }}>
                                                            R</option>
                                                            <option value="g"
                                                        {{ old('sf6_lev_panel_.' . $key) ?? $item->sf6_lev == 'g' ? 'selected' : '' }}>
                                                            G</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Tegangan (KV)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('tegangan_panel_.' . $key) is-invalid @enderror"
                                                            id="tegangan_panel_[]" name="tegangan_panel_[]" value="{{ $item['tegangan'] }}"
                                                            placeholder="Enter Tegangan (KV)">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Arus (A)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('arus_panel_.' . $key) is-invalid @enderror"
                                                            id="arus_panel_[]" name="arus_panel_[]" value="{{ $item['arus'] }}"
                                                            placeholder="Enter Arus (A)">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Cos Phi</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('cos_phi_panel_.' . $key) is-invalid @enderror"
                                                            id="cos_phi_panel_[]" name="cos_phi_panel_[]" value="{{ $item['cos_phi'] }}"
                                                            placeholder="Enter Cos Phi">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Frekuensi</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('frekuensi_panel_.' . $key) is-invalid @enderror"
                                                            id="frekuensi_panel_[]" name="frekuensi_panel_[]" value="{{ $item['frekuensi'] }}"
                                                            placeholder="Enter Frekuensi">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Daya (MW)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('daya_panel_.' . $key) is-invalid @enderror"
                                                            id="daya_panel_[]" name="daya_panel_[]" value="{{ $item['daya'] }}"
                                                            placeholder="Enter Daya (MW)">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <hr class="border-primary">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <textarea name="scada" class="form-control @error('scada') is-invalid @enderror" id="scada"
            cols="30" rows="3" placeholder="Enter Catatan">Catatan:</textarea>

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
            if (child.hasClass('fa-chevron-down')) {
                child.removeClass('fa-chevron-down').addClass('fa-chevron-up');; // logs "This is the child element"
            } else if (child.hasClass('fa-chevron-up')) {
                child.removeClass('fa-chevron-up').addClass('fa-chevron-down'); // logs "This is the child element"
            }
        }
    </script>
@endsection
