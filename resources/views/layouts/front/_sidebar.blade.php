<!-- BEGIN .col-sidebar -->
<li class="col-sidebar">
    <div class="widget">
        <div class="widget-title clearfix">
            <h4 class="tag-title">Categories</h4>
        </div>
        <ul>
            @foreach ($_allCategories as $_cat)
                <li class="cat-item cat-item-{{ $_cat->id }}">
                    <a href="{{ $_cat->front_url }}" title="View all posts filed under {{ ucfirst($_cat->name) }}">
                        {{ ucfirst($_cat->name) }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="widget">
        <div class="widget-title clearfix">
            <h4 class="tag-title">Tags</h4>
        </div>
        <ul class="wp-tag-cloud">
            @foreach ($_allTags as $_tag)
                <li><a href="{{ $_tag->front_url }}" class="tag-link-{{ $_tag->id }}" title="1 topic" style="font-size: 14px;">
                        {{ ucfirst($_tag->name) }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="widget">
        <div class="widget-title clearfix">
            <h4 class="tag-title">Recent Posts</h4>
        </div>
        <ul class="latest-posts-list clearfix">
            @foreach ($_recentPosts as $_post)
                <li class="clearfix">
                    <div class="lpl-img">
                        <a href="{{ $_post->front_url }}" rel="bookmark">
                            <img width="66" height="66" src="{{ $_post->represent_image_path }}" alt="{{ $_post->title }}">
                        </a>
                    </div>
                    <div class="lpl-content">
                        <h6><a href="{{ $_post->front_url }}" rel="bookmark">{{ $_post->title }}</a>
                            <span> Posted {{ format_date_as_string($_post->published_at) }}
                                By {{ $_post->author->display_name }}</span></h6>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</li>