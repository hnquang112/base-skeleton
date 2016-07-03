@extends ('layouts.cms.master')

@section ('content')
    <form action="{{ route('cms.posts.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <textarea id="summernote">Hello Summernote</textarea>

        <textarea name="content" id="result" class="hidden"></textarea>
        <button type="submit">Save</button>
    </form>
@endsection

@push ('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
            minHeight: 200,
            callbacks: {
                onBlur: function() {
                    $('#result').val($(this).summernote('code'));
                    console.log('Editable area loses focus');
                }
            }
        });
    });
</script>
@endpush