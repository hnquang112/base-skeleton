@extends ('layouts.front.master')

@section ('content')
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>
    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">

            <!-- BEGIN .col-main -->
            <li class="col-main">
                <h2 class="page-title">Checkout</h2>

                @if (!auth()->guard('web')->check())
                    <div class="msg notice">
                        <p>Already registered? <a href="javascript:void(0)" class="showlogin">Click here to login</a></p>
                    </div>

                    <div class="login" style="display: none;">
                        <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing &amp; Shipping section.</p>

                        @include ('front.account._fb_login_button')
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="msg fail">
                        <ul class="list-fail">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form name="checkout" method="post" class="checkout" action="{{ route('checkout.store') }}">
                    {{ csrf_field() }}
                    <div class="col2-set" id="customer_details">
                        <div class="col-1">
                            <div class="tag-title-wrap clearfix">
                                <h4 class="tag-title">Billing Address</h4>
                            </div>

                            <p class="form-row" id="billing_full_name_field">
                                <label for="billing_full_name" class="">Full Name <abbr class="required" title="required">*</abbr></label>
                                <input type="text" class="input-text" name="display_name" id="billing_full_name" placeholder="Full Name"
                                       value="{{ old('display_name') ?: $user->display_name }}" required>
                            </p>

                            <p class="form-row" id="billing_address_field">
                                <label for="billing_address" class="">Address <abbr class="required" title="required">*</abbr></label>
                                <input type="text" class="input-text" name="address" id="billing_address" placeholder="Address"
                                       value="{{ old('address') ?: $user->address }}" required>
                            </p>

                            <p class="form-row form-row-first" id="billing_city_field">
                                <label for="billing_city" class="">Town/City <abbr class="required" title="required">*</abbr></label>
                                <input type="text" class="input-text" name="city" id="billing_city" placeholder="Town/City"
                                       value="{{ old('city') ?: $user->city }}" required>
                            </p>

                            <p class="form-row form-row-last update_totals_on_change" id="billing_country_field">
                                <label for="billing_country" class="">County</label>
                                <input type="text" class="input-text" placeholder="County" name="country" id="billing_country"
                                       value="{{ old('country') ?: $user->country }}">
                            </p>
                            <div class="clear"></div>

                            <p class="form-row form-row-first" id="billing_email_field">
                                <label for="billing_email" class="">Email Address <abbr class="required" title="required">*</abbr></label>
                                <input type="email" class="input-text" name="email" id="billing_email" placeholder="Email Address"
                                       value="{{ old('email') ?: $user->email }}" required>
                            </p>

                            <p class="form-row form-row-last" id="billing_phone_field">
                                <label for="billing_phone" class="">Phone <abbr class="required" title="required">*</abbr></label>
                                <input type="text" class="input-text" name="phone" id="billing_phone" placeholder="Phone"
                                       value="{{ old('phone') ?: $user->phone }}" required>
                            </p>
                            <div class="clear"></div>
                        </div>

                        <div class="col-2" data-debug="{{ old('ship_to_billing') != 1 }}">
                            <p class="form-row" id="shiptobilling">
                                <input id="shiptobilling-checkbox" class="input-checkbox" type="checkbox" name="ship_to_billing" value="1"
                                       {{ old('ship_to_billing') != 1 ? '' : 'checked=checked' }}>
                                <label for="shiptobilling-checkbox" class="checkbox">Ship to billing address?</label>
                            </p>

                            <div class="tag-title-wrap clearfix">
                                <h4 class="tag-title">Shipping Address</h4>
                            </div>

                            <div class="clearboth"></div>

                            <div class="shipping_address" style="display: none;">
                                <p class="form-row" id="shipping_full_name_field">
                                    <label for="shipping_full_name" class="">Full Name <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text" name="shipping_full_name" id="shipping_full_name" placeholder="Full Name"
                                           value="{{ old('shipping_full_name') }}">
                                </p>

                                <p class="form-row" id="shipping_address_field">
                                    <label for="shipping_address" class="">Address <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text" name="shipping_address" id="shipping_address" placeholder="Address"
                                           value="{{ old('shipping_address') }}">
                                </p>

                                <p class="form-row form-row-first" id="shipping_city_field">
                                    <label for="shipping_city" class="">Town/City <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text" name="shipping_city" id="shipping_city" placeholder="Town/City"
                                           value="{{ old('shipping_city') }}">
                                </p>

                                <p class="form-row form-row-last update_totals_on_change" id="shipping_country_field">
                                    <label for="shipping_country" class="">County</label>
                                    <input type="text" class="input-text" placeholder="County" name="shipping_country" id="shipping_country"
                                           value="{{ old('shipping_country') }}">
                                </p>

                                <p class="form-row form-row-first" id="shipping_email_field">
                                    <label for="shipping_email" class="">Email Address <abbr class="required" title="required">*</abbr></label>
                                    <input type="email" class="input-text" name="shipping_email" id="shipping_email" placeholder="Email Address"
                                           value="{{ old('shipping_email') }}">
                                </p>

                                <p class="form-row form-row-last" id="shipping_phone_field">
                                    <label for="shipping_phone" class="">Phone <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text" name="shipping_phone" id="shipping_phone" placeholder="Phone"
                                           value="{{ old('shipping_phone') }}">
                                </p>

                                <div class="clear"></div>
                            </div>

                            <p class="form-row notes" id="order_comments_field">
                                <label for="order_comments" class="">Order Notes</label>
                                <textarea name="delivery_note" class="input-text" id="order_comments" cols="5" rows="2"
                                          placeholder="Notes about your order, e.g. special notes for delivery."
                                        style="resize: vertical"></textarea>
                            </p>
                        </div>
                    </div>

                    <div class="tag-title-wrap clearfix">
                        <h4 class="tag-title">Your order</h4>
                    </div>

                    <div id="order_review">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-quantity">Qty</th>
                                    <th class="product-total">Totals</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartData as $cartItem)
                                    <tr class="checkout_table_item">
                                        <td class="product-name" style="text-align: left">{{ $cartItem->name }}</td>
                                        <td class="product-quantity">{{ $cartItem->qty }}</td>
                                        <td class="product-total" style="text-align: right">{{ format_price_with_currency($cartItem->price) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                {{--<tr class="cart-subtotal">--}}
                                    {{--<td colspan="2"><strong>Cart Subtotal</strong>--}}
                                    {{--</td>--}}
                                    {{--<td><span class="amount">£55.98</span>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr class="shipping">--}}
                                    {{--<td colspan="2">Shipping</td>--}}
                                    {{--<td>--}}
                                        {{--Free Shipping--}}
                                        {{--<input type="hidden" name="shipping_method" id="shipping_method" value="free_shipping">--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                <tr class="total">
                                    <td colspan="2"><strong>Order Total</strong></td>
                                    <td style="text-align: right"><strong>{{ Cart::subtotal(0, '.', ',') }}đ</strong></td>
                                </tr>
                            </tfoot>
                        </table>

                        {{--<div class="tag-title-wrap clearfix">--}}
                            {{--<h4 class="tag-title">Payment Method</h4>--}}
                        {{--</div>--}}

                        {{--<ul class="payment-block">--}}
                            {{--<li>--}}
                                {{--<input type="radio" id="payment_method_bacs" class="input-radio" name="payment_method" value="bacs" checked="checked"> Direct Bank Transfer--}}
                                {{--<div class="payment_box payment_method_bacs" style="display:none;">--}}
                                    {{--<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order wont be shipped until the funds have cleared in our account.</p>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<input type="radio" id="payment_method_cheque" class="input-radio" name="payment_method" value="cheque"> Cheque Payment--}}
                                {{--<div class="payment_box payment_method_cheque" style="display:none;">--}}
                                    {{--<p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<input type="radio" id="payment_method_paypal" class="input-radio" name="payment_method" value="paypal"> PayPal <img src="./checkout_files/paypal.png" alt="PayPal">--}}
                                {{--<div class="payment_box payment_method_paypal" style="display:none;">--}}
                                    {{--<p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account</p>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}

                        <div class="form-row place-order">
                            <button class="button" id="place_order">Place order</button>
                            <div class="clear"></div>
                        </div>
                    </div>
                </form>
            </li><!-- END .col-main -->

            @include ('layouts.front._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection