<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 3</title>
</head>
<body>
<?php
    $ipMascara = "192.168.16.100/16";

    //SACAR IP Y MASCARA SEPARADOS
    $posBarra = strpos($ipMascara, "/");
    $ip = substr($ipMascara,0,$posBarra);
    $mascara = substr($ipMascara,$posBarra + 1, strlen($ipMascara) - $posBarra - 1);

    //PASAR A OCTETOS Y BINARIO
    $p1 = strpos($ip, ".");
    $p2 = strpos($ip, ".", $p1 + 1);
    $p3 = strpos($ip, ".", $p2 + 1); 

    $oct1 = substr($ip, 0, $p1);
    $oct2 = substr($ip, $p1 + 1, $p2 - $p1 - 1);
    $oct3 = substr($ip, $p2 + 1, $p3 - $p2 - 1);
    $oct4 = substr($ip, $p3 + 1);

    $oct1 = sprintf("%08b",$oct1);
    $oct2 = sprintf("%08b",$oct2);
    $oct3 = sprintf("%08b",$oct3);
    $oct4 = sprintf("%08b",$oct4);

    $ipBinario = $oct1 . $oct2 . $oct3 . $oct4;

    //MASCARA BINARIO
    $mascaraBinario = str_repeat("1",$mascara) . str_repeat("0", 32 - $mascara);

   //DIRECCION DE RED
   $dirRedB = $ipBinario & $mascaraBinario;
   $dirRed = bindec(substr($dirRedB,0,8)) . "." .
        bindec(substr($dirRedB,8,8)) . "." .
        bindec(substr($dirRedB,16,8)) . "." .
        bindec(substr($dirRedB,24,8));
   
   //BROADCAST
   $broadcastB = $dirRedB | (~$mascaraBinario & str_repeat("1",32));
   $broadcast = bindec(substr($broadcastB,0,8)) . "." .
                bindec(substr($broadcastB,8,8)) . "." .
                bindec(substr($broadcastB,16,8)) . "." .
                bindec(substr($broadcastB,24,8));

    //RANGOS IPS
    $minIpB = str_pad(decbin(bindec($dirRedB)+ 1),32,"0", STR_PAD_LEFT);
    $minIp = bindec(substr($minIpB,0,8)) . "." .
             bindec(substr($minIpB,8,8)) . "." .
             bindec(substr($minIpB,16,8)) . "." .
             bindec(substr($minIpB,24,8));

    $maxIpB = str_pad(decbin(bindec($broadcastB)- 1), 32, "0", STR_PAD_LEFT);
    $maxIp = bindec(substr($maxIpB, 0,8)) . "." .
             bindec(substr($maxIpB, 8,8)) . "." .
             bindec(substr($maxIpB, 16,8)) . "." .
             bindec(substr($maxIpB, 24,8));

    //ESCRIBIR RESULTADOS
    echo "IP: " . $ipMascara;
    echo "<br>Mascara: " . $mascara;
    echo "<br>Dirección Red: " . $dirRed;
    echo "<br>Dirección Broadcast: " . $broadcast;
    echo "<br>Rango: " . $minIp . " a " . $maxIp; 




?>
</body>
</html>