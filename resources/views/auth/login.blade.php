@extends('layouts.cms.auth')

@section('content')

    <div class="login-logo">
        <a href="{{ route('cms.index') }}"><b>Base</b>Skeleton</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{ url('/login') }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">
                <input name="username" type="text" class="form-control" placeholder="Username" autofocus="autofocus">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('username'))
                    <span class="help-block"><strong>{{ $errors->first('username') }}</strong></span>
                @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input name="password" type="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password'))
                    <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8" style="padding-left: 35px">
                    <div class="checkbox icheck">
                        <label>
                            <input name="remember" type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="{{ url('/password/reset') }}">I forgot my password</a><br>
    </div>
    <!-- /.login-box-body -->
@endsection
