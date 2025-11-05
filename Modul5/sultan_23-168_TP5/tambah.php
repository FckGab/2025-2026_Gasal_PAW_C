<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Supplier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <div class="container">
        <h4 class="text-primary">Tambah Data Master Supplier Baru</h4>
        <form method="post">
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Telp</label>
                <input type="text" name="telp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>
            <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
            <a href="index.php" class="btn btn-danger">Batal</a>
        </form>

        <?php
        if (isset($_POST['simpan'])) {
            $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
            $telp = mysqli_real_escape_string($koneksi, $_POST['telp']);
            $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
            mysqli_query($koneksi, "INSERT INTO supplier (nama, telp, alamat) VALUES('$nama', '$telp', '$alamat')");
            header("Location: index.php");
            exit;
        }
        ?>
    </div>
</body>
</html>
