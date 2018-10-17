@extends('admin.master')

@section('content-title')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.stores') }}">Store</a>
        </li>
        <li class="breadcrumb-item active">View</li>
    </ol>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <div>
                    <img src="{{ asset('images/products/'.$products->image ) }}" alt="{{ $products->name }}">
                </div>
            </div>
            <div class="form-group">
                <strong>Name:</strong>
                {!! $products->name !!}
            </div>
            <div class="form-group">
                <strong>Slug:</strong>
                {{ $products->slug }}
            </div>
            <div class="form-group">
                <strong>type:</strong>
                {{ $products->type }}
            </div>
            <div class="form-group">
                <strong>Printable Image:</strong>
                <div>
                    <img src="{{ asset('images/printable/'.$products->printable ) }}" alt="{{ $products->name }}">
                </div>
            </div>
            <div class="form-group">
                <strong>Description:</strong>
                {!! $products->description !!}
            </div>
            <div class="form-group">
                <strong>Url: </strong>
                {{ $products->url }}
            </div>
            <div class="form-group">
                <strong>Expire: </strong>
                {{ $products->end_date }}
            </div>
            <a class="btn btn-success" href="{{ route('admin.products') }}"> Back</a>
        </div>
@endsection