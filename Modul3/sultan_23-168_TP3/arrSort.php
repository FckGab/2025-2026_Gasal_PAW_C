<?php
    $num = array(3, 4, 6, 1, 12, 19, 5, 9, 10);
    sort($num);

    echo "Array sort : <br>";
    $arrSort = count($num);
    for ($i = 0; $i < $arrSort; $i++) {
        echo $num[$i] . "<br>";
    }
    echo "<br>";

    echo "Array rsort : <br>";
    rsort($num);
    $numRsort = count($num);
    for ($i = 0; $i < $numRsort; $i++) {
        echo $num[$i] . "<br>";
    } echo "<br>";

    echo "Array asort : <br>";
    $nilai = array(
        "Dikky" => "89",
        "Bima" => "91",
        "Yudda" => "79",
        "Gabriel" => "65",
        "Riko" => "70"
    );
    asort($nilai);
    foreach ($nilai as $i => $i_value) {
        echo "Nilai dari " . $i . " Adalah : " . $i_value . "<br>";
    }
    echo "<br>";

    echo "Array ksort : <br>";
    ksort($num);
    foreach ($num as $number => $nums) {
        echo "key = " . $number . ", value = " . $nums . "<br>";
    }
    echo "<br>";

    echo "Array arsort : <br>";
    $nama = array(
        "depan" => "Dikky",
        "tengah" => "Nofembri",
        "belakang" => "Rahmadani"
    );
    arsort($nama);
    foreach ($nama as $namaku => $name) {
        echo "key = " . $namaku . ", value = " . $name . "<br>";
    }
    echo "<br>";

    echo "Array krsort : <br>";
    $nama2 = array(
        "depan" => "Dikky",
        "tengah" => "Nofembri",
        "belakang" => "Rahmadani"
    );
    krsort($nama2);
    foreach ($nama2 as $namaku => $name) {
        echo "key = " . $namaku . ", value = " . $name . "<br>";
    }
?>