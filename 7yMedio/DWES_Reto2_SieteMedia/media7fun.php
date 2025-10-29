<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
</head>
<body>
    
<?php

    function rellenarJugadores($jugadores, $nombre1, $nombre2, $nombre3, $nombre4)
    {
        $nombres = [$nombre1, $nombre2, $nombre3, $nombre4];

        foreach($nombres as $nombre)
        {
            $jugadores[$nombre]= [];
        }

       return $jugadores;
    }

    function crearCartas($jugadores, $numCartas)
    {
        foreach($jugadores as $jugador => &$cartas)
        {
            for($i = 0; $i < $numCartas; $i++)
            {
                $cartas[] = cartaValida($cartas, $jugadores);
            }
        }
        return $jugadores;
    }

    function cartaValida($carta, $jugadores)
    {
        //CREAMOS UNA BARAJA PARA ASIGNAR LAS CARTAS
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

        $carta = $baraja[array_rand($baraja)];

        while(!comprobarCarta($carta,$jugadores))
        {
            $carta = $baraja[array_rand($baraja)];
        }
        
        return $carta;  
    }

    function comprobarCarta($carta, $jugadores)
    {

        foreach ( $jugadores as $jugador => $valor)
        {
            if(in_array($carta,$valor))
            {
                return false;
            }
        }

        return true;
    }


    function ganador($jugadores, $apuesta)
    {
        $puntaciones = array();

        foreach($jugadores as $jugador => $cartas)
        {
            $suma = 0;
            foreach($cartas as $carta)
            {
                $valor = substr($carta, 0, -1);
                if($valor == "J" || $valor == "Q" || $valor == "K")
                {
                    $suma += 0.5;
                }else
                {
                    $suma += (float)$valor;
                }

                
            }
            $puntaciones[$jugador] = $suma;
        }

        //VER EL GANADOR
        $ganadores = array();
        $mejorPuntacion = 0;

        foreach($puntaciones as $jugador => $puntuacion)
        {
            if($puntuacion <= 7.5 && $puntuacion > $mejorPuntacion)
            {
                $mejorPuntacion = $puntuacion;
            }
        }

        foreach($puntaciones as $jugador => $puntuacion)
        {
            if($puntuacion == $mejorPuntacion && $mejorPuntacion > 0)
            {
                $ganadores[] = $jugador;
            }
        }

        $premio = 0;
        $premio = calcularPremio($ganadores, $apuesta, $mejorPuntacion);

        escribirGanador($ganadores, $premio, $mejorPuntacion, $apuesta);
        escribirFichero($ganadores, $premio, $puntaciones, $jugadores, $mejorPuntacion);
    }


    function calcularPremio($ganadores, $apuesta, $mejorPuntacion)
    {
        $premio = 0;

        if($mejorPuntacion == 7.5)
        {
            $apuesta *= 0.8;

            $premio = $apuesta/count($ganadores);
        }
        elseif($mejorPuntacion < 7.5 && $mejorPuntacion > 0)
        {
            $apuesta *= 0.5;

            $premio = $apuesta/count($ganadores);
        }

        return $premio;
    }


    function escribirGanador($ganadores, $premio, $mejorPuntacion, $apuesta)
    {

        if(count($ganadores) == 0)
        {
            echo "NO hay ganadores, el bote acumulado es de $apuesta <br>";
        }
        else
        {
            foreach($ganadores as $ganador)
            {
                echo("$ganador  ha ganado la partida con una puntacion de $mejorPuntacion  <br>");
            }
            
            echo ("Los ganadores han obtenido $premio &euro; <br>");
        }

    }


    function escribirFichero($ganadores, $premio, $puntuaciones, $jugadores, $mejorPuntacion)
    {

        $fecha = date("dmYHis");
        $nombreFichero = "apuestas_" . $fecha . ".txt";

        $fichero = fopen($nombreFichero, "w");

        if(!$fichero)
        {
            echo("ERROR AL CREAR EL FICHERO!!");
            return;
        }

        foreach($jugadores as $jugador => $cartas)
        {
            $palabras = explode(" ", $jugador);
            $iniciales = "";
            foreach($palabras as $palabra)
            {
                $iniciales .= strtoupper(substr($palabra, 0, 1));
            }
            
            if(count($ganadores) > 0)
            {
                if($puntuaciones[$jugador] == $mejorPuntacion)
                {                
                    $escribir = $iniciales . "#" . $puntuaciones[$jugador] . "#" . ($premio/count($ganadores) . "\n");
                }else
                {
                    $escribir = $iniciales . "#" . $puntuaciones[$jugador] . "#0" . "\n";
                }
            }
            elseif(count($ganadores) == 0)
            {
                $escribir = $iniciales . "#" . $puntuaciones[$jugador] . "#0" . "\n";
            }
            fwrite($fichero,$escribir);
        }


        $totalPremio = $premio*count($ganadores);

        $lineaFinal = "TOTAL PREMIOS#" . count($ganadores) . "#" . $totalPremio . "\n";
        fwrite($fichero, $lineaFinal);

        fclose($fichero);


    }


    function crearTabla($jugadores)
    {
        echo "<table border = '1'";
        foreach($jugadores as $jugador => $cartas)
        {
            echo "<tr><td>$jugador</td>";
            foreach($cartas as $carta)
            {
                echo "<td><img src='images/$carta.PNG' style='width:100px; height:auto;'></td>";
            }
            echo "</tr>";
        }


        echo "</table>";
    }
?>

</body>
</html>