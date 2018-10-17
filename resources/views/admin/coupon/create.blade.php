@extends('admin.master')

@section('content-title')
    <!-- Breadcrumbs-->
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.stores') }}">Stores</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
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
        <div class="col-lg-8 col-md-12">
            <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6 form-inline">
                                    <div class="form-group">
                                        <label for="st_id" class="mr-sm-5"><b>Coupon Stores:</b></label>
                                        {!! Form::select('st_id', $stores, null, ['id' => 'st_id', 'class' => 'form-control', 'required' => 'required']) !!}
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6 form-inline">
                                    <div class="form-group">
                                        <label for="cat_id" class="mr-sm-4"><b>Coupon Category:</b></label>
                                        {!! Form::select('cat_id', $categories, null, ['id' => 'cat_id', 'class' => 'form-control', 'required' => 'required']) !!}
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <br>
                <div class="card form-group">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" id="name" name="name" placeholder="" class="form-control">
                                <p><i>The name is how it appears on your site.</i></p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <strong>Description:</strong>
                            <div class="form-group">
                                <textarea name="description" id="description" cols="30" rows="10" placeholder="" class="form-control"></textarea>
                                <p><i>The description is not prominent by default, however some themes may show it.</i></p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="type"><b>Coupon Type:</b></label>
                                        <select id="type" class="form-control" name="type">
                                            <option value="code">Code</option>
                                            <option value="deal">Deal</option>
                                            <option value="printable">Printable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" id="code_show">
                            <div class="form-group">
                                <strong>Coupon Code:</strong>
                                <input type="text" id="code" name="code" placeholder="Example:EMIAXHGF" class="form-control">
                            </div>
                        </li>
                        <li class="list-group-item" id="print_show" style="display: none">
                            <div class="form-group">
                                <strong>Coupon Printable Image</strong>
                                <div class="input-group input-file" name="printable">
                                    <input type="text" id="print" class="form-control" placeholder='Choose a file...'/>
                                    <span class="input-group-btn">
        		                        <button class="btn btn-default btn-choose" type="button">Choose</button>
                                    </span>
                                </div>
                                <div>
                                    <br>
                                    <img id="blah" src="" alt=""/>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" id="url_show">
                            <div class="form-group">
                                <strong>Coupon URL:</strong>
                                <input type="text" id="url" name="url" placeholder="http://..." class="form-control">
                                <p><i>Coupon URL, if this field empty then Store Aff URL will be use.</i></p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3"><b>Expires Date</b></span>
                                </div>
                                <input type="text" name="end_date" class="form-control" id="enddatepicker" aria-describedby="basic-addon3" placeholder="M-D-Y">
                            </div>
                            <p><i>Set expires for coupon. By default expires date based on GMT+0</i></p>
                        </li>
                        <li class="list-group-item">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3"><b>Starts Date :</b></span>
                                </div>
                                <input type="text" name="start_date" class="form-control" id="startdatepicker" aria-describedby="basic-addon3" placeholder="M-D-Y">
                            </div>
                            <p><i>Set start date for coupon. By default start date based on GMT+0</i></p>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group">
                                <strong>Exclusive Coupon:</strong>
                                <div class="checkboxOverride">
                                    {!! Form::checkbox('feature_store', '1', null, ['id'=>'checkboxInputOverride'] ) !!}
                                    <label for="checkboxInputOverride"></label>
                                </div>
                                <p><i>This coupon is exclusive</i></p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group">
                                <strong>Slug:</strong>
                                <input type="text" id="slug" name="slug" placeholder="" class="form-control">
                                <p><i>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</i></p>
                            </div>
                        </li>
                    </ul>
                </div>

                {{--<div class="form-group">--}}
                    {{--<strong>Status:</strong>--}}
                    {{--{!! Form::checkbox('status', '1', null, ['id'=>'status'] ) !!}--}}
                {{--</div>--}}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                        <a class="btn btn-success" href="{{ route('admin.stores') }}"> Back</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
 @endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
    <script>
        $( function() {
            $( "#startdatepicker" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd"
            });
        } );
        $( function() {
            $( "#enddatepicker" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd"
            });
        } );
    </script>
    <script>
        $('#type').on('change', function () {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            if (valueSelected == 'code') {
                $("#code_show").show();
                $("#url_show").show();
                $("#print_show").hide().find('#print').val(null);
            }
            else if (valueSelected == 'deal') {
                $("#url_show").show();
                $("#code_show").hide().find('#code').val(null);
                $("#print_show").hide().find('#print').val(null);
            }
            else if (valueSelected == 'printable') {
                $("#code_show").hide().val(null);
                $("#print_show").show();
                $("#url_show").show();
            }
            else {
                $("#url_show").hide().find('#url').val(null);
                $("#code_show").hide().find('#code').val(null);
                $("#print_show").hide().find('#print').val(null);
            }
        });
    </script>
    <script>
        function bs_input_file() {
            $(".input-file").before(
                function() {
                    if ( ! $(this).prev().hasClass('input-ghost') ) {
                        var element = $("<input type='file' id='file' name='file' onchange='readURL(this);' class='input-ghost' style='visibility:hidden; height:0'>");
                        element.attr("name",$(this).attr("name"));
                        element.change(function(){
                            element.next(element).find('input').val((element.val()).split('\\').pop());
                        });
                        $(this).find("button.btn-choose").click(function(){
                            element.click();
                        });
                        $(this).find('input').css("cursor","pointer");
                        $(this).find('input').mousedown(function() {
                            $(this).parents('.input-file').prev().click();
                            return false;
                        });
                        return element;
                    }
                }
            );
        }
        $(function() {
            bs_input_file();
        });
    </script>
@endpush