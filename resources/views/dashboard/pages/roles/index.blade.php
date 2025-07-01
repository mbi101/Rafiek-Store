@extends('dashboard.layouts.app')
@section('title', __('dashboard.roles_permissions'))
@push('modal')
    <x-dashboard.delete-modal/>
@endpush
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header">
                <x-dashboard.breadceumb
                    :title="__('dashboard.roles_permissions')" :first_link_url="route('dashboard.home')" :active="__('dashboard.roles_permissions')"
                />
            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h3 class="card-title" id="basic-layout-colored-form-control">{{ __('dashboard.roles_permissions') }} </h3>
                        @can('roles.create')
                            <a href="{{ route('dashboard.roles.create') }}" class="btn btn-outline-primary ms-3 round px-2">{{ __('dashboard.create_role') }}</a>
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
                                        <th>#</th>
                                        <th width="15%">{{ __('dashboard.role_name') }}</th>
                                        <th>{{ __('dashboard.permissions') }} </th>
                                        <th width="15%">{{ __('dashboard.operations') }} </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @forelse ($roles as $role)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $role->name }} </td>
                                            <td>
                                                @if(count($role->permissions) == count($permissions))
                                                    <h5 class="text-primary font-weight-bold mb-0">{{ __('dashboard.all_permissions') }}</h5>
                                                @else
                                                    @foreach ($role->permissions as $perm)
                                                        <div class="badge badge-primary b-px-3 b-py-2 b-me-1 b-mb-2 round">{{ $perm['name'] }}</div>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if($role->key == 'admin')
                                                    -----
                                                @else
                                                    @can('roles.update')
                                                        <a href="{{ route('dashboard.roles.edit', $role->id) }}" class="btn btn-icon btn-success mr-1 btn-sm d-inline-block">
                                                            <i class="la la-edit"></i>
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0);" class="btn btn-icon btn-success mr-1 btn-sm d-inline-block" disabled>
                                                            <i class="la la-edit"></i>
                                                        </a>
                                                    @endcan
                                                    @can('roles.delete')
                                                        <button type="button"
                                                                class="btn btn-icon btn-danger btn-sm d-inline-block btn-delete"
                                                                data-toggle="modal" data-target="#confirmDeleteModal"
                                                                data-url="{{ route('dashboard.roles.destroy', $role->id) }}">
                                                            <i class="la la-trash"></i>
                                                        </button>
                                                    @else
                                                        <button type="button"
                                                                class="btn btn-icon btn-danger btn-sm d-inline-block btn-delete" disabled>
                                                            <i class="la la-trash"></i>
                                                        </button>
                                                    @endcan
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="4" class="py-1 font-weight-bold">{{ __('dashboard.no_data_found') }}</td>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{ $roles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
