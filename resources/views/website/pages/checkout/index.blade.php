@extends('website.layouts.app')

@section('title', 'Checkout')

@section('content')
    <x-website.breadceumb :first_link_url="route('website.home')" first_link_title="Home" active="Checkout"
                          title="Checkout"/>

    @include('website.pages.checkout.parts.checkout')
@endsection

