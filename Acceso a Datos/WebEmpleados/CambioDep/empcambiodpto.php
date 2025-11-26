<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>empcambiodpto</title>
</head>
<body>
    
    <?php
        try
        {
            include "../../../limpiar.php";
            include "../conectarEmpleados.php";
            include "empcambiodptofunç.php";

            $conn = Conectar();
            $empleados = escogerEmpleado($conn);
            $departamentos = escogerDepartamento($conn);
    ?>

    <h1>CAMBIAR EMPLEADO DE DEPARTAMENTO</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Dni del empleado: </label>
        <select name="dni">
            <?php
                foreach($empleados as $empleado)
                {
                    echo "<option value='" . $empleado['dni'] . "'>" . $empleado['dni'] . "</option>";
                }
            ?>
        </select><p></p>
        <label>Nuevo departamento: </label>
        <select name="departamento">
            <?php
                foreach($departamentos as $departamento)
                {
                    echo "<option value='" . $departamento['cod_dpto'] . "'>" . $departamento['nombre_dpto'] . "</option>";
                }
            ?>
        </select><p></p>
        <input type="submit" value="Cambiar Empleado">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $dni = $_POST["dni"];
            test_input($dni);

            $departamento = $_POST["departamento"];
            test_input($departamento);

            cambiarDepto($conn, $dni, $departamento);
        }
        }catch(PDOException $e) {

            $conn->rollback();
            echo "Error: " . $e->getMessage();
        }
    ?>

</body>
</html>