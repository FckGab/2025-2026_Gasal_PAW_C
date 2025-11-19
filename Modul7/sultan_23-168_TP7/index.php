<?php
$conn = new mysqli('localhost','root','','penjualan');
$from = $_GET['from'] ?? date('Y-m-01');
$to = $_GET['to'] ?? date('Y-m-d');

$q = $conn->query("SELECT * FROM transaksi WHERE tanggal BETWEEN '$from' AND '$to' ORDER BY tanggal");
$data = [];
while($r=$q->fetch_assoc()){ $data[]=$r; }
?>
<!DOCTYPE html><html><body>
<form method="get">
<input type="date" name="from" value="<?=$from?>">
<input type="date" name="to" value="<?=$to?>">
<button>Tampilkan</button>
</form>

<h2>Grafik</h2>
<canvas id="c"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const labels = <?=json_encode(array_column($data,'tanggal'))?>;
const totals = <?=json_encode(array_column($data,'total'))?>;
new Chart(document.getElementById('c'),{
 type:'bar',
 data:{labels:labels, datasets:[{label:'Total', data:totals}]}
});
</script>

<h2>Rekap</h2>
<table border="1" cellpadding="5">
<tr><th>No</th><th>Total</th><th>Tanggal</th></tr>
<?php $no=1; foreach($data as $d): ?>
<tr><td><?=$no++?></td><td>Rp <?=number_format($d['total'])?></td><td><?=$d['tanggal']?></td></tr>
<?php endforeach; ?>
</table>

<h2>Total</h2>
<?php
$jml_pelanggan = count($data);
$jml_pendapatan = array_sum(array_column($data,'total'));
?>
<p>Jumlah Pelanggan: <?=$jml_pelanggan?> Orang</p>
<p>Jumlah Pendapatan: Rp <?=number_format($jml_pendapatan)?></p>

<a href="print.php?from=<?=$from?>&to=<?=$to?>">Print</a>
<a href="excel.php?from=<?=$from?>&to=<?=$to?>">Excel</a>

</body></html>
