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
        <form method="POST" id="myForm"
            action="{{ route('form.ups.pengukuran-tegangan-battery.update', $detailWorkOrderForm) }}"
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
                                                <span>Nama Bank</span>
                                            </div>
                                            <div class="col-8">
                                                <select class="form-control @error('nama_bank') is-invalid @enderror"
                                                    style="width: 100%;" name="" id="nama_bank">
                                                    <option value="">Choose Or Type Selection</option>
                                                    <option value="BANK 1">
                                                        BANK 1
                                                    </option>
                                                    <option value="BANK 2">
                                                        BANK 2
                                                    </option>
                                                    <option value="BANK 3">
                                                        BANK 3
                                                    </option>
                                                    <option value="BANK 4">
                                                        BANK 4
                                                    </option>
                                                </select>
                                                @error('nama_bank')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 d-flex align-items-center justify-content-center">
                                                <span>Banyak Battery</span>
                                            </div>
                                            <div class="col-8"><input type="number" class="form-control" id="banyak"
                                                    placeholder="Enter..">

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
            @php
                $prevBatt = null;
            @endphp
            <div class="add-substation-area">
                @if ($bank_1->isNotEmpty())
                    <div class="container-fluid">
                        <div class="accordion" id="accordionBank1">
                            <div class="card">
                                <div class="card-header" id="Bank1">
                                    <h2 class="row mb-0">
                                        <div class="col-6">
                                            <button class="btn btn-link btn-block text-left" type="button"
                                                data-toggle="collapse" data-target="#collapseBank1"
                                                aria-expanded="true" aria-controls="collapseBank1"
                                                onclick="showHide(this)">
                                                <i class="fas fa-minus"
                                                    id="accordion"></i>
                                                {{ $bank_1[0]->nama_bank ?? '' }}
                                                <input type="hidden" name="nama_bank[]"
                                                    value="{{ $bank_1[0]->nama_bank }}">
                                            </button>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end">
                                            <button type="button" class="btn btn-outline-danger btn-remove"
                                                onclick="deleteAccordion(this)"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </h2>
                                </div>

                                <div id="collapseBank1"
                                    class="show collapse"
                                    aria-labelledby="headBank1"
                                    data-parent="#accordionBank1">
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($bank_1 as $resultBank1)
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Hail pengukuran</label>
                                                        <input type="number"
                                                            class="form-control @error('hasil.' . $loop->index) is-invalid @enderror"
                                                            id="hasil"
                                                            name="hasil_{{ str_replace(' ', '_', strtolower($resultBank1->nama_bank)) }}[]"
                                                            value="{{ old('hasil.' . $loop->index) ?? $resultBank1->hasil }}"
                                                            placeholder="Enter..">

                                                        @error('hasil.' . $loop->index)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($bank_2->isNotEmpty())
                    <div class="container-fluid">
                        <div class="accordion" id="accordionBank2">
                            <div class="card">
                                <div class="card-header" id="Bank2">
                                    <h2 class="row mb-0">
                                        <div class="col-6">
                                            <button class="btn btn-link btn-block text-left" type="button"
                                                data-toggle="collapse" data-target="#collapseBank2"
                                                aria-expanded="true" aria-controls="collapseBank2"
                                                onclick="showHide(this)">
                                                <i class="fas fa-plus"
                                                    id="accordion"></i>
                                                {{ $bank_2[0]->nama_bank ?? '' }}
                                                <input type="hidden" name="nama_bank[]"
                                                    value="{{ $bank_2[0]->nama_bank }}">
                                            </button>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end">
                                            <button type="button" class="btn btn-outline-danger btn-remove"
                                                onclick="deleteAccordion(this)"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </h2>
                                </div>

                                <div id="collapseBank2"
                                    class="collapse"
                                    aria-labelledby="headBank2"
                                    data-parent="#accordionBank2">
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($bank_2 as $resultBank2)
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Hail pengukuran</label>
                                                        <input type="number"
                                                            class="form-control @error('hasil.' . $loop->index) is-invalid @enderror"
                                                            id="hasil"
                                                            name="hasil_{{ str_replace(' ', '_', strtolower($resultBank2->nama_bank)) }}[]"
                                                            value="{{ old('hasil.' . $loop->index) ?? $resultBank2->hasil }}"
                                                            placeholder="Enter..">

                                                        @error('hasil.' . $loop->index)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($bank_3->isNotEmpty())
                    <div class="container-fluid">
                        <div class="accordion" id="accordionBank3">
                            <div class="card">
                                <div class="card-header" id="Bank3">
                                    <h2 class="row mb-0">
                                        <div class="col-6">
                                            <button class="btn btn-link btn-block text-left" type="button"
                                                data-toggle="collapse" data-target="#collapseBank3"
                                                aria-expanded="true" aria-controls="collapseBank3"
                                                onclick="showHide(this)">
                                                <i class="fas fa-plus"
                                                    id="accordion"></i>
                                                {{ $bank_3[0]->nama_bank ?? '' }}
                                                <input type="hidden" name="nama_bank[]"
                                                    value="{{ $bank_3[0]->nama_bank }}">
                                            </button>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end">
                                            <button type="button" class="btn btn-outline-danger btn-remove"
                                                onclick="deleteAccordion(this)"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </h2>
                                </div>

                                <div id="collapseBank3"
                                    class="collapse"
                                    aria-labelledby="headBank3"
                                    data-parent="#accordionBank3">
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($bank_2 as $resultBank3)
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Hail pengukuran</label>
                                                        <input type="number"
                                                            class="form-control @error('hasil.' . $loop->index) is-invalid @enderror"
                                                            id="hasil"
                                                            name="hasil_{{ str_replace(' ', '_', strtolower($resultBank3->nama_bank)) }}[]"
                                                            value="{{ old('hasil.' . $loop->index) ?? $resultBank3->hasil }}"
                                                            placeholder="Enter..">

                                                        @error('hasil.' . $loop->index)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($bank_4->isNotEmpty())
                    <div class="container-fluid">
                        <div class="accordion" id="accordionBank4">
                            <div class="card">
                                <div class="card-header" id="Bank4">
                                    <h2 class="row mb-0">
                                        <div class="col-6">
                                            <button class="btn btn-link btn-block text-left" type="button"
                                                data-toggle="collapse" data-target="#collapseBank4"
                                                aria-expanded="true" aria-controls="collapseBank4"
                                                onclick="showHide(this)">
                                                <i class="fas fa-plus"
                                                    id="accordion"></i>
                                                {{ $bank_4[0]->nama_bank ?? '' }}
                                                <input type="hidden" name="nama_bank[]"
                                                    value="{{ $bank_4[0]->nama_bank }}">
                                            </button>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end">
                                            <button type="button" class="btn btn-outline-danger btn-remove"
                                                onclick="deleteAccordion(this)"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </h2>
                                </div>

                                <div id="collapseBank4"
                                    class="collapse"
                                    aria-labelledby="headBank4"
                                    data-parent="#accordionBank4">
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($bank_2 as $resultBank4)
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Hail pengukuran</label>
                                                        <input type="number"
                                                            class="form-control @error('hasil.' . $loop->index) is-invalid @enderror"
                                                            id="hasil"
                                                            name="hasil_{{ str_replace(' ', '_', strtolower($resultBank4->nama_bank)) }}[]"
                                                            value="{{ old('hasil.' . $loop->index) ?? $resultBank4->hasil }}"
                                                            placeholder="Enter..">

                                                        @error('hasil.' . $loop->index)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image">Image BANK 1</label>
                                    <img class="img-preview img-fluid mb-3">
                                    <div class="input-group">

                                        <div class="custom-file">

                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="dokumentasi1"
                                                        name="dokumentasi1">
                                                    <label class="custom-file-label" for="image">Choose Image</label>
                                                </div>
                                            </div>

                                            @error('dokumentasi1')
                                                <span class="text-danger text-sm" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image BANK 2</label>
                                    <img class="img-preview2 img-fluid mb-3">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="dokumentasi2"
                                                name="dokumentasi2">
                                            <label class="custom-file-label" for="image">Choose Image</label>
                                        </div>
                                    </div>

                                    @error('dokumentasi2')
                                        <span class="text-danger text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Image BANK 3</label>
                                    <img class="img-preview3 img-fluid mb-3">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="dokumentasi3"
                                                name="dokumentasi3">
                                            <label class="custom-file-label" for="image">Choose Image</label>
                                        </div>
                                    </div>

                                    @error('dokumentasi3')
                                        <span class="text-danger text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Image BANK 4</label>
                                    <img class="img-preview4 img-fluid mb-3">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="dokumentasi4"
                                                name="dokumentasi4">
                                            <label class="custom-file-label" for="image">Choose Image</label>
                                        </div>
                                    </div>

                                    @error('dokumentasi4')
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
        const dokumentasi1 = document.querySelector('#dokumentasi1');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';
        dokumentasi1.addEventListener('change', function(e) {

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

        const dokumentasi3 = document.querySelector('#dokumentasi3');
        const imgPreview3 = document.querySelector('.img-preview3');
        imgPreview3.style.display = 'block';
        dokumentasi3.addEventListener('change', function(e) {

            //Cara 1
            // const ofReader = new FileReader();
            // ofReader.readAsDataURL(e.target.files[0])

            // ofReader.onload = function(e) {
            //     imgPreview3.src = e.target.result;
            // }

            //Cara 2
            const blob = URL.createObjectURL(e.target.files[0]);
            imgPreview3.src = blob;
            console.log(blob);
        });

        const dokumentasi4 = document.querySelector('#dokumentasi4');
        const imgPreview4 = document.querySelector('.img-preview4');
        imgPreview4.style.display = 'block';
        dokumentasi4.addEventListener('change', function(e) {

            //Cara 1
            // const ofReader = new FileReader();
            // ofReader.readAsDataURL(e.target.files[0])

            // ofReader.onload = function(e) {
            //     imgPreview4.src = e.target.result;
            // }

            //Cara 2
            const blob = URL.createObjectURL(e.target.files[0]);
            imgPreview4.src = blob;
            console.log(blob);
        });

        function showHide(button) {
            const child = $(button).parent().find("#accordion"); // get child element
            if (child.hasClass('fa-minus')) {
                child.removeClass('fa-minus').addClass('fa-plus');; // logs "This is the child element"
            } else if (child.hasClass('fa-plus')) {
                child.removeClass('fa-plus').addClass('fa-minus'); // logs "This is the child element"
            }
        }


        function addField() {
            const getnama_bank = $('#nama_bank').val();
            let bankNameUnderScore = getnama_bank.toLowerCase().replace(/\s+/g, '_');
            const getbanyak = $('#banyak').val();
            const countAccordionRow = $('.accordion').length;
            console.log(countAccordionRow);

            if (!getnama_bank) {
                $.alert({
                    icon: 'fas fa-exclamation-triangle',
                    title: 'Perhatian!',
                    type: 'warning',
                    content: 'Nama Bank harus diisi!',
                });
            } else {
                const accordionContent = Array.from({
                    length: getbanyak
                }, (_, i) => `
      <div class="col-6">
        <div class="form-group">
          <label>Masukan HASIL PENGUKURAN BATTERY ${i + 1}</label>
          <input type="number"
            class="form-control @error('hasil . ${countAccordionRow - 1}') is-invalid @enderror"
            name="hasil_${bankNameUnderScore}[]"
            placeholder="Enter..">

          @error('hasil . ${countAccordionRow - 1}')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    `).join('');

                const accordionTemplate = `
      <div class="container-fluid">
        <div class="accordion" id="accordion${countAccordionRow + 1}">
          <div class="card">
            <div class="card-header" id="${countAccordionRow + 1}">
              <h2 class="row mb-0">
                <div class="col-6">
                  <button class="btn btn-link btn-block text-left" type="button"
                    data-toggle="collapse" data-target="#collapse${countAccordionRow + 1}"
                    aria-expanded="true" aria-controls="collapse${countAccordionRow + 1}"
                    onclick="showHide(this)">
                    <i class="fas ${countAccordionRow + 1 === 1 ? 'fa-minus' : 'fa-plus'}"
                      id="accordion"></i>
                    ${getnama_bank}
                  </button>
                </div>
                <div class="col-6 d-flex justify-content-end">
                  <button type="button" class="btn btn-outline-danger btn-remove"
                    onclick="deleteAccordion(this)"><i class="fa fa-trash"></i></button>
                </div>
              </h2>
            </div>
            <div id="collapse${countAccordionRow + 1}"
              class="${countAccordionRow + 1 === 1 ? 'show' : ''} collapse"
              aria-labelledby="head${countAccordionRow + 1}"
              data-parent="#accordion${countAccordionRow + 1}">
              <div class="card-body">
                <div class="row">
                  ${accordionContent}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    `;

                $('.add-substation-area').append(accordionTemplate);
            }

            $('#nama_bank').val('');
            $('#banyak').val('');
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
                        content: 'Nama Bank harus diisi!',
                    });
                }
                console.log("berhenti count :" + countAccordionRow)
            });

        });
    </script>
@endsection
