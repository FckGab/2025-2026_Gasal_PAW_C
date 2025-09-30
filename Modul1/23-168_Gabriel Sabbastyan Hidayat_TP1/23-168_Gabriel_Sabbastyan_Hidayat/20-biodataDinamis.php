<?php
$nama     = isset($_POST['nama']) ? $_POST['nama'] : "";
$prodi    = isset($_POST['prodi']) ? $_POST['prodi'] : "";
$angkatan = isset($_POST['angkatan']) ? $_POST['angkatan'] : "";
$hobi     = isset($_POST['hobi']) ? $_POST['hobi'] : "";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Biodata</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form {
            width: 300px;
            margin: auto;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        label { display: block; margin-top: 10px; }
        input[type="text"] {
            width: 95%;
            padding: 6px;
            margin-top: 5px;
        }
        input[type="submit"] {
            margin-top: 15px;
            padding: 8px 15px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #218838;
        }
        table {
            border-collapse: collapse;
            width: 400px;
            margin: 20px auto;
        }
        td, th {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background: #eee;
        }
    </style>
</head>
<body>

    <h2 align="center">Form Input Biodata</h2>
    <form method="post" action="">
        <label>Nama:</label>
        <input type="text" name="nama" required>

        <label>Prodi:</label>
        <input type="text" name="prodi" required>

        <label>Angkatan:</label>
        <input type="text" name="angkatan" required>

        <label>Hobi:</label>
        <input type="text" name="hobi" required>

        <input type="submit" value="Tampilkan Biodata">
    </form>

    <?php if (!empty($nama)) : ?>
        <h2 align="center">Biodata Anda</h2>
        <table>
            <tr>
                <th>Nama</th>
                <td><?php echo htmlspecialchars($nama); ?></td>
            </tr>
            <tr>
                <th>Prodi</th>
                <td><?php echo htmlspecialchars($prodi); ?></td>
            </tr>
            <tr>
                <th>Angkatan</th>
                <td><?php echo htmlspecialchars($angkatan); ?></td>
            </tr>
            <tr>
                <th>Hobi</th>
                <td><?php echo htmlspecialchars($hobi); ?></td>
            </tr>
        </table>
    <?php endif; ?>

</body>
</html>
