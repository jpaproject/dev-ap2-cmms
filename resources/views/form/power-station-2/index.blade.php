@section('style')
    <style>
        a {
            margin: 10px
        }
    </style>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- <a href="{{ route('form.ps2.checklist-harian-genset-ps2.control-room.index') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST HARIAN GENSET / CONTROL ROOM</a> --}}
            {{-- <a href="{{ route('form.power-station.2.checklist-harian-genset.genset-room') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST HARIAN GENSET / GENSET ROOM</a> --}}
            {{-- <a href="{{ route('form.power-station.genset-ph-aocc') }}" class="btn btn-info w-100 col-12 col-sm-4">FORM
                CHECKLIST GENSET PH AOCC</a> --}}
            {{-- <a href="{{ route('form.ps2.harian-panel-lv') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM
                CHECKLIST HARIAN PANEL LV MPS 2</a> --}}
            {{-- <a href="{{ route('form.power-station.check-ph-aocc') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM
                CHECKLIST PH AOCC</a> --}}
            {{-- <a href="{{ route('form.ps2.harian-panel') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM
                CHECKLIST PANEL TM MPS 2</a> --}}
            {{-- <a href="{{ route('form.power-station.data-parameter-dua-mingguan-genset-ph-aocc') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM DATA PARAMETER 2 MINGGUAN GENSET PH AOCC</a> --}}
            {{-- <a href="{{ route('form.power-station.data-parameter-dua-mingguan-genset-ps-dua') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM DATA PARAMETER 2 MINGGUAN GENSET PS 2</a> --}}
            {{-- <a href="{{ route('form.ps2.data-parameter-dua-mingguan-genset-mps-dua') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM DATA PARAMETER 2 MINGGUAN GENSET MPS 2</a> --}}
            {{-- <a href="{{ route('form.power-station.data-parameter-dua-mingguan-ground-tank') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM DATA PARAMETER 2 MINGGUAN GROUND TANK</a> --}}
            {{-- <a href="{{ route('form.ps2.data-parameter-dua-mingguan-panel-sdp-epcc-exhaust-fan') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM DATA PARAMETER 2 MINGGUAN PANEL SDP/EPCC/EXHAUST
                FAN</a> --}}
            {{-- <a href="{{ route('form.power-station.genset-running') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM
                GENSET RUNNING </a> --}}
            {{-- <a href="{{ route('form.power-station.laporan-harian-dinas-operasional-teknis') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM LAPORAN HARIAN DINAS OPERASIONAL TEKNIS MPS 2</a> --}}
            <a href="{{ route('form.ps2.laporan-pemeliharaan-enam-bulanan') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM LAPORAN PEMELIHARAAN 6 BULANAN</a>
            {{-- <a href="{{ route('form.power-station.trees-unit-mps-dua') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM TREES UNIT MPS</a> --}}
            {{-- <a href="{{ route('form.ps2.data-parameter-dua-mingguan-ruang-tenaga') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM DATA PARAMETER 2 MINGGUAN RUANG TENAGA</a> --}}
        </div>
    </div>
@endsection
