<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Output</title>
</head>
<body>
    <h3>Edit Output</h3>

    <form action="{{ route('output.update', $output->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form_inv">
            <label for="kode">Kode:</label>
            <input type="text" name="kode" id="kode" value="{{ old('kode', $output->kode) }}" placeholder="Masukkan kode">

            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $output->nama) }}" placeholder="Nama barang">

            <label for="warna">Warna:</label>
            <input type="text" name="warna" id="warna" value="{{ old('warna', $output->warna) }}" placeholder="Warna">

            <label for="ukuran">Ukuran:</label>
            <input type="text" name="ukuran" id="ukuran" value="{{ old('ukuran', $output->ukuran) }}" placeholder="Ukuran">

            <label for="stok">Stok:</label>
            <input type="number" name="stok" id="stok" value="{{ old('stok', $output->stok) }}" placeholder="Jumlah stok">

            <label for="masuk">Masuk:</label>
            <input type="number" name="masuk" id="masuk" value="{{ old('masuk', $output->masuk) }}" placeholder="Jumlah masuk">

            <label for="keluar">Keluar:</label>
            <input type="number" name="keluar" id="keluar" value="{{ old('keluar', $output->keluar) }}" placeholder="Jumlah keluar">

            <label for="harga">Harga:</label>
            <input type="number" name="harga" id="harga" value="{{ old('harga', $output->harga) }}" placeholder="Harga satuan">

            <label for="keuntungan">Keuntungan:</label>
            <input type="number" name="keuntungan" id="keuntungan" value="{{ old('keuntungan', $output->keuntungan) }}" placeholder="Keuntungan per item">

            <label for="keterangan">Keterangan:</label>
            <textarea name="keterangan" id="keterangan" placeholder="Tambahkan keterangan">{{ old('keterangan', $output->keterangan) }}</textarea>

            <label for="keterangan">status:</label>
            <textarea name="keterangan" id="keterangan" placeholder="Tambahkan status">{{ old('keterangan', $output->keterangan) }}</textarea>

            <label for="keterangan">pembayaran:</label>
            <textarea name="keterangan" id="keterangan" placeholder="Tambahkan pembayaran">{{ old('keterangan', $output->keterangan) }}</textarea>
        </div>

        <button type="submit" class="add">Update</button>
    </form>
</body>
</html>
