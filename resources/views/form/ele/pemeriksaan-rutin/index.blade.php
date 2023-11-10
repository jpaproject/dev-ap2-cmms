@extends('layouts.app')

@section('breadcumb')
    <li class="breadcrumb-item"><a href=" route('work-orders.index') ">Work Order</a></li>
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
        table, tr, th, td{
            border:1px solid black;
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="text-align: right;"></h3>
                        </div>

                        <form method="POST" action="{{ route('form.ele.pemeriksaan-rutin.update', $detailWorkOrderForm->id) }}" enctype="multipart/form-data"
                            id="form">
                            @method('patch')
                            @csrf

                            <div class="card-body">

                                @include('components.form-message')
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">TANGGAL/BULAN/TAHUN</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                            id="tanggal" name="tanggal" value="{{ $FormEleSuratPemeriksaanRutin->tanggal ?? (date('Y-m-d', strtotime($workOrder->date_generate)) ?? '') }}"
                                            placeholder="Enter sugested completion">

                                        @error('tanggal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">NAMA PETUGAS ATC</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="text" class="form-control @error('nama_petugas_atc') is-invalid @enderror"
                                            id="nama_petugas_atc" name="nama_petugas_atc" value="{{ old('nama_petugas_atc') ?? $formEleSuratPemeriksaanRutin->nama_petugas_atc }}"
                                            placeholder="Enter Nama Petugas Atc">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">JAM MASUK</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="time" class="form-control @error('jam_masuk') is-invalid @enderror"
                                            id="jam_masuk" name="jam_masuk" value="{{ old('jam_masuk') ?? $formEleSuratPemeriksaanRutin->jam_masuk }}"
                                            placeholder="Enter Jam Masuk">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">JAM KELUAR</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="time" class="form-control @error('jam_keluar') is-invalid @enderror"
                                            id="jam_keluar" name="jam_keluar" value="{{ old('jam_keluar') ?? $formEleSuratPemeriksaanRutin->jam_keluar }}"
                                            placeholder="Enter Jam Keluar">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">KENDARAAN</label>
                                    <div class="col-lg-6 col-10">
                                        <select class="form-control select2 @error('kendaraan') is-invalid @enderror"
                                            style="width: 100%; height:50px;" name="kendaraan">
                                            <option value="">Choose Or Type Selection</option>
                                            @if (
                                                $formEleSuratPemeriksaanRutin->kendaraan == 'PICK UP' ||
                                                    $formEleSuratPemeriksaanRutin->kendaraan ==
                                                        'U
                                                                                        U' ||
                                                    $formEleSuratPemeriksaanRutin->kendaraan == 'ST. WAGON/MINIBUS' ||
                                                    $formEleSuratPemeriksaanRutin->kendaraan == null)
                                                <option value="PICK UP"
                                                    {{ old('kendaraan') ?? $formEleSuratPemeriksaanRutin->kendaraan == 'PICK UP' ? 'selected' : '' }}>
                                                    PICK UP
                                                </option>
                                                <option value="TRUCK"
                                                    {{ old('kendaraan') ?? $formEleSuratPemeriksaanRutin->kendaraan == 'TRUCK' ? 'selected' : '' }}>
                                                    TRUCK
                                                </option>
                                                <option value="ST. WAGON/MINIBUS"
                                                    {{ old('kendaraan') ?? $formEleSuratPemeriksaanRutin->kendaraan == 'ST. WAGON/MINIBUS' ? 'selected' : '' }}>
                                                    ST. WAGON/MINIBUS
                                                </option>
                                            @else
                                                <option value="{{ $formEleSuratPemeriksaanRutin->kendaraan }}"
                                                    selected>
                                                    {{ $formEleSuratPemeriksaanRutin->kendaraan }}
                                                </option>
                                                <option value="PICK UP">
                                                    PICK UP
                                                </option>
                                                <option value="TRUCK">
                                                    TRUCK
                                                </option>
                                                <option value="ST. WAGON/MINIBUS">
                                                    ST. WAGON/MINIBUS
                                                </option>
                                            @endif
                                        </select>
                                        @error('kendaraan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">NOMOR POLISI</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="text" class="form-control @error('nomor_polisi') is-invalid @enderror"
                                            id="nomor_polisi" name="nomor_polisi" value="{{ old('nomor_polisi') ?? $formEleSuratPemeriksaanRutin->nomor_polisi }}"
                                            placeholder="Enter Nomor Polisi">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Jumlah Personil</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="text" class="form-control @error('jumlah_personil') is-invalid @enderror"
                                            id="jumlah_personil" name="jumlah_personil" value="{{ count($userTechnicals) }}"
                                            placeholder="Enter Nama Petugas Atc" disabled>
                                        <table class="mt-2">
                                            <tr>
                                                <th>NAMA TEKNISI</th>
                                            </tr>
                                            @foreach ($userTechnicals as $userTechnical)
                                                <tr>
                                                    <td>{{$loop->iteration . '. ' . $userTechnical}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">TUJUAN KEPERLUAN</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="text" class="form-control @error('tujuan_keperluan') is-invalid @enderror"
                                            id="tujuan_keperluan" name="tujuan_keperluan" value="{{ old('tujuan_keperluan') ?? $formEleSuratPemeriksaanRutin->tujuan_keperluan }}"
                                            placeholder="Enter Tujuan Keperluan">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">LOKASI PEKERJAAN</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="text" class="form-control @error('lokasi_pekerjaan') is-invalid @enderror"
                                            id="lokasi_pekerjaan" name="lokasi_pekerjaan" value="{{ $formEleSuratPemeriksaanRutin->lokasi_pekerjaan ?? ($workOrder->asset->location->name ?? '') }}"
                                            placeholder="Enter Lokasi Pekerjaan">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Catatan:</label>
                                    <div class="col-12">
                                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan" cols="30"
                                            rows="3" placeholder="Enter Catatan">{!! old('catatan') ?? $formEleSuratPemeriksaanRutin->catatan !!}</textarea>
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
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection

@section('script')
    <script>
        function showHide(button) {
            const child = $(button).parent().find("#accordion");
            if (child.hasClass('fa-minus')) {
                child.removeClass('fa-minus').addClass('fa-plus');;
            } else if (child.hasClass('fa-plus')) {
                child.removeClass('fa-plus').addClass('fa-minus');
            }
        }

        $(document).ready(function() {
            $('.select2').select2({
                tags: true
            });
        });
    </script>
@endsection
