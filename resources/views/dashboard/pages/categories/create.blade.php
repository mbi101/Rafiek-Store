@extends('dashboard.layouts.app')

@section('title')
    {{ __('dashboard.category_create') }}
@endsection

@push('style')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/dashboard') }}/vendors/css/tables/datatable/datatables.min.css">

    @if (app()->getLocale() == 'en')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/custom/style.css') }}">
    @else
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css-rtl/custom/style.css') }}">
    @endif
@endpush

@push('modal')
    <x-dashboard.delete-modal />
@endpush


@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header">
                <x-dashboard.breadceumb :title="__('dashboard.dashboard')" :first_link_url="route('dashboard.home')" :second_link_title="__('dashboard.categories')" :second_link_url="route('dashboard.categories.index')"
                    :active="__('dashboard.category_create')" />
            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('dashboard.categories.store') }}" method="post">
                                @csrf
                                <label for="name">
                                    <input type="text" class="form-control" name="name" id="name">
                                </label>
                                <label for="name_en">
                                    <input type="text" class="form-control" name="name" id="name">
                                </label>
                                <label for="name">
                                    <input type="text" class="form-control" name="name" id="name">
                                </label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
