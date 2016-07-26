<!-- BEGIN #footer -->
<div id="footer">
    <ul class="columns-4 clearfix">
        <li class="col4">
            <div class="widget">
                <div class="widget-title clearfix"><h6>Customer Services</h6></div>
                <ul>
                    <li class="contact-phone">+44 01235 934698</li>
                    <li class="contact-mail">email [at] website [dot] com</li>
                </ul>
            </div>
        </li>
        <li class="col4">
            <div class="widget">
                <div class="widget-title clearfix"><h6>Categories</h6></div>
                <ul>
                    @foreach ($_allCategories as $_cat)
                        <li class="cat-item cat-item-{{ $_cat->id }}">
                            <a href="{{ $_cat->front_url }}" title="View all posts filed under {{ ucfirst($_cat->name) }}">
                                {{ ucfirst($_cat->name) }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>
        <li class="col4">
            <div class="widget">
                <div class="widget-title clearfix"><h6>Tags</h6></div>
                <ul class="wp-tag-cloud">
                    @foreach ($_allTags as $_tag)
                        <li><a href="{{ $_tag->front_url }}" class="tag-link-{{ $_tag->id }}" title="1 topic" style="font-size: 14px;">
                                {{ ucfirst($_tag->name) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>
        {{--Put facebook widget here--}}
    <!-- <li class="col4">
                <div class="widget">
                    <div class="widget-title clearfix">
                        <h6>Flickr</h6>
                    </div>
                    <div class="flickr_badge_wrapper clearfix">
                        <script src="js/badge_code_v2.js" type=
                        "text/javascript">
                        </script>
                        <div class="flickr_badge_image" id=
                        "flickr_badge_image1">
                            <a href=
                            "http://www.flickr.com/photos/buccellaassociati/8522231340/">
                            <img alt="A photo on Flickr" height="75" src=
                            "img/8522231340_c685de88ac_s.jpg" title=
                            "Wedding Cake" width="75"></a>
                        </div>
                        <div class="flickr_badge_image" id=
                        "flickr_badge_image2">
                            <a href=
                            "http://www.flickr.com/photos/buccellaassociati/8522231418/">
                            <img alt="A photo on Flickr" height="75" src=
                            "img/8522231418_0e76d9bc0c_s.jpg" title=
                            "Wedding cake" width="75"></a>
                        </div>
                        <div class="flickr_badge_image" id=
                        "flickr_badge_image3">
                            <a href=
                            "http://www.flickr.com/photos/buccellaassociati/8521119703/">
                            <img alt="A photo on Flickr" height="75" src=
                            "img/8521119703_791522af1f_s.jpg" title=
                            "In allestimento cakes party" width="75"></a>
                        </div>
                        <div class="flickr_badge_image" id=
                        "flickr_badge_image4">
                            <a href=
                            "http://www.flickr.com/photos/buccellaassociati/8522231578/">
                            <img alt="A photo on Flickr" height="75" src=
                            "img/8522231578_b415ce1dd0_s.jpg" title=
                            "Dettaglio invito" width="75"></a>
                        </div>
                        <div class="flickr_badge_image" id=
                        "flickr_badge_image5">
                            <a href=
                            "http://www.flickr.com/photos/buccellaassociati/8522231644/">
                            <img alt="A photo on Flickr" height="75" src=
                            "img/8522231644_8669c131ee_s.jpg" title=
                            "Allestimento le essenze" width="75"></a>
                        </div>
                        <div class="flickr_badge_image" id=
                        "flickr_badge_image6">
                            <a href=
                            "http://www.flickr.com/photos/buccellaassociati/8521119867/">
                            <img alt="A photo on Flickr" height="75" src=
                            "img/8521119867_7d09886b93_s.jpg" title=
                            "Wedding Menu" width="75"></a>
                        </div><span class="flickr_badge_beacon" style=
                        "position:absolute;left:-999em;top:-999em;visibility:hidden"><img alt=""
                        height="0" src="img/p.gif" width="0"></span>
                        <div style="clear:both;"></div>
                        <p class="flickr-more-photos"><a href=
                        "http://www.flickr.com/photos/65744139@N04">View
                        All →</a></p>
                    </div>
                </div>
            </li> -->
    </ul>
</div><!-- END #footer -->

<!-- BEGIN #footer-bottom -->
<div class="clearfix" id="footer-bottom">
    <div class="fl clearfix">
        <!-- Secondary Menu -->
        <ul class="footer-menu">
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-78" id="menu-item-78">
                <a href="http://themes.quitenicestuff.com/organicshopwp/">Home</a>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-80" id="menu-item-80">
                <a href="#">Terms &amp; Conditions</a>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-79" id="menu-item-79">
                <a href="#">Return Policy</a>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-77" id="menu-item-77">
                <a href="http://themes.quitenicestuff.com/organicshopwp/contact/">Contact</a>
            </li>
        </ul>
        <p>© Copyright 2016</p>
    </div>
    <div class="fr"><img alt="" src="{{ asset('img/payment-methods1.png') }}"></div>
</div><!-- END #footer-bottom -->