<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comaprprofun</title>
</head>
<body>
    
    <?php
        function accesoProducto($conn)
        {            
            $sql = "SELECT ID_PRODUCTO, NOMBRE FROM producto";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $productos;
        }

        function idAlmacen($conn)
        {
            $sql = "SELECT NUM_ALMACEN FROM almacen";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $almacenes = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $almacenes;
        }

        function añadirProducto($conn, $id, $num, $cantidad)
        {
            $sql = "INSERT INTO almacena (NUM_ALMACEN, ID_PRODUCTO, CANTIDAD) VALUES (:NUM_ALMACEN, :ID_PRODUCTO, :CANTIDAD)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':NUM_ALMACEN', $num);
            $stmt->bindParam(':ID_PRODUCTO', $id);
            $stmt->bindParam(':CANTIDAD', $cantidad);

            $stmt->execute();
            echo "Producto añadido con exito";
        }
    ?>

</body>
</html>