<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="{{ asset('assets/css/createinv.css') }}">
</head>
<body>
<section class="form-wrapper">
    <form action="{{ route('inventory.storeInput', $inventory->id) }}" method="POST" class="form-box">
    @csrf

    <!-- FIELD TIDAK BISA DIUBAH -->
     <div class="row">
        <label>KODE PRODUK :</label>
       <input type="text" value="{{ $inventory->kode }}" readonly>
    </div>

    <div class="row">
        <label>NAMA PRODUK :</label>
           <input type="text" value="{{ $inventory->nama }}" readonly>
    </div>

    <div class="row">
        <label>WARNA :</label>
            <input type="text" value="{{ $inventory->warna }}" readonly>
    </div>

    <div class="row">
        <label>UKURAN :</label>
            <input type="text" value="{{ $inventory->ukuran }}" readonly>
    </div>

    <div class="row">
        <label>HARGA :</label>
            <input type="text" value="{{ $inventory->harga }}" readonly>
    </div>

    <div class="row">
        <label>KEUNTUNGAN :</label>
            <input type="text" value="{{ $inventory->keuntungan }}" readonly>
    </div>

     <div class="row">
        <label>KETERANGAN :</label>
        <input type="text" value="{{ $inventory->keterangan }}" readonly>
    </div>

    

    <!-- FIELD INPUT -->

    <div class="row">
        <label>MASUK :</label>
        <input type="number" name="masuk" value="0" min="0">
    </div>

     <div class="row">
        <label>KELUAR :</label>
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
