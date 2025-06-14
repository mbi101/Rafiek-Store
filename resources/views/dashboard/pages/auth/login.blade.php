@extends('dashboard.layouts.auth')
@section('title', __('dashboard.dashboard'))

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
                                        <img src="{{ asset('assets/dashboard/images/logo/logo-dark.png') }}" alt="branding logo">
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>{{ __('dashboard.login') }}</span>
                                    </h6>
                                </div>
                                <div class="card-content">
                                    <div class="text-center">
                                        <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook">
                                            <span class="la la-facebook"></span>
                                        </a>
                                        <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter">
                                            <span class="la la-twitter"></span>
                                        </a>
                                        <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-linkedin">
                                            <span class="la la-linkedin font-medium-4"></span>
                                        </a>
                                        <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-github">
                                            <span class="la la-github font-medium-4"></span>
                                        </a>
                                    </div>
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                                        <span>{{ __('dashboard.or_using_account_details') }}</span>
                                    </p>
                                    <div class="card-body">
                                        <form class="form-horizontal" action="{{ route('dashboard.login') }}" method="post">
                                            @csrf
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                                       placeholder="{{ __('dashboard.enter_email') }}">
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
                                                    <i class="la la-key"></i>
                                                </div>
                                                @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-12 text-center text-sm-left">
                                                    <fieldset>
                                                        <input type="checkbox" id="remember-me" name="remember_me" class="chk-remember">
                                                        <label for="remember-me"> {{ __('dashboard.remember_me') }}</label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="recover-password.html"
                                                                                                                        class="card-link">{{ __('dashboard.forget_password') }}</a>
                                                </div>
                                                <DIV class="form-group position-relative d-flex align-items-center flex-column w-100 mt-2 mb-0">
                                                    {!! NoCaptcha::display() !!}
                                                    @error('g-recaptcha-response')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </DIV>
                                            </div>
                                            <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> {{ __('dashboard.login') }}</button>
                                        </form>
                                    </div>
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                                        <span>{{ __('dashboard.dont_have_account') }}</span>
                                    </p>
                                    <div class="card-body">
                                        <a href="{{ route('dashboard.register') }}" class="btn btn-outline-danger btn-block"><i class="ft-user"></i> {{ __('dashboard.register') }}
                                        </a>
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
