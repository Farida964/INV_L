<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/agenda.css') }}">
    <title>Invent</title>
</head>
<body>
 <!-- coba -->
         <h3>Detail Show</h3>
         <a href="{{ route('inventory.index') }}" class="tombol">Kembali</a>
         <table class="table">
            <thead class="table-header">
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Warna</th>
                    <th>Ukuran</th>
                    <th>Stok</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Harga</th>
                    <th>Keuntungan</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody class="table-body">
                <tr>
                   
                    <td>{{ $inventory-> kode }}</td>
                    <td>{{ $inventory-> nama }}</td>
                    <td>{{ $inventory-> warna }}</td>
                    <td>{{ $inventory-> ukuran }}</td>
                    <td>{{ $inventory-> stok }}</td>
                    <td>{{ $inventory-> masuk }}</td>
                    <td>{{ $inventory-> keluar }}</td>
                    <td>{{ $inventory-> harga }}</td>
                    <td>{{ $inventory-> keuntungan }}</td>
                    <td>{{ $inventory-> keterangan }}</td>
                </tr>
            </tbody>
         </table>
    
</body>
</html>
