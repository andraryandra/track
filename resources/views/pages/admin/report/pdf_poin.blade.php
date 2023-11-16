<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        @page {
            size: landscape;
            margin: 5mm;
            /* Menentukan margin halaman */
        }

        body {
            margin: 0;
            /* Menghapus margin default body */
            font-size: 14px;
            /* Menambahkan ukuran font default */
        }

        h1,
        p {
            margin-bottom: 5px;
            /* Menambahkan ruang antara elemen-elemen */
        }

        table {
            width: 100%;
            /* table-layout: fixed; */
            /* Memastikan lebar tabel tetap sesuai dengan proporsinya */
            border-collapse: collapse;
            /* Menggabungkan batas sel */
        }

        .table th,
        .table td {
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 8px;
            /* Menambahkan padding pada sel */
            border: 1px solid #ddd;
            /* Menambahkan garis batas sel */
        }

        .table th {
            background-color: #f2f2f2;
            /* Menambahkan latar belakang pada header */
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua.</p>

    <table class="table table-bordered">
        <tr>
            <th style="width: 5%;">NO</th>
            <th style="width: 15%;">NAME</th>
            <th style="width: 15%;">NAME SURVEY</th>
            <th style="width: 10%;">POIN YANG DI DAPAT</th>
            <th style="width: 15%;">TANGGAL POIN</th>
        </tr>
        @php
            $noreport = 1;
        @endphp
        @foreach ($reports as $data_report)
            <tr>
                <td>{{ $noreport++ }}</td>
                <td>{{ $data_report->user->name }}</td>
                <td>{{ $data_report->survey->name }}</td>
                <td>{{ $data_report->survey->poin }}</td>
                <td>{{ \Carbon\Carbon::parse($data_report->click_date)->format('d-m-Y') }}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
