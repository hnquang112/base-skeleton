@if (Route::currentRouteName() == 'index')
    <!-- BEGIN .slider -->
    <div class="slider clearfix">
        <div class="flex-viewport" style="overflow: hidden; position: relative;">
            <ul class="slides" style="width: 1000%; transition-duration: 0.6s; transform: translate3d(-2361px, 0px, 0px);">
                @forelse ($_allSliders as $_slider)
                    <li class="clone" style="width: 787px; float: left; display: block;">
                        <img alt="" src="{{ $_slider->image_path }}">
                        <div class="flex-caption">
                            <p>{{ $_slider->label }}</p>
                        </div>
                    </li>
                @empty
                    <li class="clone" style="width: 787px; float: left; display: block;">
                        <img alt="" src="https://placehold.it/960x416">
                        <div class="flex-caption">
                            <p>Mauris nunc nulla</p>
                        </div>
                    </li>
                    <li class="clone" style="width: 787px; float: left; display: block;">
                        <img alt="" src="https://placehold.it/960x416">
                        <div class="flex-caption">
                            <p>Vestibulum luctus gravida nulla</p>
                        </div>
                    </li>
                @endforelse
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
@else
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>
@endif
