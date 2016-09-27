<!-- BEGIN .section-mini2 -->
<div class="section-mini2">
    <div class="tag-title-wrap clearfix"><h4 class="tag-title">{{ trans_choice('front.home.featured_products', 2) }}</h4></div>
    <ul class="products">
        @foreach ($featuredProducts as $product)
            <li class="{{ $loop->first ? 'first' : ($loop->last ? 'last' : '') }}">
                <a href="{{ $product->front_url }}">
                    <div class="product-image">
                        @if ($product->is_on_sale) <span class="onsale">@lang ('front.home.product.sale')</span> @endif
                        <img alt="image4" class="attachment-shop_catalog wp-post-image"
                             src="{{ $product->represent_image_path }}" title="image4">
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
        @endforeach
    </ul>
</div><!-- END .section-mini2 -->

<!-- BEGIN .section -->
<div class="section">
    <div class="tag-title-wrap clearfix"><h4 class="tag-title">@lang ('front.home.testimonials')</h4></div>
    <ul class="columns-2 clearfix">
        @foreach ($reviews as $review)
            <li class="col2">
                <div class="testimonial-wrapper clearfix">
                    <div class="testimonial-author-image"><img alt="" src="{{ Gravatar::get($review->email) }}"></div>
                    <div class="testimonial-text">
                        <p>“{{ $review->message }}”</p>
                    </div>
                    <div class="testimonial-speech"></div>
                </div>
                <p class="testimonial-author">{{ $review->name }} - <span>@lang ('home.testimonials.purchased') {{ $review->product->title }}</span></p>
            </li>
        @endforeach
    </ul>
</div><!-- END .section -->
