@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Products</h3>

                    <!--Filter items-->
                    {{--<a href="{{ route('cms.products.index') }}">All (442)</a> |--}}
                    {{--<a href="{{ route('cms.products.index', ['filter' => 'mine']) }}">Sale (215)</a> | --}}
                    {{--<a href="{{ route('cms.products.index', ['filter' => 'published']) }}">Published (442)</a>--}}

                    <div class="box-tools pull-right">
                        <a class="btn btn-primary" href="{{ route('cms.products.create') }}">Create</a>
                    </div>
                </div><!-- /.box-header -->

                <div class="box-body">
                    <div class="mailbox-controls form-inline">
                        <!-- Check all button -->
                        <button id="js-checkbox-toggle-check-all" type="button" class="btn btn-default btn-sm">
                            <i class="fa fa-square-o"></i></button>

                        <!-- Bunch delete button -->
                        <button id="js-button-confirm-delete" type="button" class="btn btn-danger btn-sm" title="Delete">
                            <i class="fa fa-trash-o"></i></button>

                        {{--<form id="js-form-filter-items" action="{{ route('cms.products.create') }}" method="GET" style="display: inline">--}}
                            {{--<div class="form-group">--}}
                                {{--<select name="filter_date" class="form-control">--}}
                                    {{--<option>Date</option>--}}
                                    {{--<option>option 1</option>--}}
                                    {{--<option>option 2</option>--}}
                                    {{--<option>option 3</option>--}}
                                    {{--<option>option 4</option>--}}
                                    {{--<option>option 5</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<select name="filter_category" class="form-control">--}}
                                    {{--<option>All</option>--}}
                                    {{--<option>option 1</option>--}}
                                    {{--<option>option 2</option>--}}
                                    {{--<option>option 3</option>--}}
                                    {{--<option>option 4</option>--}}
                                    {{--<option>option 5</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}

                            {{--<button type="submit" class="btn btn-default">Filter</button>--}}
                        {{--</form>--}}
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <form id="js-form-delete" action="{{ route('cms.products.destroy', $products->first() ?
                            $products->first()->id : 0) }}" method="product">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <table class="table table-hover datatable">
                                <thead><tr>
                                    <th></th>
                                    <th>Representer</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Categories</th>
                                    <th>Tags</th>
                                    <th>Dates</th>
                                    <th>Display In HomePage</th>
                                </tr></thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td><input name="selected_ids[]" type="checkbox" value="{{ $product->id }}"></td>
                                            <td><img src="{{ get_image_path($product->represent_image) }}" width="80px"></td>
                                            <td><a href="{{ route('cms.products.edit', $product->id) }}"><strong>
                                                        {{ $product->title }}</strong></a></td>
                                            <td>{{ format_price_with_currency($product->current_price, '') }}</td>
                                            <td>{{ $product->category_names }}</td>
                                            <td>{{ $product->tag_names }}</td>
                                            <td>{{ $product->created_at }}</td>
                                            <td><button data-href="{{ route('cms.products.featured', $product->id) }}"
                                                        class="btn js-button-publish-article btn-success btn-xs {{ $product->is_featured ?: 'hide' }}"
                                                        title="Unmark Featured">
                                                    <i class="fa fa-thumb-tack fa-fw"></i></button>

                                                <button data-href="{{ route('cms.products.featured', $product->id) }}"
                                                        class="btn js-button-publish-article btn-xs {{ !$product->is_featured ?: 'hide' }}"
                                                        title="Mark as Featured">
                                                    <i class="fa fa-thumb-tack fa-fw"></i></button>

                                                <a href="{{ $product->front_url }}" class="btn btn-info btn-xs" target="_blank" title="View Product">
                                                    <i class="fa fa-external-link fa-fw"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table><!-- /.table -->
                        </form>
                    </div><!-- /.mail-box-messages -->
                </div>
            </div>
        </div>
    </div>
@endsection