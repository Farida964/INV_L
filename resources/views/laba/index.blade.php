<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laba</title>

    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">
    <style>
        table {
            width: 95%;
            margin: 30px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #999;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background: #eee;
        }
    </style>
</head>
<body>

<div class="lamierre-navbar">
    <div class="nav-left">
        <h1 class="brand">Lamierrè <span>Hijab</span></h1>
    </div>

    <div class="nav-center">
        <div class="nav-tabs">
            <a href="{{ route('inventory.index') }}" class="tab">Inventory</a>
            <a href="{{ route('output.index') }}" class="tab">On Progress</a>
            <a href="{{ route('done.index') }}" class="tab">Done</a>
            <a href="{{ route('laba.index') }}" class="tab active">Laba</a>
        </div>
    </div>

    <div class="nav-right">
        <h1 class="title">Laba</h1>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Produk</th>
            <th>Qty</th>
            <th>Atas Nama</th>
            <th>Total Pembayaran</th>
            <th>Keuntungan</th>
            <th>Total Keuntungan</th>
        </tr>
    </thead>

    <tbody>
@foreach($data as $item)
    <tr>
        <td>{{ $item->created_at->format('d-m-Y') }}</td>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->keluar }}</td>
        <td>{{ $item->keterangan }}</td>

        <td>Rp {{ number_format((int)$item->pembayaran, 0, ',', '.') }}</td>
        <td>Rp {{ number_format((int)$item->keuntungan, 0, ',', '.') }}</td>
        <td>Rp {{ number_format((int)$item->running_total, 0, ',', '.') }}</td>
    </tr>
@endforeach
</tbody>

</table>

</body>
</html>
