@include('views.admin.partials.head')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f1f1f1;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        button {
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }

        #prevBtn {
            background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #4CAF50;
        }


/*Upload Image*/

        body {
            background: whitesmoke;
            font-family: "Open Sans", sans-serif;
        }
        .container {
            max-width: 960px;
            margin: 30px auto;
            padding: 20px;
        }
        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 0px auto;
        }
        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 20px;
        }
        .avatar-upload .avatar-edit input {
            display: none;
        }
        .avatar-upload .avatar-edit input + label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #ffffff;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }
        .avatar-upload .avatar-edit input + label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }
        .avatar-upload .avatar-edit input + label:after {
            content: "\f040";
            font-family: "FontAwesome";
            color: #757575;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }
        .avatar-upload .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #f8f8f8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .avatar-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

    </style>
</head>
@section('content')
    <div class="container">
        <div class="row">
            <div class="login-form">
                <form id="regForm" class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <p style="text-align: center; font-size: xx-large">Sign Up</p>
        {{--step1--}}
                    <div class="tab">
                        {{--firstname--}}
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <input oninput="this.className = ''"
                                   style="width: 100%;height:35px;outline: none;border-radius: 5px"
                                   class="form-control input-lg" placeholder="First Name"
                                   id="name" type="text" name="fname"
                                   value="{{ old('first_name') }}" required autofocus placeholder="First Name">
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        {{--lastname--}}
                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <input oninput="this.className = ''"
                                   style="width: 100%;height:35px;outline: none;border-radius: 5px"
                                   class="form-control input-lg" placeholder="Last Name"
                                   id="name" type="text" name="lname"
                                   value="{{ old('last_name') }}" required autofocus placeholder="Last Name">
                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                            @endif
                        </div>
{{--date of birth--}}
                        <div class=" form-group">
                            <input oninput="this.className = ''"
                                   style="width: 100%;height:35px;outline: none;border-radius: 5px"
                                   class="form-control input-lg" placeholder="Date of Birth(dd/mm/yy)"
                                   id="name" type="text" name="dob"
                                   value="{{ old('dob') }}" required autofocus placeholder="Date of Birth(dd/mm/yy) ">
                            @if ($errors->has('dob'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                            @endif
                        </div>

                {{--Age and Gender            --}}
                        <div class="row">
                            <div class=" col-md-6 form-group">
                                <input oninput="this.className = ''"
                                       style="width: 100%;height:35px;outline: none;border-radius: 5px"
                                       class="form-control input-lg" placeholder="Age"
                                       id="name" type="text" name="age"
                                       value="{{ old('age') }}" required autofocus placeholder="Age">
                                @if ($errors->has('age'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class=" col-md-6 form-group">
                                <input oninput="this.className = ''"
                                       style="width: 100%;height:35px;outline: none;border-radius: 5px"
                                       class="form-control input-lg" placeholder="Gender"
                                       id="name" type="text" name="gender"
                                       value="{{ old('gender') }}" required autofocus placeholder="Gender">

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                    </div>
        {{--step2--}}
                    <div class="tab">
                        username
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input oninput="this.className = ''"
                                   style="width: 100%;height:35px;outline: none;border-radius: 5px"
                                   class="form-control input-lg" placeholder="Username"
                                   id="name" type="text" name="name"
                                   value="{{ old('name') }}" required autofocus placeholder="Username">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        email
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input oninput="this.className = ''"
                                   style="width: 100%;height:35px;outline: none;border-radius: 5px" id="email"
                                   class="form-control input-lg" type="text" name="email" value="{{ old('email') }}"
                                   required
                                   placeholder="E-mail Address"/>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif

                        </div>
                        password
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input oninput="this.className = ''" id="password" type="password" name="password" required
                                   placeholder="Password"
                                   style="width: 100%;height:35px;outline: none;border-radius: 5px"
                                   class="form-control input-lg">
                            @if ($errors->has('password'))
                                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif
                        </div>
                        confirm Password
                        <div class="form-group">
                            <input oninput="this.className = ''" class="form-control input-lg"
                                   style="width: 100%;height:35px;outline: none;border-radius: 5px"
                                   id="password-confirm"
                                   type="password"
                                   name="password_confirmation" required placeholder="Confirm Password">
                        </div>
                    </div>
        {{--step3--}}
                    <div class="tab">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="overflow:auto;">
                        <div style="text-align: right">
                            <button style="outline: none" type="button" class="btn " id="prevBtn"
                                    onclick="nextPrev(-1)">Previous
                            </button>
                            <button style="outline: none" type="button" class="btn btn-success " id="nextBtn"
                                    onclick="nextPrev(1)">Next
                            </button>
                        </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div class="or-seperator"><i>or</i></div>
                    <div class="text-center social-btn">

                        <a href="{{URL::route('login.facebook')}}" class="btn facebook btn-block"><i
                                    class="fa fa-facebook text"></i> Sign in with <b>Facebook</b></a>
                        <a href="{{URL::route('login.google')}}" class="btn google btn-block"><i
                                    class="fa fa-google"></i> Sign in with <b>Google</b></a>
                    </div>
                    <div style="text-align:center;margin-top:20px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                </form>
                <div class="text-center"><span class="text-muted">Don't have an account?</span> <a
                            href="{{URL::route('login')}}">Sign In</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the crurrent tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    </script>


    {{--@endsection--}}
