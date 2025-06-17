@extends('dashboard.layouts.auth')
@section('title', __('dashboard.change_password'))

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
                                        <span>{{ __('dashboard.change_password') }}</span>
                                    </h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" action="{{ route('dashboard.password.reset.post') }}" method="post">
                                            @csrf

                                            <input type="hidden" name="code" value="{{ $code }}">

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                                       placeholder="{{ __('dashboard.enter_email') }}" value="{{ $email }}" readonly>
                                                <div class="form-control-position">
                                                    <i class="ft-user"></i>
                                                </div>
                                                @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                                       placeholder="{{ __('dashboard.enter_password') }}">
                                                <div class="form-control-position">
                                                    <i class="ft-lock"></i>
                                                </div>
                                                @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                                       placeholder="{{ __('dashboard.enter_password_confirmation') }}">
                                                <div class="form-control-position">
                                                    <i class="ft-lock"></i>
                                                </div>
                                                @error('password_confirmation')
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
                                            <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> {{ __('dashboard.change_password') }}</button>
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
