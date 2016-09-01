@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Posts</h3>

                    <div class="box-tools pull-right">
                        <a class="btn btn-primary" href="{{ route('cms.articles.create') }}">Create</a>
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
                        <form id="js-form-delete" action="{{ route('cms.articles.destroy', $articles->first() ?
                            $articles->first()->id : 0) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <table class="table table-hover datatable">
                                <thead><tr>
                                    <th></th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Categories</th>
                                    <th>Tags</th>
                                    <th>Published At</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>View Post</th>
                                </tr></thead>
                                <tbody>
                                    @foreach ($articles as $article)
                                        <tr>
                                            <td><input name="selected_ids[]" type="checkbox" value="{{ $article->id }}"></td>
                                            <td><a href="{{ route('cms.articles.edit', $article->id) }}"><strong>
                                                        {{ $article->title }}</strong></a></td>
                                            <td>{{ $article->author->display_name }}</td>
                                            <td>{{ $article->category_names }}</td>
                                            <td>{{ $article->tag_names }}</td>
                                            <td>
                                                @if ($article->is_published)
                                                    <span class="text-success"><strong>{{ $article->published_at }}</strong></span>
                                                @else
                                                    <span class="text-warning"><strong>Draft</strong></span>
                                                @endif
                                            </td>
                                            <td>{{ $article->created_at }}</td>
                                            <td>{{ $article->updated_at }}</td>
                                            <td><a href="{{ $article->front_url }}" class="btn btn-info btn-sm" target="_blank" title="View">
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