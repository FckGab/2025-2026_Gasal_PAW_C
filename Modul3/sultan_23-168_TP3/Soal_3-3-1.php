<?php
    $height = array(
        "Andy" => "176",
        "Barry" => "165",
        "Charlie" => "170"
    );
    // echo "Andy is " . $height['Andy'] . "cm tall.";
$height["Luffy"] = "165";
    $height["Zoro"] = "179";
    $height["Franky"] = "169";
    $height["Sanji"] = "170";
    $height["Nami"] = "160";

    // var_dump($height);


    $lastKey = array_key_last($height);
    echo "<br>Indeks terakhir: " . $lastKey . " (" . $height[$lastKey] . " cm)";
?>