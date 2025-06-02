<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="keywords" content="{{ trans('website.site_head_content') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('./favicon.ico') }}">

    <title>{{ config('app.name') . ' |' }} @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('website/assets/css/swiper10-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/bootstrap-5.3.2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/aos-3.0.0.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/style.css') }}">
    @stack('style')
</head>

<body>
    @include('website.includes.header')

    @yield('content')

    @include('website.includes.footer')

    <script src="{{ asset('website/assets/js/jquery_3.7.1.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/bootstrap_5.3.2.bundle.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/aos-3.0.0.js') }}"></script>
    <script src="{{ asset('website/assets/js/swiper10-bundle.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/shopus.js') }}"></script>
    @stack('script')
</body>

</html>
