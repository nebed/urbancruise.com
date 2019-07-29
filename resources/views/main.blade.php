<!DOCTYPE html>
<html class="no-js" lang="en">

    @include('partials._head')

        @yield('content')


    <!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row top">

            <div class="col-eight md-six tab-full popular">
                
                @include('partials._popularposts')
                
            </div> <!-- end popular -->
            
            <div class="col-four md-six tab-full about">

                @include('partials._about')

            </div> <!-- end about -->

        </div> <!-- end row -->

        <div class="row bottom tags-wrap">
            <div class="col-full tags">
               @include('partials._tags')
                </div> <!-- end tagcloud -->
            </div> <!-- end tags -->
        </div> <!-- end tags-wrap -->

    </section> <!-- end s-extra -->


    <!-- s-footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">
            @include('partials._mainfooter')
        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            @include('partials._bottomfooter')
        </div> <!-- end s-footer__bottom -->

    </footer> <!-- end s-footer -->


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        @include('partials._loader')
    </div>


    <!-- Java Script
    ================================================== -->
    @include('partials._javascript')

</body>

</html>