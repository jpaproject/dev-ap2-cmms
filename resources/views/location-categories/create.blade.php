@extends('layouts.app')

@section('breadcumb')
<li class="breadcrumb-item"><a href="{{ route('location-categories.index') }}">Location Category</a></li>
<li class="breadcrumb-item active">Add</li>
@endsection

@section('style')

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Location Category</h3>
                        </div>

                        <form method="POST" action="{{ route('location-categories.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                @include('components.form-message')

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name">
    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
    
                                <div class="form-group">
                                    <label for="">Description <small>(Optional)</small></label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="3" placeholder="Enter description">{{old('description')}}</textarea>
    
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
    
                                <div class="form-group">
                                    <label for="icon">Icon</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="icon" name="icon">
                                            <label class="custom-file-label" for="icon">Choose icon</label>
                                        </div>
                                    </div>
                                    {{-- <div class="small text-secondary">Kosongkan jika tidak mau diisi</div> --}}
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-footer">Add</button>
                                <a href="{{ route('location-categories.index') }}" class="btn btn-secondary btn-footer">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    </div>
</section>
@endsection

@section('script')

@endsection
