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

        .select2-container--default .select2-selection--single {
            height: 40px;
            /* adjust the height value as needed */
            line-height: 40px;
            /* ensure the text is vertically centered */
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
                        
                            action="{{ route('form.ps1.form-genset-standby-gardu-teknik-tahunan.update', $detailWorkOrderForm->id) }}"
                            enctype="multipart/form-data" id="form">
                            @method('patch')
                            @csrf

                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($gensetStandbyGarduTeknikTahunans as $key => $gensetStandbyGarduTeknikTahunan)
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <div class="form-group">
                                                <label class="d-flex justify-content-center">Data Teknis</label>
                                                <input type="text" class="form-control @error('data_teknis.' . $key) is-invalid @enderror" id="data_teknis" name="data_teknis[]" value="{{  $gensetStandbyGarduTeknikTahunan->data_teknis ?? '' }}" placeholder="Enter.." disabled>
                                                @error('data_teknis.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="form-group">
                                                <label class="d-flex justify-content-center">Satuan</label>
                                                @if (is_array($datas[$key]['satuan']))
                                                    <select class="form-control select2 @error('satuan') is-invalid @enderror"
                                                        name="satuan[]">
                                                        <option value="" selected>Choose Selection</option>
                                                        @foreach ($datas[$key]['satuan'] as $satuan)
                                                        <option value="{{ $satuan }}" @if((old('satuan.'.$key) ?? $gensetStandbyGarduTeknikTahunan->satuan) == $satuan) selected @endif>{{ $satuan }}</option>
                                                        @endforeach
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
                                                    value="{{ $gensetStandbyGarduTeknikTahunan->keterangan ?? '' }}"
                                                    placeholder="Enter..">
                                                </select>
                                                @error('keterangan.' . $key)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
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
                                                            placeholder="Deskripsi">{!! $formPs1GensetStandbyTahunans[0]->catatan ?? '' !!}</textarea>
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