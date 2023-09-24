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
                    <input id="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                        {{ __('validation.required', ['attribute' => __('auth.field.email')]) }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">{{ __('auth.field.password') }}</label>
                        <div class="float-right">
                            <a href="{{ route('password.request') }}" class="text-small">
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
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" id="btn-login">
                        {{ __('auth.action.login') }}
                    </button>
                </div>
            </form>
            <div class="text-muted  text-center">
                {{ __('auth.link.dont_have_account') }} <a
                    href={{ route('register') }}>{{ __('auth.link.register') }}</a>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/izitoast/dist/js/iziToast.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-toastr.js') }}"></script>

    {{-- Error Login --}}
    <script>
        $(document).ready(function() {
            $('#btn-login').click(function() {
                var email = $('#email').val();
                var password = $('#password').val();
                if (email !== "" && password !== "") {
                    $(this).addClass("disabled btn-progress");
                }
            });
        });
        @if (session('status'))
            $(document).ready(function() {
                iziToast.success({
                    title: 'Sukses',
                    message: '{{ session('status') }}',
                    position: 'topRight'
                });
            });
        @endif
        @if ($errors->any())
            $(document).ready(function() {
                iziToast.error({
                    title: 'Login Error',
                    message: '{{ $errors->first() }}',
                    position: 'topRight'
                });
                $("#login-button").removeClass("disabled btn-progress");
            });
        @endif
    </script>
@endpush
