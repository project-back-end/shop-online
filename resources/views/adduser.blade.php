@include('admin.partials.head')

<head>
    <style>
        .img{
            max-width:180px;
            max-height:180px;
        }
        .adduser{
            border-radius: 5px;
            outline: none;
            background-color: #327CCB;
            border-color: transparent;
            color: white;
        }

    </style>
</head>

<div class="container">
    <div class="row">
        <div class="col-md-10 offset-2">
            <form>
                <h4>Add New User</h4>
                <p>Creare a brand new user and add them to this site.</p>

 {{--username               --}}

                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Username(Required)</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="username">
                    </div>
                </div>
  {{--Email              --}}
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Email(Required)</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="email" >
                    </div>
                </div>
    {{--firstname            --}}
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">First Namae</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="first_name">
                    </div>
                </div>
                {{--last name--}}
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Last Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="last_name">
                    </div>
                </div>
                {{--website--}}
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Website</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="webiste">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-3">
                        <input type="button" class="form-control" id="pwd" value="Show Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Send User Notification</label>
                    <div class="col-sm-6">
                        <input type="checkbox"  id="notification" value="yes" >
                        <span >Send the new user the email about their account</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Role</label>
                    <div class="col-sm-3">
                        <select class="custom-select">
                            <option>Customer</option>
                            <option>User</option>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Avatar</label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control-file" onchange="readURL(this);">
                        <br>
                        <img  class="img" id="blah" src="http://placehold.it/180" alt="your image" />
                        <p>Thumnail</p>

                    </div>
                </div>
                <div class="form-group row">
                    <button class="adduser">Add New User</button>
                </div>
            </form>
        </div>
    </div>

</div>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

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