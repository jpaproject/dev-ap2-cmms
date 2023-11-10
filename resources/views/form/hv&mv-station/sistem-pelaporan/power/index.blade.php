@section('style')
<style>
    a {
        margin:10px
    }
</style>
@endsection

@extends('layouts.app')
@section('content')
<div class="container-fluid">


<div class="row">
    <a href="{{ route('form.hv-mv-station.sistem-pelaporan.transformer.mingguan') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST MINGGUAN POWER TRANSFORMER</a>
    <a href="{{ route('form.hv-mv-station.sistem-pelaporan.transformer.bulanan') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST BULANAN POWER TRANSFORMER</a>
    <a href="{{ route('form.hv-mv-station.sistem-pelaporan.transformer.triwulan') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST TRIWULAN POWER TRANSFORMER</a>
    <a href="{{ route('form.hv-mv-station.sistem-pelaporan.transformer.semesteran') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST SEMESTERAN POWER TRANSFORMER</a>
    <a href="{{ route('form.hv-mv-station.sistem-pelaporan.transformer.tahunan') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST TAHUNAN POWER TRANSFORMER</a>
    <a href="{{ route('form.hv-mv-station.sistem-pelaporan.transformer.dua-tahunan') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST DUA TAHUNAN POWER TRANSFORMER</a>
    <a href="{{ route('form.hv-mv-station.sistem-pelaporan.transformer.kondisional') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST KONDISIONAL POWER TRANSFORMER</a>
</div>
</div>
@endsection
                                   