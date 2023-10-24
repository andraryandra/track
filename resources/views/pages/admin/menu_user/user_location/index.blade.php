@extends('layouts.dashboard')


@section('admin')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Details User Location</h5>
                {{-- <div class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i>
                    </div>
                    <input type="text" id="searchInput" class="form-control ps-5" placeholder="Search...">
                </div> --}}
            </div>
            <div class="table-responsive mt-3">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Alamat</th>
                            <th width="250px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nolokasi = 1;
                        @endphp
                        @foreach ($lokasi as $key => $user_location)
                            <tr>
                                <td>
                                    {{ $nolokasi++ }}
                                </td>
                                <td>{{ $user_location->user->name }}</td>
                                <td>{{ $user_location->latitude }}</td>
                                <td>{{ $user_location->longitude }}</td>
                                <td>{{ $user_location->address }}</td>
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                        <a href="{{ route('dashboard.user_location.show', $user_location->id) }}"
                                            class="text-primary mx-1" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Lihat">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <a href="{{ route('dashboard.user_location.edit', $user_location->id) }}"
                                            class="text-warning mx-1" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Edit">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        <a href="{{ route('dashboard.user_location.destroy', $user_location->id) }}"
                                            class="text-danger mx-5" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Hapus"
                                            onclick="event.preventDefault();
                                                    if (confirm('Anda yakin ingin menghapus?')) {
                                                        document.getElementById('delete-form-{{ $user_location->id }}').submit();
                                                    }">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                        <form id="delete-form-{{ $user_location->id }}"
                                            action="{{ route('dashboard.user_location.destroy', $user_location->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                    </div>
                                </td>
                            </tr>
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
