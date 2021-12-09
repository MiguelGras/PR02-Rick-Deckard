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

<?php


include 'ver.php';
include '../services/conexion.php';
//-------------------
session_start();
//-------------------
if(!empty($_SESSION['email'])){

?>
<div class='paddingtop'>
    <a class='btnlogout' href="../processes/logout.php">Log Out</a>
</div>
<div class="table-centrada">
    <a href='camareros.php'>Camareros</a>
    <a href='administradores.php'>Administradores</a>
    <a href='vista.php'>Vista mesas</a>
</div>
<!------------------->
<div class="filtrado">
    <form action="camareros.php" method="post">
        <input class="filtradobtn2" type="text" placeholder="Nombre" name="nombre_usuario">
        <input class="filtradobtn2" type="text" placeholder="Apellido" name="apellido_usuario">
        <input class="filtradobtn" type="submit" value="Filtrar" name="filtrar">
    </form>
</div>
<!------------------->
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

if(isset($_POST['filtrar'])){
    $nombre=$_POST['nombre_usuario'];
    $apellido=$_POST['apellido_usuario'];
    //------------
    if(empty($nombre=$_POST['nombre_usuario']) && !empty($apellido=$_POST['apellido_usuario'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_usuarios WHERE apellido_usuario LIKE '%{$apellido}%'");
        $select->execute();
        $listaCamareros=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaCamareros as $camarero) {
            echo "<tr>";
            echo "<td><b>{$camarero['id_usuario']}</b></td>";
            echo "<td>{$camarero['nombre_usuario']}</td>";
            echo "<td>{$camarero['apellido_usuario']}</td>";
            echo "<td>{$camarero['email_usuario']}</td>";  
            echo "<td>{$camarero['telf_usuario']}</td>";
            echo '</tr>';
        }
    }elseif(!empty($nombre=$_POST['nombre_usuario']) && empty($apellido=$_POST['apellido_usuario'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_usuarios WHERE nombre_usuario LIKE '%{$nombre}%'");
        $select->execute();
        $listaCamareros=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaCamareros as $camarero) {
            echo "<tr>";
            echo "<td><b>{$camarero['id_usuario']}</b></td>";
            echo "<td>{$camarero['nombre_usuario']}</td>";
            echo "<td>{$camarero['apellido_usuario']}</td>";
            echo "<td>{$camarero['email_usuario']}</td>";  
            echo "<td>{$camarero['telf_usuario']}</td>";
            echo '</tr>';
        }
    }elseif(!empty($nombre=$_POST['nombre_usuario']) && !empty($apellido=$_POST['apellido_usuario'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_usuarios WHERE nombre_usuario LIKE '%{$nombre}%' and apellido_usuario LIKE '%{$apellido}%'");
        $select->execute();
        $listaCamareros=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaCamareros as $camarero) {
            echo "<tr>";
            echo "<td><b>{$camarero['id_usuario']}</b></td>";
            echo "<td>{$camarero['nombre_usuario']}</td>";
            echo "<td>{$camarero['apellido_usuario']}</td>";
            echo "<td>{$camarero['email_usuario']}</td>";  
            echo "<td>{$camarero['telf_usuario']}</td>";
            echo '</tr>';
        }
    }elseif(empty($nombre=$_POST['nombre_usuario']) && empty($apellido=$_POST['apellido_usuario'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_usuarios WHERE nombre_usuario LIKE '%{$nombre}%' and apellido_usuario LIKE '%{$apellido}%'");
        $select->execute();
        $listaCamareros=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaCamareros as $camarero) {
            echo "<tr>";
            echo "<td><b>{$camarero['id_usuario']}</b></td>";
            echo "<td>{$camarero['nombre_usuario']}</td>";
            echo "<td>{$camarero['apellido_usuario']}</td>";
            echo "<td>{$camarero['email_usuario']}</td>";  
            echo "<td>{$camarero['telf_usuario']}</td>";
            echo '</tr>';
        }
    }

    }else{
        //-------------------
        $select=$pdo->prepare("SELECT * FROM tbl_usuarios");
        $select->execute();
        $listaCamareros=$select->fetchAll(PDO::FETCH_ASSOC);
        //-------------------
        foreach ($listaCamareros as $camarero) {
            echo "<tr>";
            echo "<td><b>{$camarero['id_usuario']}</b></td>";
            echo "<td>{$camarero['nombre_usuario']}</td>";
            echo "<td>{$camarero['apellido_usuario']}</td>";
            echo "<td>{$camarero['email_usuario']}</td>";  
            echo "<td>{$camarero['telf_usuario']}</td>";
            echo '</tr>';
        }
    }

}else{
    header("Location:../index.php");
}
?>

</body>
</html>