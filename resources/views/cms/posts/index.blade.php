@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Posts</h3>

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
                        <button id="js-button-confirm-delete" type="button" class="btn btn-danger btn-sm" title="Delete">
                            <i class="fa fa-trash-o"></i></button>

                        {{--<!-- Bunch publish button -->--}}
                        {{--<button id="js-button-publish" type="button" class="btn btn-success btn-sm" title="Publish">--}}
                            {{--<i class="fa fa-share-alt"></i></button>--}}
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
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Last Updated At</th>
                                    <th>View Post</th>
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
                                            <td>
                                                @if ($post->is_published)
                                                    <span class="text-success"><strong>Published</strong> at {{ $post->published_at }}</span>
                                                @else
                                                    <span class="text-warning"><strong>Draft</strong>
                                                @endif
                                            </td>
                                            <td>{{ $post->created_at }}</td>
                                            <td>{{ $post->updated_at }}</td>
                                            <td><a href="{{ $post->front_url }}" class="btn btn-info btn-sm" target="_blank" title="View">
                                                    <i class="fa fa-external-link"></i></a></td>
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