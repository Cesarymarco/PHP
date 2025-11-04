<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POKER FUNCIONES</title>
</head>
<body>
    

<?php

    function rellenarJugadores($jugadores, $nombre1, $nombre2, $nombre3, $nombre4)
    {

        $nombres = array($nombre1, $nombre2, $nombre3, $nombre4);

        foreach($nombres as $nombre)
        {
            $jugadores[$nombre] = [];
        }

        return $jugadores;
    }

    function crearBaraja()
    {
        $letras = array("C1", "C2", "T1", "T2", "D1", "D2", "P1", "P2");
        $valores = array(1, "J", "Q", "K");
        $baraja = array();
        $pos = 0;
        for($i = 0; $i < count($letras); $i++)
        {
            for($j = 0; $j < count($valores); $j++)
            {
                $baraja[$pos] = $valores[$j] . $letras[$i];
                $pos++;
            }
        }

        return $baraja;
    }

    function repartirCartas($jugadores)
    {
        $baraja = crearBaraja();

        foreach($jugadores as $jugador => &$cartas)
        {
            for($i = 0; $i < 4; $i++)
            {
                $carta = array_rand($baraja);
                while(!comprobarCarta($jugadores, $carta))
                {
                    $carta = array_rand($baraja);
                }
                $cartas[] = $baraja[$carta];
            }
        }

        return $jugadores;
    }

    function comprobarCarta($jugadores, $carta)
    {
        foreach($jugadores as $jugador => $valor)
        {
            if(in_array($carta, $valor))
            {
                return false;
            }
        }

        return $carta;
    }

    function obtenerValor($carta)
    {
        return substr($carta, 0, 1);
    }

    function crearParejas($jugadores)
    {

        $parejas = array();

        foreach( $jugadores as $jugador => $cartas)
        {
            $parejas[$jugador] = sacarParejas($cartas);
        }

        return $parejas;
    }

    function sacarParejas($cartas)
    {
        $valores = array();

        foreach($cartas as $carta)
        {
            $valor = obtenerValor($carta);
            if (!isset($valores[$valor]))
            {
                $valores[$valor] = 0;
            }
            $valores[$valor]++;
        }

        $numParejas = array_values($valores);

        if(in_array(4, $numParejas))
        {
            $puntuacion = "poker"; 
        }
        elseif (in_array(3, $numParejas))
        {
            $puntuacion = "trio";
        }
        elseif(count(array_keys($numParejas, 2)) == 2)
        {
            $puntuacion = "doble pareja";
        }
        elseif(in_array(2, $numParejas))
        {
            $puntuacion = "pareja";
        }else{
            $puntuacion = "nada";
        }

        return $puntuacion;
    }

    function ganadores($parejas, $bote)
    {
        $ganadores = array();
        $valoresParejas = array("nada" => 0, "pareja" => 1, "doble pareja" => 2, "trio" => 3, "poker" => 4);
        $maxPuntuacion = puntuacionMaxima($parejas);

        foreach($parejas as $jugador => $pareja)
        {
            if($valoresParejas[$pareja] == $maxPuntuacion)
            {
                $ganadores[] = $jugador;
            }
        }
        
        $premio = premio($maxPuntuacion, $bote);
        escribirGanador($ganadores, $premio);
    }   
    function puntuacionMaxima($parejas)
    {
        $valoresParejas = array("nada" => 0, "pareja" => 1, "doble pareja" => 2, "trio" => 3, "poker" => 4);
        $maxPuntuacion = 0;

        foreach($parejas as $jugador => $pareja)
        {
            $puntuacion = $valoresParejas[$pareja];
            if($puntuacion > $maxPuntuacion)
            {
                $maxPuntuacion = $puntuacion;
            }
        }

        return $maxPuntuacion;
    }

    function escribirGanador($ganadores, $premio)
    {
        if(count($ganadores) != 0)
        {
            if(count($ganadores) > 1)
            {
                foreach($ganadores as $jugador)
                {
                    echo "El jugador $jugador ha ganado, y el premio es de " . ($premio/count($ganadores)) . "<br>";
                }
            }
            else
            {
                foreach($ganadores as $jugador)
                {
                    Echo "El ganador es $jugador y el premio asciende a: " . $premio;
                }
            }
        }
    }

    function premio($maxPuntuacion, $bote)
    {
        switch ($maxPuntuacion)
        {
            case 0:
                $premio = 0;
                return $premio;
            case 1:
                $premio = 0;
                return $premio;
            case 2: 
                $premio = $bote*0.5;
                return $premio;
            case 3:
                $premio = $bote*0.7;
                return $premio;
            case 4: 
                $premio = $bote;
                return $premio;
        }
    }


    function imprimirMano($jugadores, $parejas)
    {
        echo "<table border='1'";
        foreach($jugadores as $jugador => $cartas)
        {
            echo "<tr><td>$jugador</td>";
            foreach($cartas as $carta)
            {
                echo "<td><img src='images/$carta.PNG' style='width:100px; height:auto;'></td>";
            }
            echo "<td>" . $parejas[$jugador] . "</td></tr>";
        }
    }
?>


</body>
</html>