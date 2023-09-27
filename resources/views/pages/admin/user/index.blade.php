@extends('layouts.app')

@section('title', __('dashboard.user.menu'))

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('dashboard.user.menu') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">{{ __('dashboard.title') }}</a>
                    </div>
                    <div class="breadcrumb-item"><a
                            href="{{ route('admin.user.index') }}">{{ __('dashboard.user.menu') }}</a>
                    </div>
                    <div class="breadcrumb-item"><a href="#">List</a>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="mt-4 ml-4">
                                <a href="{{ route('admin.user.store') }}" class="btn btn-primary md">
                                    <i class="fa fa-add"></i> Tambah User
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table" id="table-users">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Roles</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($data['data'] as $user)
                                                <tr>
                                                    <td> {{ $loop->index + 1 }}</td>
                                                    <td>{{ $user['name'] }}</td>
                                                    <td>{{ $user['email'] }}</td>
                                                    <td>{{ $user['roles'] }}</td>
                                                    <td>{{ $user['phone'] }}</td>
                                                    <td>
                                                        <div>
                                                            <button class="btn btn-icon btn-success btn-sm"
                                                                data-toggle="modal" data-target="#store"><i
                                                                    class="far fa-edit"></i></button>
                                                            <button class="btn btn-icon btn-danger btn-sm"><i
                                                                    class="fas fa-times"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach --}}
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

    {{-- Store User --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="store">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Store User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                        </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/izitoast/dist/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('js/page/modules-toastr.js') }}"></script>
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table-users').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.user.table') }}",
                "searchDelay": 800,
                "scrollY": false,
                "columns": [{
                        "data": null,
                        "render": function(data, type, full, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "email"
                    },
                    {
                        "data": "roles"
                    },
                    {
                        "data": "phone"
                    },
                    {
                        "data": null,
                        "render": function(data, type, full, meta) {
                            // Tambahkan tombol edit dan hapus di sini
                            return '<button class="btn btn-success btn-sm mr-1" onclick="editUser(' +
                                data.id + ')"><i class="far fa-edit"></i></button>' +
                                '<button class="btn btn-danger btn-sm" onclick="deleteUser(' + data
                                .id + ')"><i class="fas fa-times"></i></button>';
                        }
                    },
                    {
                        "data": "id", // Kolom id yang ingin disembunyikan
                        "visible": false, // Menyembunyikan kolom id
                        "searchable": false // Menyembunyikan kolom id dari fungsi pencarian
                    }
                ]
            });
        });

        function editUser(userId) {
            // Implementasi logika untuk tindakan edit
            console.log("Edit user dengan ID:", userId);
            // Tambahkan kode untuk membuka modal edit atau halaman edit
        }

        function deleteUser(userId) {
            // Implementasi logika untuk tindakan hapus
            console.log("Hapus user dengan ID:", userId);
            // Tambahkan kode untuk konfirmasi hapus dan mengirim permintaan penghapusan ke server
        }

        function loadDataIntoTable(data) {
            var table = $('#table-users').DataTable();
            table.clear().draw();

            if (data && data.length > 0) {
                table.rows.add(data).draw();
            }
        }

        @if (session('status'))
            $(document).ready(function() {
                iziToast.success({
                    title: 'Sukses',
                    message: '{{ session('status') }}',
                    position: 'topRight'
                });
            });
        @endif
    </script>
@endpush
