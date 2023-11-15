@extends('layouts.dashboard')


@section('admin')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Details Users Admin</h5>
            </div>
            <div class="table-responsive mt-3">
                <table id="example" class="table align-middle" style="width: 100%">
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
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($users as $data_user)
                            @if ($data_user->hasRole('Admin'))
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 cursor-pointer">
                                            <img src="{{ asset('dashboard/assets/images/avatars/avatar-1.png') }}"
                                                class="rounded-circle" width="44" height="44" alt="">
                                            <div class="">
                                                <p class="mb-0">{{ $data_user['name'] }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $data_user->email }}</td>
                                    <td>
                                        @if (!empty($data_user->getRoleNames()))
                                            @foreach ($data_user->getRoleNames() as $v)
                                                <label
                                                    class="badge {{ $v == 'Admin' ? 'bg-warning' : ($v == 'User' ? 'bg-primary' : 'bg-success') }}">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                            <a href="{{ route('dashboard.userAdmin.show', $data_user->id) }}"
                                                class="text-primary mx-1" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Lihat">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <a href="{{ route('dashboard.userAdmin.edit', $data_user->id) }}"
                                                class="text-warning mx-1" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Edit">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>

                                            <a href="{{ route('dashboard.userAdmin.destroy', $data_user->id) }}"
                                                class="text-danger mx-5" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Hapus"
                                                onclick="event.preventDefault();
                                                         if (confirm('Anda yakin ingin menghapus?')) {
                                                             document.getElementById('delete-form-{{ $data_user->id }}').submit();
                                                         }">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                            <form id="delete-form-{{ $data_user->id }}"
                                                action="{{ route('dashboard.userAdmin.destroy', $data_user->id) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
                var table = new DataTable('#example', {
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
