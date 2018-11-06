@include('admin.partials.head')

<div class="container">
    <div class="row">
        <div class="col-md-10 offset-2">
            <form>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Username <span>( Required )</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="username">
                    </div>
                </div>
                {{--Email              --}}
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Email <span>( Required )</span></label>
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
                {{--password--}}

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Password</label>

                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <input id="password-field" type="password" class="form-control" name="password">
                            <div class="input-group-append">
                                <span class="input-group-text fa-icon fa-fw fa-eye toggle-password" toggle="#password-field ">
                                </span>
                            </div>
                        </div>

                        {{--<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>--}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Send User Notification</label>
                    <div class="col-sm-6 col-form-label">
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
<script>
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>