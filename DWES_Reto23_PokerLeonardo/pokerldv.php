<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POKER</title>
</head>
<body>
    
<?php
    include "../limpiar.php";
    include "Pokerldv_fun.php";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $nombre1 = $_POST["nombre1"];
        test_input($nombre1);
        $nombre2 = $_POST["nombre2"];
        test_input($nombre2);
        $nombre3 = $_POST["nombre3"];
        test_input($nombre3);
        $nombre4 = $_POST["nombre4"];
        test_input($nombre4);
        $bote = $_POST["bote"];
        test_input($bote);

        $jugadores = array();

        $jugadores = rellenarJugadores($jugadores, $nombre1, $nombre2, $nombre3, $nombre4);

        $jugadores = repartirCartas($jugadores);

        $parejas = array();

        $parejas = crearParejas($jugadores);

        ganadores($parejas, $bote);

        imprimirMano($jugadores, $parejas);
    }


?>

</body>
</html>