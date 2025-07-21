@props([
    'first_link_url' => '#',
    'first_link_title' => '',
    'second_link_url' => '#',
    'second_link_title' => '',
    'active' => null,
    'title',
])

<div class="content-header-left mb-2 breadcrumb-new">
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item mx-1">
                    <a href="{{ $first_link_url }}" class="text-primary">{{ __('dashboard.dashboard') }}</a>
                </li>

                @if ($second_link_title != '')
                    <li class="breadcrumb-item mx-1">
                        <a href="{{ $second_link_url }}" class="text-primary">
                            {{ $second_link_title }}</a>
                    </li>
                @endif

                <li class="breadcrumb-item active">{{ $active }}</li>
            </ol>
        </div>
    </div>
</div>
