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
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Survey Detail</h5>
            </div>
            <div class="table-responsive mt-3">
                <table id="example" class="table align-middle" style="width: 100%">
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
                                <td>{{ Str::limit($survey->link_survey, 32) }}</td>
                                <td>{{ $survey->description }}</td>
                                <td>{{ \Carbon\Carbon::parse($survey->start_date)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($survey->end_date)->format('d-m-Y') }}</td>
                                <td>
                                    @can('survey-list')
                                        <a href="{{ route('dashboard.survey.show', ['id' => $survey->id]) }}"
                                            class="btn btn-success br-info">Show</a>
                                    @endcan
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
                                <td colspan="7" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('style')
    @endpush

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <style>
        #tbluser_filter {
            display: none;
        }
    </style>

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
@endsection
