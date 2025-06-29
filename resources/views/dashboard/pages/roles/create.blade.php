@extends('dashboard.layouts.app')
@section('title', __('dashboard.roles_permissions'))
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header">
                <x-dashboard.breadceumb
                    :title="__('dashboard.roles_permissions')" :first_link_url="route('dashboard.home')"
                    :second_link_url="route('dashboard.roles.index')" :second_link_title="__('dashboard.roles_permissions')" :active="__('dashboard.create_role')"
                />
            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h3 class="card-title" id="basic-layout-colored-form-control">{{ __('dashboard.create_role') }} </h3>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            {{--                            @include('dashboard.includes.validations-errors')--}}
                            <form class="form" action="{{ route('dashboard.roles.store') }}" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="roleNameAr" class="font-weight-bold">{{ __('dashboard.role_ar') }}</label>
                                                <input type="text" id="roleNameAr" class="form-control"
                                                       placeholder="{{ __('dashboard.name_ar') }}" name="name[ar]">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="roleNameEn" class="font-weight-bold">{{ __('dashboard.role_en') }}</label>
                                                <input type="text" id="roleNameEn" class="form-control"
                                                       placeholder="{{ __('dashboard.name_en') }}" name="name[en]">
                                            </div>
                                        </div>
                                    </div>

                                    <table class="table custom-rounded-table">
                                        <thead>
                                        <tr>
                                            <th>
                                                <input type="checkbox" class="form-check-input" id="checkAll">
                                            </th>
                                            <th>{{ __('dashboard.permission') }}</th>
                                            <th>{{ __('dashboard.create') }} </th>
                                            <th>{{ __('dashboard.edit') }} </th>
                                            <th>{{ __('dashboard.delete') }} </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @forelse ($permissions as $permission)
                                            <tr>
                                                <td>
                                                    <input type="checkbox"
                                                           class="form-check-input main-item-checkbox item-checkbox"
                                                           data-entity="{{ $permission->key }}">
                                                    <input type="checkbox" name="permissions[{{ $permission->key }}][id]"
                                                           value="{{ $permission->id }}"
                                                           class="form-check-input item-checkbox sub-main-item-checkbox permission-{{ $permission->key }} d-none" disabled>
                                                </td>

                                                <td>{{ $permission->getTranslation('name', app()->getLocale()) }}</td>

                                                @foreach(['create', 'update', 'delete'] as $action)
                                                    <td class="text-center">
                                                        @if(in_array($action, $permission->options))
                                                            <input
                                                                type="checkbox"
                                                                name="permissions[{{ $permission->key }}][options][]"
                                                                value="{{ $action }}"
                                                                class="form-check-input item-checkbox sub-main-item-checkbox permission-{{ $permission->key }}" disabled>
                                                        @else
                                                            ---
                                                        @endif

                                                    </td>
                                                @endforeach
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">{{ __('dashboard.no_data_found') }}</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-actions right">
                                    <a href="{{ route('dashboard.roles.create') }}" class="btn btn-primary ms-3 round px-2 mr-1">
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
