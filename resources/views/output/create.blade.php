<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Inventory</title>
</head>
<body>

  <h3>Form Output Data Inventory</h3>

  {{-- Tampilkan pesan error jika ada --}}
  @if ($errors->any())
      <div style="color:red;">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
   <a href="{{ route('output.index') }}" class="back">Back</a>

  <form action="{{ route('output.store') }}" method="POST">
      @csrf
      <div class="form_agd">

          <label for="kode">Kode:</label>
          <input type="text" name="kode" id="kode" value="{{ old('kode') }}" placeholder="Masukkan kode">

          <label for="nama">Nama:</label>
          <input type="text" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Nama barang">

          <label for="warna">Warna:</label>
          <input type="text" name="warna" id="warna" value="{{ old('warna') }}" placeholder="Warna">

          <label for="ukuran">Ukuran:</label>
          <input type="text" name="ukuran" id="ukuran" value="{{ old('ukuran') }}" placeholder="Ukuran">

          <label for="stok">Stok:</label>
          <input type="number" name="stok" id="stok" value="{{ old('stok') }}" placeholder="Jumlah stok">

          <label for="masuk">Masuk:</label>
          <input type="number" name="masuk" id="masuk" value="{{ old('masuk') }}" placeholder="Jumlah masuk">

          <label for="keluar">Keluar:</label>
          <input type="number" name="keluar" id="keluar" value="{{ old('keluar') }}" placeholder="Jumlah keluar">

          <label for="harga">Harga:</label>
          <input type="number" name="harga" id="harga" value="{{ old('harga') }}" placeholder="Harga satuan">

          <label for="keuntungan">Keuntungan:</label>
          <input type="number" name="keuntungan" id="keuntungan" value="{{ old('keuntungan') }}" placeholder="Keuntungan per item">

          <label for="keterangan">Keterangan:</label>
          <textarea name="keterangan" id="keterangan" placeholder="Tambahkan keterangan">{{ old('keterangan') }}</textarea>

           <label for="keterangan">Status:</label>
          <textarea name="keterangan" id="keterangan" placeholder="Tambahkan keterangan">{{ old('keterangan') }}</textarea>

           <label for="keterangan">Pembayaran:</label>
          <textarea name="keterangan" id="keterangan" placeholder="Tambahkan keterangan">{{ old('keterangan') }}</textarea>
          

      </div>

      <button type="submit" class="add">Submit</button>
  </form>

</body>
</html>
