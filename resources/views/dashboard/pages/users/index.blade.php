@extends('dashboard.layouts.app')

@section('title')
    {{ __('dashboard.users') }}
@endsection

@push('style')

    @if (app()->getLocale())
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/custom/style.css') }}">
    @else
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css-rtl/custom/style.css') }}">
    @endif
    {{-- custom styles --}}
    <style>
        form {
            width: 100%;
        }

        input.select2-search__field {
            display: none;
        }

        span.select2.select2-container {
            width: 10vw !important;
        }

        .users_table .userImage {
            width: 115px;
            height: 115px;
            border-radius: 50%;
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
                <x-dashboard.breadceumb :title="__('dashboard.dashboard')" :first_link_url="route('dashboard.home')" :active="__('dashboard.users')" />
            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h3 class="card-title" id="basic-layout-colored-form-control">{{ __('dashboard.users') }}
                        </h3>
                        @can('users.create')
                            <a href="{{ route('dashboard.users.create') }}"
                                class="btn btn-outline-primary ms-3 round px-2">{{ __('dashboard.user_create') }}</a>
                        @else
                            <a href="javascript:void(0);" class="btn btn-outline-primary ms-3 round px-2"
                                disabled>{{ __('dashboard.user_create') }}</a>
                        @endcan
                    </div>

                    {{-- filters --}}
                    <div class="card-header d-flex align-items-center justify-content-between py-0">
                        <form
                            class="form-contorl d-flex align-items-center justify-content-start flex-wrap-reverse gap-1 gap-2-sm py-0"
                            action="{{ route('dashboard.users.index') }}">
                            @csrf
                            <blockquote class="form-group mb-0 col-2-md col-4-sm">
                                <select class="form-control text-center basic-single-select" name="sort_by" id="sort_by">
                                    <option value="" selected disabled>{{ __('dashboard.sort_by') }}</option>
                                    <option value="name" @selected(isSelected('sort_by', 'name'))>{{ __('dashboard.name') }}</option>
                                    <option value="created_at" @selected(isSelected('sort_by', 'created_at'))>
                                        {{ __('dashboard.created_at') }}</option>
                                </select>
                            </blockquote>
                            <blockquote class="form-group mb-0 col-2-md col-4-sm">
                                <select class="form-control text-center basic-single-select" name="order_by" id="order_by">
                                    <option value="" selected disabled>{{ __('dashboard.order_by') }}</option>
                                    <option value="desc" @selected(isSelected('order_by', 'desc'))>{{ __('dashboard.descending') }}
                                    </option>
                                    <option value="asc" @selected(isSelected('order_by', 'asc'))>{{ __('dashboard.ascending') }}
                                    </option>
                                </select>
                            </blockquote>
                            <blockquote class="form-group mb-0 col-2-md col-4-sm">
                                <select class="form-control text-center basic-single-select" name="limit_by" id="limit_by">
                                    <option value="" selected disabled>{{ __('dashboard.limit_by') }}</option>
                                    <option value="10" @selected(isSelected('limit_by', '10'))>10</option>
                                    <option value="20" @selected(isSelected('limit_by', '20'))>20</option>
                                    <option value="30" @selected(isSelected('limit_by', '30'))>30</option>
                                </select>
                            </blockquote>
                            <blockquote class="form-group mb-0 col-2-md col-4-sm">
                                <select class="form-control text-center basic-single-select" name="status" id="status">
                                    <option value="" selected disabled>{{ __('dashboard.status') }}</option>
                                    <option value="1" @selected(isSelected('status', '1'))>{{ __('dashboard.active') }}
                                    </option>
                                    <option value="0" @selected(isSelected('status', '0'))>{{ __('dashboard.inactive') }}
                                    </option>
                                </select>
                            </blockquote>
                            <blockquote class="form-group mb-0 col-2-md col-4-sm">
                                <input class="form-control text-start" name="keyword" id="keyword"
                                    value="{{ old('keyword', request()->query('keyword')) }}"
                                    placeholder="{{ __('dashboard.search') }}" />
                            </blockquote>
                            <button type="submit" class="btn btn-primary px-2">{{ __('dashboard.search') }}</button>
                            <a href="{{ route('dashboard.users.index') }}"
                                class="btn btn-secondary px-2">{{ __('dashboard.clear') }}</a>
                        </form>
                    </div>
                    {{-- table --}}
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered custom-rounde  users_table  d-table  table-striped"
                                    id="yajra_table">
                                    <thead>
                                        <tr>
                                            <th width="15%">#</th>
                                            <th width="15%">{{ __('dashboard.name') }}</th>
                                            <th width="20%">{{ __('dashboard.status') }}</th>
                                            <th width="20%">{{ __('dashboard.image') }}</th>
                                            <th width="15%">{{ __('dashboard.operations') }} </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                {{-- @dd( app()->getLocale()) --}}
                                                <td>{{ $user->name }}
                                                </td>
                                                <td>
                                                    @can('roles.update')
                                                        <button
                                                            class="btn @if ($user->status == 1) btn-primary @else btn-danger @endif">
                                                            {{ __('dashboard.' . $user->status_label) }}
                                                        </button>
                                                    @else
                                                        <a href="javascript:void(0);"
                                                            class="btn @if ($user->status == 1) btn-primary @else btn-danger @endif">
                                                            {{ __('dashboard.' . $user->status_label) }}
                                                        </a>
                                                    @endcan
                                                </td>
                                                <td>
                                                    @if ($user->image)
                                                        <img class="userImage"
                                                            src="{{ asset(str_starts_with($user->image, 'assets/') ? $user->image : 'storage/' . $user->image) }}"
                                                            loading="lazy" alt="{{ $user->name }}">
                                                    @else
                                                        {{ __('dashboard.no_data_found') }}
                                                    @endif
                                                </td>
                                                {{-- controls --}}
                                                <td>
                                                    @can('roles.update')
                                                        <a href="{{ route('dashboard.users.edit', $user) }}"
                                                            class="btn btn-icon btn-success mr-1 btn-sm d-inline-block">
                                                            <i class="fs-3 la la-edit"></i>
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-icon btn-success mr-1 btn-sm d-inline-block"
                                                            disabled>
                                                            <i class="fs-3 la la-edit"></i>
                                                        </a>
                                                    @endcan
                                                    @can('roles.update')
                                                        <a href="javascript:void(0)" data-id="{{ $user->id }}"
                                                            class="changeStatus btn btn-icon btn-warning mr-1 btn-sm d-inline-block">
                                                            <i
                                                                class="fs-3 la {{ $user->status == 1 ? 'la-archive' : 'la-play-circle' }}">
                                                            </i>

                                                        </a>
                                                        <form id="chanageStatusForm_{{ $user->id }}"
                                                            action="{{ route('dashboard.users.status', $user) }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="text" hidden name="status"
                                                                value="{{ $user->status }}">
                                                        </form>
                                                    @else
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-icon btn-warning mr-1 btn-sm d-inline-block"
                                                            disabled>
                                                            <i class="fs-3 la la-archive"></i>
                                                        </a>
                                                    @endcan
                                                    {{--
                                                    @can('roles.delete')
                                                        <button type="button" data-id="{{ $user->id }}"
                                                            class="btn btn-icon btn-danger btn-sm d-inline-block btn-delete"
                                                            data-toggle="modal" data-target="#confirmDeleteModal"
                                                            data-url="#">
                                                            <i class="fs-3 la la-trash"></i>
                                                        </button>
                                                    @else
                                                        <button type="button"
                                                            class="btn btn-icon btn-danger btn-sm d-inline-block btn-delete "
                                                            disabled>
                                                            <i class="fs-3 la la-trash"></i>
                                                        </button>
                                                    @endcan --}}
                                                </td>
                                            </tr>
                                        @empty
                                            <td colspan="5" class="py-1 font-weight-bold">
                                                {{ __('dashboard.no_data_found') }}</td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            // change status for user
            $('.changeStatus').on('click', function(e) {
                e.preventDefault()
                let user_id = $(this).data('id');
                $('#chanageStatusForm_' + user_id).submit();
            })
        })
    </script>
@endpush
