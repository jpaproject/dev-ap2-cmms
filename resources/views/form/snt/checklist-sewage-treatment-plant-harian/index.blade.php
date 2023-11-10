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

        <form method="POST"
            action="{{ route('form.snt.checklist-sewage-treatment-plant-harian.update', $detailWorkOrderForm) }}"
            enctype="multipart/form-data" id="form2">

            @csrf
            @method('patch')
            @if ($formSntChecklistSewageTreatmentPlantHarians->isNotEmpty())
                        <div class="col-lg-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title" style="text-align: right;">SEWAGE TREATMENT PLANT</h3>
                                </div>
                                <div class="container-fluid">
                                    <div class="card-body">
                                        @foreach ($formSntChecklistSewageTreatmentPlantHarians as $key => $formSntChecklistSewageTreatmentPlantHarian)
                                            @include('components.form-message')

                                            <h4 style="text-align: center">
                                                {{ $formSntChecklistSewageTreatmentPlantHarian->nama_peralatan }}
                                            </h4>


                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">MERK</label>

                                                        <span
                                                            class="d-flex justify-content-center">{{ $formSntChecklistSewageTreatmentPlantHarian->merk }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">TIPE</label>

                                                        <span
                                                            class="d-flex justify-content-center">{{ $formSntChecklistSewageTreatmentPlantHarian->tipe }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">KONDISI</label>
                                                        <select class="form-control @error('kondisi.') is-invalid @enderror"
                                                            name="kondisi[]">
                                                            <option value="">Choose Or Type Selection
                                                            </option>
                                                            <option value="OPERASI";
                                                                {{ old('kondisi.') ?? $formSntChecklistSewageTreatmentPlantHarian->kondisi == 'OPERASI' ? 'selected' : '' }}>
                                                                OPERASI
                                                            </option>
                                                            <option value="OFF"
                                                                {{ old('kondisi.') ?? $formSntChecklistSewageTreatmentPlantHarian->kondisi == 'OFF' ? 'selected' : '' }}>
                                                                OFF
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">TINDAKAN /
                                                            KETERANGAN</label>
                                                        <textarea class="form-control @error('keterangan.') is-invalid @enderror" name="keterangan[]"
                                                            value="{{ old('keterangan.') ?? $formSntChecklistSewageTreatmentPlantHarian->keterangan }}"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="bg-primary">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
            @endif
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
