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

        <form method="POST"
            action="{{ route('form.ps2.laporan-pemeliharaan-enam-bulanan.update', $detailWorkOrderForm->id) }}"
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
                                    onclick="showHide(this)">{{ $datas->panelMv20Kvs[0]['group_spesifikasi_pemeliharaan'] }}
                                    <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="show collapse" aria-labelledby="headingOne"
                            data-parent="#accordionOne">
                            <div class="card-body">
                                @include('components.form-message')
                                @php
                                    $indexPointer = 0;
                                @endphp
                                @foreach ($datas->panelMv20Kvs as $panelMv20Kv)
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <h5>{{ $panelMv20Kv['spesifikasi_pemeliharaan'] }}</h5>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center add-check-panel-area">
                                                @if ($panelMv20Kv['giga_ohm'])
                                                    <input type="text"
                                                        class="form-control @error('giga_ohm' , $indexPointer) is-invalid @enderror"
                                                        name="{{ 'giga_ohm' . '['. $indexPointer .']' }}"
                                                        value="{{ $panelMv20Kvs[$indexPointer]->giga_ohm ?? old('giga_ohm' . $indexPointer) }}"
                                                        placeholder="Enter..">

                                                    @error('giga_ohm' , $indexPointer)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                @else
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control @error('panel_1.' . $indexPointer) is-invalid @enderror"
                                                                id="panel1" name="{{ 'panel_1' . '['.$indexPointer.']' }}"
                                                                value="{{ $panelMv20Kvs[$indexPointer]->panel_1 ?? old('panel_1' . $indexPointer) }}"
                                                                placeholder="Enter..">

                                                            @error('panel_1.' . $indexPointer)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control @error('panel_2.' . $indexPointer) is-invalid @enderror"
                                                                id="panel1" name="{{ 'panel_2' . '['.$indexPointer.']' }}"
                                                                value="{{ $panelMv20Kvs[$indexPointer]->panel_2 ?? old('panel_2' . $indexPointer) }}"
                                                                placeholder="Enter..">

                                                            @error('panel_2.' . $indexPointer)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control @error('panel_3.' . $indexPointer) is-invalid @enderror"
                                                                id="panel1" name="{{ 'panel_3' . '['.$indexPointer.']' }}"
                                                                value="{{ $panelMv20Kvs[$indexPointer]->panel_3 ?? old('panel_3' . $indexPointer) }}"
                                                                placeholder="Enter..">

                                                            @error('panel_3.' . $indexPointer)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $indexPointer++;
                                    @endphp
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
                                    onclick="showHide(this)">{{ $datas->kabel20Kvs[0]['group_spesifikasi_pemeliharaan'] }}
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionTwo">
                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($datas->kabel20Kvs as $kabel20Kv)
                                    <div class="row mb-3" id="row-check">
                                        <div
                                            class="col-12 col-lg-4 col-md-12 d-flex justify-content-start align-items-center">
                                            <h5>{{ $kabel20Kv['spesifikasi_pemeliharaan'] }}</h5>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="row justify-content-center add-check-panel-area">
                                                @if ($kabel20Kv['giga_ohm'])
                                                    <input type="text"
                                                        class="form-control @error('giga_ohm' , $indexPointer) is-invalid @enderror"
                                                        name="{{ 'giga_ohm' . '['. $indexPointer .']' }}"
                                                        value="{{ $kabel20Kvs[$indexPointer]->giga_ohm ?? old('giga_ohm' . $indexPointer) }}"
                                                        placeholder="Enter..">

                                                    @error('giga_ohm' , $indexPointer)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                @else
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control @error('panel_1.' . $indexPointer) is-invalid @enderror"
                                                                id="panel1" name="{{ 'panel_1' . '['.$indexPointer.']' }}"
                                                                value="{{ $kabel20Kvs[$indexPointer]->panel_1 ?? old('panel_1' . $indexPointer) }}"
                                                                placeholder="Enter..">

                                                            @error('panel_1.' . $indexPointer)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control @error('panel_2.' . $indexPointer) is-invalid @enderror"
                                                                id="panel1" name="{{ 'panel_2' . '['.$indexPointer.']' }}"
                                                                value="{{ $kabel20Kvs[$indexPointer]->panel_2 ?? old('panel_2' . $indexPointer) }}"
                                                                placeholder="Enter..">

                                                            @error('panel_2.' . $indexPointer)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control @error('panel_3.' . $indexPointer) is-invalid @enderror"
                                                                id="panel1" name="{{ 'panel_3' . '['.$indexPointer.']' }}"
                                                                value="{{ $kabel20Kvs[$indexPointer]->panel_3 ?? old('panel_3' . $indexPointer) }}"
                                                                placeholder="Enter..">

                                                            @error('panel_3.' . $indexPointer)
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $indexPointer++;
                                    @endphp
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
                                            placeholder="Deskripsi"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-footer">Add</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-footer">Back</a>
                </div>
            </div>

        </form>
    </section>
@endsection
@section('script')
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        function showHide(button) {
            const child = $(button).parent().find("#accordion"); // get child element
            if (child.hasClass('fa-chevron-up')) {
                child.removeClass('fa-chevron-up').addClassas('fa-chevron-down');; // logs "This is the child element"
            } else if (child.hasClass('fa-chevron-down')) {
                child.removeClass('fa-chevron-down').addClass('fa-chevron-up'); // logs "This is the child element"
            }
        }

    </script>
@endsection
