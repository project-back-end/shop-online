@extends('admin.master')

@section('content-title')
    <!-- Breadcrumbs-->
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.categories') }}">Categories</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
    </ul>
@endsection

@section('content')
    {{--@if (count($errors) > 0)--}}
        {{--<div class="alert alert-danger">--}}
            {{--<strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
            {{--<ul>--}}
                {{--@foreach ($errors->all() as $error)--}}
                    {{--<li>{{ $error }}</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--@endif--}}
    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf

        <div class="form-group">
            <strong>Name:</strong>
            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="" required autofocus>
            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <strong>Slug:</strong>
            <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" id="slug" placeholder="" required>
            @if ($errors->has('slug'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('slug') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <strong>Description:</strong>
            <textarea class="form-control" name="description" cols="30" rows="10" id="description" placeholder="" required></textarea>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            <a class="btn btn-success" href="{{ route('admin.categories') }}"> Back</a>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
@endsection