<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 7</title>
</head>
<body>
<?php

    $alumnos = array("Mario" => "20", "Dani" => "20", "César" => "19", "Said" => "19", "Samu" => "26");

    //a. Mostrar el contenido del array utilizando bucles.
    foreach($alumnos as $indice => $valor)
    {
        echo "Nombre: " . $indice . " edad: " . $valor . "<br>";
    }

    echo "<br>";

    //b. situa el puntero en el segundo puesto y muestra el valor
    reset($alumnos);
    next($alumnos);
    echo "En la segunda posicion se encuentra " . key($alumnos) . " que tiene " . current($alumnos) . " años.";
    echo "<br>";

    //c. avanza una mas y muestra el valor
    next($alumnos);
    echo "En la tercera posicion se encuentra " . key($alumnos) . " que tiene " . current($alumnos) . " años.";
    echo "<br>";

    //d. coloca en la ultima posicion y muestra
    end($alumnos);
    echo "En la ultima posicion se encuentra " . key($alumnos) . " que tiene " . current($alumnos) . " años.";
    echo "<br>";

    //e. ordena el array x edades de menor a mayor y muestra el primero y el ultimo
    asort($alumnos);
    reset($alumnos);
    echo "Despues de ordenar el array el primer puesto es de " . key($alumnos) . " que tiene: " . current($alumnos) . " años<br>";
    end($alumnos);
    echo "Despues de ordenar el array el último puesto es de " . key($alumnos) . " que tiene: " . current($alumnos) . " años";
?>
</body>
</html>