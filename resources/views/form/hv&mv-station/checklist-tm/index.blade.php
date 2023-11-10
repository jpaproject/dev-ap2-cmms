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

        {{-- <table class="table table-bordered head table-responsive w-100 d-block d-md-table">
            <thead class="thead-light">
                <tr>

                    <th class="head" scope="col">Tanggal</th>
                    <th class="head" scope="col">Pukul</th>
                    <th class="head" scope="col">Shift</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="head">06 Februari 2023</td>
                    <td class="head">18:18:28</td>
                    <td class="head">PS</td>
                </tr>
            </tbody>
        </table> --}}
        <form method="POST" action="{{ route('form.hmv.sistem-pelaporan.panel.harian.update', $detailWorkOrderForm->id) }}" enctype="multipart/form-data"
        id="form">
        @method('patch')
        @csrf
            <div class="container-fluid">
            <div class="accordion" id="accordionExample1">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title" style="text-align: right;">
                                    <button class="btn btn-link btn-block text-left text-white" type="button"
                                        data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne" onclick="showHide(this)">
                                        <i class="fas fa-chevron-up" id="accordion"></i> Panel TM 20KV
                                    </button>
                                    {{-- ER 2A --}}
                                </h3>
                            </div>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample1">
                            <div class="card card-body">
                                @foreach ($formHmvPanelTmHarians as $item)

                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Name</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('ratio-ct') is-invalid @enderror"
                                                            id="ratio-ct" name="ratio-ct" value="{{$item['name']}}" readonly
                                                            placeholder="Enter Name">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Keterangan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('ratio-ct') is-invalid @enderror"
                                                            id="ratio-ct" name="ratio-ct" value="{{$item['q8']}}" readonly
                                                            placeholder="Enter Keterangan">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <table class="w-100">
                                                <tr>
                                                    <td>CB</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" aria-label="Default select example" name="q1[]">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="open"
                                                            {{ (old('q1') ?? $item->q1) == 'open' ? 'selected' : '' }}
                                                            >Open</option>
                                                            <option value="close"
                                                            {{ (old('q1') ?? $item->q1) == 'close' ? 'selected' : '' }}
                                                            >Close</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <table class="w-100">
                                                <tr>
                                                    <td>DS GROUNDING</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" aria-label="Default select example" name="q2[]">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="open"
                                                            {{ (old('q2') ?? $item->q2) == 'open' ? 'selected' : '' }}
                                                            >Open</option>
                                                            <option value="close"
                                                            {{ (old('q2') ?? $item->q2) == 'close' ? 'selected' : '' }}
                                                            >Close</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <table class="w-100">
                                                <tr>
                                                    <td>GROUNDING</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" aria-label="Default select example" name="q3[]">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="open"
                                                            {{ (old('q3') ?? $item->q3) == 'open' ? 'selected' : '' }}
                                                            >Open</option>
                                                            <option value="close"
                                                            {{ (old('q3') ?? $item->q3) == 'close' ? 'selected' : '' }}
                                                            >Close</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Spring</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" aria-label="Default select example" name="q4[]">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="charge"
                                                            {{ (old('q4') ?? $item->q4) == 'charge' ? 'selected' : '' }}
                                                            >Charge</option>
                                                            <option value="discharge"
                                                            {{ (old('q4') ?? $item->q4) == 'discharge' ? 'selected' : '' }}
                                                            >Discharge</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <table class="w-100">
                                                <tr>
                                                    <td>PROTEKSI</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" aria-label="Default select example" name="q5[]">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="normal"
                                                            {{ (old('q5') ?? $item->q5) == 'normal' ? 'selected' : '' }}
                                                            >normal</option>
                                                            <option value="abnormal"
                                                            {{ (old('q5') ?? $item->q5) == 'abnormal' ? 'selected' : '' }}
                                                            >Abnormal</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <table class="w-100">
                                                <tr>
                                                    <td>TCS</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" aria-label="Default select example" name="q7[]">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="normal"
                                                            {{ (old('q7') ?? $item->q7) == 'normal' ? 'selected' : '' }}
                                                            >normal</option>
                                                            <option value="alarm"
                                                            {{ (old('q7') ?? $item->q7) == 'alarm' ? 'selected' : '' }}
                                                            >Alarm</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        {{-- metering --}}
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Arus (A)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="number"
                                                            class="form-control @error('q6a') is-invalid @enderror"
                                                            id="q6a" name="q6a[]" value="{{ old('q6a') ?? $item->q6a }}"
                                                            placeholder="Enter Arus (A)">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Tegangan (KV)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="number"
                                                            class="form-control @error('q6b') is-invalid @enderror"
                                                            id="q6b" name="q6b[]" value="{{ old('q6b') ?? $item->q6b }}"
                                                            placeholder="Enter Tegangan (KV)">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Daya (MVA)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="number"
                                                            class="form-control @error('q6c') is-invalid @enderror"
                                                            id="q6c" name="q6c[]" value="{{ old('q6c') ?? $item->q6c }}"
                                                            placeholder="Enter Daya (MW)">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Frekuensi(HZ)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="number"
                                                            class="form-control @error('q6d') is-invalid @enderror"
                                                            id="q6d" name="q6d[]" value="{{ old('q6d') ?? $item->q6d }}"
                                                            placeholder="Enter Frekuensi">
                                                    </td>
                                                </tr>
                                            </table>
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
                <div class="accordion" id="accordionThree">
                    <div class="card card-primary">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left text-white collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down" id="accordion"></i> Battery Room
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordionThree">
                            <div class="card-body">
                                @include('components.form-message')
                                    <h4>BATTERY 1</h4>
                                    <label for="">110 V</label>
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Status</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" aria-label="Default select example" name="b1_110_status">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="open"
                                                            {{ (old('b1_110_status') ?? $formHmvPanelTmHarians[0]->b1_110_status) == 'open' ? 'selected' : '' }}
                                                            >Open</option>
                                                            <option value="close"
                                                            {{ (old('b1_110_status') ?? $formHmvPanelTmHarians[0]->b1_110_status) == 'close' ? 'selected' : '' }}
                                                            >Close</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Metering</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('b1_110_metering') is-invalid @enderror"
                                                            id="b1_110_metering" name="b1_110_metering" value="{{ old('b1_110_metering') ?? $formHmvPanelTmHarians[0]->b1_110_metering }}"
                                                            placeholder="Enter Metering">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <label for="">48 V</label>
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Status</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" aria-label="Default select example" name="b3_48_status">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="open"
                                                            {{ (old('b3_48_status') ?? $formHmvPanelTmHarians[0]->b3_48_status) == 'open' ? 'selected' : '' }}
                                                            >Open</option>
                                                            <option value="close"
                                                            {{ (old('b3_48_status') ?? $formHmvPanelTmHarians[0]->b3_48_status) == 'close' ? 'selected' : '' }}
                                                            >Close</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Metering</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('b3_48_metering') is-invalid @enderror"
                                                            id="b3_48_metering" name="b3_48_metering" value="{{ old('b3_48_metering') ?? $formHmvPanelTmHarians[0]->b3_48_metering }}"
                                                            placeholder="Enter Metering">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <hr class="border-primary">
                                    <h4>BATTERY 2</h4>
                                    <label for="">110 V</label>
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Status</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" aria-label="Default select example" name="b3_110_status">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="open"
                                                            {{ (old('b3_110_status') ?? $formHmvPanelTmHarians[0]->b3_110_status) == 'open' ? 'selected' : '' }}
                                                            >Open</option>
                                                            <option value="close"
                                                            {{ (old('b3_110_status') ?? $formHmvPanelTmHarians[0]->b3_110_status) == 'close' ? 'selected' : '' }}
                                                            >Close</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Metering</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('b3_110_metering') is-invalid @enderror"
                                                            id="b3_110_metering" name="b3_110_metering" value="{{ old('b3_110_metering') ?? $formHmvPanelTmHarians[0]->b3_110_metering }}"
                                                            placeholder="Enter Metering">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <label for="">48 V</label>
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Status</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" aria-label="Default select example" name="b3_48_status">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="open"
                                                            {{ (old('b3_48_status') ?? $formHmvPanelTmHarians[0]->b3_48_status) == 'open' ? 'selected' : '' }}
                                                            >Open</option>
                                                            <option value="close"
                                                            {{ (old('b3_48_status') ?? $formHmvPanelTmHarians[0]->b3_48_status) == 'close' ? 'selected' : '' }}
                                                            >Close</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <table class="w-100">
                                                <tr>
                                                    <td>Metering</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text"
                                                            class="form-control @error('b3_48_metering') is-invalid @enderror"
                                                            id="b3_48_metering" name="b3_48_metering" value="{{ old('b3_48_metering') ?? $formHmvPanelTmHarians[0]->b3_48_metering }}"
                                                            placeholder="Enter Metering">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12">
                    <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan" cols="30"
                        rows="3" placeholder="Enter Catatan">{!! $formHmvPanelTmHarians[0]->catatan ?? '' !!}</textarea>
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
    </script>
@endsection
