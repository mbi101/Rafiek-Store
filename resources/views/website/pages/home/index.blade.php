@extends('website.layouts.app')

@section('title', 'Home')

@section('content')
    @include('website.pages.home.parts.hero')

    @include('website.pages.home.parts.product')

    @include('website.pages.home.parts.product_category')

    @include('website.pages.home.parts.product_brand')

    @include('website.pages.home.parts.product_arrival')

    @include('website.pages.home.parts.product_flash_sale')

    @include('website.pages.home.parts.product_top_selling')

    @include('website.pages.home.parts.product_best_seller')

    @include('website.pages.home.parts.product_weekly_sale')

    @include('website.pages.home.parts.product_best_product')
@endsection
