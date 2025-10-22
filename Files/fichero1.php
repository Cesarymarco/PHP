<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fichero1</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Nombre alumno: </label>
        <input type="text" name="nombre" required>
        <br>
        <label>Primer apellido:</label>
        <input type="text" name="apellido1" required>
        <br>
        <label>Segundo apellido</label>
        <input type="text" name="apellido2" required>
        <br>
        <label>Fecha de nacimiento</label>
        <input type="date" name="fecna" required>
        <br>
        <label>Localidad</label>
        <input type="text" name="localidad" required>
        <br>
        <input type="submit" value="enviar">

    </form>

    <?php
        
       if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $nombre = $_POST["nombre"];
            $apellido1 = $_POST["apellido1"];
            $apellido2 = $_POST["apellido2"];
            $fecha = $_POST["fecna"];
            $localidad = $_POST["localidad"];

            function rellenar($txt, $long)
            {
                $txt = substr($txt, 0, $long);
                return str_pad($txt,$long, " ");
            }

            $nombre = rellenar($nombre, 40);
            $apellido1 = rellenar($apellido1, 41);
            $apellido2 = rellenar($apellido2, 42);
            $fecha = rellenar($fecha,10);
            $localidad = rellenar($localidad, 27);
            
            $txt = $nombre . $apellido1 . $apellido2 . $fecha . $localidad ."\n";

           
            $alumnos = fopen("alumnos1.txt", "a");

            if($alumnos) 
            {
                fwrite($alumnos, $txt);
                fclose($alumnos);
            }
            
        }
    ?>

</body>
</html>