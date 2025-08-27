<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
{{-- seo keywords --}}
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="{{ $general_settings->{'site_head_content_' . app()->getLocale()} }}">

<meta name="keywords" content="{{ $general_settings->site_keywords }}">
<meta name="author" content="{{ config('app.author_name') }}">

<!-- icons-->
<link rel="apple-touch-icon" href="{{ asset($general_settings->site_favicon) }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset($general_settings->site_favicon) }}">

<!-- Google fonts-->
@if (app()->getLocale() == 'ar')
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <style>
        html,
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6,
        button,
        li,
        .badge {
            font-family: "Cairo", sans-serif !important;
        }
    </style>
@else
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <style>
        html,
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6,
        button {
            font-family: "Inter", sans-serif !important;
        }
    </style>
@endif

<link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
<!-- BEGIN VENDOR CSS-->

@php
    $page_dir = app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
@endphp
<!-- Start file input -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/' . $page_dir . '/vendors.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/dashboard') }}/vendors/css/weather-icons/climacons.min.css">
<!-- END VENDOR CSS-->

<!-- BEGIN MODERN CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/{{ $page_dir }}/app.css">
@if (app()->getLocale() == 'ar')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/' . $page_dir . '/custom-rtl.css') }}">
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
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/css/plugins/animate/animate.css">
<link rel="stylesheet" href="{{ asset('vendor/flasher/flasher.min.css') }}">
<!-- END Page Level CSS-->



<!-- default icons used in the plugin are from Bootstrap 5.x icon library (which can be enabled by loading CSS below) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
    crossorigin="anonymous">
<!-- the fileinput plugin styling CSS file -->
<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all"
    rel="stylesheet" type="text/css" />

<!-- the select-2 plugin styling CSS file -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

{{-- ___________________________ --}}
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset("assets/dashboard/$page_dir/custom/style.css") }}">
<!-- END Custom CSS -->

{{-- coustom style at the root --}}
<style>
    .file-input .file-preview {
        padding: 10px;
    }

    .file-preview .fileinput-remove {
        top: 4px;
        right: 3px;
    }

    .file-input .file-preview .file-drop-zone {
        min-height: 150px;
    }

    .file-input .file-preview .file-drop-zone-title {
        padding: 55px 10px;
    }
</style>
