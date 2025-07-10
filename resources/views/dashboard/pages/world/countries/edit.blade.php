@extends('dashboard.layouts.app')
@section('title', __('dashboard.countries_cities'))
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header">
                <x-dashboard.breadceumb
                    :title="__('dashboard.countries_cities')" :first_link_url="route('dashboard.home')"
                    :second_link_url="route('dashboard.countries.index')" :second_link_title="__('dashboard.countries_cities')" :active="__('dashboard.edit_country')"
                />
            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h3 class="card-title" id="basic-layout-colored-form-control">{{ __('dashboard.edit_country') }} </h3>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{ route('dashboard.countries.update', $country->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nameAr" class="font-weight-bold">{{ __('dashboard.name_ar') }}</label>
                                                <input type="text" id="nameAr" class="form-control @error('name.ar') is-invalid @enderror"
                                                       placeholder="{{ __('dashboard.name_ar') }}" name="name[ar]"
                                                       value="{{ old('name.ar', $country->getTranslation('name', 'ar')) }}">

                                                @error('name.ar')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nameEn" class="font-weight-bold">{{ __('dashboard.name_en') }}</label>
                                                <input type="text" id="nameEn" class="form-control @error('name.en') is-invalid @enderror"
                                                       placeholder="{{ __('dashboard.name_en') }}" name="name[en]"
                                                       value="{{ old('name.en', $country->getTranslation('name', 'en')) }}">
                                                @error('name.en')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="countryCode" class="font-weight-bold">{{ __('dashboard.country_code') }}</label>
                                                <input type="text" id="countryCode" class="form-control @error('code') is-invalid @enderror"
                                                       placeholder="{{ __('dashboard.country_code') }}" name="code" value="{{ old('code', $country->code) }}">
                                                @error('code')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-actions right">
                                    <a href="{{ route('dashboard.countries.index') }}" class="btn btn-primary ms-3 round px-2 mr-1">
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
        $(function () {
            $('#checkAll').on('change', function () {
                $('.item-checkbox').prop('checked', this.checked).prop('disabled', false);
                if (!this.checked) {
                    $('.sub-main-item-checkbox').prop('disabled', true);
                }

            });
            $('.main-item-checkbox').on('change', function () {
                $(this).closest('tr').find('.sub-main-item-checkbox').prop('checked', this.checked).prop('disabled', !this.checked);
            });
        })
    </script>
@endpush
