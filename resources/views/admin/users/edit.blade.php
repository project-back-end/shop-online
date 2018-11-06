@extends('admin.master')
@section('content-title')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.users') }}">User</a>
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

{!! Form::model($user, ['method' => 'PATCH','route' => ['admin.users.update', $user->id]]) !!}
{{-- Username--}}
<div class="form-group row">
    <label  class="col-sm-2 col-form-label">Username (<span class="require"> Required </span>) :</label>
    <div class="col-sm-4">
        {!! Form::text('name', null, array('placeholder' => 'Username','class' => 'form-control')) !!}
    </div>
</div>
{{--Email--}}
<div class="form-group row">
    <label  class="col-sm-2 col-form-label">Email (<span class="require"> Required </span>) :</label>
    <div class="col-sm-4">
        {!! Form::text('email', null, array('placeholder' => 'example@gmail.com','class' => 'form-control')) !!}
    </div>
</div>
{{--first name--}}
<div class="form-group row">
    <label  class="col-sm-2 col-form-label">First Name :</label>
    <div class="col-sm-4">
        {!! Form::text('first_name', null, array('placeholder' => '','class' => 'form-control')) !!}
    </div>
</div>
{{--last name--}}
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Last Name :</label>
    <div class="col-sm-4">
        {!! Form::text('last_name', null, array('placeholder' => '','class' => 'form-control')) !!}
    </div>
</div>
{{--website--}}
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Website :</label>
    <div class="col-sm-4">
        {!! Form::text('website', null, array('placeholder' => '','class' => 'form-control')) !!}
    </div>
</div>

{{--Passworld--}}
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Password :</label>
    <div class="col-sm-4">
        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control' , 'id'=>'password')) !!}
    </div>
</div>
{{--Confirm password--}}
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Confirm Password :</label>
    <div class="col-sm-4">
        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
    </div>
</div>
{{--Notification--}}
{{--<div class="form-group row">--}}
{{--<label class="col-sm-2 col-form-label">Send User Notification :</label>--}}
{{--<div class="col-sm-4 col-form-label">--}}
{{--<input type="checkbox"  id="notification" value="yes" >--}}
{{--<span >Send the new user the email about their account</span>--}}
{{--</div>--}}
{{--</div>--}}
{{--role select--}}
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Role</label>
    <div class="col-sm-3">
        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
    </div>
</div>
{{--Avatar--}}
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Avatar</label>
    <div class="col-sm-4">
        <input type="file" name="avatar" class="form-control-file" onchange="readURL(this);">
        <br>
        <img  class="img" id="blah" src="http://placehold.it/180" alt="your image" />
        <p><i>Thumnail</i></p>
    </div>
</div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <a href="{{ route('admin.users') }}" class="btn btn-success">Back</a>
        <button type="submit" class="btn btn-success" onclick="return confirm('You want to update this user?')">Submit</button>
    </div>
</div>
{!! Form::close() !!}

@endsection