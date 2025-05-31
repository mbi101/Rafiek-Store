@extends('website.layouts.app')

@section('title', 'Privacy Policy')

@section('content')
    <x-website.breadceumb :first_link_url="route('website.home')" first_link_title="Home" active="Privacy Policy"
                          title="Privacy Policy"/>

    @include('website.pages.privacy.parts.privacy')
@endsection

