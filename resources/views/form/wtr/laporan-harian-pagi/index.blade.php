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
        <form method="POST" action="{{ route('form.wtr.laporant-harian-pagi.update', $detailWorkOrderForm->id)  }}" enctype="multipart/form-data"
            id="form">
            @method('patch')
            @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3>LAPORAN HARIAN PAGI</h3>
                        </div>
                        <div class="card-body">
                            @include('components.form-message')
                            @foreach ($formWtrLaporanHarians as $key => $formWtrLaporanHarian)
                                <div class="row text-center">
                                    <div class="col-12 col-lg-3 col-md-2 d-flex justify-content-center align-items-center">
                                        <h4>{{ $formWtrLaporanHarian->peralatan }}</h4>
                                    </div>
                                    <div class="col-12 col-lg-9 col-md-10">
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center">
                                                <span class="font-weight-bold">JUMLAH ALAT</span>
                                            </div>
                                            <div class="col-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>RUNNING</label>
                                                    <input type="number"
                                                        class="form-control @error('jumlah_alat_running.' . $key) is-invalid @enderror"
                                                        id="jumlah_alat_running" name="jumlah_alat_running[]"
                                                        placeholder="Enter.."
                                                        value="{{ old('jumlah_alat_running.' . $key) ?? $formWtrLaporanHarian->jumlah_alat_running }}">
                                                    @error('jumlah_alat_running.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>STANDBY</label>
                                                    <input type="number"
                                                        class="form-control @error('jumlah_alat_standby.' . $key) is-invalid @enderror"
                                                        id="jumlah_alat_standby" name="jumlah_alat_standby[]"
                                                        placeholder="Enter.."
                                                        value="{{ old('jumlah_alat_standby.' . $key) ?? $formWtrLaporanHarian->jumlah_alat_standby }}">
                                                    @error('jumlah_alat_standby.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>OFF</label>
                                                    <input type="number"
                                                        class="form-control @error('jumlah_alat_off.' . $key) is-invalid @enderror"
                                                        id="jumlah_alat_off" name="jumlah_alat_off[]" placeholder="Enter.."
                                                        value="{{ old('jumlah_alat_off.' . $key) ?? $formWtrLaporanHarian->jumlah_alat_off }}">
                                                    @error('jumlah_alat_off.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>TOTAL</label>
                                                    <input type="number"
                                                        class="form-control @error('jumlah_alat_total.' . $key) is-invalid @enderror"
                                                        id="jumlah_alat_total" name="jumlah_alat_total[]"
                                                        placeholder="Enter.."
                                                        value="{{ old('jumlah_alat_total.' . $key) ?? $formWtrLaporanHarian->jumlah_alat_total }}">
                                                    @error('jumlah_alat_total.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>SATUAN</label>
                                                    <select
                                                        class="form-control select2 @error('satuan.' . $key) is-invalid @enderror"
                                                        style="width: 100%; height:50px;" name="satuan[]">
                                                        <option value="">Choose Or Type Selection</option>
                                                        <option value="unit"
                                                            {{ old('satuan.' . $key) ?? $formWtrLaporanHarian->satuan == 'unit' ? 'selected' : '' }}>
                                                            Unit</option>
                                                        @if ($formWtrLaporanHarian->satuan != 'unit' && $formWtrLaporanHarian->satuan != null)
                                                            <option value="{{ $formWtrLaporanHarian->satuan }}" selected>
                                                                {{ $formWtrLaporanHarian->satuan }}
                                                            </option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>TINGKAT SERVICE ABILITY</label>
                                                    <input type="number"
                                                        class="form-control @error('tingkat_service_ability.' . $key) is-invalid @enderror"
                                                        id="tingkat_service_ability" name="tingkat_service_ability[]"
                                                        placeholder="Enter.." step="0.00"
                                                        value="{{ old('tingkat_service_ability.' . $key) ?? $formWtrLaporanHarian->tingkat_service_ability }}">
                                                    @error('tingkat_service_ability.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>RATA-RATA PERFORMA</label>
                                                    <input type="number"
                                                        class="form-control @error('peforma.' . $key) is-invalid @enderror"
                                                        id="peforma" name="peforma[]" placeholder="Enter.." step="0.00"
                                                        value="{{ old('peforma.' . $key) ?? $formWtrLaporanHarian->peforma }}">
                                                    @error('peforma.' . $key)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="catatan">CATATAN TEKNISI</label>
                                                    <textarea name="catatan[]" class="form-control @error('catatan') is-invalid @enderror" id="catatan" cols="30" rows="2" placeholder="Enter catatan">{{old('catatan.'.$key) ?? $formWtrLaporanHarian->catatan}}</textarea>
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
        $(document).ready(function() {
            $('.select2').select2({
                tags: true
            });
        });

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
