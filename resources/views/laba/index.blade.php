<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('assets/css/indexout.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">
    
    <title>Laba</title>
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
            <a href="{{ route('output.index') }}" class="tab">On Progress</a>
            <a href="{{ route('done.index') }}" class="tab">Done</a>
            <a href="{{ route('laba.index') }}" class="tab active">Laba</a>
        </div>
    </div>

    <div class="nav-right">
        <h1 class="title">Laba</h1>
    </div>
</div>

    <!-- card agenda -->
    <br>
    <a href="{{ route('laba.index') }}" class="back">Back</a>
    <a href="{{ route('laba.create') }}" class="add">Add +</a>

    <div class="container_card">
        @foreach($allLaba as $key => $laba)
            <div class="card-item">
                <h2>{{ $laba->nama }}</h2>
                <p>{{ $laba->kode }}</p>
                <p>{{ $laba->warna }}</p>
                <p>{{ $laba->ukuran }}</p>
                <p>{{ $laba->stok }}</p>
                <p>{{ $laba->masuk }}</p>
                <p>{{ $laba->keluar }}</p>
                <p>{{ $laba->ukuran }}</p>
                <p>{{ $laba->harga }}</p>
                <p>{{ $laba->keuntungan }}</p>
                <p>{{ $laba->keterangan }}</p>
                <p>{{ $laba->status }}</p>
                <p>{{ $laba->pembayaran }}</p>
                <p>Uploaded: {{ $laba->created_at }}</p>
                <p>Updated: {{ $laba->updated_at }}</p>
                <form action="{{ route('laba.destroy', $laba->id) }}" method="POST">
                    @auth
                        <a href="{{ route('laba.edit', $laba->id) }}" class="edit">Edit</a>
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