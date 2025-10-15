<?php
    $students = array(
        array("Alex", "2200401", "0812345678"),
        array("Bianca", "220402", "0812345687"),
        array("Candice", "220403", "0812345665"),
    );

    $students[] = array("Luffy", "2200404", "0812345699");
    $students[] = array("Zoro", "2200405", "0812345611");
    $students[] = array("Sanji", "2200406", "0812345622");
    $students[] = array("Franky", "2200407", "0812345633");
    $students[] = array("Nami", "2200408", "0812345644");

    for ($row = 0; $row < count($students); $row++) {
        echo "<p><b>Row Number $row</b></p>";
        echo "<ul>";
        for ($col = 0; $col < count($students[$row]); $col++) {
            echo "<li>" . $students[$row][$col] . "</li>";
        }
        echo "</ul>";
    }
?>