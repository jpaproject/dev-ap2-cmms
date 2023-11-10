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

        table,
        tr,
        th,
        td {
            border: 1px solid black;
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
                            <h3 class="card-title" style="text-align: right;">LAPORAN KERUSAKAN</h3>
                        </div>

                        <form method="POST"
                            action="{{ route('form.ups.laporan-kerusakan-dan-perbaikan.update', $detailWorkOrderForm->id) }}"
                            enctype="multipart/form-data" id="form">
                            @method('patch')
                            @csrf

                            <div class="card-body">

                                @include('components.form-message')
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">TANGGAL/BULAN/TAHUN</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                            id="tanggal" name="tanggal"
                                            value="{{ old('tanggal') ?? (date('Y-m-d', strtotime($workOrder->date_generate)) ?? '') }}"
                                            placeholder="Enter sugested completion">

                                        @error('tanggal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">LOKASI PEKERJAAN</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="text"
                                            class="form-control @error('lokasi_pekerjaan') is-invalid @enderror"
                                            id="lokasi_pekerjaan" name="lokasi_pekerjaan"
                                            value="{{ $formUpsLaporanKerusakanDanPerbaikan->lokasi_pekerjaan ?? ($workOrder->asset->location->name ?? '') }}"
                                            placeholder="Enter Lokasi Pekerjaan">
                                        @error('lokasi_pekerjaan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">FASILITAS</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="text"
                                            class="form-control @error('fasilitas') is-invalid @enderror"
                                            id="fasilitas" name="fasilitas"
                                            value="{{ old('fasilitas') ?? $formUpsLaporanKerusakanDanPerbaikan->fasilitas }}"
                                            placeholder="Enter Fasilitas">

                                        @error('fasilitas')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">PERALATAN YANG DIBAWA MASUK</label>
                                    <div class="col-lg-6 col-10">
                                        <table>
                                            <tr>
                                                <th>No</th>
                                                <th>Material</th>
                                            </tr>
                                            @forelse ($assetMaterials as $assetMaterial)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $assetMaterial->material_name }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center">No Data Available</td>
                                                </tr>
                                            @endforelse
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">BAGIAN PERALATAN</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="text" class="form-control @error('bagian_peralatan') is-invalid @enderror"
                                            id="bagian_peralatan" name="bagian_peralatan"
                                            value="{{ old('bagian_peralatan') ?? $formUpsLaporanKerusakanDanPerbaikan->bagian_peralatan }}"
                                            placeholder="Enter Bagian Peralatan">
                                        @error('bagian_peralatan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">KATEGORI KERUSAKAN</label>
                                    <div class="col-lg-6 col-10">
                                        <select class="form-control select2 @error('kategori_kerusakan') is-invalid @enderror"
                                            style="width: 100%; height:50px;" name="kategori_kerusakan">
                                            <option value="">Choose Or Type Selection</option>
                                            @if (
                                                $formUpsLaporanKerusakanDanPerbaikan->kategori_kerusakan == 'BERAT' ||
                                                    $formUpsLaporanKerusakanDanPerbaikan->kategori_kerusakan == 'RINGAN' ||
                                                    $formUpsLaporanKerusakanDanPerbaikan->kategori_kerusakan == 'ST. WAGON/MINIBUS' ||
                                                    $formUpsLaporanKerusakanDanPerbaikan->kategori_kerusakan == '')
                                                <option value="BERAT"
                                                    {{ old('kategori_kerusakan') ?? $formUpsLaporanKerusakanDanPerbaikan->kategori_kerusakan == 'BERAT' ? 'selected' : '' }}>
                                                    BERAT
                                                </option>
                                                <option value="RINGAN"
                                                    {{ old('kategori_kerusakan') ?? $formUpsLaporanKerusakanDanPerbaikan->kategori_kerusakan == 'RINGAN' ? 'selected' : '' }}>
                                                    RINGAN
                                                </option>
                                                <option value="SEDANG"
                                                    {{ old('kategori_kerusakan') ?? $formUpsLaporanKerusakanDanPerbaikan->kategori_kerusakan == 'SEDANG' ? 'selected' : '' }}>
                                                    SEDANG
                                                </option>
                                            @else
                                                <option value="{{ $formUpsLaporanKerusakanDanPerbaikan->kategori_kerusakan }}"
                                                    selected>
                                                    {{ $formUpsLaporanKerusakanDanPerbaikan->kategori_kerusakan }}
                                                </option>
                                                <option value="BERAT">
                                                    BERAT
                                                </option>
                                                <option value="RINGAN">
                                                    RINGAN
                                                </option>
                                                <option value="SEDANG">
                                                    SEDANG
                                                </option>
                                            @endif
                                        </select>
                                        @error('kategori_kerusakan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">URAIAN KERUSAKAN</label>
                                    <div class="col-lg-6 col-10">
                                        <textarea type="text"
                                            class="form-control @error('uraian') is-invalid @enderror"
                                            id="uraian" name="uraian"
                                            value="{{ old('uraian') ?? $formUpsLaporanKerusakanDanPerbaikan->uraian }}"
                                            placeholder="Enter Uraian Kerusakan"></textarea>
                                        @error('uraian')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">TINDAKAN PERBAIKAN</label>
                                    <div class="col-lg-6 col-10">
                                        <textarea type="text"
                                            class="form-control @error('tindakan') is-invalid @enderror"
                                            id="tindakan" name="tindakan"
                                            value="{{ old('tindakan') ?? $formUpsLaporanKerusakanDanPerbaikan->tindakan }}"
                                            placeholder="Enter Tindakan Perbaikan"></textarea>
                                        @error('tindakan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">PENYEBAB KERUSAKAN</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="text"
                                            class="form-control @error('penyebab') is-invalid @enderror"
                                            id="penyebab" name="penyebab"
                                            value="{{ old('penyebab') ?? $formUpsLaporanKerusakanDanPerbaikan->penyebab }}"
                                            placeholder="Enter Penyebab Kerusakan">
                                        @error('penyebab')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <input type="datetime-local"
                                                        class="form-control @error('suggested_completion_date') is-invalid @enderror"
                                                        id="suggested_completion_date" name="suggested_completion_date"
                                                        value="{{ old('suggested_completion_date') }}"
                                                        placeholder="Enter sugested completion"> --}}
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">TANGGAL KERUSAKAN</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="datetime-local"
                                                        class="form-control @error('tanggal_kerusakan') is-invalid @enderror"
                                                        id="tanggal_kerusakan" name="tanggal_kerusakan"
                                                        value="{{ old('tanggal_kerusakan') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">TANGGAL SELESAI PERBAIKAN</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="datetime-local"
                                                        class="form-control @error('tanggal_perbaikan') is-invalid @enderror"
                                                        id="tanggal_perbaikan" name="tanggal_perbaikan"
                                                        value="{{ old('tanggal_perbaikan') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">JUMLAH JAM OPERASI TERPUTUS</label>
                                    <div class="col-lg-6 col-10">
                                        <input type="time"
                                                        class="form-control @error('jumlah_jam') is-invalid @enderror"
                                                        id="jumlah_jam" name="jumlah_jam"
                                                        value="{{ old('jumlah_jam') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">KODE HAMBATAN</label>
                                    <div class="col-lg-6 col-10">
                                        <select class="form-control @error('kode_hambatan') is-invalid @enderror"
                                            style="width: 100%; height:50px;" name="kode_hambatan">
                                            <option value="">Choose Or Type Selection</option>
                                            @if (
                                                $formUpsLaporanKerusakanDanPerbaikan->kode_hambatan == 'AU' ||
                                                    $formUpsLaporanKerusakanDanPerbaikan->kode_hambatan == 'RINGAN' ||
                                                    $formUpsLaporanKerusakanDanPerbaikan->kode_hambatan == 'ST. WAGON/MINIBUS' ||
                                                    $formUpsLaporanKerusakanDanPerbaikan->kode_hambatan == '')
                                                <option value="AU"
                                                    {{ old('kode_hambatan') ?? $formUpsLaporanKerusakanDanPerbaikan->kode_hambatan == 'AU' ? 'selected' : '' }}>
                                                    AU - Tidak ada alat ukur
                                                </option>
                                                <option value="PK"
                                                    {{ old('kode_hambatan') ?? $formUpsLaporanKerusakanDanPerbaikan->kode_hambatan == 'PK' ? 'selected' : '' }}>
                                                    PK - Menunggu Penerbangan kalibrasi
                                                </option>
                                                <option value="TT"
                                                    {{ old('kode_hambatan') ?? $formUpsLaporanKerusakanDanPerbaikan->kode_hambatan == 'TT' ? 'selected' : '' }}>
                                                    TT - Tidak ada Teknisi
                                                </option>
                                                <option value="SC"
                                                    {{ old('kode_hambatan') ?? $formUpsLaporanKerusakanDanPerbaikan->kode_hambatan == 'SC' ? 'selected' : '' }}>
                                                    SC - Menunggu Suku cadang
                                                </option>
                                                <option value="TR"
                                                    {{ old('kode_hambatan') ?? $formUpsLaporanKerusakanDanPerbaikan->kode_hambatan == 'TR' ? 'selected' : '' }}>
                                                    TR - Tidak ada transportasi
                                                </option>
                                                <option value="ST"
                                                    {{ old('kode_hambatan') ?? $formUpsLaporanKerusakanDanPerbaikan->kode_hambatan == 'ST' ? 'selected' : '' }}>
                                                    ST - Peralatan belum serah terima
                                                </option>
                                            @else
                                                <option value="{{ $formUpsLaporanKerusakanDanPerbaikan->kode_hambatan }}"
                                                    selected>
                                                    {{ $formUpsLaporanKerusakanDanPerbaikan->kode_hambatan }}
                                                </option>
                                                <option value="AU">
                                                    AU - TIDAK ADA ALAT UKUR
                                                </option>
                                                <option value="PK">
                                                    PK - Menunggu Penerbangan kalibrasi
                                                </option>
                                                <option value="TT">
                                                    TT - Tidak ada Teknisi
                                                </option>
                                                <option value="TR">
                                                    TR - Tidak ada transportasi
                                                </option>
                                                <option value="ST">
                                                    ST - Peralatan belum serah terima
                                                </option>
                                            @endif
                                        </select>
                                        @error('kode_hambatan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success btn-footer">Simpan</button>
                                        <a href="{{ url()->previous() }} " class="btn btn-secondary btn-footer">Back</a>
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
