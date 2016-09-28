@extends ('front.organic.layouts.cms.' . ($layout == 'print' ? 'print' : 'master'))

@section ('content')
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> AdminLTE, Inc.
                    <small class="pull-right">Date: {{ Carbon\Carbon::today()->format('d/m/Y') }}</small>
                </h2>
            </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong>{{ $order->user_name }}</strong><br>
                    {{ $order->user_address }}<br>
                    {{ $order->user_city }}{{ $order->user_country ? ', ' . $order->user_country: '' }}<br>
                    Phone: {{ $order->user_phone }}<br>
                    Email: {{ $order->user_email }}
                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Invoice #{{ $order->code }}</b><br>
                <br>
                <b>Order ID:</b> 4F3S8J<br>
                <b>Payment Due:</b> 2/22/2014<br>
                <b>Account:</b> 968-34567
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Qty</th>
                            <th>Product</th>
                            <th>ID</th>
                            <th>Description</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->products as $product)
                            <tr>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td><a href="{{ $product->front_url }}">{{ $product->title }}</a></td>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->short_description }}</td>
                                <td>{{ format_price_with_currency($product->current_price * $product->pivot->quantity) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
            <!-- /.col -->
            <div class="col-xs-6 pull-right">
                <p class="lead">Amount Due 2/22/2014</p>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>{{ format_price_with_currency($order->total_price) }}</td>
                            </tr>
                            {{--<tr>--}}
                                {{--<th>Tax (9.3%)</th>--}}
                                {{--<td>$10.34</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<th>Shipping:</th>--}}
                                {{--<td>$5.80</td>--}}
                            {{--</tr>--}}
                            <tr>
                                <th>Total:</th>
                                <td>{{ format_price_with_currency($order->total_price) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->

        @if ($layout != 'print')
            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <a href="{{ route('cms.orders.print', $order->code) }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                    <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Confirm Order
                    </button>
                    <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                        <i class="fa fa-download"></i> Generate PDF
                    </button>
                </div>
            </div>
        @endif
    </section>
@endsection