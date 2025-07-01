<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="{{ $general_settings->{'site_head_content_' . app()->getLocale()} }}">

    <meta name="keywords" content="{{ $general_settings->site_keywords }}">
    <meta name="author" content="{{ config('app.author_name') }}">

    <!-- icons-->
    <link rel="apple-touch-icon" href="{{ asset($general_settings->site_favicon) }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset($general_settings->site_favicon) }}">
    <title>{{ $general_settings->{'site_name_' . app()->getLocale()} ?? '' }} | @yield('title', __('dashboard.dashboard'))</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/dashboard') }}/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/dashboard') }}/images/ico/favicon.ico">
    <!-- Google fonts-->
    @if(app()->getLocale() == 'ar')
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
        <style>
            html, body, h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, button, li, .badge {
                font-family: "Cairo", sans-serif !important;
            }
        </style>
    @else
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <style>
            html, body, h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, button {
                font-family: "Inter", sans-serif !important;
            }
        </style>
    @endif

    @php
        $page_dir = app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
    @endphp
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/{{ $page_dir }}/vendors.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/{{ $page_dir }}/app.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/{{ $page_dir }}/custom-rtl.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/{{ $page_dir }}/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/{{ $page_dir }}/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/{{ $page_dir }}/pages/error.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/css/style{{ $page_dir == 'css-rtl' ? '-rtl' : '' }}.css">
    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu-modern 1-column   menu-expanded blank-page blank-page"
      data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- BEGIN VENDOR JS-->
<script src="{{ asset('assets/dashboard') }}/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('assets/dashboard') }}/vendors/js/forms/validation/jqBootstrapValidation.js"
        type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{ asset('assets/dashboard') }}/js/core/app-menu.js" type="text/javascript"></script>
<script src="{{ asset('assets/dashboard') }}/js/core/app.js" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset('assets/dashboard') }}/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>
</html>
