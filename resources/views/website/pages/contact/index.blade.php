@extends('website.layouts.app')

@section('title', 'Contact')

@section('content')
    <x-website.breadceumb :first_link_url="route('website.home')" first_link_title="Home" active="Contact"
                          title="Contact"/>

    @include('website.pages.contact.parts.contact')
@endsection

