@extends('base')

@section('title', 'All Posts - Archive')

@section('content')


        <!-- ##### Breadcrumb Area Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="/blog">Archive</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Archive by Category {{$name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

        <!-- ##### Archive Grid Posts Area Start ##### -->
    <div class="vizew-grid-posts-area mb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <!-- Archive Catagory & View Options -->
                    <div class="archive-catagory-view mb-50 d-flex align-items-center justify-content-between">
                        <!-- Catagory -->
                        <div class="archive-catagory">
                            <h4><i class="fa fa-trophy" aria-hidden="true"></i> {{$name}}</h4>
                        </div>
                        <!-- View Options -->
                        <div class="view-options">
                            <a href="#" class="active"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <div class="row">
                        @foreach($posts as $post)
                        <!-- Single Blog Post -->
                        <div class="col-12 col-md-6">
                            <div class="single-post-area mb-50">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="{{URL::asset('images/'.$post->featured_image) }}" alt="">

                                    <!-- Video Duration 
                                    <span class="video-duration">05.03</span>-->
                                </div>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="/category/{{$post->category->name}}" class="post-cata cata-sm cata-success">{{$post->category->name}}</a>
                                    <a href="/blog/{{$post->slug}}" class="post-title">{{$post->title}}</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{$post->comments()->count()}}</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>{{$post->views()->count()}}</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 15</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach()
                    </div>

                    <!-- Pagination -->
                    <nav class="mt-50">
                        <ul class="pagination justify-content-center">
                            {!!$posts->links()!!}
                        </ul>
                    </nav>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    @include('partials._sidebar')
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Archive Grid Posts Area End ##### -->

@endsection