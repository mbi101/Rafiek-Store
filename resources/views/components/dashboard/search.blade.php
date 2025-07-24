<div {{ $attributes->merge(['class' => 'card-filter d-flex align-items-center justify-content-between']) }}>
    <fieldset style="min-width: 300px">
        <form action="{{ request()->url() }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control rounded-left" name="keyword" value="{{ old('keyword', request()->keyword) }}" placeholder="{{ __('dashboard.search') }}" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="la la-search"></i></button>
                </div>
            </div>
        </form>
    </fieldset>

    <button type="button" class="btn btn-primary  btn-min-width" data-toggle="modal"
            data-target="#default">
        {{ __('dashboard.filter') }}
    </button>

    <!-- Modal -->
    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ request()->url() }}" method="GET">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel1">{{ __('dashboard.filter') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ $slot }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-secondary" data-dismiss="modal">{{ __('dashboard.close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('dashboard.filter') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
