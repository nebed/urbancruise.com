<header class="header-area">
            <!-- Top Header Area -->
            <div class="top-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6">
                            <!-- Breaking News Widget -->
                            <div class="breaking-news-area d-flex align-items-center">
                                <div class="news-title">
                                    <p>Breaking News:</p>
                                </div>
                                <div id="breakingNewsTicker" class="ticker">
                                    <ul>
                                        @foreach($breakingnews as $news)
                                        <li><a href="{{route('blog.single', $news->slug)}}">{{$news->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="top-meta-data d-flex align-items-center justify-content-end">
                                <!-- Top Social Info -->
                                <div class="top-social-info">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                </div>
                                <!-- Top Search Area -->
                                <div class="top-search-area">
                                    <form action="/" method="post">
                                        <input type="search" name="top-search" id="topSearch" placeholder="Search...">
                                        <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                                <!-- Login -->
                                <a href="login.html" class="login-btn"><i class="fa fa-user" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Navbar Area -->
            <div id="sticker-sticky-wrapper" class="sticky-wrapper" style="height: 90px;"><div class="vizew-main-menu" id="sticker" style="width: 1423px;">
                <div class="classy-nav-container breakpoint-off light left">
                    <div class="container">
                        <!-- Menu -->
                        <nav class="classy-navbar justify-content-between" id="vizewNav">
                            <!-- Nav brand -->
                            <a href="/" class="nav-brand"><img src="{{URL::asset('img/core-img/logo.png')}}" alt=""></a>
                            <!-- Navbar Toggler -->
                            <div class="classy-navbar-toggler">
                                <span class="navbarToggler"><span></span><span></span><span></span></span>
                            </div>
                            <div class="classy-menu">
                                <!-- Close Button -->
                                <div class="classycloseIcon">
                                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                                </div>
                                <!-- Nav Start -->
                                <div class="classynav">
                                    <ul>
                                        <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Home</a></li>
                                        <li class="cn-dropdown-item has-down {{ Request::is('/category') ? "active" : "" }}"><a href="#">Categories</a>
                                        <ul class="dropdown">
                                            @foreach($categories as $category)
                                            <li><a href="{{route('category.index',$category->name)}}">- {{ $category->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    <span class="dd-trigger"></span></li>
                                <li class="{{ Request::is('/contact') ? "active" : "" }}"><a href="/contact">Contact</a></li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div></div>
</header>
