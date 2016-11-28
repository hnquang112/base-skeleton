@extends ('layouts.front.master')

@section ('content')
    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">

            <!-- BEGIN .col-main -->
            <li class="col-main">
                <h2 class="page-title">{{ $product->title }}</h2>

                <ul class="columns-2 product-single-content clearfix">
                    <li class="post-73 product type-product status-publish hentry col2 clearfix" id="product-73">
                        @if ($product->is_on_sale) <span class="onsale">@lang ('front.home.product.sale')</span> @endif
                        <div class="images">
                            <a itemprop="image" href="{{ get_image_path($product->represent_image) }}"
                               class="zoom" rel="thumbnails" title="image2">
                                <img src="{{ get_image_path($product->represent_image) }}" alt="image2" title="image2"
                                     class="attachment-shop_single wp-post-image">
                            </a>
                            <div class="thumbnails"></div>
                        </div>
                    </li>

                    <li class="col2 clearfix">
                        <div class="summary">
                            <div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                                <h2 itemprop="price" class="product-price-single">
                                    @if ($product->is_on_sale)
                                        <del><span class="amount">{{ format_price_with_currency($product->price) }}</span></del>
                                        <ins><span class="amount">{{ format_price_with_currency($product->discount_price) }}</span></ins>
                                    @else
                                        <ins><span class="amount">{{ format_price_with_currency($product->price) }}</span></ins>
                                    @endif
                                </h2>

                                <link itemprop="availability" href="http://schema.org/InStock">
                            </div>
                            <div itemprop="description">
                                <p>{{ $product->short_description }}</p>
                            </div>

                            <div class="qty-product-single clearfix cart">
                                <div class="qty-fields-large clearfix fl">
                                    <input name="quantity" data-min="1" data-max="0" value="1" size="4" title="Qty"
                                           class="qty-text js-qty-add-to-cart" maxlength="12" readonly>
                                </div>
                                <button class="single_add_to_cart_button button3 fr alt js-add-to-cart" data-product-id="{{ $product->id }}">
                                    @lang ('front.home.product.add_to_cart')
                                </button>
                            </div>

                            <div class="product_meta">
                                <span class="posted_in">Category:
                                    @foreach ($product->categories as $key => $cat)
                                        <a href="{{ $cat->front_url }}" rel="tag">{{ $cat->name }}</a>
                                        @if ($key < $product->categories()->count() - 1), @endif
                                    @endforeach
                                </span>
                            </div>
                        </div>
                    </li><!-- .summary -->
                </ul>

                <div id="tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
                    <ul class="nav clearfix ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
                        <li class="description_tab ui-state-default ui-corner-top ui-tabs-selected ui-state-active">
                            <a href="#description">@lang ('front.shop.description_tab')</a>
                        </li>
                        <li class="reviews_tab ui-state-default ui-corner-top">
                            <a href="#reviews">@lang ('front.shop.review_tab') ({{ $reviews->count() }})</a>
                        </li>
                    </ul>
                    <div id="description" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
                        <p>{!! $product->content !!}</p>
                    </div>
                    <div id="reviews" class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide">
                        <div id="comments">
                            @if ($reviews->count() > 0)
                                <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                                    <div class="star-rating" title="@lang ('front.shop.review.out_of', ['rating' => $product->average_rating])"{{--Rated :x out of 5--}}>
                                        {{--80px is 100%--}}
                                        <span style="width:{{ calc_stars_from_rating($product->average_rating) }}px">
                                            <span itemprop="ratingValue" class="rating">{{ $product->average_rating }}</span> @lang ('front.shop.review.out_of') 5
                                        </span>
                                    </div>
                                    <h2><span itemprop="ratingCount" class="count">{{ $reviews->count() }}</span> {{ trans_choice('front.shop.review.count', $reviews->count()) }}
                                        {{ $product->title }}</h2>
                                </div>

                                <ol class="commentlist">
                                    @foreach ($reviews as $review)
                                        <li itemprop="reviews" itemscope="{{ $review->rating }}" itemtype="http://schema.org/Review"
                                            class="comment even thread-even depth-1" id="li-comment-{{ $review->id }}">
                                            <div id="comment-{{ $review->id }}" class="comment_container">
                                                <img alt="" src="{{ Gravatar::get($review->email) }}" class="avatar avatar-60 photo" height="60" width="60">
                                                <div class="comment-text">
                                                    <div itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating"
                                                         class="star-rating" title="{{ $review->rating }}">
                                                        <span style="width:{{ calc_stars_from_rating($review->rating) }}px">
                                                            <span itemprop="ratingValue">{{ $review->rating }}</span> @lang ('front.shop.review.out_of') 5
                                                        </span>
                                                    </div>

                                                    <p class="meta">
                                                        <strong itemprop="author">{{ $review->name }}</strong> –
                                                        <time itemprop="datePublished" time="" datetime="{{ $review->created_at }}">{{ $review->created_at }}</time>:
                                                    </p>

                                                    <div itemprop="description" class="description">
                                                        <p>{{ $review->message }}</p>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                                <p class="add_review"><a href="#review_form" class="inline show_review_form button2">@lang ('front.shop.review.add_btn')</a></p>
                            @else
                                <h2>@lang ('front.shop.review_tab')</h2>

                                <p>@lang ('front.shop.review.no_reviews') <a href="#review_form" class="inline show_review_form">@lang ('front.shop.review.submit_yours')</a>?</p>
                            @endif
                        </div>
                        <div id="review_form_wrapper" style="display: none;">
                            <div id="review_form">
                                <div id="respond">
                                    <h3 id="reply-title">@lang ('front.shop.review.be_the_first') “{{ $product->title }}”</h3>

                                    <form action="{{ route('shop.review', $product->id) }}" method="post" id="commentform">
                                        {{ csrf_field() }}

                                        <p class="comment-form-author">
                                            <label for="author">@lang ('front.shop.review.name')</label> <span class="required">*</span>
                                            <input id="author" name="name" type="text" value="" size="30" required>
                                        </p>
                                        <p class="comment-form-email">
                                            <label for="email">@lang ('front.shop.review.email')</label> <span class="required">*</span>
                                            <input id="email" name="email" type="email" value="" size="30" required>
                                        </p>
                                        <p class="comment-form-rating">
                                            <label for="rating">@lang ('front.shop.review.rating')</label>
                                            <p class="stars"><span>
                                                <a class="star-1" href="#">1</a>
                                                <a class="star-2" href="#">2</a>
                                                <a class="star-3" href="#">3</a>
                                                <a class="star-4" href="#">4</a>
                                                <a class="star-5" href="#">5</a>
                                            </span></p>
                                            <select name="rating" id="rating" style="display: none;">
                                                <option value="">Rate…</option>
                                                <option value="5">Perfect</option>
                                                <option value="4">Good</option>
                                                <option value="3">Average</option>
                                                <option value="2">Not that bad</option>
                                                <option value="1">Very Poor</option>
                                            </select>
                                        </p>
                                        <p class="comment-form-comment">
                                            <label for="comment">@lang ('front.shop.review.message')</label>
                                            <textarea id="comment" name="message" cols="45" rows="8" required></textarea>
                                        </p>
                                        <p class="form-submit">
                                            <button id="submit">@lang ('front.shop.review.submit_btn')</button>
                                        </p>
                                    </form>
                                </div><!-- #respond -->
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

                <div class="related products">
                    <h2>@lang ('front.shop.related_products')</h2>

                    <ul class="products">
                        @foreach ($similarProducts as $key => $prod)
                            <li class="{{ $key == 0 ? 'first' : ($key == $similarProducts->count() - 1 ? 'last' : '') }}">
                                <a href="{{ $prod->front_url }}">
                                    <div class="product-image">
                                        @if ($prod->is_on_sale) <span class="onsale">Sale!</span> @endif
                                        <img src="{{ get_image_path($product->represent_image) }}" alt="image1" title="image1"
                                             class="attachment-shop_catalog wp-post-image">
                                    </div>
                                    <p class="product-title">{{ $prod->title }}</p>
                                    <p class="product-price">
                                        @if ($prod->is_on_sale)
                                            <del><span class="amount">{{ format_price_with_currency($prod->price) }}</span></del>
                                            <ins><span class="amount">{{ format_price_with_currency($prod->discount_price) }}</span></ins>
                                        @else
                                            <ins><span class="amount">{{ format_price_with_currency($prod->price) }}</span></ins>
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
                </div>
            </li><!-- END .col-main -->

            @include ('layouts.front._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection