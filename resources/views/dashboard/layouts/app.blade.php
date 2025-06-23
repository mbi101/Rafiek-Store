<!DOCTYPE html>
<html class="loading" lang="{{ LaravelLocalization::getCurrentLocale() }}" data-textdirection="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <title>{{ $general_settings->{'site_name_' . app()->getLocale()} ?? '' }} | @yield('title', __('dashboard.dashboard'))</title>
    @include('dashboard.partials._head')

    @stack('style')
</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">
<!-- fixed-top-->
@include('dashboard.partials._header')
@include('dashboard.partials._sidebar')
<!-- ////////////////////////////////////////////////////////////////////////////-->

@yield('content')

<!-- ////////////////////////////////////////////////////////////////////////////-->
@include('dashboard.partials._footer')
@include('dashboard.partials._scripts')
@stack('script')
</body>
</html>
