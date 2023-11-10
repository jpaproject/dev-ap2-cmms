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
    <a href="{{ route('form.hv-mv-station.sistem-pelaporan.gis.bulanan') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST BULANAN GIS</a>
    <a href="{{ route('form.hv-mv-station.sistem-pelaporan.gis.tiga-bulanan') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST 3 BULANAN GIS</a>
    <a href="{{ route('form.hv-mv-station.sistem-pelaporan.gis.tahunan') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST TAHUNAN GIS</a>
    <a href="{{ route('form.hv-mv-station.sistem-pelaporan.gis.dua-tahunan') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST 2 TAHUNAN GIS</a>
    <a href="{{ route('form.hv-mv-station.sistem-pelaporan.gis.kondisional') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST KONDISIONAL GIS</a>
</div>
</div>
@endsection
                                   