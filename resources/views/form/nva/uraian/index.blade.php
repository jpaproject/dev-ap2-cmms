@section('style')
    <style>
        a {
            margin: 10px
        }
    </style>
@endsection

@extends('layouts.app')
@section('content')
    {{-- <div class="container-fluid">


        <div class="row">
            <a href="{{ route('form.electrical-utility.checklist1') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECK LIST 1</a>
            <a href="{{ route('form.electrical-utility.checklist2') }}"
                class="btn btn-info mb-1 w-100 col-12 col-sm-4">FORM CHECK LIST 2</a>
            
        </div>
    </div> --}}


    <section class="content">
        <form method="POST" action="{{ route('form.nva.uraian.update', $detailWorkOrderForm->id) }}"
            enctype="multipart/form-data" id="form">
            @method('patch')
            @csrf
            {{-- <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="text-align: right;">FORM CHECK</h3>
                        </div>

                            <div class="card-body">

                                @include('components.form-message')

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">KARTU PERALATAN</label>
                                    <div class="col-lg-3 col-10">
                                        <input type="text"  name="kartu_peralatan" value="{{$formSvaUraianPerbaikanHarians[0]->kartu_peralatan}}">
                                    </div>

                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">SUB GARDU</label>
                                    <div class="col-lg-3 col-10">
                                        <input type="text"  name="sub_gardu" value="{{$formSvaUraianPerbaikanHarians[0]->sub_gardu}}">
                                    </div>

                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">MERK</label>
                                    <div class="col-lg-3 col-10">
                                        <input type="text"  name="merk" value="{{$formSvaUraianPerbaikanHarians[0]->merk}}">
                                    </div>

                                    <label class="col-2 col-lg-3"></label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Type</label>
                                    <div class="col-lg-3 col-10">
                                        <input type="text"  name="type" value="{{$formSvaUraianPerbaikanHarians[0]->type}}">
                                    </div>

                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">Kapasitas</label>
                                    <div class="col-lg-3 col-10">
                                        <input type="text"  name="kapasitas" value="{{$formSvaUraianPerbaikanHarians[0]->kapasitas}}">
                                    </div>

                                    
                                    <label class="col-2 col-lg-3"></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-lg-3">TAHUN PEMASANGAN</label>
                                    <div class="col-lg-3 col-10">
                                        <input type="text"  name="tahun_pemasangan" value="{{$formSvaUraianPerbaikanHarians[0]->tahun_pemasangan}}">
                                    </div>

                                    
                                    <label class="col-2 col-lg-3"></label>
                                </div>
                            </div>
                    
                    </div>
                </div>
            </div>

        </div> --}}
            {{-- </form> --}}
            
            <div class="container-fluid">
                <div class="row">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-footer">Simpan</button>
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
            if (child.hasClass('fa-minus')) {
                child.removeClass('fa-minus').addClass('fa-plus');; // logs "This is the child element"
            } else if (child.hasClass('fa-plus')) {
                child.removeClass('fa-plus').addClass('fa-minus'); // logs "This is the child element"
            }
        }
    </script>
@endsection
