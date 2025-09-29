<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 3</title>
</head>
<body>
<?php

    $numeros = array();


    for($x=0; $x < 20; $x++)
    {
        $numeros[$x] = decbin($x);
    }


    echo "<table border='1'>";
    echo "<tr> <th>Indice</th> <th>Binario</th> <th>Octal</th> </tr>";
    foreach($numeros as $indice => $valor)
    {
        $octal = "";
        for($x = $indice; $x != 0; $x = floor($x / 8))
        {
            $octal = ($x % 8) . $octal;
        }
        
        echo "<tr> <td>$indice</td> <td>$valor</td> <td>$octal</td>";
    }
    echo "</table>";

?>
</body>
</html>