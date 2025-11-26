<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comaltaalmfun</title>
</head>
<body>
    
    <?php
        function crearNumAlmacen($conn)
        {
            $sql = "SELECT MAX(NUM_ALMACEN) FROM almacen";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $num = $stmt->fetch(PDO::FETCH_ASSOC);

            $num = end($num)+1;
            return $num;
        }


        function crearAlmacen($conn, $localidad, $num)
        {
            $sql = "INSERT INTO almacen (NUM_ALMACEN, LOCALIDAD) VALUES (:NUM_ALMACEN, :LOCALIDAD)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':NUM_ALMACEN', $num);
            $stmt->bindParam(':LOCALIDAD', $localidad);

            $stmt->execute();
            echo "El almacen ha sido añadido con exito";
        }
    ?>


</body>
</html>