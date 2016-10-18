@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <!-- form start -->
        <form action="{{ $article->id ? route('cms.articles.update', $article->id) : route('cms.articles.store') }}"
              id="js-save-post-form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ $article->id ? method_field('PUT') : '' }}

            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Article</h3>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="">Title (*):</label>
                            <input name="title" type="text" class="form-control" placeholder="Enter title"
                                   value="{{ old('title') ?: $article->title }}">

                            @if ($errors->has('title'))
                                <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('short_description') ? ' has-error' : '' }}">
                            <label for="">Description (*):</label>
                            <input name="short_description" type="text" class="form-control" placeholder="Enter description"
                                   value="{{ old('short_description') ?: $article->short_description }}">

                            @if ($errors->has('short_description'))
                                <span class="help-block"><strong>{{ $errors->first('short_description') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="">Content (*):</label>
                            <textarea name="content" id="summernote" class="hidden">{{ old('content') ?: $article->content }}</textarea>

                            @if ($errors->has('content'))
                                <span class="help-block"><strong>{{ $errors->first('content') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('seo_title') ? ' has-error' : '' }}">
                            <label for="">SEO Title:</label>
                            <input name="seo_title" type="text" class="form-control" placeholder="Enter SEO title"
                                   value="{{ old('seo_title') ?: $article->seo_title }}">
                        </div>
                        <div class="form-group{{ $errors->has('seo_description') ? ' has-error' : '' }}">
                            <label for="">SEO Description:</label>
                            <input name="seo_description" type="text" class="form-control" placeholder="Enter SEO description"
                                   value="{{ old('seo_description') ?: $article->seo_description }}">
                        </div>
                        <div class="form-group{{ $errors->has('seo_keywords') ? ' has-error' : '' }}">
                            <label for="">SEO Keywords:</label>
                            <input name="seo_keywords" type="text" class="form-control" placeholder="Enter SEO keywords"
                                   value="{{ old('seo_keywords') ?: $article->seo_keywords }}">
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

            <div class="col-md-3">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Publish</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <p>Status:
                            @if ($article->is_published)
                                <span class="text-success"><strong>Published</strong> at {{ $article->published_at }}</span>
                            @else
                                <span class="text-warning"><strong>Draft</strong></span>
                            @endif
                        </p>

                        <div class="checkbox">
                            <label><input name="do_publish" type="checkbox" value="{{ App\Article::STT_PUBLISHED }}"
                                        {{ $article->is_published ? 'checked=checked' : '' }}>
                                Also publish when saving</label>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        @if ($article->is_published)
                            <button class="btn btn-warning btn-flat pull-left" name="publish" value="0">Unpublish</button>
                        @else
                            <button class="btn btn-info btn-flat pull-left" name="publish" value="1">Publish</button>
                        @endif
                        <button class="btn btn-primary btn-flat pull-right" onclick="$('#js-save-post-form').submit()">Save</button>
                    </div>
                </div><!-- /.box -->

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tags</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <select name="tag_ids[]" class="form-control select2" multiple style="width: 100%">
                            @foreach (App\Tag::pluck('name', 'id') as $id => $name)
                                <option value="{{ $id }}" {{ in_array($id, $tags) ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Represent Image</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <label for="">Image:</label>
                        <input name="represent_image" id="js-input-image" type="file" class="form-control" accept="image/*">
                        <img id="js-image-thumbnail-gotten" src="{{ $article->represent_image_path }}" width="100%" height="auto">
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </form>
    </div>
@endsection