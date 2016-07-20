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
            <p><a href="http://themes.quitenicestuff.com/organicshopwp/cart/">0 items</a></p>
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
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26" id="menu-item-26">
            <a class="sf-with-ul" href="http://themes.quitenicestuff.com/organicshopwp/shop/">
                Shop <span class="sf-sub-indicator">»</span></a>
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
        {{--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-83" id="menu-item-83">--}}
            {{--<a class="sf-with-ul" href="http://themes.quitenicestuff.com/organicshopwp/features/">Features--}}
                {{--<span class="sf-sub-indicator">»</span></a>--}}
            {{--<ul class="sub-menu" style="display: none; visibility: hidden;">--}}
                {{--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-99" id="menu-item-99">--}}
                    {{--<a href="http://themes.quitenicestuff.com/organicshopwp/typography/">Typography</a>--}}
                {{--</li>--}}
                {{--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-98" id="menu-item-98">--}}
                    {{--<a class="sf-with-ul" href="http://themes.quitenicestuff.com/organicshopwp/shortcodes/">--}}
                        {{--Shortcodes <span class="sf-sub-indicator">»</span></a>--}}
                    {{--<ul class="sub-menu" style="display: none; visibility: hidden;">--}}
                        {{--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-116"--}}
                            {{--id="menu-item-116">--}}
                            {{--<a href="http://themes.quitenicestuff.com/organicshopwp/accordion-toggle-tabs/">--}}
                                {{--Accordion, Toggle &amp; Tabs</a>--}}
                        {{--</li>--}}
                        {{--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-122" id="menu-item-122">--}}
                            {{--<a href="http://themes.quitenicestuff.com/organicshopwp/alerts-messages/">--}}
                                {{--Alerts &amp; Messages</a>--}}
                        {{--</li>--}}
                        {{--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-127" id="menu-item-127">--}}
                            {{--<a href="http://themes.quitenicestuff.com/organicshopwp/buttons-dropcaps-lists/">--}}
                                {{--Buttons, Dropcaps &amp; Lists</a>--}}
                        {{--</li>--}}
                        {{--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-134" id="menu-item-134">--}}
                            {{--<a href="http://themes.quitenicestuff.com/organicshopwp/googlemap/">Googlemap</a>--}}
                        {{--</li>--}}
                        {{--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-144" id="menu-item-144">--}}
                            {{--<a href="http://themes.quitenicestuff.com/organicshopwp/video/">Video</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-97" id="menu-item-97">--}}
                    {{--<a href="http://themes.quitenicestuff.com/organicshopwp/left-sidebar/">Left Sidebar</a>--}}
                {{--</li>--}}
                {{--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-96" id="menu-item-96">--}}
                    {{--<a href="http://themes.quitenicestuff.com/organicshopwp/right-sidebar/">Right Sidebar</a>--}}
                {{--</li>--}}
                {{--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-95" id="menu-item-95">--}}
                    {{--<a href="http://themes.quitenicestuff.com/organicshopwp/full-width/">Full Width</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</li>--}}
    </ul>
    <form action="http://themes.quitenicestuff.com/organicshopwp/" class="fr" id="menu-search" method="get" name="menu-search">
        <input name="s" type="text">
    </form><!-- END .main-menu-wrapper --><select>
        <option selected="selected" value="">Go to...</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/">Home</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/shop/">Shop »</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/?product_cat=skin-care">Skin Care</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/?product_cat=bath-body-care">Bath &amp; Body Care</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/?product_cat=fragrance">Fragrance</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/?product_cat=make-up">Make-Up</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/?product_cat=hair">Hair</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/?product_cat=moisturisers">Moisturisers</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/testimonials/">Testimonials</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/blog/">Blog</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/contact/">Contact</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/features/">Features »</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/typography/">Typography</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/shortcodes/">Shortcodes »</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/accordion-toggle-tabs/">Accordion, Toggle &amp; Tabs</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/alerts-messages/">Alerts &amp; Messages</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/buttons-dropcaps-lists/">Buttons, Dropcaps &amp; Lists</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/googlemap/">Googlemap</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/video/">Video</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/left-sidebar/">Left Sidebar</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/right-sidebar/">Right Sidebar</option>
        <option value="http://themes.quitenicestuff.com/organicshopwp/full-width/">Full Width</option>
    </select>
</div>
