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
                                <span>Posted August 30, 2012 | Tags:
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
                        <p>{{ str_limit($post->content, 100) }}</p>
                        <p><a href="{{ route('blog.show', $post->slug) }}" class="button2">Read More »</a>
                        </p>
                    </div><!-- END .blog-content -->
                @empty
                    <p>No posts</p>
                @endforelse

                <div class="clearboth"></div>

                <!--BEGIN .page-pagination -->
                <div class="page-pagination page-pagination-full">
                    <p class="clearfix">
                        <span class="fl"><a href="http://themes.quitenicestuff.com/organicshopwp/blog/page/2/">← Older posts</a></span>
                        <span class="fr"><a href="http://themes.quitenicestuff.com/organicshopwp/blog/">Newer posts →</a></span>
                    </p>
                </div><!--END .page-pagination -->
            </li><!-- END .col-main -->

            <!-- BEGIN .col-sidebar -->
            <li class="col-sidebar">
                <div class="widget">
                    <div class="widget-title clearfix">
                        <h4 class="tag-title">Categories</h4>
                    </div>
                    <ul>
                        <li class="cat-item cat-item-16"><a href="http://themes.quitenicestuff.com/organicshopwp/category/bath-body-care/" title="View all posts filed under Bath &amp; Body Care">Bath &amp; Body Care</a>
                        </li>
                        <li class="cat-item cat-item-17"><a href="http://themes.quitenicestuff.com/organicshopwp/category/fragrance/" title="View all posts filed under Fragrance">Fragrance</a>
                        </li>
                        <li class="cat-item cat-item-22"><a href="http://themes.quitenicestuff.com/organicshopwp/category/hair/" title="View all posts filed under Hair">Hair</a>
                        </li>
                        <li class="cat-item cat-item-21"><a href="http://themes.quitenicestuff.com/organicshopwp/category/make-up/" title="View all posts filed under Make-Up">Make-Up</a>
                        </li>
                        <li class="cat-item cat-item-23"><a href="http://themes.quitenicestuff.com/organicshopwp/category/moisturisers/" title="View all posts filed under Moisturisers">Moisturisers</a>
                        </li>
                        <li class="cat-item cat-item-15"><a href="http://themes.quitenicestuff.com/organicshopwp/category/skin-care/" title="View all posts filed under Skin Care">Skin Care</a>
                        </li>
                    </ul>
                </div>
                <div class="widget">
                    <div class="widget-title clearfix">
                        <h4 class="tag-title">Tags</h4>
                    </div>
                    <ul class="wp-tag-cloud">
                        <li><a href="http://themes.quitenicestuff.com/organicshopwp/tag/beauty/" class="tag-link-25" title="1 topic" style="font-size: 14px;">Beauty</a>
                        </li>
                        <li><a href="http://themes.quitenicestuff.com/organicshopwp/tag/health/" class="tag-link-24" title="1 topic" style="font-size: 14px;">Health</a>
                        </li>
                        <li><a href="http://themes.quitenicestuff.com/organicshopwp/tag/organic/" class="tag-link-18" title="1 topic" style="font-size: 14px;">Organic</a>
                        </li>
                        <li><a href="http://themes.quitenicestuff.com/organicshopwp/tag/seaweed/" class="tag-link-20" title="1 topic" style="font-size: 14px;">Seaweed</a>
                        </li>
                        <li><a href="http://themes.quitenicestuff.com/organicshopwp/tag/skin-care/" class="tag-link-15" title="1 topic" style="font-size: 14px;">Skin Care</a>
                        </li>
                        <li><a href="http://themes.quitenicestuff.com/organicshopwp/tag/soap/" class="tag-link-26" title="1 topic" style="font-size: 14px;">Soap</a>
                        </li>
                        <li><a href="http://themes.quitenicestuff.com/organicshopwp/tag/spa/" class="tag-link-19" title="1 topic" style="font-size: 14px;">Spa</a>
                        </li>
                    </ul>
                </div>
                <div class="widget">
                    <div class="widget-title clearfix">
                        <h4 class="tag-title">Recent Posts</h4>
                    </div>
                    <ul class="latest-posts-list clearfix">
                        <li class="clearfix">
                            <div class="lpl-img">
                                <a href="http://themes.quitenicestuff.com/organicshopwp/?p=49" rel="bookmark">
                                    <img width="66" height="66" src="{{ asset('img/blog-thumb1.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="lpl-content">
                                <h6><a href="http://themes.quitenicestuff.com/organicshopwp/?p=49" rel="bookmark">Dasellus ac nibh urna donec 
                                            ac urna</a> <span> Posted Aug 30, 2012 By admin</span></h6>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="lpl-img">
                                <a href="http://themes.quitenicestuff.com/organicshopwp/?p=44" rel="bookmark">
                                    <img width="66" height="66" src="{{ asset('img/blog-thumb2.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="lpl-content">
                                <h6><a href="http://themes.quitenicestuff.com/organicshopwp/?p=44" rel="bookmark">Dasellus ac nibh urna donec 
                                            ac urna</a> <span> Posted Aug 30, 2012 By admin</span></h6>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="lpl-img">
                                <a href="http://themes.quitenicestuff.com/organicshopwp/?p=40" rel="bookmark">
                                    <img width="66" height="66" src="{{ asset('img/blog-thumb3.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="lpl-content">
                                <h6><a href="http://themes.quitenicestuff.com/organicshopwp/?p=40" rel="bookmark">Dasellus ac nibh urna donec 
                                            ac urna</a> <span> Posted Aug 30, 2012 By admin</span></h6>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div><!-- END .section -->
@endsection