@extends('website.layouts.app')

@section('title', 'Blogs Details')

@section('content')
    <x-website.breadceumb :first_link_url="route('website.home')" first_link_title="Home" active="Blog Details"
                          title="Blog Details"/>

    @include('website.pages.blogs_details.parts.details')
@endsection

