<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('assets/css/indexout.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">
    
    <title>On Progress</title>
</head>
<body>
  <!-- Modal Konfirmasi -->
<div id="confirmModal" class="modal">
    <div class="modal-content">
        <p>Yakin mau hapus?</p>
        <div class="modal-buttons">
            <button id="confirmYes" class="yes">Ya</button>
            <button id="confirmNo" class="no">Tidak</button>
        </div>
    </div>
</div>
   <div class="lamierre-navbar">
    <div class="nav-left">
        <h1 class="brand">Lamierrè <span>Hijab</span></h1>
    </div>

    <div class="nav-center">
        <div class="nav-tabs">
            <a href="{{ route('inventory.index') }}" class="tab">Inventory</a>
            <a href="{{ route('output.index') }}" class="tab active">On Progress</a>
            <a href="{{ route('done.index') }}" class="tab">Done</a>
            <a href="{{ route('laba.index') }}" class="tab">Laba</a>
        </div>
    </div>

    <div class="nav-right">
        <h1 class="title">Output</h1>
    </div>
</div>

    <!-- card agenda -->
    <br>
    <a href="{{ route('output.index') }}" class="back">Back</a>
    <a href="{{ route('output.create') }}" class="add">Add +</a>

    <div class="container_card">
        @foreach($allOutput as $key => $out)
            <div class="card-item">
                <h2>{{ $out->nama }}</h2>
                <p>{{ $out->kode }}</p>
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
         let selectedForm = null;

    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function() {
            selectedForm = this.closest('form');
            document.getElementById('confirmModal').style.display = "flex";
        });
    });

    document.getElementById('confirmYes').addEventListener('click', function() {
        if (selectedForm) selectedForm.submit();
    });

    document.getElementById('confirmNo').addEventListener('click', function() {
        document.getElementById('confirmModal').style.display = "none";
        selectedForm = null;
    });
    </script>
</body>
</html>