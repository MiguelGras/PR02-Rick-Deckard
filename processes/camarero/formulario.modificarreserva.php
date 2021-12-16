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
    $id_mesa=$_GET['id_mesa'];
    $id_reserva=$_GET['id_reserva'];
    $fecha=$_GET['fecha_reserva'];
    $hora=$_GET['hora'];
    $nombre=$_GET['nombre'];

    /*
    echo $id_mesa;
    echo "<br>";
    echo $id_reserva;
    echo "<br>";
    echo $fecha;
    echo "<br>";
    echo $hora;
    echo "<br>";
    echo $nombre;
    */


echo "<div class='paddingtop'>";
        echo "<a class='btnhistorial' href='../../view/camarero/reservamesa.php?id_mesa=$id_mesa'>Atras</a>";
        echo "<a class='btnlogout' href='../../processes/logout.php'>Log Out</a>";
echo "</div>";
//die;
echo "<br>";

echo "<div class='filtrado'>";
    echo "<form action='modificar.reserva.php?id_mesa={$id_mesa}&id_reserva={$id_reserva}' method='POST'>";
        echo "<p>Fecha: <input type='date' name='fecha' size='60' value='{$fecha}' required></p>";
        echo "<p>Hora: <input type='time' name='hora' size='40' value='{$hora}' required></p>";
        echo "<p>Nombre Reserva: <input type='text' name='nombre' size='40' value='{$nombre}' required></p>";
        echo "<input type='submit' value='Enviar'>";
    echo "</form>";
echo "</div>";
?>

</body>
</html>