<form action="{{ route('inventory.storeInput', $inventory->id) }}" method="POST">
    @csrf

    <!-- FIELD TIDAK BISA DIUBAH -->
    <input type="text" value="{{ $inventory->kode }}" readonly>
    <input type="text" value="{{ $inventory->nama }}" readonly>
    <input type="text" value="{{ $inventory->warna }}" readonly>
    <input type="text" value="{{ $inventory->ukuran }}" readonly>
    <input type="text" value="{{ $inventory->harga }}" readonly>
    <input type="text" value="{{ $inventory->keuntungan }}" readonly>
    <input type="text" value="{{ $inventory->keterangan }}" readonly>

    <!-- FIELD INPUT -->
    <label>Masuk</label>
    <input type="number" name="masuk" value="0" min="0">

    <label>Keluar</label>
    <input type="number" name="keluar" value="0" min="0">

    <button type="submit">Simpan</button>
</form>
