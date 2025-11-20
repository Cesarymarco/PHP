<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comaltapro</title>
</head>
<body>
    <?php
        try
        {
            include "../limpiar.php";

            $servername = "localhost";
            $username = "root";
            $password = "rootroot";
            $dbname = "comprasweb";
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sqlCat = "SELECT ID_CATEGORIA, NOMBRE FROM categoria";
            $stmt = $conn->prepare($sqlCat);
            $stmt->execute();
            $categorias = $stmt->fetchAll (PDO::FETCH_ASSOC);
    ?>


    <h1>PRODUCTOS</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Nombre:</label>
        <input type="text" name="nombre"><p></p>
        <label>Precio:</label>
        <input type="number" name="precio"><p></p>
        <label>Categoria:</label>
        <select name="Categoria">
            <?php
                foreach($categorias as $categoria)
                {
                    echo "<option value='" . $categoria['ID_CATEGORIA'] . "'>" . $categoria['NOMBRE'] . "</option>";
                }
            ?>
        </select><p></p>
        <input type="submit" value="Crear Producto">
    </form>


<?php

        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {                  

    
            $nombre = $_POST["nombre"];
            test_input($nombre);
            $precio = $_POST["precio"];
            test_input($precio);
            $id_categoria = $_POST["Categoria"];
            test_input($id_categoria);

            $id_prodcuto = obtenerIDproducto($conn);
            insertarProducto($id_prodcuto, $nombre, $precio, $id_categoria, $conn);
        }
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    




    function obtenerIDproducto($conn)
    {
        $sql = "SELECT MAX(ID_PRODUCTO) FROM producto";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $num= $stmt->fetch(PDO::FETCH_ASSOC);

        $num = str_pad(end($num)+1, 4, 0, STR_PAD_LEFT);

        $ID = "P" . $num;

        return $ID;
    }

    function insertarProducto($id_prodcuto, $nombre, $precio, $id_categoria, $conn)
    {
        $sql = "INSERT INTO producto (ID_PRODUCTO, NOMBRE, PRECIO, ID_CATEGORIA) VALUES (:ID_PRODUCTO, :NOMBRE, :PRECIO, :ID_CATEGORIA)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ID_PRODUCTO', $id_prodcuto);
        $stmt->bindParam(':NOMBRE', $nombre);
        $stmt->bindParam(':PRECIO', $precio);
        $stmt->bindParam(':ID_CATEGORIA', $id_categoria);

        $stmt->execute();
        echo "Producto insertado con exito";

    }
?>

</body>

</html>
