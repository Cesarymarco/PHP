<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 1</title>
</head>
<body>
<?php
    $numero = "1";
    $control = $numero;
    $resultado = "0";
    $num = "";

    while ( $control != 0) 
    {
        $resultado = $control % 2;
       
        
        $num = $resultado . $num;
        

        $control = floor($control / 2);
    }

    $num = str_pad($num, 8, "0", STR_PAD_LEFT);

    echo "El numero " . $numero . " en binario es: " . $num ;


    



?>
</body>
</html>