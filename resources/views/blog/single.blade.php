@extends('base')

@section('title', $post->title)

@section('content')

    
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Archives</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

        <!-- ##### Pager Area Start ##### -->
    <div class="vizew-pager-area">
        @if(!empty($prev))
        <div class="vizew-pager-prev">
            <p>PREVIOUS ARTICLE</p>

            <!-- Single Feature Post -->
            <div class="single-feature-post video-post bg-img pager-article" style="background-image: url({{ URL::asset('images/'.$prev->featured_image) }});">
                <!-- Post Content -->
                <div class="post-content">
                    <a href="/category/{{$prev->category->name}}" class="post-cata cata-sm cata-success">{{$prev->category->name}}</a>
                    <a href="{{route('blog.single',$prev->slug)}}" class="post-title">{{$prev->title}}</a>
                    <div class="post-meta d-flex">
                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{$prev->comments()->count()}}</a>
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$prev->views()->count()}}</a>
                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 24</a>
                    </div>
                </div>
                <!-- Video Duration 
                <span class="video-duration">11.13</span>-->
            </div>
        </div>
        @endif
        
        @if(!empty($next))
        <div class="vizew-pager-next">
            <p>NEXT ARTICLE</p>

            <!-- Single Feature Post -->
            <div class="single-feature-post video-post bg-img pager-article" style="background-image: url({{ URL::asset('images/'.$next->featured_image) }});">
                <!-- Post Content -->
                <div class="post-content">
                    <a href="/category/{{$next->category->name}}" class="post-cata cata-sm cata-business">{{$next->category->name}}</a>
                    <a href="{{route('blog.single',$next->slug)}}" class="post-title">{{$next->title}}</a>
                    <div class="post-meta d-flex">
                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{$next->comments()->count()}}</a>
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$next->views()->count()}}</a>
                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 25</a>
                    </div>
                </div>
                <!-- Video Duration 
                <span class="video-duration">06.59</span> -->
            </div>
        </div>
        @endif
    </div>
    <!-- ##### Pager Area End ##### -->

        <!-- ##### Post Details Area Start ##### -->
    <section class="post-details-area mb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(!empty($post->featured_image))
                    <div class="post-details-thumb mb-50">
                        <img src="{{ URL::asset('images/'.$post->featured_image) }}" alt="">
                    </div>
                    @endif
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-8 col-xl-7">
                    <div class="post-details-content">
                        <!-- Blog Content -->
                        <div class="blog-content">

                            <!-- Post Content -->
                            <div class="post-content mt-0">
                                <a href="/category/{{$post->category->name}}" class="post-cata cata-sm cata-danger">{{$post->category->name}}</a>
                                <a href="/blog/{{$post->slug}}" class="post-title mb-2">{{$post->title}}</a>

                                <div class="d-flex justify-content-between mb-30">
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-author">By {{$post->user->name}}</a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <a href="#" class="post-date">{{date('F j, Y g:ia',strtotime($post->created_at))}}</a>
                                    </div>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{$post->comments()->count() }}</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>{{$post->views()->count() }}</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 20</a>
                                    </div>
                                </div>
                            </div>

                            {!!$post->body!!}

                            <!-- Post Tags -->
                            <div class="post-tags mt-30">
                                <ul>
                                    @foreach($post->tags as $tag)
                                    <li><a href="#">{{$tag->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Post Author -->
                            <div class="vizew-post-author d-flex align-items-center py-5">
                                <div class="post-author-thumb">
                                    <img src="img/bg-img/30.jpg" alt="">
                                </div>
                                <div class="post-author-desc pl-4">
                                    <a href="#" class="author-name">{{$post->user->name}}</a>
                                    <p>{{$post->user->description}}</p>
                                    <div class="post-author-social-info">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-dribbble"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Related Post Area -->
                            <div class="related-post-area mt-5">
                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>Related Post</h4>
                                    <div class="line"></div>
                                </div>

                                <div class="row">
                                    @foreach($relatedposts as $post)
                                    <!-- Single Blog Post -->
                                    <!-- Single Blog Post -->
                                    <div class="col-12 col-lg-6">
                                        <div class="single-blog-post style-3 d-flex mb-50">
                                            <div class="post-thumbnail">
                                                <img src="{{ asset('images/thumbs/'.$post->thumbnail) }}" alt="">
                                            </div>
                                            <div class="post-content">
                                                <a href="{{route('blog.single',$post->slug)}}" class="post-title">{{$post->title}}</a>
                                                <div class="post-meta d-flex justify-content-between">
                                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> {{$post->comments()->count() }}</a>
                                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$post->views()->count() }}</a>
                                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 17</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Comment Area Start -->
                            <div class="comment_area clearfix mb-50">

                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>Comments</h4>
                                    <div class="line"></div>
                                </div>

                                <ul>
                                    @foreach($post->comments as $comment)
                                    <!-- Single Comment Area -->
                                    <li class="single_comment_area">
                                        <!-- Comment Content -->
                                        <div class="comment-content d-flex">
                                            <!-- Comment Author -->
                                            <div class="comment-author">
                                                <img src="img/bg-img/31.jpg" alt="author">
                                            </div>
                                            <!-- Comment Meta -->
                                            <div class="comment-meta">
                                                <a href="#" class="comment-date">{date('F j, Y g:ia',strtotime(comment->created_at))}}</a>
                                                <h6>{{$comment->name}}</h6>
                                                <p>{{$comment->email}}</p>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="like">like</a>
                                                    <a href="#" class="reply">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Post A Comment Area -->
                            <div class="post-a-comment-area">

                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>Leave a reply</h4>
                                    <div class="line"></div>
                                </div>

                                <!-- Reply Form -->
                                <div class="contact-form-area">
                                    <form action="/comments" method="post">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <input type="text" class="form-control" name="name" placeholder="Your Name*">
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <input type="email" class="form-control" name="email" placeholder="Your Email*">
                                            </div>
                                            <div class="col-12">
                                                <textarea name="message" class="form-control" id="message" placeholder="Message*"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn vizew-btn mt-30" type="submit">Submit Comment</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="sidebar-area">

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget share-post-widget mb-50">
                            <p>Share This Post</p>
                            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                            <a href="#" class="google"><i class="fa fa-google" aria-hidden="true"></i> Google+</a>
                        </div>

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget p-0 author-widget">
                            <div class="p-4">
                                <img class="author-avatar" src="img/bg-img/30.jpg" alt="">
                                <a href="#" class="author-name">{{$post->user->name}}</a>
                                <div class="author-social-info">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                                <p>{{$post->user->description}}</p>
                            </div>

                            <!--<div class="authors--meta-data d-flex">
                                <p>Posted<span class="counter">80</span></p>
                                <p>Comments<span class="counter">230</span></p>
                            </div>-->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->



@endsection
