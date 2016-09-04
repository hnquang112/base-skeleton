@extends ('layouts.front.master')

@section ('content')
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>

    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">

            <!-- BEGIN .col-main -->
            <li class="col-main">
                <h2 class="page-title">{{ $product->title }}</h2>

                <ul class="columns-2 product-single-content clearfix">
                    <li class="post-73 product type-product status-publish hentry col2 clearfix" id="product-73">
                        @if ($product->is_on_sale) <span class="onsale">Sale!</span> @endif
                        <div class="images">
                            <a itemprop="image" href="{{ $product->represent_image_path }}"
                               class="zoom" rel="thumbnails" title="image2">
                                <img src="{{ $product->represent_image_path }}" alt="image2" title="image2"
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
                        <li class="description_tab ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a href="#tabs-tab-title-1">Description</a>
                        </li>
                        <li class="reviews_tab ui-state-default ui-corner-top"><a href="#tabs-tab-title-2">Reviews (0)</a>
                        </li>
                    </ul>
                    <div id="tabs-tab-title-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
                        <p>{!! $product->content !!}</p>
                    </div>
                    <div id="tabs-tab-title-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide">
                        <div id="reviews">
                            <div id="comments">
                                <h2>Reviews</h2>
                                <p>There are no reviews yet, would you like to <a href="#review_form" class="inline show_review_form">submit yours</a>?</p>
                            </div>
                            <div id="review_form_wrapper" style="display: none;">
                                <div id="review_form">
                                    <div id="respond">
                                        <h3 id="reply-title">Be the first to review “Summer Berry Soap” <small><a rel="nofollow" id="cancel-comment-reply-link" href="/organicshopwp/shop/summer-berry-soap/#respond" style="display:none;">Cancel reply</a></small></h3>
                                        <form action="{{ route('shop.review', $product->slug) }}" method="post" id="commentform">
                                            <p class="comment-form-author">
                                                <label for="author">Name</label> <span class="required">*</span>
                                                <input id="author" name="author" type="text" value="" size="30" aria-required="true">
                                            </p>
                                            <p class="comment-form-email">
                                                <label for="email">Email</label> <span class="required">*</span>
                                                <input id="email" name="email" type="text" value="" size="30" aria-required="true">
                                            </p>
                                            <p class="comment-form-rating">
                                                <label for="rating">Rating</label>
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
                                                <label for="comment">Your Review</label>
                                                <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                            </p>
                                            <input type="hidden" id="_n" name="_n" value="f238789892">
                                            <input type="hidden" name="_wp_http_referer" value="/organicshopwp/shop/summer-berry-soap/">
                                            <p class="form-submit">
                                                <input name="submit" type="submit" id="submit" value="Submit Review">
                                                <input type="hidden" name="comment_post_ID" value="69" id="comment_post_ID">
                                                <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                                            </p>
                                        </form>
                                    </div><!-- #respond -->
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>

                <div class="related products">
                    <h2>Related Products</h2>

                    <ul class="products">
                        @foreach ($similarProducts as $key => $prod)
                            <li class="{{ $key == 0 ? 'first' : ($key == $similarProducts->count() - 1 ? 'last' : '') }}">
                                <a href="{{ $prod->front_url }}">
                                    <div class="product-image">
                                        @if ($prod->is_on_sale) <span class="onsale">Sale!</span> @endif
                                        <img src="{{ $prod->represent_image_path }}" alt="image1" title="image1"
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
                                    <a href="http://themes.quitenicestuff.com/organicshopwp/shop/oak-candle-set-2/?add-to-cart=60"
                                        rel="nofollow" data-product-id="{{ $prod->id }}" class="button2 product_type_simple">
                                        @lang ('front.home.product.add_to_cart')</a>
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