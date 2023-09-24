@extends('layouts.auth')

@section('title', 'Confirm Password')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('auth.password_confirmation_title') }}</h4>
        </div>
        <div class="card-body">
            <p class="text-muted">{{ __('auth.password_confirmation_body') }}</p>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
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
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        {{ __('auth.password_confirmation_title') }}
                    </button>
                </div>
                <div class="text-muted  text-center">
                    {{ __('Kembali ke halaman ') }} <a href={{ route('profile') }}>Profil</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/jquery.pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('js/page/auth-register.js') }}"></script>
@endpush
