@extends('layouts.dashboard')


@section('admin')
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-lg-3 col-xl-2">
                    <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary mb-3 mb-lg-0"
                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah"><i
                            class="bi bi-plus-square-fill mx-1"></i>
                        Tambah User
                    </a>
                </div>
                <div class="col-lg-9 col-xl-10">
                    <form class="float-lg-end">
                        <div class="row row-cols-lg-auto g-2">
                            <div class="col-12">
                                <a href="javascript:;" class="btn btn-light mb-3 mb-lg-0"><i
                                        class="bi bi-download"></i>Export</a>
                            </div>
                            <div class="col-12">
                                <a href="javascript:;" class="btn btn-light mb-3 mb-lg-0"><i
                                        class="bi bi-upload"></i>Import</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Customer Details</h5>
                <div class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i>
                    </div>
                    <input type="text" id="searchInput" class="form-control ps-5" placeholder="Search...">
                </div>
            </div>
            <div class="table-responsive mt-3">
                <table id="tbluser" class="table align-middle" style="width: 100%">
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th width="280px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($data->chunk(10) as $chunk) --}}
                        {{-- @foreach ($chunk as $key => $user) --}}
                        @foreach ($data as $key => $user)
                            <tr>
                                <td>
                                    {{ ++$i }}
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 cursor-pointer">
                                        <img src="{{ asset('dashboard/assets/images/avatars/avatar-1.png') }}"
                                            class="rounded-circle" width="44" height="44" alt="">
                                        <div class="">
                                            <p class="mb-0">{{ $user['name'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $v)
                                            <label
                                                class="badge {{ $v == 'Admin' ? 'bg-warning' : ($v == 'User' ? 'bg-primary' : 'bg-success') }}">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                        <a href="{{ route('dashboard.users.show', $user->id) }}" class="text-primary mx-1"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <a href="{{ route('dashboard.users.edit', $user->id) }}" class="text-warning mx-1"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        <a href="{{ route('dashboard.users.destroy', $user->id) }}" class="text-danger mx-5"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"
                                            onclick="event.preventDefault();
                                                     if (confirm('Anda yakin ingin menghapus?')) {
                                                         document.getElementById('delete-form-{{ $user->id }}').submit();
                                                     }">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                        <form id="delete-form-{{ $user->id }}"
                                            action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- {!! $data->render() !!} --}}

    @push('style')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <style>
            #tbluser_filter {
                display: none;
            }
        </style>
    @endpush

    @push('script')
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() {
                var table = new DataTable('#tbluser', {
                    "language": {
                        "search": "Search:",
                        "searchPlaceholder": "Search your word..."
                    },
                    columnDefs: [{
                        orderable: false,
                        targets: 4
                    }]
                });

                $('#searchInput').on('keyup', function() {
                    table.search(this.value).draw();
                });
            });
        </script>
    @endpush
@endsection
