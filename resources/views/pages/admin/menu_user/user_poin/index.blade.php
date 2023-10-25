@extends('layouts.dashboard')


@section('admin')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Details User Poin</h5>
            </div>
            <div class="table-responsive mt-3">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Total Poin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nopoin = 1;
                        @endphp
                        <tr>
                            <td>{{ $nopoin++ }}</td>
                            <td>Gunawa</td>
                            <td>10</td>
                        </tr>
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
                    }
                });

                $('#searchInput').on('keyup', function() {
                    table.search(this.value).draw();
                });
            });
        </script>
    @endpush
@endsection
