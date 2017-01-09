@extends('layouts.cms.auth')

@section('content')
    <div class="login-logo">
        <a href="{{ route('cms.index') }}"><b>Base</b>Skeleton</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Enter your e-mail to reset password</p>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ url('cms/password/email') }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                <input name="email" type="email" class="form-control" placeholder="E-mail Address" autofocus="autofocus">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                @endif
            </div>

            <div class="pull-right">
                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    <span class="glyphicon glyphicon-send"></span> Send Reset Link
                </button>
            </div>
        </form>

        <br><a href="{{ url('/cms/login') }}">Back to Log in page</a>
    </div><!-- /.login-box-body -->
@endsection
