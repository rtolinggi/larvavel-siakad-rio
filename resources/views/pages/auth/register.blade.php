@extends('layouts.auth')

@section('title', 'Register')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('auth.action.register') }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action={{ route('register') }}>
                @csrf
                <div class="form-group">
                    <label for="name">{{ __('auth.field.name') }}</label>
                    <input id="name" type="text"
                        class="form-control @error('name') is-invalid
                    @enderror" name="name"
                        autofocus tabindex="1" value={{ old('name') }}>
                    @error('name')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">{{ __('auth.field.email') }}</label>
                    <input id="email" type="email"
                        class="form-control @error('email') is-invalid
                    @enderror" name="email"
                        tabindex="2" value={{ old('email') }}>
                    @error('email')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="row">
                    <div class="form-group col-6">
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
                    <div class="form-group col-6">
                        <label for="password_confirmation"
                            class="d-block">{{ __('auth.field.password_confirmation') }}</label>
                        <input id="password_confirmation" type="password" class="form-control" tabindex="4"
                            name="password_confirmation">
                        @error('password_confirmation')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        {{ __('auth.action.register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/jquery.pwstrength/jquery.pwstrength.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/auth-register.js') }}"></script>
@endpush
