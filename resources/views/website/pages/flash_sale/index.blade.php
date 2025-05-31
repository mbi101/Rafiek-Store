@extends('website.layouts.app')

@section('title', 'Flash Sale')

@section('content')
    <section class="product product-sidebar flash footer-padding">
        <div class="container">
            <div class="product-sidebar-section">
                <div class="row g-5 justify-content-center">
                    @include('website.pages.flash_sale.parts.sale')
                    @include('website.pages.flash_sale.parts.products')
                </div>
            </div>
        </div>
    </section>
@endsection

