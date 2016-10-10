@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Feedback</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label for="">Name:</label>
                        <span>{{ $feedback->name }}</span>
                    </div>
                    <div class="form-group">
                        <label for="">Email:</label>
                        <span>{{ $feedback->email }}</span>
                    </div>
                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        <label for="">Message:</label>
                        <p>{{ $feedback->message }}</p>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
@endsection