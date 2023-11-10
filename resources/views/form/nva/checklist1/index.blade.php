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
        <form method="POST" action="{{ route('form.nva.checklist1.update', $detailWorkOrderForm->id) }}"
            enctype="multipart/form-data" id="form">
            @method('patch')
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title" style="text-align: right;"></h3>
                            </div>
                            <div class="card-body">

                                @include('components.form-message')

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Tanggal</label>
                                    <div class="col-lg-3 col-10">

                                        <input type="date" class="form-control" name="tanggal"
                                            value="{{ $rw2s[0]->tanggal ?? '' }}">
                                    </div>

                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Jam (Pagi)</label>
                                    <div class="col-lg-3 col-10">

                                        <input type="time" class="form-control" name="jam_pagi"
                                            value="{{ $rw2s[0]->jam_pagi }}">
                                    </div>

                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">RUNWAY 2 (PAGI)</label>
                                    <div class="col-lg-3 col-10">

                                        <select class="form-control" aria-label="Default select example"
                                            name="runway2_pagi">
                                            <option value="" selected>Open this select menu</option>
                                            @foreach ($datas->listRw[0]['option'] as $listRw)
                                                <option value="{{ $listRw }}"
                                                    {{ $rw2s[0]->runway2_pagi == $listRw ? 'selected' : '' }}>
                                                    {{ $listRw }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <label class="col-2 col-lg-3"></label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">RUNWAY 3 (PAGI)</label>
                                    <div class="col-lg-3 col-10">

                                        <select class="form-control" aria-label="Default select example"
                                            name="runway3_pagi">
                                            <option value="" selected>Open this select menu</option>
                                            @foreach ($datas->listRw[1]['option'] as $listRw)
                                                <option value="{{ $listRw }}"
                                                    {{ $rw2s[0]->runway3_pagi == $listRw ? 'selected' : '' }}>
                                                    {{ $listRw }}</option>
                                            @endforeach
                                        </select>
                                    
                                    </div>

                                    <label class="col-2 col-lg-3"></label>
                                    
                                </div>
                                <div class="col-12">
                                    <hr class="bg-primary">
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Jam (Sore)</label>
                                    <div class="col-lg-3 col-10">

                                        <input type="time" class="form-control" name="jam_sore"
                                            value="{{ $rw2s[0]->jam_sore }}">
                                    </div>

                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">RUNWAY 2 (SORE)</label>
                                    <div class="col-lg-3 col-10">

                                        <select class="form-control" aria-label="Default select example"
                                            name="runway2_sore">
                                            <option value="" selected>Open this select menu</option>
                                            @foreach ($datas->listRw[0]['option'] as $listRw)
                                                <option value="{{ $listRw }}"
                                                    {{ $rw2s[0]->runway2_sore == $listRw ? 'selected' : '' }}>
                                                    {{ $listRw }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <label class="col-2 col-lg-3"></label>

                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">RUNWAY 3 (SORE)</label>
                                    <div class="col-lg-3 col-10">

                                        <select class="form-control" aria-label="Default select example"
                                            name="runway3_sore">
                                            <option value="" selected>Open this select menu</option>
                                            @foreach ($datas->listRw[1]['option'] as $listRw)
                                                <option value="{{ $listRw }}"
                                                    {{ $rw2s[0]->runway3_sore == $listRw ? 'selected' : '' }}>
                                                    {{ $listRw }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <label class="col-2 col-lg-3"></label>

                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">DI PERIKSA OLEH </label>
                                    <div class="col-lg-3 col-10">

                                        <input type="text" class="form-control" name="oleh" placeholder="{{ $rw2s[0]->oleh ?? ($userTechnical ?? 'User saat ini bukan user technical!') }}"
                                                value="{{ $rw2s[0]->oleh ?? $userTechnical }}" readonly>
                                    </div>

                                    <label class="col-2 col-lg-3"></label>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <form method="POST" action="{{ route('form.sva.checklist1.update', $detailWorkOrderForm->id) }}"
                enctype="multipart/form-data" id="form">
                @method('patch')
                @csrf

                @foreach ($datas->listRw as $listRw)
                    <div class="container-fluid">
                        <div class="accordion" id="accordion{{ $loop->index }}">
                            <div class="card">
                                <div class="card-header" id="accordion{{ $loop->index }}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapse{{ $loop->index }}"
                                            aria-expanded="true" aria-controls="collapse{{ $loop->index }}"
                                            onclick="showHide(this)">
                                            <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                            {{ $listRw['title'] }}
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapse{{ $loop->index }}" class="collapse" aria-labelledby="1"
                                    data-parent="#accordion{{ $loop->index }}">
                                    <div class="container-fluid">
                                        @include('components.form-message')
                                        @foreach ($formNvaChecklist1Harians->filter(function ($formNvaChecklist1Harian) use ($listRw) {
                                                return $formNvaChecklist1Harian->runway == $listRw['title'];
                                         })->values() as $item)
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                                    <label>{{ $loop->index+1 }}. {{ $item['peralatan'] }}
                                                    </label>

                                                </div>
                                                <div class="col-12 col-lg-9">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <span class="d-flex justify-content-center">PAGI
                                                                </span>
                                                                <select
                                                                    class="form-control select2 @error($listRw['name'].'_hasil_pagi.' . $loop->index) is-invalid @enderror"
                                                                    style="width: 100%; height:50px;"
                                                                    name="hasil_pagi[]">
                                                                    <option value="">Choose Or Type
                                                                        Selection
                                                                    </option>
                                                                    @foreach ($datas->rcms[$loop->index]['pagi'] as $pagi)
                                                                        <option value="{{ $pagi }}"
                                                                            {{ $formSvaChecklist1Harians[$loop->index]->pagi ?? old('hasil_pagi.' . $loop->index) ? 'selected' : '' }}>
                                                                            {{ $pagi }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <span class="d-flex justify-content-center">SORE
                                                                </span>
                                                                <select
                                                                    class="form-control select2 @error($listRw['name'].'_hasil_sore.' . $loop->index) is-invalid @enderror"
                                                                    style="width: 100%; height:50px;"
                                                                    name="hasil_sore[]">
                                                                    <option value="">Choose Or Type
                                                                        Selection
                                                                    </option>
                                                                    @foreach ($datas->rcms[$loop->index]['sore']  as $sore)
                                                                        <option value="{{ $sore }}"
                                                                            {{ $formSvaChecklist1Harians[$loop->index]->sore ?? old('hasil_sore.' . $loop->iteration) ? 'selected' : '' }}>
                                                                            {{ $sore }}</option>
                                                                    @endforeach
                                                                </select>
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
                @endforeach
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

        $(document).ready(function() {
            $('.select2').select2({
                tags: true
            });
        });
    </script>
@endsection
