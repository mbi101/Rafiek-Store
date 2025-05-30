@extends('website.layouts.app')

@section('title', 'Become Vendor')

@section('content')
    <x-website.breadceumb :first_link_url="route('website.home')" first_link_title="Home" active="Seller Application"
                          title="Become A Seller!"/>

    @include('website.pages.become_vendor.parts.seller_application')
@endsection




