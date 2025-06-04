<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="{{ __('website.site_head_content') }}">

    <meta name="keywords"
          content="Rafiek, Rafiek Group, رفيق, رفيق جروب, mattresses, Medical mattresses, Rolling Mattresses, Connected spring mattresses, Separate spring mattresses, مراتب, مراتب طبية, مراتب رولينج, مراتب سوست متصلة, مراتب سوست منفصلة">
    <meta name="author" content="Pharao101">
    <title>{{ config('app.name') }} | @yield('title', __('dashboard.login'))</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/dashboard/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/dashboard/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/vendors/css/forms/icheck/custom.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/app.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/pages/login-register.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/custom/style.css') }}">
    <!-- END Custom CSS-->
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
@stack('js')
</body>

</html>
