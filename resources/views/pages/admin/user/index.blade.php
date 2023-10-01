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
                                <a href="{{ route('admin.user.store', ['user' => 'kosong']) }}" class="btn btn-primary md">
                                    <i class="fa fa-add"></i> {{ __('dashboard.user.action.add') }}
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
    <script src="{{ asset('library/izitoast/dist/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/page/modules-sweetalert.js') }}"></script>
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
                "columnDefs": [{
                    "sortable": false,
                    "targets": [5]
                }],
                "columns": [{
                        "data": null,
                        "orderable": false,
                        "render": function(data, type, full, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        "data": "name",
                        "orderable": true,
                    },
                    {
                        "data": "email",
                        "orderable": true,
                    },
                    {
                        "data": "roles",
                        "orderable": true,
                    },
                    {
                        "data": "phone",
                        "orderable": true,
                    },
                    {
                        "data": null,
                        "render": function(data, type, full, meta) {
                            return '<a href="{{ route('admin.user.edit', ['user' => ':user']) }}" class="btn btn-success btn-sm mr-1"><i class="far fa-edit"></i></a>'
                                .replace(':user', data.id) +
                                '<button class="btn btn-danger btn-sm" onClick="deleteUser(' +
                                data.id + ')" ><i class="fas fa-times"></i></button>';
                        }
                    },
                    {
                        "data": "id",
                        "visible": false,
                        "searchable": false,
                    }
                ],
                "paging": true,
                "pageLength": 10,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var currentPage = api.page.info().page;
                    var startNumber = currentPage * api.page.len() + 1;
                    rows.each(function(row, index) {
                        $(row).find('td:first').html(startNumber + index);
                    });
                }
            });
        });

        function deleteUser(userId) {
            swal({
                    template: '#my-template',
                    title: 'Are you sure?',
                    text: 'Once deleted, you will not be able to recover this data user with email! ',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: '{{ route('admin.user.delete', ['user' => ':userId']) }}'.replace(':userId',
                                userId),
                            type: 'DELETE',
                            dataType: 'json',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(data) {
                                swal('data has been deleted!', {
                                    icon: 'success',
                                });
                                $('#table-users').DataTable().ajax.reload();
                            },
                            error: function(error) {
                                swal('Oops! Something went wrong.', {
                                    icon: 'error',
                                });
                            }
                        });
                    } else {
                        return
                    }
                });
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
