<?php
$nama   = "Gabriel Sabbastyan Hidayat";
$prodi= "Teknik Informatika";
$angkatan= "2023";
$hobi   = "Sport, Musik, Hiking";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Biodata Saya</title>
    <style>
        table {
            border-collapse: collapse;
            width: 400px;
            margin: 20px auto;
        }

        td,
        th {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background: #eee;
        }
    </style>
</head>

<body>
    <h2 align="center">Biodata</h2>
    <table>
        <tr>
            <th>Nama</th>
            <td><?php echo $nama; ?></td>
        </tr>
        <tr>
            <th>Prodi</th>
            <td><?php echo $prodi; ?></td>
        </tr>
        <tr>
            <th>Angkatan</th>
            <td><?php echo $angkatan; ?></td>
        </tr>
        <tr>
            <th>Hobi</th>
            <td><?php echo $hobi; ?></td>
        </tr>
    </table>
</body>

</html>