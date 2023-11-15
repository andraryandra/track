@extends('layouts.dashboard')

@section('admin')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Category') }}
    </h2>

    @include('layouts.partials.alert-prompt.alert')

    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-lg-3 col-xl-2">
                    <button class="btn btn-sm btn-primary mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#createModal"
                        title="Tambah">
                        <i class="bi bi-plus-square-fill mx-1"></i>
                        Tambah data
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Category Detail</h5>
            </div>
            <div class="table-responsive mt-3">
                <table id="example" class="table align-middle" style="width: 100%">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">icon</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $noCategory = 1;
                        @endphp
                        @forelse ($Categori as $Categories)
                            <tr>
                                <th>{{ $noCategory++ }}</th>
                                <td>{{ $Categories->name }}</td>
                                <td>{{ $Categories->description }}</td>
                                <td>
                                    <img src="{{ Storage::url($Categories->icon) }}" alt="Icon Kategori" width="40">
                                </td>
                                <td>
                                    @can('users-edit')
                                        <a href="#" class="text-warning mx-1" data-bs-toggle="modal"
                                            data-bs-placement="bottom" title="Edit"
                                            data-bs-target="#staticBackdrop{{ $Categories->id }}">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                    @endcan
                                    @can('users-delete')
                                        <a href="{{ route('dashboard.category.destroy', $Categories->id) }}"
                                            class="text-danger mx-5" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Hapus"
                                            onclick="event.preventDefault();
                                                    if (confirm('Anda yakin ingin menghapus?')) {
                                                        document.getElementById('delete-form-{{ $Categories->id }}').submit();
                                                    }">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                        <form id="delete-form-{{ $Categories->id }}"
                                            action="{{ route('dashboard.category.destroy', $Categories->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal tambah data-->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createModalLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.category.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="my-2">
                            <label for="name" class="col-form-label">Nama Kategori:</label>
                            <input class="form-control" name="name" type="text" id="name"
                                value="{{ old('name') }}" placeholder="Masukkan Nama kategori survey" required>
                        </div>
                        <div class="my-2">
                            <label for="icon" class="col-form-label">Gambar Kategori:</label>
                            <input class="form-control" name="icon" type="file" id="icon" accept="image/*">
                        </div>
                        <div class="my-2">
                            <label for="description" class="col-form-label">Deskripsi Kategori:</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Masukkan deskripsi kategori" required>{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary bg-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal edit data-->
    @foreach ($Categori as $Categories)
        <div class="modal fade" id="staticBackdrop{{ $Categories->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {{-- <form action="{{ route('dashboard.category.store') }}" method="POST" enctype="multipart/form-data"> --}}
                    <form action="{{ route('dashboard.category.update', $Categories->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="my-2">
                                <label for="name" class="col-form-label">Nama Kategori:</label>
                                <input class="form-control" name="name" type="text" id="name"
                                    value="{{ $Categories->name }}" placeholder="Masukkan Nama kategori survey" required>
                            </div>
                            <div class="my-2">
                                <label for="icon" class="col-form-label">Gambar Kategori:</label>
                                <input class="form-control" name="icon" type="file" id="icon"
                                    accept="image/*">
                            </div>
                            <div class="my-2">
                                <label for="description" class="col-form-label">Deskripsi Kategori:</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Masukkan deskripsi kategori"
                                    required>{{ $Categories->description }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary bg-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

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
