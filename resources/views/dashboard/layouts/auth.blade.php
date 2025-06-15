<!DOCTYPE html>
<html class="loading" lang="{{ LaravelLocalization::getCurrentLocale() }}" data-textdirection="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="{{ $general_settings->{'site_head_content_' . app()->getLocale()} }}">

    <meta name="keywords" content="{{ $general_settings->site_keywords }}">
    <meta name="author" content="{{ config('app.author_name') }}">
    <title>{{ $general_settings->{'site_name_' . app()->getLocale()} }} | @yield('title', __('dashboard.login'))</title>
    <link rel="apple-touch-icon" href="{{ asset($general_settings->site_favicon) }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset($general_settings->site_favicon) }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @if(app()->getLocale() == 'ar')
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
        <style>
            html, body, h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, button {
                font-family: "Cairo", sans-serif !important;
            }
        </style>
    @else
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <style>
            html, body, h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
                font-family: "Inter", sans-serif !important;
            }
        </style>
    @endif

    @php
        $page_dir = app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
    @endphp
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/'.$page_dir .'/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/vendors/css/forms/icheck/custom.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/'.$page_dir .'/app.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/'.$page_dir .'/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/'.$page_dir .'/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/'.$page_dir .'/pages/login-register.css') }}">
    <!-- END Page Level CSS-->

    @stack('style')
</head>
<body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image menu-expanded blank-page blank-page"
      data-open="click" data-menu="vertical-menu-modern" data-col="1-column">

<!-- ////////////////////////////////////////////////////////////////////////////-->

@yield('content')

<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- BEGIN VENDOR JS-->
<script src="{{ asset('assets/dashboard/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('assets/dashboard/vendors/js/forms/validation/jqBootstrapValidation.js') }}"
        type="text/javascript"></script>
<script src="{{ asset('assets/dashboard/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{ asset('assets/dashboard/js/core/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/dashboard/js/core/app.js') }}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset('assets/dashboard/js/scripts/forms/form-login-register.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
<!-- BEGIN RECAPTCHA JS-->
@if($auth_settings->recaptcha_enable)
    {!! NoCaptcha::renderJs(app()->getLocale()) !!}
@endif
<!-- END RECAPTCHA JS-->

@stack('script')
</body>

</html>
