<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan.xls");

$conn=new mysqli('localhost','root','','penjualan');
$from=$_GET['from']; $to=$_GET['to'];
$q=$conn->query("SELECT * FROM transaksi WHERE tanggal BETWEEN '$from' AND '$to' ORDER BY tanggal");
$data=[]; while($r=$q->fetch_assoc()){$data[]=$r;}

echo "<h2>Rekap Laporan Penjualan $from s/d $to</h2>";
echo "<table border=1><tr><th>No</th><th>Total</th><th>Tanggal</th></tr>";
$no=1;
foreach($data as $d){
 echo "<tr><td>$no</td><td>".$d['total']."</td><td>".$d['tanggal']."</td></tr>";
 $no++;
}
echo "</table>";
?>
