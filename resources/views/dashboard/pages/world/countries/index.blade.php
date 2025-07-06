@extends('dashboard.layouts.app')
@section('title', __('dashboard.countries_cities'))
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/vendors/css/forms/toggle/switchery.min.css') }}">
    <style>
        .switchery {
            height: 25px;
            background-color: red;
        }

        .switchery > small {
            height: 25px;
            width: 25px;
        }
    </style>
@endpush
@push('modal')
    <x-dashboard.delete-modal/>
@endpush
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header">
                <x-dashboard.breadceumb
                    :title="__('dashboard.countries_cities')" :first_link_url="route('dashboard.home')" :active="__('dashboard.countries_cities')"
                />
            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h3 class="card-title" id="basic-layout-colored-form-control">{{ __('dashboard.countries') }} </h3>
                        @can('roles.create')
                            <a href="{{ route('dashboard.countries.create') }}" class="btn btn-outline-primary ms-3 round px-2">{{ __('dashboard.create_country') }}</a>
                        @else
                            <a href="javascript:void(0);" class="btn btn-outline-primary ms-3 round px-2" disabled>{{ __('dashboard.create_role') }}</a>
                        @endcan
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered custom-rounded-table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('dashboard.flag') }}</th>
                                        <th scope="col">{{ __('dashboard.name') }}</th>
                                        <th scope="col">{{ __('dashboard.country_code') }} </th>
                                        <th scope="col">{{ __('dashboard.num_of_cities') }} </th>
                                        <th scope="col">{{ __('dashboard.num_of_users') }} </th>
                                        <th scope="col">{{ __('dashboard.status_management') }} </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @forelse ($countries as $country)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if($country->code)
                                                    <i class="flag-icon flag-icon-{{ $country->code }}"></i>
                                                @else
                                                    ----
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard.countries.cities.index' , $country->id) }}">{{ $country->name }}</a>
                                            </td>
                                            <td>{{ $country->code }} </td>
                                            <td> {{ $country->cities_count}} </td>
                                            <td>{{ $country->users_count}}</td>
                                            <td>
                                                <input type="checkbox" id="switchery{{$loop->iteration}}" data-url="{{ route('dashboard.countries.status', $country->id) }}"
                                                       class="switchery change_status" {{ $country->status == 1 ? 'checked' : '' }}/>
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="100%" class="py-1 font-weight-bold">{{ __('dashboard.no_data_found') }}</td>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{ $countries->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/dashboard/vendors/js/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
    <script>
        var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));

        elems.forEach(function (html) {
            new Switchery(html, {color: '#28D094', secondaryColor: '#FF4961'});
        });

        $(function () {
            $(document).on('change', '.change_status', function () {
                let $url = $(this).data('url');
                $.ajax({
                    url: $url,
                    type: 'GET',

                    success: function (response) {
                        if (response.status == 'success') {
                            flasher.success(response.message, "{{ __('dashboard.success') }}");
                        } else {
                            flasher.error(response.message, "{{ __('dashboard.error') }}");
                        }
                    }
                });
            });
        });
    </script>
@endpush
