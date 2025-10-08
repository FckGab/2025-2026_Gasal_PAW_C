<!DOCTYPE html>
<html>
<head>
    <title>Sistem Kasir Sederhana</title>
    <style>
        label {
            display: block;
            margin-top: 10px;
        }
        select, input[type=number] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        input[type=submit] {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            background: #007bff;
            color: white;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<h2>Sistem Kasir Sederhana</h2>

<form method="post">
    <label>Pilih Menu:</label>
    <select name="menu" required>
        <option value="">-- Pilih --</option>
        <option value="Mie Goreng">Mie Goreng - Rp 10000</option>
        <option value="Mie Ayam">Mie Ayam - Rp 12000</option>
        <option value="Soto Ayam">Soto Ayam - Rp 15000</option>
        <option value="Es Teh">Es Teh - Rp 3000</option>
        <option value="Es Jeruk">Es Jeruk - Rp 4000</option>
    </select>

    <label>Jumlah Pesanan:</label>
    <input type="number" name="jumlah" min="1" required>
    <input type="submit" name="tambah" value="Tambahkan ke Daftar">
</form>

<?php
session_start();
// daftar harga menu
$hargaMenu = [
    "Mie Goreng" => 10000,
    "Mie Ayam" => 12000,
    "Soto Ayam" => 15000,
    "Es Teh" => 3000,
    "Es Jeruk" => 4000
];
// tambahkan pesanan ke session
if (isset($_POST['tambah'])) {
    $menu = $_POST['menu'];
    $jumlah = $_POST['jumlah'];
    $harga = $hargaMenu[$menu];
    $subtotal = $harga * $jumlah;
    $_SESSION['pesanan'][] = [
        'menu' => $menu,
        'jumlah' => $jumlah,
        'harga' => $harga,
        'subtotal' => $subtotal
    ];
}
// tampilkan daftar pesanan
if (!empty($_SESSION['pesanan'])) {
    echo "<div class='result'>";
    echo "<h3>Daftar Pesanan</h3>";
    echo "<table border='1' cellpadding='8' cellspacing='0'>
            <tr>
                <th>No</th>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>";
    $no = 1;
    $total = 0;
    foreach ($_SESSION['pesanan'] as $item) {
        echo "<tr>
                <td>$no</td>
                <td>{$item['menu']}</td>
                <td>{$item['jumlah']}</td>
                <td>Rp " . number_format($item['harga'], 0, ',', '.') . "</td>
                <td>Rp " . number_format($item['subtotal'], 0, ',', '.') . "</td>
            </tr>";
        $no++;
        $total += $item['subtotal'];
    }
    echo "<tr>
            <td colspan='4'><b>Total Bayar</b></td>
            <td><b>Rp " . number_format($total, 0, ',', '.') . "</b></td>
          </tr>";
    echo "</table>";

    echo "<form method='post' style='margin-top:10px;'>
            <input type='submit' name='reset' value='Reset Pesanan'>
          </form>";

}
// tombol reset
if (isset($_POST['reset'])) {
    session_destroy();
}
?>
</body>
</html>