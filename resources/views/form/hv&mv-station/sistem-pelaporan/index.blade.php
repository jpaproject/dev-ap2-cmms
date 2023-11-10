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
    <a href="{{ route('form.hv-mv-station.sistem-pelaporan.gis.index') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST GIS</a>
    <a href="{{ route('form.hv-mv-station.sistem-pelaporan.panel.index') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST PANEL</a>
    <a href="{{ route('form.hv-mv-station.sistem-pelaporan.transformer.index') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST POWER TRANSFORMER</a>
</div>
</div>
@endsection
                                   