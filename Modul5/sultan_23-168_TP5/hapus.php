<?php
include "koneksi.php";
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$id = intval($_GET['id']);
mysqli_query($koneksi, "DELETE FROM supplier WHERE id='$id'");
header("Location: index.php");
exit;
?>
