@extends('website.layouts.app')

@section('title', 'FAQ\'s')

@section('content')
    <x-website.breadceumb :first_link_url="route('website.home')" first_link_title="Home" active="Faq"
                          title="FAQ's"/>

    @include('website.pages.faq.parts.faq')
@endsection

