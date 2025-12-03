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

        <h3 class="form-title">PRODUK ON PROGRESS</h3>

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
                <a href="{{ route('output.index') }}" class="btn cancel">Batal</a>
                <button type="submit" class="btn add">Tambah</button>
            </div>
        </form>

    </section>

</body>
</html>



