@include('admin.partials.head')

{{--@section('content')--}}
<div class="container">
    <div class="col-md-4 offset-4">
        <div class="login-form">
            <form action="{{ route('login') }}" method="post">
                {{ csrf_field() }}

                <h2 class="text-center">Sign in</h2>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input style="outline: none" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                               required autofocus placeholder="Email"  aria-label="Username" aria-describedby="basic-addon1">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        </div>
                        <input id="password" type="password" class="form-control" name="password" required
                               type="password" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block login-btn">Sign in</button>
                </div>
                <div class="clearfix">
                    <label class="pull-left checkbox-inline"><input
                                type="checkbox" {{ old('remember') ? 'checked' : '' }}> Remember me</label>
                    <a href="{{ route('password.request') }}" class="pull-right text-success">Forgot Password?</a>
                </div>
                <div class="or-seperator"><i>or</i></div>

                <div class="text-center social-btn">
                    {{--{{URL::route('login/facebook')}}--}}
                    {{--{{URL::route('login/google')}}--}}
                    <a href="{{URL::route('login.facebook')}}" class="btn facebook btn-block"><i
                                class="fa fa-facebook text"></i> Sign in with <b>Facebook</b></a>
                    <a href="{{URL::route('login.google')}}" class="btn google btn-block"><i class="fa fa-google"></i>
                        Sign in with <b>Google</b></a>
                </div>
            </form>
            <div class="hint-text small">Don't have an account? <a href="{{ route('register') }}" class="text-success">Sign
                    Up Now!</a></div>
        </div>
    </div>

</div>
