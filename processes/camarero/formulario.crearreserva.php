<!DOCTYPE html>
<html>
<title>CREAR RESERVA</title>
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

include '../../view/ver.php';
include '../../services/conexion.php';
session_start();
if(!empty($_SESSION['email'])){

$id_mesa=$_GET['id_mesa'];

echo "<div class='paddingtop'>";
        echo "<a class='btnhistorial' href='../../view/camarero/reservamesa.php?id_mesa=$id_mesa'>Atras</a>";
        echo "<a class='btnlogout' href='../../processes/logout.php'>Log Out</a>";
echo "</div>";
echo "<br><br>";
echo "<h2><b>Administrar mesas</b></h2>";

echo"<br>";
echo"<div class='filtrado'>";
    echo"<form action='insertar.reserva.php?id_mesa=$id_mesa' method='POST'>";
        echo"<p>Fecha: <input type='date' name='fecha' size='60' min='curdate('Y-m-d')' required></p>";
        echo"<p>Hora: <input type='time' name='horainicial' size='40' required></p>";
        echo"<p>Nombre Reserva: <input type='text' name='nombre' size='40' required></p>";
        echo"<input type='submit' value='Enviar'>";
    echo"</form>";
echo"</div>";

}else{
    header("Location:../index.php");
}
?>
</body>
</body>