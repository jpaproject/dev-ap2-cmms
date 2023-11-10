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
                            action="{{ route('form.ps1.test-onload-genset.update', $detailWorkOrderForm->id) }}"
                            enctype="multipart/form-data" id="form">
                            @method('patch')
                            @csrf

                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($formPs1TestOnloadUraianHarians as $key => $formPs1TestOnloadUraianHarian)
                                    <div class="row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <h5>{{ $uraianGensets[$key]['name'] }}</h5>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row">
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Tegangan (volt)</label>
                                                        <input type="text"
                                                            class="form-control @error('tegangan.' . $key) is-invalid @enderror"
                                                            id="tegangan" name="tegangan[]"
                                                            value="{{ $formPs1TestOnloadUraianHarian->tegangan ?? '' }}"
                                                            placeholder="Enter..">
                                                        @error('tegangan.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Arus (A)</label>
                                                        <input type="text"
                                                            class="form-control @error('arus.' . $key) is-invalid @enderror"
                                                            id="arus" name="arus[]"
                                                            value="{{ $formPs1TestOnloadUraianHarian->arus ?? '' }}"
                                                            placeholder="Enter..">
                                                        </select>
                                                        @error('arus.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Freq (Hz)</label>
                                                        <input type="text"
                                                            class="form-control @error('freq.' . $key) is-invalid @enderror"
                                                            id="freq" name="freq[]"
                                                            value="{{ $formPs1TestOnloadUraianHarian->freq ?? '' }}"
                                                            placeholder="Enter..">
                                                        </select>
                                                        @error('freq.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Waktu (ontime)</label>
                                                        <input type="text"
                                                            class="form-control @error('waktu.' . $key) is-invalid @enderror"
                                                            id="waktu" name="waktu[]"
                                                            value="{{ $formPs1TestOnloadUraianHarian->waktu ?? '' }}"
                                                            placeholder="Enter..">
                                                        </select>
                                                        @error('waktu.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">Keterangan</label>
                                                        <input type="text"
                                                            class="form-control @error('keterangan.' . $key) is-invalid @enderror"
                                                            id="keterangan" name="keterangan[]"
                                                            value="{{ $formPs1TestOnloadUraianHarian->keterangan ?? '' }}"
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
                                        </div>
                                    </div>
                                @endforeach
                                <hr class="border-primary">
                                <div class="form-group row">
                                    <div class="col-12 col-lg-6 d-flex justify-content-start align-items-center">
                                        <h5>Jeda waktu PLN Off sampai Genset Onload (SECOND) :</h5>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <input type="text" class="form-control @error('q1') is-invalid @enderror"
                                            id="q1" name="q1" value="{{ $formPs1TestOnloadGenset->q1 ?? '' }}"
                                            placeholder="Enter..">
                                        @error('q1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-lg-6 d-flex justify-content-start align-items-center">
                                        <h5>Jeda waktu Gs Off sampai PLN Onload / Recovery (SECOND) :</h5>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <input type="text" class="form-control @error('q2') is-invalid @enderror"
                                            id="q2" name="q2" value="{{ $formPs1TestOnloadGenset->q2 ?? '' }}"
                                            placeholder="Enter..">
                                        @error('q2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-lg-6 d-flex justify-content-start align-items-center">
                                        <h5>Level Bahan Bakar Mesin awal (Liter) :</h5>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <input type="text" class="form-control @error('q3') is-invalid @enderror"
                                            id="q3" name="q3"
                                            value="{{ $formPs1TestOnloadGenset->q3 ?? '' }}" placeholder="Enter..">
                                        @error('q3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-lg-6 d-flex justify-content-start align-items-center">
                                        <h5>Level Bahan Bakar Mesin setelah onload (Liter) :</h5>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <input type="text" class="form-control @error('q4') is-invalid @enderror"
                                            id="q4" name="q4"
                                            value="{{ $formPs1TestOnloadGenset->q4 ?? '' }}" placeholder="Enter..">
                                        @error('q4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <hr class="border-primary">
                                @foreach ($parameterGensets as $parameterGenset)
                                    <div class="form-group row">
                                        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                            <h5>{{ $parameterGenset['name'] }} :</h5>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row">
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">10'</label>
                                                        <input type="text"
                                                            class="form-control @error('waktu10.' . $key) is-invalid @enderror"
                                                            id="waktu10" name="waktu10[]"
                                                            value="{{ $formPs1TestOnloadParameterGensets[$key]->waktu10 ?? '' }}"
                                                            placeholder="Enter..">
                                                        @error('waktu10.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">20'</label>
                                                        <input type="text"
                                                            class="form-control @error('waktu20.' . $key) is-invalid @enderror"
                                                            id="waktu20" name="waktu20[]"
                                                            value="{{ $formPs1TestOnloadParameterGensets[$key]->waktu20 ?? '' }}"
                                                            placeholder="Enter..">
                                                        @error('waktu20.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">30'</label>
                                                        <input type="text"
                                                            class="form-control @error('waktu30.' . $key) is-invalid @enderror"
                                                            id="waktu30" name="waktu30[]"
                                                            value="{{ $formPs1TestOnloadParameterGensets[$key]->waktu30 ?? '' }}"
                                                            placeholder="Enter..">
                                                        @error('waktu30.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">40'</label>
                                                        <input type="text"
                                                            class="form-control @error('waktu40.' . $key) is-invalid @enderror"
                                                            id="waktu40" name="waktu40[]"
                                                            value="{{ $formPs1TestOnloadParameterGensets[$key]->waktu40 ?? '' }}"
                                                            placeholder="Enter..">
                                                        @error('waktu40.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">50'</label>
                                                        <input type="text"
                                                            class="form-control @error('waktu50.' . $key) is-invalid @enderror"
                                                            id="waktu50" name="waktu50[]"
                                                            value="{{ $formPs1TestOnloadParameterGensets[$key]->waktu50 ?? '' }}"
                                                            placeholder="Enter..">
                                                        @error('waktu50.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">60'</label>
                                                        <input type="text"
                                                            class="form-control @error('waktu60.' . $key) is-invalid @enderror"
                                                            id="waktu60" name="waktu60[]"
                                                            value="{{ $formPs1TestOnloadParameterGensets[$key]->waktu60 ?? '' }}"
                                                            placeholder="Enter..">
                                                        @error('waktu60.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">70'</label>
                                                        <input type="text"
                                                            class="form-control @error('waktu70.' . $key) is-invalid @enderror"
                                                            id="waktu70" name="waktu70[]"
                                                            value="{{ $formPs1TestOnloadParameterGensets[$key]->waktu70 ?? '' }}"
                                                            placeholder="Enter..">
                                                        @error('waktu70.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">80'</label>
                                                        <input type="text"
                                                            class="form-control @error('waktu80.' . $key) is-invalid @enderror"
                                                            id="waktu80" name="waktu80[]"
                                                            value="{{ $formPs1TestOnloadParameterGensets[$key]->waktu80 ?? '' }}"
                                                            placeholder="Enter..">
                                                        @error('waktu80.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">90'</label>
                                                        <input type="text"
                                                            class="form-control @error('waktu90.' . $key) is-invalid @enderror"
                                                            id="waktu90" name="waktu90[]"
                                                            value="{{ $formPs1TestOnloadParameterGensets[$key]->waktu90 ?? '' }}"
                                                            placeholder="Enter..">
                                                        @error('waktu90.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">100'</label>
                                                        <input type="text"
                                                            class="form-control @error('waktu100.' . $key) is-invalid @enderror"
                                                            id="waktu100" name="waktu100[]"
                                                            value="{{ $formPs1TestOnloadParameterGensets[$key]->waktu100 ?? '' }}"
                                                            placeholder="Enter..">
                                                        @error('waktu100.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">110'</label>
                                                        <input type="text"
                                                            class="form-control @error('waktu110.' . $key) is-invalid @enderror"
                                                            id="waktu110" name="waktu110[]"
                                                            value="{{ $formPs1TestOnloadParameterGensets[$key]->waktu110 ?? '' }}"
                                                            placeholder="Enter..">
                                                        @error('waktu110.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">120'</label>
                                                        <input type="text"
                                                            class="form-control @error('waktu120.' . $key) is-invalid @enderror"
                                                            id="waktu120" name="waktu120[]"
                                                            value="{{ $formPs1TestOnloadParameterGensets[$key]->waktu120 ?? '' }}"
                                                            placeholder="Enter..">
                                                        @error('waktu120.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label class="d-flex justify-content-center">DST'</label>
                                                        <input type="text"
                                                            class="form-control @error('waktuDST.' . $key) is-invalid @enderror"
                                                            id="waktuDST" name="waktuDST[]"
                                                            value="{{ $formPs1TestOnloadParameterGensets[$key]->waktudst ?? '' }}"
                                                            placeholder="Enter..">
                                                        @error('waktuDST.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
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
                                                            placeholder="Deskripsi">{!! $formPs1TestOnloadGenset->catatan ?? '' !!}</textarea>
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
