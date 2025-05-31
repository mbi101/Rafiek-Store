@extends('website.layouts.app')

@section('title', 'User Dashboard')

@section('content')
    <x-website.breadceumb :first_link_url="route('website.home')" first_link_title="Home" active="Dashboard"
                          title="User Dashboard"/>

    @include('website.pages.profile.parts.profile')
@endsection

