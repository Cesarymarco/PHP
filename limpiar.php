<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limpiar</title>
</head>
<body>
    
<?php

    function test_input($data) 
    {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
        return $data;
    }

?>

</body>
</html>