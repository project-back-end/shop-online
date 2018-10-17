@extends('admin.master')

@section('content-title')
    <!-- Breadcrumbs-->
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.categories') }}">Categories</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
        <li style="margin-left: auto">
            <button class="btn btn-sm btn-danger delete_all pull-right" data-url="{{ url('admin/categories/deleteAll') }}">Delete All Selected</button>
            {{--@can('role-create')--}}
                {{--<a class="breadcrumb-btn btn btn-success" href="{{ route('admin.categories.create') }}"> Create Categories</a>--}}
            {{--@endcan--}}
        </li>
    </ul>
    @endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <span>{{ $message }}</span>
        </div>
    @endif
    <div class="row">
        <div class="col-md-5">
            <form action="{{ route('admin.categories.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="" value="{{ old('name') }}" required autofocus>
                    <p><i>The name is how it appears on your site.</i></p>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                    @endif
                </div>

                <div class="form-group">
                    <strong>Slug:</strong>
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="" value="{{ old('slug') }}">
                    <p><i>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</i></p>
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" name="description" cols="30" rows="10" id="description" placeholder="">{{ old('description') }}</textarea>
                    <p><i>The description is not prominent by default, however some themes may show it.</i></p>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                        <button type="submit" class="btn btn-success">Add New Coupon Category</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-7">
            <table id="example" class="row-border" style="width:100%">
                <thead>
                    <tr>
                        <th width="5%"><input type="checkbox" id="master" placeholder=""></th>
                        <th width="15%">Name</th>
                        <th width="20%">Description</th>
                        <th width="15%">Slug</th>
                        <th width="5%">Posts</th>
                        <th width="40%">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($categories as $key => $category)
                    <tr>
                        <td><input type="checkbox" class="sub_chk" data-id="{{$category->id}}" placeholder=""></td>
                        <td>{!! $category->name  !!}</td>
                        <td>
                            @if($category->description == null)
                                ---
                                @else
                                {!! str_limit($category->description , 80) !!}
                                @endif
                        </td>
                        <td>
                            {!! $category->slug !!}
                        <td>{!! $category->product->count() !!}</td>
                        <td>
                            <a class="btn btn-sm btn-success" href="{{ route('admin.categories.show',$category->id) }}">Show</a>
                            <a class="btn btn-sm btn-info" href="{{ route('admin.categories.edit',$category->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['admin.categories.destroy',$category->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger','onclick' => 'return alertDelete()']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                "columnDefs": [
                    {
                        "orderable": false, "targets": 0
                    },
                    {
                        "orderable": false, "targets": 5
                    }
                ]
            });
        } );
    </script>
    <script>
        function alertDelete() {
            if(confirm('Are you sure you want to delete this user?')){
                return true;
            }else {
                return false;
            }
        }
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
                        console.log(join_selected_values)
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
@endpush