<HTML>
<h1>EJERCICIO 1</h1>
<BODY>
<?php
    $ip="10.33.1.1";

    $p1 = strpos($ip, ".");
    $p2 = strpos($ip, ".", $p1 + 1);
    $p3 = strpos($ip, ".", $p2 + 1);

    $oct1 = substr($ip, 0, $p1);
    $oct2 = substr($ip, $p1 + 1, $p2 - $p1 - 1);
    $oct3 = substr($ip, $p2 + 1, $p3 - $p2 - 1);
    $oct4 = substr($ip, $p3 + 1);

    echo "1er octeto : " . $oct1 . "<br>";
    echo "2o octeto : " . $oct2 . "<br>";
    echo "3er octeto : " . $oct3 . "<br>";
    echo "4o octeto : " . $oct4;

    echo "<h2>NUMERO BINARIO</h2>";
    echo sprintf("%08b", $oct1);
    echo sprintf(".%08b", $oct2);
    echo sprintf(".%08b", $oct3);
    echo sprintf(".%08b", $oct4);
    
    


?>
</BODY>
</HTML>