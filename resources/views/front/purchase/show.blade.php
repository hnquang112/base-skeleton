@extends ('layouts.front.master')

@section ('content')
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>

    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">

            <!-- BEGIN .col-main -->
            <li class="col-main">
                <h2 class="page-title">Order Received</h2>
                <p>Thank you. Your order has been received.</p>
                <table class="product-table">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Date</th>
                            <th>Total</th>
                            {{--<th>Payment method</th>--}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="cart_table_item">
                            <td data-title="Order">#{{ $order->code }}</td>
                            <td data-title="Date">{{ $order->created_at }}</td>
                            <td data-title="Total">{{ format_price_with_currency($order->total_price) }}</td>
                            {{--<td data-title="Payment method">Direct Bank Transfer </td>--}}
                        </tr>
                    </tbody>
                </table>

                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order wont be shipped until the funds have cleared in our account.</p>
                <h2>Our Details</h2>

                <div class="tag-title-wrap clearfix"><h4 class="tag-title">Order Details</h4></div>
                <table width="100%">
                    <thead>
                        <tr>
                            <th class="product-name">Product</th>
                            <th class="product-quantity">Qty</th>
                            <th class="product-total">Totals</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->products as $product)
                            <tr class="order_table_item">
                                <td class="product-name" data-title="Product"><a href="{{ $product->front_url }}">{{ $product->title }}</a></td>
                                <td class="product-quantity" data-title="Qty">{{ $product->pivot->quantity }}</td>
                                <td class="product-total" data-title="Totals">{{ format_price_with_currency($product->pivot->price) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        {{--<tr>--}}
                            {{--<th scope="row" colspan="2" style="text-align: right;">Cart Subtotal:</th>--}}
                            {{--<td><span class="amount">£116.97</span>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<th scope="row" colspan="2" style="text-align: right;">Shipping:</th>--}}
                            {{--<td>Free Shipping</td>--}}
                        {{--</tr>--}}
                        <tr>
                            <th scope="row" colspan="2" style="text-align: right;">Order Total:</th>
                            <td>{{ format_price_with_currency($order->total_price) }}</td>
                        </tr>
                    </tfoot>
                </table>

                <header>
                    <div class="tag-title-wrap clearfix"><h4 class="tag-title">Customer details</h4></div>
                </header>
                <ul class="customer_details">
                    <li>Email: {{ $order->user->email }}</li>
                    <li>Telephone: {{ $order->user->phone }}</li>
                </ul>

                <div class="col2-set addresses">
                    <div class="col-1">
                        <header class="title">
                            <div class="tag-title-wrap clearfix"><h4 class="tag-title">Billing Address</h4></div>
                        </header>
                        <address>
                            <p>
                                {{ $order->user->display_name }}<br>
                                {{ $order->user->address }}<br>
                                {{ $order->user->city }}<br>
                                {{ $order->user->country }}
                            </p>
                        </address>
                    </div><!-- /.col-1 -->

                    <div class="col-2">
                        <header class="title">
                            <div class="tag-title-wrap clearfix"><h4 class="tag-title">Shipping Address</h4></div>
                        </header>
                        <address>
                            <p>
                                @if ($order->ship_to_billing == 1)
                                    {{ $order->user->display_name }}<br>
                                    {{ $order->user->address }}<br>
                                    {{ $order->user->city }}<br>
                                    {{ $order->user->country }}
                                @else
                                    {{ $order->shipping_full_name }}<br>
                                    {{ $order->shipping_address }}<br>
                                    {{ $order->shipping_city }}<br>
                                    {{ $order->shipping_country }}
                                @endif
                            </p>
                        </address>
                    </div><!-- /.col-2 -->
                </div><!-- /.col2-set -->
                <div class="clear"></div>
            </li><!-- END .col-main -->

            @include ('layouts.front._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection