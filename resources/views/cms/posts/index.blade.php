@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Posts</h3>

                    <!--Filter items-->
                    <a href="">Tất cả (442)</a> | <a href="">Của tôi (215)</a> | <a href="">Đã đăng (442)</a>

                    <div class="box-tools pull-right">
                        <a class="btn btn-primary" href="{{ route('cms.posts.create') }}">Create</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="mailbox-controls form-inline">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm js-toggle-checkbox"><i class="fa fa-square-o"></i>
                        </button>

                        <!-- Bunch delete button -->
                        <button type="button" class="btn btn-danger btn-sm js-delete-posts"><i class="fa fa-trash-o"></i></button>

                        <form style="display: inline">
                            <div class="form-group">
                                <select class="form-control">
                                    <option value="">Date</option>
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select class="form-control">
                                    <option value="">Category</option>
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-default">Filter</button>
                        </form>

                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" placeholder="Search Post">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover">
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
                                        <td><a href="read-mail.html"><strong>{{ $post->title }}</strong></a></td>
                                        <td>Alexander Pierce</td>
                                        <td>asd, qwe, zxc</td>
                                        <td>qaz, edc, wsx</td>
                                        <td>{{ $post->updated_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">
                    <div class="mailbox-controls">
                        <!-- /.btn-group -->
                        <div class="pull-right">
                            @include ('layouts.cms._pagination', ['paginator' => $posts])
                        </div>
                        <!-- /.pull-right -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push ('scripts')
<script type="text/javascript">
    $(function () {
        //Enable check and uncheck all functionality
        $(".js-toggle-checkbox").click(function () {
            var clicks = $(this).data('clicks');

            if (clicks) {
                //Uncheck all checkboxes
                $(".mailbox-messages input[type='checkbox']").prop("checked", false);
                $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
            } else {
                //Check all checkboxes
                $(".mailbox-messages input[type='checkbox']").prop("checked", true);
                $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
            }
            $(this).data("clicks", !clicks);
        });

        $(".js-delete-posts").click(function () {
            var ids = [];

            ids = $.map($('input[type="checkbox"]:checked'), function (c) {
                return c.value;
            });

            //TODO:
            // 1. show confirmation
            // 2. call delete posts api
            // 3. delete posts
        });
    })
</script>
@endpush