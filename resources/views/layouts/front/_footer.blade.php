<!-- BEGIN #footer -->
<div id="footer">
    <ul class="columns-4 clearfix">
        <li class="col4">
            <div class="widget">
                <div class="widget-title clearfix"><h6>@lang ('front.footer.customer_services')</h6></div>
                <ul>
                    <li class="contact-phone">{{ App\Setting::getSiteConfigValue('store_phone') }}</li>
                    <li class="contact-mail">{{ App\Setting::getSiteConfigValue('store_email') }}</li>
                </ul>
            </div>
        </li>
        <li class="col4">
            <div class="widget">
                <div class="widget-title clearfix"><h6>{{ trans_choice('front.common.categories', 2) }}</h6></div>
                <ul>
                    @foreach ($_allCategories as $_cat)
                        <li class="cat-item cat-item-{{ $_cat->id }}">
                            <a href="{{ $_cat->front_url }}" title="View all posts filed under {{ ucfirst($_cat->name) }}">
                                {{ ucfirst($_cat->name) }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>
        <li class="col4">
            <div class="widget">
                <div class="widget-title clearfix"><h6>{{ trans_choice('front.common.tags', 2) }}</h6></div>
                <ul class="wp-tag-cloud">
                    @foreach ($_allTags as $_tag)
                        <li><a href="{{ $_tag->front_url }}" class="tag-link-{{ $_tag->id }}" title="1 topic" style="font-size: 14px;">
                                {{ ucfirst($_tag->name) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>

        {{--Put facebook page widget here--}}
        <li class="col4">
            <div class="widget">
                <div class="fb-page" data-href="{{ config('services.facebook.page-url') }}" data-tabs="timeline"
                     data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false"
                     data-show-facepile="true"></div>
            </div>
        </li>
    </ul>
</div><!-- END #footer -->

<!-- BEGIN #footer-bottom -->
<div class="clearfix" id="footer-bottom">
    <div class="fl clearfix">
        <!-- Secondary Menu -->
        <ul class="footer-menu">
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-78" id="menu-item-78">
                <a href="{{ url('/') }}">@lang ('front.menu.home')</a>
            </li>
            {{--<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-80" id="menu-item-80">--}}
                {{--<a href="#">Terms &amp; Conditions</a>--}}
            {{--</li>--}}
            {{--<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-79" id="menu-item-79">--}}
                {{--<a href="#">Return Policy</a>--}}
            {{--</li>--}}
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-77" id="menu-item-77">
                <a href="{{ route('contact.index') }}">@lang ('front.menu.contact')</a>
            </li>
        </ul>
        <p>@lang ('front.footer.copyright')</p>
    </div>
</div><!-- END #footer-bottom -->