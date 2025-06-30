@extends('dashboard.layouts.app')
@section('title', __('dashboard.roles_permissions'))
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
                        <a href="{{ route('dashboard.roles.create') }}" class="btn btn-outline-primary ms-3 round px-2">{{ __('dashboard.create_role') }}</a>
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
                                                    <a href="{{ route('dashboard.roles.edit', $role->id) }}" class="btn btn-icon btn-success mr-1 btn-sm d-inline-block">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                    <a class="btn btn-icon btn-danger btn-sm d-inline-block" href="javascript:void(0)"
                                                       onclick="if(confirm('Are you sure you want to delete this role?')){document.getElementById('delete-form-{{ $role->id }}').submit();} return false">
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                @endif

                                            </td>
                                        </tr>
                                        @if($role->key != 'admin')
                                            {{-- delete form  --}}
                                            <form id="delete-form-{{ $role->id }}"
                                                  action="{{ route('dashboard.roles.destroy', $role->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endif

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
