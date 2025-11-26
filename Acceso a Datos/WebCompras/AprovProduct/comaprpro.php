<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comaprpro</title>
</head>
<body>

    <?php
        try
        {
            include "../../../limpiar.php";
            include "../conectarCompras.php";
            include "comaprprofun.php";

            $conn = Conectar();
    ?>

    <h1>ASIGNAR PRODUCTOS</h1>
    <form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Producto: </label>
        <select name="producto">
            <?php
                $productos = accesoProducto($conn);
                
                foreach($productos as $producto)
                {
                    echo "<option value='" . $producto['ID_PRODUCTO'] . "'>" . $producto['NOMBRE'] . "</option>";
                }
            ?>
        </select><p></p>
        <label>Almacen: </label>
        <select name="almacen">
            <?php
                $almacenes = idAlmacen($conn);

                foreach($almacenes as $almacen)
                {
                    echo "<option value='" . $almacen['NUM_ALMACEN'] . "'>" . $almacen['NUM_ALMACEN'] . "</option>";
                }
            ?>
        </select><p></p>
        <label>Cantidad: </label>
        <input type="number" name="cantidad"><p></p>
        <input type="submit" value="Asignar Producto">

    </form>
    
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $idProducto = $_POST["producto"];
            test_input($idProducto);

            $numAlmacen = $_POST["almacen"];
            test_input($numAlmacen);

            $cantidad = $_POST["cantidad"];
            test_input($cantidad);

            añadirProducto($conn, $idProducto, $numAlmacen, $cantidad);
        }
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    ?>

</body>
</html>