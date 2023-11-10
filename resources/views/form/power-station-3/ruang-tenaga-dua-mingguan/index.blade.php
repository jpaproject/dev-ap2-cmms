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
            /* ensure the text is vertically centered */
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
        }
    </style>
@endsection

@section('content')
    <section class="content">
        <form method="POST" action="{{ route('form.ps3.ruang-tenaga-dua-mingguan.update', $detailWorkOrderForm->id) }}"
            enctype="multipart/form-data" id="form">
            @method('patch')
            @csrf

            {{-- 1. PEMERIKSAAN SUHU TRANSFORMATOR AUXALARY(°C) --}}
            <div class="container-fluid">
                <div class="accordion" id="accordionOne">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                    onclick="showHide(this)">
                                    1. PEMERIKSAAN SUHU TRANSFORMATOR AUXALARY(°C)
                                    <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="show collapse" aria-labelledby="headingOne"
                            data-parent="#accordionOne">
                            <div class="card-body">
                                @include('components.form-message')
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center align-items-center">
                                        <h5>TRAFO A</h5>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">N1</label>
                                            <input type="text"
                                                class="form-control @error('trafo_a_n1') is-invalid @enderror"
                                                id="trafo_a_n1" name="trafo_a_n1"
                                                value="{{ $formPs3RuangTenagaSuhuDuaMingguan->trafo_a_n1 ?? '' }}"
                                                placeholder="Enter..">
                                            @error('trafo_a_n1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">N2</label>
                                            <input type="text"
                                                class="form-control @error('trafo_a_n2') is-invalid @enderror"
                                                id="trafo_a_n2" name="trafo_a_n2"
                                                value="{{ $formPs3RuangTenagaSuhuDuaMingguan->trafo_a_n2 ?? '' }}"
                                                placeholder="Enter..">
                                            @error('trafo_a_n2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">N3</label>
                                            <input type="text"
                                                class="form-control @error('trafo_a_n3') is-invalid @enderror"
                                                id="trafo_a_n3" name="trafo_a_n3"
                                                value="{{ $formPs3RuangTenagaSuhuDuaMingguan->trafo_a_n3 ?? '' }}"
                                                placeholder="Enter..">
                                            @error('trafo_a_n3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr class="border-primary">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center align-items-center">
                                        <h5>TRAFO B</h5>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">N1</label>
                                            <input type="text"
                                                class="form-control @error('trafo_b_n1') is-invalid @enderror"
                                                id="trafo_b_n1" name="trafo_b_n1"
                                                value="{{ $formPs3RuangTenagaSuhuDuaMingguan->trafo_b_n1 ?? '' }}"
                                                placeholder="Enter..">
                                            @error('trafo_b_n1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">N2</label>
                                            <input type="text"
                                                class="form-control @error('trafo_b_n2') is-invalid @enderror"
                                                id="trafo_b_n2" name="trafo_b_n2"
                                                value="{{ $formPs3RuangTenagaSuhuDuaMingguan->trafo_b_n2 ?? '' }}"
                                                placeholder="Enter..">
                                            @error('trafo_b_n2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="d-flex justify-content-center">N3</label>
                                            <input type="text"
                                                class="form-control @error('trafo_b_n3') is-invalid @enderror"
                                                id="trafo_b_n3" name="trafo_b_n3"
                                                value="{{ $formPs3RuangTenagaSuhuDuaMingguan->trafo_b_n3 ?? '' }}"
                                                placeholder="Enter..">
                                            @error('trafo_b_n3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2. PEMERIKSAAN TEGANGAN,FREKUENSI POWER FAKTOR DAN ARUS --}}
            <div class="container-fluid">
                <div class="accordion" id="accordionTwo">
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"
                                    onclick="showHide(this)">
                                    2. PEMERIKSAAN TEGANGAN,FREKUENSI POWER FAKTOR DAN ARUS
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionTwo">
                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($formPs3RuangTenagaTeganganDuaMingguans as $key => $value)
                                    @php
                                        $count = $key + 1;
                                    @endphp
                                    <div class="row">
                                        <div
                                            class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                            <span>{{ $value->panel }}</span>
                                        </div>
                                        <div class="col-12 col-lg-9">
                                            <div class="row">
                                                <label class="col-12 d-flex justify-content-center">V</label>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>L1</label>
                                                        <input type="text"
                                                            class="form-control @error('v_l1.' . $key) is-invalid @enderror"
                                                            id="v_l1[]" name="v_l1[]"
                                                            value="{{ old('v_l1.' . $key) ?? $value->v_l1 }}"
                                                            placeholder="L1">

                                                        @error('v_l1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>L2</label>
                                                        <input type="text"
                                                            class="form-control @error('v_l2.' . $key) is-invalid @enderror"
                                                            id="v_l2[]" name="v_l2[]"
                                                            value="{{ old('v_l2.' . $key) ?? $value->v_l2 }}"
                                                            placeholder="L2">

                                                        @error('v_l2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>L3</label>
                                                        <input type="text"
                                                            class="form-control @error('v_l3.' . $key) is-invalid @enderror"
                                                            id="v_l3[]" name="v_l3[]"
                                                            value="{{ old('v_l3.' . $key) ?? $value->v_l3 }}"
                                                            placeholder="L3">

                                                        @error('v_l3.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <label class="col-12 d-flex justify-content-center">A</label>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>L1</label>
                                                        <input type="text"
                                                            class="form-control @error('a_l1.' . $key) is-invalid @enderror"
                                                            id="a_l1[]" name="a_l1[]"
                                                            value="{{ old('a_l1.' . $key) ?? $value->a_l1 }}"
                                                            placeholder="L1">

                                                        @error('a_l1.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>L2</label>
                                                        <input type="text"
                                                            class="form-control @error('a_l2.' . $key) is-invalid @enderror"
                                                            id="a_l2[]" name="a_l2[]"
                                                            value="{{ old('a_l2.' . $key) ?? $value->a_l2 }}"
                                                            placeholder="L2">

                                                        @error('a_l2.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>L3</label>
                                                        <input type="text"
                                                            class="form-control @error('a_l3.' . $key) is-invalid @enderror"
                                                            id="a_l3[]" name="a_l3[]"
                                                            value="{{ old('a_l3.' . $key) ?? $value->a_l3 }}"
                                                            placeholder="L3">

                                                        @error('a_l3.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>HZ</label>
                                                        <input type="text"
                                                            class="form-control @error('hz.' . $key) is-invalid @enderror"
                                                            id="hz[]" name="hz[]"
                                                            value="{{ old('hz.' . $key) ?? $value->hz }}"
                                                            placeholder="HZ">

                                                        @error('hz.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>PF</label>
                                                        <input type="text"
                                                            class="form-control @error('pf.' . $key) is-invalid @enderror"
                                                            id="pf[]" name="pf[]"
                                                            value="{{ old('pf.' . $key) ?? $value->pf }}"
                                                            placeholder="PF">

                                                        @error('pf.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>SF-6</label>
                                                        <input type="text"
                                                            class="form-control @error('sf_6.' . $key) is-invalid @enderror"
                                                            id="sf_6[]" name="sf_6[]"
                                                            value="{{ old('sf_6.' . $key) ?? $value->sf_6 }}"
                                                            placeholder="PF">

                                                        @error('sf_6.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
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
                                            placeholder="Deskripsi">{!! $formPs3RuangTenagaSuhuDuaMingguan->catatan ?? '' !!}</textarea>
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
            if (child.hasClass('fa-chevron-up')) {
                child.removeClass('fa-chevron-up').addClass('fa-chevron-down');; // logs "This is the child element"
            } else if (child.hasClass('fa-chevron-down')) {
                child.removeClass('fa-chevron-down').addClass('fa-chevron-up'); // logs "This is the child element"
            }
        }

        $(document).ready(function() {
            $('.select2').select2({
                tags: true
            });
        });
    </script>
@endsection
