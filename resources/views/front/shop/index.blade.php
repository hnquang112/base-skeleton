@extends ('layouts.front.master')

@section ('content')
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>

    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">

            <!-- BEGIN .col-main -->
            <li class="col-main">
                <h2 class="page-title">All Products</h2>
                <div class="page-description"></div>

                <ul class="columns-3 clearfix product-list">
                    @forelse ($products as $key => $product)
                        <li class="{{ $key % 3 == 0 ? 'first' : ($key % 3 == 2 ? 'last' : '') }}">
                            <a href="{{ $product->front_url }}">
                                <div class="product-image">
                                    @if ($product->is_on_sale) <span class="onsale">Sale!</span> @endif
                                    <img src="{{ $product->represent_image_path }}" alt="{{ $product->title }}"
                                         title="{{ $product->title }}" class="attachment-shop_catalog wp-post-image">
                                </div>
                                <p class="product-title">{{ $product->title }}</p>
                                <p class="product-price">
                                    @if ($product->is_on_sale)
                                        <del><span class="amount">{{ format_price_with_currency($product->price) }}</span></del>
                                        <ins><span class="amount">{{ format_price_with_currency($product->discount_price) }}</span></ins>
                                    @else
                                        <ins><span class="amount">{{ format_price_with_currency($product->price) }}</span></ins>
                                    @endif
                                </p>
                            </a>
                            <p class="product-button clearfix">
                                <a href="http://themes.quitenicestuff.com/organicshopwp/shop/?add-to-cart=74" rel="nofollow"
                                   data-product-id="{{ $product->id }}" class="button2 product_type_simple">Add to cart</a>
                            </p>
                        </li>
                    @empty
                        <p>No products</p>
                    @endforelse

                    @include ('layouts.front._pagination', ['paginator' => $products])
                </ul>

                <div class="clear"></div>

                <form class="woocommerce_ordering" method="GET">
                    <select name="sort" class="orderby">
                        <option value="menu_order">Default sorting</option>
                        <option value="title">Sort alphabetically</option>
                        <option value="date" selected="selected">Sort by most recent</option>
                        <option value="price">Sort by price</option>
                    </select>
                </form>
            </li><!-- END .col-main -->

            <!-- BEGIN .col-sidebar -->
            <li class="col-sidebar">
                <div class="widget">
                    <div class="widget-title clearfix">
                        <h4 class="tag-title">Price Filter</h4>
                    </div>
                    <form method="GET" action="http://themes.quitenicestuff.com/organicshopwp/shop">
                        <div class="price_slider_wrapper">
                            <div class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" style="">
                                <div class="ui-slider-range ui-widget-header" style="left: 0%; width: 100%;"></div>
                                <a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a>
                                <a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 100%;"></a>
                            </div>
                            <div class="price_slider_amount">
                                <input id="min_price" name="min_price" value="0" data-min="0" placeholder="Min price" style="display: none;" type="text">
                                <input id="max_price" name="max_price" value="47" data-max="47" placeholder="Max price" style="display: none;" type="text">
                                <button type="submit" class="button">Filter</button>
                                <div class="price_label" style="">
                                    Price: <span class="from">£0</span> — <span class="to">£47</span>
                                </div>

                                <div class="clear"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
    </div><!-- END .section -->
@endsection