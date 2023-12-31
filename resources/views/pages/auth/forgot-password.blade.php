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
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ $errors->first() }}
            </div>
        </div>
    @endif
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('auth.forgot_password.title') }}</h4>
        </div>

        <div class="card-body">
            <p class="text-muted">{{ __('auth.forgot_password.body') }}</p>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" name="email" tabindex="1" required autofocus>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" id="btn-forgot">
                        {{ __('auth.forgot_password.title') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script>
        $(document).ready(function() {
            $('#btn-forgot').click(function() {
                var email = $('#email').val();
                if (email !== "") {
                    $(this).addClass("disabled btn-progress");
                }
            });
        });
        @if (session('status'))
            $(document).ready(function() {
                $(this).removeClass("disabled btn-progress");
            });
        @endif
    </script>
    <!-- Page Specific JS File -->
@endpush
