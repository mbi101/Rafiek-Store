@extends('website.layouts.app')

@section('title', 'Order')

@section('content')
    <x-website.breadceumb :first_link_url="route('website.home')" first_link_title="Home" active="Order"
                          title="Order"/>

    @include('website.pages.order.parts.order')
@endsection

