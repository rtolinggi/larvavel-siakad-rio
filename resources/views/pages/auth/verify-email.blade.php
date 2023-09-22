@extends('layouts.auth')

@section('title', 'Forgot Password')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ __('auth.verify_email.send') }}
            </div>
        </div>
    @endif
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('auth.verify_email.title') }}</h4>
        </div>
        <div class="card-body">
            <p class="text-muted">{{ __('auth.verify_email.body') }}</p>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        {{ __('auth.verify_email.title') }}
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
