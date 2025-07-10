@extends('dashboard.layouts.app')

@section('title')
    {{ __('dashboard.categories') }}
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

@section('title')
    {{ __('dashboard.categories') }}
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header">
                <x-dashboard.breadceumb :title="__('dashboard.dashboard')" :first_link_url="route('dashboard.home')" :active="__('dashboard.categories')" />
            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered custom-rounded-table">
                                    <thead>
                                        <tr>
                                            <th width="15%">#</th>
                                            <th width="15%">{{ __('dashboard.name') }}</th>
                                            <th width="20%">{{ __('dashboard.status') }}</th>
                                            <th width="15%">{{ __('dashboard.operations') }} </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <td colspan="4" class="py-1 font-weight-bold">
                                            {{ __('dashboard.no_data_found') }}</td> --}}
                                        <tr>
                                            <td>1</td>
                                            <td>category</td>
                                            <td> <button class="btn btn-success"> active</button> </td>
                                            <td>
                                                @can('roles.update')
                                                    <a href="#"
                                                        class="btn btn-icon btn-success mr-1 btn-sm d-inline-block">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-icon btn-success mr-1 btn-sm d-inline-block" disabled>
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('roles.delete')
                                                    <button type="button"
                                                        class="btn btn-icon btn-danger btn-sm d-inline-block btn-delete"
                                                        data-toggle="modal" data-target="#confirmDeleteModal" data-url="#">
                                                        <i class="la la-trash"></i>
                                                    </button>
                                                @else
                                                    <button type="button"
                                                        class="btn btn-icon btn-danger btn-sm d-inline-block btn-delete"
                                                        disabled>
                                                        <i class="la la-trash"></i>
                                                    </button>
                                                @endcan
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>category</td>
                                            <td> <button class="btn btn-danger">archived</button> </td>
                                            <td>
                                                @can('roles.update')
                                                    <a href="#"
                                                        class="btn btn-icon btn-success mr-1 btn-sm d-inline-block">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-icon btn-success mr-1 btn-sm d-inline-block" disabled>
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('roles.delete')
                                                    <button type="button"
                                                        class="btn btn-icon btn-danger btn-sm d-inline-block btn-delete"
                                                        data-toggle="modal" data-target="#confirmDeleteModal" data-url="#">
                                                        <i class="la la-trash"></i>
                                                    </button>
                                                @else
                                                    <button type="button"
                                                        class="btn btn-icon btn-danger btn-sm d-inline-block btn-delete"
                                                        disabled>
                                                        <i class="la la-trash"></i>
                                                    </button>
                                                @endcan
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>category</td>
                                            <td> <button class="btn btn-primary"> active</button> </td>
                                            <td>
                                                @can('roles.update')
                                                    <a href="#"
                                                        class="btn btn-icon btn-success mr-1 btn-sm d-inline-block">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-icon btn-success mr-1 btn-sm d-inline-block" disabled>
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('roles.delete')
                                                    <button type="button"
                                                        class="btn btn-icon btn-danger btn-sm d-inline-block btn-delete"
                                                        data-toggle="modal" data-target="#confirmDeleteModal" data-url="#">
                                                        <i class="la la-trash"></i>
                                                    </button>
                                                @else
                                                    <button type="button"
                                                        class="btn btn-icon btn-danger btn-sm d-inline-block btn-delete"
                                                        disabled>
                                                        <i class="la la-trash"></i>
                                                    </button>
                                                @endcan
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            {{-- {{ $caegorys->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/dashboard') }}/vendors/js/tables/datatable/datatables.min.js" type="text/javascript">
    </script>
@endpush
