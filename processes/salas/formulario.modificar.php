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
    
        $id_sala=$_GET['id_sala'];
        $nombre=$_GET['nombre_sala'];
        $img_sala=$_GET['img_sala'];
        //echo $ubicacion;

?>
<div class='paddingtop'>
        <a class='btnhistorial' href='../../view/admin/salas.php'>Atras</a>
        <a class='btnlogout' href='../../processes/logout.php'>Log Out</a>
</div>
    <br><br>
<h2><b>Modificar Sala</b></h2>
<?php
/*------------------
$ubicacionsql=$pdo->prepare("SELECT DISTINCT ubicacion_mesa FROM tbl_mesas");
$ubicacionsql->execute();
$listaUbicacion=$ubicacionsql->fetchAll(PDO::FETCH_ASSOC);
*//*------------------
$salassql=$pdo->prepare("SELECT nombre_sala FROM tbl_salas WHERE id_sala=$id_sala");
$salassql->execute();
$listaSalas=$salassql->fetchAll(PDO::FETCH_ASSOC);
*///------------------
echo "<div>";
    echo "<center>";
        echo "<form action='modificar.sala.php?id_sala={$id_sala}' enctype='multipart/form-data'  method='POST'>";
            echo "<p class='feedback-input'>Nombre de la sala: <input type='text' name='nombre' size='60' value='{$nombre}'></p>";
            echo "<p class='feedback-input'>Imagen evento: <input class='form-control' type='file' accept='image/*' name='file' id='' width='100%' required></p>";
            echo "<p class='feedback-input'>Imagen actual: <br><img style='width:300px;height:200px;' src='{$img_sala}'></p>";
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