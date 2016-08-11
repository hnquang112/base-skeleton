@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Feedback</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="mailbox-controls form-inline">
                        <!-- Check all button -->
                        <button id="js-checkbox-toggle-check-all" type="button" class="btn btn-default btn-sm">
                            <i class="fa fa-square-o"></i></button>

                        <!-- Bunch delete button -->
                        <button id="js-button-confirm-delete" type="button" class="btn btn-danger btn-sm" title="Delete">
                            <i class="fa fa-trash-o"></i></button>

                        <!-- Mark as read button -->
                        {{--<button id="js-button-confirm-delete" type="button" class="btn btn-info btn-sm" title="Mark as read">--}}
                            {{--<i class="fa fa-eye"></i></button>--}}
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <form id="js-form-delete" method="POST"
                              action="{{ route('cms.feedback.destroy', $feedback->first() ? $feedback->first()->id : 0) }}" >
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <table class="table table-hover datatable">
                                <thead><tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Dates</th>
                                </tr></thead>
                                <tbody>
                                @foreach ($feedback as $fb)
                                    <tr>
                                        <td><input name="selected_ids[]" type="checkbox" value="{{ $fb->id }}"></td>
                                        <td><a href="{{ route('cms.feedback.edit', $fb->id) }}">
{{--                                                @if (!$fb->is_read) <strong> @endif--}}
                                                    {{ $fb->name }}
{{--                                                @if (!$fb->is_read) </strong> @endif--}}
                                            </a></td>
                                        <td>{{ $fb->email }}</td>
                                        <td>{{ $fb->message }}</td>
                                        <td>{{ $fb->created_at }}</td>
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
                <form action="{{ $newFb->id ? route('cms.feedback.update', $newFb->id) : route('cms.feedback.store') }}"
                      method="POST">
                    {{ csrf_field() }}

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="box-body">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="">Name:</label>
                                <input name="name" type="text" class="form-control" placeholder="Enter name"
                                       value="{{ $newFb->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="">Email:</label>
                                <input name="email" type="email" class="form-control" placeholder="Enter email"
                                       value="{{ $newFb->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                <label for="">Message:</label>
                                <textarea name="message" class="form-control" placeholder="Enter message" rows="5">{{ $newFb->message }}</textarea>

                                @if ($errors->has('message'))
                                    <span class="help-block"><strong>{{ $errors->first('message') }}</strong></span>
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