@extends('layouts.dashboard')

@section('admin')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Report User Poin') }}
    </h2>

    @include('layouts.partials.alert-prompt.alert')
    <div class="card">
        <div class="card-body">
            <a href="javascript:;" class="btn btn-light mb-3 mb-lg-0"><i class="bi bi-download"></i>PDF</a>
            <a href="javascript:;" class="btn btn-light mb-3 mb-lg-0"><i class="bi bi-download"></i>Exel</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive mt-3">
                <table id="example" class="table align-middle" style="width: 100%">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Name Survey</th>
                            <th scope="col">Poin yang di dapat</th>
                            <th scope="col">Tanggal Poin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $noreport = 1;
                        @endphp
                        @forelse ($historiSurvey as $data_historiSurvey)
                            <tr>
                                <td>{{ $noreport++ }}</td>
                                <td>{{ $data_historiSurvey->user->name }}</td>
                                <td>{{ $data_historiSurvey->survey->name }}</td>
                                <td>{{ $data_historiSurvey->survey->poin }}</td>
                                <td>{{ \Carbon\Carbon::parse($data_historiSurvey->click_date)->format('d-m-Y') }}</td>
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
