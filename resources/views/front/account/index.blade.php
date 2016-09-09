@extends ('layouts.front.master')

@section ('content')
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>
    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">

            <!-- BEGIN .col-main -->
            <li class="col-main">
                <h2 class="page-title">@lang ('front.account.title')</h2>

                @if (auth()->guard('web')->check())
                    <p class="myaccount_user">Hello, <strong>{{ $user->display_name }}</strong>.
                        From your account dashboard you can view your recent orders, manage your shipping and billing addresses.
                    </p>

                    <div class="tag-title-wrap clearfix"><h4 class="tag-title">Recent Orders</h4></div>

                    @if ($orders->count() > 0)
                        <table width="100%" class="account-table">
                            <thead>
                                <tr>
                                    <th class="order-number"><span class="nobr">Order</span></th>
                                    <th class="order-shipto"><span class="nobr">Ship to</span></th>
                                    <th class="order-total"><span class="nobr">Total</span></th>
                                    <th class="order-status" colspan="2"><span class="nobr">Status</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr class="order">
                                        <td data-title="Order">
                                            <a href="{{ $order->front_url }}">#{{ $order->code }}</a> –
                                            <time title="{{ time($order->created_at) }}">{{ $order->created_at }}</time>
                                        </td>
                                        <td data-title="Ship to">
                                            <address>
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
                                            </address>
                                        </td>
                                        <td data-title="Total">{{ format_price_with_currency($order->total_price) }}</td>
                                        <td data-title="Status">On-hold
                                            <a href="{{ $order->front_url }}" class="button2">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No orders</p>
                    @endif

                    <div class="tag-title-wrap clearfix"><h4 class="tag-title">My Address</h4></div>

                    <p class="myaccount_address">The following addresses will be used on the checkout page by default.</p>

                    <div class="col2-set addresses">
                        <div class="col-1">
                            <header class="title">
                                <div class="tag-title-wrap clearfix"><h4 class="tag-title">Billing Address</h4></div>

                                <a href="{{ route('account.edit') }}" class="edit">Edit</a>
                            </header>
                            <address>
                                <p>
                                    {{ $user->display_name }}<br>
                                    {{ $user->address }}<br>
                                    {{ $user->city }}<br>
                                    {{ $user->country }}
                                </p>
                            </address>
                        </div><!-- /.col-1 -->

                        <div class="col-2">
                            <header class="title">
                                <div class="tag-title-wrap clearfix"><h4 class="tag-title">Shipping Address</h4></div>

                                <a href="{{ route('account.edit') }}" class="edit">Edit</a>
                            </header>

                            @if ($user->shipping_address)
                                <address>
                                    {{ $user->shipping_full_name }}<br>
                                    {{ $user->shipping_address }}<br>
                                    {{ $user->shipping_city }}<br>
                                    {{ $user->shipping_country }}
                                </address>
                            @else
                                <p>You have not set up a shipping address yet.</p>
                            @endif
                        </div><!-- /.col-2 -->
                    </div><!-- /.col2-set -->
                @else
                    @include ('front.account._fb_login_button')
                @endif
            </li><!-- END .col-main -->

            @include ('layouts.front._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection