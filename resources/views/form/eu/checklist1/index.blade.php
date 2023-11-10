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
                            <h3 class="card-title" style="text-align: right;">RCMS</h3>
                        </div>
                        <form method="POST" action="{{ route('work-orders.store') }}" enctype="multipart/form-data"
                            id="form">
                            @csrf

                            <div class="card-body">

                                @include('components.form-message')

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Tanggal</label>
                                    <div class="col-lg-3 col-10">

                                        <input type="date" class="w-100">
                                    </div>

                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Jam (Pagi)</label>
                                    <div class="col-lg-3 col-10">

                                        <input type="time" class="w-100">
                                    </div>

                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Jam (Sore)</label>
                                    <div class="col-lg-3 col-10">

                                        <input type="time" class="w-100">
                                    </div>

                                    <label class="col-2 col-lg-3"></label>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="text-align: right;">SISI UTARA</h3>
                        </div>

                        <form method="POST" action="{{ route('work-orders.store') }}" enctype="multipart/form-data"
                            id="form">
                            @csrf

                            <div class="card-body">

                                @include('components.form-message')
                                {{-- <table class="w-100"> --}}
                                {{-- <div class="form-group row">
                                    <label class="col-12 col-lg-3 hidden-lg hidden-md hidden-sm hidden-xs">Genset</label>
                                    <label class="col-lg-6 col-10 hidden-lg hidden-md hidden-sm hidden-xs">GS AOCC</label>
                                    <label class="col-2 col-lg-3"></label>
                                </div> --}}


                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">1. FLOOD LIGHT APRON D</label>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Pagi</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Sore</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">2. FLOOD LIGHT APRON E</label>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Pagi</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Sore</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">3. FLOOD LIGHT APRON F</label>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Pagi</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Sore</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">4. FLOOD LIGHT REMOTE EAST</label>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Pagi</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Sore</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">5. FLOOD LIGHT APRON G</label>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Pagi</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Sore</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">6. FLOOD LIGHT REMOTE WEST</label>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Pagi</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Sore</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">7. FLOOD LIGHT APRON J</label>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Pagi</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Sore</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">8. OBSTRUCTION LIGHT</label>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Pagi</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Sore</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">9. AVDGS</label>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Pagi</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Sore</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">10. PARKING STAND</label>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Pagi</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Sore</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>
                                {{-- <div class="form-group row">
                                    <div class="col-12">
                                        <textarea name="scada" class="form-control @error('scada') is-invalid @enderror" id="scada" cols="30"
                                            rows="3" placeholder="Enter Catatan">Catatan:</textarea>
                                    </div>
                                </div> --}}
                                {{-- </table> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="text-align: right;">SISI SELATAN</h3>
                        </div>

                        <form method="POST" action="{{ route('work-orders.store') }}" enctype="multipart/form-data"
                            id="form">
                            @csrf

                            <div class="card-body">

                                @include('components.form-message')
                                {{-- <table class="w-100"> --}}
                                {{-- <div class="form-group row">
                                    <label class="col-12 col-lg-3 hidden-lg hidden-md hidden-sm hidden-xs">Genset</label>
                                    <label class="col-lg-6 col-10 hidden-lg hidden-md hidden-sm hidden-xs">GS AOCC</label>
                                    <label class="col-2 col-lg-3"></label>
                                </div> --}}


                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">1. FLOOD LIGHT APRON A</label>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Pagi</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Sore</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">2. FLOOD LIGHT APRON B</label>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Pagi</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Sore</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">3. FLOOD LIGHT APRON C</label>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Pagi</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Sore</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">4. FLOOD LIGHT NSA</label>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Pagi</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Sore</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">5. FLOOD LIGHT REMOTE B</label>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Pagi</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Sore</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">6. FLOOD LIGHT CARGO</label>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Pagi</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Sore</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">7. OBSTRUCTION LIGHT</label>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Pagi</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Sore</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">8. PARKING STAND</label>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Pagi</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-12">
                                        <label for="">Sore</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option value"" selected>Open this select menu</option>
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                    <label class="col-2 col-lg-3"></label>
                                </div>
                                {{-- <div class="form-group row">
                                    <div class="col-12">
                                        <textarea name="scada" class="form-control @error('scada') is-invalid @enderror" id="scada" cols="30"
                                            rows="3" placeholder="Enter Catatan">Catatan:</textarea>
                                    </div>
                                </div> --}}
                                {{-- </table> --}}
                            </div>
                        </form>
                    </div>
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
