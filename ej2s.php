<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 2</title>
</head>
<body>
<?php
    $ip="10.33.1.1";

    $p1 = strpos($ip,".");
    $p2 = strpos($ip,".",$p1 + 1);
    $p3 = strpos($ip,".",$p2 + 1);

    $oct1 = substr($ip, 0, $p1);
    $oct2 = substr($ip, $p1 + 1,$p2 - $p1 - 1);
    $oct3 = substr($ip, $p2 + 1, $p3 - $p2 - 1);
    $oct4 = substr($ip, $p3 + 1);

    echo "1º octeto: " . $oct1 . "<br>";
    echo "2º octeto : " . $oct2 . "<br>";
    echo "3º octeto : " . $oct3 . "<br>";
    echo "4º octeto : " . $oct4;

    echo "<h3>IP EN BINARIO</h3>";
    echo decbin($oct1) . ".";
    echo decbin($oct2) . ".";
    echo decbin($oct3) . ".";
    echo decbin($oct4);

?>
</body>
</html>