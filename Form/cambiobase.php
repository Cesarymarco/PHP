<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAMBIOBASE</title>
</head>
<body>
    
<h1>CONVERSOR NÚMERICO</h1>
<p></p>

<?php

    $num = $_POST["num"];
    $base = $_POST["base"];
    echo "Número decimal: $num";
    echo "<p>";

    function arrayTodos($num)
    {
        $todos = array("Binario" => decbin($num), "Octal" => decoct($num), "Hexadecimal" => dechex($num));

        echo "<table border = '1' >";

        foreach($todos as $indice => $valor)
        {
            echo "<tr><td> $indice </td><td> $valor</td></tr>";
        }

        echo "</table>";
    }

    function opciones($num, $base)
    {
        if($base == "binario")
        {
            echo "Número $base: " . decbin($num);
        } elseif($base == "octal")
        {
            echo "Número $base: " . decoct($num);
        } elseif($base == "hexadecimal")
        {
            echo "Número $base: " . dechex($num);
        }
    }

    if($base == "todas")
    {
        arrayTodos($num);
    } else
    {
        opciones($num, $base);
    }


?>

</body>
</html>