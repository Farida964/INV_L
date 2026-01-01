<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/indexdone.css') }}">
    
    <title>Done</title>
</head>
<body>



<!-- popup logout -->
 <div id="logoutPopup" class="popup-overlay" style="display:none;">
    <div class="popup-box">
        <h2>Wait!</h2>
        <p>Are you sure you want to log out?</p>
        <p>Make your choice</p>

        <div class="popup-buttons">
            <button onclick="confirmLogout()" class="yes">Yes</button>
            <button onclick="closeLogoutPopup()" class="no">No</button>
        </div>
    </div>
</div>

<form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display:none;">
    @csrf
</form>


<div class="inventory-header">

    <!-- Brand -->
    <div class="header-brand">
        <h1>Lamierrè <span>Hijab</span></h1>
    </div>

    <!-- Nav Tabs -->
    <div class="header-tabs">
        <a href="{{ route('inventory.index') }}" class="tab">Inventory</a>
        <a href="{{ route('output.index') }}" class="tab">Checkout</a>
        <a href="{{ route('done.index') }}" class="tab active">Done</a>
        <a href="{{ route('laba.index') }}" class="tab">Profit</a>
        <a href="#" class="tab logout" onclick="showLogoutPopup()">Logout</a>
    </div>

    <!-- Title -->
    <div class="header-title">
        <h2>Inventory</h2>
        <p>Manage your inventory, stay focused and keep the spirit up</p>
    </div>

</div>


<!-- CONTENT -->


<div class="inv-container">
    @foreach($allDone as $done)
        <div class="inv-card">
            <div class="card-row"><span>Kode:</span> {{ $done->kode }}</div>
            <div class="card-row"><span>Nama:</span> {{ $done->nama }}</div>
            <div class="card-row"><span>Warna:</span> {{ $done->warna }}</div>
            <div class="card-row"><span>Ukuran:</span> {{ $done->ukuran }}</div>
            <div class="card-row"><span>Stok:</span> {{ $done->stok }}</div>
            <div class="card-row"><span>Masuk:</span> {{ $done->masuk }}</div>
            <div class="card-row"><span>Keluar:</span> {{ $done->keluar }}</div>
            <div class="card-row"><span>Harga:</span> {{ $done->harga }}</div>
            <div class="card-row"><span>Keuntungan:</span> {{ $done->keuntungan }}</div>
            <div class="card-row"><span>Keterangan:</span> {{ $done->keterangan }}</div>
            <div class="card-row"><span>Pembayaran:</span> {{ $done->pembayaran }}</div>
            <div class="card-row"><span>Status:</span> {{ $done->status }}</div>
            <div class="card-row"><span>Uploaded:</span> {{ $done->created_at }}</div>
            <div class="card-row"><span>Updated:</span> {{ $done->updated_at }}</div>
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