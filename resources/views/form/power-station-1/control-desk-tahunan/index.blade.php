@extends($extends)

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
        <form method="POST" action="{{ route('form.ps1.control-desk-tahunan.update', $detailWorkOrderForm->id) }}"
            id="form">
            @method('patch')
            @csrf

            <div class="container-fluid">
                <div class="accordion" id="accordionExample3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title" style="text-align: right;">
                                        <button class="btn btn-link btn-block text-left text-white" type="button"
                                            data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
                                            aria-controls="collapseThree" onclick="showHide(this)">
                                            <i class="fas fa-chevron-down" id="accordion"></i> DATA TEST RUNNING GENSET MPS
                                            2 NO. 1 DAN 2 ( PERKINS 2000 KVA )
                                        </button>
                                    </h3>
                                </div>
                            </div>
                            <div id="collapseThree" class="show collapse" aria-labelledby="headingOne"
                                data-parent="#accordionExample3">

                                <div class="card card-body">
                                    @foreach ($formPs1ControlDeskTahunans as $key => $item)
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="">{{ $loop->iteration }}. {{ $item->pertanyaan }}
                                                    @if ($satuan[$key] != '')
                                                        <span class="text-muted"> ({{ $satuan[$key] }}) </span>
                                                    @endif
                                                </label>
                                                <div class="row">

                                                    @if (!in_array($item->pertanyaan, ['Tangki BBM/Harian', 'Level Oli Mesin', 'Level Air Radiator']))
                                                        <div class="col-12 col-md-6 col-lg-6">
                                                            <label for="PLC1">GS. MPS 2 NO. 1</label>
                                                            <input type="text"
                                                                class="form-control @error('q1[]') is-invalid @enderror"
                                                                id="q1[]" name="q1[]" value="{{ $item->q1 }}"
                                                                placeholder="Enter ...">
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6">
                                                            <label for="PLC2">GS. MPS 2 NO. 2</label>
                                                            <input type="text"
                                                                class="form-control @error('q2') is-invalid @enderror"
                                                                id="q2[]" name="q2[]"
                                                                value="{{ old('q2.' . $key) ?? $item->q2 }}"
                                                                placeholder="Enter ...">
                                                        </div>
                                                    @else
                                                        <div class="col-12 col-md-6 col-lg-6">
                                                            <label for="PLC1">GS. MPS 2 NO. 1</label>
                                                            <select class="form-control" aria-label="Default select example"
                                                                name="q1[]">
                                                                <option value="" selected>Open this select menu
                                                                </option>
                                                                <option value="low"
                                                                    {{ old('q1' . $key) ?? $item->q1 == 'low' ? 'selected' : '' }}>
                                                                    Low</option>
                                                                <option value="med"
                                                                    {{ old('q1' . $key) ?? $item->q1 == 'med' ? 'selected' : '' }}>
                                                                    Med</option>
                                                                <option value="max"
                                                                    {{ old('q1' . $key) ?? $item->q1 == 'max' ? 'selected' : '' }}>
                                                                    Max</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6">
                                                            <label for="PLC2">GS. MPS 2 NO. 2</label>
                                                            <select class="form-control" aria-label="Default select example"
                                                                name="q2[]">
                                                                <option value="" selected>Open this select menu
                                                                </option>
                                                                <option value="low"
                                                                    {{ old('q2' . $key) ?? $item->q2 == 'low' ? 'selected' : '' }}>
                                                                    Low</option>
                                                                <option value="med"
                                                                    {{ old('q2' . $key) ?? $item->q2 == 'med' ? 'selected' : '' }}>
                                                                    Med</option>
                                                                <option value="max"
                                                                    {{ old('q2' . $key) ?? $item->q2 == 'max' ? 'selected' : '' }}>
                                                                    Max</option>
                                                            </select>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="border-primary">
                                    @endforeach
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
                            <div class="card-body">
                                <div class="form-group row">
                                    <label
                                        class="col-12 col-lg-3 control-label d-flex justify-content-center align-items-center">Catatan</label>
                                    <div class="col-12 col-lg-9">

                                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                                            placeholder="Deskripsi">{{ old('catatan') ?? $formPs1ControlDeskTahunans[0]->catatan }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <textarea name="scada" class="form-control @error('scada') is-invalid @enderror" id="scada"
            cols="30" rows="3" placeholder="Enter Catatan">Catatan:</textarea> --}}

            <div class="container-fluid">
                <div class="row">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-footer">Add</button>
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
            if (child.hasClass('fa-chevron-down')) {
                child.removeClass('fa-chevron-down').addClass('fa-chevron-up');; // logs "This is the child element"
            } else if (child.hasClass('fa-chevron-up')) {
                child.removeClass('fa-chevron-up').addClass('fa-chevron-down'); // logs "This is the child element"
            }
        }
    </script>
@endsection
