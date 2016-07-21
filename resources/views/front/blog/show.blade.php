@extends ('layouts.front.master')

@section ('content')
    <div id="page-header"><img src="{{ asset('img/page-header1.jpg') }}" alt=""></div>

    <!-- BEGIN .section -->
    <div class="section">
        <ul class="columns-content page-content clearfix">
            <!-- BEGIN .col-main -->
            <li class="col-main">
                <!-- BEGIN .blog-title-single -->
                <div class="post-40 post type-post status-publish format-standard hentry blog-title-single clearfix">
                    <div class="fl">
                        <h2>{{ $post->title }}
                            <span>Posted {{ format_date_as_string($post->published_at) }} | Tags:
                                @foreach ($post->tags as $key => $tag)
                                    <a href="{{ $tag->front_url }}" rel="tag">{{ $tag->name }}</a>@if ($key < $post->tags()->count() - 1), @endif
                                @endforeach
                            </span>
                        </h2>
                    </div>
                    <div class="comment-count fr">
                        <h3><a href="{{ $tag->front_url }}#comments" title="Comment on {{ $post->title }}">1</a></h3>
                        <div class="comment-point"></div>
                    </div>
                </div><!-- END .blog-title-single -->

                <!-- BEGIN .blog-content -->
                <div class="blog-content clearfix">
                    <div class="block-img1">
                        <a href="{{ $tag->front_url }}" rel="bookmark" title="{{ $post->title }}">
                            <img src="{{ $post->represent_image_path }}" alt="" class="prev-image"></a>
                    </div>

                    {!! $post->content !!}
                </div><!-- END .blog-content -->

                <!-- BEGIN .reply_container -->
                <div class="reply_container">
                    <h3 id="comment-number">1 Comment</h3>

                    <ul class="comment-list">
                        <li class="comment even thread-even depth-1 comment_list" id="li-comment-6">
                            <div id="comment-6" class="comment-wrapper">
                                <div class="author-image">
                                    <img alt="" src="./post3_files/a720ff75e69293ecb47fb6d33647dc88" class="avatar avatar-32 photo" height="32" width="32"> </div>
                                <p class="comment-author">Kate <span>
                                    <a href="http://themes.quitenicestuff.com/organicshopwp/dasellus-ac-nibh-urna-donec-ac-urna-2/#comment-6">
                                August 30, 2012 at 9:08 am					</a></span>
                                </p>
                                <p>Etiam dignissim ullamcorper sem in sagittis. In id massa sed sapien cursus pulvinar. Sed dapibus tempus lectus, et eleifend lectus rhoncus sed. Maecenas consectetur ultricies arcu nec scelerisque. Praesent sed lacus felis</p>
                                <p><span class="reply">
                                    <a class="comment-reply-link" href="http://themes.quitenicestuff.com/organicshopwp/dasellus-ac-nibh-urna-donec-ac-urna-2/?replytocom=6#respond" onclick="return addComment.moveForm(&quot;comment-6&quot;, &quot;6&quot;, &quot;respond&quot;, &quot;40&quot;)">Reply</a>									</span>
                                </p>
                            </div>
                        </li>
                    </ul>

                    <div id="respond">
                        <h3 id="reply-title">Leave a Comment <small><a rel="nofollow" id="cancel-comment-reply-link" href="http://themes.quitenicestuff.com/organicshopwp/dasellus-ac-nibh-urna-donec-ac-urna-2/#respond" style="display:none;">Cancel Reply To Comment</a></small></h3>
                        <form action="http://themes.quitenicestuff.com/organicshopwp/wp-comments-post.php" method="post" id="commentform">
                            <label>Name <span class="required">(required)</span>
                            </label>
                            <input id="author" class="text_input" name="author" type="text" value="" placeholder="Name" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;">
                            <label>Email <span class="required">(required)</span>
                            </label>
                            <input id="email" class="text_input" name="email" type="text" value="" placeholder="Email">
                            <label>Website </label>
                            <input id="url" class="text_input" name="url" type="text" value="" placeholder="Website">
                            <label for="comment">Comment</label>
                            <textarea name="comment" id="comment" class="text_input" tabindex="4" rows="9" cols="60"></textarea>
                            <p class="form-submit">
                                <input name="submit" type="submit" id="submit" value="Submit Comment">
                                <input type="hidden" name="comment_post_ID" value="40" id="comment_post_ID">
                                <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                            </p>
                        </form>
                    </div><!-- #respond -->
                </div><!--END .reply_container -->
            </li>

            @include ('layouts.front._sidebar')
        </ul>
    </div><!-- END .section -->
@endsection