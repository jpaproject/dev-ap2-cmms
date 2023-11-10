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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">


                    <div class="card card-body">
                        {{-- <label for="">1. Pemeriksaan kondisi manometer dan density meter pada PMT/CB</label> --}}
                        <div class="row">

                            <div class="col-12 col-md-6 col-lg-4">
                                <table class="w-100">
                                    <tr>
                                        <td>EQUIPMENT NUMBER</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                class="form-control @error('ratio-ct') is-invalid @enderror" id="ratio-ct"
                                                name="ratio-ct" value="{{ old('ratio-ct') }}"
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
                                                class="form-control @error('ratio-ct') is-invalid @enderror" id="ratio-ct"
                                                name="ratio-ct" value="{{ old('ratio-ct') }}"
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
                                                class="form-control @error('ratio-ct') is-invalid @enderror" id="ratio-ct"
                                                name="ratio-ct" value="{{ old('ratio-ct') }}"
                                                placeholder="Enter TYPE">
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
                                            <select class="form-control" aria-label="Default select example">
                                                <option value"" selected>Open this select menu</option>
                                                <option value="AIS">AIS</option>
                                                <option value="VACCUM">VACCUM</option>
                                                <option value="SF6">SF6</option>
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
                                                class="form-control @error('ratio-ct') is-invalid @enderror" id="ratio-ct"
                                                name="ratio-ct" value="{{ old('ratio-ct') }}"
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
                                                class="form-control @error('ratio-ct') is-invalid @enderror" id="ratio-ct"
                                                name="ratio-ct" value="{{ old('ratio-ct') }}"
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
                                                class="form-control @error('ratio-ct') is-invalid @enderror" id="ratio-ct"
                                                name="ratio-ct" value="{{ old('ratio-ct') }}"
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
                                                class="form-control @error('ratio-ct') is-invalid @enderror" id="ratio-ct"
                                                name="ratio-ct" value="{{ old('ratio-ct') }}"
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
                                                class="form-control @error('ratio-ct') is-invalid @enderror" id="ratio-ct"
                                                name="ratio-ct" value="{{ old('ratio-ct') }}"
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
                                            <select class="form-control" aria-label="Default select example">
                                                <option value"" selected>Open this select menu</option>
                                                <option value="OPS">OPS</option>
                                                <option value="STBY">STBY</option>
                                                <option value="REPAIR">REPAIR</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="text-align: right;">Inspeksi Level 1 (In Service Inspection)</h3>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">1. Pemeriksaan kondisi kebocoran maintank</label>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Sebelum</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example">
                                                <option value"" selected>Open this select menu</option>
                                                <option value="bocar">Bocor</option>
                                                <option value="tidak-bocar">Tidak Bocor</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Sesudah</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example">
                                                <option value"" selected>Open this select menu</option>
                                                <option value="bocar">Bocor</option>
                                                <option value="tidak-bocar">Tidak Bocor</option>
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
                                                class="form-control @error('ratio-ct') is-invalid @enderror" id="ratio-ct"
                                                name="ratio-ct" value="Baik: Min 3/4 dari silicage | berwarna biru"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">2. Pemeriksaan kondisi motor kipas system pendingin</label>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Sebelum</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example">
                                                <option value"" selected>Open this select menu</option>
                                                <option value="berfungsi">Berfungsi</option>
                                                <option value="tidak-berfungsi">Tidak Berfungsi</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Sesudah</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example">
                                                <option value"" selected>Open this select menu</option>
                                                <option value="berfungsi">Berfungsi</option>
                                                <option value="tidak-berfungsi">Tidak Berfungsi</option>
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
                                                class="form-control @error('ratio-ct') is-invalid @enderror" id="ratio-ct"
                                                name="ratio-ct" value="Baik: Min 3/4 dari silicage | berwarna biru"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">3. Pemeriksaan tegangan suplai motor kipas dan sirkulasi</label>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Sebelum</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example">
                                                <option value"" selected>Open this select menu</option>
                                                <option value="normal">Normal</option>
                                                <option value="tidak-normal">Tidak Normal</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Sesudah</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example">
                                                <option value"" selected>Open this select menu</option>
                                                <option value="berfungsi">Berfungsi</option>
                                                <option value="tidak-berfungsi">Tidak Berfungsi</option>
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
                                                class="form-control @error('ratio-ct') is-invalid @enderror" id="ratio-ct"
                                                name="ratio-ct" value="Baik: Min 3/4 dari silicage | berwarna biru"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="card card-body">
                        <label for="">4. Pemeriksaan level oil trafo</label>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Sebelum</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example">
                                                <option value"" selected>Open this select menu</option>
                                                <option value="dalam-level">Dalam Level</option>
                                                <option value="tidak-dalam-level">Tidak Dalam Level</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Sesudah</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example">
                                                <option value"" selected>Open this select menu</option>
                                                <option value="dalam-level">Dalam Level</option>
                                                <option value="tidak-dalam-level">Tidak Dalam Level</option>
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
                                                class="form-control @error('ratio-ct') is-invalid @enderror" id="ratio-ct"
                                                name="ratio-ct" value="Baik: Min 3/4 dari silicage | berwarna biru"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">5. Pemeriksaan suhu oil trafo</label>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Sebelum</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example">
                                                <option value"" selected>Open this select menu</option>
                                                <option value="normal">Normal</option>
                                                <option value="ada-hostpot">ada hostpot</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Sesudah</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example">
                                                <option value"" selected>Open this select menu</option>
                                                <option value="normal">Normal</option>
                                                <option value="ada-hostpot">ada hostpot</option>
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
                                                class="form-control @error('ratio-ct') is-invalid @enderror" id="ratio-ct"
                                                name="ratio-ct" value="Baik: Min 3/4 dari silicage | berwarna biru" disabled
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">6. Pemeriksaan pressure</label>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Sebelum</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example">
                                                <option value"" selected>Open this select menu</option>
                                                <option value="berfungsi">Berfungsi</option>
                                                <option value="tidak-berfungsi">Tidak Berfungsi</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Sesudah</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example">
                                                <option value"" selected>Open this select menu</option>
                                                <option value="berfungsi">Berfungsi</option>
                                                <option value="tidak-berfungsi">Tidak Berfungsi</option>
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
                                                class="form-control @error('ratio-ct') is-invalid @enderror" id="ratio-ct"
                                                name="ratio-ct" value="{{ old('ratio-ct') }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">7. Pemeriksaan kebocoran oil trafo</label>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Sebelum</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example">
                                                <option value"" selected>Open this select menu</option>
                                                <option value="baik">Baik</option>
                                                <option value="rembes">rembes</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Sesudah</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example">
                                                <option value"" selected>Open this select menu</option>
                                                <option value="baik">Baik</option>
                                                <option value="rembes">rembes</option>
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
                                                class="form-control @error('ratio-ct') is-invalid @enderror" id="ratio-ct"
                                                name="ratio-ct" value="{{ old('ratio-ct') }}"
                                                placeholder="Enter Keterangan">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body">
                        <label for="">8. pemeriksaan silica gel</label>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Sebelum</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example">
                                                <option value"" selected>Open this select menu</option>
                                                <option value="baik">Baik</option>
                                                <option value="tidak-baik">Tidak Baik</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg">
                                <table class="w-100">
                                    <tr>
                                        <td>Kondisi Sesudah</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" aria-label="Default select example">
                                                <option value"" selected>Open this select menu</option>
                                                <option value="baik">Baik</option>
                                                <option value="tidak-baik">Tidak Baik</option>
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
                                                class="form-control @error('ratio-ct') is-invalid @enderror" id="ratio-ct"
                                                name="ratio-ct" value="Baik: Min 3/4 dari silicage | berwarna biru"
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
                <textarea name="scada" class="form-control @error('scada') is-invalid @enderror" id="scada"
                    cols="30" rows="3" placeholder="Enter Catatan">Catatan:</textarea>
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
    </section>
@endsection

@section('script')
@endsection
