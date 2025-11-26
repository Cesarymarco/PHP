<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>empaltadptofun</title>
</head>
<body>
    
    <?php
        function crearID($conn)
        {
            $sql = "SELECT MAX(cod_dpto) AS max_cod FROM departamento";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $num = $stmt->fetch(PDO::FETCH_ASSOC);

            if($num)
            {
                $num = intval(substr($num['max_cod'],1))+1;
            }

            $num = str_pad($num, 3, 0, STR_PAD_LEFT);
            
            $id = "D" . $num;

            return $id;
        }

        function crearDepartamento($conn, $id, $nombre)
        {
            $sql = "INSERT INTO departamento (cod_dpto, nombre_dpto) VALUES (:cod_dpto, :nombre_dpto)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':cod_dpto', $id);
            $stmt->bindParam(':nombre_dpto', $nombre);

            $stmt->execute();
            echo "Departamento asignador con exito.<br>";
        }
    ?>

</body>
</html>