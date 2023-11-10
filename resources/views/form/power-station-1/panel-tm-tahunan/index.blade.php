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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                        </div>

                        <form method="POST"
                            action="{{ route('form.ps1.panel-tm-tahunan.update', $detailWorkOrderForm->id) }}"
                            enctype="multipart/form-data" id="form">
                            @method('patch')
                            @csrf

                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($formPs1PanelTmTahunans as $key => $formPs1PanelTmTahunan)
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <div class="form-group">
                                                <label class="d-flex justify-content-center">Data Teknis</label>
                                                <input type="text"
                                                    class="form-control @error('data_teknis.' . $key) is-invalid @enderror"
                                                    id="data_teknis" name="data_teknis[]"
                                                    value="{{ $formPs1PanelTmTahunan->data_teknis ?? '' }}"
                                                    placeholder="Enter.." disabled>
                                                @error('data_teknis.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- LOOPING R S T --}}
                                        @if ($key < 3)
                                            <input type="hidden" name="q1[]" value="">
                                            <div class="col-4 col-lg-3">
                                                <div class="form-group">
                                                    <label class="d-flex justify-content-center">R</label>
                                                    <input type="text"
                                                        class="form-control @error('r.' . $key) is-invalid @enderror"
                                                        id="r" name="r[]"
                                                        value="{{ old('r.' . $key) ?? $formPs1PanelTmTahunan->r }}"
                                                        placeholder="Enter..">
                                                    @error('r.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-4 col-lg-3">
                                                <div class="form-group">
                                                    <label class="d-flex justify-content-center">S</label>
                                                    <input type="text"
                                                        class="form-control @error('s.' . $key) is-invalid @enderror"
                                                        id="s" name="s[]"
                                                        value="{{ old('s.' . $key) ?? $formPs1PanelTmTahunan->s }}"
                                                        placeholder="Enter..">
                                                    @error('s.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4 col-lg-3">
                                                <div class="form-group">
                                                    <label class="d-flex justify-content-center">T</label>
                                                    <input type="text"
                                                        class="form-control @error('t .' . $key) is-invalid @enderror"
                                                        id="t" name="t[]"
                                                        value="{{ old('t.' . $key) ?? $formPs1PanelTmTahunan->t }}"
                                                        placeholder="Enter..">
                                                    @error('t.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-6 col-lg-9">
                                                <div class="form-group">
                                                    <label class="d-flex justify-content-center">RST</label>
                                                    <input type="text"
                                                        class="form-control @error('q1.' . $key) is-invalid @enderror"
                                                        id="q1" name="q1[]"
                                                        value="{{ old('q1.' . $key) ?? $formPs1PanelTmTahunan->q1 }}"
                                                        placeholder="Enter..">
                                                    @error('q1.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <input type="hidden" name="r[]" value="">
                                            <input type="hidden" name="s[]" value="">
                                            <input type="hidden" name="t[]" value="">
                                        @endif
                                        <div class="col-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="d-flex justify-content-center">Satuan</label>
                                                @if ($key == 0 || $key == 5 || $key == 6 || $key == 7 || $key == 8 || $key == 18 || $key == 19 || $key == 20)
                                                    <select class="form-control @error('satuan') is-invalid @enderror"
                                                        name="satuan[]">
                                                        <option value=" " selected>Choose Selection
                                                        </option>
                                                        @if ($key == 0)
                                                            <option value="normal"
                                                                {{ (old('satuan.' . $key) ?? $formPs1PanelTmTahunan->satuan) == 'normal' ? 'selected' : '' }}>
                                                                Normal</option>
                                                            <option value="rusak"
                                                                {{ (old('satuan.' . $key) ?? $formPs1PanelTmTahunan->satuan) == 'rusak' ? 'selected' : '' }}>
                                                                Rusak</option>
                                                        @endif
                                                        @if ($key == 5)
                                                            <option value="hijau"
                                                                {{ (old('satuan.' . $key) ?? $formPs1PanelTmTahunan->satuan) == 'hijau' ? 'selected' : '' }}>
                                                                Hijau</option>
                                                            <option value="merah"
                                                                {{ (old('satuan.' . $key) ?? $formPs1PanelTmTahunan->satuan) == 'merah' ? 'selected' : '' }}>
                                                                Merah</option>
                                                        @endif
                                                        @if ($key == 6)
                                                            <option value="open"
                                                                {{ (old('satuan.' . $key) ?? $formPs1PanelTmTahunan->satuan) == 'open' ? 'selected' : '' }}>
                                                                Open</option>
                                                            <option value="close"
                                                                {{ (old('satuan.' . $key) ?? $formPs1PanelTmTahunan->satuan) == 'close' ? 'selected' : '' }}>
                                                                Close</option>
                                                        @endif
                                                        @if ($key == 7)
                                                            <option value="charge"
                                                                {{ (old('satuan.' . $key) ?? $formPs1PanelTmTahunan->satuan) == 'charge' ? 'selected' : '' }}>
                                                                Charge</option>
                                                            <option value="discharge"
                                                                {{ (old('satuan.' . $key) ?? $formPs1PanelTmTahunan->satuan) == 'discharge' ? 'selected' : '' }}>
                                                                Discharge</option>
                                                        @endif
                                                        @if ($key == 8 || $key == 18 || $key == 19)
                                                            <option value="normal"
                                                                {{ (old('satuan.' . $key) ?? $formPs1PanelTmTahunan->satuan) == 'normal' ? 'selected' : '' }}>
                                                                Normal</option>
                                                            <option value="error"
                                                                {{ (old('satuan.' . $key) ?? $formPs1PanelTmTahunan->satuan) == 'error' ? 'selected' : '' }}>
                                                                Error</option>
                                                        @endif
                                                        @if ($key == 20)
                                                            <option value="mega"
                                                                {{ (old('satuan.' . $key) ?? $formPs1PanelTmTahunan->satuan) == 'mega' ? 'selected' : '' }}>
                                                                Mega</option>
                                                            <option value="giga_ohm"
                                                                {{ (old('satuan.' . $key) ?? $formPs1PanelTmTahunan->satuan) == 'giga_ohm' ? 'selected' : '' }}>
                                                                Giga Ohm</option>
                                                        @endif
                                                    </select>
                                                @else
                                                    <input type="text"
                                                        class="form-control @error('satuan.' . $key) is-invalid @enderror"
                                                        id="satuan" name="satuan[]"
                                                        value="{{ old('satuan.' . $key) ?? $datas[$key]['satuan'] }}"
                                                        readonly placeholder="Enter.." readonly>
                                                @endif
                                                @error('satuan.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label class="d-flex justify-content-center">Keterangan</label>
                                                <input type="text"
                                                    class="form-control @error('keterangan.' . $key) is-invalid @enderror"
                                                    id="keterangan" name="keterangan[]"
                                                    value="{{ $formPs1PanelTmTahunan->keterangan ?? '' }}"
                                                    placeholder="Enter..">
                                                @error('keterangan.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="border-primary">
                                @endforeach
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
                                                            placeholder="Deskripsi">{!! $formPs1PanelTmTahunans[0]->catatan ?? '' !!}</textarea>
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
            if (child.hasClass('fa-minus')) {
                child.removeClass('fa-minus').addClass('fa-plus');; // logs "This is the child element"
            } else if (child.hasClass('fa-plus')) {
                child.removeClass('fa-plus').addClass('fa-minus'); // logs "This is the child element"
            }
        }
    </script>
@endsection
