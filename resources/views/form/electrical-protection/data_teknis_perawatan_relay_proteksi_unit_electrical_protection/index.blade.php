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

        <table class="table table-bordered head table-responsive w-100 d-block d-md-table">
            <thead class="thead-light">
                <tr>
                    <th class="head" scope="col">WORKING ORDER NUMBER</th>
                    <th class="head" scope="col">LOCATION</th>
                    <th class="head" scope="col">DATE</th>
                    <th class="head" scope="col">MONTH</th>
                    <th class="head" scope="col">YEAR</th>
                    <th class="head" scope="col">SUPERVISED BY</th>
                    <th class="head" scope="col">DINAS</th>
                    <th class="head" scope="col">HARI/TANGGAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="head">WO</th>
                    <td class="head">NP</td>
                    <td class="head">18</td>
                    <td class="head">JAN</td>
                    <td class="head">2023</td>
                    <td class="head">ALAN</td>
                    <td class="head">DIMAS ARYASATYA</td>
                    <td class="head">23-02-2023</td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-12 col-lg-5 col-md-4">
                <table class="table table-bordered head table-responsive d-md-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="head" scope="col">No.</th>
                            <th class="head" scope="col">Personil Yang Ditugaskan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="head">1.</th>
                            <td class="head">Dimas Aryasatya</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-lg-7 col-md-8">
                <table class="table table-bordered head table-responsive d-md-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="head" scope="col">HARI/TANGGAL</th>
                            <th class="head" scope="col">DINAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="head">Friday, 25/02/2023 09:15</th>
                            <td class="head">DINAS</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <form method="POST" action="{{ route('work-orders.store') }}" enctype="multipart/form-data" id="form">
            @csrf
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
                                    <div class="col-12 col-lg-3 col-md-12 d-flex justify-content-center">
                                        <span>SUBSTATION</span>
                                    </div>
                                    <div class="col-12 col-lg-5 col-md-6">
                                        <input type="text" class="form-control" id="substation" name=""
                                            placeholder="Enter..">

                                        @error('pick-time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-6">
                                        <button type="button" class="btn btn-outline-primary w-100" id="btn-add-document"
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

            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label
                                        class="col-12 col-lg-3 control-label d-flex justify-content-center align-items-center">Catatan</label>
                                    <div class="col-12 col-lg-9">

                                        <textarea name="remote-orders-rcms" class="form-control @error('remote-orders-rcms') is-invalid @enderror"
                                            id="remote-orders-rcms" placeholder="Deskripsi"></textarea>
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
        function showHide(button) {
            const child = $(button).parent().find("#accordion"); // get child element
            if (child.hasClass('fa-chevron-up')) {
                child.removeClass('fa-chevron-up').addClass('fa-chevron-down');; // logs "This is the child element"
            } else if (child.hasClass('fa-chevron-down')) {
                child.removeClass('fa-chevron-down').addClass('fa-chevron-up'); // logs "This is the child element"
            }
        }

        function addField() {
            const getSubstation = $('#substation').val();
            const countAccordionRow = $('.accordion').length;
            if ($('#substation').val() == '') {
                alert('SUBSTATION Harus Diisi!');
            } else {
                // area add-substation-area hanyalah untuk penentuan lokasi dalam div
                $('.add-substation-area').append(`
                <div class="container-fluid">
                <div class="accordion" id="accordion${countAccordionRow+1}">
                    <div class="card">
                        <div class="card-header" id="${countAccordionRow+1}">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapse${countAccordionRow+1}" aria-expanded="true" aria-controls="collapse${countAccordionRow+1}"
                                    onclick="showHide(this)">
                                    <i class="fas ${countAccordionRow+1 === 1 ? 'fa-chevron-up' : 'fa-chevron-down'} d-flex justify-content-end" id="accordion"></i> ${getSubstation}
                                </button>
                            </h2>
                        </div>

                        <div id="collapse${countAccordionRow+1}" class="collapse ${countAccordionRow+1 === 1 ? 'show' : ''}" aria-labelledby="${countAccordionRow+1}"
                            data-parent="#accordion${countAccordionRow+1}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>NAMA PANEL</label>
                                            <input type="text"
                                                class="form-control @error('input2') is-invalid @enderror" id="input2"
                                                name="input2" value="{{ old('input2') }}" placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>MERK / TYPE RELAY</label>
                                            <input type="text"
                                                class="form-control @error('input2') is-invalid @enderror" id="input2"
                                                name="input2" value="{{ old('input2') }}" placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>TEGANGAN POWER SUPLAY</label>
                                            <input type="number"
                                                class="form-control @error('input2') is-invalid @enderror" id="input2"
                                                name="input2" value="{{ old('input2') }}" step="0.1" min="0"
                                                placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <span class="d-flex justify-content-center">ARUS</span>
                                        <div class="row">
                                            <div class="col-6 form-group">
                                                <label class="d-flex justify-content-center">I</label>
                                                <input type="number"
                                                    class="form-control @error('input2') is-invalid @enderror"
                                                    id="input2" name="input2" value="{{ old('input2') }}"
                                                    step="0.01" min="0" placeholder="Vdc">

                                                @error('input2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-6 form-group">
                                                <label class="d-flex justify-content-center">Ir</label>
                                                <input type="number"
                                                    class="form-control @error('input2') is-invalid @enderror"
                                                    id="input2" name="input2" value="{{ old('input2') }}"
                                                    step="0.01" min="0" placeholder="Vdc">

                                                @error('input2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-lg-2">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">VDC (+) TO<br>GROUND</label>
                                            <input type="number"
                                                class="form-control @error('input2') is-invalid @enderror" id="input2"
                                                name="input2" value="{{ old('input2') }}" step="0.01"
                                                min="0" placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4 col-lg-2">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">VDC (-) TO<br>GROUND</label>
                                            <input type="number"
                                                class="form-control @error('input2') is-invalid @enderror" id="input2"
                                                name="input2" value="{{ old('input2') }}" step="0.01"
                                                min="0" placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4 col-lg-2">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">BODY TO<br>GROUND</label>
                                            <input type="number"
                                                class="form-control @error('input2') is-invalid @enderror" id="input2"
                                                name="input2" value="{{ old('input2') }}" step="0.01"
                                                min="0" placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">SUDUT ( ° )</label>
                                            <input type="number"
                                                class="form-control @error('input2') is-invalid @enderror" id="input2"
                                                name="input2" value="{{ old('input2') }}" min="0"
                                                placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">KOMUNIKASI</label>
                                            <select class="form-control  @error('gs5') is-invalid @enderror"
                                                name="gs5">
                                                <option disabled selected>Choose Selection</option>
                                                <option value="NORMAL" {{ old('gs5') == 'NORMAL' ? 'selected' : '' }}>
                                                    NORMAL</option>
                                                <option value="ABNORMAL" {{ old('gs5') == 'ABNORMAL' ? 'selected' : '' }}>
                                                    ABNORMAL</option>
                                            </select>

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">I DIFF</label>
                                            <input type="number"
                                                class="form-control @error('input2') is-invalid @enderror" id="input2"
                                                name="input2" value="{{ old('input2') }}" step="0.01"
                                                min="0" placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">I BIAS</label>
                                            <input type="number"
                                                class="form-control @error('input2') is-invalid @enderror" id="input2"
                                                name="input2" value="{{ old('input2') }}" step="0.01"
                                                min="0" placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">TEGANGAN KOMPONEN</label>
                                            <input type="number"
                                                class="form-control @error('input2') is-invalid @enderror" id="input2"
                                                name="input2" value="{{ old('input2') }}" step="0.01"
                                                min="0" placeholder="Vdc">

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">KOMUNIKASI</label>
                                            <select class="form-control  @error('gs5') is-invalid @enderror"
                                                name="gs5">
                                                <option disabled selected>Choose Selection</option>
                                                <option value="NORMAL" {{ old('gs5') == 'NORMAL' ? 'selected' : '' }}>
                                                    NORMAL</option>
                                                <option value="ABNORMAL" {{ old('gs5') == 'ABNORMAL' ? 'selected' : '' }}>
                                                    ABNORMAL</option>
                                            </select>

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">CLEANING PERALATAN</label>
                                            <select class="form-control  @error('gs5') is-invalid @enderror"
                                                name="gs5">
                                                <option disabled selected>Choose Selection</option>
                                                <option value="YES" {{ old('gs5') == 'YES' ? 'selected' : '' }}>
                                                    YES</option>
                                                <option value="NO" {{ old('gs5') == 'NO' ? 'selected' : '' }}>
                                                    NO</option>
                                            </select>

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">ALARM EVENT</label>
                                            <select class="form-control  @error('gs5') is-invalid @enderror"
                                                name="gs5">
                                                <option disabled selected>Choose Selection</option>
                                                <option value="YES" {{ old('gs5') == 'YES' ? 'selected' : '' }}>
                                                    YES</option>
                                                <option value="NO" {{ old('gs5') == 'NO' ? 'selected' : '' }}>
                                                    NO</option>
                                            </select>

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">THIGHTNING</label>
                                            <select class="form-control  @error('gs5') is-invalid @enderror"
                                                name="gs5">
                                                <option disabled selected>Choose Selection</option>
                                                <option value="YES" {{ old('gs5') == 'YES' ? 'selected' : '' }}>
                                                    YES</option>
                                                <option value="NO" {{ old('gs5') == 'NO' ? 'selected' : '' }}>
                                                    NO</option>
                                            </select>

                                            @error('input2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4 col-lg-3">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">VERIFIKASI WAKTU</label>
                                            <input type="datetime-local"
                                                class="form-control @error('pick-time') is-invalid @enderror"
                                                id="pick-time" name="pick-time" value="{{ old('pick-time') }}"
                                                placeholder="Enter sugested completion">

                                            @error('pick-time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-8 col-lg-9">
                                        <div class="form-group">
                                            <label
                                                class="control-label d-flex justify-content-center align-items-center">KETERANGAN</label>
                                            <div class="col-12">

                                                <textarea name="remote-orders-rcms" class="form-control @error('remote-orders-rcms') is-invalid @enderror"
                                                    id="remote-orders-rcms" placeholder="Deskripsi"></textarea>
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

            $('#substation').val('');
        }
    </script>
@endsection
