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
                    <div class="post-{{ $post->id }} post type-post status-publish format-standard hentry blog-title clearfix
                        category-bath-body-care
                        category-moisturisers
                        tag-skin-care
                        tag-soap">
                        <div class="fl">
                            <h3>
                                <a href="{{ route('blog.show', $post->slug) }}" rel="bookmark" title="{{ $post->title }}">
                                    {{ $post->title }}
                                </a>
                                <span>Posted {{ format_date_as_string($post->published_at) }} | Tags:
                                    <a href="http://themes.quitenicestuff.com/organicshopwp/tag/skin-care/" rel="tag">Skin Care</a>,
                                    <a href="http://themes.quitenicestuff.com/organicshopwp/tag/soap/" rel="tag">Soap</a>
                                </span>
                            </h3>
                        </div>
                        <div class="comment-count fr">
                            <h3><a href="http://themes.quitenicestuff.com/organicshopwp/dasellus-ac-nibh-urna-donec-ac-urna-4/#comments"
                                   title="Comment on Dasellus ac nibh urna donec ac urna">3</a></h3>
                            <div class="comment-point"></div>
                        </div>
                    </div><!-- END .blog-title -->

                    <!-- BEGIN .blog-content -->
                    <div class="blog-content clearfix">
                        <div class="block-img1">
                            <a href="{{ route('blog.show', $post->slug) }}" rel="bookmark" title="{{ $post->title }}">
                                <img src="{{ asset('img/blog-image1.jpg') }}" alt="" class="prev-image"> </a>
                        </div>
                        <p>{{ $post->short_description }}</p>
                        <p><a href="{{ route('blog.show', $post->slug) }}" class="button2">Read More »</a>
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