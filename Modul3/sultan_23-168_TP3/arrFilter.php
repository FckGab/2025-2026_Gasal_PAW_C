<?php
    $nilai = array(80, 85, 60, 70, 65, 90, 55, 100);
    $filterNilai = array_filter($nilai, function ($lulus) {
        return $lulus >= 70;
    });
?>