@extends('errors.layout')
@section('title', 'Error 401')
@section('content')
    <section class="flexbox-container error-page">
        <div class="overlay"></div>
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 p-0">
                <div class="card-header bg-transparent border-0">
                    <h2 class="error-code text-center mb-2">401</h2>
                    <h3 class="text-uppercase text-center error-description">{{ __('dashboard.unauthorized_access') }}</h3>
                </div>
                <div class="card-content">
                    <div class="row justify-content-center py-2">
                        <div class="col-12 col-sm-6 col-md-6">
                            <a href="{{ url()->previous() }}" class="btn btn-primary btn-block"><i class="la la-undo"></i> {{ __('dashboard.back_to_previous_page') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent">
                    <div class="row">
                        <p class="text-center col-12 py-1 error-footer-text">{{ __('dashboard.copyright') }} &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            <a
                                class="text-bold-800 grey darken-2" href="https://pharao101.tech" target="_blank">{ PHARAO-101 }
                            </a>, {{ __('dashboard.all_rights_reserved') }}.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
