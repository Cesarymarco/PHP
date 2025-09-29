<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 8</title>
</head>
<body>
<?php
    
    $alumnos = array("Mario" => 6, "Dani" => 7, "Cesar" => 5, "Said" => 10, "Samu" => 3);

    //A. ALUMNO CON MAYOR NOTA
    $mayor= key($alumnos);
    foreach($alumnos as $indice => $valor )
    {
        if($valor >= $alumnos[$mayor])
        {
                $mayor = $indice;
        }
             
    }

    echo "El alumno con mayor nota es ". $mayor . " y la nota es un: " . $alumnos[$mayor];
    echo "<br>";

    //B. ALUMNO CON PEOR NOTA
    $menor = key($alumnos);
    foreach($alumnos as $indice => $valor)
    {
        if($valor <= $alumnos[$menor])
        {
            $menor = $indice;
        }
    }

    echo "El alumno con menor nota es ". $menor . " y la nota es un: " . $alumnos[$menor];
    echo "<br>";
    
    //C. MEDIA DE LAS NOTAS
    $medias = 0;
    foreach($alumnos as $valor)
    {
        $medias += $valor;
    }
    
    $medias = $medias /count($alumnos);
    echo "La media de notas de los " . count($alumnos) . " alumnos es de: $medias";

?>
</body>
</html>