@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Reviews</h3>
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
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <form id="js-form-delete" method="POST"
                              action="{{ route('cms.reviews.destroy', $reviews->first() ? $reviews->first()->id : 0) }}" >
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <table class="table table-hover datatable">
                                <thead><tr>
                                    <th></th>
                                    <th>From</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Product</th>
                                    <th>Approved At</th>
                                    <th>Rating</th>
                                    <th>Dates</th>
                                    <th>Action</th>
                                </tr></thead>
                                <tbody>
                                @foreach ($reviews as $rev)
                                    <tr>
                                        <td><input name="selected_ids[]" type="checkbox" value="{{ $rev->id }}"></td>
                                        <td><a href="{{ route('cms.reviews.edit', $rev->id) }}"><strong>
                                                    {{ $rev->name }}</strong></a></td>
                                        <td>{{ $rev->email }}</td>
                                        <td>{{ $rev->message }}</td>
                                        <td><a href="{{ $rev->product->front_url }}" target="_blank">
                                                {{ $rev->product->title }}</a></td>
                                        <td>@if ($rev->is_approved)
                                                <span class="text-success"><strong class="js-publish-status">{{ $rev->approved_at }}</strong></span>
                                            @else
                                                <span class="text-warning"><strong class="js-publish-status">Disapproved</strong></span>
                                            @endif</td>
                                        <td>{{ $rev->rating }}</td>
                                        <td>{{ $rev->created_at }}</td>
                                        <td><button data-href="{{ route('cms.reviews.approve', $rev->id) }}"
                                                    class="btn js-button-publish-article btn-warning btn-xs {{ $rev->is_approved ?: 'hide' }}"
                                                    title="Disapprove">
                                                <i class="fa fa-thumbs-down"></i></button>

                                            <button data-href="{{ route('cms.reviews.approve', $rev->id) }}"
                                                    class="btn js-button-publish-article btn-success btn-xs {{ !$rev->is_approved ?: 'hide' }}"
                                                    title="Approve">
                                                <i class="fa fa-thumbs-up"></i></button>
                                        </td>
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

        <div class="col-md-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Create</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <form action="{{ route('cms.reviews.store') }}" method="POST">
                    {{ csrf_field() }}

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="box-body">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="">Name (*):</label>
                                <input name="name" type="text" class="form-control" placeholder="Enter name">

                                @if ($errors->has('name'))
                                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="">Email (*):</label>
                                <input name="email" type="email" class="form-control" placeholder="Enter email">

                                @if ($errors->has('email'))
                                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
                                <label for="">Rating (*):</label>
                                <select name="rating" class="form-control">
                                    @for ($i = 5; $i >= 1; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>

                                @if ($errors->has('rating'))
                                    <span class="help-block"><strong>{{ $errors->first('rating') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                <label for="">Message (*):</label>
                                <input name="message" type="text" class="form-control" placeholder="Enter message">

                                @if ($errors->has('message'))
                                    <span class="help-block"><strong>{{ $errors->first('message') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('post_id') ? ' has-error' : '' }}">
                                <label for="">Product (*):</label>
                                <select name="post_id" class="form-control select2" style="width: 100%">
                                    @foreach (App\Product::pluck('title', 'id') as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('post_id'))
                                    <span class="help-block"><strong>{{ $errors->first('post_id') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-primary btn-flat pull-right" type="submit">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection