@inject ('request', 'Illuminate\Http\Request')

<!-- BEGIN .topbar -->
<div class="topbar clearfix">
    <ul class="social-icons fl">
        {{--<li><a href="#"><span id="twitter_icon"></span></a></li>--}}
        <li><a href="#"><span id="facebook_icon"></span></a></li>
        {{--<li><a href="#"><span id="googleplus_icon"></span></a></li>--}}
        <li><a href="#"><span id="skype_icon"></span></a></li>
        {{--<li><a href="#"><span id="flickr_icon"></span></a></li>--}}
        {{--<li><a href="#"><span id="linkedin_icon"></span></a></li>--}}
        {{--<li><a href="#"><span id="vimeo_icon"></span></a></li>--}}
        {{--<li><a href="#"><span id="youtube_icon"></span></a></li>--}}
        {{--<li><a href="#"><span id="rss_icon"></span></a></li>--}}
    </ul><!-- BEGIN .topbar-right -->
    <div class="topbar-right clearfix">
        <ul class="clearfix">
            <li class="checkout-icon">
                <a href="http://themes.quitenicestuff.com/organicshopwp/checkout/">Checkout</a>
            </li>
            <li class="myaccount-icon">
                <a href="http://themes.quitenicestuff.com/organicshopwp/my-account/">My Account</a>
            </li>
        </ul>
        <div class="cart-top">
            <p><a href="{{ route('cart.index') }}">{{ Cart::count() }} items</a></p>
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
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="menu-item menu-item-type-post_type {{ $request->is('shop*') ? 'current_page_item' : '' }}
                menu-item-object-page menu-item-26 " id="menu-item-26">
            <a class="sf-with-ul" href="{{ route('shop.index') }}">
                Shop <span class="sf-sub-indicator"></span></a>
            <ul class="sub-menu" style="display: none; visibility: hidden;">
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-200" id="menu-item-200">
                    <a href="http://themes.quitenicestuff.com/organicshopwp/?product_cat=skin-care">Skin Care</a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-199" id="menu-item-199">
                    <a href="http://themes.quitenicestuff.com/organicshopwp/?product_cat=bath-body-care">
                        Bath &amp; Body Care</a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-198" id="menu-item-198">
                    <a href="http://themes.quitenicestuff.com/organicshopwp/?product_cat=fragrance">Fragrance</a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-196" id="menu-item-196">
                    <a href="http://themes.quitenicestuff.com/organicshopwp/?product_cat=make-up">Make-Up</a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-195" id="menu-item-195">
                    <a href="http://themes.quitenicestuff.com/organicshopwp/?product_cat=hair">Hair</a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-197" id="menu-item-197">
                    <a href="http://themes.quitenicestuff.com/organicshopwp/?product_cat=moisturisers">Moisturisers</a>
                </li>
            </ul>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23" id="menu-item-23">
            <a href="http://themes.quitenicestuff.com/organicshopwp/testimonials/">Testimonials</a>
        </li>
        <li class="menu-item menu-item-type-post_type {{ $request->is('blog*') ? 'current_page_item' : '' }} menu-item-object-page menu-item-24" id="menu-item-24">
            <a href="{{ route('blog.index') }}">Blog</a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22" id="menu-item-22">
            <a href="http://themes.quitenicestuff.com/organicshopwp/contact/">Contact</a>
        </li>
    </ul>
    <form action="http://themes.quitenicestuff.com/organicshopwp/" class="fr" id="menu-search" method="get" name="menu-search">
        <input name="s" type="text">
    </form>
</div><!-- END .main-menu-wrapper -->
