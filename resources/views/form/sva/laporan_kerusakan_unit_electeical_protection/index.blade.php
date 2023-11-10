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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="text-align: right;"></h3>
                        </div>

                        <form method="POST" action="{{ route('form.elp.laporan-kerusakan.update', $detailWorkOrderForm->id) }}" enctype="multipart/form-data"
                            id="form">
                            @method('patch')
                            @csrf

                            <div class="card-body">

                                @include('components.form-message')
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">TANGGAL/BULAN/TAHUN</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="date" class="form-control @error('date') is-invalid @enderror"
                                            id="date" name="date" value="{{ old('date') ?? ($laporanKerusakanElectricalProtection->date ? date('Y-m-d', strtotime($laporanKerusakanElectricalProtection->date)) : date('Y-m-d')) }}"
                                            placeholder="Enter sugested completion">

                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">FASILITAS</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="text" class="form-control @error('fasilitas') is-invalid @enderror"
                                            id="fasilitas" name="fasilitas" value="{{ old('fasilitas') || $laporanKerusakanElectricalProtection->fasilitas }}"
                                            placeholder="Enter Fasilitas">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">PERALATAN</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="text" class="form-control @error('peralatan') is-invalid @enderror"
                                            id="peralatan" name="peralatan" value="{{ old('peralatan') || $laporanKerusakanElectricalProtection->peralatan }}"
                                            placeholder="Enter Peralatan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">BAGIAN PERALATAN</label>
                                    <div class="col-lg-6 col-10">
                                        <textarea name="bagian_peralatan" class="form-control @error('bagian_peralatan') is-invalid @enderror" id="bagian_peralatan" cols="30"
                                            rows="3" placeholder="Enter Bagian Peralatan">{{ $laporanKerusakanElectricalProtection->bagian_peralatan }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">KATEGORI KERUSAKAN</label>
                                    <div class="col-lg-6 col-10">
                                        <select class="form-control  @error('kategori_kerusakan') is-invalid @enderror" name="kategori_kerusakan">
                                            <option disabled selected>Choose Selection</option>
                                            <option value="Berat" {{ old('kategori_kerusakan') || $laporanKerusakanElectricalProtection->kategori_kerusakan == 'Berat' ? 'selected' : '' }}>
                                                Berat</option>
                                            <option value="Sedang" {{ old('kategori_kerusakan') || $laporanKerusakanElectricalProtection->kategori_kerusakan == 'Sedang' ? 'selected' : '' }}>
                                                Sedang </option>
                                            <option value="Ringan" {{ old('kategori_kerusakan') || $laporanKerusakanElectricalProtection->kategori_kerusakan == 'Ringan' ? 'selected' : '' }}>
                                                Ringan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">URAIAN KERUSAKAN</label>
                                    <div class="col-lg-6 col-10">
                                        <textarea name="uraian_kerusakan" class="form-control @error('uraian_kerusakan') is-invalid @enderror" id="uraian_kerusakan" cols="30"
                                            rows="3" placeholder="Enter Uraian Kerusakan">{{$laporanKerusakanElectricalProtection->uraian_kerusakan}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">TINDAKAN PERBAIKAN</label>
                                    <div class="col-lg-6 col-10">
                                        <textarea name="tindakan_perbaikan" class="form-control @error('tindakan_perbaikan') is-invalid @enderror" id="tindakan_perbaikan" cols="30"
                                            rows="3" placeholder="Enter Tindakan Perbaikan">{{ $laporanKerusakanElectricalProtection->tindakan_perbaikan }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">PENYEBAB PERBAIKAN</label>
                                    <div class="col-lg-6 col-10">
                                        <textarea name="penyebab_perbaikan" class="form-control @error('penyebab_perbaikan') is-invalid @enderror" id="penyebab_perbaikan" cols="30"
                                            rows="3" placeholder="Enter Penyebab Perbaikan">{{ $laporanKerusakanElectricalProtection->penyebab_perbaikan }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">TANGGAL & JAM KERUSAKAN</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="datetime-local"
                                            class="form-control @error('start_date') is-invalid @enderror" id="start_date"
                                            name="start_date" value="{{ old('start_date') ?? ($laporanKerusakanElectricalProtection->start_date ? date('Y-m-d\TH:i', strtotime($laporanKerusakanElectricalProtection->start_date)) : date('Y-m-d\TH:i')) }}"
                                            placeholder="Enter sugested completion">

                                        @error('start_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">TANGGAL SELESAI & JAM SELESAI PERBAIKAN</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="datetime-local"
                                            class="form-control @error('end_date') is-invalid @enderror" id="end_date"
                                            name="end_date" value="{{ old('end_date') ?? ($laporanKerusakanElectricalProtection->end_date ? date('Y-m-d\TH:i', strtotime($laporanKerusakanElectricalProtection->end_date)) : date('Y-m-d\TH:i')) }}"
                                            placeholder="Enter sugested completion">

                                        @error('end_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">JUMLAH JAM OPERASI TERPUTUS</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="number"
                                            class="form-control @error('jumlah_jam_operasi_terputus') is-invalid @enderror" id="jumlah_jam_operasi_terputus"
                                            name="jumlah_jam_operasi_terputus" value="{{ old('jumlah_jam_operasi_terputus') || $laporanKerusakanElectricalProtection->jumlah_jam_operasi_terputus }}"
                                            placeholder="Enter Jumlah Jam Operasi Terputus">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">KODE HAMBATAN</label>
                                    <div class="col-lg-6 col-10">
                                        <select class="form-control  @error('kode_hambatan') is-invalid @enderror" name="kode_hambatan">
                                            <option disabled selected>Choose Selection</option>
                                            <option value="AU" {{ old('kode_hambatan') || $laporanKerusakanElectricalProtection->kode_hambatan == 'AU' ? 'selected' : '' }}>
                                                AU - TIDAK ADA ALAT UKUR</option>
                                            <option value="FK" {{ old('kode_hambatan') || $laporanKerusakanElectricalProtection->kode_hambatan == 'FK' ? 'selected' : '' }}>
                                                FK - MENUNGGU PENERBANGAN KALIBRASI</option>
                                            <option value="TT" {{ old('kode_hambatan') || $laporanKerusakanElectricalProtection->kode_hambatan == 'TT' ? 'selected' : '' }}>
                                                TT - TIDAK ADA TEKNISI</option>
                                            <option value="SC" {{ old('kode_hambatan') || $laporanKerusakanElectricalProtection->kode_hambatan == 'SC' ? 'selected' : '' }}>
                                                SC - MENUNGGU SUKU CADANG</option>
                                            <option value="TR" {{ old('kode_hambatan') || $laporanKerusakanElectricalProtection->kode_hambatan == 'TR' ? 'selected' : '' }}>
                                                TR - TIDAK ADA TRANSPORTASI</option>
                                            <option value="ST" {{ old('kode_hambatan') || $laporanKerusakanElectricalProtection->kode_hambatan == 'ST' ? 'selected' : '' }}>
                                                ST - PERALATAN BELUM SERAH TERIMA</option>
                                            <option value="PC" {{ old('kode_hambatan') || $laporanKerusakanElectricalProtection->kode_hambatan == 'PC' ? 'selected' : '' }}>
                                                PC - PENGARUH CUACA</option>
                                            <option value="AL" {{ old('kode_hambatan') || $laporanKerusakanElectricalProtection->kode_hambatan == 'AL' ? 'selected' : '' }}>
                                                AL - ALASAN LAIN</option>
                                            <option value="TH" {{ old('kode_hambatan') || $laporanKerusakanElectricalProtection->kode_hambatan == 'TH' ? 'selected' : '' }}>
                                                TH - TIDAK ADA HAMBATAN</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan" cols="30"
                                            rows="3" placeholder="Enter Catatan">{{ $laporanKerusakanElectricalProtection->catatan}}</textarea>
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
            const child = $(button).parent().find("#accordion"); // get child element
            if (child.hasClass('fa-minus')) {
                child.removeClass('fa-minus').addClass('fa-plus');; // logs "This is the child element"
            } else if (child.hasClass('fa-plus')) {
                child.removeClass('fa-plus').addClass('fa-minus'); // logs "This is the child element"
            }
        }
    </script>
@endsection
