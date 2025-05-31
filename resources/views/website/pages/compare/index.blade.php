@extends('website.layouts.app')

@section('title', 'Compare')

@section('content')
    <x-website.breadceumb :first_link_url="route('website.home')" first_link_title="Home" active="Compare"
                          title="Product Comparison"/>

    @include('website.pages.compare.parts.compare')
@endsection

