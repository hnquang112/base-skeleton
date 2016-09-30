@extends ('themes.organic.layouts.master')

@section ('content')
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>

    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">

            <!-- BEGIN .col-main -->
            <li class="col-main">
                <h2 class="page-title">
{{--                    All {{ $articleType == 'prod' ? 'products' : 'posts'  }} {{ $taxoType == 'cat' ? 'in' : 'tagged'}} {{ ucfirst($taxo->name) }}--}}
                    @lang ('front.blog.title', [
                    'object' => trans('front.blog.title_object.' . ($articleType == 'prod' ? 'products' : 'articles')),
                    'verb' => trans('front.blog.title_verb.' . ($taxoType == 'cat' ? 'in' : 'tagged'))])
                    {{ ucfirst($taxo->name) }}
                </h2>

                <!--BEGIN .search_results -->
                <ol class="search-results">
                    @foreach ($articles as $article)
                        <li><strong><a href="{{ $article->front_url }}" rel="bookmark" title="{{ $article->title }}">
                                    {{ $article->title }}</a></strong>
                            <br>
                            <p>{{ $article->short_description }}</p>
                        </li>
                    @endforeach
                </ol><!--END .search_results -->
            </li><!-- END .col-main -->

            @include ('themes.organic.layouts._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection