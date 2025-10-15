<?php
    $students = array(
        array("Alex", "2200401", "0812345678"),
        array("Bianca", "2200402", "0812345687"),
        array("Candice", "2200403", "0812345665"),
        array("Luffy", "2200404", "0812345699"),
        array("Zoro", "2200405", "0812345611"),
        array("Sanji", "2200406", "0812345622"),
        array("Franky", "2200407", "0812345633"),
        array("Nami", "2200408", "0812345644")
    );

    // Menampilkan data dalam bentuk tabel
    echo "<h3>Daftar Data Siswa</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Nama</th><th>NIM</th><th>No. HP</th></tr>";

    for ($row = 0; $row < count($students); $row++) {
        echo "<tr>";
        for ($col = 0; $col < count($students[$row]); $col++) {
            echo "<td>" . $students[$row][$col] . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
?>