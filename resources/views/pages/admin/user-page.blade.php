@extends('layouts.app')

@section('title', __('dashboard.user.menu'))

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.css') }}">
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('dashboard.user.menu') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">{{ __('dashboard.title') }}</a>
                    </div>
                    <div class="breadcrumb-item"><a href="{{ route('user') }}">{{ __('dashboard.profile.title') }}</a>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="mt-4 ml-4">
                                <button class="btn btn-primary md">
                                    <i class="fa fa-add"></i> Tambah User
                                </button>
                                <hr>
                            </div>
                            {{-- <div class="card-header"></div> --}}
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Di buat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td> {{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td> {{ $user->email }}</td>
                                                    <td> {{ $user->created_at }}</td>
                                                    <td>
                                                        <div>
                                                            <a href="#" class="btn btn-icon btn-success btn-sm"><i
                                                                    class="far fa-edit"></i></a>
                                                            <a href="#" class="btn btn-icon btn-danger btn-sm"><i
                                                                    class="fas fa-times"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush
