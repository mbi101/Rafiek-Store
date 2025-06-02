<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<head>
    <title>{{ config('app.name') }} | @yield('title', __('dashboard.dashboard'))</title>
    @include('dashboard.partials._head')

    @stack('css')
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
    @stack('js')
</body>

</html>
