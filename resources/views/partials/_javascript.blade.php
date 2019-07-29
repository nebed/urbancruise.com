<script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>
    @yield('select_include')
    <script type="text/javascript"> 
    	@yield('select_js')
    	@yield('deletecomment')
    </script>