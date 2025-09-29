<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 6</title>
</head>
<body>
<?php

    $num = "5";
    $resultado = "0";

    echo " $num! = $num";

    for ($x = $num-1; $x > 0; $x = $x-1)
    {
        $num = $num * $x;
        echo " x $x";
    }

    echo " = $num";

?>
</body>
</html>