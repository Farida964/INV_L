<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/indexinv.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">
    
    <title>Inventory</title>
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

<!-- MENU NAV -->
    <div class="nav-center">
        <div class="nav-tabs">
            <a href="{{ route('inventory.index') }}" class="tab active">Inventory</a>
            <a href="{{ route('output.index') }}" class="tab">Checkout</a>
            <a href="{{ route('output.index') }}" class="tab">Done</a>
            <a href="{{ route('laba.index') }}" class="tab">Profit</a>
            <a href="#" class="tab" onclick="showLogoutPopup()">Log Out</a>
        </div>
    </div>

    <div class="nav-right">
        <h1 class="title">Inventory</h1>
    </div>
</div>



<!-- TABEL DATA -->
     
    <br>
    <a href="{{ route('inventory.create') }}" class="add">Add +</a>

    <table class="inv-table">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama Produk</th>
            <th>Warna</th>
            <th>Ukuran</th>
            <th>Stok</th>
            <th>Masuk</th>
            <th>Keluar</th>
            <th>Harga</th>
            <th>Keuntungan</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($allInventory as $inv)
        <tr>
            <td>{{ $inv->kode }}</td>
            <td>{{ $inv->nama }}</td>
            <td>{{ $inv->warna }}</td>
            <td>{{ $inv->ukuran }}</td>
            <td>{{ $inv->stok }}</td>
            <td>{{ $inv->masuk }}</td>
            <td>{{ $inv->keluar }}</td>
            <td>Rp {{ number_format($inv->harga, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($inv->keuntungan, 0, ',', '.') }}</td>
            <td>{{ $inv->keterangan }}</td>

            <td class="aksi">
                <a href="{{ route('inventory.edit', $inv->id) }}" class="edit">Edit</a>
                <a href="{{ route('inventory.input', $inv->id) }}" class="edit">Input</a>

               <form action="{{ route('inventory.destroy', $inv->id) }}" method="POST" class="delete-form">
    @csrf
    @method('DELETE')
    <button type="button" class="delete btn-delete" data-id="{{ $inv->id }}">
        Hapus
    </button>
</form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>


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