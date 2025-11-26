<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comaltaalm</title>
</head>
<body>
    
    <?php
        try
        {
            include "../../../limpiar.php";
            include "../conectarCompras.php";
            include "comaltaalmfun.php";

            $conn = Conectar();
    
    ?>

    <h1>Crear Almacen</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Localidad:</label>
        <input type="text" name="localidad"><p></p>
        <input type="submit" value="Crear Almacen">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {  
            $localidad = $_POST["localidad"];
            test_input($localidad);

            $num = crearNumAlmacen($conn);

            crearAlmacen($conn, $localidad, $num);

        }
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    
    
    ?>

</body>
</html>