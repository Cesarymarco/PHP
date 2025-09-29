<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 5</title>
</head>
<body>
<?php

    $array1 = array("Bases Datos", "Entornos Desarrollo", "Programación");
    $array2 = array("Sistemas Informáticos","FOL","Mecanizado");
    $array3 = array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés");
    $arrayA = array();
    $arrayB = array();
    $arrayC = array();

    //A. UNIR ARRAYS SIN MEZCLAR
    foreach($array1 as $valor)
    {
        $arrayA[] = $valor; 
    }

    foreach($array2 as $valor)
    {
        $arrayA[] = $valor;
    }

    foreach($array3 as $valor)
    {
        $arrayA[] = $valor;
    }

    foreach($arrayA as $valor)
    {
        echo $valor . " ";
    }
    echo "<br>";

    //B. UNIR CON ARRAY_MERGE()

    $arrayB = array_merge($array1,$array2,$array3);

    foreach($arrayB as $valor)
    {
        echo $valor . " ";
    }
    echo "<br>";

    //C. UNIR CON ARRAY_PUSH()

    array_push($arrayC, ...$array1, ...$array2, ...$array3);
    foreach($arrayC as $valor)
    {
        echo $valor . " ";
    }


?>
</body>
</html>