<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/vista.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/modalbox.js"></script>
    <script src="../js/vista.js"></script>
    <title>Vista Proyecto RICK-DECKARD21</title>
</head>
<body>
    <div class='paddingtop'>
        <a class='btnlogout' href="../processes/logout.php">Log Out</a>
    </div>
    <div class="table-centrada">
        <a href='camareros.php'>Camareros</a>
        <a href='administradores.php'>Administradores</a>
        <a href='vista.php'>Vista mesas</a>
    </div>
<div class="filtrado">
    <a type="button" class="filtrado" type="submit" value="Crear" name="crear" href='../processes/crear.php'>Crear</a>    
</div>
<?php
echo "<div class='table-centrada'>";
echo "<table class='table'>";
echo "<tr>";
echo "<th>Id</th>";
echo "<th>Nombre</th>";
echo "<th>Apellido</th>";
echo "<th>Email</th>";
echo "<th>Telefono</th>";
echo "</tr>";


include 'ver.php';
include '../services/conexion.php';
//-------------------
session_start();
//-------------------
if(!empty($_SESSION['email'])){
    //-------------------
    $administradores=$pdo->prepare("SELECT * FROM tbl_administradores");
    $administradores->execute();
    $listaAdministradores=$administradores->fetchAll(PDO::FETCH_ASSOC);
    //-------------------
    foreach ($listaAdministradores as $administrador) {
        echo "<tr>";
        echo "<td><b>{$administrador['id_administrador']}</b></td>";
        echo "<td>{$administrador['nombre_admin']}</td>";
        echo "<td>{$administrador['apellido_admin']}</td>";
        echo "<td>{$administrador['email_admin']}</td>";  
        echo "<td>{$administrador['telf_admin']}</td>";
    }


}else{
    header("Location:../index.php");
}
?>

</body>
</html>