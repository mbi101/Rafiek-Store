@extends('website.layouts.app')

@section('title', 'Wishlist')

@section('content')
    <x-website.breadceumb :first_link_url="route('website.home')" first_link_title="Home" active="Wishlist"
                          title="Wishlist"/>

    @include('website.pages.wishlist.parts.wishlist')
@endsection

