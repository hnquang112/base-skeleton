@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Category</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ $feedback->id ? route('cms.feedback.update', $feedback->id) : route('cms.feedback.store') }}"
                      method="POST">
                    {{ csrf_field() }}
                    {{ $feedback->id ? method_field('PUT') : '' }}

                    <div class="box-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="">Name:</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter name"
                                   value="{{ $feedback->name }}">

                            @if ($errors->has('name'))
                                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="">Email:</label>
                            <input name="email" type="email" class="form-control" placeholder="Enter email"
                                   value="{{ $feedback->email }}">

                            @if ($errors->has('email'))
                                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="">Message:</label>
                            <textarea name="message" class="form-control" placeholder="Enter message" rows="5">{{ $feedback->message }}</textarea>

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