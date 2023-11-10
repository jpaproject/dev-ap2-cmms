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
            <a href="{{ route('form.electrical-protection.checklist-peralatan-harian') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">CHECKLIST PERALATAN HARIAN | ELECTRICAL PROTECTION</a>
            <a href="{{ route('form.electrical-protection.data_teknis_kwh_meter_unit_electrical_protection') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">DATA TEKNIS KWH METER UNIT ELECTRICAL PROTECTION</a>
            <a href="{{ route('form.electrical-protection.data_teknis_perawatan_plc_unit_electrical_protection') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">DATA TEKNIS PERAWATAN PLC UNIT ELECTRICAL PROTECTION</a>
            <a href="{{ route('form.electrical-protection.data_teknis_perawatan_relay_proteksi_unit_electrical_protection') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">DATA TEKNIS PERAWATAN RELAY PROTEKSI UNIT ELECTRICAL
                PROTECTION</a>
            <a href="{{ route('form.electrical-protection.data_teknis_perawatan_trafo_unit_electrical_protection') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">DATA TEKNIS PERAWATAN TRAFO UNIT ELECTRICAL PROTECTION</a>
            <a href="{{ route('form.electrical-protection.laporan_kerusakan_unit_electeical_protection') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">LAPORAN KERUSAKAN UNIT ELECTRICAL PROTECTION</a>
            <a href="{{ route('form.electrical-protection.electrical_protection_maintenance_report') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">ELECTRICAL PROTECTION MAINTENANCE REPORT</a>
        </div>
    </div>
@endsection
