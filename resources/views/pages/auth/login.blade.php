@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('auth.action.login') }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action={{ route('login') }} class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="email">{{ __('auth.field.email') }}</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required
                        autofocus>
                    <div class="invalid-feedback">
                        {{ __('validation.required', ['attribute' => __('auth.field.email')]) }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">{{ __('auth.field.password') }}</label>
                        <div class="float-right">
                            <a href="auth-forgot-password.html" class="text-small">
                                {{ __('auth.link.forgot_password') }}
                            </a>
                        </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                        {{ __('validation.required', ['attribute' => __('auth.field.password')]) }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                        <label class="custom-control-label" for="remember-me">{{ __('auth.field.remember_me') }}</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        {{ __('auth.action.login') }}
                    </button>
                </div>
            </form>
            <div class="mt-4 mb-3 text-center">
                <div class="text-job text-muted">{{ __('auth.action.other_login') }}</div>
            </div>
            <div class="row sm-gutters">
                <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                        <span class="fab fa-facebook"></span> Facebook
                    </a>
                </div>
                <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                        <span class="fab fa-twitter"></span> Twitter
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="text-muted mt-5 text-center">
        {{ __('auth.link.dont_have_account') }} <a href={{ route('register') }}>{{ __('auth.link.register') }}</a>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/izitoast/dist/js/iziToast.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-toastr.js') }}"></script>

    {{-- Error Login --}}
    <script>
        @if ($errors->any())
            $(document).ready(function() {
                iziToast.error({
                    title: 'Login Error',
                    message: '{{ $errors->first() }}',
                    position: 'topRight'
                });
            });
        @endif
    </script>
@endpush
