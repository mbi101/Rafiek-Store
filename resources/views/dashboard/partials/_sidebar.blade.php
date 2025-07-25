<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content pt-2">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            @can('categories')
                <li class="nav-item {{ Route::is('dashboard.categories.*') ? 'open' : '' }}">
                    <a>
                        <i class="la la-list"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{ __('dashboard.categories') }}</span>
                        <span class="badge badge badge-info badge-pill float-right mr-2">{{ $categories_count ?? 0 }}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{ Route::is('dashboard.categories.index') ? 'active' : '' }}">
                            <a class="menu-item " href="{{ route('dashboard.categories.index') }}"
                                data-i18n="nav.dash.crypto">{{ __('dashboard.categories') }}</a>
                        </li>
                        <li class="{{ Route::is('dashboard.categories.create') ? 'active' : '' }}">
                            <a class="menu-item " href="{{ route('dashboard.categories.create') }}"
                                data-i18n="nav.dash.crypto">{{ __('dashboard.category_create') }}</a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('brands')
                <li class=" nav-item">
                    <a>
                        <i class="la la-check-square"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{ __('dashboard.brands') }}</span>
                        <span class="badge badge badge-info badge-pill float-right mr-2">{{ $brands_count ?? 0 }}</span>
                    </a>
                </li>
            @endcan

            @can('roles')
                <li class=" nav-item">
                    <a href="{{ route('dashboard.roles.index') }}"><i class="la la-unlock-alt"></i>
                        <span class="menu-title"
                            data-i18n="nav.templates.main">{{ __('dashboard.roles_permissions') }}</span>
                    </a>
                </li>
            @endcan

            @can('admins')
                <li class=" nav-item">
                    <a href="{{ route('dashboard.admins.index') }}">
                        <i class="la la-user-secret"></i>
                        <span class="menu-title" data-i18n="nav.templates.main">{{ __('dashboard.admins') }}</span>
                        <span class="badge badge badge-info badge-pill float-right mr-2">{{ $admins_count ?? 0 }}</span>
                    </a>
                </li>
            @endcan

            @can('users')
                <li class=" nav-item">
                    <a href="{{ route('dashboard.users.index') }}">
                        <i class="la la-users"></i>
                        <span class="menu-title" data-i18n="nav.templates.main">{{ __('dashboard.users') }}</span>
                        <span class="badge badge badge-info badge-pill float-right mr-2">{{ $users_count ?? 0 }}</span>
                    </a>
                </li>
            @endcan

            @can('global_shipping')
                <li class=" nav-item">
                    <a href="{{ route('dashboard.countries.index') }}">
                        <i class="la la-ambulance"></i>
                        <span class="menu-title" data-i18n="nav.templates.main"> {{ __('dashboard.shipping') }} </span>
                    </a>
                </li>
            @endcan

            @can('coupons')
                <li class=" nav-item">
                    <a href="{{ route('dashboard.coupons.index') }}">
                        <i class="la la-500px"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{ __('dashboard.coupons') }}</span>
                        <span class="badge badge badge-info badge-pill float-right mr-2">{{ $coupons_count ?? 0 }}</span>
                    </a>

                </li>
            @endcan

            <li class="nav-item">
                <a href="javascript:void(0)"><i class="la la-cart-arrow-down"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{ __('dashboard.products') }}</span><span
                        class="badge badge badge-info badge-pill float-right mr-2">10</span>
                </a>
                <ul class="menu-content">
                    @can('attributes')
                        <li class="">
                            <a class="menu-item" href="{{ route('dashboard.attributes.index') }}"
                                data-i18n="nav.dash.ecommerce">{{ __('dashboard.attributes') }}</a>
                        </li>
                    @endcan
                    @can('products')
                        <li>
                            <a class="menu-item" href="{{ route('dashboard.products.index') }}"
                                data-i18n="nav.dash.crypto">{{ __('dashboard.products') }}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="{{ route('dashboard.products.create') }}"
                                data-i18n="nav.dash.crypto">{{ __('dashboard.create_product') }}</a>
                        </li>
                    @endcan
                </ul>
            </li>

            <li class="navigation-header">
                <span data-i18n="nav.category.layouts">{{ __('dashboard.system') }}</span>
                <i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right"
                    data-original-title="Layouts"></i>
            </li>
            @can('contacts')
                <li class=" nav-item">
                    <a href="{{ route('dashboard.contacts.index') }}">
                        <i class="la la-phone"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{ __('dashboard.contacts') }}</span>
                        <span class="badge badge badge-info badge-pill float-right mr-2">{{ $contacts_count ?? 0 }}</span>
                    </a>
                </li>
            @endcan
            @can('faqs')
                <li class="nav-item">
                    <a href="{{ route('dashboard.faqs.index') }}">
                        <i class="la la-info"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{ __('dashboard.faqs') }}</span>
                        <span class="badge badge badge-info badge-pill float-right mr-2">{{ $faqs_count ?? 0 }}</span>
                    </a>
                </li>
            @endcan

            @can('settings')
                <li class="nav-item has-sub {{ Route::is('dashboard.countries.*') ? 'open' : '' }}">
                    <a href="javascript:void(0)"><i class="la la-cog"></i>
                        <span class="menu-title"
                              data-i18n="nav.dash.main">{{ __('dashboard.settings') }}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="">
                            <a class="menu-item" href="{{ route('dashboard.countries.index') }}" data-i18n="nav.dash.ecommerce">{{ __('dashboard.countries_cities') }}</a>
                        </li>
                    </ul>
                </li>
            @endcan
        </ul>
    </div>
</div>
