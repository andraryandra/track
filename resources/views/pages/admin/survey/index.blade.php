@extends('layouts.dashboard')

@section('admin')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Survey') }}
    </h2>

    @include('layouts.partials.alert-prompt.alert')


    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-lg-3 col-xl-2">
                    @can('survey-create')
                        <a href="{{ route('dashboard.survey.create') }}" class="btn btn-sm btn-primary mb-3 mb-lg-0"
                            data-bs-toggle="tooltip" title="Tambah">
                            <i class="bi bi-plus-square-fill mx-1"></i>
                            Tambah data
                        </a>
                    @endcan
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
                <h5 class="mb-0">Survey Detail</h5>
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
                            <th scope="col">Nama Survey</th>
                            <th scope="col">Link Survey</th>
                            <th scope="col">description</th>
                            <th scope="col">start_date</th>
                            <th scope="col">end_date</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $noCategory = 1;
                        @endphp
                        @forelse ($data_survey as $survey)
                            <tr>
                                <th>{{ $noCategory++ }}</th>
                                <td>{{ $survey->name }}</td>
                                <td>{{ $survey->link_survey }}</td>
                                <td>{{ $survey->description }}</td>
                                <td>{{ \Carbon\Carbon::parse($survey->start_date)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($survey->end_date)->format('d-m-Y') }}</td>
                                <td>
                                    @can('survey-edit')
                                        <a href="{{ route('dashboard.survey.edit', ['id' => $survey->id]) }}"
                                            class="btn btn-info br-info">Edit</a>
                                    @endcan
                                    @can('survey-delete')
                                        <a href="{{ route('dashboard.survey.destroy', $survey->id) }}" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
