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
        <form method="POST" id="myForm" action="{{ route('form.ups.dokumentasi-kegiatan-rutin.update', $detailWorkOrderForm) }}"
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
                                        <div class="row mb-2">
                                            <div class="col-4 d-flex align-items-center justify-content-center">
                                                <span>Nama Peralatan</span>
                                            </div>
                                            <div class="col-8"><input type="text" class="form-control"
                                                    id="nama_peralatan" name="nama_peralatan" placeholder="Enter..">

                                                @error('pick-time')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 d-flex align-items-center justify-content-center">
                                                <span>Jenis Kegiatan</span>
                                            </div>
                                            <div class="col-8"><input type="text" class="form-control"
                                                    id="jenis_kegiatan" name="jenis_kegiatan" placeholder="Enter..">

                                                @error('pick-time')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
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
                @if ($formUpsDokumentasiKegiatanRutins->isNotEmpty())
                    @foreach ($formUpsDokumentasiKegiatanRutins as $key => $formUpsDokumentasiKegiatanRutin)
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
                                                    {{ $formUpsDokumentasiKegiatanRutin->nama_peralatan ?? '' }}
                                                    <input type="hidden" name="nama_peralatan[]"
                                                        value="{{ $formUpsDokumentasiKegiatanRutin->nama_peralatan }}">
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
                                                        <label>JENIS KEGIATAN</label>
                                                        <input type="text"
                                                            class="form-control @error('jenis_kegiatan.' . $key) is-invalid @enderror"
                                                            id="jenis_kegiatanReadOnly" name="jenis_kegiatan[]"
                                                            value="{{ old('jenis_kegiatan.' . $key) ?? $formUpsDokumentasiKegiatanRutin->jenis_kegiatan }}"
                                                            placeholder="Enter..">

                                                        @error('jenis_kegiatan.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>Jam Mulai</label>
                                                            <input type="timr"
                                                                class="form-control @error('jam_mulai.' . $key) is-invalid @enderror"
                                                                id="jam_mulai" name="jam_mulai[]"
                                                                value="{{ old('jam_mulai.' . $key) ?? $formUpsDokumentasiKegiatanRutin->jam_mulai }}"
                                                                placeholder="Enter..">

                                                            @error('jam_mulai.' . $key)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Jam Selesai</label>
                                                        <input type="time"
                                                            class="form-control @error('jam_selesai.' . $key) is-invalid @enderror"
                                                            id="jam_selesai" name="jam_selesai[]"
                                                            value="{{ old('s.' . $key) ?? $formUpsDokumentasiKegiatanRutin->jam_selesai }}"
                                                            placeholder="Enter..">

                                                        @error('jam_selesai.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="card card-primary">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="image">Image 1</label>

                                                                        <img src="{{ asset('img/assets/' . ($asset->image ?? 'noimage.jpg')) }}"
                                                                            width="110px" class="image img" />

                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file"
                                                                                    class="custom-file-input"
                                                                                    id="image_1" name="image_1">
                                                                                <label class="custom-file-label"
                                                                                    for="image">Choose Image</label>
                                                                            </div>
                                                                        </div>

                                                                        @error('image_1')
                                                                            <span class="text-danger text-sm" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="image">Image 2</label>

                                                                        <img src="{{ asset('img/assets/' . ($asset->image ?? 'noimage.jpg')) }}"
                                                                            width="110px" class="image img" />

                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file"
                                                                                    class="custom-file-input"
                                                                                    id="image_2" name="image_2">
                                                                                <label class="custom-file-label"
                                                                                    for="image">Choose Image</label>
                                                                            </div>
                                                                        </div>

                                                                        @error('image_2')
                                                                            <span class="text-danger text-sm" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="image">Image 3</label>

                                                                        <img src="{{ asset('img/assets/' . ($asset->image ?? 'noimage.jpg')) }}"
                                                                            width="110px" class="image img" />

                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file"
                                                                                    class="custom-file-input"
                                                                                    id="image_3" name="image_3">
                                                                                <label class="custom-file-label"
                                                                                    for="image">Choose Image</label>
                                                                            </div>
                                                                        </div>

                                                                        @error('image_3')
                                                                            <span class="text-danger text-sm" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="image">Image 4</label>

                                                                        <img src="{{ asset('img/assets/' . ($asset->image ?? 'noimage.jpg')) }}"
                                                                            width="110px" class="image img" />

                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file"
                                                                                    class="custom-file-input"
                                                                                    id="iamge_4" name="iamge_4">
                                                                                <label class="custom-file-label"
                                                                                    for="image">Choose Image</label>
                                                                            </div>
                                                                        </div>

                                                                        @error('image_4')
                                                                            <span class="text-danger text-sm" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    </div>
                                                                </div>
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
        function showHide(button) {
            const child = $(button).parent().find("#accordion"); // get child element
            if (child.hasClass('fa-minus')) {
                child.removeClass('fa-minus').addClass('fa-plus');; // logs "This is the child element"
            } else if (child.hasClass('fa-plus')) {
                child.removeClass('fa-plus').addClass('fa-minus'); // logs "This is the child element"
            }
        }

        function addField() {
            const getNama_peralatan = $('#nama_peralatan').val();
            const getJenis_kegiatan = $('#jenis_kegiatan').val();
            const countAccordionRow = $('.accordion').length;
            console.log(countAccordionRow)
            if (getNama_peralatan == false || getJenis_kegiatan == false) {
                $.alert({
                    icon: 'fas fa-exclamation-triangle',
                    title: 'Perhatian!',
                    type: 'warning',
                    content: 'NAMA PERALATAN harus diisi!',
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
                                                    ${getNama_peralatan}
                                                </button>
                                                <input type="hidden" name="nama_peralatan[]" value="${getNama_peralatan}">
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
                                                        <label>JENIS KEGIATAN</label>
                                                        <input type="text"
                                                            class="form-control @error('jenis_kegiatan . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="jenis_kegiatanReadOnly" name="jenis_kegiatan[]"
                                                            value="${getJenis_kegiatan}"
                                                            placeholder="Enter..">

                                                        @error('jenis_kegiatan . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 ">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Jam Mulai</label>
                                                        <input type="time"
                                                            class="form-control @error('jam_mulai . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="jam_mulai" name="jam_mulai[]"
                                                            value="{{ old('jam_mulai . ${countAccordionRow-1}') }}"
                                                            placeholder="Enter..">

                                                        @error('jam_mulai . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Jam Selesai</label>
                                                        <input type="time"
                                                            class="form-control @error('jam_selesai . ${countAccordionRow-1}') is-invalid @enderror"
                                                            id="jam_selesai" name="jam_selesai[]"
                                                            value="{{ old('jam_selesai . ${countAccordionRow-1}') }}"
                                                            placeholder="Enter..">

                                                        @error('s . ${countAccordionRow-1}')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group">
                                            <label for="">Tasks</label> 

                                                <select class="form-control select2" name="tasks[]">
                                                <option value="">Choose Or Type Selection</option>
                                                </select>

                                            @error('tasks') 
                                                <span class="text-danger text-sm" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                                </div>
                                                </div>
                                            <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="card card-primary">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="image">Image 1</label>

                                                                        <img src="{{ asset('img/assets/' . ($asset->image ?? 'noimage.jpg')) }}"
                                                                            width="110px" class="image img" />

                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file"
                                                                                    class="custom-file-input @error('image_1 . ${countAccordionRow-1}') is-invalid @enderror"
                                                                                    id="image_1" name="image_1"
                                                                                    value="{{ old('image_1 . ${countAccordionRow-1}') }}">
                                                                                <label class="custom-file-label"
                                                                                    for="image_1">Choose Image</label>
                                                                            </div>
                                                                        </div>

                                                                        @error('image_1. ${countAccordionRow-1}')
                                                                            <span class="text-danger text-sm" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="image">Image 2</label>

                                                                        <img src="{{ asset('img/assets/' . ($asset->image ?? 'noimage.jpg')) }}"
                                                                            width="110px" class="image img" />

                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file"
                                                                                    class="custom-file-input @error('image_2 . ${countAccordionRow-1}') is-invalid @enderror"
                                                                                    id="image_2" name="image_2"
                                                                                    value="{{ old('image_2 . ${countAccordionRow-1}') }}">
                                                                                <label class="custom-file-label"
                                                                                    for="image_2">Choose Image</label>
                                                                            </div>
                                                                        </div>

                                                                        @error('image_2. ${countAccordionRow-1}')
                                                                            <span class="text-danger text-sm" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="image">Image 3</label>

                                                                        <img src="{{ asset('img/assets/' . ($asset->image ?? 'noimage.jpg')) }}"
                                                                            width="110px" class="image img" />

                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file"
                                                                                    class="custom-file-input @error('image_3 . ${countAccordionRow-1}') is-invalid @enderror"
                                                                                    id="image_3" name="image_3"
                                                                                    value="{{ old('image_3 . ${countAccordionRow-1}') }}">
                                                                                <label class="custom-file-label"
                                                                                    for="image_3">Choose Image</label>
                                                                            </div>
                                                                        </div>

                                                                        @error('image_3. ${countAccordionRow-1}')
                                                                            <span class="text-danger text-sm" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="image">Image 4</label>

                                                                        <img src="{{ asset('img/assets/' . ($asset->image ?? 'noimage.jpg')) }}"
                                                                            width="110px" class="image img" />

                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file"
                                                                                    class="custom-file-input @error('image_4 . ${countAccordionRow-1}') is-invalid @enderror"
                                                                                    id="image_4" name="image_4"
                                                                                    value="{{ old('image_4 . ${countAccordionRow-1}') }}">
                                                                                <label class="custom-file-label"
                                                                                    for="image_4">Choose Image</label>
                                                                            </div>
                                                                        </div>

                                                                        @error('image_4. ${countAccordionRow-1}')
                                                                            <span class="text-danger text-sm" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    </div>
                                                                </div>
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

            $('#nama_peralatan').val('');
            $('#jenis_kegiatan').val('');
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
                        content: 'NAMA PERALATAN harus diisi!',
                    });
                }
                console.log("berhenti count :" + countAccordionRow)
            });

        });
    </script>
@endsection
