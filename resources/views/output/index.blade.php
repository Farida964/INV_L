<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aspirasi.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    
    <title>Output</title>
</head>
<body>
  
    <!-- card agenda -->
    <br>
    <a href="{{ route('output.index') }}" class="back">Back</a>
    <a href="{{ route('output.create') }}" class="add">Add +</a>

    <div class="container_card">
        @foreach($allOutput as $key => $out)
            <div class="card-item">
                <h2>{{ $out->nama }}</h2>
                <p class="caption">✍️ : {{ $out->kode }}</p>
                <p>{{ $out->warna }}</p>
                <p>{{ $out->ukuran }}</p>
                <p>{{ $out->stok }}</p>
                <p>{{ $out->masuk }}</p>
                <p>{{ $out->keluar }}</p>
                <p>{{ $out->ukuran }}</p>
                <p>{{ $out->harga }}</p>
                <p>{{ $out->keuntungan }}</p>
                <p>{{ $out->keterangan }}</p>
                <p>{{ $out->status }}</p>
                <p>{{ $out->pembayaran }}</p>
                <p>Uploaded: {{ $out->created_at }}</p>
                <p>Updated: {{ $out->updated_at }}</p>
                <form action="{{ route('output.destroy', $out->id) }}" method="POST">
                    @auth
                        <a href="{{ route('output.edit', $out->id) }}" class="edit">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">Hapus</button>
                    @endauth
                </form>
            </div>
        @endforeach
    </div>

     <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logo = document.getElementById('profileLogo');
            const dropdown = document.getElementById('profileDropdown');
            if (logo) {
                document.addEventListener('click', function(e) {
                    if (logo.contains(e.target)) {
                        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
                    } else if (!dropdown.contains(e.target)) {
                        dropdown.style.display = 'none';
                    }
                });
            }
        });
    </script>
</body>
</html>