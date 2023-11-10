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
            <a href="{{ route('form.ele.checklist1.index') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECK LIST 1</a>
            <a href="{{ route('form.ele.checklist2.index') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECK LIST 2</a>
            <a href="{{ route('form.ele.perintah-kerja.index') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM PERINTAH KERJA</a>
            <a href="{{ route('form.ele.perintah-pemasangan.index') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM PERINTAH PEMASANGAN</a>
            <a href="{{ route('form.ele.pemeriksaan-rutin.index') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM PEMERIKSAAN RUTIN</a>
            
        </div>
    </div>
@endsection
