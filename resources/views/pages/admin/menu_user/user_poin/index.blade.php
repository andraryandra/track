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
                            <th width="60px">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Total Poin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nopoin = 1;
                            $userPoinSum = [];

                            foreach ($poins as $UserPoin) {
                                $userId = $UserPoin->user->id;

                                // Jika user_id belum ada dalam array $userPoinSum, tambahkan dengan nilai awal poin
                                if (!isset($userPoinSum[$userId])) {
                                    $userPoinSum[$userId] = [
                                        'name' => $UserPoin->user->name,
                                        'email' => $UserPoin->user->email,
                                        'total_poin' => $UserPoin->poin,
                                    ];
                                } else {
                                    // Jika user_id sudah ada, tambahkan poin ke total_poin
                                    $userPoinSum[$userId]['total_poin'] += $UserPoin->poin;
                                }
                            }
                        @endphp

                        @foreach ($userPoinSum as $userId => $userData)
                            <tr>
                                <td class="text-center">{{ $nopoin++ }}</td>
                                <td>{{ $userData['name'] }}</td>
                                <td>{{ $userData['email'] }}</td>
                                <td>{{ $userData['total_poin'] }}</td>
                            </tr>
                        @endforeach

                        @if (empty($userPoinSum))
                            <tr>
                                <td colspan="3" class="text-center">Data Kosong</td>
                            </tr>
                        @endif

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
