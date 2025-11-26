<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>empcambiodptofun</title>
</head>
<body>
    
    <?php
        function escogerEmpleado($conn)
        {
            $sql = "SELECT dni FROM empleado";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $empleados;
        }

        function escogerDepartamento($conn)
        {
            $sql = "SELECT cod_dpto, nombre_dpto FROM departamento";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $departamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $departamentos;
        }


        function cambiarDepto($conn, $dni, $dpto)
        {
            $fecha_ini = date("Y-m-d");
            $sql = "INSERT INTO emple_depart (dni, cod_dpto, fecha_ini, fecha_fin) VALUES (:dni, :cod_dpto, :fecha_ini, :fecha_fin)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':dni', $dni);
            $stmt->bindParam(':cod_dpto', $dpto);
            $stmt->bindParam(':fecha_ini', $fecha_ini);
            $stmt->bindValue(':fecha_fin', null, PDO::PARAM_NULL);

            actualizarEmp($conn, $dni);
            $stmt->execute();
            echo "Empleado cambiado de departamento con exito<br>";
        }

        function actualizarEmp($conn, $dni)
        {
            $fecha_fin = date("Y-m-d");
            $sql = "UPDATE emple_depart SET fecha_fin = :fecha_fin WHERE dni = :dni";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':fecha_fin', $fecha_fin);
            $stmt->bindParam(':dni', $dni);

            $stmt->execute();
            echo "Tabla emple_depart actualizada con exito<br>";
        }
    ?>

</body>
</html>