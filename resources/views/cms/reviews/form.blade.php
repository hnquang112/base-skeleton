@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Review</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ $review->id ? route('cms.reviews.update', $review->id) : route('cms.reviews.store') }}"
                      method="POST">
                    {{ csrf_field() }}
                    {{ $review->id ? method_field('PUT') : '' }}

                    <div class="box-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="">Name (*):</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter name"
                                   value="{{ old('name') ?: $review->name }}">

                            @if ($errors->has('name'))
                                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="">Email (*):</label>
                            <input name="email" type="email" class="form-control" placeholder="Enter email"
                                   value="{{ old('email') ?: $review->email }}">

                            @if ($errors->has('email'))
                                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
                            <label for="">Rating (*):</label>
                            <select name="rating" class="form-control">
                                @for ($i = 5; $i >= 1; $i--)
                                    <option value="{{ $i }}" {{ $i == $review->rating ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>

                            @if ($errors->has('rating'))
                                <span class="help-block"><strong>{{ $errors->first('rating') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="">Message (*):</label>
                            <input name="message" type="text" class="form-control" placeholder="Enter message"
                                   value="{{ old('message') ?: $review->message }}">

                            @if ($errors->has('message'))
                                <span class="help-block"><strong>{{ $errors->first('message') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('post_id') ? ' has-error' : '' }}">
                            <label for="">Product (*):</label>
                            <select name="post_id" class="form-control select2" style="width: 100%">
                                @foreach (App\Product::pluck('title', 'id') as $id => $name)
                                    <option value="{{ $id }}" {{ $id == $review->post_id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('post_id'))
                                <span class="help-block"><strong>{{ $errors->first('post_id') }}</strong></span>
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