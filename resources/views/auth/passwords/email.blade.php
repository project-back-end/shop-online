@include('admin.partials.head')


<div class="container">
    <div class="row">
        <div style="top: 100px" class="col-md-4 offset-4">
            <div class="card card-default">
                <div class="card-body">
                    <div class="text-center">
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h2 class="text-center">Forgot Password?</h2>
                        <p>You can reset your password here.</p>
                        <div class="panel-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                                {{ csrf_field() }}
                                <fieldset class="col-md-12">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="input-group">
                                                <span class="input-group-addon"><i style="font-size: large"
                                                                                   class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input id="email" type="email" class="form-control" name="email"
                                                   value="{{ old('email') }}" required placeholder="Your Email Address">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                         <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input style="color: white;font-size: medium"
                                               class="btn btn-success btn-sm btn-block" value="Send Password Reset Link"
                                               type="submit">
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
