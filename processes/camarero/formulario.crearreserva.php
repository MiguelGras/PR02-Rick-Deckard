<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/vista.css">
    <link rel="shortcut icon" type="image/png" href="../../img/icono.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../js/modalbox.js"></script>
    <script src="../../js/login.js"></script>
    <title>Crear reserva</title>
</head>

<body>
<?php

include '../../view/ver.php';
include '../../services/conexion.php';
session_start();
if(!empty($_SESSION['email'])){

$id_mesa=$_GET['id_mesa'];
$fechasistema=date('Y-m-d');


echo "<div class='paddingtop'>";
        echo "<a class='btnhistorial' href='../../view/camarero/reservamesa.php?id_mesa=$id_mesa'>Atras</a>";
        echo "<a class='btnlogout' href='../../processes/logout.php'>Log Out</a>";
echo"</div>";
?>
<br><br>
<h2><b>Insertar Reserva</b></h2>

<div>
    <?php
    echo "<center>";
    echo"<form action='insertar.reserva.php?id_mesa=$id_mesa' method='POST'>";
    
            echo"<p class='feedback-input'>Fecha: <input type='date' name='fecha' size='60' min=$fechasistema required></p>";
            echo"<p class='feedback-input'>Hora: <select name='horainicial' required>";
                    echo" <option value=''></option>";
                    echo" <option value='10:00:00'>10:00:00</option>";
                    echo"<option value='11:00:00'>11:00:00</option>";
                    echo"<option value='12:00:00'>12:00:00</option>";
                    echo"<option value='13:00:00'>13:00:00</option>";
                    echo"<option value='14:00:00'>14:00:00</option>";
                    echo"<option value='15:00:00'>15:00:00</option>";
                    echo"<option value='16:00:00'>16:00:00</option>";
                    echo"<option value='17:00:00'>17:00:00</option>";
                    echo"<option value='18:00:00'>18:00:00</option>";
                    echo"<option value='19:00:00'>19:00:00</option>";
                    echo"<option value='20:00:00'>20:00:00</option>";
                echo"</select></p>";
            echo"<p class='feedback-input'>Nombre Reserva: <input type='text' name='nombre' size='40' required></p>";
        echo"<input type='submit' value='Enviar' class='btnhistorial'>";
    echo"</form>";
    echo "</center>";
echo"</div>";

}else{
    header("Location:../index.php");
}
?>
</body>
</body>