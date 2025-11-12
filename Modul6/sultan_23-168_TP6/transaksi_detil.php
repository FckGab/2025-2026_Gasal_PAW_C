<?php
include 'koneksi.php';

$transaksi_id = 1;

$barang_sql = "SELECT * FROM barang WHERE id NOT IN (
                  SELECT barang_id FROM transaksi_detil WHERE transaksi_id = $transaksi_id
              )";
$barang_result = $koneksi->query($barang_sql);

if (isset($_POST['simpan'])) {
    $barang_id = $_POST['barang_id'];
    $qty = $_POST['qty'];

    $barang = $koneksi->query("SELECT * FROM barang WHERE id=$barang_id")->fetch_assoc();
    $subtotal = $barang['harga'] * $qty;

    $koneksi->query("INSERT INTO transaksi_detil (transaksi_id, barang_id, qty, subtotal)
                     VALUES ($transaksi_id, $barang_id, $qty, $subtotal)");

    $koneksi->query("UPDATE transaksi 
                     SET total = (SELECT SUM(subtotal) FROM transaksi_detil WHERE transaksi_id = $transaksi_id)
                     WHERE id = $transaksi_id");

    header("Location: transaksi_detil.php");
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $koneksi->query("DELETE FROM transaksi_detil WHERE id=$id");

    $koneksi->query("UPDATE transaksi 
                     SET total = (SELECT IFNULL(SUM(subtotal),0) FROM transaksi_detil WHERE transaksi_id = $transaksi_id)
                     WHERE id = $transaksi_id");

    header("Location: transaksi_detil.php");
}

$detil_result = $koneksi->query("SELECT td.*, b.nama, b.harga 
                                 FROM transaksi_detil td
                                 JOIN barang b ON td.barang_id = b.id
                                 WHERE transaksi_id = $transaksi_id");
?>

<h2>Form Input Detil Transaksi</h2>

<form method="POST">
    <label>Barang:</label>
    <select name="barang_id" required>
        <option value="">-- Pilih Barang --</option>
        <?php while ($b = $barang_result->fetch_assoc()): ?>
            <option value="<?= $b['id'] ?>"><?= $b['nama'] ?> (Rp<?= number_format($b['harga'],0,',','.') ?>)</option>
        <?php endwhile; ?>
    </select>

    <label>Qty:</label>
    <input type="number" name="qty" min="1" required>

    <button type="submit" name="simpan">Tambah</button>
</form>

<hr>

<h3>Daftar Detil Transaksi</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Barang</th>
        <th>Harga</th>
        <th>Qty</th>
        <th>Subtotal</th>
        <th>Aksi</th>
    </tr>
    <?php 
    $no = 1;
    while ($d = $detil_result->fetch_assoc()): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $d['nama'] ?></td>
        <td>Rp<?= number_format($d['harga'],0,',','.') ?></td>
        <td><?= $d['qty'] ?></td>
        <td>Rp<?= number_format($d['subtotal'],0,',','.') ?></td>
        <td><a href="?hapus=<?= $d['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a></td>
    </tr>
    <?php endwhile; ?>
</table>

<?php
$total = $koneksi->query("SELECT total FROM transaksi WHERE id=$transaksi_id")->fetch_assoc()['total'];
?>
<h3>Total Transaksi: Rp<?= number_format($total,0,',','.') ?></h3>
