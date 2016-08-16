<!DOCTYPE html>
<html>
<head>
    <title>BS Demo</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
        .fileinput-button {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        .fileinput-button input {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            opacity: 0;
            -ms-filter: 'alpha(opacity=0)';
            font-size: 200px !important;
            direction: ltr;
            cursor: pointer;
        }
        @media screen\9 {
            .fileinput-button input {
                filter: alpha(opacity=0);
                font-size: 100%;
                height: 100%;
            }
        }
    </style>
</head>
<body>
<div class="container" style="margin: 30px auto">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="btn btn-success fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Select images...</span>
                        <!-- The file input field used as target for the file upload widget -->
                        <input id="fileupload" type="file" name="files[]" multiple data-url={{ route('api.files.store') }}>
                    </span>

                    <br>
                    <br>

                    <!-- The global progress bar -->
                    <div id="progress" class="progress">
                        <div class="progress-bar progress-bar-success"></div>
                    </div>
                </div>

                <div class="panel-body">
                    <!-- The container for the uploaded files -->
                    <div id="files" class="files"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ elixir('js/vendor.js') }}"></script>
<script>
    $(function () {
        'use strict';
        $('#fileupload').fileupload({
            type: 'POST',
            dataType: 'json',
            singleFileUploads: false,
            done: function (e, data) {
                $.each(data.result.files, function (index, file) {
                    $('<img width="100%"/>').attr('src', file.url).appendTo('#files');
                    $('<p/>').text(file.url).appendTo('#files');
                });
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css('width', progress + '%');
            }
        }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
</script>
</body>
</html>