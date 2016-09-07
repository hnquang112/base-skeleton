<!-- BEGIN .col-sidebar -->
<li class="col-sidebar">
    @if (isset($hasPriceFilter) && $hasPriceFilter)
        <div class="widget">
            <div class="widget-title clearfix">
                <h4 class="tag-title">@lang ('front.common.price_filter')</h4>
            </div>
            <form method="GET" action="{{ route('shop.index') }}">
                <div class="price_slider_wrapper">
                    <div class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" style="">
                        <div class="ui-slider-range ui-widget-header" style="left: 0%; width: 100%;"></div>
                        <a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a>
                        <a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 100%;"></a>
                    </div>
                    <div class="price_slider_amount">
                        <input id="min_price" name="min_price" value="{{ $start }}" data-min="0" placeholder="Min price"
                            data-currency="đ" data-step="1000" type="hidden">
                        <input id="max_price" name="max_price" value="{{ $end }}" data-max="{{ $max }}" placeholder="Max price" type="hidden">
                        <button type="submit" class="button">Filter</button>
                        <div class="price_label" style="">
                            Price: <span class="from">{{ format_price_with_currency($start) }}</span>
                             — <span class="to">{{ format_price_with_currency($end) }}</span>
                        </div>

                        <div class="clear"></div>
                    </div>
                </div>
            </form>
        </div>
    @endif

    <div class="widget">
        <div class="widget-title clearfix">
            <h4 class="tag-title">{{ trans_choice('front.common.categories', 2) }}</h4>
        </div>
        <ul>
            @foreach ($_allCategories as $_cat)
                <li class="cat-item cat-item-{{ $_cat->id }}">
                    <a href="{{ $_cat->front_url }}" title="View all posts filed under {{ ucfirst($_cat->name) }}">
                        {{ ucfirst($_cat->name) }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="widget">
        <div class="widget-title clearfix">
            <h4 class="tag-title">{{ trans_choice('front.common.tags', 2) }}</h4>
        </div>
        <ul class="wp-tag-cloud">
            @foreach ($_allTags as $_tag)
                <li><a href="{{ $_tag->front_url }}" class="tag-link-{{ $_tag->id }}" title="1 topic" style="font-size: 14px;">
                        {{ ucfirst($_tag->name) }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="widget">
        <div class="widget-title clearfix">
            <h4 class="tag-title">{{ trans_choice('front.common.recent_articles', 2) }}</h4>
        </div>
        <ul class="latest-posts-list clearfix">
            @foreach ($_recentPosts as $_post)
                <li class="clearfix">
                    <div class="lpl-img">
                        <a href="{{ $_post->front_url }}" rel="bookmark">
                            <img width="66" height="66" src="{{ $_post->represent_image_path }}" alt="{{ $_post->title }}">
                        </a>
                    </div>
                    <div class="lpl-content">
                        <h6><a href="{{ $_post->front_url }}" rel="bookmark">{{ $_post->title }}</a>
                            <span> Posted {{ format_date_as_string($_post->published_at) }}
                                By {{ $_post->author->display_name }}</span></h6>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</li>