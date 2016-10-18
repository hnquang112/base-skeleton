@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Sliders</h3>
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
                              action="{{ route('cms.sliders.destroy', $sliders->first() ? $sliders->first()->id : 0) }}" >
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <table class="table table-hover datatable">
                                <thead><tr>
                                    <th></th>
                                    <th>Image</th>
                                    <th>Label</th>
                                    <th>Dates</th>
                                </tr></thead>
                                <tbody>
                                @foreach ($sliders as $sld)
                                    <tr>
                                        <td><input name="selected_ids[]" type="checkbox" value="{{ $sld->id }}"></td>
                                        <td><img src="{{ $sld->image_path }}" width="200px"></td>
                                        <td><a href="{{ route('cms.sliders.edit', $sld->id) }}">{{ $sld->label }}</a></td>
                                        <td>{{ $sld->created_at }}</td>
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
                <form action="{{ $slider->id ? route('cms.sliders.update', $slider->id) : route('cms.sliders.store') }}"
                      method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="box-body">
                            <div class="form-group{{ $errors->has('label') ? ' has-error' : '' }}">
                                <label for="">Label:</label>
                                <textarea name="label" class="form-control" placeholder="Enter label"></textarea>

                                @if ($errors->has('label'))
                                    <span class="help-block"><strong>{{ $errors->first('label') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label for="">Image:</label>
                                <input name="image" id="js-input-image" type="file" class="form-control" accept="image/*">
                                <img id="js-image-thumbnail-gotten" src="" width="100%" height="auto">

                                @if ($errors->has('image'))
                                    <span class="help-block"><strong>{{ $errors->first('image') }}</strong></span>
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