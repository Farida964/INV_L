<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/agenda.css') }}">
    <title>Output</title>
</head>
<body>
 <!-- coba -->
         <h3>Detail Show</h3>
         <a href="{{ route('output.index') }}" class="tombol">Kembali</a>
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
                    <th>Status</th>
                    <th>pembayaran</th>
                </tr>
            </thead>
            <tbody class="table-body">
                <tr>
                   
                    <td>{{ $output-> kode }}</td>
                    <td>{{ $output-> nama }}</td>
                    <td>{{ $output-> warna }}</td>
                    <td>{{ $output-> ukuran }}</td>
                    <td>{{ $output-> stok }}</td>
                    <td>{{ $output-> masuk }}</td>
                    <td>{{ $output-> keluar }}</td>
                    <td>{{ $output-> harga }}</td>
                    <td>{{ $output-> keuntungan }}</td>
                    <td>{{ $output-> keterangan }}</td>
                    <td>{{ $output-> status }}</td>
                    <td>{{ $output-> pembayaran }}</td>
                </tr>
            </tbody>
         </table>
    
</body>
</html>
