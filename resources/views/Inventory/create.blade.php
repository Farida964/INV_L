<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Inventory - Toko Hijab Lamierre</title>
    <link rel="stylesheet" href="{{ asset('assets/css/createinv.css') }}">
</head>
<body>
    <!-- FORM WRAPPER -->
    <section class="form-wrapper">

        <h3 class="form-title">TAMBAH PRODUK</h3>

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

        <form action="{{ route('inventory.store') }}" method="POST" class="form-box">
            @csrf

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
               <input type="number" name="stok" data-original="{{ old('stok', 0) }}" value="{{ old('stok', 0) }}">
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
                <textarea name="keterangan" placeholder="Tambahkan keterangan">{{ old('keterangan') }}</textarea>
            </div>

            <!-- BUTTONS -->
            <div class="btn-group">
                <a href="{{ route('inventory.index') }}" class="btn cancel">Cancel</a>
                <button type="submit" class="btn add">Add</button>
            </div>
        </form>

    </section>

   <script>
function hitungStok() {
    let stokAwal = parseInt(document.querySelector("[name='stok']").dataset.original || 0);
    let masuk = parseInt(document.querySelector("[name='masuk']").value || 0);
    let keluar = parseInt(document.querySelector("[name='keluar']").value || 0);

    document.querySelector("[name='stok']").value = stokAwal + masuk - keluar;
}

document.addEventListener("input", hitungStok);
</script>

</body>
</html>
