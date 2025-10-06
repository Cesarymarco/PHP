<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BINARIO</title>
</head>
<body>

    <h1>CONVERSOR BINARIO</h1><br>

<?php
    
    function convertir($num)
    {
        $num = decbin($num);

        return $num;
    }
    
    $num = $_POST["num"];
    echo "Número decimal: $num";
    echo "<p></p>";
    echo "Número binario: " . convertir($num);


?>

</body>
</html>