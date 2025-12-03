<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laba</title>

    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/profit.css') }}">
</head>
<body>

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

    <div class="nav-center">
        <div class="nav-tabs">
            <a href="{{ route('inventory.index') }}" class="tab">Inventory</a>
            <a href="{{ route('output.index') }}" class="tab">Checkout</a>
            <a href="{{ route('done.index') }}" class="tab">Done</a>
            <a href="{{ route('laba.index') }}" class="tab active">Profit</a>
             <a href="#" class="tab" onclick="showLogoutPopup()">Log Out</a>
        </div>
    </div>

    <div class="nav-right">
        <h1 class="title">Profit</h1>
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

<script>
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
