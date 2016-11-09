@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Slider</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="{{ $slider->id ? route('cms.sliders.update', $slider->id) : route('cms.sliders.store') }}"
                      method="POST">
                    {{ csrf_field() }}
                    {{ $slider->id ? method_field('PUT') : '' }}

                    <div class="box-body">
                        <div class="form-group{{ $errors->has('label') ? ' has-error' : '' }}">
                            <label for="">Label (*):</label>
                            <textarea name="label" class="form-control" placeholder="Enter label">{{ old('label') ?: $slider->label }}</textarea>

                            @if ($errors->has('label'))
                                <span class="help-block"><strong>{{ $errors->first('label') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="">Image (*):</label>
                            @include ('layouts.cms._file_selector', ['inputName' => 'image', 'filePath' => $slider->image_path])

                            @if ($errors->has('image'))
                                <span class="help-block"><strong>{{ $errors->first('image') }}</strong></span>
                            @endif
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-primary btn-flat pull-right" type="submit">Save</button>
                    </div>
                </form>
            </div><!-- /.box -->
        </div>
    </div>
@endsection