@extends('dashboard.layouts.app')

@section('title')
    {{ __('dashboard.categories') }}
@endsection

@push('style')
    @if ($siteLang)
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
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h3 class="card-title" id="basic-layout-colored-form-control">{{ __('dashboard.categories') }}
                        </h3>
                        @can('categories.create')
                            <a href="{{ route('dashboard.categories.create') }}"
                                class="btn btn-outline-primary ms-3 round px-2">{{ __('dashboard.category_create') }}</a>
                        @else
                            <a href="javascript:void(0);" class="btn btn-outline-primary ms-3 round px-2"
                                disabled>{{ __('dashboard.category_create') }}</a>
                        @endcan
                    </div>

                    {{-- table --}}
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered custom-rounde    d-table  table-striped"
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
                                        @forelse ($categories as $category)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $siteLang == 'ar' ? $category->name['ar'] : $category->name['en'] }}
                                                </td>
                                                <td>
                                                    <button
                                                        class="btn @if ($category->status == 1) btn-primary
                                                         @else btn-danger @endif">
                                                        {{ __('dashboard.' . $category->status_label) }}
                                                    </button>
                                                </td>
                                                <td>
                                                    @if ($category->image)
                                                        <img src="{{ asset('storage/' . $category->image) }}"
                                                            loading="lazy" alt="{{ $category->name['ar'] }}"
                                                            width="150px">
                                                    @else
                                                        {{ __('dashboard.no_data_found') }}
                                                    @endif
                                                </td>
                                                {{-- controls --}}
                                                <td>
                                                    @can('roles.update')
                                                        <a href="{{ route('dashboard.categories.edit', $category) }}"
                                                            class="btn btn-icon btn-success mr-1 btn-sm d-inline-block">
                                                            <i class="la la-edit"></i>
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-icon btn-success mr-1 btn-sm d-inline-block"
                                                            disabled>
                                                            <i class="la la-edit"></i>
                                                        </a>
                                                    @endcan

                                                    @can('roles.delete')
                                                        <button type="button" data-id="{{ $category->id }}"
                                                            class="btn btn-icon btn-danger btn-sm d-inline-block btn-delete"
                                                            data-toggle="modal" data-target="#confirmDeleteModal"
                                                            data-url="#">
                                                            <i class="la la-trash"></i>
                                                        </button>
                                                    @else
                                                        <button type="button"
                                                            class="btn btn-icon btn-danger btn-sm d-inline-block btn-delete "
                                                            disabled>
                                                            <i class="la la-trash"></i>
                                                        </button>
                                                    @endcan

                                                </td>
                                            </tr>
                                        @empty
                                            <td colspan="4" class="py-1 font-weight-bold">
                                                {{ __('dashboard.no_data_found') }}</td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{ $categories->links() }}
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
            // delete an category
            var category_id;
            $('.btn-delete').on('click', function() {
                category_id = $(this).data('id');
            })

            $('#deleteForm').on('click', function(e) {
                e.preventDefault()

                $.ajax({
                    url: "{{ route('dashboard.categories.destroy', ':id') }}".replace(':id',
                        category_id),
                    method: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'delete',
                        "category_id": category_id
                    },
                    success: function(res) {
                        location.reload();
                        console.log(res);
                    },
                    error: function(err) {
                        console.log(err);
                    },
                })
            })

        })
    </script>
@endpush
