@extends ('layouts.front.master')

@section ('content')
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>
    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">

            <!-- BEGIN .col-main -->
            <li class="col-main">
                <h2 class="page-title">My Account</h2>

                <a href="{{ route('auth.redirect') }}">Login with Facebook</a>

                {{--<form method="post" id="loginform">--}}
                    {{--<div class="field-row">--}}
                        {{--<label for="username">Username or email <span class="required">*</span>--}}
                        {{--</label>--}}
                        {{--<input type="text" class="text_input" name="username" id="username" autocomplete="off">--}}
                    {{--</div>--}}

                    {{--<div class="field-row">--}}
                        {{--<label for="password">Password <span class="required">*</span>--}}
                        {{--</label>--}}
                        {{--<input class="text_input" type="password" name="password" id="password" autocomplete="off">--}}
                    {{--</div>--}}

                    {{--<p class="form-row">--}}
                        {{--<input type="hidden" id="_n" name="_n" value="91f8eeb65f">--}}
                        {{--<input type="hidden" name="_wp_http_referer" value="/organicshopwp/my-account/">--}}
                        {{--<input type="submit" class="button2" name="login" value="Login">--}}
                    {{--</p>--}}
                {{--</form>--}}
            </li><!-- END .col-main -->

            @include ('layouts.front._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection