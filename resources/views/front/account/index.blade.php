@extends ('layouts.front.master')

@section ('content')
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>
    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">

            <!-- BEGIN .col-main -->
            <li class="col-main">
                <h2 class="page-title">@lang ('front.account.title')</h2>

                @if (auth()->guard('web')->check())
                    <p>{{ auth()->guard('web')->user()->email }}</p>
                    <a class="button2" href="{{ route('auth.logout') }}">@lang ('front.account.logout_btn')</a>
                @else
                    @include ('front.account._fb_login_button')
                @endif
            </li><!-- END .col-main -->

            @include ('layouts.front._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection