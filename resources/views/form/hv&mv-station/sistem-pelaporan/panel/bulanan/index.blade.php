@extends('layouts.app')

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
        <form method="POST" action="{{ route('form.hmv.sistem-pelaporan.panel.bulanan.update', $detailWorkOrderForm->id) }}" enctype="multipart/form-data"
        id="form">
        @method('patch')
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>EQUIPMENT NUMBER</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('equipment_number') is-invalid @enderror" id="equipment_number"
                                                name="equipment_number" value="{{ old('equipment_number') ?? $formHmvPanelBulanans[0]->equipment_number }}"
                                                placeholder="Enter EQUIPMENT NUMBER">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>LOCATION/STATION</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('location_station') is-invalid @enderror" id="location_station"
                                                name="location_station" value="{{ old('location_station') ?? $formHmvPanelBulanans[0]->location_station }}"
                                                placeholder="Enter LOCATION/STATION">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>NUMBER OF PANEL</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('number_of_panel') is-invalid @enderror" id="number_of_panel"
                                                name="number_of_panel" value="{{ old('number_of_panel') ?? $formHmvPanelBulanans[0]->number_of_panel }}"
                                                placeholder="Enter Number Of Panel">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>TYPE</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example" name="type">
                                                <option value="" selected>Open this select menu</option>
                                                <option value="AIS"
                                                    {{ (old('type') ?? $formHmvPanelBulanans[0]->type) == 'AIS' ? 'selected' : '' }}
                                                >AIS</option>
                                                <option value="VACCUM"
                                                    {{ (old('type') ?? $formHmvPanelBulanans[0]->type) == 'VACCUM' ? 'selected' : '' }}
                                                >VACCUM</option>
                                                <option value="SF6"
                                                    {{ (old('type') ?? $formHmvPanelBulanans[0]->type) == 'SF6' ? 'selected' : '' }}
                                                >SF6</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>Reference drawing</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('reference_drawing') is-invalid @enderror" id="reference_drawing"
                                                name="reference_drawing" value="{{ old('reference_drawing') ?? $formHmvPanelBulanans[0]->reference_drawing }}"
                                                placeholder="Enter Reference drawing">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>INSPECTION DATE</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="date"
                                                class="form-control @error('inspection_date') is-invalid @enderror" id="inspection_date"
                                                name="inspection_date" value="{{ old('inspection_date') ?? $formHmvPanelBulanans[0]->inspection_date }}"
                                                placeholder="Enter INSPECTION DATE">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>SERIAL NUMBER</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('serial_number') is-invalid @enderror" id="serial_number"
                                                name="serial_number" value="{{ old('serial_number') ?? $formHmvPanelBulanans[0]->serial_number }}"
                                                placeholder="Enter SERIAL NUMBER">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>BRAND/MERK</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('brand_merk') is-invalid @enderror" id="brand_merk"
                                                name="brand_merk" value="{{ old('brand_merk') ?? $formHmvPanelBulanans[0]->brand_merk }}"
                                                placeholder="Enter BRAND/MERK">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>NAME PLANT</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('name_plate') is-invalid @enderror" id="name_plate"
                                                name="name_plate" value="{{ old('name_plate') ?? $formHmvPanelBulanans[0]->name_plate }}"
                                                placeholder="Enter NAME PLANT">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>STATUS</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example" name="status">
                                                <option value="" selected>Open this select menu</option>
                                                <option value="OPS"
                                                    {{ (old('status') ?? $formHmvPanelBulanans[0]->status) == 'OPS' ? 'selected' : '' }}
                                                >OPS</option>
                                                <option value="STBY"
                                                    {{ (old('status') ?? $formHmvPanelBulanans[0]->status) == 'STBY' ? 'selected' : '' }}
                                                >STBY</option>
                                                <option value="REPAIR"
                                                    {{ (old('status') ?? $formHmvPanelBulanans[0]->status) == 'REPAIR' ? 'selected' : '' }}
                                                >REPAIR</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="text-align: right;">LEVEL 1 (IN SERVICE INSPECTION)</h3>
                        </div>
                    </div>
                    <div class="card card-body">
                        <label for="">1. Pemeriksaan Visual</label>
                        @foreach ($formHmvPanelBulanans as $key => $item)
                            @if($key >= 0 && $key <= 2)
                                <label for="">{{$item->pertanyaan }}</label>
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg">
                                        <table class="w-100">
                                            <tr>
                                                <td>Kondisi Awal</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select class="form-control" aria-label="Default select example" name="awal[]">
                                                        <option value="" selected>Open this select menu</option>
                                                        <option value="ada"
                                                            {{ (old('awal') ?? $item->awal) == 'ada' ? 'selected' : '' }}
                                                        >Ada</option>
                                                        <option value="tidak-ada"
                                                            {{ (old('awal') ?? $item->awal) == 'tidak-ada' ? 'selected' : '' }}
                                                        >Tidak Ada</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg">
                                        <table class="w-100">
                                            <tr>
                                                <td>Kondisi Akhir</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select class="form-control" aria-label="Default select example" name="akhir[]">
                                                        <option value="" selected>Open this select menu</option>
                                                        <option value="ada"
                                                            {{ (old('akhir') ?? $item->akhir) == 'ada' ? 'selected' : '' }}
                                                        >Ada</option>
                                                        <option value="tidak-ada"
                                                            {{ (old('akhir') ?? $item->akhir) == 'tidak-ada' ? 'selected' : '' }}
                                                        >Tidak Ada</option>
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
                                                    <input type="text"
                                                        class="form-control @error('remarks') is-invalid @enderror" id="remarks"
                                                        name="remarks[]" value="{{ $item->remarks }}"
                                                        placeholder="Enter Keterangan">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <br>
                            @endif
                            @if($key == 3)
                                <label for="">d. Alat ukur dan rele</label>
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg">
                                        <table class="w-100">
                                            <tr>
                                                <td>Kondisi Awal</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select class="form-control" aria-label="Default select example" name="awal[]">
                                                        <option value="" selected>Open this select menu</option>
                                                        <option value="berfungsi"
                                                    {{ (old('awal') ?? $item->awal) == 'berfungsi' ? 'selected' : '' }}
                                                        >Berfungsi</option>
                                                        <option value="tidak-berfungsi"
                                                    {{ (old('awal') ?? $item->awal) == 'tidak-berfungsi' ? 'selected' : '' }}
                                                        >Tidak Berfungsi</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg">
                                        <table class="w-100">
                                            <tr>
                                                <td>Kondisi Akhir</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select class="form-control" aria-label="Default select example" name="akhir[]">
                                                        <option value="" selected>Open this select menu</option>
                                                        <option value="berfungsi"
                                                    {{ (old('akhir') ?? $item->akhir) == 'berfungsi' ? 'selected' : '' }}
                                                        >Berfungsi</option>
                                                        <option value="tidak-berfungsi"
                                                    {{ (old('akhir') ?? $item->akhir) == 'tidak-berfungsi' ? 'selected' : '' }}
                                                        >Tidak Berfungsi</option>
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
                                                    <input type="text"
                                                        class="form-control @error('remarks') is-invalid @enderror" id="remarks"
                                                        name="remarks[]" value="{{ $item->remarks }}"
                                                        placeholder="Enter Keterangan">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="card card-body">
                        <label for="">2. Pemeriksaan Lemari Kontrol</label>

                        <label for="">Pemanas</label>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Awal</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example" name="awal[]">
                                                <option value="" selected>Open this select menu</option>
                                                <option value="berfungsi"
                                                    {{ (old('awal') ?? $formHmvPanelBulanans[4]->awal) == 'berfungsi' ? 'selected' : '' }}
                                                >Berfungsi</option>
                                                <option value="tidak-berfungsi"
                                                    {{ (old('awal') ?? $formHmvPanelBulanans[4]->awal) == 'tidak-berfungsi' ? 'selected' : '' }}
                                                >Tidak Berfungsi</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Akhir</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example" name="akhir[]">
                                                <option value="" selected>Open this select menu</option>
                                                <option value="berfungsi"
                                                    {{ (old('akhir') ?? $formHmvPanelBulanans[4]->akhir) == 'berfungsi' ? 'selected' : '' }}
                                                >Berfungsi</option>
                                                <option value="tidak-berfungsi"
                                                    {{ (old('akhir') ?? $formHmvPanelBulanans[4]->akhir) == 'tidak-berfungsi' ? 'selected' : '' }}
                                                >Tidak Berfungsi</option>
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
                                            <input type="text"
                                                class="form-control @error('remarks') is-invalid @enderror" id="remarks"
                                                name="remarks[]" value="{{ $formHmvPanelBulanans[4]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <br>
                        <label for="">Lampu Penerangan</label>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Awal</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example" name="awal[]">
                                                <option value="" selected>Open this select menu</option>
                                                <option value="menyala"
                                                    {{ (old('awal') ?? $formHmvPanelBulanans[5]->awal) == 'menyala' ? 'selected' : '' }}
                                                >Menyala</option>
                                                <option value="tidak-menyala"
                                                    {{ (old('awal') ?? $formHmvPanelBulanans[5]->awal) == 'tidak-menyala' ? 'selected' : '' }}
                                                >Tidak Menyala</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Akhir</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example" name="akhir[]">
                                                <option value="" selected>Open this select menu</option>
                                                <option value="menyala"
                                                    {{ (old('akhir') ?? $formHmvPanelBulanans[5]->akhir) == 'menyala' ? 'selected' : '' }}
                                                >Menyala</option>
                                                <option value="tidak-menyala"
                                                    {{ (old('akhir') ?? $formHmvPanelBulanans[5]->akhir) == 'tidak-menyala' ? 'selected' : '' }}
                                                >Tidak Menyala</option>
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
                                            <input type="text"
                                                class="form-control @error('remarks') is-invalid @enderror" id="remarks"
                                                name="remarks[]" value="{{ $formHmvPanelBulanans[5]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <br>
                        <label for="">KeBersihan Kubikel</label>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Awal</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example" name="awal[]">
                                                <option value="" selected>Open this select menu</option>
                                                <option value="bersih"
                                                    {{ (old('awal') ?? $formHmvPanelBulanans[6]->awal) == 'bersih' ? 'selected' : '' }}
                                                >Bersih</option>
                                                <option value="kotor"
                                                    {{ (old('awal') ?? $formHmvPanelBulanans[6]->awal) == 'kotor' ? 'selected' : '' }}
                                                >Kotor</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Akhir</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example" name="akhir[]">
                                                <option value="" selected>Open this select menu</option>
                                                <option value="bersih"
                                                    {{ (old('akhir') ?? $formHmvPanelBulanans[6]->akhir) == 'bersih' ? 'selected' : '' }}
                                                >Bersih</option>
                                                <option value="kotor"
                                                    {{ (old('akhir') ?? $formHmvPanelBulanans[6]->akhir) == 'kotor' ? 'selected' : '' }}
                                                >Kotor</option>
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
                                            <input type="text"
                                                class="form-control @error('remarks') is-invalid @enderror" id="remarks"
                                                name="remarks[]" value="{{ $formHmvPanelBulanans[6]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">3. Pemeriksaan struktur mekanik kubikel</label>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Awal</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example" name="awal[]">
                                                <option value="" selected>Open this select menu</option>
                                                <option value="normal"
                                                    {{ (old('awal') ?? $formHmvPanelBulanans[7]->awal) == 'normal' ? 'selected' : '' }}
                                                >Normal</option>
                                                <option value="tidak-normal"
                                                    {{ (old('awal') ?? $formHmvPanelBulanans[7]->awal) == 'tidak-normal' ? 'selected' : '' }}
                                                >Tidak Normal</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Akhir</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example" name="akhir[]">
                                                <option value="" selected>Open this select menu</option>
                                                <option value="normal"
                                                    {{ (old('akhir') ?? $formHmvPanelBulanans[7]->akhir) == 'normal' ? 'selected' : '' }}
                                                >Normal</option>
                                                <option value="tidak-normal"
                                                    {{ (old('akhir') ?? $formHmvPanelBulanans[7]->akhir) == 'tidak-normal' ? 'selected' : '' }}
                                                >Tidak Normal</option>
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
                                            <input type="text"
                                                class="form-control @error('remarks') is-invalid @enderror" id="remarks"
                                                name="remarks[]" value="{{ $formHmvPanelBulanans[7]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">4. Pemeriksaan visual alat ukur dan rele</label>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Awal</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example" name="awal[]">
                                                <option value="" selected>Open this select menu</option>
                                                <option value="berfungsi"
                                                    {{ (old('awal') ?? $formHmvPanelBulanans[8]->awal) == 'berfungsi' ? 'selected' : '' }}
                                                >Berfungsi</option>
                                                <option value="tidak-berfungsi"
                                                    {{ (old('awal') ?? $formHmvPanelBulanans[8]->awal) == 'tidak-berfungsi' ? 'selected' : '' }}
                                                >Tidak Berfungsi</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Akhir</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example" name="akhir[]">
                                                <option value="" selected>Open this select menu</option>
                                                <option value="berfungsi"
                                                    {{ (old('akhir') ?? $formHmvPanelBulanans[8]->akhir) == 'berfungsi' ? 'selected' : '' }}
                                                >Berfungsi</option>
                                                <option value="tidak-berfungsi"
                                                    {{ (old('akhir') ?? $formHmvPanelBulanans[8]->akhir) == 'tidak-berfungsi' ? 'selected' : '' }}
                                                >Tidak Berfungsi</option>
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
                                            <input type="text"
                                                class="form-control @error('remarks') is-invalid @enderror" id="remarks"
                                                name="remarks[]" value="{{ $formHmvPanelBulanans[8]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="text-align: right;">LEVEL 2 (IN SERVICE MEASUREMENT)</h3>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">5. Pengukuran suplai tegangan AC kubikel <span class="text-muted">( < 85% atau > 110% dari 20 kV )</span></label>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Awal</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('awal') is-invalid @enderror" id="awal"
                                                name="awal[]" value="{{ $formHmvPanelBulanans[9]->awal }}"
                                                placeholder="Enter Kondisi Awal">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Akhir</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('akhir') is-invalid @enderror" id="akhir"
                                                name="akhir[]" value="{{ $formHmvPanelBulanans[9]->akhir }}"
                                                placeholder="Enter Kondisi Akhir">
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
                                            <input type="text"
                                                class="form-control @error('remarks') is-invalid @enderror" id="remarks"
                                                name="remarks[]" value="{{ $formHmvPanelBulanans[9]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">6. Pengukuran suhu kubikel <span class="text-muted">(35 &deg; C)</span></label>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Awal</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('awal') is-invalid @enderror" id="awal"
                                                name="awal[]" value="{{ $formHmvPanelBulanans[10]->awal }}"
                                                placeholder="Enter Kondisi Awal">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Akhir</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('akhir') is-invalid @enderror" id="akhir"
                                                name="akhir[]" value="{{ $formHmvPanelBulanans[10]->akhir }}"
                                                placeholder="Enter Kondisi Akhir">
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
                                            <input type="text"
                                                class="form-control @error('remarks') is-invalid @enderror" id="remarks"
                                                name="remarks[]" value="{{ $formHmvPanelBulanans[10]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">7. Pengukuran suhu terminal dan sambungan rel, CT, PT, kabel dalam <span class="text-muted">( 35 &deg; C )</span></label>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Awal</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('awal') is-invalid @enderror" id="awal"
                                                name="awal[]" value="{{ $formHmvPanelBulanans[11]->awal }}"
                                                placeholder="Enter Kondisi Awal">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Akhir</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('akhir') is-invalid @enderror" id="akhir"
                                                name="akhir[]" value="{{ $formHmvPanelBulanans[11]->akhir }}"
                                                placeholder="Enter Kondisi Akhir">
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
                                            <input type="text"
                                                class="form-control @error('remarks') is-invalid @enderror" id="remarks"
                                                name="remarks[]" value="{{ $formHmvPanelBulanans[11]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                    cols="30" rows="3" placeholder="Enter Catatan">{!! $formHmvPanelBulanans[0]->catatan ?? '' !!}</textarea>
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
