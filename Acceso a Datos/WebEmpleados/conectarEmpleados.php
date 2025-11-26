<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conectar</title>
</head>
<body>
    

    <?php

        function Conectar()
        {
            $servername = "localhost";
            $username = "root";
            $password = "rootroot";
            $dbname = "empleados";
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        }
    ?>


</body>
</html>