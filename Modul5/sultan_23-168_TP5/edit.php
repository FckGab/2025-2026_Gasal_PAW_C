<?php
include "koneksi.php";
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$id = intval($_GET['id']);
$data = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id='$id'");
$d = mysqli_fetch_array($data);
if (!$d) {
    echo "Data tidak ditemukan";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Supplier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <div class="container">
        <h4 class="text-primary">Edit Data Master Supplier</h4>
        <form method="post">
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" value="<?= htmlspecialchars($d['nama']) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Telp</label>
                <input type="text" name="telp" value="<?= htmlspecialchars($d['telp']) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" value="<?= htmlspecialchars($d['alamat']) ?>" class="form-control" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-danger">Batal</a>
        </form>

        <?php
        if (isset($_POST['update'])) {
            $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
            $telp = mysqli_real_escape_string($koneksi, $_POST['telp']);
            $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
            mysqli_query($koneksi, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'");
            header("Location: index.php");
            exit;
        }
        ?>
    </div>
</body>
</html>
