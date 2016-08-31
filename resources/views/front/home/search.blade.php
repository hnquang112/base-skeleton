@extends ('layouts.front.master')

@section ('content')
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>

    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">

            <!-- BEGIN .col-main -->
            <li class="col-main">
                <h2 class="page-title">Search</h2>

                <!-- BEGIN .page-content -->
                <div class="page-content">
                    <h4>Shop</h4>

                    <!--BEGIN .search-results -->
                    <ol class="search-results">
                        <li><strong><a href="http://themes.quitenicestuff.com/organicshopwp/moisturisers/" rel="bookmark" title="Moisturisers">Moisturisers</a></strong>
                            <br> </li>
                        <!--END .search-results -->
                    </ol>

                    <hr class="bottom-margin2">

                    <h4>Blog</h4>

                    <!--BEGIN .search-results -->
                    <ol class="search-results">
                        <li>No results were found.</li>
                        <!--END .search-results -->
                    </ol>

                    <hr class="bottom-margin2">

                    <h4>Testimonials</h4>

                    <!--BEGIN .search-results -->
                    <ol class="search-results">
                        <li>No results were found.</li>
                        <!--END .search-results -->
                    </ol>
                </div><!-- END .page-content-->
            </li><!-- END .col-main -->

            @include ('layouts.front._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection