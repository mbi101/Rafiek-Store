@extends('dashboard.layouts.app')

@section('title')
    {{ __('dashboard.user_create') }}
@endsection

@push('style')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/dashboard') }}/vendors/css/tables/datatable/datatables.min.css">
    @if (app()->getLocale() == 'en')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/custom/style.css') }}">
    @else
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css-rtl/custom/style.css') }}">
    @endif

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/vendors/css/forms/toggle/switchery.min.css') }}">
    <style>
        form .form-check-input {
            width: 4em !important;
            height: 25px !important;
            background-color: #d32f2f;
            border-color: #d32f2f;
            margin-left: 0rem !important;
            float: none !important;
        }

        .switchery {
            background-color: #16224a;
            border-color: #16224a;
        }

        .switchery:checked {
            background-color: #009919;
            border-color: #009919
        }

        .form .form-check-input:focus {
            box-shadow: none;
            border-color: transparent !important;
            /* background-image: url('asset("assets/dashboard/images/backgrounds/check-bg.webp")') */
        }

        .switchery>small {
            height: 25px;
            width: 25px;
        }
    </style>
@endpush

@push('modal')
    <x-dashboard.delete-modal />
@endpush

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header">
                <x-dashboard.breadceumb :title="__('dashboard.dashboard')" :first_link_url="route('dashboard.home')" :second_link_title="__('dashboard.users')" :second_link_url="route('dashboard.users.index')"
                    :active="__('dashboard.user_create')" />
            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h3 class="card-title" id="basic-layout-colored-form-control">{{ __('dashboard.user_create') }}
                        </h3>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{ route('dashboard.users.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name"
                                                    class="font-weight-bold">{{ __('dashboard.name') }}</label>
                                                <input type="text" id="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="{{ __('dashboard.name') }}" name="name"
                                                    value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email"
                                                    class="font-weight-bold">{{ __('dashboard.email') }}</label>
                                                <input type="text" id="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="{{ __('dashboard.email') }}" name="email"
                                                    value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone"
                                                    class="font-weight-bold">{{ __('dashboard.phone') }}</label>
                                                <input type="text" id="phone"
                                                    class="form-control @error('phone') is-invalid @enderror"
                                                    placeholder="{{ __('dashboard.phone') }}" name="phone"
                                                    value="{{ old('phone') }}">
                                                @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password"
                                                    class="font-weight-bold">{{ __('dashboard.password') }}</label>
                                                <input type="text" id="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="{{ __('dashboard.password') }}" name="password"
                                                    value="{{ old('password') }}">
                                                @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        {{-- file input for user image --}}
                                        <div class="col-md-12">
                                            <div class="form-group w-75">
                                                <label for="image" class="w-100 font-weight-bold">
                                                    {{ __('dashboard.user_image') }}
                                                </label>
                                                <input type="file" name="image" id="user_image" accept="image.*">
                                                @error('image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- user status --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="switchery"
                                                    class="font-weight-bold">{{ __('dashboard.status_management') }}</label>
                                                <div class="form-check form-switch d-flex justify-content-flex-start px-0 align-items-center gap-1 @if (app()->getLocale() == 'en') flex-row-reverse @endif"
                                                    style="width: fit-content">
                                                    <p class="font-weight-bold">{{ __('dashboard.active') }}</p>
                                                    <p class="mx-1">
                                                        <input class="form-check-input switchery" type="checkbox"
                                                            class="switchery change_status checked" role="switch"
                                                            name="status" id="switchery">
                                                    </p>
                                                    <p class="font-weight-bold">{{ __('dashboard.inactive') }}</p>
                                                </div>

                                                @error('status')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- controls --}}
                                <div class="form-actions right">
                                    <a href="{{ route('dashboard.users.index') }}"
                                        class="btn btn-primary ms-3 round px-2 mr-1">
                                        <i class="la la-undo b-me-1"></i> {{ __('dashboard.back') }}</a>

                                    <button type="submit" class="btn btn-success ms-3 round px-2">
                                        <i class="la la-check-circle b-me-1"></i> {{ __('dashboard.save') }}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $("#user_image").fileinput({
            'showUpload': false,
            'previewFileType': 'any'
        });
    </script>
@endpush
