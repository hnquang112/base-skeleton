<!-- BEGIN .slider -->
<div class="slider clearfix">
    <div class="flex-viewport" style="overflow: hidden; position: relative;">
        <ul class="slides" style="width: 1000%; transition-duration: 0.6s; transform: translate3d(-2361px, 0px, 0px);">
            @foreach ($_allSliders as $_slider)
                <li class="clone" style="width: 787px; float: left; display: block;">
                    <img alt="" src="{{ $_slider->image_path }}">
                    <div class="flex-caption">
                        <p>{{ $_slider->label }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <ul class="flex-direction-nav">
        <li><a class="flex-prev" href="#">Previous</a></li>
        <li><a class="flex-next" href="#">Next</a></li>
    </ul>
</div><!-- END .slider -->

<!-- BEGIN .section -->
<div class="section section-intro">
    <h2 class="site-intro">Mauris nunc nulla, pretium ac scelerisque
        eget, blandit sed leo. Vestibulum luctus gravida nulla, vitae
        tincidunt lacus ornare in</h2><!-- END .section -->
</div>