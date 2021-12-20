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
    <title>Salas</title>
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
$email=$_SESSION['email'];

?>
<br>
<marquee behavior="scroll" direction="right" scrolldelay="1">Bienvenido <?php echo $_SESSION['email']; ?></marquee>
<br>

<h2><b>Administrar Salas</b></h2>
    <center><div class="table-centrada">
        <a href='camareros.php' class='btnhistorial'>Camareros</a>
        <!--<a href='comedor.php' class='btnhistorial'>Comedor</a>-->
        <a href='administradores.php' class='btnhistorial'>Administradores</a>
        <a href='vistaadmin.php' class='btnhistorial'>Vista mesas</a>
        <a href='salas.php' class='btnhistorial'>Salas</a>
    </div></center>


<div class='centradotd'>
    <?php
    echo"<td><a href='../../processes/salas/formulario.insertar.php' class='btnhistorial'>Crear sala</a></td>";
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

        //-------------------
        $select=$pdo->prepare("SELECT * FROM tbl_salas");
        $select->execute();
        $listaSalas=$select->fetchAll(PDO::FETCH_ASSOC);
        //-------------------
        foreach ($listaSalas as $sala) {
            echo "<tr>";
            echo "<td><b>{$sala['id_sala']}</b></td>";
            echo "<td>{$sala['nombre_sala']}</td>";
            echo "<td><img style='width:225px;height:160px;' src='{$sala['img_sala']}'</td>";
            echo"<td><a href='../../processes/salas/formulario.modificar.php?id_sala={$sala['id_sala']}&nombre_sala={$sala['nombre_sala']}&img_sala={$sala['img_sala']}' class='btnquitar'>Modificar Sala</a></td>";
            echo"<td><a href='../../processes/salas/eliminar.sala.php?id_sala={$sala['id_sala']}' class='btnquitar'>Eliminar Sala</a></td>";
            echo '</tr>';
        }
    

}else{
    header("Location:../../index.php");
}
?>

</body>
</html>