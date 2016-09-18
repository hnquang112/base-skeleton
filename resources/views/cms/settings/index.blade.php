@extends ('layouts.cms.master')

@section ('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">General Settings</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('cms.settings.store') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="box-body form-inline">
                        <div class="form-group{{ $errors->has('label') ? ' has-error' : '' }}">
                            <label for="">Language:</label>

                            @foreach (App\Setting::$languages as $code => $label)
                                <label class="radio-inline">
                                    <input type="radio" name="front_page_language" id="lang_{{ $code }}" value="{{ $code }}"
                                        {{ $code == App\Setting::getSiteConfigValue('front_page_language') ? 'checked=checked' : '' }}
                                    >
                                    <span class="flag-icon flag-icon-{{ $label['flag'] }}"></span> {{ $label['name'] }}
                                </label>
                            @endforeach

                            @if ($errors->has('front_page_language'))
                                <span class="help-block"><strong>{{ $errors->first('front_page_language') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group{{ $errors->has('label') ? ' has-error' : '' }}">
                            <label for="">Contact:</label>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input type="text" name="store_address" class="form-control" placeholder="Address">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" name="store_phone" class="form-control" placeholder="Phone">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" name="store_email" class="form-control" placeholder="Email">
                            </div>

                            {{--@if ($errors->has('front_page_language'))--}}
                                {{--<span class="help-block"><strong>{{ $errors->first('front_page_language') }}</strong></span>--}}
                            {{--@endif--}}
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-primary btn-flat pull-right" type="submit">Save</button>
                    </div>
                </form>
            </div><!-- /.box -->
        </div>
    </div>
@endsection