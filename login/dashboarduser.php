<?php
session_start();

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // Arahkan kembali ke form login jika belum login
    exit();
}

$username = $_SESSION['username'];  // Ambil username dari session
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 30px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Selamat Datang Di Izin Cuti Online, <?php echo $username; ?>!</h1>

        <!-- Form Input Data -->
        <div class="card">
            <div class="card-header">Formulir Pengajuan</div>
            <div class="card-body">
                <form action="submit_form.php" method="POST">
                    <div class="mb-3">
                        <label for="field1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="field1" name="field1" required>
                    </div>
                    <div class="mb-3">
                        <label for="field2" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="field2" name="field2" required>
                    </div>
                    <div class="mb-3">
                        <label for="field3" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="field3" name="field3" required>
                    </div>
                    <div class="mb-3">
                        <label for="field4" class="form-label">Unit</label>
                        <input type="text" class="form-control" id="field4" name="field4" required>
                    </div>
                    <div class="mb-3">
                        <label for="field5" class="form-label">Jenis Cuti</label>
                    </div>
                    <div class="mb-3">
                    <select class="form-control" id="field5" name="field5" required>
                            <option value="option1">Acara Keluarga</option>
                            <option value="option2">Bulan Madu</option>
                            <option value="option3">Hamil</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="field6" class="form-label">Keterangan (Opsional)</label>
                        <textarea class="form-control" id="field6" name="field6" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="field7" class="form-label">Tanggal Awal</label>
                        <input type="date" class="form-control" id="field7" name="field7" required>
                    </div>
                    <div class="mb-3">
                        <label for="field8" class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="field8" name="field8" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>

        <a href="index.php" class="btn btn-danger w-100 mt-4">Logout</a>
    </div>

    <!-- Bootstrap JS (Optional for interactive elements) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
