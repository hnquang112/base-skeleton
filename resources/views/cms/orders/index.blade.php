@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Orders</h3>

                    <!--Filter items-->
                    <a href="{{ route('cms.orders.index') }}">All (442)</a> |
                    <a href="{{ route('cms.orders.index', ['filter' => 'mine']) }}">Sale (215)</a> |
                    <a href="{{ route('cms.orders.index', ['filter' => 'published']) }}">Published (442)</a>

                    <div class="box-tools pull-right">
                        <a class="btn btn-primary" href="{{ route('cms.orders.create') }}">Create</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="mailbox-controls form-inline">
                        <!-- Check all button -->
                        <button id="js-checkbox-toggle-check-all" type="button" class="btn btn-default btn-sm">
                            <i class="fa fa-square-o"></i></button>

                        <!-- Bunch delete button -->
                        <button id="js-button-confirm-delete" type="button" class="btn btn-danger btn-sm" title="Delete">
                            <i class="fa fa-trash-o"></i></button>

                        <form id="js-form-filter-items" action="{{ route('cms.orders.create') }}" method="GET" style="display: inline">
                            <div class="form-group">
                                <select name="filter_date" class="form-control">
                                    <option>Date</option>
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="filter_category" class="form-control">
                                    <option>All</option>
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-default">Filter</button>
                        </form>
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <form id="js-form-delete" action="{{ route('cms.orders.destroy', $orders->first() ?
                            $orders->first()->id : 0) }}" method="product">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <table class="table table-hover datatable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Number</th>
                                        <th>Buyer</th>
                                        <th>Status</th>
                                        <th>No. Of Products</th>
                                        <th>Total Price</th>
                                        <th>Dates</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td><input name="selected_ids[]" type="checkbox" value="{{ $order->id }}"></td>
                                            <td><a href="{{ route('cms.orders.show', $order->id) }}"><strong>
                                                        #{{ $order->code }}</strong></a></td>
                                            <td>{{ $order->user->display_name }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->products_count }}</td>
                                            <td>{{ format_price_with_currency($order->total_price) }}</td>
                                            <td>{{ $order->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /.table -->
                        </form>
                    </div>
                    <!-- /.mail-box-messages -->
                </div>
            </div>
        </div>
    </div>
@endsection