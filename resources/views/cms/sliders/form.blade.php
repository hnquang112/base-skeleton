@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Slider</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="{{ $slider->id ? route('cms.sliders.update', $slider->id) : route('cms.sliders.store') }}" method="POST">
                    {{ csrf_field() }}
                    {{ $slider->id ? method_field('PUT') : '' }}

                    <div class="box-body">
                        <div class="form-group{{ $errors->has('label') ? ' has-error' : '' }}">
                            <label for="">Label:</label>
                            <input name="label" type="text" class="form-control" placeholder="Enter label" value="{{ $slider->label }}">

                            @if ($errors->has('label'))
                                <span class="help-block"><strong>{{ $errors->first('label') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <p>Use these services to upload image: <a href="https://www.flickr.com/" target="blank">Flickr</a>, <a href="http://imgur.com/" 
                                target="blank">Imgur</a>, <a href="http://2.pik.vn/" target="blank">pik.vn</a></p>
                            <label for="">Image URL:</label>

                            <div class="input-group input-group-sm">
                                <input name="image" id="js-input-image-url" type="text" class="form-control" placeholder="Paste URL of the uploaded image">
                                <span class="input-group-btn">
                                    <button id="js-button-get-image-from-url" type="button" class="btn btn-info btn-flat" disabled="disabled">Get</button>
                                </span>
                            </div>

                            @if ($errors->has('image'))
                                <span class="help-block"><strong>{{ $errors->first('image') }}</strong></span>
                            @endif

                            <p id="js-p-get-result" class="margin text-red"></p>

                            <img id="js-image-thumbnail-gotten" src="{{ $slider->image_path }}" width="auto" height="auto">
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