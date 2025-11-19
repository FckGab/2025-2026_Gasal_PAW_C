<?php
$conn = new mysqli('localhost','root','','penjualan');
$from = $_GET['from']; $to = $_GET['to'];
$q = $conn->query("SELECT * FROM transaksi WHERE tanggal BETWEEN '$from' AND '$to' ORDER BY tanggal");
$data=[]; while($r=$q->fetch_assoc()){$data[]=$r;}

header("Content-Type: text/html");
?>
<h1>Rekap Laporan Penjualan <?=$from?> s/d <?=$to?></h1>
<table border="1" cellpadding="5">
<tr><th>No</th><th>Total</th><th>Tanggal</th></tr>
<?php $no=1; foreach($data as $d): ?>
<tr><td><?=$no++?></td><td>Rp <?=number_format($d['total'])?></td><td><?=$d['tanggal']?></td></tr>
<?php endforeach; ?>
</table>
