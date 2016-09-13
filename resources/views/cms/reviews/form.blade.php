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
                <form action="{{ $category->id ? route('cms.categories.update', $category->id) : route('cms.categories.store') }}"
                      method="POST">
                    {{ csrf_field() }}
                    {{ $category->id ? method_field('PUT') : '' }}

                    <div class="box-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="">Name:</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter name" value="{{ $category->name }}">

                            @if ($errors->has('name'))
                                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="">Description:</label>
                            <input name="description" type="text" class="form-control" placeholder="Enter description"
                                   value="{{ $category->description }}">

                            @if ($errors->has('description'))
                                <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
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