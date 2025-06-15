<!doctype html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" data-textdirection="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="{{ $general_settings->{'site_name_' . app()->getLocale()} }}">
    <meta name="keywords" content="{{ $general_settings->site_keywords }}">
    <meta name="author" content="{{ config('app.author_name') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset($general_settings->site_favicon) }}">

    <title>{{ $general_settings->{'site_name_' . app()->getLocale()} . ' |' }} @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/website/css/swiper10-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/bootstrap-5.3.2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/aos-3.0.0.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}">
    @stack('style')
</head>

<body>
@include('website.includes.header')

@yield('content')

@include('website.includes.footer')

<script src="{{ asset('assets/website/js/jquery_3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/website/js/bootstrap_5.3.2.bundle.min.js') }}"></script>
<script src="{{ asset('assets/website/js/nouislider.min.js') }}"></script>
<script src="{{ asset('assets/website/js/aos-3.0.0.js') }}"></script>
<script src="{{ asset('assets/website/js/swiper10-bundle.min.js') }}"></script>
<script src="{{ asset('assets/website/js/shopus.js') }}"></script>
@stack('script')
</body>

</html>
