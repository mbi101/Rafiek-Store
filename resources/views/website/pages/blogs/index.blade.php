@extends('website.layouts.app')

@section('title', 'Caer')

@section('content')
    <x-website.breadceumb :first_link_url="route('website.home')" first_link_title="Home" active="Blogs"
                          title="Our Blogs"/>

    @include('website.pages.blogs.parts.latest_product')
@endsection

