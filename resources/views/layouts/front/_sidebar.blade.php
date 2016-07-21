<!-- BEGIN .col-sidebar -->
<li class="col-sidebar">
    <div class="widget">
        <div class="widget-title clearfix">
            <h4 class="tag-title">Categories</h4>
        </div>
        <ul>
            @foreach (App\Category::all() as $cat)
                <li class="cat-item cat-item-{{ $cat->id }}">
                    <a href="{{ $cat->front_url }}" title="View all posts filed under {{ ucfirst($cat->name) }}">
                        {{ ucfirst($cat->name) }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="widget">
        <div class="widget-title clearfix">
            <h4 class="tag-title">Tags</h4>
        </div>
        <ul class="wp-tag-cloud">
            @foreach (App\Tag::all() as $tag)
                <li><a href="{{ $tag->front_url }}" class="tag-link-{{ $tag->id }}" title="1 topic" style="font-size: 14px;">
                        {{ ucfirst($tag->name) }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="widget">
        <div class="widget-title clearfix">
            <h4 class="tag-title">Recent Posts</h4>
        </div>
        <ul class="latest-posts-list clearfix">
            @foreach (App\Post::with('author')->published()->orderByDesc('published_at')->take(3) as $post)
                <li class="clearfix">
                    <div class="lpl-img">
                        <a href="{{ $post->front_url }}" rel="bookmark">
                            <img width="66" height="66" src="{{ $post->represent_image_path }}" alt="{{ $post->title }}">
                        </a>
                    </div>
                    <div class="lpl-content">
                        <h6><a href="{{ $post->front_url }}" rel="bookmark">{{ $post->title }}</a>
                            <span> Posted {{ format_date_as_string($post->published_at) }}
                                By {{ $post->author->display_name }}</span></h6>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</li>