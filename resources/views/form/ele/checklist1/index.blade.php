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
        <form method="POST" action="{{ route('form.ele.checklist1.update', $detailWorkOrderForm->id) }}" enctype="multipart/form-data"
            id="form">
            @method('patch')
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title" style="text-align: right;">RCMS</h3>
                            </div>
                            <div class="card-body">

                                @include('components.form-message')

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Tanggal</label>
                                    <div class="col-lg-3 col-10">

                                        <input type="date" class="w-100" name="tanggal" value="{{$formEleChecklist1HarianSelatans[0]->tanggal}}">
                                    </div>

                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Jam (Pagi)</label>
                                    <div class="col-lg-3 col-10">

                                        <input type="time" class="w-100" name="jam_pagi" value="{{$formEleChecklist1HarianSelatans[0]->jam_pagi}}">
                                    </div>

                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Jam (Sore)</label>
                                    <div class="col-lg-3 col-10">

                                        <input type="time" class="w-100" name="jam_sore" value="{{$formEleChecklist1HarianSelatans[0]->jam_sore}}">
                                    </div>

                                    <label class="col-2 col-lg-3"></label>
                                </div>

                            </div>
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

                            <form method="POST" action="{{ route('form.ele.checklist1.update', $detailWorkOrderForm->id) }}" enctype="multipart/form-data"
                                id="form">
                                @method('patch')
                                @csrf

                                <div class="card-body">

                                    @include('components.form-message')
                                    @foreach ($formEleChecklist1HarianUtaras as $key => $utara)
                                        <div class="form-group row">
                                            <label class="col-12 col-lg-3">{{$loop->iteration}}. {{$utara['pertanyaan']}}</label>
                                            <div class="col-lg-3 col-md-5 col-12">
                                                <label for="">Pagi</label>
                                                <select class="form-control" aria-label="Default select example" name="pagi_utara[]">
                                                    <option value="" selected>Open this select menu</option>
                                                    <option value="on"
                                                        {{ (old('pagi.' . $key) ?? $utara->pagi) == 'on' ? 'selected' : '' }}
                                                    >ON</option>
                                                    <option value="off"
                                                        {{ (old('pagi.' . $key) ?? $utara->pagi) == 'off' ? 'selected' : '' }}
                                                    >OFF</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-3 col-md-5 col-12">
                                                <label for="">Sore</label>
                                                <select class="form-control" aria-label="Default select example" name="sore_utara[]">
                                                    <option value="" selected>Open this select menu</option>
                                                    <option value="on"
                                                        {{ (old('sore.' . $key) ?? $utara->sore) == 'on' ? 'selected' : '' }}
                                                    >ON</option>
                                                    <option value="off"
                                                        {{ (old('sore.' . $key) ?? $utara->sore) == 'off' ? 'selected' : '' }}
                                                    >OFF</option>
                                                </select>
                                            </div>
                                            <label class="col-2 col-lg-3"></label>
                                        </div>
                                    @endforeach

                                </div>
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

                                <div class="card-body">

                                    @include('components.form-message')
                                    @foreach ($formEleChecklist1HarianSelatans as $key => $selatan)
                                        <div class="form-group row">
                                            <label class="col-12 col-lg-3">{{$loop->iteration}}. {{$selatan['pertanyaan']}}</label>
                                            <div class="col-lg-3 col-md-5 col-12">
                                                <label for="">Pagi</label>
                                                <select class="form-control" aria-label="Default select example" name="pagi_selatan[]">
                                                    <option value="" selected>Open this select menu</option>
                                                    <option value="on"
                                                        {{ (old('pagi.' . $key) ?? $selatan->pagi) == 'on' ? 'selected' : '' }}
                                                    >ON</option>
                                                    <option value="off"
                                                        {{ (old('pagi.' . $key) ?? $selatan->pagi) == 'off' ? 'selected' : '' }}
                                                    >OFF</option>
                                                </select>
                                                    {{-- <select
                                                        class="form-control select2 @error('pagi_selatan.' . $key) is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name="pagi_selatan[]">
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value=&check;
                                                            {{ old('pagi_selatan.' . $key) ?? $selatan->pagi == '&check;' ? 'selected' : '' }}
                                                            >
                                                            &check;
                                                        </option>
                                                        <option value=&#10007;
                                                            {{ old('pagi_selatan.' . $key) ?? $selatan->pagi == '&#10007;' ? 'selected' : '' }}
                                                            >
                                                            &#10007;
                                                        </option>
                                                        <option value=&minus;
                                                            {{ old('pagi_selatan.' . $key) ?? $selatan->pagi == '&minus;' ? 'selected' : '' }}
                                                            >
                                                            &minus;
                                                        </option>

                                                        @if ($selatan->pagi != '&check;' && $selatan->pagi != '&#10007;' && $selatan->pagi != '&minus;' && $selatan->pagi != null)
                                                            <option
                                                                value="{{ $selatan->pagi }}"
                                                                selected>
                                                                {{ $selatan->pagi }}
                                                            </option>
                                                        @endif
                                                    </select> --}}
                                            </div>
                                            <div class="col-lg-3 col-md-5 col-12">
                                                <label for="">Sore</label>
                                                <select class="form-control" aria-label="Default select example" name="sore_selatan[]">
                                                    <option value="" selected>Open this select menu</option>
                                                    <option value="on"
                                                        {{ (old('sore.' . $key) ?? $selatan->sore) == 'on' ? 'selected' : '' }}
                                                    >ON</option>
                                                    <option value="off"
                                                        {{ (old('sore.' . $key) ?? $selatan->sore) == 'off' ? 'selected' : '' }}
                                                    >OFF</option>
                                                </select>
                                                    {{-- <select
                                                        class="form-control select2 @error('sore_selatan.' . $key) is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name="sore_selatan[]">
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value=&check;
                                                            {{ old('sore_selatan.' . $key) ?? $selatan->sore == '&check;' ? 'selected' : '' }}
                                                            >
                                                            &check;
                                                        </option>
                                                        <option value=&#10007;
                                                            {{ old('sore_selatan.' . $key) ?? $selatan->sore == '&#10007;' ? 'selected' : '' }}
                                                            >
                                                            &#10007;
                                                        </option>
                                                        <option value=&minus;
                                                            {{ old('sore_selatan.' . $key) ?? $selatan->sore == '&minus;' ? 'selected' : '' }}
                                                            >
                                                            &minus;
                                                        </option>

                                                        @if ($selatan->sore != '&check;' && $selatan->sore != '&#10007;' && $selatan->sore != '&minus;' && $selatan->sore != null)
                                                            <option
                                                                value="{{ $selatan->sore }}"
                                                                selected>
                                                                {{ $selatan->sore }}
                                                            </option>
                                                        @endif
                                                    </select> --}}
                                            </div>
                                            <label class="col-2 col-lg-3"></label>
                                        </div>
                                    @endforeach

                                </div>
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
    </script>
@endsection
