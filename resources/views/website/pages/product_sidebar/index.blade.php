@extends('website.layouts.app')

@section('title', 'Product Sidebar')

@section('content')
    <section class="product product-sidebar footer-padding">
        <div class="container">
            <div class="row g-5">
                @include('website.pages.product_sidebar.parts.sidebar')

                @include('website.pages.product_sidebar.parts.products')
            </div>
        </div>
    </section>
@endsection

