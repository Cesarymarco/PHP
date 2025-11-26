<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comaltacat</title>
</head>
<body>

    <h1>ALTA DE CATEGORIAS</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Nombre de la categoria:</label>
        <input type="text" name="nombre"><p></p>
        <input type="submit" value="Crear Categoria">
    </form>



<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        include "../../limpiar.php";

        $servername = "localhost";
        $username = "root";
        $password = "rootroot";
        $dbname = "comprasweb";

        try
        {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $nombre = $_POST["nombre"];
            test_input($nombre);
            
            $id = obetenerID($conn);
            $sentencia = "INSERT INTO categoria (ID_CATEGORIA, NOMBRE) VALUES (:ID_CATEGORIA, :NOMBRE)";
            
            $stmt = $conn->prepare($sentencia);
            $stmt->bindParam(':ID_CATEGORIA', $id);
            $stmt->bindParam(':NOMBRE', $nombre);

            $stmt->execute();
            echo "Categoria creada con exito";

        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    function obetenerID($conn)
    {
        $sql = "SELECT MAX(ID_CATEGORIA) FROM categoria";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $num = $stmt->fetch(PDO::FETCH_ASSOC);

        $num = str_pad(end($num)+1, 3, "0", STR_PAD_LEFT);

        $id = "C-" . $num;
        return $id;
    }

?>


</body>
</html>