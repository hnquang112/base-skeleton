@extends ('layouts.front.master')

@section ('content')
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>
    <!-- BEGIN .section -->
    <div class="section">

        <ul class="columns-content page-content clearfix">
            <!-- BEGIN .col-main -->
            <li class="col-main">

                <h2 class="page-title">Cart</h2>

                @if ($cartData->count() == 0)
                    <p>Your cart is currently empty.</p>
                    <p><a class="button2 buttonpad" href="{{ route('shop.index') }}">← Return To Shop</a></p>
                @else
                    <table class="product-table">
                        <thead>
                            <tr>
                                <th class="product-remove">Remove</th>
                                <th class="product-name">Product Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartData as $cartItem)
                                <tr class="cart_table_item">
                                    <!-- Remove from cart link -->
                                    <td data-title="Remove" class="product-remove">
                                        <a href="javascript:void(0)" class="remove js-remove-cart-row" title="Remove this item"
                                            data-cart-row="{{ $cartItem->rowId }}">×</a></td>

                                    <!-- Product Name -->
                                    <td data-title="Product Name" class="product-name" style="text-align: left">
                                        <a href="{{ $cartItem->model->front_url }}">{{ $cartItem->name }}</a> </td>

                                    <!-- Product price -->
                                    <td data-title="Price" style="text-align: right">
                                        <span class="amount js-product-price">{{ $cartItem->price }}</span>đ</td>

                                    <!-- Quantity inputs -->
                                    <td data-title="Quantity" class="qty-table product-quantity">
                                        <div class="qty-fields">
                                            <input type="button" class="plusminus minus" id="minus1" value="-">
                                            <input name="cart_qty" data-min="" data-max="0" readonly data-cart-row="{{ $cartItem->rowId }}"
                                                   value="{{ $cartItem->qty }}" size="4" title="Qty" class="qty-text js-cart-row-qty" maxlength="12">
                                            <input type="button" class="plusminus plus" id="plus1" value="+">
                                        </div>
                                    </td>

                                    <!-- Product subtotal -->
                                    <td data-title="Total" class="product-subtotal" style="text-align: right">
                                        <span class="amount js-cart-row-price">{{ $cartItem->price * $cartItem->qty }}</span>đ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- BEGIN .clearfix -->
                    <div class="cart-options clearfix">
                        {{--<div class="coupon-form clearfix fl">--}}
                            {{--<input type="text" name="coupon_code" class="coupon-code text_input" value="">--}}
                            {{--<input type="submit" class="button2 fr" name="apply_coupon" value="Apply Coupon" style="margin: 2px 0 0 10px;">--}}
                        {{--</div>--}}

                        <div class="cart-buttons fr">
                            <a href="{{ route('checkout.index') }}" class="button2 buttonpad" style="margin-bottom: 20px">Proceed to Checkout →</a>

                            <input type="hidden" id="_n" name="_n" value="2669096c46">
                            <input type="hidden" name="_wp_http_referer" value="/organicshopwp/cart/">
                        </div>
                    </div><!-- END .clearfix -->

                    <hr>

                    <div class="cart-collaterals">
                        <div class="form-third ">
                            <div class="tag-title-wrap clearfix">
                                <h4 class="tag-title">Cart Totals</h4>
                            </div>

                            <table width="100%" class="account-table">
                                <tbody>
                                    {{--<tr>--}}
                                        {{--<td><strong>Subtotal</strong>--}}
                                        {{--</td>--}}
                                        {{--<td><span class="amount">£55.98</span>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td><strong>Shipping</strong>--}}
                                        {{--</td>--}}
                                        {{--<td>--}}
                                            {{--Free Shipping--}}
                                            {{--<input type="hidden" name="shipping_method" id="shipping_method" value="free_shipping">--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                    <tr class="total">
                                        <td><strong>Order Total</strong></td>
                                        <td><span class="amount js-cart-order-total">{{ Cart::subtotal(0, '.', ',') }}</span>đ</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="clearboth"></div>
                    </div>
                @endif
            </li><!-- END .col-main -->

            @include ('layouts.front._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection