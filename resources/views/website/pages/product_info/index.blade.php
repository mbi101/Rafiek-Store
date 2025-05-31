@extends('website.layouts.app')

@section('title', 'Product Info')

@section('content')
    @include('website.pages.product_info.parts.info')

    @include('website.pages.product_info.parts.description')

    @include('website.pages.product_info.parts.weekly')
@endsection

