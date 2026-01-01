<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inventory</title>
    <link rel="stylesheet" href="{{ asset('assets/css/createinv.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">

</head>
<body>

<div class="inventory-header">

    <!-- Brand -->
    <div class="header-brand">
        <h1>Lamierrè <span>Hijab</span></h1>
    </div>

    <!-- Nav Tabs -->
    <div class="header-tabs">
      <p>Edit Data Produk</p>
    </div>

    <!-- Title -->
    <div class="header-title">
        <h2>Inventory</h2>
        <p>Manage your inventory, stay focused and keep the spirit up</p>
    </div>

</div>


     <!-- FORM WRAPPER -->
    <section class="form-wrapper">


        {{-- Error Message --}}
        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form action="{{ route('inventory.update', $inventory->id) }}" method="POST" class="form-box">
        @csrf
        @method('PUT')

      <!-- LEFT LABEL RIGHT INPUT -->
            <div class="row">
                <label>Kode Produk :</label>
                <input type="text" name="kode" value="{{ old('kode', $inventory->kode) }}" placeholder="HJ-01">
            </div>

            <div class="row">
                <label>Nama Produk :</label>
                <input type="text" name="nama" value="{{ old('nama', $inventory->nama) }}" placeholder="Pashmina Ceruty">
            </div>

            <div class="row">
                <label>Warna :</label>
                <input type="text" name="warna" value="{{ old('warna', $inventory->warna) }}" placeholder="Dusty Pink">
            </div>

            <div class="row">
                <label>Ukuran :</label>
                <input type="text" name="ukuran" value="{{ old('ukuran', $inventory->ukuran) }}" placeholder="All Size">
            </div>

            <div class="row">
                <label>Stok :</label>
                <input type="number" name="stok" value="{{ old('stok', $inventory->stok) }}" placeholder="0" readonly>
            </div>

            <div class="row">
                <label>Produk Masuk :</label>
                <input type="number" name="masuk" value="{{ old('masuk', $inventory->masuk) }}" placeholder="0" readonly>
            </div>

            <div class="row">
                <label>Produk Keluar :</label>
                <input type="number" name="keluar" value="{{ old('keluar', $inventory->keluar) }}" placeholder="0" readonly>
            </div>

            <div class="row">
                <label>Harga Produk :</label>
                <input type="number" name="harga" value="{{ old('harga', $inventory->harga) }}" placeholder="Rp">
            </div>

            <div class="row">
                <label>Keuntungan :</label>
                <input type="number" name="keuntungan" value="{{ old('keuntungan', $inventory->keuntungan) }}" placeholder="Profit per item">
            </div>

            <div class="row">
                <label>Keterangan :</label>
                <textarea name="keterangan" placeholder="Tambahkan keterangan">{{ old('keterangan', $inventory->keterangan) }}</textarea>
            </div>


      <!-- BUTTONS -->
            <div class="btn-group">
                <a href="{{ route('inventory.index') }}" class="btn cancel">Cancel</a>
                <button type="submit" class="btn add">Save</button>
            </div>
    </form>

     </section>
</body>
</html>
