@extends ('layouts.front.master')

@section ('content')
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>

    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">

            <!-- BEGIN .col-main -->
            <li class="col-main">
                <h2 class="page-title">
{{--                    All {{ $postType == 'prod' ? 'products' : 'posts'  }} {{ $taxoType == 'cat' ? 'in' : 'tagged'}} {{ ucfirst($taxo->name) }}--}}
                    @lang ('front.blog.title', [
                    'object' => trans_choice('front.common.' . ($postType == 'prod' ? 'products' : 'posts'), 2),
                    'verb' => trans('front.blog.title_verb.' . ($taxoType == 'cat' ? 'in' : 'tagged'))])
                    {{ ucfirst($taxo->name) }}
                </h2>

                <!--BEGIN .search_results -->
                <ol class="search-results">
                    @foreach ($posts as $post)
                        <li><strong><a href="{{ $post->front_url }}" rel="bookmark" title="{{ $post->title }}">
                                    {{ $post->title }}</a></strong>
                            <br>
                            <p>{{ $post->short_description }}</p>
                        </li>
                    @endforeach
                </ol><!--END .search_results -->
            </li><!-- END .col-main -->

            @include ('layouts.front._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection