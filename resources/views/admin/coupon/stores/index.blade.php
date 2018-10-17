@extends('admin.master')

@section('content-title')
    <!-- Breadcrumbs-->
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.stores') }}">Stores</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
        <li style="margin-left: auto">
            <button class="btn btn-sm btn-danger delete_all pull-right" data-url="{{ url('admin/stores/deleteAll') }}">Delete All Selected</button>
            {{--@can('role-create')--}}
                {{--<a class="breadcrumb-btn btn btn-success" href="{{ route('admin.stores.create') }}"> Create Stores</a>--}}
            {{--@endcan--}}
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <span>{{ $message }}</span>
                </div>
            @endif
        </div>
        <div class="col-md-5">
            <form action="{{ route('admin.stores.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <p><i>The name is how it appears on your site.</i></p>
                </div>

                <div class="form-group">
                    <strong>Slug:</strong>
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="">
                    <p><i>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</i></p>
                </div>

                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" cols="30" rows="10" id="description" placeholder="">{{old('description')}}</textarea>
                    @if ($errors->has('description'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                    <p><i>The description is not prominent by default, however some themes may show it.</i></p>
                </div>

                <div class="form-group">
                    <strong>Home URL:</strong>
                    <input type="text" class="form-control{{ $errors->has('home_url') ? ' is-invalid' : '' }}" name="home_url" id="url" placeholder="http://example.com" value="{{old('home_url')}}">
                    @if ($errors->has('home_url'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('home_url') }}</strong>
                        </span>
                    @endif
                    <p><i>Store Website home page URL.</i></p>
                </div>

                <div class="form-group">
                    <strong>Thumbnail:</strong>
                    <div>
                        <input type="file" id="file" name="file" onchange="readURL(this);" required/>
                        <div>
                            <br>
                           <img id="blah" src="" alt="" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <strong>Feature Store</strong>
                    <div class="checkboxOverride">
                        {!! Form::checkbox('feature_store', '1', null, ['id'=>'checkboxInputOverride'] ) !!}
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
                                <input type="text" name="street" class="form-control" placeholder="" value="{{old('street')}}">
                                <strong>Village:</strong>
                                <input type="text" name="village" class="form-control" placeholder="" value="{{old('village')}}">
                                <strong>Sangkat:</strong>
                                <input type="text" name="sangkat" class="form-control" placeholder="" value="{{old('sangkat')}}">
                                <strong>City:</strong>
                                <input type="text" name="city" class="form-control" placeholder="" value="{{old('city')}}">
                                <strong>Capital/Province:</strong>
                                <input type="text" name="capital" class="form-control" placeholder="" value="{{old('capital')}}">
                                <strong>Country:</strong>
                                <input type="text" name="country" class="form-control" placeholder="" value="Cambodia">
                                <strong>Latitude:</strong>
                                <input type="text" name="latitude" class="form-control" placeholder="" value="{{old('latitude')}}">
                                <strong>Longitude:</strong>
                                <input type="text" name="longitude" class="form-control" placeholder="" value="{{old('longitude')}}">
                            </div>
                            <div id="add_infor" style="display: none;">
                                <strong>Tel:</strong>
                                <input type="text" name="telephone" class="form-control" placeholder="" value="{{old('description')}}">
                                <strong>Email:</strong>
                                <input type="email" name="email" class="form-control" placeholder="" value="{{old('email')}}">
                                <strong>Facebook URL:</strong>
                                <input type="text" name="url_facebook" class="form-control {{ $errors->has('url_facebook') ? ' is-invalid' : '' }}" placeholder="" value="{{old('url_facebook')}}">
                                @if ($errors->has('url_facebook'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('url_facebook') }}</strong>
                                    </span>
                                @endif
                                <strong>Instagram URL:</strong>
                                <input type="text" name="url_instagram" class="form-control {{ $errors->has('url_instagram') ? ' is-invalid' : '' }}" placeholder="" value="{{old('url_instagram')}}">
                                @if ($errors->has('url_instagram'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('url_instagram') }}</strong>
                                    </span>
                                @endif
                                <strong>Linkedin URL:</strong>
                                <input type="text" name="url_linked" class="form-control {{ $errors->has('url_linked') ? ' is-invalid' : '' }}" placeholder="" value="{{old('url_linked')}}">
                                @if ($errors->has('url_linked'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('url_linked') }}</strong>
                                    </span>
                                @endif
                                <strong>Website:</strong>
                                <input type="text" name="url_website" class="form-control {{ $errors->has('url_website') ? ' is-invalid' : '' }}" placeholder="" value="{{old('url_website')}}">
                                @if ($errors->has('url_website'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('url_website') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-7">
            <table id="example" class="row-border" style="width:100%">
                <thead>
                <tr>
                    <th width="5%"><input type="checkbox" id="master" placeholder=""></th>
                    <th width="15%">Image</th>
                    <th width="15%">Name</th>
                    <th width="15%">Slug</th>
                    <th width="5%">Counts</th>
                    <th width="5%"><i class="fas fa-star-half-alt"></i></th>
                    <th width="40%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($stores as $key => $store)
                    <tr id="tr_{{$store->id}}">
                        <td><input type="checkbox" class="sub_chk" data-id="{{$store->id}}" placeholder=""></td>
                        <td>
                            <img src="{{ asset('images/stores/'.$store->image) }}" width="100%" alt="{{ $store->name }}">
                        </td>
                        <td>
                            {!! $store->name !!}
                        </td>
                        <td>
                            @if($store->slug == null)
                                ---
                                @else
                                {!! str_slug($store->slug) !!}
                                @endif
                        </td>
                        <td>
                            {!! $store->product->count() !!}
                        </td>
                        <td>
                            @if($store->feature_store == 0)
                                <i class="far fa-star"></i>
                            @else
                                <i class="fas fa-star"></i>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-sm btn-success" href="{{ route('admin.stores.show',$store->id) }}">Show</a>
                            @can('user-edit')
                            <a class="btn btn-sm btn-info" href="{{ route('admin.stores.edit',$store->id) }}">Edit</a>
                            @endcan
                            @can('user-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['admin.stores.destroy',$store->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger','onclick' => 'return alertDelete()']) !!}
                            {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
@push('scripts')
    {{--Display Id--}}
    <script>
        function getMyID(id){
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
    {{--Active--}}
    <script>
        $(document).ready(function(){
            $('ul li a').click(function(){
                $('li a').removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>
    {{--Display Image--}}
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
    {{--DataTable--}}
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js">

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, 100, "All"]],
                "columnDefs": [
                    {
                        "orderable": false, "targets": 0
                    },
                    {
                        "orderable": false , "targets": 1
                    },
                    {
                        "orderable": false , "targets": 5
                    },
                    {
                        "orderable": false , "targets": 6
                    }
                ]
            });
//            var table = $('#example').DataTable();
//
//            table.button().add( 0, {
//                action: function ( e, dt, button, config ) {
//                    dt.ajax.reload();
//                },
//                text: 'Reload table'
//            } );
//            var table = $('#example').DataTable( {
//                buttons: [
//                    'copy', 'excel', 'pdf'
//                ]
//            } );
//
//            table.buttons().container()
//                .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

        } );
    </script>
    {{--Delete All--}}
    <script type="text/javascript">
        $(document).ready(function () {


            $('#master').on('click', function(e) {
                if($(this).is(':checked',true))
                {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked',false);
                }
            });


            $('.delete_all').on('click', function(e) {


                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });


                if(allVals.length <=0)
                {
                    alert("Please select row.");
                }  else {

                    var check = confirm("Are you sure you want to delete this row?");
                    if(check == true){


                        var join_selected_values = allVals.join(",");
                        $.ajax({
                            url: $(this).data('url'),
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids='+join_selected_values,
                            success: function (data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    alert(data['success']);
                                } else if (data['error']) {
                                    alert(data['error']);
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function (data) {
                                alert(data.responseText);
                            }
                        });


                        $.each(allVals, function( index, value ) {
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                    }
                }
            });


            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function (event, element) {
                    element.trigger('confirm');
                }
            });


            $(document).on('confirm', function (e) {
                var ele = e.target;
                e.preventDefault();


                $.ajax({
                    url: ele.href,
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {
                        if (data['success']) {
                            $("#" + data['tr']).slideUp("slow");
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });


                return false;
            });
        });
    </script>
    {{--Delete Single--}}
    <script>
        function alertDelete() {
            if(confirm('Are you sure you want to delete this store?')){
                return true;
            }else {
                return false;
            }
        }
    </script>
@endpush