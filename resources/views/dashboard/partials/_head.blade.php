<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
{{-- seo keywords --}}
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description"
      content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">

<meta name="keywords"
      content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
<meta name="author" content="PIXINVENT">

<!-- icons-->
<link rel="apple-touch-icon" href="{{ asset('./favicon.ico') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('./favicon.ico') }}">

<!-- Google fonts-->
<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
    rel="stylesheet">
<link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
<!-- BEGIN VENDOR CSS-->

@php
    $page_dir = app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
@endphp

<link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/' . $page_dir . '/vendors.css') }}">
<link rel="stylesheet" type="text/css"
      href="{{ asset('assets/dashboard') }}/vendors/css/weather-icons/climacons.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/fonts/meteocons/style.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/vendors/css/charts/morris.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/vendors/css/charts/chartist.css">
<link rel="stylesheet" type="text/css"
      href="{{ asset('assets/dashboard') }}/vendors/css/charts/chartist-plugin-tooltip.css">
<!-- END VENDOR CSS-->
<!-- BEGIN MODERN CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/{{ $page_dir }}/app.css">
@if(app()->getLocale() == 'ar')

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/' . $page_dir . '/custom-rtl.css' ) }}">
@endif
<!-- END MODERN CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css"
      href="{{ asset('assets/dashboard') }}/{{ $page_dir }}/core/menu/menu-types/vertical-menu-modern.css">
<link rel="stylesheet" type="text/css"
      href="{{ asset('assets/dashboard') }}/{{ $page_dir }}/core/colors/palette-gradient.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/fonts/simple-line-icons/style.css">
<link rel="stylesheet" type="text/css"
      href="{{ asset('assets/dashboard') }}/{{ $page_dir }}/core/colors/palette-gradient.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/{{ $page_dir }}/pages/timeline.css">
<link rel="stylesheet" type="text/css"
      href="{{ asset('assets/dashboard') }}/{{ $page_dir }}/pages/dashboard-ecommerce.css">
<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/{{ $page_dir }}/custom/style.css">
<!-- END Custom CSS -->
