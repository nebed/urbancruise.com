<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials._headincludes')
</head>

<body>
    @include('partials._preloader')
    @include('partials._header')

    @yield('content')

	@include('partials._footer')
    @include('partials._jsincludes')
</body>

</html>