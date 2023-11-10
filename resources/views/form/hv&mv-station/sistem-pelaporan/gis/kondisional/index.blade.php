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
        <form method="POST" action="{{ route('form.hmv.sistem-pelaporan.gis.kondisional.update', $detailWorkOrderForm->id) }}" enctype="multipart/form-data"
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
                                                name="equipment_number" value="{{ old('equipment_number') ?? $formHmvGisKondisionals[0]->equipment_number }}"
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
                                                name="location_station" value="{{ old('location_station') ?? $formHmvGisKondisionals[0]->location_station }}"
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
                                                name="type" value="{{ old('type') ?? $formHmvGisKondisionals[0]->type }}"
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
                                                name="reference_drawing" value="{{ old('reference_drawing') ?? $formHmvGisKondisionals[0]->reference_drawing }}"
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
                                                name="inspection_date" value="{{ old('inspection_date') ?? $formHmvGisKondisionals[0]->inspection_date }}"
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
                                                name="serial_number" value="{{ old('serial_number') ?? $formHmvGisKondisionals[0]->serial_number }}"
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
                                                name="brand_merk" value="{{ old('brand_merk') ?? $formHmvGisKondisionals[0]->brand_merk }}"
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
                                                name="name_plate" value="{{ old('name_plate') ?? $formHmvGisKondisionals[0]->name_plate }}"
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
                                                    {{ (old('status') ?? $formHmvGisKondisionals[0]->status) == 'OPS' ? 'selected' : '' }}
                                                >OPS</option>
                                                <option value="STBY"
                                                    {{ (old('status') ?? $formHmvGisKondisionals[0]->status) == 'STBY' ? 'selected' : '' }}
                                                >STBY</option>
                                                <option value="REPAIR"
                                                    {{ (old('status') ?? $formHmvGisKondisionals[0]->status) == 'REPAIR' ? 'selected' : '' }}
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
                            <h3 class="card-title" style="text-align: right;">LEVEL 2 (IN SERVICE MEASUREMENT)</h3>
                        </div>
                    </div>

                    @foreach ($formHmvGisKondisionals as $key => $item)
                        <div class="card card-body">
                            <label for="">{{$loop->iteration}}. {{$item->pertanyaan}}
                                <span class="text-muted">
                                    @if($key == 18)
                                    ( - 15 to + 40 &deg; C )
                                    @elseif($key == 19 || $key == 20)
                                    @elseif($key == 17 || $key == 14 || $key == 11 || $key == 8 || $key == 4 || $key == 2)
                                    ( 0,5% / year )
                                    @else
                                    ( 5 - 6 bar )
                                    @endif
                                </span>
                            </label>
                            @if ($key == 19 || $key == 20)
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
                                                        <option value="longgar"
                                                    {{ (old('awal') ?? $item->awal) == 'longgar' ? 'selected' : '' }}
                                                        >Longgar</option>
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
                                                        <option value="longgar"
                                                    {{ (old('akhir') ?? $item->akhir) == 'longgar' ? 'selected' : '' }}
                                                        >Longgar</option>
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
                                                        name="awal[]" value="{{ $item->awal }}"
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
                                                        name="akhir[]" value="{{ $item->akhir }}"
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
                                                        name="remarks[]" value="{{ $item->remarks }}"
                                                        placeholder="Enter Keterangan">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                    cols="30" rows="3" placeholder="Enter catatan">{!! $formHmvGisKondisionals[0]->catatan ?? '' !!}</textarea>
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
