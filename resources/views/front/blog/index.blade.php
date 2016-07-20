@extends ('layouts.front.master')

@section ('content')
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>

    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">
            <!-- BEGIN .col-main -->
            <li class="col-main">
                <h2 class="page-title">Blog</h2>

                @forelse ($posts as $post)
                    <!-- BEGIN .blog-title -->
                    <div class="post-{{ $post->id }} post type-post status-publish format-standard hentry blog-title clearfix">
                        <div class="fl">
                            <h3>
                                <a href="{{ $post->front_url }}" rel="bookmark" title="{{ $post->title }}">
                                    {{ $post->title }}
                                </a>
                                <span>Posted {{ format_date_as_string($post->published_at) }} | Tags:
                                    @foreach ($post->tags as $key => $tag)
                                        <a href="{{ $tag->front_url }}" rel="tag">{{ $tag->name }}</a>@if ($key < $post->tags()->count() - 1), @endif
                                    @endforeach
                                </span>
                            </h3>
                        </div>
                        <div class="comment-count fr">
                            <h3><a href="{{ $post->front_url }}#comments"
                                   title="Comment on {{ $post->title }}">3</a></h3>
                            <div class="comment-point"></div>
                        </div>
                    </div><!-- END .blog-title -->

                    <!-- BEGIN .blog-content -->
                    <div class="blog-content clearfix">
                        <div class="block-img1">
                            <a href="{{ $post->front_url }}" rel="bookmark" title="{{ $post->title }}">
                                <img src="{{ $post->represent_image }}" alt="" class="prev-image"> </a>
                        </div>
                        <p>{{ $post->short_description }}</p>
                        <p><a href="{{ $post->front_url }}" class="button2">Read More »</a>
                        </p>
                    </div><!-- END .blog-content -->
                @empty
                    <p>No posts</p>
                @endforelse

                @include ('layouts.front._pagination', ['paginator' => $posts])
            </li><!-- END .col-main -->

            @include ('layouts.front._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection