{{--@extends('admin.master')--}}

{{--@section('content-title')--}}
    {{--<!-- Breadcrumbs-->--}}
    {{--<ul class="breadcrumb">--}}
        {{--<li class="breadcrumb-item">--}}
            {{--<a href="{{ route('admin.stores') }}">Stores</a>--}}
        {{--</li>--}}
        {{--<li class="breadcrumb-item active">Create</li>--}}
    {{--</ul>--}}
{{--@endsection--}}

{{--@section('content')--}}
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

{{--@endsection--}}