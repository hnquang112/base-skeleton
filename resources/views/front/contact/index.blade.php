@extends ('layouts.front.master')

@push ('styles')
<style>
    #gmap_canvas img{
        max-width:none!important;
        background:none!important
    }
</style>
@endpush

@push ('scripts')
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
<script type='text/javascript'>
    function init_map(){
        var myOptions = {
            zoom:20,
            center:new google.maps.LatLng(51.5073509,-0.12775829999998223),
            mapTypeId: google.maps.MapTypeId.TERRAIN
        };
        map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
        marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(51.5073509,-0.12775829999998223)});
        infowindow = new google.maps.InfoWindow({content:'<strong>Title</strong><br>vung tau<br>'});
        google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});
        infowindow.open(map,marker);
    }
    google.maps.event.addDomListener(window, 'load', init_map);
</script>
@endpush

@section ('content')
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>

    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">
            <li class="col-main">
                <h2 class="page-title">Contact</h2>

                <ul class="columns-2 clearfix">
                    <li class="col2">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras fringilla quam quis neque blandit nec adipiscing lectus vehicula. Ut sit amet elit ac massa hendrerit euismod id eget sem. Aenean lobortis lacus quis ipsum lobortis sagittis.</p>
                    </li>

                    <li class="col2">
                        <h4>Details</h4>

                        <!--BEGIN .contact_list -->
                        <ul class="contact_list">
                            <li class="address"><span>1 London Road, SE1</span>
                            </li>
                            <li class="phone"><span>+44 01235 934698</span>
                            </li>
                            <li class="email"><span>email [at] website [dot] com</span>
                            </li>
                            <!--END .contact_list -->
                        </ul>
                    </li>
                </ul>

                <div id='gmap_canvas' style='height:300px;width:100%'></div>
                <h4>Send Us An Email</h4>

                <form action="http://themes.quitenicestuff.com/organicshopwp/contact/" id="contactform" class="clearfix" method="post">
                    <div class="field-row">
                        <label for="contact_name">Name <span>(required)</span></label>
                        <input type="text" name="contact_name" id="contact_name" class="text_input" value="">
                    </div>

                    <div class="field-row">
                        <label for="email">Email <span>(required)</span></label>
                        <input type="text" name="email" id="email" class="text_input" value="">
                    </div>

                    <div class="field-row">
                        <label for="message_text">Message <span>(required)</span></label>
                        <textarea name="message" id="message_text" class="text_input" cols="60" rows="9"></textarea>
                    </div>

                    <input class="button2" type="submit" value="Send Email" name="submit">
                    <input type="hidden" name="sent" value="true">
                </form>
            </li><!-- END .col-main -->
            @include ('layouts.front._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection