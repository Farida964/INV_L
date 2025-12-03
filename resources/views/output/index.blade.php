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

<!-- POP UP KONFIRMASI -->
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

<!-- MENU NAV -->
    <div class="nav-center">
        <div class="nav-tabs">
            <a href="{{ route('inventory.index') }}" class="tab">Inventory</a>
            <a href="{{ route('output.index') }}" class="tab active">Checkout</a>
            <a href="{{ route('done.index') }}" class="tab">Done</a>
            <a href="{{ route('laba.index') }}" class="tab">Profit</a>
             <a href="#" class="tab" onclick="showLogoutPopup()">Log Out</a>
        </div>
    </div>

    <div class="nav-right">
        <h1 class="title">Checkout</h1>
    </div>
</div>

<!-- popup logout -->
 <div id="logoutPopup" class="popup-overlay" style="display:none;">
    <div class="popup-box">
        <p>Are you sure you want to log out?</p>

        <div class="popup-buttons">
            <button onclick="confirmLogout()" class="yes">Yes</button>
            <button onclick="closeLogoutPopup()" class="no">No</button>
        </div>
    </div>
</div>

<form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display:none;">
    @csrf
</form>


<!-- TABEL DATA -->
     
    <br>
    <a href="{{ route('output.create') }}" class="add">Add +</a>


    <div class="card-container">
    @foreach($allOutput as $out)
    <div class="inv-card">

        <div class="card-row"><span>Kode:</span> {{ $out->kode }}</div>
        <div class="card-row"><span>Nama:</span> {{ $out->nama }}</div>
        <div class="card-row"><span>Warna:</span> {{ $out->warna }}</div>
        <div class="card-row"><span>Ukuran:</span> {{ $out->ukuran }}</div>
        <div class="card-row"><span>Stok:</span> {{ $out->stok }}</div>
        <div class="card-row"><span>Masuk:</span> {{ $out->masuk }}</div>
        <div class="card-row"><span>Keluar:</span> {{ $out->keluar }}</div>
        <div class="card-row"><span>Harga:</span> Rp {{ number_format($out->harga, 0, ',', '.') }}</div>
        <div class="card-row"><span>Keuntungan:</span> Rp {{ number_format($out->keuntungan, 0, ',', '.') }}</div>
        <div class="card-row"><span>Keterangan:</span> {{ $out->keterangan }}</div>
        <div class="card-row"><span>Status:</span> {{ $out->status }}</div>
        <div class="card-row"><span>Pembayaran:</span> {{ $out->pembayaran }}</div>

        <div class="card-actions">
            <a href="{{ route('output.edit', $out->id) }}" class="edit">Edit</a>

            <form action="{{ route('output.destroy', $out->id) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="button" class="delete" data-id="{{ $out->id }}" >
                    Hapus
                </button>
            </form>
        </div>
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

    document.getElementById('confirmYes').addEventListener('click', function() {
        if (selectedForm) selectedForm.submit();
    });

    document.getElementById('confirmNo').addEventListener('click', function() {
        document.getElementById('confirmModal').style.display = "none";
        selectedForm = null;
    });

      function showLogoutPopup() {
        document.getElementById("logoutPopup").style.display = "flex";
    }

    function closeLogoutPopup() {
        document.getElementById("logoutPopup").style.display = "none";
    }

    function confirmLogout() {
        document.getElementById("logoutForm").submit();
    }

    </script>
</body>
</html>