<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>empaltaempfun</title>
</head>
<body>
    
    <?php
        function opcionesDep($conn)
        {
            $sql = "SELECT cod_dpto, nombre_dpto FROM departamento";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $opciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

            

            return $opciones;
        }

        function insertarEmpleado($conn, $dni, $nombre, $apellidos, $cumple, $salario)
        {
            $sql = "INSERT INTO empleado (dni, nombre, apellidos, fecha_nac, salario) VALUES (:dni, :nombre, :apellidos, :fecha_nac, :salario)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':dni', $dni);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellidos', $apellidos);
            $stmt->bindParam(':fecha_nac', $cumple);
            $stmt->bindParam(':salario', $salario);

            $stmt->execute();
            echo "Empleado insertado a la tabla empleado con exito.<br>";
        }

        function empleadoDep($conn, $dni, $id_dept, $fecha_inic )
        {
            $sql = "INSERT INTO emple_depart (dni, cod_dpto, fecha_ini, fecha_fin) VALUES (:dni, :cod_dpto, :fecha_ini, :fecha_fin)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':dni', $dni);
            $stmt->bindParam(':cod_dpto', $id_dept);
            $stmt->bindParam(':fecha_ini', $fecha_inic);
            $stmt->bindValue(':fecha_fin', null, PDO::PARAM_NULL);

            $stmt->execute();
            echo "Empleado insertado a la tabla emple_depart con exito.<br>";
        }

        function mostrarError($e, $informacion)
        {
            $codigo = $e->getCode();

            switch($codigo)
            {
                case 1062:
                    echo "Ya hay un empleado con el dni " . $informacion['dni'] . "<br>";
                    return;
            }
        }
    ?>

</body>
</html>