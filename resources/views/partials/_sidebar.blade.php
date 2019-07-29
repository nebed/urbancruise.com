 <div class="sidebar-area">
                    <!-- ***** Single Widget ***** -->
                    <div class="single-widget followers-widget mb-50">
                        <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span class="counter">198</span><span>Fan</span></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span class="counter">220</span><span>Followers</span></a>
                        <a href="#" class="google"><i class="fa fa-google" aria-hidden="true"></i><span class="counter">140</span><span>Subscribe</span></a>
                    </div>
                    <!-- ***** Single Widget ***** -->
                    <div class="single-widget latest-video-widget mb-50">
                        <!-- Section Heading -->
                        <div class="section-heading style-2 mb-30">
                            <h4>Latest Posts</h4>
                            <div class="line"></div>
                        </div>
                        @if(!empty($latestposts[0]))
                        <!-- Single Blog Post -->
                        <div class="single-post-area mb-30">
                            <!-- Post Thumbnail -->
                            <div class="post-thumbnail">
                                <img src="{{ asset('images/thumbs/'.$latestposts[0]->thumbnail) }}" alt="">
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <a href="#" class="post-cata cata-sm cata-success">{{$latestposts[0]->category->name}}</a>
                                <a href="{{route('blog.single',$latestposts[0]->slug)}}" class="post-title">{{$latestposts[0]->title}}</a>
                                <div class="post-meta d-flex">
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> {{$latestposts[0]->comments()->count()}}</a>
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$latestposts[0]->views()->count()}}</a>
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 22</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(!empty($latestposts[1]))
                        <!-- Single Blog Post -->
                        <div class="single-blog-post d-flex">
                            <div class="post-thumbnail">
                                <img src="{{ asset('images/thumbs/'.$latestposts[1]->thumbnail) }}" alt="">
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <a href="#" class="post-cata cata-sm cata-success">{{$latestposts[1]->category->name}}</a>
                                <a href="{{route('blog.single',$latestposts[1]->slug)}}" class="post-title">{{$latestposts[1]->title}}</a>
                                <div class="post-meta d-flex">
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> {{$latestposts[1]->comments()->count()}}</a>
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$latestposts[1]->views()->count()}}</a>
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 22</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(!empty($latestposts[2]))
                        <!-- Single Blog Post -->
                        <div class="single-blog-post d-flex">
                            <div class="post-thumbnail">
                                <img src="{{ asset('images/thumbs/'.$latestposts[2]->thumbnail) }}" alt="">
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <a href="#" class="post-cata cata-sm cata-success">{{$latestposts[2]->category->name}}</a>
                                <a href="{{route('blog.single',$latestposts[2]->slug)}}" class="post-title">{{$latestposts[2]->title}}</a>
                                <div class="post-meta d-flex">
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> {{$latestposts[2]->comments()->count()}}</a>
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$latestposts[2]->views()->count()}}</a>
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 22</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(!empty($latestposts[3]))
                        <!-- Single Blog Post -->
                        <div class="single-blog-post d-flex">
                            <div class="post-thumbnail">
                                <img src="{{ asset('images/thumbs/'.$latestposts[3]->thumbnail) }}" alt="">
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <a href="#" class="post-cata cata-sm cata-success">{{$latestposts[3]->category->name}}</a>
                                <a href="{{route('blog.single',$latestposts[3]->slug)}}" class="post-title">{{$latestposts[3]->title}}</a>
                                <div class="post-meta d-flex">
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> {{$latestposts[3]->comments()->count()}}</a>
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$latestposts[3]->views()->count()}}</a>
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 22</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- ***** Sidebar Widget ***** -->
                    <div class="single-widget youtube-channel-widget mb-50">
                        <!-- Section Heading -->
                        <div class="section-heading style-2 mb-30">
                            <h4>Hot Categories</h4>
                            <div class="line"></div>
                        </div>
                        @foreach($hotcategories as $category)
                        <!-- Single YouTube Channel -->
                        <div class="single-youtube-channel d-flex align-items-center">
                            <div class="youtube-channel-thumbnail">
                                <img src="img/bg-img/25.jpg" alt="">
                            </div>
                            <div class="youtube-channel-content">
                                <a href="/category/{{$category->name}}" class="channel-title">{{$category->name}}</a>
                                <a href="/category/{{$category->name}}" class="btn subscribe-btn"><i class="fa fa-play-circle-o" aria-hidden="true"></i> View</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- ***** Single Widget ***** -->
                    <div class="single-widget newsletter-widget mb-50">
                        <!-- Section Heading -->
                        <div class="section-heading style-2 mb-30">
                            <h4>Newsletter</h4>
                            <div class="line"></div>
                        </div>
                        <p>Subscribe our newsletter gor get notification about new updates, information discount, etc.</p>
                        <!-- Newsletter Form -->
                        <div class="newsletter-form">
                            <form action="#" method="post">
                                <input type="email" name="nl-email" class="form-control mb-15" id="emailnl" placeholder="Enter your email">
                                <button type="submit" class="btn vizew-btn w-100">Subscribe</button>
                            </form>
                        </div>
                    </div>
                    <!-- ***** Single Widget ***** -->
                    <div class="single-widget mb-50">
                        <!-- Section Heading -->
                        <div class="section-heading style-2 mb-30">
                            <h4>Most Viewed</h4>
                            <div class="line"></div>
                        </div>
                        @foreach($mostviewed as $post)
                        <!-- Single Blog Post -->
                        <div class="single-blog-post d-flex">
                            <div class="post-thumbnail">
                                <img src="{{ asset('images/thumbs/'.$post->thumbnail) }}" alt="">
                            </div>
                            <div class="post-content">
                                <a href="{{route('blog.single',$post->slug)}}" class="post-title">{{$post->title}}</a>
                                <div class="post-meta d-flex justify-content-between">
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> {{$post->comments()->count() }}</a>
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$post->views()->count() }}</a>
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>