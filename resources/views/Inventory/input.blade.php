<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
      <p>Input Stok Masuk dan Keluar Produk</p>
    </div>

    <!-- Title -->
    <div class="header-title">
        <h2>Inventory</h2>
        <p>Manage your inventory, stay focused and keep the spirit up</p>
    </div>

</div>


<section class="form-wrapper">
    <form action="{{ route('inventory.storeInput', $inventory->id) }}" method="POST" class="form-box">
    @csrf

    <!-- FIELD TIDAK BISA DIUBAH -->
     <div class="row">
        <label>Kode Produk :</label>
       <input type="text" value="{{ $inventory->kode }}" readonly>
    </div>

    <div class="row">
        <label>Nama Produk :</label>
           <input type="text" value="{{ $inventory->nama }}" readonly>
    </div>

    <div class="row">
        <label>Warna :</label>
            <input type="text" value="{{ $inventory->warna }}" readonly>
    </div>

    <div class="row">
        <label>Ukuran :</label>
            <input type="text" value="{{ $inventory->ukuran }}" readonly>
    </div>

    <div class="row">
        <label>Harga Produk :</label>
            <input type="text" value="{{ $inventory->harga }}" readonly>
    </div>

    <div class="row">
        <label>Keuntungan :</label>
            <input type="text" value="{{ $inventory->keuntungan }}" readonly>
    </div>

     <div class="row">
        <label>Keterangan :</label>
        <input type="text" value="{{ $inventory->keterangan }}" readonly>
    </div>

    

    <!-- FIELD INPUT -->

    <div class="row">
        <label>Produk Masuk :</label>
        <input type="number" name="masuk" value="0" min="0">
    </div>

     <div class="row">
        <label>Produk Keluar :</label>
        <input type="number" name="keluar" value="0" min="0">
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
