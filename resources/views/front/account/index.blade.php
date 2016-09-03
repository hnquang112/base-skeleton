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
                    <p style="text-align: center">
                        <a href="{{ route('auth.redirect') }}" class="sc-btn sc--facebook sc--flat">
                            <span class="sc-icon">
                                <svg viewBox="0 0 33 33" width="25" height="25" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M 17.996,32L 12,32 L 12,16 l-4,0 l0-5.514 l 4-0.002l-0.006-3.248C 11.993,2.737, 13.213,0, 18.512,0l 4.412,0 l0,5.515 l-2.757,0 c-2.063,0-2.163,0.77-2.163,2.209l-0.008,2.76l 4.959,0 l-0.585,5.514L 18,16L 17.996,32z"></path></g></svg>
                            </span>
                            <span class="sc-text">@lang ('front.account.fb_login_btn')</span>
                        </a>
                    </p>
                @endif
            </li><!-- END .col-main -->

            @include ('layouts.front._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection