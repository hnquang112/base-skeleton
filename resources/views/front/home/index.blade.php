@extends ('layouts.front.master')

@section ('content')
    @include ('layouts.front._slider')
    
    <!-- BEGIN .section-mini2 -->
    <div class="section-mini2">
        <div class="tag-title-wrap clearfix"><h4 class="tag-title">Featured Products</h4></div>
        <ul class="products">
            <li class="first">
                <a href="http://themes.quitenicestuff.com/organicshopwp/shop/summer-berry-soap/">
                    <div class="product-image">
                        <span class="onsale">Sale!</span>
                        <img alt="image4" class="attachment-shop_catalog wp-post-image" src="img/image4-285x285.jpg"
                             title="image4">
                    </div>
                    <p class="product-title">Summer Berry Soap</p>
                    <p class="product-price"><del><span class="amount">£11.99</span></del>
                        <ins><span class="amount">£8.99</span></ins>
                    </p>
                </a>
                <p class="product-button clearfix">
                    <a class="button2 product_type_simple" data-product_id="69" rel="nofollow"
                       href="http://themes.quitenicestuff.com/organicshopwp/?add-to-cart=69">Add to cart</a></p>
            </li>
            <li>
                <a href="http://themes.quitenicestuff.com/organicshopwp/shop/luxury-spa-set/">
                    <div class="product-image"><span class="onsale">Sale!</span>
                        <img alt="Luxury Spa Set" class="attachment-shop_catalog wp-post-image"
                             src="img/image3-285x285.jpg" title="Luxury Spa Set">
                    </div>
                    <p class="product-title">Luxury Spa Set</p>
                    <p class="product-price"><del><span class="amount">£59.99</span></del>
                        <ins><span class="amount">£46.99</span></ins>
                    </p>
                </a>
                <p class="product-button clearfix">
                    <a class="button2 product_type_simple" data-product_id="65" rel="nofollow"
                       href="http://themes.quitenicestuff.com/organicshopwp/?add-to-cart=65">Add to cart</a>
                </p>
            </li>
            <li>
                <a href="http://themes.quitenicestuff.com/organicshopwp/shop/oak-candle-set/">
                    <div class="product-image"><span class="onsale">Sale!</span>
                        <img alt="image2" class="attachment-shop_catalog wp-post-image"
                             src="img/image2-285x285.jpg" title="image2">
                    </div>
                    <p class="product-title">Oak Candle Set</p>
                    <p class="product-price"><del><span class="amount">£49.99</span></del>
                        <ins><span class="amount">£34.99</span></ins>
                    </p>
                </a>
                <p class="product-button clearfix">
                    <a class="button2 product_type_simple" data-product_id="62" rel="nofollow"
                       href="http://themes.quitenicestuff.com/organicshopwp/?add-to-cart=62">Add to cart</a></p>
            </li>
            <li class="last">
                <a href="http://themes.quitenicestuff.com/organicshopwp/shop/seaweed-soap/">
                    <div class="product-image"><span class="onsale">Sale!</span>
                        <img alt="image1" class="attachment-shop_catalog wp-post-image"
                             src="img/image1-285x285.jpg" title="image1">
                    </div>
                    <p class="product-title">Seaweed Soap</p>
                    <p class="product-price"><del><span class="amount">£18.99</span></del>
                        <ins><span class="amount">£14.99</span></ins>
                    </p>
                </a>
                <p class="product-button clearfix">
                    <a class=
                       "button2 product_type_simple" data-product_id="60" rel="nofollow"
                       href="http://themes.quitenicestuff.com/organicshopwp/?add-to-cart=60">Add to cart</a>
                </p>
            </li>
        </ul>
    </div><!-- END .section-mini2 -->

    <!-- BEGIN .section -->
    <div class="section">
        <div class="tag-title-wrap clearfix"><h4 class="tag-title">Testimonials</h4></div>
        <ul class="columns-2 clearfix">
            <li class="col2">
                <div class="testimonial-wrapper clearfix">
                    <div class="testimonial-author-image"><img alt="" src="img/author.png"></div>
                    <div class="testimonial-text">
                        <p>“A top quality product delivered super quick!
                            thanks so much Organic Shop, I shall definitely be
                            using you guys again!”</p>
                    </div>
                    <div class="testimonial-speech"></div>
                </div>
                <p class="testimonial-author">Mike Jones - <span>Purchased Summer Berry Soap</span></p>
            </li>
            <li class="col2">
                <div class="testimonial-wrapper clearfix">
                    <div class="testimonial-author-image"><img alt="" src="img/author.png"></div>
                    <div class="testimonial-text">
                        <p>“I made a mistake with my order but Organic Shop
                            let me change it free of charge, thanks! The
                            delivery is also super quick!”</p>
                    </div>
                    <div class="testimonial-speech"></div>
                </div>
                <p class="testimonial-author">Sarah Cooper - <span>Purchased Seaweed Spa Set</span></p>
            </li>
        </ul>
    </div><!-- END .section -->
@endsection