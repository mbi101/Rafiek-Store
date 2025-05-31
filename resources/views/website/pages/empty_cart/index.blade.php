@extends('website.layouts.app')

@section('title', 'Empty Cart')

@section('content')
    <section class="blog about-blog footer-padding">
        <div class="container">
            <x-website.breadceumb :first_link_url="route('website.home')" first_link_title="Home" active="404 Not Found"/>
            <div class="blog-item" data-aos="fade-up">
                <div class="cart-img">
                    <img src="{{ asset('website/assets/images/homepage-one/empty-cart.webp') }}" alt="Empty Cart Image">
                </div>
                <div class="cart-content">
                    <p class="content-title">Empty! You don’t Cart any Products </p>
                    <a href="{{ route('website.product_sidebar') }}" class="shop-btn">Back to Shop</a>
                </div>
            </div>
        </div>
    </section>
@endsection

