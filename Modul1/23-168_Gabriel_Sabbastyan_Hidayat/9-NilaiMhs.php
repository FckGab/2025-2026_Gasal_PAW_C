<?php
$nama = "";
$nim = "";
$nilai = "";
$grade = "";
$pesan = "";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $nilai = $_POST['nilai'];

    if ($nilai > 100 || $nilai < 0) {
        $pesan = "Nilai tidak valid! Silakan masukkan nilai antara 0 - 100.";
    } else {
        if ($nilai >= 91 && $nilai <= 100) {
            $grade = "A";
        } elseif ($nilai >= 81 && $nilai <= 90) {
            $grade = "B";
        } elseif ($nilai >= 71 && $nilai <= 80) {
            $grade = "C+";
        } elseif ($nilai >= 61 && $nilai <= 70) {
            $grade = "C";
        } elseif ($nilai >= 51 && $nilai <= 60) {
            $grade = "D";
        } else {
            $grade = "E (Silahkan belajar lebih giat lagi!)";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Mahasiswa</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        h2, h3 {
            color: #333;
            text-align: center;
        }
        form {
            background: #fff;
            padding: 25px 35px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            margin-bottom: 30px;
        }
        label {
            display: block;
            font-weight: 600;
            color: #444;
            margin-top: 10px;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            outline: none;
            transition: all 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 6px rgba(0, 123, 255, 0.4);
        }
        input[type="submit"] {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 50%;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        th {
            background: #f0f0f0;
            text-align: left;
            width: 30%;
        }
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Form Input Nilai Mahasiswa</h2>
    <form method="post" action="">
        <label for="nama">Nama : </label>
        <input type="text" name="nama" required><br>
        <label for="nim">Nim : </label>
        <input type="number" name="nim" required><br>
        <label for="nilai">Nilai : </label>
        <input type="number" name="nilai" required><br>

        <input type="submit" name="submit" value="Submit Nilai">
    </form>

    <?php if (!empty($pesan)): ?>
        <div class="error"><?= htmlspecialchars($pesan); ?></div>
    <?php endif; ?>

    <?php if (isset($_POST['submit']) && empty($pesan)): ?>
        <h3>Hasil Penilaian</h3>
        <table border="1" cellpadding="5">
            <tr>
                <th>Nama</th>
                <td><?= htmlspecialchars($nama); ?></td>
            </tr>
            <tr>
                <th>NIM</th>
                <td><?= htmlspecialchars($nim); ?></td>
            </tr>
            <tr>
                <th>Nilai</th>
                <td><?= htmlspecialchars($nilai); ?></td>
            </tr>
            <tr>
                <th>Grade</th>
                <td><?= htmlspecialchars($grade); ?></td>
            </tr>
        </table>
    <?php endif; ?>
</body>

</html>