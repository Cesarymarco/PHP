<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>


<?php
    include "media7fun.php";
    include "c:\wamp64\www\PHP\limpiar.php";

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
        $numCartas = $_POST["numcartas"];
        test_input($numCartas);
        $apuesta = $_POST["apuesta"];
        test_input($apuesta);
       
        $jugadores = array();

        $jugadores = rellenarJugadores($jugadores, $nombre1, $nombre2, $nombre3, $nombre4);

        $jugadores = crearCartas($jugadores, $numCartas);

        ganador($jugadores, $apuesta);

        crearTabla($jugadores);

        
    }

?>
    
</body>
</html>