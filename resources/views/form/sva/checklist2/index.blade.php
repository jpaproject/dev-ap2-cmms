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
        <form method="POST" action="{{ route('form.sva.checklist2.update', $detailWorkOrderForm->id) }}"
            enctype="multipart/form-data" id="form">
            @method('patch')
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title" style="text-align: right;">CHECK</h3>
                            </div>

                            <div class="card-body">

                                @include('components.form-message')

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Tanggal</label>
                                    <div class="col-lg-3 col-10">
                                        <input type="date" class="form-control" name="tanggal"
                                            value="{{ $formSvaChecklist2Harians[0]->tanggal }}">
                                    </div>

                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Jam</label>
                                    <div class="col-lg-3 col-10">
                                        <input type="time" class="form-control" name="jam"
                                            value="{{ $formSvaChecklist2Harians[0]->jam }}">
                                    </div>

                                    <label class="col-2 col-lg-3"></label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">R/W IN USE</label>
                                    <div class="col-lg-3 col-10">
                                       <select class="form-control" aria-label="Default select example"
                                                        name="qfu">
                                                        <option value="" selected>Open this select menu</option>
                                                        <option value="25 L"
                                                            {{ $formSvaChecklist2Harians[0]->qfu == '25 L' ? 'selected' : '' }}>
                                                            25 L</option>
                                                        <option value="07 R"
                                                            {{ $formSvaChecklist2Harians[0]->qfu == '07 R' ? 'selected' : '' }}>
                                                            07 R</option>
                                                    </select>
                                    </div>

                                    <label class="col-2 col-lg-3"></label>
                                </div>
                            </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>

            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title" style="text-align: right;">RUNWAY SELATAN</h3>
                            </div>

                            <div class="card-body">

                                @include('components.form-message')
                                    
                                @foreach ($formSvaChecklist2Harians as $key => $item)
                                    <div class="row">
                                        <div class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                            <label>{{ $loop->iteration }}. {{ $item['pertanyaan'] }} </label>

                                        </div>
                                        <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-6">

                                                <div class="form-group">
                                                    <span class="d-flex justify-content-center">Hasil
                                                    </span> </span>
                                                    <select class="form-control" aria-label="Default select example"
                                                        name="hasil[]">
                                                        <option value="" selected>Open this select menu</option>
                                                        <option value="ON"
                                                            {{ (old('hasil.' . $key) ?? $item->hasil) == 'ON' ? 'selected' : '' }}>
                                                            ON</option>
                                                        <option value="OFF"
                                                            {{ (old('hasil.' . $key) ?? $item->hasil) == 'OFF' ? 'selected' : '' }}>
                                                            OFF</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="form-group">

                                                    <span class="d-flex justify-content-center">Keterangan
                                                    </span> </span>
                                                    <textarea 
                                                        class="form-control @error('keterangan.' . $key) is-invalid @enderror"
                                                        id="keterangan" name="keterangan[]"
                                                        placeholder="Enter..">{!! $item->keterangan !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <hr class="bg-primary">
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
