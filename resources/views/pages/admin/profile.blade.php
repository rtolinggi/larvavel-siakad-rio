@extends('layouts.app')

@section('title', 'Profile')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/prismjs/themes/prism.min.css') }}">
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <div>
                    <h1>{{ __('dashboard.profile.title') }}</h1>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">{{ __('dashboard.title') }}</a>
                    </div>
                    <div class="breadcrumb-item"><a href="{{ route('profile') }}">{{ __('dashboard.profile.title') }}</a>
                    </div>
                </div>
            </div>
            <div class="section-body mt-5">
                <div class="col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('dashboard.profile.header') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-4">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4"
                                                role="tab" aria-controls="home"
                                                aria-selected="true">{{ __('dashboard.profile.menu') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4"
                                                role="tab" aria-controls="profile" aria-selected="false">
                                                {{ __('auth.field.password') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4"
                                                role="tab" aria-controls="contact" aria-selected="false">
                                                Otentikasi Dua Faktor
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-8">
                                    <div class="tab-content no-padding" id="myTab2Content">
                                        <div class="tab-pane fade show active" id="home4" role="tabpanel"
                                            aria-labelledby="home-tab4">
                                            <div class="card" style="border: 0.2px solid hsla(192, 94%, 43%, 0.5);">
                                                <div class="card-body">
                                                    <form method="POST"
                                                        action={{ route('user-profile-information.update') }}>
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="name">{{ __('auth.field.name') }}</label>
                                                            <input id="name" type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                name="name" autofocus tabindex="1">
                                                            @error('name')
                                                                <p class="invalid-feedback">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">{{ __('auth.field.email') }}</label>
                                                            <input id="email" type="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email" tabindex="2">
                                                            @error('email')
                                                                <p class="invalid-feedback">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group text-right">
                                                            <button type="submit" class="btn btn-primary btn-lg">
                                                                {{ __('dashboard.profile.update') }}
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile4" role="tabpanel"
                                            aria-labelledby="profile-tab4">
                                            <div class="card" style="border: 0.2px solid hsla(192, 94%, 43%, 0.5);">
                                                <div class="card-body">
                                                    <form method="POST" action={{ route('user-password.update') }}>
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label
                                                                for="current_password">{{ __('auth.field.current_password') }}</label>
                                                            <input id="current_password" type="password"
                                                                class="form-control @error('current_password') is-invalid @enderror"
                                                                name="current_password">
                                                            @error('current_password')
                                                                <p class="invalid-feedback">
                                                                    {{ __('auth.not_match_change_password') }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label
                                                                for="password">{{ __('auth.field.new_password') }}</label>
                                                            <input id="password" type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                name="password">
                                                            @error('password')
                                                                <p class="invalid-feedback">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label
                                                                for="password_confirmation">{{ __('auth.field.password_confirmation') }}</label>
                                                            <input id="password_confirmation" type="password"
                                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                                name="password_confirmation">
                                                            @error('password_confirmation')
                                                                <p class="invalid-feedback">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group text-right">
                                                            <button type="submit" class="btn btn-primary btn-lg">
                                                                {{ __('dashboard.profile.update') }}
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="contact4" role="tabpanel"
                                            aria-labelledby="contact-tab4">
                                            <div class="card" style="border: 0.2px solid hsla(192, 94%, 43%, 0.5);">
                                                <div class="card-header">
                                                    <h6>Otentikasi 2 Faktor</h6>
                                                </div>
                                                <div class="card-body">
                                                    @if (session('status') == 'two-factor-authentication-enabled')
                                                        <h6>
                                                            Please finish configuring two factor authentication below.
                                                        </h6>
                                                    @endif
                                                    <form method="POST" action={{ route('two-factor.enable') }}>
                                                        @csrf
                                                        @if (!Auth::user()->two_factor_secret)
                                                            <p>{{ __('dashboard.profile.tow_factor_auth_description') }}
                                                            </p>
                                                            <div class="form-group text-right">
                                                                <button type="submit" class="btn btn-primary btn-lg">
                                                                    {{ __('dashboard.profile.two_factor_auth_title_activate') }}
                                                                </button>
                                                            </div>
                                                        @else
                                                            {!! Auth::user()->twoFactorQrCodeSvg() !!}
                                                            @method('delete')
                                                            <div class="form-group text-right">
                                                                <button type="submit" class="btn btn-primary btn-lg">
                                                                    Batalkan
                                                                </button>
                                                            </div>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="section-body mt-5">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div>
                            <h5>{{ __('dashboard.profile.header_title') }}</h5>
                            <p>{{ __('dashboard.profile.header') }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action={{ route('register') }}>
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">{{ __('auth.field.name') }}</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            autofocus tabindex="1" value={{ Auth::user()->name }}>
                                        @error('name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('auth.field.email') }}</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            tabindex="2" value={{ Auth::user()->email }}>
                                        @error('email')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            {{ __('dashboard.profile.update') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="section-body mt-5">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div>
                            <h5>{{ __('auth.field.password') }}</h5>
                            <p>{{ __('dashboard.profile.pass_information') }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action={{ route('user-password.update') }}>
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="current_password">{{ __('auth.field.current_password') }}</label>
                                        <input id="current_password" type="password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            name="current_password">
                                        @error('current_password')
                                            <p class="invalid-feedback">{{ __('auth.not_match_change_password') }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{ __('auth.field.new_password') }}</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password">
                                        @error('password')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="password_confirmation">{{ __('auth.field.password_confirmation') }}</label>
                                        <input id="password_confirmation" type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation">
                                        @error('password_confirmation')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            {{ __('dashboard.profile.update') }}
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="section-body mt-5">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div>
                            <h5>{{ __('dashboard.profile.two_factor_auth_title') }}</h5>
                            <p>{{ __('dashboard.profile.tow_factor_auth_sub_title') }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h6>Otentikasi 2 Faktor</h6>
                            </div>
                            <div class="card-body">
                                @if (session('status') == 'two-factor-authentication-enabled')
                                    <h6>
                                        Please finish configuring two factor authentication below.
                                    </h6>
                                @endif
                                <form method="POST" action={{ route('two-factor.enable') }}>
                                    @csrf
                                    @if (!Auth::user()->two_factor_secret)
                                        <p>{{ __('dashboard.profile.tow_factor_auth_description') }}</p>
                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                {{ __('dashboard.profile.two_factor_auth_title_activate') }}
                                            </button>
                                        </div>
                                    @else
                                        {!! Auth::user()->twoFactorQrCodeSvg() !!}
                                        @method('delete')
                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                Batalkan
                                            </button>
                                        </div>
                                    @endif

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div> --}}
        </section>
        <form class="modal-part" id="modal-login-part">
            <p>Harap Konfirmasi <code>Kata Sandi</code> anda untuk melanjutkan..</p>
            <div class="form-group">
                <label>Kata Sandi</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                    <input type="password" class="form-control" placeholder="Kata Sandi" name="password">
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/izitoast/dist/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/jquery.pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('library/prismjs/prism.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-toastr.js') }}"></script>
    <script src="{{ asset('js/page/auth-register.js') }}"></script>
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#name').val('{{ Auth::user()->name }}');
            $('#email').val('{{ Auth::user()->email }}');
            $('#modal-confirm').fireModal({
                title: 'Konfirmasi',
                body: $("#modal-login-part"),
                footerClass: 'bg-whitesmoke',
                autoFocus: false,
                onFormSubmit: function(modal, e, form) {
                    // Form Data
                    let form_data = $(e.target).serialize();
                    console.log(form_data)

                    // DO AJAX HERE
                    let fake_ajax = setTimeout(function() {
                        form.stopProgress();
                        modal.find('.modal-body').prepend(
                            '<div class="alert alert-info">Please check your browser console</div>'
                        )

                        clearInterval(fake_ajax);
                    }, 1500);

                    e.preventDefault();
                },
                shown: function(modal, form) {
                    console.log(form)
                },
                buttons: [{
                    text: 'Konfirmasi',
                    submit: true,
                    class: 'btn btn-primary btn-shadow',
                    handler: function(modal) {}
                }]
            });
        });

        @if ($errors->any())
            $(document).ready(function() {
                $('#profile-tab4').click();
            });
        @endif

        @if (session('status') === 'password-updated')
            $(document).ready(function() {
                $('#name').val('{{ Auth::user()->name }}');
                iziToast.success({
                    title: 'Sukses',
                    message: '{{ __('auth.success_change_password') }}',
                    position: 'topRight'
                });
            });
        @endif

        @if (session('status') === 'profile-information-updated')
            $(document).ready(function() {
                $('#name').val('{{ Auth::user()->name }}');
                iziToast.success({
                    title: 'Sukses',
                    message: '{{ __('auth.success_cahange_profile') }}',
                    position: 'topRight'
                });
            });
        @endif
    </script>
@endpush
