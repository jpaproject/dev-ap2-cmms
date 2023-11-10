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
        <form method="POST" action="{{ route('form.hmv.sistem-pelaporan.gis.harian.update', $detailWorkOrderForm->id) }}" enctype="multipart/form-data"
        id="form">
        @method('patch')
        @csrf
            <div class="container-fluid">
                <div class="accordion" id="accordionOne">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                    onclick="showHide(this)">
                                    <i class="fas fa-chevron-up d-flex justify-content-end" id="accordion"></i> Kondisi
                                    Lingkungan
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionOne">
                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($formHmvGisAHarians as $item)
                                    <div class="row">
                                        <div class="col-12 col-lg-2 col-md-2 d-flex justify-content-center align-items-start">
                                            <h4>{{ $loop->iteration }}. {{ $item->lokasi }}</h4>
                                        </div>
                                        <div class="col-12 col-lg-10 col-md-10">
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>SUHU AMBIENT</label>
                                                        <input type="text"
                                                            class="form-control @error('suhu') is-invalid @enderror"
                                                            id="suhu" name="suhu_a[]" value="{{ old('suhu') ?? $item->suhu }}"
                                                            placeholder="Enter..">

                                                        @error('suhu')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>KELEMBABAN UDARA</label>
                                                        <input type="text"
                                                            class="form-control @error('kelembaban') is-invalid @enderror"
                                                            id="kelembaban" name="kelembaban[]" value="{{ old('kelembaban') ?? $item->kelembaban }}"
                                                            placeholder="Enter..">

                                                        @error('kelembaban')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>BENDA ASING</label>
                                                        <input type="text"
                                                            class="form-control @error('benda_asing') is-invalid @enderror"
                                                            id="benda_asing" name="benda_asing[]" value="{{ old('benda_asing') ?? $item->benda_asing }}"
                                                            placeholder="Enter..">

                                                        @error('benda_asing')
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
                <div class="accordion" id="accordionTwo">
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i>
                                    Kompartemen Bay 150KV
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionTwo">
                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($formHmvGisBHarians as $item)
                                    <div class="row">
                                        <div class="col-12 col-lg-2 col-md-2 d-flex justify-content-center align-items-start">
                                            <h4>{{$item->name}}</h4>
                                        </div>
                                        <div class="col-12 col-lg-10 col-md-10">
                                            <div class="row ">
                                                <label class="col-12 text-center">1. MANOMETER (BAR/20°C) PMS BUS </label>
                                                <div class="col-6">
                                                    Q1
                                                    <div class="form-group">
                                                        <input type="number"
                                                            class="form-control @error('pms_bus_q1') is-invalid @enderror"
                                                            id="pms_bus_q1" name="pms_bus_q1[]" value="{{ old('pms_bus_q1') ?? $item->pms_bus_q1 }}"
                                                            placeholder="Enter..">

                                                        @error('pms_bus_q1')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    Q2
                                                    <div class="form-group">
                                                        <input type="number"
                                                            class="form-control @error('pms_bus_q2') is-invalid @enderror"
                                                            id="pms_bus_q2" name="pms_bus_q2[]" value="{{ old('pms_bus_q2') ?? $item->pms_bus_q2 }}"
                                                            placeholder="Enter..">

                                                        @error('pms_bus_q2')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <label class="col-12 text-center">Tekanan Gas SF6</label>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">PMT</label>
                                                        <input type="number"
                                                            class="form-control @error('pmt') is-invalid @enderror"
                                                            id="pmt" name="pmt[]" value="{{ old('pmt') ?? $item->pmt }}"
                                                            placeholder="Enter..">

                                                        @error('pmt')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Ceiling End</label>
                                                        <input type="number"
                                                            class="form-control @error('ceiling_end') is-invalid @enderror"
                                                            id="ceiling_end" name="ceiling_end[]" value="{{ old('ceiling_end') ?? $item->ceiling_end }}"
                                                            placeholder="Enter..">

                                                        @error('ceiling_end')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">VT LINE</label>
                                                        <input type="number"
                                                            class="form-control @error('vt_line') is-invalid @enderror"
                                                            id="vt_line" name="vt_line[]" value="{{ old('vt_line') ?? $item->vt_line }}"
                                                            placeholder="Enter..">

                                                        @error('vt_line')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <label class="col-12 text-center">2. POSISI</label>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">PMS BUS</label>
                                                        <select class="form-control" aria-label="Default select example" name="posisi_pms_bus[]">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="open"
                                                            {{ (old('posisi_pms_bus') ?? $item->posisi_pms_bus) == 'open' ? 'selected' : '' }}
                                                            >Open</option>
                                                            <option value="close"
                                                            {{ (old('posisi_pms_bus') ?? $item->posisi_pms_bus) == 'close' ? 'selected' : '' }}
                                                            >Close</option>
                                                        </select>
                                                        @error('posisi_pms_bus')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">PMT</label>
                                                        <select class="form-control" aria-label="Default select example" name="posisi_pmt[]">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="open"
                                                            {{ (old('posisi_pmt') ?? $item->posisi_pmt) == 'open' ? 'selected' : '' }}
                                                            >Open</option>
                                                            <option value="close"
                                                            {{ (old('posisi_pmt') ?? $item->posisi_pmt) == 'close' ? 'selected' : '' }}
                                                            >Close</option>
                                                        </select>
                                                        @error('posisi_pmt')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">PMS LINE</label>
                                                        <input type="text"
                                                            class="form-control @error('posisi_pms_line') is-invalid @enderror"
                                                            id="posisi_pms_line" name="posisi_pms_line[]" value="{{ old('posisi_pms_line') ?? $item->posisi_pms_line }}"
                                                            placeholder="Enter..">

                                                        @error('posisi_pms_line')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <label class="col-12 text-center">COUNTER PMT</label>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">R</label>
                                                        <input type="number"
                                                            class="form-control @error('counter_r') is-invalid @enderror"
                                                            id="counter_r" name="counter_r[]" value="{{ old('counter_r') ?? $item->counter_r }}"
                                                            placeholder="Enter..">

                                                        @error('counter_r')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">S</label>
                                                        <input type="number"
                                                            class="form-control @error('counter_s') is-invalid @enderror"
                                                            id="counter_s" name="counter_s[]" value="{{ old('counter_s') ?? $item->counter_s }}"
                                                            placeholder="Enter..">

                                                        @error('counter_s')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">T</label>
                                                        <input type="number"
                                                            class="form-control @error('counter_t') is-invalid @enderror"
                                                            id="counter_t" name="counter_t[]" value="{{ old('counter_t') ?? $item->counter_t }}"
                                                            placeholder="Enter..">

                                                        @error('counter_t')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                {{-- <label class="col-12 text-center">COUNTER PMT</label> --}}

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Q51 & Q52 EARTHING PMT</label>
                                                        <select class="form-control" aria-label="Default select example" name="earhing_pmt[]">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="open"
                                                            {{ (old('earhing_pmt') ?? $item->earhing_pmt) == 'open' ? 'selected' : '' }}
                                                            >Open</option>
                                                            <option value="close"
                                                            {{ (old('earhing_pmt') ?? $item->earhing_pmt) == 'close' ? 'selected' : '' }}
                                                            >Close</option>
                                                        </select>
                                                        @error('earhing_pmt')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Q8 EARTHING LINE</label>
                                                        <select class="form-control" aria-label="Default select example" name="earhing_line[]">
                                                            <option value="" selected>Open this select menu</option>
                                                            <option value="open"
                                                            {{ (old('earhing_line') ?? $item->earhing_line) == 'open' ? 'selected' : '' }}
                                                            >Open</option>
                                                            <option value="close"
                                                            {{ (old('earhing_line') ?? $item->earhing_line) == 'close' ? 'selected' : '' }}
                                                            >Close</option>
                                                        </select>
                                                        @error('earhing_line')
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

                                <div class="row ">
                                    <label class="col-12 text-center">EARTHING BUSBAR</label>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="">ABNORMAL</label>
                                            <input type="text"
                                                class="form-control @error('abnormal') is-invalid @enderror"
                                                id="abnormal" name="abnormal" value="{{ old('abnormal') ?? $formHmvGisBHarians[0]->abnormal }}"
                                                placeholder="Enter..">

                                            @error('abnormal')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="">Q 15</label>
                                            <input type="text"
                                                class="form-control @error('posisi_a') is-invalid @enderror"
                                                id="posisi_a" name="posisi_a[]" value="{{ old('posisi') ?? $formHmvGisAHarians[0]->posisi }}"
                                                placeholder="Enter..">

                                            @error('posisi_a')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="">Q 25</label>
                                            <input type="text"
                                                class="form-control @error('posisi_a') is-invalid @enderror"
                                                id="posisi_a" name="posisi_a[]" value="{{ old('posisi') ?? $formHmvGisAHarians[1]->posisi }}"
                                                placeholder="Enter..">

                                            @error('posisi_a')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="">Status AC/DC</label>
                                    <label for="">DC HEALTH 100V</label>
                                    <div class="row col-12">
                                        <div class="col-6">
                                            <input type="text"
                                                    class="form-control @error('status_110') is-invalid @enderror"
                                                    id="status_110" name="status_110[]" value="{{ old('status_110') ?? $formHmvGisAHarians[0]->status_110 }}"
                                                    placeholder="Enter..">

                                                @error('status_110')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="col-6">
                                            <input type="text"
                                                    class="form-control @error('status_110') is-invalid @enderror"
                                                    id="status_110" name="status_110[]" value="{{ old('status_110') ?? $formHmvGisAHarians[1]->status_110 }}"
                                                    placeholder="Enter..">

                                                @error('status_110')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <label for="">DC HEALTH 48V</label>
                                    <div class="row col-12">
                                        <div class="col-6">
                                            <input type="text"
                                                    class="form-control @error('status_48') is-invalid @enderror"
                                                    id="status_48" name="status_48[]" value="{{ old('status_48') ?? $formHmvGisAHarians[0]->status_48 }}"
                                                    placeholder="Enter..">

                                                @error('status_48')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="col-6">
                                            <input type="text"
                                                    class="form-control @error('status_48') is-invalid @enderror"
                                                    id="status_48" name="status_48[]" value="{{ old('status_48') ?? $formHmvGisAHarians[1]->status_48 }}"
                                                    placeholder="Enter..">

                                                @error('status_48')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <label for="">LOCAL / REMOTE</label>
                                    <div class="row col-12">
                                        <div class="col-6">
                                            <input type="text"
                                                    class="form-control @error('local_remote') is-invalid @enderror"
                                                    id="local_remote" name="local_remote[]" value="{{ old('local_remote') ?? $formHmvGisAHarians[0]->local_remote }}"
                                                    placeholder="Enter..">

                                                @error('local_remote')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="col-6">
                                            <input type="text"
                                                    class="form-control @error('local_remote') is-invalid @enderror"
                                                    id="local_remote" name="local_remote[]" value="{{ old('local_remote') ?? $formHmvGisAHarians[1]->local_remote }}"
                                                    placeholder="Enter..">

                                                @error('local_remote')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <textarea name="keterangan[]" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" cols="30"
                                            rows="3" placeholder="Enter keterangan">{!! $formHmvGisAHarians[0]->keterangan ?? '' !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="accordion" id="accordionThree">
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree" onclick="showHide(this)">
                                    <i class="fas fa-chevron-down d-flex justify-content-end" id="accordion"></i> TRAFO 150KV 60MVA
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordionThree">
                            <div class="card-body">
                                @include('components.form-message')
                                @foreach ($formHmvGisCHarians as $item)
                                    <h4 class="text-center">{{ $item->name }}</h4>
                                    <div class="row">
                                        <div class="col-12 col-lg-2 col-md-2 d-flex justify-content-center align-items-start">
                                            <h4>MINYAK TRAFO</h4>
                                        </div>
                                        <div class="col-12 col-lg-10 col-md-10">
                                            <div class="row">
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>LEVEL</label>
                                                        <select class="form-control  @error('level') is-invalid @enderror"
                                                            name="level[]">
                                                            <option disabled selected>Choose Selection</option>
                                                            <option value="normal"
                                                                {{ (old('level') ?? $item->level) == 'normal' ? 'selected' : '' }}>
                                                                NORMAL</option>
                                                            <option value="tidak-normal"
                                                                {{ (old('level') ?? $item->level) == 'tidak-normal' ? 'selected' : '' }}>
                                                                TIDAK NORMAL</option>
                                                        </select>
                                                        @error('level')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>SUHU</label>
                                                        <input type="text"
                                                            class="form-control @error('suhu') is-invalid @enderror"
                                                            id="suhu" name="suhu[]" value="{{ old('suhu') ?? $item->suhu }}"
                                                            placeholder="Enter..">

                                                        @error('suhu')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>OIL TEMP</label>
                                                        <input type="text"
                                                            class="form-control @error('oil') is-invalid @enderror"
                                                            id="oil" name="oil[]" value="{{ old('oil') ?? $item->oil }}"
                                                            placeholder="Enter..">

                                                        @error('oil')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>WIDING HV</label>
                                                        <input type="text"
                                                            class="form-control @error('hv') is-invalid @enderror"
                                                            id="hv" name="hv[]" value="{{ old('hv') ?? $item->hv }}"
                                                            placeholder="Enter..">

                                                        @error('hv')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>WIDING LV</label>
                                                        <input type="text"
                                                            class="form-control @error('lv') is-invalid @enderror"
                                                            id="lv" name="lv[]" value="{{ old('lv') ?? $item->lv }}"
                                                            placeholder="Enter..">

                                                        @error('lv')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-2 col-md-3 d-flex justify-content-center align-items-start">
                                            <h4>2. POSISI TAP </h4>
                                        </div>
                                        <div class="col-12 col-lg-10 col-md-9">
                                            <div class="form-group">
                                                <input type="text"
                                                    class="form-control @error('posisi') is-invalid @enderror"
                                                    id="posisi" name="posisi[]" value="{{ old('posisi') ?? $item->posisi }}"
                                                    placeholder="Enter..">

                                                @error('posisi')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-2 col-md-3 d-flex justify-content-center align-items-start">
                                            <h4>3. COUNTER OLTC</h4>
                                        </div>
                                        <div class="col-12 col-lg-10 col-md-9">
                                            <div class="form-group">
                                                <input type="text"
                                                    class="form-control @error('counter') is-invalid @enderror"
                                                    id="counter" name="counter[]" value="{{ old('counter') ?? $item->counter }}"
                                                    placeholder="Enter..">

                                                @error('counter')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-2 col-md-2 d-flex justify-content-center align-items-start">
                                            <h4>4. PROTEKSI</h4>
                                        </div>
                                        <div class="col-12 col-lg-10 col-md-10">
                                            <div class="row">
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>BUCHOLZ</label>
                                                        <select class="form-control  @error('bucholz') is-invalid @enderror"
                                                            name="bucholz[]">
                                                            <option disabled selected>Choose Selection</option>
                                                            <option value="normal"
                                                                {{ (old('bucholz') ?? $item->bucholz) == 'normal' ? 'selected' : '' }}>
                                                                NORMAL</option>
                                                            <option value="tidak-normal"
                                                                {{ (old('bucholz') ?? $item->bucholz) == 'tidak-normal' ? 'selected' : '' }}>
                                                                TIDAK NORMAL</option>
                                                        </select>
                                                        @error('bucholz')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>JANSEN</label>
                                                        <select class="form-control  @error('jansen') is-invalid @enderror"
                                                            name="jansen[]">
                                                            <option disabled selected>Choose Selection</option>
                                                            <option value="normal"
                                                                {{ (old('jansen') ?? $item->jansen) == 'normal' ? 'selected' : '' }}>
                                                                NORMAL</option>
                                                            <option value="tidak-normal"
                                                                {{ (old('jansen') ?? $item->jansen) == 'tidak-normal' ? 'selected' : '' }}>
                                                                TIDAK NORMAL</option>
                                                        </select>
                                                        @error('jansen')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>TERMAL</label>
                                                        <select class="form-control  @error('termal') is-invalid @enderror"
                                                            name="termal[]">
                                                            <option disabled selected>Choose Selection</option>
                                                            <option value="normal"
                                                                {{ (old('termal') ?? $item->termal) == 'normal' ? 'selected' : '' }}>
                                                                NORMAL</option>
                                                            <option value="tidak-normal"
                                                                {{ (old('termal') ?? $item->termal) == 'tidak-normal' ? 'selected' : '' }}>
                                                                TIDAK NORMAL</option>
                                                        </select>
                                                        @error('termal')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>SUDDEN PRESS</label>
                                                        <select class="form-control  @error('sudden') is-invalid @enderror"
                                                            name="sudden[]">
                                                            <option disabled selected>Choose Selection</option>
                                                            <option value="normal"
                                                                {{ (old('sudden') ?? $item->sudden) == 'normal' ? 'selected' : '' }}>
                                                                NORMAL</option>
                                                            <option value="tidak-normal"
                                                                {{ (old('sudden') ?? $item->sudden) == 'tidak-normal' ? 'selected' : '' }}>
                                                                TIDAK NORMAL</option>
                                                        </select>
                                                        @error('sudden')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>FIRE PREVENTION (BAR) </label>
                                                        <select class="form-control  @error('fire') is-invalid @enderror"
                                                            name="fire[]">
                                                            <option disabled selected>Choose Selection</option>
                                                            <option value="normal"
                                                                {{ (old('fire') ?? $item->fire) == 'normal' ? 'selected' : '' }}>
                                                                NORMAL</option>
                                                            <option value="tidak-normal"
                                                                {{ (old('fire') ?? $item->fire) == 'tidak-normal' ? 'selected' : '' }}>
                                                                TIDAK NORMAL</option>
                                                        </select>
                                                        @error('fire')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>NGR (ARUS) </label>
                                                        <select class="form-control  @error('ngr') is-invalid @enderror"
                                                            name="ngr[]">
                                                            <option disabled selected>Choose Selection</option>
                                                            <option value="normal"
                                                                {{ (old('ngr') ?? $item->ngr) == 'normal' ? 'selected' : '' }}>
                                                                NORMAL</option>
                                                            <option value="tidak-normal"
                                                                {{ (old('ngr') ?? $item->ngr) == 'tidak-normal' ? 'selected' : '' }}>
                                                                TIDAK NORMAL</option>
                                                        </select>
                                                        @error('ngr')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>DC HEALTH </label>
                                                        <select class="form-control  @error('dc') is-invalid @enderror"
                                                            name="dc[]">
                                                            <option disabled selected>Choose Selection</option>
                                                            <option value="normal"
                                                                {{ (old('dc') ?? $item->dc) == 'normal' ? 'selected' : '' }}>
                                                                NORMAL</option>
                                                            <option value="tidak-normal"
                                                                {{ (old('dc') ?? $item->dc) == 'tidak-normal' ? 'selected' : '' }}>
                                                                TIDAK NORMAL</option>
                                                        </select>
                                                        @error('dc')
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
                                <div class="form-group row">
                                    <div class="col-12">
                                        <textarea name="keterangan[]" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" cols="30"
                                            rows="3" placeholder="Enter keterangan">{!! $formHmvGisAHarians[1]->keterangan ?? '' !!}</textarea>
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
    </script>
@endsection
