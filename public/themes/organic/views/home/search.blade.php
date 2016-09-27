<!-- BEGIN .section -->
<div class="section">
    <ul class="columns-content page-content clearfix">

        <!-- BEGIN .col-main -->
        <li class="col-main">
            <h2 class="page-title">@lang ('front.search.title') "{{ $keyword }}"</h2>

            <!-- BEGIN .page-content -->
            <div class="page-content">
                <h4>@lang ('front.common.products')</h4>

                <!--BEGIN .search-results -->
                <ol class="search-results">
                    @forelse ($products as $product)
                        <li><strong><a href="{{ $product->front_url }}" rel="bookmark" title="Moisturisers">{{ $product->title }}</a></strong>
                        <br></li>
                    @empty
                        <p>@lang ('front.search.no_results')</p>
                    @endforelse
                </ol><!--END .search-results -->

                <hr class="bottom-margin2">

                <h4>@lang ('front.common.articles')</h4>

                <!--BEGIN .search-results -->
                <ol class="search-results">
                    @forelse ($articles as $article)
                        <li><strong><a href="{{ $article->front_url }}" rel="bookmark" title="{{ $article->title }}">{{ $article->title }}</a></strong>
                            <br></li>
                    @empty
                        <p>@lang ('front.search.no_results')</p>
                    @endforelse
                </ol><!--END .search-results -->

                {{--<hr class="bottom-margin2">--}}

                {{--<h4>Testimonials</h4>--}}

                {{--<!--BEGIN .search-results -->--}}
                {{--<ol class="search-results">--}}
                    {{--<li>No results were found.</li>--}}
                {{--</ol><!--END .search-results -->--}}
            </div><!-- END .page-content-->
        </li><!-- END .col-main -->

        {!! Theme::partial('sidebar') !!}
    </ul>
</div><!-- END .section -->
