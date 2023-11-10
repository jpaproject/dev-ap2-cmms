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
    </style>
@endsection

@section('content')
    <section class="content">

        <form method="POST" action="{{ route('form.apm.elektrikal-vehicle-exterior-jp-tiga-bulanan.update', $detailWorkOrderForm) }}"
            enctype="multipart/form-data" id="form">
            @csrf
            @method('patch')
            @if ($formApmElektrikalVehicleExteriorJPTigaBulanans->isNotEmpty())

            {{-- A --}}
                <div class="container-fluid">
                    <div class="accordion" id="accordionSeat1">
                        <div class="card">
                            <div class="card-header" id="Seat1">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseSeat1" aria-expanded="true" aria-controls="collapseSeat1"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        JUMPER PLUG HJB MC 1 to HJB MC 2
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeat1" class="show collapse" aria-labelledby="1" data-parent="#accordionSeat1">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($formApmElektrikalVehicleExteriorJPTigaBulanans as $key => $formApmElektrikalVehicleExteriorJPTigaBulanan)
                                        @if ($formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp_group == 'JUMPER PLUG HJB MC 1 to HJB MC 2')
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                                    <h5>{{ $loop->iteration }}
                                                        {{ $formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp }}</h5>
                                                </div>
                                                <div class="col-12 col-lg-9">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">750 Vdc</label>
                                                                    <select class="form-control  @error('hasil_mc1.' . $key) is-invalid @enderror"
                                                                    name="hasil_mc1[]">
                                                                    <option selected value="">Choose Selection</option>
                                                                    <option value="ok"
                                                                        {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleExteriorJPTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                        Ok</option>
                                                                    <option value="nok"
                                                                        {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleExteriorJPTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
                                                                        Nok</option>
                                                                </select>

                                                                @error('hasil_mc1.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">380 Vac</label>
                                                                    <select class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                                    name="hasil_mc2[]">
                                                                    <option selected value="">Choose Selection</option>
                                                                    <option value="ok"
                                                                        {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleExteriorJPTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                        Ok</option>
                                                                    <option value="nok"
                                                                        {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleExteriorJPTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                        Nok</option>
                                                                </select>

                                                                @error('hasil_mc2.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="d-flex justify-content-center">Referensi</label>
                                                            <textarea name="referensi[]" class="form-control @error('referensi.'.$key) is-invalid @enderror"
                                                                id="referensi" placeholder="Referensi">{!! $formApmElektrikalVehicleExteriorJPTigaBulanan->referensi !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            {{-- B --}}
            <div class="container-fluid">
                    <div class="accordion" id="accordionSeat2">
                        <div class="card">
                            <div class="card-header" id="Seat2">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseSeat2" aria-expanded="true" aria-controls="collapseSeat2"
                                        onclick="showHide(this)">
                                        <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                        JUMPER PLUG LJB MC 1 to LJB MC 2
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseSeat2" class="show collapse" aria-labelledby="1" data-parent="#accordionSeat2">
                                <div class="card-body">
                                    @include('components.form-message')
                                    @foreach ($formApmElektrikalVehicleExteriorJPTigaBulanans as $key => $formApmElektrikalVehicleExteriorJPTigaBulanan)
                                        @if ($formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp_group == 'JUMPER PLUG LJB MC 1 to LJB MC 2')
                                        <input type="hidden" name="hasil_mc2[]" value="">
                                            <div class="row">
                                                <div
                                                    class="col-12 col-lg-3 d-flex justify-content-center align-items-center">
                                                    <h5>{{ $loop->iteration - 5 }}
                                                        {{ $formApmElektrikalVehicleExteriorJPTigaBulanan->pemeriksaan_jp }}</h5>
                                                </div>
                                                <div class="col-12 col-lg-9">
                                                    <div class="row">
                                                        <span
                                                            class="col-12 d-flex justify-content-center fw-bolder">HASIL</span>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                    <select class="form-control  @error('hasil_mc1.' . $key) is-invalid @enderror"
                                                                    name="hasil_mc1[]">
                                                                    <option selected value="">Choose Selection</option>
                                                                    <option value="ok"
                                                                        {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleExteriorJPTigaBulanan->hasil_mc1 == 'ok' ? 'selected' : '' }}>
                                                                        Ok</option>
                                                                    <option value="nok"
                                                                        {{ old('hasil_mc1.' . $key) ?? $formApmElektrikalVehicleExteriorJPTigaBulanan->hasil_mc1 == 'nok' ? 'selected' : '' }}>
                                                                        Nok</option>
                                                                </select>

                                                                @error('hasil_mc1.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        {{-- <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="d-flex justify-content-center">380 Vac</label>
                                                                    <select class="form-control  @error('hasil_mc2.' . $key) is-invalid @enderror"
                                                                    name="hasil_mc2[]">
                                                                    <option selected value="">Choose Selection</option>
                                                                    <option value="ok"
                                                                        {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleExteriorJPTigaBulanan->hasil_mc2 == 'ok' ? 'selected' : '' }}>
                                                                        Ok</option>
                                                                    <option value="nok"
                                                                        {{ old('hasil_mc2.' . $key) ?? $formApmElektrikalVehicleExteriorJPTigaBulanan->hasil_mc2 == 'nok' ? 'selected' : '' }}>
                                                                        Nok</option>
                                                                </select>

                                                                @error('hasil_mc2.' . $key)
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="d-flex justify-content-center">Referensi</label>
                                                            <textarea name="referensi[]" class="form-control @error('referensi.'.$key) is-invalid @enderror"
                                                                id="referensi" placeholder="Referensi">{!! $formApmElektrikalVehicleExteriorJPTigaBulanan->referensi !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label
                                        class="col-12 col-lg-3 control-label d-flex justify-content-center align-items-center">Catatan</label>
                                    <div class="col-12 col-lg-9">

                                        <textarea name="catatan" class="form-control @error('catatan.'.$key) is-invalid @enderror"
                                            id="catatan" placeholder="Deskripsi"></textarea>
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
    </script>
@endsection
