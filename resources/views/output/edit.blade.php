<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Output</title>
    <link rel="stylesheet" href="{{ asset('assets/css/createinv.css') }}">
</head>
<body>
    <section class="form-wrapper">
       <h3 class="form-title">EDIT OUTPUT</h3>

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
                <label>KODE PRODUK :</label>
                <input type="text" name="kode" value="{{ old('kode') }}" placeholder="HJ-01">
            </div>

            <div class="row">
                <label>NAMA PRODUK :</label>
                <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Pashmina Ceruty">
            </div>

            <div class="row">
                <label>WARNA :</label>
                <input type="text" name="warna" value="{{ old('warna') }}" placeholder="Dusty Pink">
            </div>

            <div class="row">
                <label>UKURAN :</label>
                <input type="text" name="ukuran" value="{{ old('ukuran') }}" placeholder="All Size">
            </div>

            <div class="row">
                <label>STOK :</label>
                <input type="number" name="stok" value="{{ old('stok') }}" placeholder="0">
            </div>

            <div class="row">
                <label>PRODUK MASUK :</label>
                <input type="number" name="masuk" value="{{ old('masuk') }}" placeholder="0">
            </div>

            <div class="row">
                <label>PRODUK KELUAR :</label>
                <input type="number" name="keluar" value="{{ old('keluar') }}" placeholder="0">
            </div>

            <div class="row">
                <label>HARGA PRODUK :</label>
                <input type="number" name="harga" value="{{ old('harga') }}" placeholder="Rp">
            </div>

            <div class="row">
                <label>KEUNTUNGAN :</label>
                <input type="number" name="keuntungan" value="{{ old('keuntungan') }}" placeholder="Profit per item">
            </div>

            <div class="row">
                <label>KETERANGAN :</label>
                <textarea name="keterangan" placeholder="Tambahkan keterangan">{{ old('keterangan', $output->keterangan) }}</textarea>
            </div>

             <div class="row">
                <label>STATUS :</label>
                <textarea name="keterangan" placeholder="Tambahkan keterangan">{{ old('keterangan', $output->keterangan) }}</textarea>
            </div>

             <div class="row">
                <label>PEMBAYARAN :</label>
                <textarea name="keterangan" placeholder="Tambahkan keterangan">{{ old('keterangan', $output->keterangan) }}</textarea>
            </div>

             <div class="row">
                <label>KETERANGAN :</label>
                <textarea name="keterangan" placeholder="Tambahkan keterangan">{{ old('keterangan', $output->keterangan) }}</textarea>
            </div>

        

        <div class="btn-group">
                <a href="{{ route('output.index') }}" class="btn cancel">Batal</a>
                <button type="submit" class="btn add">Tambah</button>
            </div>
    </form>

    </section>
</body>
</html>
