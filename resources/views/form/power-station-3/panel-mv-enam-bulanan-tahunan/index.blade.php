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

        label {
            display: flex;
            justify-content: center;
        }
    </style>
@endsection

@section('content')
    <form method="POST" action="{{ route('form.ps3.panel-mv-enam-bulanan-tahunan.update', $detailWorkOrderForm->id) }}"
        enctype="multipart/form-data" id="form">
        @method('patch')
        @csrf
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                @dd($tegangan_panels)
                                @foreach ($tegangan_panels as $key => $panels)
                                <h2 class="text-center font-weight-bold"><u>PANEL MV GS{{ $loop->iteration }}</u></h2>
                                    <div class="row">
                                        @include('components.form-message')
                                            @foreach($panels as $keyPanel => $panel)
                                            @php
                                                $q = 'q' . strval($keyPanel+1);
                                            @endphp
                                                @if($keyPanel < 3)
                                                <div class="col-sm-11 col-md-4 col-lg-4 form-group">
                                                    <label for="tegangan_panel">TEGANGAN PANEL {{ $panel }}</label>
                                                    <input type="text" class="form-control @error($q. '.'.$key) is-invalid @enderror" id="{{ $q . '[]'}}" name="{{ $q . '[]'}}" value="{{ old($q.'.'.$key) ?? $formPs3PanelMvEnamBulananTahunans[$key]->$q }}" placeholder="VDC">
                                                </div>
                                                @endif
                                                @if($keyPanel == 3)
                                                <div class="col-sm-11 col-md-4 col-lg-4 form-group">
                                                        <label for="tegangan_panel">TEGANGAN PANEL {{ $panel }}</label>
                                                        <input type="text" class="form-control @error('q4.'.$key) is-invalid @enderror" id="q4[]" name="q4[]" value="{{ old('q4.'.$key) ?? $formPs3PanelMvEnamBulananTahunans[$key]->q4 }}" placeholder="VDC">
                                                </div>
                                                @endif
                                                @if($keyPanel == 4)
                                                <div class="col-sm-11 col-md-4 col-lg-4 form-group">
                                                        <label for="tegangan_panel">TEGANGAN PANEL {{ $panel }}</label>
                                                        <input type="text" class="form-control @error('q5.'.$key) is-invalid @enderror" id="q5[]" name="q5[]" value="{{ old('q5.'.$key) ?? $formPs3PanelMvEnamBulananTahunans[$key]->q5 }}" placeholder="VDC">
                                                </div>
                                                @endif
                                            @endforeach
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
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label
                                        class="col-12 col-lg-3 control-label d-flex justify-content-center align-items-center">Catatan</label>
                                    <div class="col-12 col-lg-9">

                                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                                            placeholder="Deskripsi">{!! $formPs3PanelMvEnamBulananTahunans[0]->catatan ??
                                                'Visual Check Kondisi Genset , Peralatan dan Segala Aspek dalam Kondisi Normal.' .
                                                    "\n" .
                                                    'Selesai Perawatan , Peralatan Kembali Ke Posisi Auto.' !!}</textarea>
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

        </section>
    </form>
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
