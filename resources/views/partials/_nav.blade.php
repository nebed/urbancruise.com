<header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <a class="logo" href="/">
                        <img src="{{ URL::asset('images/logo.png') }}" alt="Homepage">
                    </a>
                </div> <!-- end header__logo -->

                <ul class="header__social">
                    <li>
                        <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </li>
                </ul> <!-- end header__social -->

                <a class="header__search-trigger" href="#0"></a>

                <div class="header__search">

                    <form role="search" method="get" class="header__search-form" action="#">
                        <label>
                            <span class="hide-content">Search for:</span>
                            <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
                        </label>
                        <input type="submit" class="search-submit" value="Search">
                    </form>
        
                    <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

                </div>  <!-- end header__search -->


                <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

                <nav class="header__nav-wrap">

                    <h2 class="header__nav-heading h6">Site Navigation</h2>

                    <ul class="header__nav">
                        <li class="{{ Request::is('/') ? "current" : "" }}"><a href="/" title="">Home</a></li>
                        <li class="has-children">
                            <a href="#" title="">Categories</a>
                            <ul class="sub-menu">
                                @foreach($categorylist as $categorieslist)
                            <li><a href="{{route('category.index',$categorieslist->name)}}">{{ $categorieslist->name }}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        <li class="{{ Request::is('blog') ? "current" : "" }}">
                            <a href="/blog" title="">Blog</a>
                        </li>
                        <li class="{{ Request::is('about') ? "current" : "" }}"><a href="/about" title="">About</a></li>
                        <li class="{{ Request::is('contact') ? "current" : "" }}"><a  href="/contact" title="">Contact</a></li>
                        @if (Auth::check())
                        <li class="has-children">
                            <a href="#0" title="">Admin {{Auth::user()->name}}</a>
                            <ul class="sub-menu">
                            <li><a href="{{route('posts.index')}}">Posts</a></li>
                            <li><a href="{{route('categories.index')}}">Categories</a></li>
                            <li><a href="{{route('logout')}}">Logout</a></li>
                            </ul>
                        </li>
                        @else
                        <li class="{{ Request::is('auth/login') ? "current" : "" }}">
                        <a href="{{route('login')}}" class="">Login</a>
                        </li>
                        @endif 


                    </ul> <!-- end header__nav -->

                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

                </nav> <!-- end header__nav-wrap -->

            </div> <!-- header-content -->
        </header> <!-- header -->
