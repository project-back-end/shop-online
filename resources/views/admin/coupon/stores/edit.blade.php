@extends('admin.master')
@section('content-title')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.stores') }}">Store</a>
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
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-5">
                {!! Form::model($stores, ['method' => 'PATCH','route' => ['admin.stores.update', $stores->id] , 'enctype' =>"multipart/form-data"]) !!}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                        <p><i>The name is how it appears on your site.</i></p>
                    </div>

                    <div class="form-group">
                        <strong>Slug:</strong>
                        {!! Form::text('slug', null, array('placeholder' => '','class' => 'form-control')) !!}
                        <p><i>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</i></p>
                    </div>

                    <div class="form-group">
                        <strong>Description:</strong>
                        {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
                        <p><i>The description is not prominent by default, however some themes may show it.</i></p>
                    </div>

                    <div class="form-group">
                        <strong>Home URL:</strong>
                        {!! Form::text('home_url', null, array('placeholder' => 'http://example.com','class' => 'form-control')) !!}
                        <p><i>Store Website home page URL.</i></p>
                    </div>

                    <div class="form-group">
                        <strong>Thumbnail:</strong>
                        <div>
                            <input type="file" id="file" name="file" onchange="readURL(this);"/>
                            <div>
                                <br>
                                <img id="blah" src="{{ asset('images/stores/'.$stores->image)}}" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <strong>Feature Store</strong>
                        <div class="checkboxOverride">
                            {!! Form::checkbox('feature_store', '1',null, ['id'=>'checkboxInputOverride'] ) !!}
                            <label for="checkboxInputOverride"></label>
                        </div>
                        <p><i>Check this if you want to this store is featured.</i></p>
                    </div>
                    <div class="form-group">
                        <strong>Store Detials</strong>
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="locat" onclick="getMyID(this.id)">Location</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="addition" onclick="getMyID(this.id)">Additional Information</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div id="location">
                                    <strong>Street:</strong>
                                    {!! Form::text('street', null, array('placeholder' => '','class' => 'form-control')) !!}
                                    <strong>Village:</strong>
                                    {!! Form::text('village', null, array('placeholder' => '','class' => 'form-control')) !!}
                                    <strong>Sangkat:</strong>
                                    {!! Form::text('sangkat', null, array('placeholder' => '','class' => 'form-control')) !!}
                                    <strong>City:</strong>
                                    {!! Form::text('city', null, array('placeholder' => '','class' => 'form-control')) !!}
                                    <strong>Capital/Province:</strong>
                                    {!! Form::text('capital', null, array('placeholder' => '','class' => 'form-control')) !!}
                                    <strong>Country:</strong>
                                    {!! Form::text('country', null, array('placeholder' => '','class' => 'form-control')) !!}
                                    <strong>Latitude:</strong>
                                    {!! Form::text('latitude', null, array('placeholder' => '','class' => 'form-control')) !!}
                                    <strong>Longitude:</strong>
                                    {!! Form::text('longitude', null, array('placeholder' => '','class' => 'form-control')) !!}
                                </div>
                                <div id="add_infor" style="display: none;">
                                    <strong>Tel:</strong>
                                    {!! Form::text('telephone', null, array('placeholder' => '','class' => 'form-control')) !!}
                                    <strong>Email:</strong>
                                    {!! Form::text('email', null, array('placeholder' => '','class' => 'form-control')) !!}
                                    <strong>Facebook URL:</strong>
                                    {!! Form::text('url_facebook', null, array('placeholder' => '','class' => 'form-control')) !!}
                                    <strong>Instagram URL:</strong>
                                    {!! Form::text('url_instagram', null, array('placeholder' => '','class' => 'form-control')) !!}
                                    <strong>Linkedin URL:</strong>
                                    {!! Form::text('url_linked', null, array('placeholder' => '','class' => 'form-control')) !!}
                                    <strong>Website:</strong>
                                    {!! Form::text('url_website', null, array('placeholder' => '','class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                            <a href="{{ route('admin.stores') }}" class="btn btn-success">Back</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $('ul li a').click(function(){
                $('li a').removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>
    <script>
        function getMyID(id){
            console.log(id)
            if(id === 'locat'){
                $("#location").show();
                $("#add_infor").hide();
            }else if(id === 'addition'){
                $("#location").hide();
                $("#add_infor").show();
            }
            else{
                $("#location").show();
            }
        }
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    @endpush