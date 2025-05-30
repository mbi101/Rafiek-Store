@extends('website.layouts.app')

@section('title', 'About')

@section('content')
    <x-website.breadceumb :first_link_url="route('website.home')" first_link_title="Home" active="About Us"
                          title="About Us"/>

    @include('website.pages.about.parts.about')

    @include('website.pages.about.parts.about_service')

    @include('website.pages.about.parts.about_promotion')

    @include('website.pages.about.parts.about_feedback')

    @include('website.pages.about.parts.latest_product')
@endsection
