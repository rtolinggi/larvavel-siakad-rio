@extends('layouts.auth')

@section('title', 'Forgot Password')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('auth.forgot_password.title') }}</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" id="token" value="{{ request()->route('token') }}">
                <div class="form-group">
                    <label for="email">{{ __('auth.field.email') }}</label>
                    <input id="email" type="email" readonly class="form-control" name="email" tabindex="1"
                        required value="{{ request('email') }}">
                </div>
                <div class="form-group">
                    <label for="password" class="d-block">{{ __('auth.field.password') }}</label>
                    <input id="password" type="password"
                        class="form-control pwstrength @error('password') is-invalid
                        @enderror"
                        tabindex="3" data-indicator="pwindicator" name="password" value={{ old('password') }}>
                    @error('password')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                    <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="d-block">{{ __('auth.field.password_confirmation') }}</label>
                    <input id="password_confirmation" type="password" class="form-control" tabindex="4"
                        name="password_confirmation">
                    @error('password_confirmation')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" id="btn-reset">
                        {{ __('auth.forgot_password.title') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/izitoast/dist/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/jquery.pwstrength/jquery.pwstrength.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/auth-register.js') }}"></script>
    <script src="{{ asset('js/page/modules-toastr.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#btn-reset').click(function() {
                var email = $('#email').val();
                if (email !== "") {
                    $(this).addClass("disabled btn-progress");
                }
            });
        });
        @if ($errors->any())
            $(document).ready(function() {
                @foreach ($errors->all() as $error)
                    iziToast.error({
                        title: 'Error',
                        message: '{{ $error }}',
                        position: 'topRight'
                    });
                @endforeach

                $(this).removeClass("disabled btn-progress");
            });
        @endif
    </script>
    <!-- Page Specific JS File -->
@endpush
