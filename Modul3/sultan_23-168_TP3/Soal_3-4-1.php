<?php
    $height = array(
        "Andy" => "176",
        "Barry" => "165",
        "Charlie" => "170"
    );

    $height["Luffy"] = "165";
    $height["Zoro"] = "179";
    $height["Franky"] = "169";
    $height["Sanji"] = "170";
    $height["Nami"] = "160";

    foreach ($height as $x => $x_value) {
        echo "Key=" . $x . ",Value=" . $x_value;
        echo "<br>";
    }
?>