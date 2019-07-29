@extends('base')

@section('title', 'Home - UrbanCruise Daily')

@section('content')

<section class="hero--area section-padding-80">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-12 col-md-7 col-lg-8">
                <div class="tab-content">
                    @foreach($featuredposts as $key=>$featured)
                        <div class="tab-pane fade {{ $key == 0 ? "show active":"" }}" id="post-{{$key+1}}" role="tabpanel" aria-labelledby="post-{{$key+1}}-tab">
                            <!-- Single Feature Post -->
                            <div class="single-feature-post video-post bg-img" style="background-image: url({{ asset('images/'.$featured->featured_image) }});">
                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="{{route('blog.single',$featured->slug)}}" class="post-cata capitalize">{{$featured->category->name}}</a>
                                    <a href="{{route('blog.single',$featured->slug)}}" class="post-title">{{$featured->title}}</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{$featured->comments_count}}</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>{{$featured->views_count}}</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true" key="{{++$key}}"></i> 25</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-md-5 col-lg-4">
                <ul class="nav vizew-nav-tab" role="tablist">
                    @foreach($featuredposts as $key=>$featured)
                        <li class="nav-item">
                        <a class="nav-link {{ $key == 0 ? "active":"" }}" id="post-{{$key+1}}-tab" data-toggle="pill" href="#post-{{$key+1}}" role="tab" aria-controls="post-{{$key+1}}" aria-selected="true">
                            <!-- Single Blog Post -->
                            <div class="single-blog-post style-2 d-flex align-items-center">
                                <div class="post-thumbnail">
                                    <img src="{{ asset('images/thumbs/'.$featured->thumbnail) }}" alt="">
                                </div>
                                <div class="post-content">
                                    <h6 class="post-title">{{$featured->title}}</h6>
                                    <div class="post-meta d-flex justify-content-between">
                                        <span><i class="fa fa-comments-o" aria-hidden="true"></i>{{$featured->comments_count}}</span>
                                        <span><i class="fa fa-eye" aria-hidden="true"></i>{{$featured->views_count}}</span>
                                        <span><i class="fa fa-thumbs-o-up" key="{{++$key}}" aria-hidden="true"></i> 19</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="trending-posts-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h4>Trending Posts</h4>
                    <div class="line"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($trendingposts as $post)
            <!-- Single Blog Post -->
            <div class="col-12 col-md-4">
                <div class="single-post-area mb-80">
                    <!-- Post Thumbnail -->
                    <div class="post-thumbnail">
                        <img src="{{ asset('images/'.$post->featured_image) }}" alt="{{$post->title}}">
                        <!-- Video Duration -->
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                        <a href="/category/{{$post->category->name}}" class="post-cata cata-sm cata-success">{{$post->category->name}}</a>
                        <a href="{{route('blog.single',$post->slug)}}" class="post-title">{{$post->title}}</a>
                        <div class="post-meta d-flex">
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{$post->comments_count}}</a>
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>{{$post->views_count}}</a>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 15</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="vizew-post-area mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7 col-lg-8">
                <div class="all-posts-area">
                    <!-- Section Heading -->
                    <div class="section-heading style-2">
                        <h4>Featured Posts</h4>
                        <div class="line"></div>
                    </div>
                    <!-- Featured Post Slides -->
                    <div class="featured-post-slides owl-carousel mb-30">
                        @foreach($featuredposts as $post)
                        <!-- Single Feature Post -->
                        <div class="single-feature-post video-post bg-img" style="background-image: url({{ asset('images/'.$post->featured_image) }});">
                            <!-- Post Content -->
                            <div class="post-content">
                                <a href="/category/{{$post->category->name}}" class="post-cata">{{$post->category->name}}</a>
                                <a href="{{route('blog.single',$post->slug)}}" class="post-title">{{$post->title}}</a>
                                <div class="post-meta d-flex">
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{$post->comments_count}}</a>
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>{{$post->views_count}}</a>
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 25</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        @foreach($featuredcategories as $fcategory)
                        <div class="col-12 col-lg-6">
                            <!-- Section Heading -->
                            <div class="section-heading style-2">
                                <h4>{{$fcategory->name}}</h4>
                                <div class="line"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row mb-30">
                        @foreach($featuredcategories as $fcategory)

                            @foreach($fcategory->posts as $post)
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

                        @endforeach
                    </div>
                    <!-- Section Heading -->
                    <div class="section-heading style-2">
                        <h4>Latest News</h4>
                        <div class="line"></div>
                    </div>
                    @foreach($posts as $post)
                    <!-- Single Post Area -->
                    <div class="single-post-area mb-30">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-6">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="{{ asset('images/'.$post->featured_image) }}" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <!-- Post Content -->
                                <div class="post-content mt-0">
                                    <a href="/category/{{$post->category->name}}" class="post-cata cata-sm cata-success">{{$post->category->name}}</a>
                                    <a href="{{route('blog.single',$post->slug)}}" class="post-title mb-2">{{$post->title}}</a>
                                    <div class="post-meta d-flex align-items-center mb-2">
                                        <a href="#" class="post-author">By {{$post->user->name}}</a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <a href="#" class="post-date">{{date('F j, Y g:ia',strtotime($post->created_at))}}</a>
                                    </div>
                                    <p class="mb-2">{!!substr(strip_tags($post->body), 0,35)!!}{{strlen($post->body) >150 ? "..." : ""}}</p>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> {{$post->comments()->count() }}</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$post->views()->count() }}</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 7</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-md-5 col-lg-4">
               @include('partials._sidebar')
            </div>
        </div>
    </div>
</section>

@endsection
