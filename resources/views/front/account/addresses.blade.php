@extends ('layouts.front.master')

@section ('content')
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>
    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">

            <!-- BEGIN .col-main -->
            <li class="col-main">
                <h2 class="page-title">Edit My Address</h2>

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
                    <h4>Billing Address</h4>

                    <p class="form-row form-row-first" id="billing_first_name_field">
                        <label for="billing_first_name" class="">Full Name <abbr class="required" title="required">*</abbr></label>
                        <input type="text" class="input-text" name="display_name" id="billing_first_name" placeholder="First Name"
                               value="{{ old('display_name') ?: $user->display_name }}">
                    </p>
                    <div class="clear"></div>
                    <p class="form-row" id="billing_address_1_field">
                        <label for="billing_address_1" class="">Address <abbr class="required" title="required">*</abbr></label>
                        <input type="text" class="input-text" name="address" id="billing_address_1" placeholder="Address"
                               value="{{ old('address') ?: $user->address }}">
                    </p>
                    <div class="clear"></div>
                    <p class="form-row form-row-first" id="billing_city_field">
                        <label for="billing_city" class="">Town/City <abbr class="required" title="required">*</abbr></label>
                        <input type="text" class="input-text" name="city" id="billing_city" placeholder="Town/City"
                               value="{{ old('city') ?: $user->city }}">
                    </p>
                    <p class="form-row form-row-last update_totals_on_change" id="billing_state_field">
                        <label for="billing_state" class="">State/County</label>
                        <input type="text" class="input-text" placeholder="State/County" name="country" id="billing_state"
                               value="{{ old('country') ?: $user->country }}">
                    </p>
                    <div class="clear"></div>
                    <p class="form-row form-row-first" id="billing_email_field">
                        <label for="billing_email" class="">Email Address <abbr class="required" title="required">*</abbr></label>
                        <input type="text" class="input-text" name="email" id="billing_email" placeholder="Email Address"
                               value="{{ old('email') ?: $user->email }}">
                    </p>
                    <p class="form-row form-row-last" id="billing_phone_field">
                        <label for="billing_phone" class="">Phone <abbr class="required" title="required">*</abbr></label>
                        <input type="text" class="input-text" name="phone" id="billing_phone" placeholder="Phone"
                               value="{{ old('phone') ?: $user->phone }}">
                    </p>
                    <div class="clear"></div>

                    <button class="button2" name="submit_from" value="billing" style="margin: 15px 0 0 0;">Save Address</button>

                    <div class="clear"></div><br><hr>

                    {{-- Shipping part --}}
                    <h4>Shipping Address</h4>

                    <p class="form-row form-row-first" id="shipping_first_name_field">
                        <label for="shipping_first_name" class="">Full Name <abbr class="required" title="required">*</abbr></label>
                        <input type="text" class="input-text" name="shipping_first_name" id="shipping_first_name" placeholder="First Name"
                               value="{{ old('shipping_full_name') ?: $user->shipping_full_name }}">
                    </p>
                    <div class="clear"></div>
                    <p class="form-row" id="shipping_address_1_field">
                        <label for="shipping_address_1" class="">Address <abbr class="required" title="required">*</abbr></label>
                        <input type="text" class="input-text" name="shipping_address" id="shipping_address_1" placeholder="Address"
                               value="{{ old('shipping_address') ?: $user->shipping_address }}">
                    </p>
                    <div class="clear"></div>
                    <p class="form-row form-row-first" id="shipping_city_field">
                        <label for="shipping_city" class="">Town/City <abbr class="required" title="required">*</abbr></label>
                        <input type="text" class="input-text" name="shipping_city" id="shipping_city" placeholder="Town/City"
                               value="{{ old('shipping_city') ?: $user->shipping_city }}">
                    </p>
                    <p class="form-row form-row-last update_totals_on_change" id="shipping_state_field">
                        <label for="shipping_state" class="">State/County</label>
                        <input type="text" class="input-text" placeholder="State/County" name="shipping_country" id="shipping_state"
                               value="{{ old('shipping_country') ?: $user->shipping_country }}">
                    </p>
                    <div class="clear"></div>
                    <button class="button2" name="submit_from" value="shipping" style="margin: 15px 0 0 0;">Save Address</button>
                </form>
            </li><!-- END .col-main -->

            @include ('layouts.front._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection
