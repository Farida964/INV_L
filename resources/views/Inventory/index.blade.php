<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aspirasi.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    
    <title>Inventory</title>
</head>
<body>
  
    <!-- card agenda -->
    <br>
    <a href="{{ route('inventory.index') }}" class="back">Back</a>
    <a href="{{ route('inventory.create') }}" class="add">Add +</a>

    <div class="container_card">
        @foreach($allInventory as $key => $inv)
            <div class="card-item">
                <h2>{{ $inv->title }}</h2>
                <p class="caption">✍️ : {{ $inv->description }}</p>
                <p>📅 : {{ $inv->date }}</p>
                <p>📍 : {{ $inv->location }}</p>
                <p>Uploaded: {{ $inv->created_at }}</p>
                <p>Updated: {{ $inv->updated_at }}</p>
                <form action="{{ route('inventory.destroy', $inv->id) }}" method="POST">
                    @auth
                        <a href="{{ route('inventory.edit', $inv->id) }}" class="edit">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">Hapus</button>
                    @endauth
                </form>
            </div>
        @endforeach
    </div>

     <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logo = document.getElementById('profileLogo');
            const dropdown = document.getElementById('profileDropdown');
            if (logo) {
                document.addEventListener('click', function(e) {
                    if (logo.contains(e.target)) {
                        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
                    } else if (!dropdown.contains(e.target)) {
                        dropdown.style.display = 'none';
                    }
                });
            }
        });
    </script>
</body>
</html>