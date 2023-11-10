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
        <form method="POST" id="myForm" action="{{ route('form.ups.data-ukur-load-beban.update', $detailWorkOrderForm) }}"
            enctype="multipart/form-data" id="form">
            @csrf
            @method('patch')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Data Baru</h3>
                            </div>
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row d-flex align-items-center">
                                    <div class="col-12 col-lg-8 col-md-8">
                                        <label class="d-flex justify-content-center">Module / Fedder</label>
                                        <div class="row mb-2">
                                            
                                            <div class="col-4 d-flex align-items-center justify-content-center">
                                                <span> Kapasitas</span>
                                            </div>
                                            <div class="col-8"><input type="text" class="form-control" id="kapasitas"
                                                    name="kapasitas" placeholder="Enter..">

                                                @error('pick-time')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="d-flex justify-content-center">Lokasi Panel</label>
                                        
                                        <div class="row">
                                            <div class="col-4 d-flex align-items-center justify-content-center">
                                                <span>Distribusi Utama </span>
                                            </div>
                                            <div class="col-8"><input type="text" class="form-control" id="distribusi"
                                                    name="distribusi" placeholder="Enter..">

                                                @error('pick-time')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-4"><button type="button"
                                            class="btn btn-outline-primary w-100" id="btn-add-document"
                                            onclick="addField(this)">
                                            <i class="fas fa-plus-square"> <span
                                                    style="font-family: Poppins, sans-serif !important;"> Add New</span>
                                            </i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="add-substation-area">
                @if ($formUpsDataUkurLoadBebans->isNotEmpty())
                    @foreach ($formUpsDataUkurLoadBebans as $key => $formUpsDataUkurLoadBeban)
                        <div class="container-fluid">
                            <div class="accordion" id="accordion{{ $loop->iteration }}">
                                <div class="card">
                                    <div class="card-header" id="{{ $loop->iteration }}">
                                        <h2 class="row mb-0">
                                            <div class="col-6">
                                                <button class="btn btn-link btn-block text-left" type="button"
                                                    data-toggle="collapse" data-target="#collapse{{ $loop->iteration }}"
                                                    aria-expanded="true" aria-controls="collapse{{ $loop->iteration }}"
                                                    onclick="showHide(this)">
                                                    <i class="fas {{ $loop->iteration === 1 ? 'fa-minus' : 'fa-plus' }}"
                                                        id="accordion"></i>
                                                    {{ $formUpsDataUkurLoadBeban->kapasitas ?? '' }}
                                                    <input type="hidden" name="kapasitas[]"
                                                        value="{{ $formUpsDataUkurLoadBeban->kapasitas }}">
                                                </button>
                                            </div>
                                            <div class="col-6 d-flex justify-content-end">
                                                <button type="button" class="btn btn-outline-danger btn-remove"
                                                    onclick="deleteAccordion(this)"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </h2>
                                    </div>

                                    <div id="collapse{{ $loop->iteration }}"
                                        class="{{ $loop->iteration === 1 ? 'show' : '' }} collapse"
                                        aria-labelledby="head{{ $loop->iteration }}"
                                        data-parent="#accordion{{ $loop->iteration }}">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Distribusi</label>
                                                        <input type="text"
                                                            class="form-control @error('distribusi.' . $key) is-invalid @enderror"
                                                            id="distribusiReadOnly" name="distribusi[]"
                                                            value="{{ old('distribusi.' . $key) ?? $formUpsDataUkurLoadBeban->distribusi }}"
                                                            placeholder="Enter..">

                                                        @error('distribusi.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="d-flex justify-content-center">ARUS BEBAN PER MODUL</label>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>R</label>
                                                            <input type="text"
                                                                class="form-control @error('r.' . $key) is-invalid @enderror"
                                                                id="r" name="r[]"
                                                                value="{{ old('r.' . $key) ?? $formUpsDataUkurLoadBeban->r }}"
                                                                placeholder="Enter..">

                                                            @error('r.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>S</label>
                                                        <input type="text"
                                                            class="form-control @error('s.' . $key) is-invalid @enderror"
                                                            id="s" name="s[]"
                                                            value="{{ old('s.' . $key) ?? $formUpsDataUkurLoadBeban->s }}"
                                                            placeholder="Enter..">

                                                        @error('s.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">T</label>
                                                        <input type="text"
                                                            class="form-control @error('t.' . $key) is-invalid @enderror"
                                                            id="t" name="t[]"
                                                            value="{{ old('t.' . $key) ?? $formUpsDataUkurLoadBeban->t }}"
                                                            placeholder="Enter..">

                                                        @error('t.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">N</label>
                                                        <input type="text"
                                                            class="form-control @error('n.' . $key) is-invalid @enderror"
                                                            id="n" name="n[]"
                                                            value="{{ old('n.' . $key) ?? $formUpsDataUkurLoadBeban->n }}"
                                                            placeholder="Enter..">

                                                        @error('n.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 ">
                                                    <label class="d-flex justify-content-center">PENGUKURAN DISPLAY</label>
                                                    <div class="row">
                                                        <div class="col-4 form-group">
                                                            <label class="d-flex justify-content-center">BESARAN</label>
                                                            <select
                                                            class="form-control @error('besaran.') is-invalid @enderror"
                                                            name="besaran">
                                                            <option value="">Choose Or Type Selection</option>
                                                            <option value="V.INPUT UPS";
                                                                {{ old('besaran.') ?? $formUpsDataUkurLoadBeban->besaran == 'V.INPUT UPS' ? 'selected' : '' }}>
                                                                V.INPUT UPS
                                                            </option>
                                                            <option value="I.INPUT UPS"
                                                                {{ old('besaran.') ?? $formUpsDataUkurLoadBeban->besaran == 'I.INPUT UPS' ? 'selected' : '' }}>
                                                                I.INPUT UPS
                                                            </option>
                                                            <option value="F.INPUT UPS"
                                                                {{ old('besaran.') ?? $formUpsDataUkurLoadBeban->besaran == 'F.INPUT UPS' ? 'selected' : '' }}>
                                                                F.INPUT UPS
                                                            </option>
                                                            <option value="V.FLOATING"
                                                                {{ old('besaran.') ?? $formUpsDataUkurLoadBeban->besaran == 'V.FLOATING' ? 'selected' : '' }}>
                                                                V.FLOATING
                                                            </option>
                                                            <option value="V.Per Battery"
                                                                {{ old('besaran.') ?? $formUpsDataUkurLoadBeban->besaran == 'V.Per Battery' ? 'selected' : '' }}>
                                                                V.Per Battery
                                                            </option>
                                                            <option value="I.CHARGING"
                                                                {{ old('besaran.') ?? $formUpsDataUkurLoadBeban->besaran == 'I.CHARGING' ? 'selected' : '' }}>
                                                                I.CHARGING
                                                            </option>
                                                            <option value="V. OUT PUT UPS"
                                                                {{ old('besaran.') ?? $formUpsDataUkurLoadBeban->besaran == 'V. OUT PUT UPS' ? 'selected' : '' }}>
                                                                V. OUT PUT UPS
                                                            </option>
                                                            <option value="I. OUT PUT UPS"
                                                                {{ old('besaran.') ?? $formUpsDataUkurLoadBeban->besaran == 'I. OUT PUT UPS' ? 'selected' : '' }}>
                                                                I. OUT PUT UPS
                                                            </option>
                                                            <option value="L1-G "
                                                                {{ old('besaran.') ?? $formUpsDataUkurLoadBeban->besaran == 'L1-G ' ? 'selected' : '' }}>
                                                                L1-G 
                                                            </option>
                                                            <option value="L1-G "
                                                                {{ old('besaran.') ?? $formUpsDataUkurLoadBeban->besaran == 'L1-G ' ? 'selected' : '' }}>
                                                                L1-G 
                                                            </option>
                                                            <option value="L2-G "
                                                                {{ old('besaran.') ?? $formUpsDataUkurLoadBeban->besaran == 'L2-G ' ? 'selected' : '' }}>
                                                                L2-G 
                                                            </option>
                                                            <option value="L3-G "
                                                                {{ old('besaran.') ?? $formUpsDataUkurLoadBeban->besaran == 'L3-G ' ? 'selected' : '' }}>
                                                                L3-G 
                                                            </option>
                                                            <option value="N-G "
                                                                {{ old('besaran.') ?? $formUpsDataUkurLoadBeban->besaran == 'N-G ' ? 'selected' : '' }}>
                                                                N-G 
                                                            </option>
                                                        </select>
                                                        </div>
                                                        <div class="col-4 form-group">
                                                            <label class="d-flex justify-content-center">Pengukuran</label>
                                                            <input type="text"
                                                                class="form-control @error('pengukuran.' . $key) is-invalid @enderror"
                                                                id="pengukuran" name="pengukuran[]"
                                                                value="{{ old('pengukuran.' . $key) ?? $formUpsDataUkurLoadBeban->pengukuran }}"
                                                                placeholder="Enter..">

                                                            @error('pengukuran.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-4 form-group">
                                                            <label class="d-flex justify-content-center">Satuan</label>
                                                            <select
                                                            class="form-control @error('satuan.') is-invalid @enderror"
                                                            name="satuan">
                                                            <option value="">Choose Or Type Selection</option>
                                                            <option value="Vac";
                                                                {{ old('satuan.') ?? $formUpsDataUkurLoadBeban->satuan == 'Vac' ? 'selected' : '' }}>
                                                                Vac
                                                            </option>
                                                            <option value="A"
                                                                {{ old('satuan.') ?? $formUpsDataUkurLoadBeban->satuan == 'A' ? 'selected' : '' }}>
                                                                A
                                                            </option>
                                                            <option value="HZ"
                                                                {{ old('satuan.') ?? $formUpsDataUkurLoadBeban->satuan == 'HZ' ? 'selected' : '' }}>
                                                                HZ
                                                            </option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image">Image 1</label>
                                    <img class="img-preview img-fluid mb-3">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('dokumentasi.') is-invalid @enderror" id="dokumentasi"
                                                name="dokumentasi">
                                            <label class="custom-file-label" for="dokumentasi">Choose Image</label>
                                        </div>
                                    </div>

                                    @error('dokumentasi')
                                        <span class="text-danger text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Image 2</label>
                                    <img class="img-preview2 img-fluid mb-3">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('dokumentasi2.') is-invalid @enderror" id="dokumentasi2"
                                                name="dokumentasi2">
                                            <label class="custom-file-label" for="dokumentasi2">Choose Image</label>
                                        </div>
                                    </div>

                                    @error('dokumentasi2')
                                        <span class="text-danger text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-12 col-lg-3 control-label d-flex justify-content-center align-items-center">Catatan</label>
                                    <div class="col-12 col-lg-9">

                                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
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
                    <button type="submit" class="btn btn-success btn-footer">Add</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-footer">Back</a>
                </div>
            </div>

        </form>
    </section>
@endsection
@section('script')

    <script>
        const dokumentasi = document.querySelector('#dokumentasi');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';
        dokumentasi.addEventListener('change', function(e) {

            //Cara 1
            // const ofReader = new FileReader();
            // ofReader.readAsDataURL(e.target.files[0])

            // ofReader.onload = function(e) {
            //     imgPreview.src = e.target.result;
            // }

            //Cara 2
            const blob = URL.createObjectURL(e.target.files[0]);
            imgPreview.src = blob;
            console.log(blob);
        });
    </script>

    <script>
        const dokumentasi2 = document.querySelector('#dokumentasi2');
        const imgPreview2 = document.querySelector('.img-preview2');
        imgPreview2.style.display = 'block';
        dokumentasi2.addEventListener('change', function(e) {

            //Cara 1
            // const ofReader = new FileReader();
            // ofReader.readAsDataURL(e.target.files[0])

            // ofReader.onload = function(e) {
            //     imgPreview2.src = e.target.result;
            // }

            //Cara 2
            const blob = URL.createObjectURL(e.target.files[0]);
            imgPreview2.src = blob;
            console.log(blob);
        });
    </script>

    <script>
        function showHide(button) {
            const child = $(button).parent().find("#accordion"); // get child element
            if (child.hasClass('fa-minus')) {
                child.removeClass('fa-minus').addClass('fa-plus');; // logs "This is the child element"
            } else if (child.hasClass('fa-plus')) {
                child.removeClass('fa-plus').addClass('fa-minus'); // logs "This is the child element"
            }
        }

        function addField() {
            const getkapasitas = $('#kapasitas').val();
            const getdistribusi = $('#distribusi').val();
            const countAccordionRow = $('.accordion').length;
            console.log(countAccordionRow)
            if (getkapasitas == false || getdistribusi == false) {
                $.alert({
                    icon: 'fas fa-exclamation-triangle',
                    title: 'Perhatian!',
                    type: 'warning',
                    content: 'KAPASITAS dan Distribusi Utama harus diisi!',
                });
            } else {
                // area add-substation-area hanyalah untuk penentuan lokasi dalam div
                $('.add-substation-area').append(`
                
                <div class="container-fluid">
                            <div class="accordion" id="accordion${countAccordionRow+1}">
                                <div class="card">
                                    <div class="card-header" id="${countAccordionRow+1}">
                                        <h2 class="row mb-0">
                                            <div class="col-6">
                                                <button class="btn btn-link btn-block text-left" type="button"
                                                    data-toggle="collapse" data-target="#collapse${countAccordionRow+1}"
                                                    aria-expanded="true" aria-controls="collapse${countAccordionRow+1}"
                                                    onclick="showHide(this)">
                                                    <i class="fas ${countAccordionRow+1 === 1 ? 'fa-minus' : 'fa-plus'}"
                                                        id="accordion"></i>
                                                    ${getkapasitas}
                                                </button>
                                                <input type="hidden" name="kapasitas[]" value="${getkapasitas}">
                                            </div>
                                            <div class="col-6 d-flex justify-content-end">
                                                <button type="button" class="btn btn-outline-danger btn-remove"
                                                    onclick="deleteAccordion(this)"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </h2>
                                    </div>

                                    <div id="collapse${countAccordionRow+1}"
                                        class="${countAccordionRow+1 === 1 ? 'show' : ''} collapse"
                                        aria-labelledby="head${countAccordionRow+1}"
                                        data-parent="#accordion${countAccordionRow+1}">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>DISTRIBUSI UTAMA</label>
                                                        <input type="text"
                                                            class="form-control @error('distribusi . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="distribusiReadOnly" name="distribusi[]"
                                                            value="${getdistribusi}"
                                                            placeholder="Enter..">

                                                        @error('distribusi . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 ">
                                            <label class="d-flex justify-content-center">ARUS BEBAN PER MODUL</label>
                                            <div class="row">
                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">R</label>
                                                        <input type="number"
                                                            class="form-control @error('r . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="r" name="r[]"
                                                            value="{{ old('r . ${countAccordionRow-1}') }}"
                                                            placeholder="Enter..">

                                                        @error('r . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">S</label>
                                                        <input type="number"
                                                            class="form-control @error('s . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="s" name="s[]"
                                                            value="{{ old('s . ${countAccordionRow-1}') }}"
                                                            placeholder="Enter..">

                                                        @error('s . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">T</label>
                                                        <input type="number"
                                                            class="form-control @error('t . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="t" name="t[]"
                                                            value="{{ old('t . ${countAccordionRow-1}') }}"
                                                            placeholder="Enter..">

                                                        @error('t . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">N</label>
                                                        <input type="number"
                                                            class="form-control @error('n . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="t" name="n[]"
                                                            value="{{ old('n . ${countAccordionRow-1}') }}"
                                                            placeholder="Enter..">

                                                        @error('n . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                                </div>
                                                </div>
                                            <div class="row">
                                                <div class="col-12 ">
                                                    <label class="d-flex justify-content-center">PENGUKURAN DISPLAY</label>
                                                    <div class="row">
                                                        <div class="col-12 col-lg-4">
                                                            <label class="d-flex justify-content-center">BESARAN</label>
                                                            <select
                                                            class="form-control @error('besaran.') is-invalid @enderror"
                                                            name="besaran[]">
                                                            <option value="">Choose Or Type Selection</option>
                                                            <option value="V.INPUT UPS";>
                                                                V.INPUT UPS
                                                            </option>
                                                            <option value="I.INPUT UPS">
                                                                I.INPUT UPS
                                                            </option>
                                                            <option value="F.INPUT UPS">
                                                                F.INPUT UPS
                                                            </option>
                                                            <option value="V.FLOATING">
                                                                V.FLOATING
                                                            </option>
                                                            <option value="V.Per Battery">
                                                                V.Per Battery
                                                            </option>
                                                            <option value="I.CHARGING">
                                                                I.CHARGING
                                                            </option>
                                                            <option value="V. OUT PUT UPS">
                                                                V. OUT PUT UPS
                                                            </option>
                                                            <option value="I. OUT PUT UPS">
                                                                I. OUT PUT UPS
                                                            </option>
                                                            <option value="L1-G ">
                                                                L1-G 
                                                            </option>
                                                            <option value="L1-G ">
                                                                L1-G 
                                                            </option>
                                                            <option value="L2-G ">
                                                                L2-G 
                                                            </option>
                                                            <option value="L3-G ">
                                                                L3-G 
                                                            </option>
                                                            <option value="N-G ">
                                                                N-G 
                                                            </option>
                                                        </select>
                                                        </div>
                                                        <div class="col-12 col-lg-4">
                                                            <label class="d-flex justify-content-center">Pengukuran</label>
                                                            <input type="number"
                                                                class="form-control @error('pengukuran . ${countAccordionRow-1}') is-invalid @enderror"
                                                                id="pengukuran" name="pengukuran[]"
                                                                value="{{ old('pengukuran . ${countAccordionRow-1}') }}"
                                                                placeholder="Enter..">

                                                            @error('pengukuran . ${countAccordionRow-1}')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-12 col-lg-4">
                                                            <label class="d-flex justify-content-center">Satuan</label>
                                                            <select
                                                            class="form-control @error('satuan.') is-invalid @enderror"
                                                            name="satuan[]">
                                                            <option value="">Choose Or Type Selection</option>
                                                            <option value="Vac";>
                                                                Vac
                                                            </option>
                                                            <option value="A">
                                                                A
                                                            </option>
                                                            <option value="HZ">
                                                                HZ
                                                            </option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            `);
            }

            $('#kapasitas').val('');
            $('#distribusi').val('');
        }

        function deleteAccordion(e) {
            var parent = $(event.target).parent().parent().parent().parent().parent().parent();
            parent.remove();
        }

        $(document).ready(function() {

            $("#myForm").submit(function(event) {
                const countAccordionRow = $('.accordion').length;
                if (countAccordionRow == 0) {
                    event.preventDefault(); // Prevents the form from being submitted

                    // Perform additional actions or validations if needed

                    // Example: Display an alert
                    $.alert({
                        icon: 'fas fa-exclamation-triangle',
                        title: 'Perhatian!',
                        type: 'warning',
                        content: 'SUBSTATION dan PANEL harus diisi!',
                    });
                }
                console.log("berhenti count :" + countAccordionRow)
            });

        });
    </script>
@endsection
