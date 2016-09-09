@inject ('request', 'Illuminate\Http\Request')

<!-- BEGIN .topbar -->
<div class="topbar clearfix">
    <ul class="social-icons fl">
        {{--<li><a href="#"><span id="twitter_icon"></span></a></li>--}}
        <li><a href="{{ config('services.facebook.page-url') }}" target="_blank"><span id="facebook_icon"></span></a></li>
        {{--<li><a href="#"><span id="googleplus_icon"></span></a></li>--}}
        <li><a href="{{ config('services.facebook.messenger-url') }}" target="_blank"><span id="skype_icon"></span></a></li>
        {{--<li><a href="#"><span id="flickr_icon"></span></a></li>--}}
        {{--<li><a href="#"><span id="linkedin_icon"></span></a></li>--}}
        {{--<li><a href="#"><span id="vimeo_icon"></span></a></li>--}}
        {{--<li><a href="#"><span id="youtube_icon"></span></a></li>--}}
        {{--<li><a href="#"><span id="rss_icon"></span></a></li>--}}
    </ul><!-- BEGIN .topbar-right -->
    <div class="topbar-right clearfix">
        <ul class="clearfix">
            <li class="myaccount-icon">
                <a href="{{ route('account.index') }}">
                    @if (auth()->guard('web')->check())
                        Xin chào {{ auth()->guard('web')->user()->display_name }}
                    @else
                        @lang ('front.header.my_account')
                    @endif
                </a>
            </li>
            @if (auth()->guard('web')->check())
                <li>
                    <a href="{{ route('auth.logout') }}">@lang ('front.account.logout_btn')</a>
                </li>
            @endif
            <li class="checkout-icon">
                <a href="{{ route('checkout.index') }}">@lang ('front.header.checkout')</a>
            </li>
        </ul>
        <div class="cart-top">
            <p><a href="{{ route('cart.index') }}">
                <span id="js-cart-items-count">{{ Cart::count() }}</span> {{ trans_choice('front.header.cart_items', Cart::count()) }}
            </a></p>
        </div>
    </div><!-- END .topbar-right -->
</div><!-- END .topbar -->
<div id="site-title">
    <h1><a href="{{ url('/') }}">Organic <span>shop</span></a></h1>
</div>

<!-- BEGIN .main-menu-wrapper -->
<div class="clearfix" id="main-menu-wrapper">
    <ul class="fl clearfix sf-js-enabled" id="main-menu">
        <li id="menu-item-25" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item
        page_item page-item-14 {{ $request->is('/') ? 'current_page_item' : '' }} menu-item-25">
            <a href="{{ url('/') }}">@lang ('front.menu.home')</a>
        </li>
        <li class="menu-item menu-item-type-post_type {{ $request->is('shop*') ? 'current_page_item' : '' }}
                menu-item-object-page menu-item-26 " id="menu-item-26">
            @if ($_allCategories->count() > 0)
                <a class="sf-with-ul" href="{{ route('shop.index') }}">@lang ('front.menu.shop')<span class="sf-sub-indicator"></span></a>
                <ul class="sub-menu" style="display: none; visibility: hidden;">
                    @foreach ($_allCategories as $cat)
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-{{ $cat->id }}"
                            id="menu-item-{{ $cat->id }}">
                            <a href="{{ $cat->front_url }}">{{ ucfirst($cat->name) }}</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <a href="{{ route('shop.index') }}">@lang ('front.menu.shop')</a>
            @endif
        </li>
        {{--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23" id="menu-item-23">--}}
            {{--<a href="http://themes.quitenicestuff.com/organicshopwp/testimonials/">Testimonials</a>--}}
        {{--</li>--}}
        <li class="menu-item menu-item-type-post_type {{ $request->is('blog*') ? 'current_page_item' : '' }} menu-item-object-page menu-item-24" id="menu-item-24">
            <a href="{{ route('blog.index') }}">@lang ('front.menu.blog')</a>
        </li>
        <li class="menu-item menu-item-type-post_type {{ $request->is('contact*') ? 'current_page_item' : '' }} menu-item-object-page menu-item-22" id="menu-item-22">
            <a href="{{ route('contact.index') }}">@lang ('front.menu.contact')</a>
        </li>
    </ul>
    <form action="{{ route('index.search') }}" class="fr" id="menu-search" method="get" name="menu-search">
        <input name="q" type="text">
    </form>
</div><!-- END .main-menu-wrapper -->
