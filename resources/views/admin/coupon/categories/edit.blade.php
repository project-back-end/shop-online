@extends('admin.master')
@section('content-title')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.categories') }}">Category</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-5">
            {!! Form::model($categories, ['method' => 'PATCH','route' => ['admin.categories.update', $categories->id]]) !!}
                @csrf

            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                <p><i>The name is how it appears on your site.</i></p>
            </div>

            <div class="form-group">
                <strong>Slug:</strong>
                {!! Form::text('slug', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                <p><i>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</i></p>
            </div>
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, array('placeholder' => '','class' => 'form-control')) !!}
                <p><i>The description is not prominent by default, however some themes may show it.</i></p>
            </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                        <a href="{{ route('admin.categories') }}" class="btn btn-success">Back</a>
                        <button type="submit" class="btn btn-success">Update Coupon Category</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>




@endsection