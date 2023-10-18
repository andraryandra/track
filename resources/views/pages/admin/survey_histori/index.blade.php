@extends('layouts.dashboard')

@section('admin')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Survey History') }}
    </h2>

    @include('layouts.partials.alert-prompt.alert')


    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Survey History</h5>
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
                            <th scope="col">No</th>
                            <th scope="col">Name Survey</th>
                            <th scope="col">Name User</th>
                            <th scope="col">question</th>
                            <th scope="col">date</th>
                            <th scope="col">Poin</th>
                            <th scope="col">Description</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Hepermart</td>
                            <td>Gunawan</td>
                            <td>Banyak Pertanyaan</td>
                            <td>18-10-2023</td>
                            <td>10</td>
                            <td>banyak deskripsi singkat</td>
                            <td>
                                <a href="#" class="text-primary mx-1" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Lihat">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection