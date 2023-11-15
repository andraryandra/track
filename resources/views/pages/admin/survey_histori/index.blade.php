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
            </div>
            <div class="table-responsive mt-3">
                <table id="example" class="table align-middle" style="width: 100%">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name Survey</th>
                            <th scope="col">Name User</th>
                            <th scope="col">Link</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Poin</th>
                            <th scope="col">status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nohistori = 1;
                        @endphp
                        @forelse ($histori as $data_SurveyHistori)
                            <tr>
                                <td>{{ $nohistori++ }}</td>
                                <td>{{ $data_SurveyHistori->survey->name }}</td>
                                <td>{{ $data_SurveyHistori->user->name }}</td>
                                <td>{{ $data_SurveyHistori->survey->link_survey }}</td>
                                <td>{{ \Carbon\Carbon::parse($data_SurveyHistori->click_date)->format('d-m-Y') }}</td>
                                <td>{{ $data_SurveyHistori->survey->poin }}</td>
                                <td><span class="badge badge-success">Selesai</span></td>
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
