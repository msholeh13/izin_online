<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kepala Ruang</title>
    <!-- Menyertakan Bootstrap CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .profile-info {
            padding: 20px;
            background-color: #f8f9fa;
            border-right: 2px solid #ddd;
            text-align: center;
        }

        .profile-info img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .content-area {
            padding: 20px;
        }

        .card-body a {
            color: #007bff;
            text-decoration: none;
        }

        .card-body a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Navbar (Dashboard dan Logout) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <!-- Info Profil di Sisi Kiri -->
            <div class="col-md-3 profile-info">
                <img src="https://via.placeholder.com/100" alt="Foto Profil">
                <h4>Afuw Cahya</h4>
                <ul class="list-unstyled">
                    <li><strong>Jabatan:</strong> Kepala Ruang</li>
                    <li><strong>Email:</strong> AfuwCahya@gmail.com</li>
                    <li><strong>Telepon:</strong> 081234567890</li>
                </ul>
            </div>

            <!-- Konten Utama di Tengah -->
            <div class="col-md-9 content-area">
                <!-- Judul Dashboard -->
                <h3>Dashboard</h3>

                <!-- Form Keterangan Surat Masuk dan Surat Terbalas -->
                <div class="row">
                    <!-- Keterangan Surat Masuk di Sisi Kiri -->
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Keterangan Surat Masuk</h5>
                            </div>
                            <div class="card-body">
                                <p>Nomor Surat Masuk: 001/SM/2025</p>
                                <p>Tanggal Surat Masuk: 2025-02-01</p>
                                <a href="surat_masuk_details.html">Lihat Detail</a>
                            </div>
                        </div>
                    </div>

                    <!-- Keterangan Surat Terbalas di Sisi Kanan -->
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Keterangan Surat Terbalas</h5>
                            </div>
                            <div class="card-body">
                                <p>Nomor Surat Terbalas: 001/ST/2025</p>
                                <p>Tanggal Surat Terbalas: 2025-02-05</p>
                                <a href="surat_terbalas_details.html">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="halaman_lain.html" method="get">
                    <button type="submit" class="btn btn-primary w-100 mb-4">Beri Izin</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Menyertakan Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
