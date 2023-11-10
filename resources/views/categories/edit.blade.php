@extends('layouts.app')

@section('breadcumb')
    <li class="breadcrumb-item"><a href="{{ route('master-data.index') }}">Master Data</a></li>
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Category Assets</a></li>
    <li class="breadcrumb-item active">Edit</li>
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
                        <h3 class="card-title">Edit {{ $category->name }}</h3>
                    </div>

                    <form method="POST" action="{{ route('categories.update', $category->id) }}">
                        @method('patch')
                        @csrf

                        <div class="card-body">

                            @include('components.form-message')
                        
                            <div class="form-group ">
                                <label for="">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $category->name }}" placeholder="Enter name">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Description <small>(Optional)</small></label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="3" placeholder="Enter description">{{old('description') ?? $category->description}}</textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-footer">Save</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-footer">Back</a>
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
