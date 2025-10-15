<?php
    $fruits = array("Avocado", "Blueberry", "Cherry");
    $newFruits = array("Mango", "Kiwi", "Orange", "Banana", "Apple");

    for ($x = 0; $x < count($newFruits); $x++) {
        $fruits[] = $newFruits[$x];
    }
    for ($i = 0; $i < count($fruits); $i++) {
        echo $fruits[$i];
        echo "<br>";
    }   
?>