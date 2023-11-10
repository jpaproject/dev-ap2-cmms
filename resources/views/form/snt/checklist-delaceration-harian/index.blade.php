@extends('layouts.app')

@section('breadcumb')
    <li class="breadcrumb-item">
        <a href="{{ route('work-orders.index') }}">Work Order</a>
    </li>
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

        .container {
            width: 100%;
            /* Lebar container 100% untuk full-width */
            box-sizing: border-box;
            border: 2px solid black;
            padding-bottom: 20px;
            /* Ketebalan dan warna border */
        }

        table,
        tr,
        th,
        td {
            border: 1px solid black;
        }
    </style>
@endsection

@section('content')

    <section class="content">

        <form method="POST" action="{{ route('form.snt.checklist-delaceration-harian.update', $detailWorkOrderForm) }}"
            enctype="multipart/form-data" id="form2">

            @csrf
            @method('patch')
            @if ($formSntChecklistDelacerationHarians->isNotEmpty())
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="text-align: right;">LIFTING PUMP</h3>
                        </div>
                        <div class="container-fluid">
                            <div class="card-body">
                                <div class="col-12">
                                    <label class="d-flex justify-content-center">PERIODE PERAWATAN</label>
                                    <select class="form-control @error('periode.') is-invalid @enderror" name="periode">
                                        <option value="">Choose Or Type Selection
                                        </option>
                                        <option value="HARIAN";>
                                            HARIAN
                                        </option>
                                        <option value="MINGGUAN">
                                            MINGGUAN
                                        </option>
                                        <option value="BULANAN">
                                            BULANAN
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 1 --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeat1">
                        <div class="card">
                            <div class="card-header" id="Seat1">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseSeat1" aria-expanded="true" aria-controls="collapseSeat1"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        DELACERATION PLANT 1
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeat1" class="collapse" aria-labelledby="1" data-parent="#accordionSeat1">
                                <div class="card-body">
                                    @foreach ($formSntChecklistDelacerationHarians as $key => $formSntChecklistDelacerationHarian)
                                        @if ($formSntChecklistDelacerationHarian->group == 'DELACERATION PLANT 1')
                                            @include('components.form-message')

                                            <h4 style="text-align: center">
                                                {{ $formSntChecklistDelacerationHarian->nama_peralatan }}
                                            </h4>

                                            <div class="row">
                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PENGECEKAN
                                                            1</label>
                                                        <select class="form-control @error('operasi.') is-invalid @enderror"
                                                            name="operasi[]">
                                                            <option value="">Choose Or Type Selection
                                                            </option>
                                                            <option value="OPERASI";
                                                                {{ old('operasi.') ?? $formSntChecklistDelacerationHarian->operasi == 'OPERASI' ? 'selected' : '' }}>
                                                                OPERASI
                                                            </option>
                                                            <option value="TIDAK BEROPERASI (stan by)"
                                                                {{ old('operasi.') ?? $formSntChecklistDelacerationHarian->operasi == 'TIDAK BEROPERASI (stan by)' ? 'selected' : '' }}>
                                                                TIDAK BEROPERASI (stan by)
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">TEGANGAN</label>
                                                        <input type="number" class="form-control" name="tegangan[]"
                                                            value="{{ old('tegangan.') ?? $formSntChecklistDelacerationHarian->tegangan }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">TEGANGAN 24
                                                            Vdc</label>
                                                        <input type="number" class="form-control"name="tegangan_24[]"
                                                            value="{{ old('tegangan_24.') ?? $formSntChecklistDelacerationHarian->tegangan_24 }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">ARUS</label>
                                                        <input type="number" class="form-control" name="arus[]"
                                                            value="{{ old('arus.') ?? $formSntChecklistDelacerationHarian->arus }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">RELAY</label>
                                                        <input type="number" class="form-control" name="relay[]"
                                                            value="{{ old('relay.') ?? $formSntChecklistDelacerationHarian->relay }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">KONTAKTOR</label>
                                                        <input type="number" class="form-control" name="kontaktor[]"
                                                            value="{{ old('kontaktor.') ?? $formSntChecklistDelacerationHarian->kontaktor }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PLC</label>
                                                        <input type="number" class="form-control" name="plc[]"
                                                            value="{{ old('plc.') ?? $formSntChecklistDelacerationHarian->plc }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PELAMPUNG</label>
                                                        <input type="text" class="form-control" name="pelampung[]"
                                                            value="{{ old('pelampung.') ?? $formSntChecklistDelacerationHarian->pelampung }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">CEK
                                                            PEMIPAAN</label>
                                                        <input type="text" class="form-control" name="pemipaan[]"
                                                            value="{{ old('pemipaan.') ?? $formSntChecklistDelacerationHarian->pemipaan }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">BERIHKAN
                                                            SAMPAH</label>
                                                        <input type="text" class="form-control" name="sampah[]"
                                                            value="{{ old('sampah.') ?? $formSntChecklistDelacerationHarian->sampah }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">KETERANGAN</label>
                                                        <select
                                                            class="form-control @error('keterangan.') is-invalid @enderror"
                                                            name="keterangan[]">
                                                            <option value="">Choose Or Type Selection
                                                            </option>
                                                            <option value="NORMAL OPERASI";
                                                                {{ old('keterangan.') ?? $formSntChecklistDelacerationHarian->keterangan == 'NORMAL OPERASI' ? 'selected' : '' }}>
                                                                NORMAL OPERASI
                                                            </option>
                                                            <option value="OFF / RUSAK"
                                                                {{ old('keterangan.') ?? $formSntChecklistDelacerationHarian->keterangan == 'OFF / RUSAK' ? 'selected' : '' }}>
                                                                OFF / RUSAK
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="bg-primary">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- 2 --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeat2">
                        <div class="card">
                            <div class="card-header" id="Seat2">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseSeat2" aria-expanded="true" aria-controls="collapseSeat2"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        DELACERATION PLANT 2
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeat2" class="collapse" aria-labelledby="1" data-parent="#accordionSeat2">
                                <div class="card-body">
                                    @foreach ($formSntChecklistDelacerationHarians as $key => $formSntChecklistDelacerationHarian)
                                        @if ($formSntChecklistDelacerationHarian->group == 'DELACERATION PLANT 2')
                                            @include('components.form-message')

                                            <h4 style="text-align: center">
                                                {{ $formSntChecklistDelacerationHarian->nama_peralatan }}
                                            </h4>

                                            <div class="row">
                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PENGECEKAN
                                                            1</label>
                                                        <select class="form-control @error('operasi.') is-invalid @enderror"
                                                            name="operasi[]">
                                                            <option value="">Choose Or Type Selection
                                                            </option>
                                                            <option value="OPERASI";
                                                                {{ old('operasi.') ?? $formSntChecklistDelacerationHarian->operasi == 'OPERASI' ? 'selected' : '' }}>
                                                                OPERASI
                                                            </option>
                                                            <option value="TIDAK BEROPERASI (stan by)"
                                                                {{ old('operasi.') ?? $formSntChecklistDelacerationHarian->operasi == 'TIDAK BEROPERASI (stan by)' ? 'selected' : '' }}>
                                                                TIDAK BEROPERASI (stan by)
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">TEGANGAN</label>
                                                        <input type="number" class="form-control" name="tegangan[]"
                                                            value="{{ old('tegangan.') ?? $formSntChecklistDelacerationHarian->tegangan }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">TEGANGAN 24
                                                            Vdc</label>
                                                        <input type="number" class="form-control"name="tegangan_24[]"
                                                            value="{{ old('tegangan_24.') ?? $formSntChecklistDelacerationHarian->tegangan_24 }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">ARUS</label>
                                                        <input type="number" class="form-control" name="arus[]"
                                                            value="{{ old('arus.') ?? $formSntChecklistDelacerationHarian->arus }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">RELAY</label>
                                                        <input type="number" class="form-control" name="relay[]"
                                                            value="{{ old('relay.') ?? $formSntChecklistDelacerationHarian->relay }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">KONTAKTOR</label>
                                                        <input type="number" class="form-control" name="kontaktor[]"
                                                            value="{{ old('kontaktor.') ?? $formSntChecklistDelacerationHarian->kontaktor }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PLC</label>
                                                        <input type="number" class="form-control" name="plc[]"
                                                            value="{{ old('plc.') ?? $formSntChecklistDelacerationHarian->plc }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">PELAMPUNG</label>
                                                        <input type="text" class="form-control" name="pelampung[]"
                                                            value="{{ old('pelampung.') ?? $formSntChecklistDelacerationHarian->pelampung }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">CEK
                                                            PEMIPAAN</label>
                                                        <input type="text" class="form-control" name="pemipaan[]"
                                                            value="{{ old('pemipaan.') ?? $formSntChecklistDelacerationHarian->pemipaan }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">BERIHKAN
                                                            SAMPAH</label>
                                                        <input type="text" class="form-control" name="sampah[]"
                                                            value="{{ old('sampah.') ?? $formSntChecklistDelacerationHarian->sampah }}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">KETERANGAN</label>
                                                        <select
                                                            class="form-control @error('keterangan.') is-invalid @enderror"
                                                            name="keterangan[]">
                                                            <option value="">Choose Or Type Selection
                                                            </option>
                                                            <option value="NORMAL OPERASI";
                                                                {{ old('keterangan.') ?? $formSntChecklistDelacerationHarian->keterangan == 'NORMAL OPERASI' ? 'selected' : '' }}>
                                                                NORMAL OPERASI
                                                            </option>
                                                            <option value="OFF / RUSAK"
                                                                {{ old('keterangan.') ?? $formSntChecklistDelacerationHarian->keterangan == 'OFF / RUSAK' ? 'selected' : '' }}>
                                                                OFF / RUSAK
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="bg-primary">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label
                                        class="col-12 control-label d-flex justify-content-center align-items-center">Catatan</label>
                                    <div class="col-12">

                                        <textarea name="catatan" class="form-control @error('catatan.' . $key) is-invalid @enderror" id="catatan"
                                            placeholder="Deskripsi"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-footer">Simpan</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-footer">Back</a>
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
