@inject ('_request', 'Illuminate\Http\Request')

{{--<div id="disqus_thread"></div>--}}
{{--<script>--}}
    {{--var disqus_config = function () {--}}
        {{--this.page.url = '{{ $_request->url() }}';  // Replace PAGE_URL with your page's canonical URL variable--}}
        {{--this.page.identifier = '{{ $identifier }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable--}}
    {{--};--}}

    {{--(function() { // DON'T EDIT BELOW THIS LINE--}}
        {{--var d = document, s = d.createElement('script');--}}
        {{--s.src = '//baseskeleton.disqus.com/embed.js';--}}
        {{--s.setAttribute('data-timestamp', +new Date());--}}
        {{--(d.head || d.body).appendChild(s);--}}
    {{--})();--}}
{{--</script>--}}
{{--<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>--}}

<div class="fb-like" data-href="{{ $_request->url() }}" data-layout="standard" data-action="like"
     data-size="small" data-show-faces="true" data-share="true"></div>

<div id="fb-comment-widget" class="fb-comments" data-width="100%" data-numposts="5"></div>
