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
    <a href="{{ route('form.hv-mv-station.sistem-pelaporan.panel.bulanan') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST BULANAN PANEL</a>
    <a href="{{ route('form.hv-mv-station.sistem-pelaporan.panel.tiga-bulanan') }}" class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECKLIST 3 BULANAN PANEL</a>
</div>
</div>
@endsection
                                   