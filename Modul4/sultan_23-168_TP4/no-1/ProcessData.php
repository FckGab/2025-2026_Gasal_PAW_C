<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Posted Data : </h3>
    <?php require("validate.inc");
        if (validateName ( $_POST, 'surname')) {
            echo "Data OK!";
        } else {
            echo "Data Invalid!";
        }
    ?>
</body>
</html>