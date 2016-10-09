@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Testimonial</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ $testimonial->id ? route('cms.categories.update', $testimonial->id) : route('cms.categories.store') }}"
                      method="POST">
                    {{ csrf_field() }}
                    {{ $testimonial->id ? method_field('PUT') : '' }}

                    <div class="box-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="">Name:</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter name"
                                   value="{{ $testimonial->name }}">

                            @if ($errors->has('name'))
                                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="">Avatar:</label>
                            <input name="image" id="js-input-image" type="file" class="form-control" accept="image/*">
                            <img id="js-image-thumbnail-gotten" src="{{ $testimonial->image_path }}" width="100px" height="auto">

                            @if ($errors->has('image'))
                                <span class="help-block"><strong>{{ $error->first('image') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="">Message:</label>
                            <textarea name="message" class="form-control" placeholder="Enter message">{{ $testimonial->message }}</textarea>

                            @if ($errors->has('message'))
                                <span class="help-block"><strong>{{ $errors->first('message') }}</strong></span>
                            @endif
                        </div>
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