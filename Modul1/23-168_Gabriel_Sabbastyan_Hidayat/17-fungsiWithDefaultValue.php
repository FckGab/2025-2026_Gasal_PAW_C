<?php 
    function setHeight($minheight = 50) {
        echo "The height is : $minheight <br>";
    }

    setHeight(350);
    setHeight(); // jika kosong maka akan menggunakan default value dri functionnya
    setHeight(135);
    setHeight(80);
?>