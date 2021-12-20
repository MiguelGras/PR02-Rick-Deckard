<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/vista.css">
    <link rel="shortcut icon" type="image/png" href="../../img/icono.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../js/modalbox.js"></script>
    <script src="../../js/vista.js"></script>
    <title>Menu</title>
</head>
<body>
    <div class='paddingtop'>
        <a class='btnlogout' href="../../processes/logout.php">Log Out</a>
    </div>

<?php
    include '../../services/conexion.php';

    $sentencia=$pdo->prepare("SELECT nombre_sala,img_sala FROM tbl_salas");
    $sentencia->execute();
    $listaSalas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        echo "<div class='container'>";
            foreach ($listaSalas as $sala) {
                echo "<div class='box'>";
                    echo "<center><a href='{$sala['nombre_sala']}.php'><img src='{$sala['img_sala']}'></a></center>";
                    echo "<span>{$sala['nombre_sala']}</span>";
                echo "</div>";
            }
        echo "</div>";
?>   
</body>
</html>