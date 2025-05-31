@extends('website.layouts.app')

@section('title', 'Terms and Condition')

@section('content')
    <x-website.breadceumb :first_link_url="route('website.home')" first_link_title="Home" active="Terms and Condition"
                          title="Terms and Condition"/>

    @include('website.pages.terms.parts.terms')
@endsection

