@extends ('themes.organic.layouts.master')

@section ('content')
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>

    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">

            <!-- BEGIN .col-main -->
            <li class="col-main">
                <h2 class="page-title">@lang('front.blog.title', [
                'object' => trans('front.blog.title_object.products'), 'verb' => ''])</h2>
                <div class="page-description"></div>

                <ul class="columns-3 clearfix product-list">
                    @forelse ($products as $key => $product)
                        <li class="{{ $key % 3 == 0 ? 'first' : ($key % 3 == 2 ? 'last' : '') }}">
                            <a href="{{ $product->front_url }}">
                                <div class="product-image">
                                    @if ($product->is_on_sale) <span class="onsale">@lang ('front.home.product.sale')</span> @endif
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
                                <buton data-product-id="{{ $product->id }}" class="button2 js-add-to-cart">
                                    @lang ('front.home.product.add_to_cart')</buton>
                            </p>
                        </li>
                    @empty
                        <p>No products</p>
                    @endforelse

                    @include ('themes.organic.layouts._pagination', ['paginator' => $products])
                </ul>

                <div class="clear"></div>

                <form id="js-sort-products" method="GET" action="{{ route('shop.index') }}">
                    {{-- {{ dd(Request::get('sort') == 'alphabet') }} --}}
                    <select name="sort" class="orderby" onchange="jQuery('#js-sort-products').submit()">
                        <option value="default" {{ Request::get('sort') == 'default' || !Request::has('sort') ? 'selected=selected' : '' }}>Default sorting</option>
                        <option value="alphabet" {{ Request::get('sort') == 'alphabet' ? 'selected=selected' : '' }}>Sort alphabetically</option>
                        <option value="recent" {{ Request::get('sort') == 'recent' ? 'selected=selected' : '' }}>Sort by most recent</option>
                        <option value="price" {{ Request::get('sort') == 'price' ? 'selected=selected' : '' }}>Sort by price</option>
                    </select>
                </form>
            </li><!-- END .col-main -->

            <!-- BEGIN .col-sidebar -->
            @include ('themes.organic.layouts._sidebar', [
                'hasPriceFilter' => true,
                'start' => Request::get('min_price'),
                'end' => Request::get('max_price'),
                'max' => Cache::get('front.max_product_prices')])
        </ul>
    </div><!-- END .section -->
@endsection