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
    <a href="{{ route('form.hv-mv-station.harian-gis') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST HARIAN GIS</a>
    <a href="{{ route('form.hv-mv-station.harian-tm') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST HARIAN TM</a>
    <a href="{{ route('form.hv-mv-station.log-book') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM LOG BOOK HARIAN</a>
    <a href="{{ route('form.hv-mv-station.metering') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM METERING</a>
    <a href="{{ route('form.hv-mv-station.sistem-pelaporan.index') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM SISTEM PELAPORAN</a>
</div>
</div>
@endsection
                                   