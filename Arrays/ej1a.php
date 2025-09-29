<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 1</title>
</head>
<body>
<?php

    $impares = array();
    $suma = "0";

    for ($x = 1; count($impares) < 20; $x++)
    {
        if($x % 2 != 0)
        {
            $impares[count($impares)] = $x;
        }
    }

    echo "<table border = '1'";
    echo "<tr> <th>Indice</th> <th>Valor</th> <th>Suma</th> </tr>";
    foreach($impares as $indice => $valor)
    {
        $suma = $suma + $valor;
       echo "<tr> <td>$indice</td> <td>$valor</td> <td>$suma</td>";
    }
    echo "</table>";


?>
</body>
</html>