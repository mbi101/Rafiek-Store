@extends('dashboard.layouts.auth')
@section('title', __('dashboard.confirm_password'))

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <img src="{{ asset($general_settings->site_dark_logo) }}" height="75" alt="branding logo">
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>{{ __('dashboard.confirm_password') }}</span>
                                    </h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" action="{{ route('dashboard.confirm_password.verify') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="email" value="{{ $email }}">


                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control @error('code') is-invalid @enderror" name="code"
                                                       placeholder="{{ __('dashboard.enter_code') }}">
                                                <div class="form-control-position">
                                                    <i class="ft-lock"></i>
                                                </div>
                                                @error('code')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </fieldset>
                                            <div class="form-group row">
                                                @if($auth_settings->recaptcha_enable)
                                                    <div class="form-group position-relative d-flex align-items-center flex-column w-100 mt-2 mb-0">
                                                        {!! NoCaptcha::display() !!}
                                                        @error('g-recaptcha-response')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                @endif
                                            </div>
                                            <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> {{ __('dashboard.login') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
