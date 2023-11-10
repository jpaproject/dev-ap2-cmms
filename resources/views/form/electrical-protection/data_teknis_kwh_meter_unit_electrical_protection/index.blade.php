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
        <div class="row">
            <div class="col-12 col-lg-5 col-md-4">
                <table class="table-bordered head table-responsive d-md-table table">
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
                <table class="table-bordered head table-responsive d-md-table table">
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
            @if (!$assets->isEmpty())
                {{-- @foreach ($assets as $asset)
                    <div class="container-fluid">
                        <div class="accordion" id="{{ 'accordion' . $loop->iteration }}">
                            <div class="card">
                                <div class="card-header" id="{{ 'heading' . $loop->iteration }}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne" onclick="showHide(this)">
                                            <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i> T11
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show"
                                    aria-labelledby="{{ 'heading' . $loop->iteration }}"
                                    data-parent="#{{ 'accordion' . $loop->iteration }}">
                                    <div class="card-body">
                                        @include('components.form-message')
                                        @foreach ($asset->children()->get() as $child)
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                                    <h5>{{ $child->name }} </h5>
                                                </div>
                                                <div class="col-12 col-lg-9">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <div class="row">
                                                                <span
                                                                    class="col-12 d-flex justify-content-center fw-bolder">INCOMING</span>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="d-flex justify-content-center">GWH</label>
                                                                        <input type="number"
                                                                            class="form-control @error('input2') is-invalid @enderror"
                                                                            id="input2" name="input2"
                                                                            value="{{ old('input2') }}" step="0.01"
                                                                            min="0" placeholder="Vdc">

                                                                        @error('input2')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="d-flex justify-content-center">GVARh</label>
                                                                        <input type="number"
                                                                            class="form-control @error('input2') is-invalid @enderror"
                                                                            id="input2" name="input2"
                                                                            value="{{ old('input2') }}" step="0.01"
                                                                            min="0" placeholder="Vdc">

                                                                        @error('input2')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="row">
                                                                <span
                                                                    class="col-12 d-flex justify-content-center fw-bolder">OUTGOING</span>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="d-flex justify-content-center">GWH</label>
                                                                        <input type="number"
                                                                            class="form-control @error('input2') is-invalid @enderror"
                                                                            id="input2" name="input2"
                                                                            value="{{ old('input2') }}" step="0.01"
                                                                            min="0" placeholder="Vdc">

                                                                        @error('input2')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="d-flex justify-content-center">GVARh</label>
                                                                        <input type="number"
                                                                            class="form-control @error('input2') is-invalid @enderror"
                                                                            id="input2" name="input2"
                                                                            value="{{ old('input2') }}" step="0.01"
                                                                            min="0" placeholder="Vdc">

                                                                        @error('input2')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <span class="col-12 d-flex justify-content-center">TOTAL</span>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="d-flex justify-content-center">GWH
                                                                        </label> <input type="number"
                                                                            class="form-control @error('input2') is-invalid @enderror"
                                                                            id="input2" name="input2"
                                                                            value="{{ old('input2') }}" step="0.01"
                                                                            min="0" placeholder="Vdc">

                                                                        @error('input2')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="d-flex justify-content-center">GVARh
                                                                        </label> <input type="number"
                                                                            class="form-control @error('input2') is-invalid @enderror"
                                                                            id="input2" name="input2"
                                                                            value="{{ old('input2') }}" step="0.01"
                                                                            min="0" placeholder="Vdc">

                                                                        @error('input2')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-6">
                                                            <div class="row">
                                                                <label
                                                                    class="col-12 d-flex justify-content-center mt-4">TIME</label>

                                                                <div class="input-group date" id="timepicker"
                                                                    data-target-input="nearest">
                                                                    <input type="text"
                                                                        class="form-control datetimepicker-input"
                                                                        data-target="#timepicker" />
                                                                    <div class="input-group-append"
                                                                        data-target="#timepicker"
                                                                        data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i
                                                                                class="far fa-clock"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach --}}
                @foreach ($assets as $asset)
                    <div class="container-fluid">
                        <div class="accordion" id="{{ 'accordion' . $loop->iteration }}">
                            <div class="card">
                                <div class="card-header" id="{{ 'heading' . $loop->iteration }}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne" onclick="showHide(this)">
                                            <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i> T11
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="show collapse"
                                    aria-labelledby="{{ 'heading' . $loop->iteration }}"
                                    data-parent="#{{ 'accordion' . $loop->iteration }}">
                                    <div class="card-body">
                                        @include('components.form-message')
                                        <div class="row">
                                            <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                                <h5>TEST</h5>
                                            </div>
                                            <div class="col-12 col-lg-9">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="row">
                                                            <span
                                                                class="col-12 d-flex justify-content-center fw-bolder">INCOMING</span>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="d-flex justify-content-center">GWH</label>
                                                                    <input type="number"
                                                                        class="form-control @error('input2') is-invalid @enderror"
                                                                        id="input2" name="input2"
                                                                        value="{{ old('input2') }}" step="0.01"
                                                                        min="0" placeholder="Vdc">

                                                                    @error('input2')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="d-flex justify-content-center">GVARh</label>
                                                                    <input type="number"
                                                                        class="form-control @error('input2') is-invalid @enderror"
                                                                        id="input2" name="input2"
                                                                        value="{{ old('input2') }}" step="0.01"
                                                                        min="0" placeholder="Vdc">

                                                                    @error('input2')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="row">
                                                            <span
                                                                class="col-12 d-flex justify-content-center fw-bolder">OUTGOING</span>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="d-flex justify-content-center">GWH</label>
                                                                    <input type="number"
                                                                        class="form-control @error('input2') is-invalid @enderror"
                                                                        id="input2" name="input2"
                                                                        value="{{ old('input2') }}" step="0.01"
                                                                        min="0" placeholder="Vdc">

                                                                    @error('input2')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="d-flex justify-content-center">GVARh</label>
                                                                    <input type="number"
                                                                        class="form-control @error('input2') is-invalid @enderror"
                                                                        id="input2" name="input2"
                                                                        value="{{ old('input2') }}" step="0.01"
                                                                        min="0" placeholder="Vdc">

                                                                    @error('input2')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <span class="col-12 d-flex justify-content-center">TOTAL</span>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="d-flex justify-content-center">GWH
                                                                    </label> <input type="number"
                                                                        class="form-control @error('input2') is-invalid @enderror"
                                                                        id="input2" name="input2"
                                                                        value="{{ old('input2') }}" step="0.01"
                                                                        min="0" placeholder="Vdc">

                                                                    @error('input2')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="d-flex justify-content-center">GVARh
                                                                    </label> <input type="number"
                                                                        class="form-control @error('input2') is-invalid @enderror"
                                                                        id="input2" name="input2"
                                                                        value="{{ old('input2') }}" step="0.01"
                                                                        min="0" placeholder="Vdc">

                                                                    @error('input2')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="row">
                                                            <label
                                                                class="col-12 d-flex justify-content-center mt-4">TIME</label>

                                                            <div class="input-group date" id="timepicker"
                                                                data-target-input="nearest">
                                                                <input type="text"
                                                                    class="form-control datetimepicker-input"
                                                                    data-target="#timepicker" />
                                                                <div class="input-group-append" data-target="#timepicker"
                                                                    data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i
                                                                            class="far fa-clock"></i>
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
                    </div>
                @endforeach
            @else
                <h3 class="text-mute my-5 text-center">Tidak ada asset!</h3>
            @endif


            <div class="container-fluid">
                <div class="row">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-footer">Add</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-footer">Back</a>
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
            if (child.hasClass('fa-chevron-up')) {
                child.removeClass('fa-chevron-up').addClass('fa-chevron-down');; // logs "This is the child element"
            } else if (child.hasClass('fa-chevron-down')) {
                child.removeClass('fa-chevron-down').addClass('fa-chevron-up'); // logs "This is the child element"
            }
        }
    </script>
@endsection
