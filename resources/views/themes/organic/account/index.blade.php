@extends ('front.organic.front.master')

@section ('content')
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>
    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">

            <!-- BEGIN .col-main -->
            <li class="col-main">
                <h2 class="page-title">@lang ('front.account.title')</h2>

                @if (auth()->guard('web')->check())
                    <p class="myaccount_user">@lang ('front.header.hello'), <strong>{{ $user->display_name }}</strong>.
                        @lang ('front.account.title.description')
                    </p>

                    <div class="tag-title-wrap clearfix"><h4 class="tag-title">@lang ('front.account.recent_orders')</h4></div>

                    @if ($orders->count() > 0)
                        <table width="100%" class="account-table">
                            <thead>
                                <tr>
                                    <th class="order-number"><span class="nobr">@lang ('front.account.order')</span></th>
                                    <th class="order-shipto"><span class="nobr">@lang ('front.account.ship_to')</span></th>
                                    <th class="order-total"><span class="nobr">@lang ('front.account.total')</span></th>
                                    <th class="order-status" colspan="2"><span class="nobr">@lang ('front.account.status')</span></th>
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
                                            <a href="{{ $order->front_url }}" class="button2">@lang ('front.account.view_btn')</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>@lang ('front.account.no_orders')</p>
                    @endif

                    <div class="tag-title-wrap clearfix"><h4 class="tag-title">@lang ('front.account.my_address')</h4></div>

                    <p class="myaccount_address">@lang ('front.account.address.description')</p>

                    <div class="col2-set addresses">
                        <div class="col-1">
                            <header class="title">
                                <div class="tag-title-wrap clearfix"><h4 class="tag-title">@lang ('front.account.address.billing')</h4></div>

                                <a href="{{ route('account.edit') }}" class="edit">@lang ('front.account.address.edit_btn')</a>
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
                                <div class="tag-title-wrap clearfix"><h4 class="tag-title">@lang ('front.account.address.shipping')</h4></div>

                                <a href="{{ route('account.edit') }}" class="edit">@lang ('front.account.address.edit_btn')</a>
                            </header>

                            @if ($user->shipping_address)
                                <address>
                                    {{ $user->shipping_full_name }}<br>
                                    {{ $user->shipping_address }}<br>
                                    {{ $user->shipping_city }}<br>
                                    {{ $user->shipping_country }}
                                </address>
                            @else
                                <p>@lang ('front.account.address.no_shipping')</p>
                            @endif
                        </div><!-- /.col-2 -->
                    </div><!-- /.col2-set -->
                @else
                    @include ('front.account._fb_login_button')
                @endif
            </li><!-- END .col-main -->

            @include ('front.organic.front._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection