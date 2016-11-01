@extends ('layouts.front.master')

@section ('content')
    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">

            <!-- BEGIN .col-main -->
            <li class="col-main">
                <h2 class="page-title">@lang ('front.account.address.title')</h2>

                @if (count($errors) > 0)
                    <div class="msg fail">
                        <ul class="list-fail">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('account.store') }}" method="post">
                    {{ csrf_field() }}

                    {{-- Billing part --}}
                    <h4>@lang ('front.account.address.billing')</h4>

                    <p class="form-row form-row-first" id="billing_first_name_field">
                        <label for="billing_first_name">@lang ('front.account.address.full_name') <abbr class="required" title="required">*</abbr></label>
                        <input type="text" class="input-text" name="display_name" id="billing_first_name" placeholder="@lang ('front.common.placeholder.name')"
                               value="{{ old('display_name') ?: $user->display_name }}">
                    </p>
                    <div class="clear"></div>
                    <p class="form-row" id="billing_address_1_field">
                        <label for="billing_address_1">@lang ('front.account.address.address') <abbr class="required" title="required">*</abbr></label>
                        <input type="text" class="input-text" name="address" id="billing_address_1" placeholder="@lang ('front.common.placeholder.address')"
                               value="{{ old('address') ?: $user->address }}">
                    </p>
                    <div class="clear"></div>
                    <p class="form-row form-row-first" id="billing_city_field">
                        <label for="billing_city">@lang ('front.account.address.city') <abbr class="required" title="required">*</abbr></label>
                        <input type="text" class="input-text" name="city" id="billing_city" placeholder="@lang ('front.common.placeholder.city')"
                               value="{{ old('city') ?: $user->city }}">
                    </p>
                    <p class="form-row form-row-last update_totals_on_change" id="billing_state_field">
                        <label for="billing_state">@lang ('front.account.address.country')</label>
                        <input type="text" class="input-text" name="country" id="billing_state" placeholder="@lang ('front.common.placeholder.country')"
                               value="{{ old('country') ?: $user->country }}">
                    </p>
                    <div class="clear"></div>
                    <p class="form-row form-row-first" id="billing_email_field">
                        <label for="billing_email">@lang ('front.account.address.email') <abbr class="required" title="required">*</abbr></label>
                        <input type="text" class="input-text" name="email" id="billing_email" placeholder="@lang ('front.common.placeholder.email')"
                               value="{{ old('email') ?: $user->email }}">
                    </p>
                    <p class="form-row form-row-last" id="billing_phone_field">
                        <label for="billing_phone">@lang ('front.account.address.phone') <abbr class="required" title="required">*</abbr></label>
                        <input type="text" class="input-text" name="phone" id="billing_phone" placeholder="@lang ('front.common.placeholder.phone')"
                               value="{{ old('phone') ?: $user->phone }}">
                    </p>
                    <div class="clear"></div>

                    <a class="button2" href="{{ route('account.index') }}" style="margin: 15px 0 0 0;">@lang ('front.account.address.cancel_btn')</a>
                    <div class="fr">
                        <button class="button2" name="submit_from" value="billing" style="margin: 15px 0 0 0;">@lang ('front.account.address.save_btn')</button>
                    </div>

                    <div class="clear"></div><br><hr>

                    {{-- Shipping part --}}
                    <h4>@lang ('front.account.address.shipping')</h4>

                    <p class="form-row form-row-first" id="shipping_first_name_field">
                        <label for="shipping_first_name">@lang ('front.account.address.full_name') <abbr class="required" title="required">*</abbr></label>
                        <input type="text" class="input-text" name="shipping_full_name" id="shipping_first_name" placeholder="@lang ('front.common.placeholder.name.alt')"
                               value="{{ old('shipping_full_name') ?: $user->shipping_full_name }}">
                    </p>
                    <div class="clear"></div>
                    <p class="form-row" id="shipping_address_1_field">
                        <label for="shipping_address_1">@lang ('front.account.address.address') <abbr class="required" title="required">*</abbr></label>
                        <input type="text" class="input-text" name="shipping_address" id="shipping_address_1" placeholder="@lang ('front.common.placeholder.address.alt')"
                               value="{{ old('shipping_address') ?: $user->shipping_address }}">
                    </p>
                    <div class="clear"></div>
                    <p class="form-row form-row-first" id="shipping_city_field">
                        <label for="shipping_city">@lang ('front.account.address.city') <abbr class="required" title="required">*</abbr></label>
                        <input type="text" class="input-text" name="shipping_city" id="shipping_city" placeholder="@lang ('front.common.placeholder.city.alt')"
                               value="{{ old('shipping_city') ?: $user->shipping_city }}">
                    </p>
                    <p class="form-row form-row-last update_totals_on_change" id="shipping_state_field">
                        <label for="shipping_state">@lang ('front.account.address.country')</label>
                        <input type="text" class="input-text" name="shipping_country" id="shipping_state" placeholder="@lang ('front.common.placeholder.country.alt')"
                               value="{{ old('shipping_country') ?: $user->shipping_country }}">
                    </p>
                    <div class="clear"></div>

                    <a class="button2" href="{{ route('account.index') }}" style="margin: 15px 0 0 0;">@lang ('front.account.address.cancel_btn')</a>
                    <div class="fr">
                        <button class="button2" name="submit_from" value="shipping" style="margin: 15px 0 0 0;">@lang ('front.account.address.save_btn')</button>
                    </div>
                </form>
            </li><!-- END .col-main -->

            @include ('layouts.front._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection
