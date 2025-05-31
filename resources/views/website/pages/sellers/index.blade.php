@extends('website.layouts.app')

@section('title', 'Sellers')

@section('content')
    <x-website.breadceumb :first_link_url="route('website.home')" first_link_title="Home" active="Sellers"
                          title="All Seller"/>

    @include('website.pages.sellers.parts.sellers')
@endsection

