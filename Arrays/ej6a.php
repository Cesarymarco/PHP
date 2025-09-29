<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 6</title>
</head>
<body>
<?php

    $array1 = array("Bases Datos", "Entornos Desarrollo", "Programación");
    $array2 = array("Sistemas Informáticos","FOL","Mecanizado");
    $array3 = array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés");
    $arrayUnidos = array();

    array_push($arrayUnidos, ...$array1, ...$array2, ...$array3);

    $pos = array_search("Mecanizado", $arrayUnidos);
    unset($arrayUnidos[$pos]);

    echo "El array del derecho y sin mecanizacion: ";
    foreach($arrayUnidos as $valor)
    {
        echo $valor . " ";
    }

    echo "<br>";

    
    $arrayInv = array_reverse($arrayUnidos);

    echo "El array al reves: ";
    foreach($arrayInv as $valor)
    {
        echo $valor . " ";
    }

?>
</body>
</html>