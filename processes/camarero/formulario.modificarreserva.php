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

session_start();
if(!empty($_SESSION['email'])){

    $id_mesa=$_GET['id_mesa'];
    $id_reserva=$_GET['id_reserva'];

    $fecha=$_GET['fecha_reserva'];
    $horainicial=$_GET['horainicial'];

    $nombre=$_GET['nombre'];

    $fechasistema=date('Y-m-d');

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
echo "<br><br>";
echo "<h2><b>Modificar Reserva</b></h2>";

echo "<div>";
echo "<center>";
    echo "<form action='modificar.reserva.php?id_mesa={$id_mesa}&id_reserva={$id_reserva}&fecha_reserva=$fecha&horainicial=$horainicial&nombre=$nombre' method='POST'>";
        echo "<p class='feedback-input'>Fecha: <input type='date' name='fecha' size='60' value='{$fecha}' min=$fechasistema required></p>";
        echo "<p class='feedback-input'>Hora: <select name='hora'>";
                    echo "<option value='$horainicial' selected>$horainicial</option>";
                    echo "<option value='10:00:00'>10:00:00</option>";
                    echo "<option value='11:00:00'>11:00:00</option>";
                    echo "<option value='12:00:00'>12:00:00</option>";
                    echo "<option value='13:00:00'>13:00:00</option>";
                    echo "<option value='14:00:00'>14:00:00</option>";
                    echo "<option value='15:00:00'>15:00:00</option>";
                    echo "<option value='16:00:00'>16:00:00</option>";
                    echo "<option value='17:00:00'>17:00:00</option>";
                    echo "<option value='18:00:00'>18:00:00</option>";
                    echo "<option value='19:00:00'>19:00:00</option>";
                    echo "<option value='20:00:00'>20:00:00</option>";
              echo "</select>";
        //<p><input type='time' name='hora' size='40' value='{$horainicial}' required></p>
        echo "<p class='feedback-input'>Nombre Reserva: <input type='text' name='nombre' size='40' value='{$nombre}' required></p>";
        echo "<input type='submit' value='Enviar'>";
    echo "</form>";
    echo "</center>";
echo "</div>";

}else{
    header("Location:../index.php");
}
?>

</body>
</html>