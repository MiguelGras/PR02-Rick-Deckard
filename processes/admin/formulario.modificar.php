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
    $id_usuario=$_GET['id_usuario'];
    $nombre=$_GET['nombre_usuario'];
    $apellido=$_GET['apellido_usuario'];
    $email=$_GET['email_usuario'];
    $telf=$_GET['telf_usuario'];
    $contra=$_GET['contra_usuario'];

    /*
    echo $id_usuario;
    echo "<br>";
    echo $nombre;
    echo "<br>";
    echo $apellido;
    echo "<br>";
    echo $telf;
    echo "<br>";
    echo $contra;
    die;
    */

?>
<div class='paddingtop'>
        <a class='btnhistorial' href='../../view/admin/administradores.php'>Atras</a>
        <a class='btnlogout' href='../../processes/logout.php'>Log Out</a>
</div>
    <br>
<?php
echo "<div class='filtrado'>";
    echo "<form action='modificar.admin.php?id_usuario={$id_usuario}' method='POST'>";
        echo "<p>Nombre: <input type='text' name='nombre' size='60' value='{$nombre}' required></p>";
        echo "<p>Apellido: <input type='text' name='apellido' size='40' value='{$apellido}' required></p>";
        echo "<p>Email: <input type='email' name='email' size='40' value='{$email}' required></p>";
        echo "<p>Telefono: <input type='number' name='telf' size='40' value='{$telf}' required></p>";
        echo "<p>Contraseña: <input type='text' name='contra' size='40' value='{$contra}' required></p>";
        echo "<input type='submit' value='Enviar'>";
    echo "</form>";
echo "</div>";
?>

</body>
</html>