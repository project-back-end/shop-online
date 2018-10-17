@extends('admin.master')

@section('content-title')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.roles') }}">Role</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ul>
@endsection
@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

{!! Form::model($role, ['method' => 'PATCH','route' => ['admin.roles.update', $role->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <a class="btn btn-success" href="{{ route('admin.roles') }}"> Back</a>
        <button type="submit" class="btn btn-success" onclick="return confirm('You want to update this roles?')">Submit</button>
    </div>
</div>
{!! Form::close() !!}

@endsection