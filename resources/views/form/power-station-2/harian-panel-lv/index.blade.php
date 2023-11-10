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
        <form method="POST" action="{{ route('form.ps2.harian-panel-lv.update', $detailWorkOrderForm->id) }}"
            enctype="multipart/form-data" id="form">
            @method('patch')
            @csrf
            {{-- INCOMING 1 --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 class="card-title" style="text-align: right;">1. INCOMING I</h3>
                            </div>
                            <div class="card-body">
                                @foreach ($incoming1s as $incoming1)
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Peralatan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $incoming1->peralatan }}" disabled
                                                            placeholder="Enter Peralatan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Merek</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $incoming1->merek }}" disabled
                                                            placeholder="Enter Merek">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Tipe</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $incoming1->tipe }}" disabled
                                                            placeholder="Enter Tipe">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Posisi Breaker</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="{{ 'posisi_breaker_incoming1[]' }}">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="ON"
                                                                {{ old('posisi_breaker') ?? $incoming1->posisi_breaker == 'ON' ? 'selected' : '' }}>
                                                                ON
                                                            </option>
                                                            <option value="OFF"
                                                                {{ old('posisi_breaker') ?? $incoming1->posisi_breaker == 'OFF' ? 'selected' : '' }}>
                                                                OFF</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Keterangan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" disabled
                                                            value="{{ $incoming1->keterangan }}" name="q1a_keterangan"
                                                            placeholder="Enter Keterangan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- RAK 1 --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 class="card-title" style="text-align: right;">2. RAK I</h3>
                            </div>
                            <div class="card-body">
                                @foreach ($rak1s as $rak1)
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Peralatan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $rak1->peralatan }}" disabled
                                                            placeholder="Enter Peralatan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Merek</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $rak1->merek }}" disabled placeholder="Enter Merek">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Tipe</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $rak1->tipe }}" disabled placeholder="Enter Tipe">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Posisi Breaker</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="{{ 'posisi_breaker_rak1[]' }}">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="ON"
                                                                {{ old('posisi_breaker') ?? $rak1->posisi_breaker == 'ON' ? 'selected' : '' }}>ON
                                                            </option>
                                                            <option value="OFF"
                                                                {{ old('posisi_breaker') ?? $rak1->posisi_breaker == 'OFF' ? 'selected' : '' }}>
                                                                OFF</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Keterangan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" disabled
                                                            value="{{ $rak1->keterangan }}" name="q1a_keterangan"
                                                            placeholder="Enter Keterangan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- RAK 2 --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 class="card-title" style="text-align: right;">3. RAK II</h3>
                            </div>
                            <div class="card-body">
                                @foreach ($rak2s as $rak2)
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Peralatan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $rak2->peralatan }}" disabled
                                                            placeholder="Enter Peralatan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Merek</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $rak2->merek }}" disabled placeholder="Enter Merek">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Tipe</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $rak2->tipe }}" disabled placeholder="Enter Tipe">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Posisi Breaker</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="{{ 'posisi_breaker_rak2[]' }}">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="ON"
                                                                {{ old('posisi_breaker') ?? $rak2->posisi_breaker == 'ON' ? 'selected' : '' }}>ON
                                                            </option>
                                                            <option value="OFF"
                                                                {{ old('posisi_breaker') ?? $rak2->posisi_breaker == 'OFF' ? 'selected' : '' }}>
                                                                OFF</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Keterangan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" disabled
                                                            value="{{ $rak2->keterangan }}" name="q1a_keterangan"
                                                            placeholder="Enter Keterangan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- COUPLER --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 class="card-title" style="text-align: right;">4. COUPLER</h3>
                            </div>
                            <div class="card-body">
                                @foreach ($couplers as $coupler)
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Peralatan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $coupler->peralatan }}" disabled
                                                            placeholder="Enter Peralatan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Merek</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $coupler->merek }}" disabled placeholder="Enter Merek">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Tipe</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $coupler->tipe }}" disabled placeholder="Enter Tipe">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Posisi Breaker</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="{{ 'posisi_breaker_coupler[]' }}">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="ON"
                                                                {{ old('posisi_breaker') ?? $coupler->posisi_breaker == 'ON' ? 'selected' : '' }}>ON
                                                            </option>
                                                            <option value="OFF"
                                                                {{ old('posisi_breaker') ?? $coupler->posisi_breaker == 'OFF' ? 'selected' : '' }}>
                                                                OFF</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Keterangan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" disabled
                                                            value="{{ $coupler->keterangan }}" name="q1a_keterangan"
                                                            placeholder="Enter Keterangan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- INCOMING II --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 class="card-title" style="text-align: right;">5. INCOMING II</h3>
                            </div>
                            <div class="card-body">
                                @foreach ($incoming2s as $incoming2)
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Peralatan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $incoming2->peralatan }}" disabled
                                                            placeholder="Enter Peralatan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Merek</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $incoming2->merek }}" disabled placeholder="Enter Merek">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Tipe</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $incoming2->tipe }}" disabled placeholder="Enter Tipe">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Posisi Breaker</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="{{ 'posisi_breaker_incoming2[]' }}">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="ON"
                                                                {{ old('posisi_breaker') ?? $incoming2->posisi_breaker == 'ON' ? 'selected' : '' }}>ON
                                                            </option>
                                                            <option value="OFF"
                                                                {{ old('posisi_breaker') ?? $incoming2->posisi_breaker == 'OFF' ? 'selected' : '' }}>
                                                                OFF</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Keterangan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" disabled
                                                            value="{{ $incoming2->keterangan }}" name="q1a_keterangan"
                                                            placeholder="Enter Keterangan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- RAK III --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 class="card-title" style="text-align: right;">6. RAK III</h3>
                            </div>
                            <div class="card-body">
                                @foreach ($rak3s as $rak3)
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Peralatan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $rak3->peralatan }}" disabled
                                                            placeholder="Enter Peralatan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Merek</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $rak3->merek }}" disabled placeholder="Enter Merek">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Tipe</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $rak3->tipe }}" disabled placeholder="Enter Tipe">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Posisi Breaker</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="{{ 'posisi_breaker_rak3[]' }}">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="ON"
                                                                {{ old('posisi_breaker') ?? $rak3->posisi_breaker == 'ON' ? 'selected' : '' }}>ON
                                                            </option>
                                                            <option value="OFF"
                                                                {{ old('posisi_breaker') ?? $rak3->posisi_breaker == 'OFF' ? 'selected' : '' }}>
                                                                OFF</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Keterangan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" disabled
                                                            value="{{ $rak3->keterangan }}" name="q1a_keterangan"
                                                            placeholder="Enter Keterangan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- RAK IV --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 class="card-title" style="text-align: right;">7. RAK IV</h3>
                            </div>
                            <div class="card-body">
                                @foreach ($rak4s as $rak4)
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Peralatan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $rak4->peralatan }}" disabled
                                                            placeholder="Enter Peralatan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Merek</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $rak4->merek }}" disabled placeholder="Enter Merek">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Tipe</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $rak4->tipe }}" disabled placeholder="Enter Tipe">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Posisi Breaker</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="{{ 'posisi_breaker_rak4[]' }}">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="ON"
                                                                {{ old('posisi_breaker') ?? $rak4->posisi_breaker == 'ON' ? 'selected' : '' }}>ON
                                                            </option>
                                                            <option value="OFF"
                                                                {{ old('posisi_breaker') ?? $rak4->posisi_breaker == 'OFF' ? 'selected' : '' }}>
                                                                OFF</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Keterangan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" disabled
                                                            value="{{ $rak4->keterangan }}" name="q1a_keterangan"
                                                            placeholder="Enter Keterangan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- PANEL OUT GOING ACC --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 class="card-title" style="text-align: right;">8. PANEL OUT GOING ACCI</h3>
                            </div>
                            <div class="card-body">
                                @foreach ($panelOutGoingAoccs as $panelOutGoingAocc)
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Peralatan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $panelOutGoingAocc->peralatan }}" disabled
                                                            placeholder="Enter Peralatan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Merek</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $panelOutGoingAocc->merek }}" disabled placeholder="Enter Merek">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Tipe</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $panelOutGoingAocc->tipe }}" disabled placeholder="Enter Tipe">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Posisi Breaker</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="{{ 'posisi_breaker_panelOutGoingAocc[]' }}">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="ON"
                                                                {{ old('posisi_breaker') ?? $panelOutGoingAocc->posisi_breaker == 'ON' ? 'selected' : '' }}>ON
                                                            </option>
                                                            <option value="OFF"
                                                                {{ old('posisi_breaker') ?? $panelOutGoingAocc->posisi_breaker == 'OFF' ? 'selected' : '' }}>
                                                                OFF</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Keterangan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" disabled
                                                            value="{{ $panelOutGoingAocc->keterangan }}" name="q1a_keterangan"
                                                            placeholder="Enter Keterangan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
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
                                            placeholder="Deskripsi">{{ old('catatan') ?? $incoming1s[0]->catatan }}</textarea>
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
@endsection
