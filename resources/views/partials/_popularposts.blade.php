<h3>Popular Posts</h3>

                <div class="block-1-2 block-m-full popular__posts">
                    @foreach($popularposts as $popularpost)
<article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="{{ asset('images/thumbs/'.$popularpost->thumbnail) }}" alt="">
                        </a>
                        <h5><a href="{{route('blog.single', $popularpost->slug)}}">{{$popularpost->title}}</a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span> <a href="#0"> BettyKings</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="{{$popularpost->created_at}}">{{date('F j, Y',strtotime($popularpost->created_at))}}</time></span>
                        </section>
                    </article>
                    @endforeach
                    </div> <!-- end popular_posts -->