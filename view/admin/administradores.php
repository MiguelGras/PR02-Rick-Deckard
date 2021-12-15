<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/vista.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../js/modalbox.js"></script>
    <script src="../../js/vista.js"></script>
    <title>Vista Proyecto RICK-DECKARD21</title>
</head>
<body>
    <div class='paddingtop'>
        <a class='btnlogout' href="../../processes/logout.php">Log Out</a>
    </div>
    <a href="" id="open-modal">Soporte</a>
    <div class="left-part"></div>
    <div class="right-part"></div>
    <div class="modal">
        <div class="content">
            <h1>Teléfono de soporte 24/7</h1>
            <p><b>Telf. +34 902 24 25 26 - 806 34 12 77</b></p>
        </div>
    </div>
    <div class="bckg-close"></div>




<?php


include '../ver.php';
include '../../services/conexion.php';

session_start();


if(!empty($_SESSION['email'])){

?>
<br>
<marquee behavior="scroll" direction="right" scrolldelay="1">Bienvenido <?php echo $_SESSION['email']; ?></marquee>
<br>

<?php
    echo "<h2><b>Administrar mesas</b></h2>";
    $ubicacion=$pdo->prepare("SELECT DISTINCT ubicacion_mesa FROM tbl_mesas");
    $ubicacion->execute();
    $listaUbicacion=$ubicacion->fetchAll(PDO::FETCH_ASSOC);
?>
    <center><div class="table-centrada">
        <a href='camareros.php' class='btnhistorial'>Camareros</a>
        <!--<a href='comedor.php' class='btnhistorial'>Comedor</a>-->
        <a href='administradores.php' class='btnhistorial'>Administradores</a>
        <a href='vistaadmin.php' class='btnhistorial'>Vista mesas</a>
    </div></center>

<div class="filtrado">
    <form action="administradores.php" method="post">
        <input class="filtradobtn2" type="text" placeholder="Nombre" name="nombre_admin">
        <input class="filtradobtn2" type="text" placeholder="Apellido" name="apellido_admin">
        <input class="filtradobtn" type="submit" value="Filtrar" name="filtrar">
    </form>
</div>

<div class='centradotd'>
    <?php
    echo"<td><a href='../../processes/admin/formulario.insertar.php' class='btnhistorial'>Crear administrador</a></td>";
    ?>
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
echo "<th>Modificar</th>";
echo "<th>Eliminar</th>";
echo "</tr>";



if(isset($_POST['filtrar'])){
    $nombre=$_POST['nombre_admin'];
    $apellido=$_POST['apellido_admin'];
    //------------
    if(empty($nombre=$_POST['nombre_admin']) && !empty($apellido=$_POST['apellido_admin'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_administradores WHERE apellido_admin LIKE '%{$apellido}%'");
        $select->execute();
        $listaAdmins=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaAdmins as $admin) {
            echo "<tr>";
            echo "<td><b>{$admin['id_administrador']}</b></td>";
            echo "<td>{$admin['nombre_admin']}</td>";
            echo "<td>{$admin['apellido_admin']}</td>";
            echo "<td>{$admin['email_admin']}</td>";  
            echo "<td>{$admin['telf_admin']}</td>";
            echo"<td><a href='../../processes/admin/formulario.modificar.php?id_administrador={$admin['id_administrador']}&nombre_admin={$admin['nombre_admin']}&apellido_admin={$admin['apellido_admin']}&email_admin={$admin['email_admin']}&telf_admin={$admin['telf_admin']}&contra_admin={$admin['contra_admin']}' class='btnquitar'>Modificar Administrador</a></td>";
            echo"<td><a href='../../processes/admin/eliminar.admin.php?id_administrador={$admin['id_administrador']}' class='btnquitar'>Eliminar Administrador</a></td>";
            echo '</tr>';
        }
    }elseif(!empty($nombre=$_POST['nombre_admin']) && empty($apellido=$_POST['apellido_admin'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_administradores WHERE nombre_admin LIKE '%{$nombre}%'");
        $select->execute();
        $listaAdmins=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaAdmins as $admin) {
            echo "<tr>";
            echo "<td><b>{$admin['id_administrador']}</b></td>";
            echo "<td>{$admin['nombre_admin']}</td>";
            echo "<td>{$admin['apellido_admin']}</td>";
            echo "<td>{$admin['email_admin']}</td>";  
            echo "<td>{$admin['telf_admin']}</td>";
            echo"<td><a href='../../processes/admin/formulario.modificar.php?id_administrador={$admin['id_administrador']}&nombre_admin={$admin['nombre_admin']}&apellido_admin={$admin['apellido_admin']}&email_admin={$admin['email_admin']}&telf_admin={$admin['telf_admin']}&contra_admin={$admin['contra_admin']}' class='btnquitar'>Modificar Administrador</a></td>";
            echo"<td><a href='../../processes/admin/eliminar.admin.php?id_administrador={$admin['id_administrador']}' class='btnquitar'>Eliminar Administrador</a></td>";
            echo '</tr>';
        }
    }elseif(!empty($nombre=$_POST['nombre_admin']) && !empty($apellido=$_POST['apellido_admin'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_administradores WHERE nombre_admin LIKE '%{$nombre}%' and apellido_admin LIKE '%{$apellido}%'");
        $select->execute();
        $listaAdmins=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaAdmins as $admin) {
            echo "<tr>";
            echo "<td><b>{$admin['id_administrador']}</b></td>";
            echo "<td>{$admin['nombre_admin']}</td>";
            echo "<td>{$admin['apellido_admin']}</td>";
            echo "<td>{$admin['email_admin']}</td>";  
            echo "<td>{$admin['telf_admin']}</td>";
            echo"<td><a href='../../processes/admin/formulario.modificar.php?id_administrador={$admin['id_administrador']}&nombre_admin={$admin['nombre_admin']}&apellido_admin={$admin['apellido_admin']}&email_admin={$admin['email_admin']}&telf_admin={$admin['telf_admin']}&contra_admin={$admin['contra_admin']}' class='btnquitar'>Modificar Administrador</a></td>";
            echo"<td><a href='../../processes/admin/eliminar.admin.php?id_administrador={$admin['id_administrador']}' class='btnquitar'>Eliminar Administrador</a></td>";
            echo '</tr>';
        }
    }elseif(empty($nombre=$_POST['nombre_admin']) && empty($apellido=$_POST['apellido_admin'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_administradores WHERE nombre_admin LIKE '%{$nombre}%' and apellido_admin LIKE '%{$apellido}%'");
        $select->execute();
        $listaAdmins=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaAdmins as $admin) {
            echo "<tr>";
            echo "<td><b>{$admin['id_administrador']}</b></td>";
            echo "<td>{$admin['nombre_admin']}</td>";
            echo "<td>{$admin['apellido_admin']}</td>";
            echo "<td>{$admin['email_admin']}</td>";  
            echo "<td>{$admin['telf_admin']}</td>";
            echo"<td><a href='../../processes/admin/formulario.modificar.php?id_administrador={$admin['id_administrador']}&nombre_admin={$admin['nombre_admin']}&apellido_admin={$admin['apellido_admin']}&email_admin={$admin['email_admin']}&telf_admin={$admin['telf_admin']}&contra_admin={$admin['contra_admin']}' class='btnquitar'>Modificar Administrador</a></td>";
            echo"<td><a href='../../processes/admin/eliminar.admin.php?id_administrador={$admin['id_administrador']}' class='btnquitar'>Eliminar Administrador</a></td>";
            echo '</tr>';
        }
    }

    }else{
        //-------------------
        $select=$pdo->prepare("SELECT * FROM tbl_administradores");
        $select->execute();
        $listaAdmins=$select->fetchAll(PDO::FETCH_ASSOC);
        //-------------------
        foreach ($listaAdmins as $admin) {
            echo "<tr>";
            echo "<td><b>{$admin['id_administrador']}</b></td>";
            echo "<td>{$admin['nombre_admin']}</td>";
            echo "<td>{$admin['apellido_admin']}</td>";
            echo "<td>{$admin['email_admin']}</td>";  
            echo "<td>{$admin['telf_admin']}</td>";
            echo"<td><a href='../../processes/admin/formulario.modificar.php?id_administrador={$admin['id_administrador']}&nombre_admin={$admin['nombre_admin']}&apellido_admin={$admin['apellido_admin']}&email_admin={$admin['email_admin']}&telf_admin={$admin['telf_admin']}&contra_admin={$admin['contra_admin']}' class='btnquitar'>Modificar Administrador</a></td>";
            echo"<td><a href='../../processes/admin/eliminar.admin.php?id_administrador={$admin['id_administrador']}' class='btnquitar'>Eliminar Administrador</a></td>";
            echo '</tr>';
        }
    }

}else{
    header("Location:../../index.php");
}
?>

</body>
</html>