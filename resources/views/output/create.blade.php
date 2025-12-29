<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Output</title>
    <link rel="stylesheet" href="{{ asset('assets/css/createinv.css') }}">
</head>
<body>
    <!-- FORM WRAPPER -->
    <section class="form-wrapper">

        <h3 class="form-title">PEMBELIAN PRODUK</h3>

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

        <form action="{{ route('output.store') }}" method="POST" class="form-box">
            @csrf

            <!-- LEFT LABEL RIGHT INPUT -->
            <div class="row">
                <label>KODE PRODUK :</label>
                <select id="kode" name="inventory_id" required>
                    <option value="">-- Pilih Kode --</option>
    @foreach($inventories as $inv)
                    <option value="{{ $inv->id }}">{{ $inv->kode }}</option>
    @endforeach
                </select>

            </div>

            <div class="row">
                <label>NAMA PRODUK :</label>
                 <input type="text" id="nama" disabled>
            </div>

            <div class="row">
                <label>WARNA :</label>
                <input type="text" id="warna" disabled> 
            </div>

            <div class="row">
                <label>UKURAN :</label>
                <input type="text" id="ukuran" disabled>

            </div>


            <div class="row">
                <label>PRODUK KELUAR :</label>
                <input type="number" name="keluar" value="{{ old('keluar') }}" placeholder="0">
            </div>


            <div class="row">
                <label>HARGA PRODUK :</label>
                <input type="number" id="harga" name="harga">
            </div>

           <div class="row">
                <label>KEUNTUNGAN PER ITEM :</label>
               <input type="number" id="keuntungan" name="keuntungan">
            </div>


            <div class="row">
                <label>NAMA PEMBELI :</label>
                <textarea name="keterangan" placeholder="Tambahkan keterangan">{{ old('keterangan') }}</textarea>
            </div>

            <div class="row">
                <label>STATUS :</label>
                <select name="status" id="status" class="status">{{ old('status') }}

                <option value="">Pilih status</option>
                <option value="list" {{ old('status') == 'List' ? 'selected' : '' }}>List</option>
                <option value="packing" {{ old('status') == 'Packing' ? 'selected' : '' }}>Packing</option>
                <option option value="delivering" {{ old('status') == 'Delivering' ? 'selected' : '' }}>Delivering</option>
                <option value="arrive" {{ old('status') == 'Arrive' ? 'selected' : '' }}>Arrive</option>

                </select>
        
            </div>

            <div class="row">
                <label>PEMBAYARAN :</label>
                 <select name="pembayaran" id="pembayaran">
                
                <option value="" class="pembayaran">Pilih pembayaran</option> {{ old('pembayaran') }}
                <option value="tunai" {{ old('pembayaran') == 'tunai' ? 'selected' : '' }}>Tunai</option>
                <option value="cod" {{ old('pembayaran') == 'cod' ? 'selected' : '' }}>COD</option>
                <option value="transfer" {{ old('pembayaran') == 'transfer' ? 'selected' : '' }}>Transfer</option>

          </select>
        
            </div>

            <!-- BUTTONS -->
            <div class="btn-group">
                <a href="{{ route('output.index') }}" class="btn cancel">Cancel</a>
                <button type="submit" class="btn add">Add</button>
            </div>
        </form>

    </section>

   <script>
document.getElementById('kode').addEventListener('change', function () {
    const inventoryId = this.value;

    if (!inventoryId) {
        document.getElementById('nama').value = '';
        document.getElementById('warna').value = '';
        document.getElementById('ukuran').value = '';
        document.getElementById('harga').value = '';
        document.getElementById('keuntungan').value = '';
        return;
    }

    fetch(`/inventory/detail/${inventoryId}`)
        .then(res => {
            if (!res.ok) throw new Error('Inventory tidak ditemukan');
            return res.json();
        })
        .then(data => {
            document.getElementById('nama').value = data.nama;
            document.getElementById('warna').value = data.warna;
            document.getElementById('ukuran').value = data.ukuran;
            document.getElementById('harga').value = data.harga;
            document.getElementById('keuntungan').value = data.keuntungan;
        })
        .catch(err => {
            alert('Gagal mengambil data inventory');
            console.error(err);
        });
});
</script>


</body>
</html>



