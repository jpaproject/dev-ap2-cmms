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

        label{
            display: flex;
            justify-content: center;
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
                            <h5>PEMERIKSAAN TEGANGAN DAN ARUS</h5>
                        </div>

                        <form method="POST"
                            action="{{ route('form.ps3.panel-sdp-dua-mingguan.update', $detailWorkOrderForm->id) }}"
                            enctype="multipart/form-data" id="form">
                            @method('patch')
                            @csrf

                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($formPs3PanelSdpDuaMingguans as $key => $value)
                                    @php
                                        $count = $key + 1;
                                    @endphp
                                    <div class="row">
                                        <div
                                            class="col-12 col-lg-3 col-md-12 d-flex justify-content-center align-items-center">
                                            <h5>{{ $value->panel_sdp }}</h5>
                                        </div>
                                        <div class="col-12 col-lg-9">
                                            <div class="row">
                                                <label class="col-12 d-flex justify-content-center">ARUS (A)</label>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>L1</label>
                                                        <input type="text"
                                                            class="form-control @error('arus_l1.' . $key) is-invalid @enderror"
                                                            id="arus_l1[]" name="arus_l1[]"
                                                            value="{{ old('arus_l1.' . $key) ?? $value->arus_l1 }}"
                                                            placeholder="L1">

                                                        @error('arus_l1.' . $key)
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
                                                            class="form-control @error('arus_l2.' . $key) is-invalid @enderror"
                                                            id="arus_l2[]" name="arus_l2[]"
                                                            value="{{ old('arus_l2.' . $key) ?? $value->arus_l2 }}"
                                                            placeholder="L2">

                                                        @error('arus_l2.' . $key)
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
                                                            class="form-control @error('arus_l3.' . $key) is-invalid @enderror"
                                                            id="arus_l3[]" name="arus_l3[]"
                                                            value="{{ old('arus_l3.' . $key) ?? $value->arus_l3 }}"
                                                            placeholder="L3">

                                                        @error('arus_l3.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>TEGANGAN (V)</label>
                                                        <input type="text"
                                                            class="form-control @error('tegangan.' . $key) is-invalid @enderror"
                                                            id="tegangan[]" name="tegangan[]"
                                                            value="{{ old('tegangan.' . $key) ?? $value->tegangan }}"
                                                            placeholder="TEGANGAN">

                                                        @error('tegangan.' . $key)
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
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
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>KETERANGAN</label>
                                                        <input type="text"
                                                            class="form-control @error('keterangan.' . $key) is-invalid @enderror"
                                                            id="keterangan[]" name="keterangan[]"
                                                            value="{{ old('keterangan.' . $key) ?? $value->keterangan }}"
                                                            placeholder="KETERANGAN">

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
                                                            placeholder="Deskripsi">{!! $formPs3PanelSdpDuaMingguans[0]->catatan ?? '' !!}</textarea>
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
