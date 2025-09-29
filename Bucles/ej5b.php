<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 5</title>
</head>
<body>
<?php

    $num = "8";

    echo "<table border = '1'>";

    for($x = 1; $x <=10; $x++)
    {
        echo "<tr><td> $num x $x </td><td>" . ($num * $x) . "</td></tr>";
    }
    echo "</table>";


?>
</body>
</html>