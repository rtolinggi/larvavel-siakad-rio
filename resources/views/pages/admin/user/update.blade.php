@extends('layouts.app')

@section('title', 'edit user')

@push('style')
@endpush
@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Update User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">{{ __('dashboard.title') }}</a>
                    </div>
                    <div class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">{{ __('dashboard.user.menu') }}</a>
                    </div>
                    <div class="breadcrumb-item"><a href="#">Update</a>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Input User</h4>
                    </div>
                    <form action="{{ route('admin.user.put', ['user' => $user]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">{{ __('auth.field.name') }}</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ $user->name }}">
                                        @error('name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('auth.field.email') }}</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ $user->email }}">
                                        @error('email')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('auth.field.phone') }}</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" value="{{ $user->phone }}">
                                        @error('phone')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group mt-4">
                                    <label class="form-label">{{ __('auth.field.roles') }}</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="roles" value="admin" class="selectgroup-input"
                                                {{ $user->roles === 'admin' ? 'checked' : null }}>
                                            <span class="selectgroup-button">Admin</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="roles" value="mahasiswa" class="selectgroup-input"
                                                {{ $user->roles === 'mahasiswa' ? 'checked' : null }}>
                                            <span class="selectgroup-button">Mahasiwa</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="roles" value="dosen" class="selectgroup-input"
                                                {{ $user->roles === 'dosen' ? 'checked' : null }}>
                                            <span class="selectgroup-button">Dosen</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('auth.field.address') }}</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" data-height="150" name="address">{{ $user->address }}</textarea>
                                    @error('address')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <hr>
            <div class="text-right">
                <button class="btn btn-primary mr-1" type="submit">{{ __('dashboard.user.action.update') }}</button>
                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary"
                    type="reset">{{ __('dashboard.user.action.cancel') }}</a>
            </div>
            </form>
    </div>
    </section>
    </div>
@endsection

@push('scripts')
@endpush
