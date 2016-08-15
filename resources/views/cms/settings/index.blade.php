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
                                        {{--{{ $code == App\Setting::getSiteConfigValue('front_page_language') ? 'checked=checked' : '' }}--}}
                                    >
                                    <span class="flag-icon flag-icon-{{ $code }}"></span> {{ $label }}
                                </label>
                            @endforeach

                            @if ($errors->has('front_page_language'))
                                <span class="help-block"><strong>{{ $errors->first('front_page_language') }}</strong></span>
                            @endif
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