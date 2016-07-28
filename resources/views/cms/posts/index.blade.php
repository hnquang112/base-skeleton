@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Posts</h3>

                    <!--Filter items-->
                    <a href="{{ route('cms.posts.index') }}">All (442)</a> |
                    <a href="{{ route('cms.posts.index', ['filter' => 'mine']) }}">Mine (215)</a> | 
                    <a href="{{ route('cms.posts.index', ['filter' => 'published']) }}">Published (442)</a>

                    <div class="box-tools pull-right">
                        <a class="btn btn-primary" href="{{ route('cms.posts.create') }}">Create</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="mailbox-controls form-inline">
                        <!-- Check all button -->
                        <button id="js-checkbox-toggle-check-all" type="button" class="btn btn-default btn-sm">
                            <i class="fa fa-square-o"></i></button>

                        <!-- Bunch delete button -->
                        <button id="js-button-confirm-delete" type="button" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash-o"></i></button>

                        <form id="js-form-filter-items" action="{{ route('cms.posts.create') }}" method="GET" style="display: inline">
                            <div class="form-group">
                                <select name="filter_date" class="form-control">
                                    <option>Date</option>
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="filter_category" class="form-control">
                                    <option>All</option>
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-default">Filter</button>
                        </form>
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <form id="js-form-delete" action="{{ route('cms.posts.destroy', $posts->first() ?
                            $posts->first()->id : 0) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <table class="table table-hover datatable">
                                <thead><tr>
                                    <th></th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Categories</th>
                                    <th>Tags</th>
                                    <th>Dates</th>
                                </tr></thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td><input name="selected_ids[]" type="checkbox" value="{{ $post->id }}"></td>
                                            <td><a href="{{ route('cms.posts.edit', $post->id) }}"><strong>
                                                        {{ $post->title }}</strong></a></td>
                                            <td>{{ $post->author->display_name }}</td>
                                            <td>{{ $post->category_names }}</td>
                                            <td>{{ $post->tag_names }}</td>
                                            <td>{{ $post->published_at }}</td>
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