@extends($extends)

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
        <form method="POST" action="{{ route('form.ps1.genset-harian.update', $detailWorkOrderForm->id) }}"
            enctype="multipart/form-data" id="form">
            @method('patch')
            @csrf

            <div class="container-fluid">
                <div class="accordion" id="accordionOne">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                    onclick="showHide(this)">
                                    I. CONTROL DESK
                                    <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="show collapse" aria-labelledby="headingOne"
                            data-parent="#accordionOne">

                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($conrtolDesks as $conrtolDesk)
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <h5>{{ $conrtolDesk->nama_peralatan }}</h5>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Genset 1</label>
                                                        @if ($peralatans[$loop->index]['gs1'] == null)
                                                            <input type="text"
                                                                class="form-control @error('control_desk_gs1.' . $loop->index) is-invalid @enderror"
                                                                id="control_desk_gs1" name="control_desk_gs1[]"
                                                                value="{{ old('control_desk_gs1.' . $loop->index) ?? $conrtolDesk->gs1 }}"
                                                                placeholder="Enter..">
                                                        @else
                                                            <select
                                                                class="form-control @error('control_desk_gs1.' . $loop->index) is-invalid @enderror"
                                                                name="control_desk_gs1[]">
                                                                <option selected value="">Choose Selection</option>
                                                                @foreach ($peralatans[$loop->index]['gs1'] as $key => $itemSelect)
                                                                    <option value='{{ $itemSelect }}'
                                                                        {{ old('control_desk_gs1.' . $key) ?? $conrtolDesk->gs1 == $itemSelect ? 'selected' : '' }}>
                                                                        {{ $itemSelect }}</option>
                                                                @endforeach

                                                            </select>
                                                        @endif
                                                        @error('control_desk_gs1.' . $loop->index)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Genset 2</label>
                                                        @if ($peralatans[$loop->index]['gs2'] == null)
                                                            <input type="text"
                                                                class="form-control @error('control_desk_gs2.' . $loop->index) is-invalid @enderror"
                                                                id="control_desk_gs2" name="control_desk_gs2[]"
                                                                value="{{ old('control_desk_gs2.' . $loop->index) ?? $conrtolDesk->gs2 }}"
                                                                placeholder="Enter..">
                                                        @else
                                                            <select
                                                                class="form-control @error('control_desk_gs2.' . $loop->index) is-invalid @enderror"
                                                                name="control_desk_gs2[]">
                                                                <option selected value="">Choose Selection</option>
                                                                @foreach ($peralatans[$loop->index]['gs2'] as $key => $itemSelect)
                                                                    <option value='{{ $itemSelect }}'
                                                                        {{ old('control_desk_gs2.' . $key) ?? $conrtolDesk->gs2 == $itemSelect ? 'selected' : '' }}>
                                                                        {{ $itemSelect }}</option>
                                                                @endforeach

                                                            </select>
                                                        @endif
                                                        @error('control_desk_gs2.' . $loop->index)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="d-flex justify-content-center">Ketengangan</label>
                                                    <input type="text"
                                                        class="form-control @error('control_desk_keterangan.' . $loop->index) is-invalid @enderror"
                                                        id="control_desk_keterangan" name="control_desk_keterangan[]"
                                                        value="{{ old('control_desk_keterangan.' . $loop->index) ?? $conrtolDesk->keterangan }}"
                                                        placeholder="Enter..">
                                                    </select>
                                                    @error('control_desk_keterangan.' . $loop->index)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="accordion" id="accordionTwo">
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"
                                    onclick="showHide(this)">
                                    II. GENSET
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionTwo">
                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($gensets as $genset)
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <h5>{{ $genset->nama_peralatan }}</h5>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Genset 1</label>
                                                        @if ($peralatans[$loop->index]['gs1'] == null)
                                                            <input type="text"
                                                                class="form-control @error('genset_gs1.' . $loop->index) is-invalid @enderror"
                                                                id="genset_gs1" name="genset_gs1[]"
                                                                value="{{ old('genset_gs1.' . $loop->index) ?? $genset->gs1 }}"
                                                                placeholder="Enter..">
                                                        @else
                                                            <select
                                                                class="form-control @error('genset_gs1.' . $loop->index) is-invalid @enderror"
                                                                name="genset_gs1[]">
                                                                <option selected value="">Choose Selection
                                                                </option>
                                                                @foreach ($peralatans[$loop->index]['gs1'] as $key => $itemSelect)
                                                                    <option value='{{ $itemSelect }}'
                                                                        {{ old('genset_gs1.' . $key) ?? $genset->gs1 == $itemSelect ? 'selected' : '' }}>
                                                                        {{ $itemSelect }}</option>
                                                                @endforeach

                                                            </select>
                                                        @endif
                                                        @error('genset_gs1.' . $loop->index)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Genset 2</label>
                                                        @if ($peralatans[$loop->index]['gs2'] == null)
                                                            <input type="text"
                                                                class="form-control @error('genset_gs2.' . $loop->index) is-invalid @enderror"
                                                                id="genset_gs2" name="genset_gs2[]"
                                                                value="{{ old('genset_gs2.' . $loop->index) ?? $genset->gs2 }}"
                                                                placeholder="Enter..">
                                                        @else
                                                            <select
                                                                class="form-control @error('genset_gs2.' . $loop->index) is-invalid @enderror"
                                                                name="genset_gs2[]">
                                                                <option selected value="">Choose Selection
                                                                </option>
                                                                @foreach ($peralatans[$loop->index]['gs2'] as $key => $itemSelect)
                                                                    <option value='{{ $itemSelect }}'
                                                                        {{ old('genset_gs2.' . $key) ?? $genset->gs2 == $itemSelect ? 'selected' : '' }}>
                                                                        {{ $itemSelect }}</option>
                                                                @endforeach

                                                            </select>
                                                        @endif
                                                        @error('genset_gs2.' . $loop->index)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="d-flex justify-content-center">Ketengangan</label>
                                                    <input type="text"
                                                        class="form-control @error('genset_keterangan.' . $loop->index) is-invalid @enderror"
                                                        id="genset_keterangan" name="genset_keterangan[]"
                                                        value="{{ old('keterangan.' . $loop->index) ?? $genset->keterangan }}"
                                                        placeholder="Enter..">
                                                    </select>
                                                    @error('genset_keterangan.' . $loop->index)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="accordion" id="accordionFive">
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive"
                                    onclick="showHide(this)">
                                    III. GROUND TANK
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                            data-parent="#accordionFive">
                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($groundTanks as $groundTank)
                                    <div class="row">
                                        <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
                                            <h5>{{ $groundTank->nama_peralatan }}</h5>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="d-flex justify-content-center">Kapasitas Liter</label>
                                                    <input type="text"
                                                        class="form-control @error('kapasitas_liter.' . $loop->index) is-invalid @enderror"
                                                        id="kapasitas_liter" name="kapasitas_liter[]"
                                                        value="{{ old('kapasitas_liter.' . $loop->index) ?? $groundTank->kapasitas_liter }}"
                                                        placeholder="Enter..">
                                                    </select>
                                                    @error('kapasitas_liter.' . $loop->index)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
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
                            <div class="card-body">
                                <div class="form-group row">
                                    <label
                                        class="col-12 col-lg-3 control-label d-flex justify-content-center align-items-center">Catatan</label>
                                    <div class="col-12 col-lg-9">

                                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                                            placeholder="Deskripsi">{!! $conrtolDesks[0]->catatan ?? '' !!}</textarea>
                                    </div>
                                </div>
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
            if (child.hasClass('fa-chevron-up')) {
                child.removeClass('fa-chevron-up').addClass('fa-chevron-down');; // logs "This is the child element"
            } else if (child.hasClass('fa-chevron-down')) {
                child.removeClass('fa-chevron-down').addClass('fa-chevron-up'); // logs "This is the child element"
            }
        }
    </script>
@endsection
