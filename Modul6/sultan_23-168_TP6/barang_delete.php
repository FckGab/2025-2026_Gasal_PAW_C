<?php
include 'koneksi.php';

$id = $_GET['id'];

$cek = $koneksi->query("SELECT COUNT(*) as jml FROM transaksi_detil WHERE barang_id=$id")->fetch_assoc();

if ($cek['jml'] > 0) {
    echo "<script>alert('Barang tidak bisa dihapus karena sudah dipakai di transaksi!');window.location='barang_list.php';</script>";
} else {
    $koneksi->query("DELETE FROM barang WHERE id=$id");
    echo "<script>alert('Barang berhasil dihapus!');window.location='barang_list.php';</script>";
}
?>
