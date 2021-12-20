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
    <title>Modificar usuario</title>
</head>

<body>
<?php 

include '../../services/config.php';
include '../../services/conexion.php';

session_start();
if(!empty($_SESSION['email'])){
    
    $id_usuario=$_GET['id_usuario'];
    $tipo_usuario=$_GET['tipo_usuario'];
    $nombre=$_GET['nombre_usuario'];
    $apellido=$_GET['apellido_usuario'];
    $email=$_GET['email_usuario'];
    $telf=$_GET['telf_usuario'];

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
<a class='btnhistorial' href='../../view/admin/administradores.php'>Administradores</a>
        <a class='btnhistorial' href='../../view/admin/camareros.php'>Camareros</a>
        <a class='btnlogout' href='../../processes/logout.php'>Log Out</a>
</div>
<br><br>
    <h2><b>Modificar Usuario</b></h2>
<?php
echo "<div>";
    echo "<center>";
        echo "<form action='modificar.usuario.php?id_usuario={$id_usuario}&tipo_usuario={$tipo_usuario}' method='POST'>";
            echo "<p class='feedback-input'>Nombre: <input type='text' name='nombre' size='60' value='{$nombre}' required></p>";
            echo "<p class='feedback-input'>Apellido: <input type='text' name='apellido' size='40' value='{$apellido}' required></p>";
            echo "<p class='feedback-input'>Email: <input type='email' name='email' size='40' value='{$email}' required></p>";
            echo "<p class='feedback-input'>Telefono: <input type='number' name='telf' size='40' value='{$telf}' required></p>";
            echo "<input type='submit' value='Enviar' class='btnhistorial'>";
        echo "</form>";
    echo "</center>";
echo "</div>";

}else{
    header("Location:../index.php");
}
?>

</body>
</html>