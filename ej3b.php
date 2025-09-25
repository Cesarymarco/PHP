<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 3</title>
</head>
<body>
<?php

    $num = "254";
    $cadena = "0123456789ABCDEF";
    $numFinal = "";

    for ( $x = $num; $x != 0; $x = floor($x / 16))
    {
        $numFinal = substr($cadena, $x % 16, 1) . $numFinal;
    }

    echo "El número $num en hexadecimal es: " . $numFinal;


?>
</body>
</html>