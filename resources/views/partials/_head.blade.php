<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ URL::asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
    {!! Html::style('css/select2.min.css') !!}

    <!-- script
    ================================================== -->
    <script src="{{ URL::asset('js/modernizr.js') }}"></script>
    <script src="{{ URL::asset('js/pace.min.js') }}"></script>
    @yield('tinymce')

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon">

</head>