@extends('website.layouts.app')

@section('title', 'Cart')

@section('content')
    <x-website.breadceumb :first_link_url="route('website.home')" first_link_title="Home" active="Cart"
                          title="Cart"/>

    @include('website.pages.cart.parts.cart')
@endsection

