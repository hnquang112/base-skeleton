@extends ('front.organic.front.master')

@section ('content')
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>

    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">

            <!-- BEGIN .col-main -->
            <li class="col-main">
                <h2 class="page-title">@lang ('front.checkout.order_received')</h2>
                <p>@lang ('front.checkout.order_received_info')</p>
                <table class="product-table">
                    <thead>
                        <tr>
                            <th>@lang ('front.checkout.product')</th>
                            <th>@lang ('front.checkout.date')</th>
                            <th>@lang ('front.checkout.total')</th>
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

                {{--<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order wont be shipped until the funds have cleared in our account.</p>--}}
                <h2>@lang ('front.checkout.our_detail')</h2>

                <div class="tag-title-wrap clearfix"><h4 class="tag-title">@lang ('front.checkout.order_detail')</h4></div>
                <table width="100%">
                    <thead>
                        <tr>
                            <th class="product-name">@lang ('front.checkout.product')</th>
                            <th class="product-quantity">@lang ('front.checkout.qty')</th>
                            <th class="product-total">@lang ('front.checkout.total')</th>
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
                            <th scope="row" colspan="2" style="text-align: right;">@lang ('front.checkout.order_total'):</th>
                            <td>{{ format_price_with_currency($order->total_price) }}</td>
                        </tr>
                    </tfoot>
                </table>

                <header>
                    <div class="tag-title-wrap clearfix"><h4 class="tag-title">@lang ('front.checkout.customer_detail')</h4></div>
                </header>
                <ul class="customer_details">
                    <li>@lang ('front.account.address.email'): {{ $order->user->email }}</li>
                    <li>@lang ('front.account.address.phone'): {{ $order->user->phone }}</li>
                </ul>

                <div class="col2-set addresses">
                    <div class="col-1">
                        <header class="title">
                            <div class="tag-title-wrap clearfix"><h4 class="tag-title">@lang ('front.account.address.billing')</h4></div>
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
                            <div class="tag-title-wrap clearfix"><h4 class="tag-title">@lang ('front.account.address.shipping')</h4></div>
                        </header>
                        <address>
                            <p>
                                @if ($order->ship_to_billing == 1)
                                    {{ $order->user->display_name }}<br>
                                    {{ $order->user->address }}<br>
                                    {{ $order->user->city }}<br>
                                    {{ $order->user->country }}
                                @else
                                    {{ $order->user->shipping_full_name }}<br>
                                    {{ $order->user->shipping_address }}<br>
                                    {{ $order->user->shipping_city }}<br>
                                    {{ $order->user->shipping_country }}
                                @endif
                            </p>
                        </address>
                    </div><!-- /.col-2 -->
                </div><!-- /.col2-set -->
                <div class="clear"></div>
            </li><!-- END .col-main -->

            @include ('front.organic.front._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection