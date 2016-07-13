<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Post</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ $post->id ? route('cms.posts.update', $post->id) : route('cms.posts.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ $post->id ? method_field('PUT') : '' }}

                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title:</label>
                        <input name="title" type="text" class="form-control" placeholder="Enter title" value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Content:</label>
                        <textarea name="content" id="summernote" class="hidden">{{ $post->content }}</textarea>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <a class="btn btn-default" href="{{ route('cms.posts.index') }}">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>

@push ('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
            minHeight: 200,
            callbacks: {
                onChange: function(contents, $editable) {
                    $('#this').val(contents);
                }
            }
        });
    });
</script>
@endpush