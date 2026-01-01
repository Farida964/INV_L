<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Output</title>
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
      <p>Edit Data Pembelian Produk</p>
    </div>

    <!-- Title -->
    <div class="header-title">
        <h2>Inventory</h2>
        <p>Manage your inventory, stay focused and keep the spirit up</p>
    </div>

</div>


    <!-- FORM WRAPPER -->
    <section class="form-wrapper">

        <h3 class="form-title">EDIT PRODUK ON PROGRESS</h3>

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

        <form action="{{ route('output.update', $output->id) }}" method="POST" class="form-box">
            @csrf
            @method('PUT')

            <!-- LEFT LABEL RIGHT INPUT -->

            <div class="row">
                <label>Kode Produk :</label>
                <input type="text" name="kode" value="{{ old('kode', $output->kode) }}">
            </div>

            <div class="row">
                <label>Nama Produk :</label>
                <input type="text" name="nama" value="{{ old('nama', $output->nama) }}">
            </div>

            <div class="row">
                <label>Warna :</label>
                <input type="text" name="warna" value="{{ old('warna', $output->warna) }}">
            </div>

            <div class="row">
                <label>Ukuran :</label>
                <input type="text" name="ukuran" value="{{ old('ukuran', $output->ukuran) }}">
            </div>

            <div class="row">
                <label>Produk Masuk :</label>
                <input type="number" name="masuk" value="{{ old('masuk', $output->masuk) }}">
            </div>

            <div class="row">
                <label>Produk Keluar :</label>
                <input type="number" name="keluar" value="{{ old('keluar', $output->keluar) }}">
            </div>

            <div class="row">
                <label>Harga Produk :</label>
                <input type="number" name="harga" value="{{ old('harga', $output->harga) }}">
            </div>

            <div class="row">
                <label>Keuntungan :</label>
                <input type="number" name="keuntungan" value="{{ old('keuntungan', $output->keuntungan) }}">
            </div>

            <div class="row">
                <label>Keterangan :</label>
                <textarea name="keterangan">{{ old('keterangan', $output->keterangan) }}</textarea>
            </div>

            <div class="row">
                <label>Status :</label>
                <select name="status" id="status">
                    <option value="">Pilih status</option>

                    <option value="list" 
                        {{ old('status', $output->status) == 'list' ? 'selected' : '' }}>
                        List
                    </option>

                    <option value="packing" 
                        {{ old('status', $output->status) == 'packing' ? 'selected' : '' }}>
                        Packing
                    </option>

                    <option value="delivering" 
                        {{ old('status', $output->status) == 'delivering' ? 'selected' : '' }}>
                        Delivering
                    </option>

                    <option value="arrive" 
                        {{ old('status', $output->status) == 'arrive' ? 'selected' : '' }}>
                        Arrive
                    </option>
                </select>
            </div>

            <div class="row">
                <label>Pembayaran :</label>
                <select name="pembayaran" id="pembayaran">
                    <option value="">Pilih pembayaran</option>

                    <option value="tunai" 
                        {{ old('pembayaran', $output->pembayaran) == 'tunai' ? 'selected' : '' }}>
                        Tunai
                    </option>

                    <option value="cod" 
                        {{ old('pembayaran', $output->pembayaran) == 'cod' ? 'selected' : '' }}>
                        COD
                    </option>

                    <option value="transfer" 
                        {{ old('pembayaran', $output->pembayaran) == 'transfer' ? 'selected' : '' }}>
                        Transfer
                    </option>
                </select>
            </div>

            <!-- BUTTONS -->
            <div class="btn-group">
                <a href="{{ route('output.index') }}" class="btn cancel">Cancel</a>
                <button type="submit" class="btn add">Update</button>
            </div>
        </form>

    </section>

</body>
</html>
