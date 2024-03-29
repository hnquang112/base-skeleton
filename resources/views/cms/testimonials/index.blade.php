@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Testimonials</h3>
                </div><!-- /.box-header -->
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
                              action="{{ route('cms.testimonials.destroy', $testimonials->first() ? $testimonials->first()->id : 0) }}" >
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <table class="table table-hover datatable">
                                <thead><tr>
                                    <th></th>
                                    <th>From</th>
                                    <th>Avatar</th>
                                    <th>Message</th>
                                    <th>Dates</th>
                                </tr></thead>
                                <tbody>
                                @foreach ($testimonials as $tes)
                                    <tr>
                                        <td><input name="selected_ids[]" type="checkbox" value="{{ $tes->id }}"></td>
                                        <td><a href="{{ route('cms.testimonials.edit', $tes->id) }}"><strong>
                                                    {{ $tes->name }}</strong></a></td>
                                        <td><img src="{{ $tes->image_path }}" alt="{{ $tes->name }}" width="100px" height="auto"></td>
                                        <td>{{ $tes->message }}</td>
                                        <td>{{ $tes->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table><!-- /.table -->
                        </form>
                    </div><!-- /.mail-box-messages -->
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
                    </div><!-- /.box-tools -->
                </div>
                <form action="{{ route('cms.testimonials.store') }}" method="POST">
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
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label for="">Avatar (*):</label>
                                @include ('layouts.cms._file_selector', ['inputName' => 'represent_image',
                                    'filePath' => get_image_path($testimonial->image)])

                                @if ($errors->has('image'))
                                    <span class="help-block"><strong>{{ $errors->first('image') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                <label for="">Message (*):</label>
                                <textarea name="message" class="form-control" placeholder="Enter message" rows="5"></textarea>

                                @if ($errors->has('message'))
                                    <span class="help-block"><strong>{{ $errors->first('message') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('post_id') ? ' has-error' : '' }}">
                                <label for="">Product:</label>
                                <select name="post_id" class="form-control select2" style="width: 100%">
                                    <option value="0" selected></option>
                                    @foreach (App\Product::pluck('title', 'id') as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('post_id'))
                                    <span class="help-block"><strong>{{ $errors->first('post_id') }}</strong></span>
                                @endif
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-primary btn-flat pull-right" type="submit">Save</button>
                    </div>
                </form>
            </div><!-- /.box -->
        </div>
    </div>
@endsection