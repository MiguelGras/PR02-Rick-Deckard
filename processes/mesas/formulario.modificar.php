<!DOCTYPE html>
<html>
<title>Modificar mesa</title>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/vista.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../js/modalbox.js"></script>
    <script src="../../js/login.js"></script>
    <title>Vista Proyecto RICK-DECKARD21</title>
</head>

<body>
<?php 

include '../../services/config.php';
include '../../services/conexion.php';
    $capacidad=$_GET['capacidad_mesa'];
    $ubicacion=$_GET['ubicacion_mesa'];
    $id_mesa=$_GET['id_mesa'];
    //echo $ubicacion;

?>
<div class='paddingtop'>
        <a class='btnhistorial' href='../../view/admin/vistaadmin.php'>Atras</a>
        <a class='btnlogout' href='../../processes/logout.php'>Log Out</a>
</div>
    <br>
<?php
echo "<div class='filtrado'>";
    echo "<form action='modificar.mesa.php?id_mesa={$id_mesa}' method='POST'>";
        echo "<p>Capacidad: <input type='number' name='capacidad' size='60' value='{$capacidad}'></p>";
        echo "<p>Ubicacion: <input type='text' name='ubicacion' size='40' value='{$ubicacion}'></p>";
        echo "<input type='submit' value='Enviar'>";
    echo "</form>";
echo "</div>";
?>

</body>
</html>