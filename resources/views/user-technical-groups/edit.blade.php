@extends('layouts.app')

@section('breadcumb')
    <li class="breadcrumb-item"><a href="{{ route('master-data.index') }}">Master Data</a></li>
    <li class="breadcrumb-item"><a href="{{ route('user-technical-groups.index') }}">User Technical Groups</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('style')

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit {{ $user_technical_group->name }}</h3>
                    </div>
                    <form method="POST" action="{{ route('user-technical-groups.update', $user_technical_group->id) }}" novalidate>
                        @method('patch')
                        @csrf
                        <div class="card-body">

                            @include('components.form-message')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" placeholder="name" required value="{{ old('name') ?? $user_technical_group->name }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Description <small>(Optional)</small></label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="3" placeholder="Enter description">{{old('description') ?? $user_technical_group->description}}</textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">User Technicals</label> <br>
                                <small>Select All</small>
                                <input type="checkbox" id="checkbox">

                                <div class="select2-purple">
                                    <select class="select2" name="user_technicals[]" id="e1" data-placeholder="Select User Technical" multiple data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        @php
                                        $all_user = [];
                                        foreach ($user_technical_group->userTechnicals->all() as $user_selected){
                                            array_push($all_user,$user_selected->id);          
                                        }
                                        @endphp
                                         @foreach ($user_technicals as $user_technical)
                                         @if (in_array(($user_technical->id), (old('user_technicals') ?? $all_user)))
                                             <option value="{{$user_technical->id}}" selected>{{$user_technical->name}}</option>
                                         @else
                                             <option value="{{$user_technical->id}}">{{$user_technical->name}}</option>
                                         @endif
                                         @endforeach
                                    </select>
                                </div>

                                @error('tasks')
                                    <span class="text-danger text-sm">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-footer">Save</button>
                            <a href="{{ route('task-groups.index') }}" class="btn btn-secondary btn-footer">Back</a>
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