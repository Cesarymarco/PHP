<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba</title>
</head>
<body>
    

<?php

    $valida = true;
        $letras = ["C", "T", "P", "D"];
        $valores = [1,2,3,4,5,6,7,"J","Q","K"];
        $baraja = array();
        $pos = 0;
        for ($i = 0; $i < count($letras); $i++)
        {
           for($j = 0; $j < count($valores); $j++)
            {
               $baraja[$pos] = $valores[$j] . $letras[$i];
               $pos++;
            } 
        }

    foreach ($baraja as $carta)
    {
        echo("$carta, ");
    }

    echo "<table border='1'>";
    echo "<tr> <td>CESAR</td>";
    echo "<td><img src = 'images/1C.PNG'></td>";
    echo "<td>HOLA</td></tr>";
    echo "<tr> <td>DANI</td>";
    echo "<td><img src = 'images/2C.PNG' style = 'width=20px; height=40px;'></td>";
    echo "<td>HOLA</td></tr>";
    echo "</table>";


    
?>

</body>
</html>