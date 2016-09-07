<!DOCTYPE html>
<html>
<head>
    <title>BS Demo</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin: 30px auto">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">QR Generator Demo</h3>
                </div>
                <div class="panel-body">
                    <form method="post" action="{{ route('api.qr_codes.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Information</label>
                            <textarea name="info" cols="30" rows="10" class="form-control" id="exampleInputEmail1"
                                      placeholder="Enter text as QR data" required autofocus></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Generate QR Code</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>