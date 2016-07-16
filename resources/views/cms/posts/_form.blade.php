<div class="row">
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Post</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ $post->id ? route('cms.posts.update', $post->id) : route('cms.posts.store') }}"
                  id="js-save-post-form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ $post->id ? method_field('PUT') : '' }}

                <div class="box-body">
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="">Title:</label>
                        <input name="title" type="text" class="form-control" placeholder="Enter title" value="{{ $post->title }}">

                        @if ($errors->has('title'))
                            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('short_description') ? ' has-error' : '' }}">
                        <label for="">Description:</label>
                        <input name="short_description" type="text" class="form-control" placeholder="Enter description"
                               value="{{ $post->short_description }}">

                        @if ($errors->has('short_description'))
                            <span class="help-block"><strong>{{ $errors->first('short_description') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                        <label for="">Content:</label>
                        <textarea name="content" id="summernote" class="hidden">{{ $post->content }}</textarea>

                        @if ($errors->has('content'))
                            <span class="help-block"><strong>{{ $errors->first('content') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('seo_title') ? ' has-error' : '' }}">
                        <label for="">SEO Title:</label>
                        <input name="seo_title" type="text" class="form-control" placeholder="Enter SEO title"
                               value="{{ $post->seo_title }}">
                    </div>
                    <div class="form-group{{ $errors->has('seo_description') ? ' has-error' : '' }}">
                        <label for="">SEO Description:</label>
                        <input name="seo_description" type="text" class="form-control" placeholder="Enter SEO description"
                               value="{{ $post->seo_description }}">
                    </div>
                    <div class="form-group{{ $errors->has('seo_keywords') ? ' has-error' : '' }}">
                        <label for="">SEO Keywords:</label>
                        <input name="seo_keywords" type="text" class="form-control" placeholder="Enter SEO keywords"
                               value="{{ $post->seo_keywords }}">
                    </div>
                </div>
                <!-- /.box-body -->
            </form>
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-3">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Publish</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                The body of the box
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

                <button class="btn btn-primary btn-flat pull-right" onclick="$('#js-save-post-form').submit()">Save</button>
            </div>
        </div>
        <!-- /.box -->

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Categories</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                The body of the box
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

                <button class="btn btn-primary btn-flat pull-right" onclick="$('#js-post-form').submit()">Save</button>
            </div>
        </div>
        <!-- /.box -->

        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Tags</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                The body of the box
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

                <button class="btn btn-primary btn-flat pull-right" onclick="$('#js-post-form').submit()">Save</button>
            </div>
        </div>
        <!-- /.box -->

        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Represent Image</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                The body of the box
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

                <button class="btn btn-primary btn-flat pull-right" onclick="$('#js-post-form').submit()">Save</button>
            </div>
        </div>
        <!-- /.box -->
    </div>
</div>