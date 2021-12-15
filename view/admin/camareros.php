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
echo"<td><a href='../../processes/camarero/formulario.insertar.php' class='btnhistorial'>Crear camarero</a></td>";
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
        $select=$pdo->prepare("SELECT * FROM tbl_camareros WHERE apellido_usuario LIKE '%{$apellido}%'");
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
            echo"<td><a href='../../processes/camarero/formulario.modificar.php?id_usuario={$camarero['id_usuario']}&nombre_usuario={$camarero['nombre_usuario']}&apellido_usuario={$camarero['apellido_usuario']}&email_usuario={$camarero['email_usuario']}&telf_usuario={$camarero['telf_usuario']}&contra_usuario={$camarero['contra_usuario']}' class='btnquitar'>Modificar Camarero</a></td>";
            echo"<td><a href='../../processes/camarero/eliminar.camarero.php?id_usuario={$camarero['id_usuario']}' class='btnquitar'>Eliminar Camarero</a></td>";
            echo '</tr>';
        }
    }elseif(!empty($nombre=$_POST['nombre_usuario']) && empty($apellido=$_POST['apellido_usuario'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_camareros WHERE nombre_usuario LIKE '%{$nombre}%'");
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
            echo"<td><a href='../../processes/camarero/formulario.modificar.php?id_usuario={$camarero['id_usuario']}&nombre_usuario={$camarero['nombre_usuario']}&apellido_usuario={$camarero['apellido_usuario']}&email_usuario={$camarero['email_usuario']}&telf_usuario={$camarero['telf_usuario']}&contra_usuario={$camarero['contra_usuario']}' class='btnquitar'>Modificar Camarero</a></td>";
            echo"<td><a href='../../processes/camarero/eliminar.camarero.php?id_usuario={$camarero['id_usuario']}' class='btnquitar'>Eliminar Camarero</a></td>";
            echo '</tr>';
        }
    }elseif(!empty($nombre=$_POST['nombre_usuario']) && !empty($apellido=$_POST['apellido_usuario'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_camareros WHERE nombre_usuario LIKE '%{$nombre}%' and apellido_usuario LIKE '%{$apellido}%'");
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
            echo"<td><a href='../../processes/camarero/formulario.modificar.php?id_usuario={$camarero['id_usuario']}&nombre_usuario={$camarero['nombre_usuario']}&apellido_usuario={$camarero['apellido_usuario']}&email_usuario={$camarero['email_usuario']}&telf_usuario={$camarero['telf_usuario']}&contra_usuario={$camarero['contra_usuario']}' class='btnquitar'>Modificar Camarero</a></td>";
            echo"<td><a href='../../processes/camarero/eliminar.camarero.php?id_usuario={$camarero['id_usuario']}' class='btnquitar'>Eliminar Camarero</a></td>";
            echo '</tr>';
        }
    }elseif(empty($nombre=$_POST['nombre_usuario']) && empty($apellido=$_POST['apellido_usuario'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_camareros WHERE nombre_usuario LIKE '%{$nombre}%' and apellido_usuario LIKE '%{$apellido}%'");
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
            echo"<td><a href='../../processes/camarero/formulario.modificar.php?id_usuario={$camarero['id_usuario']}&nombre_usuario={$camarero['nombre_usuario']}&apellido_usuario={$camarero['apellido_usuario']}&email_usuario={$camarero['email_usuario']}&telf_usuario={$camarero['telf_usuario']}&contra_usuario={$camarero['contra_usuario']}' class='btnquitar'>Modificar Camarero</a></td>";
            echo"<td><a href='../../processes/camarero/eliminar.camarero.php?id_usuario={$camarero['id_usuario']}' class='btnquitar'>Eliminar Camarero</a></td>";
            echo '</tr>';
        }
    }

    }else{
        //-------------------
        $select=$pdo->prepare("SELECT * FROM tbl_camareros");
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
            echo"<td><a href='../../processes/camarero/formulario.modificar.php?id_usuario={$camarero['id_usuario']}&nombre_usuario={$camarero['nombre_usuario']}&apellido_usuario={$camarero['apellido_usuario']}&email_usuario={$camarero['email_usuario']}&telf_usuario={$camarero['telf_usuario']}&contra_usuario={$camarero['contra_usuario']}' class='btnquitar'>Modificar Camarero</a></td>";
            echo"<td><a href='../../processes/camarero/eliminar.camarero.php?id_usuario={$camarero['id_usuario']}' class='btnquitar'>Eliminar Camarero</a></td>";
            echo '</tr>';
        }
    }

}else{
    header("Location:../../index.php");
}
?>

</body>
</html>