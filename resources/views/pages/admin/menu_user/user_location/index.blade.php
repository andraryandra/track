@extends('layouts.dashboard')


@section('admin')
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
@endsection
