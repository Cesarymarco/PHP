<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>empaltadpto</title>
</head>
<body>
    
    <?php
        try
        {
            include "../../../limpiar.php";
            include "../conectarEmpleados.php";
            include "empaltadptofun.php";
            
            $conn = Conectar();

            $conn->beginTransaction();
        
    ?>
    
    <h1>CREAR DEPARTAMENTOS</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Nombre: </label>
        <input type="text" name="nombre"><p></p>
        <input type="submit" value="Crear Departamento">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $nombre = $_POST["nombre"];
            test_input($nombre);

            $id = crearID($conn);
            
            crearDepartamento($conn, $id, $nombre);

            $conn->commit();


        }
        }catch(PDOException $e) {

            $conn->rollback();
            echo "Error: " . $e->getMessage();
        }
    ?>

</body>
</html>