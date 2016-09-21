@extends ('layouts.front.master')

@section ('content')
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>

    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">
            <li class="col-main">
                <h2 class="page-title">@lang ('front.contact.title')</h2>

                <ul class="columns-2 clearfix">
                    <li class="col2">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras fringilla quam quis neque blandit nec adipiscing lectus vehicula. Ut sit amet elit ac massa hendrerit euismod id eget sem. Aenean lobortis lacus quis ipsum lobortis sagittis.</p>
                    </li>

                    <li class="col2">
                        <h4>@lang ('front.contact.detail')</h4>

                        <!--BEGIN .contact_list -->
                        <ul class="contact_list">
                            <li class="address"><span>{{ App\Setting::getSiteConfigValue('store_address') }}</span></li>
                            <li class="phone"><span>{{ App\Setting::getSiteConfigValue('store_phone') }}</span></li>
                            <li class="email"><span>{{ App\Setting::getSiteConfigValue('store_email') }}</span></li>
                            <!--END .contact_list -->
                        </ul>
                    </li>
                </ul>

                <iframe width="100%" height="300" frameborder="0" style="border: 0; margin-bottom: 30px" allowfullscreen
                        src="https://www.google.com/maps/embed/v1/place?q={{ App\Setting::getSiteConfigValue('store_address') }}&key={{ config('services.google.maps-api-key') }}"></iframe>
                @if (count($errors) > 0)
                    <div class="msg fail">
                        <ul class="list-fail">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('contact.saved'))
                    <div class="msg success clearfix">
                        <p class="fl">@lang ('contact.email_sent')</p>
                    </div>
                @endif

                <h4>@lang ('front.contact.send_email')</h4>

                <form action="{{ route('contact.store') }}" id="contactform" class="clearfix" method="post">
                    {{ csrf_field() }}

                    <div class="field-row">
                        <label for="contact_name">@lang ('front.contact.field.name') <span>(*)</span></label>
                        <input type="text" name="name" id="contact_name" class="text_input" value="{{ old('name') }}"
                               placeholder="@lang ('front.common.placeholder.name')">
                    </div>

                    <div class="field-row">
                        <label for="email">@lang ('front.contact.field.email') <span>(*)</span></label>
                        <input type="email" name="email" id="email" class="text_input" value="{{ old('email') }}"
                               placeholder="@lang ('front.common.placeholder.email')">
                    </div>

                    <div class="field-row">
                        <label for="message_text">@lang ('front.contact.field.message') <span>(*)</span></label>
                        <textarea name="message" id="message_text" class="text_input" cols="60" rows="9" style="resize: vertical"
                                  placeholder="@lang ('front.common.placeholder.message')">{{ old('message') }}</textarea>
                    </div>

                    <div class="field-row">
                        {!! app('captcha')->display() !!}
                    </div>

                    <button class="button2" type="submit" style="margin-top: 20px">@lang ('front.contact.field.send_email')</button>
                </form>
            </li><!-- END .col-main -->
            @include ('layouts.front._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection