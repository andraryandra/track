@extends('layouts.dashboard')

@section('admin')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Visit Survey</h5>
            </div>
            <div class="table-responsive mt-3">
                <table id="example" class="table align-middle" style="width: 100%">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Kunjungan</th>
                            <th scope="col">status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $novisit = 1;
                        @endphp
                        @forelse ($data_survey as $survey)
                            <tr>
                                <td>{{ $novisit++ }}</td>
                                <td>Gunawan</td>
                                <td>6</td>
                                <td>1 klik survey</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('dashboard.survey.index') }}"> Back</a>
                </div>
            </div>
        </div>
    </div>

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
            });

            $('#searchInput').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
    </script>
@endsection
