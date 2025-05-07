<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Produk Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background: linear-gradient(90deg, #5a189a, #9d4edd);
        }

        .navbar-brand {
            color: white !important;
            font-weight: 600;
            font-size: 1.5rem;
        }

        .container {
            margin-top: 60px;
            max-width: 700px;
        }

        h1 {
            font-weight: 600;
            color: #5a189a;
        }

        label {
            font-weight: 500;
        }

        input, select, textarea {
            border-radius: 10px;
        }

        textarea {
            resize: none;
        }

        .btn-warning {
            background-color: #f77f00;
            border: none;
            transition: all 0.3s ease;
            color: white;
        }

        .btn-warning:hover {
            background-color: #d97706;
        }

        .btn-secondary {
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #adb5bd;
        }

        .form-control:focus, .form-select:focus {
            border-color: #9d4edd;
            box-shadow: 0 0 0 0.2rem rgba(157, 78, 221, 0.25);
        }

        .alert {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        footer {
            background-color: #5a189a;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: auto;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Produk Store</a>
        </div>
    </nav>

    <!-- Flash Message -->
    <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- Form Edit Produk -->
    <div class="container content-wrapper">
        <h1 class="text-center mb-5">Edit Produk</h1>

        <form action="{{ route('produk.update', $produk->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control shadow-sm" id="nama_produk" name="nama_produk" value="{{ $produk->nama_produk }}" required>
            </div>

            <div class="mb-4">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select shadow-sm" id="kategori" name="kategori" required>
                    <option value="Elektronik" {{ $produk->kategori == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                    <option value="Pakaian" {{ $produk->kategori == 'Pakaian' ? 'selected' : '' }}>Pakaian</option>
                    <option value="Peralatan Rumah" {{ $produk->kategori == 'Peralatan Rumah' ? 'selected' : '' }}>Peralatan Rumah</option>
                    <option value="Makanan" {{ $produk->kategori == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                    <option value="Kecantikan" {{ $produk->kategori == 'Kecantikan' ? 'selected' : '' }}>Kecantikan</option>
                    <option value="Olahraga" {{ $produk->kategori == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                    <option value="Aksesoris" {{ $produk->kategori == 'Aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control shadow-sm" id="harga" name="harga" value="{{ $produk->harga }}" required>
            </div>

            <div class="mb-4">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control shadow-sm" id="stok" name="stok" value="{{ $produk->stok }}" required>
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control shadow-sm" id="deskripsi" name="deskripsi" rows="5">{{ $produk->deskripsi }}</textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save"></i> Update Produk
                </button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Produk Store. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
