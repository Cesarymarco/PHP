<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALCULADORA</title>
</head>
<body>
    <h1>CALCULADORA</h1>
    <p></p>
<?php

    $op1 = $_POST["operando1"];
    $op2 = $_POST["operando2"];
    $operacion = $_POST["operacion"];
    $resultado;

    if($operacion == "sumar")
    {
        $resultado = $op1 + $op2;
        echo "Resultado de la operacion: $op1 + $op2 = $resultado";

    } elseif($operacion == "restar")
    {
        $resultado = $op1 - $op2;
       echo "Resultado de la operacion: $op1 - $op2 = $resultado";

    } elseif($operacion == "multiplicar")
    {
        $resultado = $op1 * $op2;
        echo "Resultado de la operacion: $op1 x $op2 = $resultado";

    } else
    {
        $resultado = $op1/$op2;
        echo "Resultado de la operacion: $op1 / $op2 = $resultado";

    }




?>
</body>
</html>