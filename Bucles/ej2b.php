<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 2</title>
</head>
<body>
<?php

    $num = "25";
    $base = "9";
    $resultado = "0";
    $numFinal = "";

    for ($x = $num; $x != 0; $x = floor($x / $base))
    {
        $resultado = $x % $base;

        $numFinal = $resultado . $numFinal;
    }

     echo "El numero " . $num . " en binario es: " . $numFinal ; 


?>
</body>
</html>