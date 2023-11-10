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
        <form method="POST" action="{{ route('form.hmv.sistem-pelaporan.gis.dua-tahunan.update', $detailWorkOrderForm->id) }}" enctype="multipart/form-data"
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
                                                name="equipment_number" value="{{ old('equipment_number') ?? $formHmvGisDuaTahunans[0]->equipment_number }}"
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
                                                name="location_station" value="{{ old('location_station') ?? $formHmvGisDuaTahunans[0]->location_station }}"
                                                placeholder="Enter LOCATION/STATION">
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
                                            <input type="text"
                                                class="form-control @error('type') is-invalid @enderror" id="type"
                                                name="type" value="{{ old('type') ?? $formHmvGisDuaTahunans[0]->type }}"
                                                placeholder="Enter TYPE">
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
                                                name="reference_drawing" value="{{ old('reference_drawing') ?? $formHmvGisDuaTahunans[0]->reference_drawing }}"
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
                                                name="inspection_date" value="{{ old('inspection_date') ?? $formHmvGisDuaTahunans[0]->inspection_date }}"
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
                                                name="serial_number" value="{{ old('serial_number') ?? $formHmvGisDuaTahunans[0]->serial_number }}"
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
                                                name="brand_merk" value="{{ old('brand_merk') ?? $formHmvGisDuaTahunans[0]->brand_merk }}"
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
                                                name="name_plate" value="{{ old('name_plate') ?? $formHmvGisDuaTahunans[0]->name_plate }}"
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
                                                    {{ (old('status') ?? $formHmvGisDuaTahunans[0]->status) == 'OPS' ? 'selected' : '' }}
                                                >OPS</option>
                                                <option value="STBY"
                                                    {{ (old('status') ?? $formHmvGisDuaTahunans[0]->status) == 'STBY' ? 'selected' : '' }}
                                                >STBY</option>
                                                <option value="REPAIR"
                                                    {{ (old('status') ?? $formHmvGisDuaTahunans[0]->status) == 'REPAIR' ? 'selected' : '' }}
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
                            <h3 class="card-title" style="text-align: right;">LEVEL 1 CEK VISUAL (IN SERVICE INSPECTION)</h3>
                        </div>
                    </div>
                    @foreach ($formHmvGisDuaTahunans as $key => $item)
                        @if($key >= 0 && $key <= 5)
                            <div class="card card-body">
                                <label for="">{{$loop->iteration}}. {{$item->pertanyaan}}</label>
                                @if ($key == 3)
                                    {{-- cacat --}}
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
                                                            <option value="cacat"
                                                        {{ (old('awal') ?? $item->awal) == 'cacat' ? 'selected' : '' }}
                                                            >Cacat</option>
                                                            <option value="tidak-cacat"
                                                        {{ (old('awal') ?? $item->awal) == 'tidak-cacat' ? 'selected' : '' }}
                                                            >Tidak Cacat</option>
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
                                                            <option value="cacat"
                                                        {{ (old('akhir') ?? $item->akhir) == 'cacat' ? 'selected' : '' }}
                                                            >Cacat</option>
                                                            <option value="tidak-cacat"
                                                        {{ (old('akhir') ?? $item->akhir) == 'tidak-cacat' ? 'selected' : '' }}
                                                            >Tidak Cacat</option>
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
                                @elseif($key == 5)
                                    {{-- kencang --}}
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
                                                            <option value="kencang"
                                                        {{ (old('awal') ?? $item->awal) == 'kencang' ? 'selected' : '' }}
                                                            >Kencang</option>
                                                            <option value="tidak-kencang"
                                                        {{ (old('awal') ?? $item->awal) == 'tidak-kencang' ? 'selected' : '' }}
                                                            >Tidak Kencang</option>
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
                                                            <option value="kencang"
                                                        {{ (old('akhir') ?? $item->akhir) == 'kencang' ? 'selected' : '' }}
                                                            >Kencang</option>
                                                            <option value="tidak-kencang"
                                                        {{ (old('akhir') ?? $item->akhir) == 'tidak-kencang' ? 'selected' : '' }}
                                                            >Tidak Kencang</option>
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
                                @else
                                    {{-- berfungsi --}}
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
                            </div>
                        @endif
                    @endforeach

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="text-align: right;">LEVEL 2 (IN SERVICE MEASUREMENT)</h3>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">7. Pengukuran tahanan pentanahan <span class="text-muted">( &le; 1 &#937; )</span></label>
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
                                                name="awal[]" value="{{ $formHmvGisDuaTahunans[6]->awal }}"
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
                                                name="akhir[]" value="{{ $formHmvGisDuaTahunans[6]->akhir }}"
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
                                                name="remarks[]" value="{{ $formHmvGisDuaTahunans[6]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">8. Pengujian kemumian (purity) gas SF6 <span class="text-muted">( 97% )</span></label>
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
                                                name="awal[]" value="{{ $formHmvGisDuaTahunans[7]->awal }}"
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
                                                name="akhir[]" value="{{ $formHmvGisDuaTahunans[7]->akhir }}"
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
                                                name="remarks[]" value="{{ $formHmvGisDuaTahunans[7]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">9. Pengujian dekomposisi produk gas SF6 <span class="text-muted">( < 2000 ppmv)</span></label>
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
                                                name="awal[]" value="{{ $formHmvGisDuaTahunans[8]->awal }}"
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
                                                name="akhir[]" value="{{ $formHmvGisDuaTahunans[8]->akhir }}"
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
                                                name="remarks[]" value="{{ $formHmvGisDuaTahunans[8]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">10. Pengujian moisture content gas SF6 <span class="text-muted">( < 3960 ppmv)</span></label>
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
                                                name="awal[]" value="{{ $formHmvGisDuaTahunans[9]->awal }}"
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
                                                name="akhir[]" value="{{ $formHmvGisDuaTahunans[9]->akhir }}"
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
                                                name="remarks[]" value="{{ $formHmvGisDuaTahunans[9]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">11. Pengujian dew point gas SF6<span class="text-muted">( <-5 &deg; C)</span></label>
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
                                                name="awal[]" value="{{ $formHmvGisDuaTahunans[10]->awal }}"
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
                                                name="akhir[]" value="{{ $formHmvGisDuaTahunans[10]->akhir }}"
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
                                                name="remarks[]" value="{{ $formHmvGisDuaTahunans[10]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">12. Pemeriksaan tekanan gas <span class="text-muted">(5-6 bar)</span></label>
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
                                                name="awal[]" value="{{ $formHmvGisDuaTahunans[11]->awal }}"
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
                                                name="akhir[]" value="{{ $formHmvGisDuaTahunans[11]->akhir }}"
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
                                                name="remarks[]" value="{{ $formHmvGisDuaTahunans[11]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">13. Melakukan deteksi kebocoran ketika pemasangan sudah siap <span class="text-muted">(0,5% /year)</span></label>
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
                                                name="awal[]" value="{{ $formHmvGisDuaTahunans[12]->awal }}"
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
                                                name="akhir[]" value="{{ $formHmvGisDuaTahunans[12]->akhir }}"
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
                                                name="remarks[]" value="{{ $formHmvGisDuaTahunans[12]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="text-align: right;">LEVEL 3 (SHUTDOWN MEASUREMENT)</h3>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">14. Pengukuran tahanan isolasi <span class="text-muted">( &ge; 1 M&#937;/KV )</span></label>
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
                                                name="awal[]" value="{{ $formHmvGisDuaTahunans[13]->awal }}"
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
                                                name="akhir[]" value="{{ $formHmvGisDuaTahunans[13]->akhir }}"
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
                                                name="remarks[]" value="{{ $formHmvGisDuaTahunans[13]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">15. Pengujian tahanan kontak <span class="text-muted">( &le; 100 &mu;&#937; )</span></label>
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
                                                name="awal[]" value="{{ $formHmvGisDuaTahunans[14]->awal }}"
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
                                                name="akhir[]" value="{{ $formHmvGisDuaTahunans[14]->akhir }}"
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
                                                name="remarks[]" value="{{ $formHmvGisDuaTahunans[14]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">16. Pengujian keserempakan PMT/CB <span class="text-muted">( &le; 100 &mu;&#937; )</span></label>
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
                                                name="awal[]" value="{{ $formHmvGisDuaTahunans[15]->awal }}"
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
                                                name="akhir[]" value="{{ $formHmvGisDuaTahunans[15]->akhir }}"
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
                                                name="remarks[]" value="{{ $formHmvGisDuaTahunans[15]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">17. pemberian pelumas gear PMS/DS <span class="text-muted">( &le; 100 &mu;&#937; )</span></label>
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
                                                name="awal[]" value="{{ $formHmvGisDuaTahunans[16]->awal }}"
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
                                                name="akhir[]" value="{{ $formHmvGisDuaTahunans[16]->akhir }}"
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
                                                name="remarks[]" value="{{ $formHmvGisDuaTahunans[16]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">18. Pemberian pelumas gear PMS/DS tanah <span class="text-muted">( &le; 100 &mu;&#937; )</span></label>
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
                                                name="awal[]" value="{{ $formHmvGisDuaTahunans[17]->awal }}"
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
                                                name="akhir[]" value="{{ $formHmvGisDuaTahunans[17]->akhir }}"
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
                                                name="remarks[]" value="{{ $formHmvGisDuaTahunans[17]->remarks }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    @foreach ($formHmvGisDuaTahunans as $key => $item)
                        @if($key >= 18 && $key <= 27)
                            <div class="card card-body">
                                <label for="">{{$loop->iteration}}. {{$item->pertanyaan}}</label>
                                @if ($key == 21 || $key == 22 || $key == 23)
                                    {{-- normal --}}
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
                                                        {{ (old('awal') ?? $item->awal) == 'normal' ? 'selected' : '' }}
                                                            >Normal</option>
                                                            <option value="tidak-normal"
                                                        {{ (old('awal') ?? $item->awal) == 'tidak-normal' ? 'selected' : '' }}
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
                                                        {{ (old('akhir') ?? $item->akhir) == 'normal' ? 'selected' : '' }}
                                                            >Normal</option>
                                                            <option value="tidak-normal"
                                                        {{ (old('akhir') ?? $item->akhir) == 'tidak-normal' ? 'selected' : '' }}
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
                                                            name="remarks[]" value="{{ $item->remarks }}"
                                                            placeholder="Enter Keterangan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    {{-- berfungsi --}}
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
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                    cols="30" rows="3" placeholder="Enter catatan">{!! $formHmvGisDuaTahunans[0]->catatan ?? '' !!}</textarea>
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
