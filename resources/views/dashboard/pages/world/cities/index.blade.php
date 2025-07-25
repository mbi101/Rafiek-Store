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
                    :title="__('dashboard.cities')" :first_link_url="route('dashboard.home')" :second_link_url="route('dashboard.countries.index')"
                    :second_link_title="__('dashboard.countries')" :active="__('dashboard.cities')"
                />
            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h3 class="card-title" id="basic-layout-colored-form-control">{{ __('dashboard.cities') }} </h3>
                        <a href="{{ route('dashboard.countries.cities.create', $country->id) }}"
                           class="btn btn-outline-primary ms-3 round px-2">{{ __('dashboard.create_city') }}</a>
                    </div>

                    <x-dashboard.search>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="status" class="font-weight-bold">{{ __('dashboard.status') }}</label>
                                    <select class="custom-select form-control" id="status" name="status">
                                        <option selected="">{{ __('dashboard.select_status') }}</option>
                                        <option value="1" @selected(old('status', request()->status) == 1)>{{ __('dashboard.active') }}</option>
                                        <option value="0" @selected(old('status', request()->status) == 0)>{{ __('dashboard.inactive') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="dateFrom" class="font-weight-bold">{{ __('dashboard.date_from') }}</label>
                                    <input type="date" id="dateFrom" class="form-control"
                                           placeholder="{{ __('dashboard.date_from') }}" name="date_from" value="{{ old('date_from', request()->date_from) }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="dateTo" class="font-weight-bold">{{ __('dashboard.date_to') }}</label>
                                    <input type="date" id="dateTo" class="form-control"
                                           placeholder="{{ __('dashboard.date_to') }}" name="date_to" value="{{ old('date_to', request()->date_to) }}">
                                </div>
                            </div>
                        </div>
                    </x-dashboard.search>

                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table custom-rounded-table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('dashboard.name') }}</th>
                                        <th scope="col">{{ __('dashboard.shipping_price') }} </th>
                                        <th scope="col">{{ __('dashboard.num_of_users') }} </th>
                                        <th scope="col">{{ __('dashboard.status_management') }} </th>
                                        <th scope="col">{{ __('dashboard.operations') }} </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @forelse ($cities as $city)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $city->name }}</td>
                                            <td>{{ $city->shipping}}</td>
                                            <td>{{ $city->users_count}}</td>
                                            <td>
                                                <input type="checkbox" id="switchery{{$loop->iteration}}" data-url="{{ route('dashboard.countries.cities.status', $city->id) }}"
                                                       class="switchery change_status" {{ $city->status == 1 ? 'checked' : '' }}/>
                                            </td>

                                            <td>
                                                <a href="{{ route('dashboard.countries.cities.edit', $city->id) }}"
                                                   class="btn btn-icon btn-success btn-sm d-inline-block"
                                                   data-toggle="tooltip" data-placement="top" title="{{ __('dashboard.edit') }}">
                                                    <i class="la la-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="100%" class="py-1 font-weight-bold">{{ __('dashboard.no_data_found') }}</td>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{ $cities->appends(request()->input())->links() }}
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
