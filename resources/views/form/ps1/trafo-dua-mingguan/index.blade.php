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
            action="{{ route('form.ps1.trafo-dua-mingguan.update', $detailWorkOrderForm->id) }}"
            id="form">
            @method('patch')
            @csrf
        {{-- <div class="container-fluid">
            <div class="accordion" id="accordionExample1">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title" style="text-align: right;">
                                    <button class="btn btn-link btn-block text-left text-white" type="button"
                                        data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne" onclick="showHide(this)">
                                        <i class="fas fa-chevron-down" id="accordion"></i> Pemeliharaan 2 Mingguan Control Desk & PC HMI Genset Perkins 2000 kVA
                                    </button>
                                </h3>
                            </div>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample1">

                            <div class="card card-body">
                                @foreach ($pertanyaan as $key => $item)
                                    <?php $count = $key + 1; ?>

                                    <div class="row">
                                        <p>{{$item['pertanyaan']}} || {{$item['field']}}</p>

                                    </div>
                                    <hr class="border-primary">
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="container-fluid">
            <div class="accordion" id="accordionExample2">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title" style="text-align: right;">
                                    <button class="btn btn-link btn-block text-left text-white" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                                        aria-controls="collapseTwo" onclick="showHide(this)">
                                        <i class="fas fa-chevron-down" id="accordion"></i> Trafo Stepup Genset Perkins No 1 & 2
                                    </button>
                                </h3>
                            </div>
                        </div>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample2">

                            <div class="card card-body">
                                @foreach ($formPs1TrafoDuaMingguanTrafos as $key1 => $item)
                                    <?php $count = $key1 + 1; ?>

                                    <div class="row">
                                        <div class="col-12">
                                            <label for="">{{$item['data_teknis']}}</label>
                                            <div class="row">

                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <label for="Trafo 1">Trafo 1</label>

                                                    @if(isset($trafoDatas[$key1]['select']))
                                                    {{-- <p>{{dd($key1)}}</p> --}}
                                                    <select class="form-control  @error('q1.' . $key1) is-invalid @enderror"
                                                        name="q1[]">
                                                        <option selected value="">Choose Selection</option>
                                                            @foreach ($trafoDatas[$key1]['select'] as $key => $itemSelect)
                                                            <option value='{{$itemSelect}}'
                                                                {{ old('q1.' . $key) ?? $item['q1'] == $itemSelect ? 'selected' : '' }}
                                                            >{{$itemSelect}}</option>
                                                            @endforeach
                                                    </select>

                                                    @else
                                                        <input type="text"
                                                        class="form-control @error('q1') is-invalid @enderror"
                                                        id="q1[]" name="q1[]"
                                                        value="{{ $item['q1'] }}" placeholder="Enter ...">
                                                    @endif
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <label for="Trafo 2">Trafo 2</label>

                                                    @if(isset($trafoDatas[$key1]['select']))
                                                    {{-- <p>{{dd($key1)}}</p> --}}
                                                    <select class="form-control  @error('q2.' . $key1) is-invalid @enderror"
                                                        name="q2[]">
                                                        <option selected value="">Choose Selection</option>
                                                            @foreach ($trafoDatas[$key1]['select'] as $key => $itemSelect)
                                                            <option value='{{$itemSelect}}'
                                                                {{ old('q2.' . $key) ?? $item['q2'] == $itemSelect ? 'selected' : '' }}
                                                            >{{$itemSelect}}</option>
                                                            @endforeach

                                                    </select>
                                                    @else
                                                        <input type="text"
                                                        class="form-control @error('q2') is-invalid @enderror"
                                                        id="q2[]" name="q2[]"
                                                        value="{{ $item['q2'] }}" placeholder="Enter ...">
                                                    @endif
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <label for="">Satuan</label>
                                                    <input type="text"
                                                        class="form-control @error('satuan') is-invalid @enderror"
                                                        id="satuan[]" name="satuan[]"
                                                        value="{{ $item['satuan'] }}" readonly placeholder="Enter ...">
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <label for="">Keterangan</label>
                                                    <input type="text"
                                                        class="form-control @error('keterangan') is-invalid @enderror"
                                                        id="keterangan[]" name="keterangan[]"
                                                        value="{{ $item['keterangan'] }}" placeholder="Enter ...">
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
        </div>

        <div class="container-fluid">
            <div class="accordion" id="accordionExample3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title" style="text-align: right;">
                                    <button class="btn btn-link btn-block text-left text-white" type="button"
                                        data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
                                        aria-controls="collapseThree" onclick="showHide(this)">
                                        <i class="fas fa-chevron-down" id="accordion"></i> Panel PPG Genset Perkins No 1 & 2
                                    </button>
                                </h3>
                            </div>
                        </div>
                        <div id="collapseThree" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample3">

                            <div class="card card-body">
                                @foreach ($formPs1TrafoDuaMingguanPanels as $key1 => $item)
                                    <?php $count = $key1 + 1; ?>

                                    <div class="row">
                                        <div class="col-12">
                                            <label for="">{{$item['data_teknis']}}</label>
                                            <div class="row">

                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <label for="PLC1">PLC1</label>

                                                    @if(isset($panelDatas[$key1]['select']))
                                                    <select class="form-control  @error('q1.' . $key1) is-invalid @enderror"
                                                        name="q1_panel[]">
                                                        <option selected value="">Choose Selection</option>
                                                            @foreach ($panelDatas[$key1]['select'] as $key => $itemSelect)
                                                            <option value='{{$itemSelect}}'
                                                                {{ old('q1.' . $key) ?? $item['q1'] == $itemSelect ? 'selected' : '' }}
                                                            >{{$itemSelect}}</option>
                                                            @endforeach

                                                    </select>
                                                    @else
                                                        <input type="text"
                                                        class="form-control @error('q1_panel[]') is-invalid @enderror"
                                                        id="q1_panel[]" name="q1_panel[]"
                                                        value="{{ $item['q1'] }}" placeholder="Enter ...">
                                                    @endif
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <label for="PLC2">PLC2</label>

                                                    @if(isset($panelDatas[$key1]['select']))
                                                    <select class="form-control  @error('q2.' . $key1) is-invalid @enderror"
                                                        name="q2_panel[]">
                                                        <option selected value="">Choose Selection</option>
                                                            @foreach ($panelDatas[$key1]['select'] as $keySelect => $itemSelect)
                                                            <option value='{{$itemSelect}}'
                                                                {{ old('q2.' . $keySelect) ?? $item['q2'] == $itemSelect ? 'selected' : '' }}
                                                            >{{$itemSelect}}</option>
                                                            @endforeach

                                                    </select>
                                                    @else
                                                        <input type="text"
                                                        class="form-control @error('q2') is-invalid @enderror"
                                                        id="q2_panel[]" name="q2_panel[]"
                                                        value="{{ old('q2.' . $keySelect) ?? $item['q2'] }}" placeholder="Enter ...">
                                                    @endif
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <label for="">Satuan</label>
                                                    <input type="text"
                                                        class="form-control @error('satuan') is-invalid @enderror"
                                                        id="satuan_panel[]" name="satuan_panel[]"
                                                        value="{{ $item['satuan'] }}" readonly placeholder="Enter ...">
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-6">
                                                    <label for="">Keterangan</label>
                                                    <input type="text"
                                                        class="form-control @error('keterangan') is-invalid @enderror"
                                                        id="keterangan_panel[]" name="keterangan_panel[]"
                                                        value="{{  $item['keterangan'] }}" placeholder="Enter ...">
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
        </div>

        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="scada"
            cols="30" rows="3" placeholder="Enter Catatan">{!! $formPs1TrafoDuaMingguanTrafos[0]->catatan ?? '' !!}</textarea>

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
            if (child.hasClass('fa-chevron-down')) {
                child.removeClass('fa-chevron-down').addClass('fa-chevron-up');; // logs "This is the child element"
            } else if (child.hasClass('fa-chevron-up')) {
                child.removeClass('fa-chevron-up').addClass('fa-chevron-down'); // logs "This is the child element"
            }
        }
    </script>
@endsection
