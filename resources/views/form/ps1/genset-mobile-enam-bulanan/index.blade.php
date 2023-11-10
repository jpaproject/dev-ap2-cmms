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
        <form method="POST" action="{{ route('form.ps1.genset-mobile-enam-bulanan.update', $detailWorkOrderForm->id)  }}" enctype="multipart/form-data"
            id="form">
            @method('patch')
            @csrf
        {{-- <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="text-align: right;">Mobilisasi Genset dari Gedung MPS ke Lokasi Pekerjaan</h3>
                        </div>
                        <div class="card-body">

                            @include('components.form-message')

                            <div class="row">

                            <div class="form-group row col-12 col-lg-6">
                                <label class="col-9 col-lg-9">1. Koordinasi dengan unit terkait {{  $formPs1GensetMobile->q1 }}</label>
                                <div class="col-lg-3 col-3">
                                    <input type="checkbox" class="flat largerCheckbox" name="q1" {{  old('q1') ?? $formPs1GensetMobile->q1 == 'on' ? 'checked' : ''  }}>
                                </div>

                                <label class="col-9 col-lg-9">2. Siapkan peralatan kerja dan k3</label>
                                <div class="col-lg-3 col-3">
                                    <input type="checkbox" class="flat largerCheckbox" name="q2" {{  old('q2') ?? $formPs1GensetMobile->q2 == 'on' ? 'checked' : ''  }}>
                                </div>

                                <label class="col-9 col-lg-9">3. Mobilisasi Genset Mobile ke tempat tujuan </label>
                                <div class="col-lg-3 col-3">
                                    <input type="checkbox" class="flat largerCheckbox" name="q3" {{  old('q3') ?? $formPs1GensetMobile->q3 == 'on' ? 'checked' : ''  }}>
                                </div>

                                <label class="col-9 col-lg-9">4. Penggelaran kabel power</label>
                                <div class="col-lg-3 col-3">
                                    <input type="checkbox" class="flat largerCheckbox" name="q4" {{  old('q4') ?? $formPs1GensetMobile->q4 == 'on' ? 'checked' : ''  }}>
                                </div>
                            </div>

                            <div class="form-group row col-12 col-lg-6">
                                <label class="col-9 col-lg-9">5. Melakukan terminasi kabel power dari panel junction / MCCB outgoing genset ke panel beban</label>
                                <div class="col-lg-3 col-3">
                                    <input type="checkbox" class="flat largerCheckbox" name="q5" {{  old('q5') ?? $formPs1GensetMobile->q5 == 'on' ? 'checked' : ''  }}>
                                </div>

                                <label class="col-9 col-lg-9">6. Running test genset no load</label>
                                <div class="col-lg-3 col-3">
                                    <input type="checkbox" class="flat largerCheckbox" name="q6" {{  old('q6') ?? $formPs1GensetMobile->q6 == 'on' ? 'checked' : ''  }}>
                                </div>

                                <label class="col-9 col-lg-9">7. Kegiatan selesai</label>
                                <div class="col-lg-3 col-3">
                                    <input type="checkbox" class="flat largerCheckbox" name="q7" {{  old('q7') ?? $formPs1GensetMobile->q7 == 'on' ? 'checked' : ''  }}>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="text-align: right;">Data teknis perawatan 2 Mingguan</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-lg-1 col-1">Gs</label>
                            <div class="col-lg-2 col-8">
                                {{-- 8, 60,100,430,500,1000  --}}
                                <select
                                    class="form-control select2 @error('q3.' . 32) is-invalid @enderror"
                                    style="width: 100%; height:50px;" name="tipe">
                                    <option value="">Choose Or Type Selection</option>
                                    <option value="8"
                                        {{ old('tipe.' . 0) ?? $formPs1GensetMobileEnamBulanans[0]->tipe == '8' ? 'selected' : '' }}>
                                        8</option>
                                    <option value="60"
                                        {{ old('tipe.' . 0) ?? $formPs1GensetMobileEnamBulanans[0]->tipe == '60' ? 'selected' : '' }}>
                                        60</option>
                                    <option value="100"
                                        {{ old('tipe.' . 0) ?? $formPs1GensetMobileEnamBulanans[0]->tipe == '100' ? 'selected' : '' }}>
                                        100</option>
                                    <option value="430"
                                        {{ old('tipe.' . 0) ?? $formPs1GensetMobileEnamBulanans[0]->tipe == '430' ? 'selected' : '' }}>
                                        430</option>
                                    <option value="500"
                                        {{ old('tipe.' . 0) ?? $formPs1GensetMobileEnamBulanans[0]->tipe == '500' ? 'selected' : '' }}>
                                        500</option>
                                    <option value="1000"
                                        {{ old('tipe.' . 0) ?? $formPs1GensetMobileEnamBulanans[0]->tipe == '1000' ? 'selected' : '' }}>
                                        1000</option>
                                    @if ($formPs1GensetMobileEnamBulanans[0]->tipe != '8' ||
                                        $formPs1GensetMobileEnamBulanans[0]->tipe != '60' ||
                                        $formPs1GensetMobileEnamBulanans[0]->tipe != '100' ||
                                        $formPs1GensetMobileEnamBulanans[0]->tipe != '430' ||
                                        $formPs1GensetMobileEnamBulanans[0]->tipe != '500' ||
                                        $formPs1GensetMobileEnamBulanans[0]->tipe != '1000'
                                        && $formPs1GensetMobileEnamBulanans[0]->tipe != null)
                                        <option
                                            value="{{ $formPs1GensetMobileEnamBulanans[0]->tipe }}"
                                            selected>
                                            {{ $formPs1GensetMobileEnamBulanans[0]->tipe }}
                                        </option>
                                    @endif
                                </select>
                                {{-- <input type="text" class="" name="tipe" {{  old('tipe') ?? $formPs1GensetMobileEnamBulanans[0]->tipe  }}> --}}
                            </div>
                            <label class="col-lg-1 col-3">KVA</label>
                            </div>

                            @include('components.form-message')
                            <hr>
                            <br>
                            <div class="row">
                                @foreach ( $formPs1GensetMobileEnamBulanans as $key => $item)
                                <?php $count = $key + 1; ?>
                                <div class="form-group row col-12 col-lg-6">
                                    <label class="col-lg-4 col-12">{{$count}}. {{$item->pertanyaan}} @if($item->satuan != '') <span class="text-muted"> ({{$item->satuan}}) </span> @endif </label>
                                    <div class="col-lg-4 col-12">
                                        <label for="value">value</label>
                                        @if ($item->satuan == 'Normal')
                                            <select
                                            class="form-control select2 @error('value.' . $key) is-invalid @enderror"
                                            style="width: 100%; height:50px;" name="value[]">
                                                <option value="">Choose Or Type Selection</option>
                                                <option value="normal"
                                                    {{ old('value.' . $key) ?? $item->value == 'normal' ? 'selected' : '' }}>
                                                    Normal</option>
                                                @if ($item->value != 'normal' && $item->value != null)
                                                    <option
                                                        value="{{ $item->value }}"
                                                        selected>
                                                        {{ $item->value }}
                                                    </option>
                                                @endif
                                            </select>
                                        @else
                                            <input type="number" class="form-control" name="value[]" value = "{{  old('value') ?? $item->value }}">
                                        @endif
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <label for="keterangan">keterangan</label>
                                        <input type="text" class="form-control" name="keterangan[]" value = "{{  old('keterangan') ?? $item->keterangan }}">
                                    </div>
                                </div>
                                @endforeach

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
