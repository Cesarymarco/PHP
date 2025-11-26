<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>empaltaemp</title>
</head>
<body>
    
    <?php
        try
        {
            include "../../../limpiar.php";
            include "../conectarEmpleados.php";
            include "empaltaempfun.php";

            $conn = Conectar();
            $conn->beginTransaction();


        
    ?>

    <h1>Alta de empleado</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>DNI: </label>
        <input type="text" name="dni"><p></p>
        <label>Nombre: </label>
        <input type="text" name="nombre"><p></p>
        <label>Apellidos: </label>
        <input type="text" name="apellidos"><p></p>
        <label>Nacimiento: </label>
        <input type="date" name="cumple"><p></p>
        <label>Salario: </label>
        <input type="number" name="salario"><p></p>
        <label>Departamento: </label>
        <select name="departamento">
            <?php
                $op = opcionesDep($conn);
                
                foreach($op as $opcion)
                {
                    echo "<option value='" . $opcion['cod_dpto'] . "'>" . $opcion['nombre_dpto'] . "</option>";
                }
            ?>
        </select><p></p>
        <input type="submit" value="Ingresar Empleado">
    </form>
    


    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $dni = $_POST["dni"];
            test_input($dni);

            $nombre = $_POST["nombre"];
            test_input($nombre);

            $apellidos = $_POST["apellidos"];
            test_input($apellidos);

            $cumple = $_POST["cumple"];
            test_input($cumple);

            $salario = $_POST["salario"];
            test_input($salario);

            $id_dept = $_POST["departamento"];
            test_input($id_dept);

            $fecha_inic = date("Y-m-d");

            insertarEmpleado($conn, $dni, $nombre, $apellidos, $cumple, $salario);
            empleadoDep($conn, $dni, $id_dept, $fecha_inic);

            $conn->commit();
        }
        }catch(PDOException $e) {

            $conn->rollback();
            
            mostrarError($e, ["dpto" => $id_dept, "dni" => $dni]);
        }
    ?>
</body>
</html>