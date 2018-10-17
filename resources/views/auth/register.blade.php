@include('admin.partials.head')
<div class="container">
    <div class="row">
        <div class="login-form">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <p style="text-align: center; font-size: xx-large">Sign Up</p>
                <div class="  form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input style="width: 100%;height:35px;outline: none;border-radius: 5px"
                           class="form-control input-lg" placeholder="Username"
                           id="name" type="text" name="name"
                           value="{{ old('name') }}" required autofocus placeholder="Username">
                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input style="width: 100%;height:35px;outline: none;border-radius: 5px" id="email"
                           class="form-control input-lg" type="text" name="email" value="{{ old('email') }}"
                           required
                           placeholder="E-mail Address"/>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" name="password" required
                           placeholder="Password" style="width: 100%;height:35px;outline: none;border-radius: 5px"
                           class="form-control input-lg">
                    @if ($errors->has('password'))
                        <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                    @endif
                </div>
                <div class="form-group">
                    <input class="form-control input-lg"
                           style="width: 100%;height:35px;outline: none;border-radius: 5px" id="password-confirm"
                           type="password"
                           name="password_confirmation" required placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success  btn-block login-btn">Sign Up</button>
                </div>
                <div class="or-seperator"><i>or</i></div>
                <div class="text-center social-btn">

                    <a href="{{URL::route('login.facebook')}}" class="btn facebook btn-block"><i
                                class="fa fa-facebook text"></i> Sign in with <b>Facebook</b></a>
                    <a href="{{URL::route('login.google')}}" class="btn google btn-block"><i
                                class="fa fa-google"></i> Sign in with <b>Google</b></a>
                </div>
            </form>

            <div class="text-center"><span class="text-muted">Don't have an account?</span> <a
                        href="{{URL::route('login')}}">Sign In</a>
            </div>
        </div>
    </div>
</div>

