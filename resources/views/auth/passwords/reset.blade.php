@extends('layouts.cms.auth')

@section('content')
    <div class="login-logo">
        <a href="{{ route('cms.index') }}"><b>Base</b>Skeleton</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Enter your new password</p>

        <form action="{{ url('cms/password/reset') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                <input name="email" type="email" class="form-control" placeholder="E-mail Address" autofocus="autofocus"
                       value="{{ $email or old('email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input name="password" type="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password'))
                    <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                @endif
            </div>

            <div class="pull-right">
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-refresh"></span> Reset Password
                </button>
            </div>
        </form>

        <br><br>
    </div><!-- /.login-box-body -->
@endsection
