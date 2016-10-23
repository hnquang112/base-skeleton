@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <div class="col-md-12">
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
                                        <td><a href="{{ route('cms.feedback.show', $fb->id) }}">
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
    </div>
@endsection