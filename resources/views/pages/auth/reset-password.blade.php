@extends('layouts.auth')

@section('title', 'Forgot Password')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ __('auth.verify_email.reset') }}
            </div>
        </div>
    @endif
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('auth.forgot_password.title') }}</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" id="token" value="{{ request()->route('token') }}">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" disabled type="email" class="form-control" name="email" tabindex="1"
                        required value="{{ request('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required
                        autofocus>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Password Confirmation</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"
                        tabindex="3" required autofocus>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        {{ __('auth.forgot_password.title') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
