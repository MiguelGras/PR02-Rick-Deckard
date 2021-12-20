<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/vista.css">
    <link rel="shortcut icon" type="image/png" href="../../img/icono.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../js/modalbox.js"></script>
    <script src="../../js/vista.js"></script>
    <title>Camareros</title>
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
//-------------------
session_start();
//-------------------
if(!empty($_SESSION['email'])){

?>
<br>
<marquee behavior="scroll" direction="right" scrolldelay="1">Bienvenido <?php echo $_SESSION['email']; ?></marquee>
<br>
<h2><b>Administrar Camareros</b></h2>
<center><div class="table-centrada">
        <a href='camareros.php' class='btnhistorial'>Camareros</a>
        <!--<a href='comedor.php' class='btnhistorial'>Comedor</a>-->
        <a href='administradores.php' class='btnhistorial'>Administradores</a>
        <a href='vistaadmin.php' class='btnhistorial'>Vista mesas</a>
        <a href='salas.php' class='btnhistorial'>Salas</a>
    </div></center>
<!------------------->
<div class="filtrado">
    <form action="camareros.php" method="post">
        <input class="filtradobtn2" type="text" placeholder="Nombre" name="nombre_usuario">
        <input class="filtradobtn2" type="text" placeholder="Apellido" name="apellido_usuario">
        <input class="filtradobtn" type="submit" value="Filtrar" name="filtrar">
    </form>
</div>

<div class='centradotd'>
<?php
echo"<td><a href='../../processes/admin/formulario.insertar.php' class='btnhistorial'>Crear usuario</a></td>";
?>
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
echo "<th>Modificar</th>";
echo "<th>Eliminar</th>";
echo "</tr>";

if(isset($_POST['filtrar'])){
    $nombre=$_POST['nombre_usuario'];
    $apellido=$_POST['apellido_usuario'];
    //------------
    if(empty($nombre=$_POST['nombre_usuario']) && !empty($apellido=$_POST['apellido_usuario'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_usuarios WHERE tipo_usuario='camarero' and apellido_usuario LIKE '%{$apellido}%'");
        $select->execute();
        $listaUsuarios=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaUsuarios as $user) {
            echo "<tr>";
            echo "<td><b>{$user['id_usuario']}</b></td>";
            echo "<td>{$user['nombre_usuario']}</td>";
            echo "<td>{$user['apellido_usuario']}</td>";
            echo "<td>{$user['email_usuario']}</td>";  
            echo "<td>{$user['telf_usuario']}</td>";
            echo"<td><a href='../../processes/admin/formulario.modificar.php?id_usuario={$user['id_usuario']}&tipo_usuario={$user['tipo_usuario']}&nombre_usuario={$user['nombre_usuario']}&apellido_usuario={$user['apellido_usuario']}&email_usuario={$user['email_usuario']}&telf_usuario={$user['telf_usuario']}' class='btnquitar'>Modificar Camarero</a></td>";
            echo"<td><a href='../../processes/admin/eliminar.usuario.php?id_usuario={$user['id_usuario']}&tipo_usuario={$user['tipo_usuario']}' class='btnquitar'>Eliminar Camarero</a></td>";
            echo '</tr>';
        }
    }elseif(!empty($nombre=$_POST['nombre_usuario']) && empty($apellido=$_POST['apellido_usuario'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_usuarios WHERE tipo_usuario='camarero' and nombre_usuario LIKE '%{$nombre}%'");
        $select->execute();
        $listaUsuarios=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaUsuarios as $user) {
            echo "<tr>";
            echo "<td><b>{$user['id_usuario']}</b></td>";
            echo "<td>{$user['nombre_usuario']}</td>";
            echo "<td>{$user['apellido_usuario']}</td>";
            echo "<td>{$user['email_usuario']}</td>";  
            echo "<td>{$user['telf_usuario']}</td>";
            echo"<td><a href='../../processes/admin/formulario.modificar.php?id_usuario={$user['id_usuario']}&tipo_usuario={$user['tipo_usuario']}&nombre_usuario={$user['nombre_usuario']}&apellido_usuario={$user['apellido_usuario']}&email_usuario={$user['email_usuario']}&telf_usuario={$user['telf_usuario']}' class='btnquitar'>Modificar Camarero</a></td>";
            echo"<td><a href='../../processes/admin/eliminar.usuario.php?id_usuario={$user['id_usuario']}&tipo_usuario={$user['tipo_usuario']}' class='btnquitar'>Eliminar Camarero</a></td>";
            echo '</tr>';
        }
    }elseif(!empty($nombre=$_POST['nombre_usuario']) && !empty($apellido=$_POST['apellido_usuario'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_usuarios WHERE tipo_usuario='camarero' and nombre_usuario LIKE '%{$nombre}%' and apellido_usuario LIKE '%{$apellido}%'");
        $select->execute();
        $listaUsuarios=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaUsuarios as $user) {
            echo "<tr>";
            echo "<td><b>{$user['id_usuario']}</b></td>";
            echo "<td>{$user['nombre_usuario']}</td>";
            echo "<td>{$user['apellido_usuario']}</td>";
            echo "<td>{$user['email_usuario']}</td>";  
            echo "<td>{$user['telf_usuario']}</td>";
            echo"<td><a href='../../processes/admin/formulario.modificar.php?id_usuario={$user['id_usuario']}&tipo_usuario={$user['tipo_usuario']}&nombre_usuario={$user['nombre_usuario']}&apellido_usuario={$user['apellido_usuario']}&email_usuario={$user['email_usuario']}&telf_usuario={$user['telf_usuario']}' class='btnquitar'>Modificar Camarero</a></td>";
            echo"<td><a href='../../processes/admin/eliminar.usuario.php?id_usuario={$user['id_usuario']}&tipo_usuario={$user['tipo_usuario']}' class='btnquitar'>Eliminar Camarero</a></td>";
            echo '</tr>';
        }
    }elseif(empty($nombre=$_POST['nombre_usuario']) && empty($apellido=$_POST['apellido_usuario'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_usuarios WHERE tipo_usuario='camarero' and nombre_usuario LIKE '%{$nombre}%' and apellido_usuario LIKE '%{$apellido}%'");
        $select->execute();
        $listaUsuarios=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaUsuarios as $user) {
            echo "<tr>";
            echo "<td><b>{$user['id_usuario']}</b></td>";
            echo "<td>{$user['nombre_usuario']}</td>";
            echo "<td>{$user['apellido_usuario']}</td>";
            echo "<td>{$user['email_usuario']}</td>";  
            echo "<td>{$user['telf_usuario']}</td>";
            echo"<td><a href='../../processes/admin/formulario.modificar.php?id_usuario={$user['id_usuario']}&tipo_usuario={$user['tipo_usuario']}&nombre_usuario={$user['nombre_usuario']}&apellido_usuario={$user['apellido_usuario']}&email_usuario={$user['email_usuario']}&telf_usuario={$user['telf_usuario']}' class='btnquitar'>Modificar Camarero</a></td>";
            echo"<td><a href='../../processes/admin/eliminar.usuario.php?id_usuario={$user['id_usuario']}&tipo_usuario={$user['tipo_usuario']}' class='btnquitar'>Eliminar Camarero</a></td>";
            echo '</tr>';
        }
    }

    }else{
        //-------------------
        $select=$pdo->prepare("SELECT * FROM tbl_usuarios WHERE tipo_usuario='camarero'");
        $select->execute();
        $listaUsuarios=$select->fetchAll(PDO::FETCH_ASSOC);
        //-------------------
        foreach ($listaUsuarios as $user) {
            echo "<tr>";
            echo "<td><b>{$user['id_usuario']}</b></td>";
            echo "<td>{$user['nombre_usuario']}</td>";
            echo "<td>{$user['apellido_usuario']}</td>";
            echo "<td>{$user['email_usuario']}</td>";  
            echo "<td>{$user['telf_usuario']}</td>";
            echo"<td><a href='../../processes/admin/formulario.modificar.php?id_usuario={$user['id_usuario']}&tipo_usuario={$user['tipo_usuario']}&nombre_usuario={$user['nombre_usuario']}&apellido_usuario={$user['apellido_usuario']}&email_usuario={$user['email_usuario']}&telf_usuario={$user['telf_usuario']}' class='btnquitar'>Modificar Camarero</a></td>";
            echo"<td><a href='../../processes/admin/eliminar.usuario.php?id_usuario={$user['id_usuario']}&tipo_usuario={$user['tipo_usuario']}' class='btnquitar'>Eliminar Camarero</a></td>";
            echo '</tr>';
        }
    }

}else{
    header("Location:../../index.php");
}
?>

</body>
</html>