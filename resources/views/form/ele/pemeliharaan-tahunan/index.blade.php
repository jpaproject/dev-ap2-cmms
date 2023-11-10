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
    </style>
@endsection

@section('content')
    <section class="content">
        <form method="POST" action="{{ route('form.ele.pemeliharaan-tahunan.update', $detailWorkOrderForm->id) }}" enctype="multipart/form-data"
            id="form">
            @method('patch')
            @csrf
            @foreach ($formElePemeliharaanTahunans as $key => $item)
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary">
                                <div class="card-body">
                                    @include('components.form-message')
                                    <div class="row">
                                        <div class="form-group col-12 col-md-6 col-lg-4">
                                            <label>PENGAWAS AP II</label>
                                            <div>
                                                <input placeholder="Enter.." type="text" class="form-control w-100" name="pengawas[]" value="{{$item->pengawas}}">
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-4">
                                            <label>SUBSTATION</label>
                                            <div>
                                                <input placeholder="Enter.." type="text" class="form-control w-100" name="substation[]" value="{{$item->substation}}">
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-12 col-lg-4">
                                            <label>Tanggal</label>
                                            <div>
                                                <input type="datetime-local" class="form-control  w-100" name="tanggal[]" value="{{$item->tanggal}}">
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6">
                                            <label>SDP</label>
                                            <div>
                                                <input placeholder="Enter.." type="text" class="form-control w-100" name="sdp[]" value="{{$item->sdp}}">
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6">
                                            <label>TEMP/ &deg; c</label>
                                            <div>
                                                <input placeholder="Enter.." type="text" class="form-control w-100" name="temp[]" value="{{$item->temp}}">
                                            </div>
                                        </div>
                                        <div class="form-group col-12" style="text-align: center">
                                            <label>PENGUKURAN TAHANAN ISOLASI (1000V)</label>
                                        </div>
                                        <div class="form-group col-12" style="text-align: center">
                                            <label>TAHANAN ISOLASI (&#8486;)</label>
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-3">
                                            <label>RS</label>
                                            <div>
                                                <input placeholder="Enter.." type="text" class="form-control w-100" name="rs[]" value="{{$item->rs}}">
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-3">
                                            <label>ST</label>
                                            <div>
                                                <input placeholder="Enter.." type="text" class="form-control w-100" name="st[]" value="{{$item->st}}">
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-3">
                                            <label>TR</label>
                                            <div>
                                                <input placeholder="Enter.." type="text" class="form-control w-100" name="tr[]" value="{{$item->tr}}">
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-3">
                                            <label>rn</label>
                                            <div>
                                                <input placeholder="Enter.." type="text" class="form-control w-100" name="rn[]" value="{{$item->rn}}">
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-3">
                                            <label>SN</label>
                                            <div>
                                                <input placeholder="Enter.." type="text" class="form-control w-100" name="sn[]" value="{{$item->sn}}">
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-3">
                                            <label>TN</label>
                                            <div>
                                                <input placeholder="Enter.." type="text" class="form-control w-100" name="tn[]" value="{{$item->tn}}">
                                            </div>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-3">
                                            <label>NG</label>
                                            <div>
                                                <input placeholder="Enter.." type="text" class="form-control w-100" name="ng[]" value="{{$item->ng}}">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label
                                        class="col-12 col-lg-3 control-label d-flex justify-content-center align-items-center">Catatan</label>
                                    <div class="col-12 col-lg-9">

                                        <textarea name="catatan" class="form-control @error('catatan.' . $key) is-invalid @enderror" id="catatan"
                                            placeholder="Deskripsi">{{$formElePemeliharaanTahunans[0]->catatan}}</textarea>
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
            if (child.hasClass('fa-minus')) {
                child.removeClass('fa-minus').addClass('fa-plus');; // logs "This is the child element"
            } else if (child.hasClass('fa-plus')) {
                child.removeClass('fa-plus').addClass('fa-minus'); // logs "This is the child element"
            }
        }
    </script>
@endsection
