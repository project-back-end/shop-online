@extends('admin.master')

@section('content-title')
    <!-- Breadcrumbs-->
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.products') }}">Products</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
        {{--<li style="margin-left: auto">--}}
            {{--@can('role-create')--}}
            {{--<a class="breadcrumb-btn btn btn-success" href="{{ route('admin.products.create') }}"> Create Stores</a>--}}
            {{--@endcan--}}
        {{--</li>--}}
    </ul>
@endsection
