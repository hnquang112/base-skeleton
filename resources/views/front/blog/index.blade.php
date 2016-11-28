@extends ('layouts.front.master')

@section ('content')
    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">
            <!-- BEGIN .col-main -->
            <li class="col-main">
                <h2 class="page-title">{{ trans_choice('front.common.articles', 2) }}</h2>

                @forelse ($articles as $article)
                    <!-- BEGIN .blog-title -->
                    <div class="post-{{ $article->id }} post type-post status-publish format-standard hentry blog-title clearfix">
                        <div class="fl">
                            <h3>
                                <a href="{{ $article->front_url }}" rel="bookmark" title="{{ $article->title }}">
                                    {{ $article->title }}
                                </a>
                                <span>@lang ('front.blog.body.posted') {{ format_date_as_string($article->published_at) }} |
                                    {{ trans_choice('front.common.tags', $article->tags()->count()) }}:
                                    @foreach ($article->tags as $key => $tag)
                                        <a href="{{ $tag->front_url }}" rel="tag">{{ $tag->name }}</a>@if ($key < $article->tags()->count() - 1), @endif
                                    @endforeach
                                </span>
                            </h3>
                        </div>
                        <div class="comment-count fr">
                            <h3><a title="@lang ('blog.body.comment_on') {{ $article->title }}" href="{{ $article->front_url }}#fb-comment-widget">
                                    <span class="fb-comments-count"></span></a></h3>
                            <div class="comment-point"></div>
                        </div>
                    </div><!-- END .blog-title -->

                    <!-- BEGIN .blog-content -->
                    <div class="blog-content clearfix">
                        <div class="block-img1">
                            <a href="{{ $article->front_url }}" rel="bookmark" title="{{ $article->title }}">
                                <img src="{{ get_image_path($article->represent_image) }}" alt="" class="prev-image"> </a>
                        </div>
                        <p>{{ $article->short_description }}</p>
                        <p><a href="{{ $article->front_url }}" class="button2">@lang ('front.blog.body.read_more') »</a>
                        </p>
                    </div><!-- END .blog-content -->
                @empty
                    <p>No posts</p>
                @endforelse

                @include ('layouts.front._pagination', ['paginator' => $articles])
            </li><!-- END .col-main -->

            @include ('layouts.front._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection