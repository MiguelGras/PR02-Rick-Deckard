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
    <h2><b>Administrar mesas</b></h2>
    <div class="bckg-close"></div>
    <center><div class="table-centrada">
        <a href='camareros.php' class='btnhistorial'>Camareros</a>
        <!--<a href='comedor.php' class='btnhistorial'>Comedor</a>
        <a href='terraza.php' class='btnhistorial'>Terraza</a>-->
        <a href='vistaadmin.php' class='btnhistorial'>Vista general</a>
    </div></center>

<!--HACER FILTRO--><!--HACER FILTRO--><!--HACER FILTRO-->
<div class="filtrado">
    <form action="terraza.php" method="post">
        <input class="filtradobtn2" type="text" placeholder="Capacidad mesa" name="capacidad_mesa">
        <input class="filtradobtn" type="submit" value="Filtrar" name="filtrar">
    </form>    
</div>
<!--HACER FILTRO--><!--HACER FILTRO--><!--HACER FILTRO-->
<?php
echo "<div class='table-centrada'>";
echo "<table class='table'>";
echo "<tr>";
echo "<th>Nº Mesa</th>";
echo "<th>Capacidad</th>";
echo "<th>Modificar</th>";
echo "<th>Quitar mesa</th>";
echo "</tr>";

if(isset($_POST['filtrar'])){
        $capacidad=$_POST['capacidad_mesa'];
    if(!empty($capacidad=$_POST['capacidad_mesa'])){
        //------------    
        $terraza=$pdo->prepare("SELECT * FROM tbl_mesas WHERE capacidad_mesa=$capacidad and ubicacion_mesa='terraza'");
        //$terraza=$pdo->prepare("SELECT * FROM tbl_mesas WHERE capacidad_mesa>='{$capacidad}' order by capacidad_mesa DESC");
        $terraza->execute();
        $listaTerraza=$terraza->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaTerraza as $terraza) {
            echo "<tr>";
            echo "<td><b>{$terraza['id_mesa']}</b></td>";
            echo "<td>{$terraza['capacidad_mesa']} sillas</td>"; 
            echo"<td><a href='../processes/modificar.php?email_usuario={$_SESSION['email']}' class='btnquitar'>Modificar mesa</a></td>"; 
            echo"<td><a href='../processes/eliminar.php?id_mesa={$terraza['id_mesa']}&email_usuario={$_SESSION['email']}&capacidad_mesa={$terraza['capacidad_mesa']}&ubicacion_mesa={$terraza['ubicacion_mesa']}' class='btnquitar'>Quitar reserva</a></td>";
            echo '</tr>';
        }
    }elseif(empty($capacidad=$_POST['capacidad_mesa'])){
        //-------------------
        $terraza=$pdo->prepare("SELECT * FROM tbl_mesas WHERE ubicacion_mesa='terraza'");
        $terraza->execute();
        $listaTerraza=$terraza->fetchAll(PDO::FETCH_ASSOC);
        //-------------------
        foreach ($listaTerraza as $mesacomedor) {
            echo "<tr>";
            echo "<td><b>{$mesacomedor['id_mesa']}</b></td>";
            echo "<td>{$mesacomedor['capacidad_mesa']} sillas</td>";
            echo"<td><a href='../../processes/modificar.php?email_usuario={$_SESSION['email']}' class='btnquitar'>Modificar mesa</a></td>";
            echo"<td><a href='../../processes/eliminar.php?email_usuario={$_SESSION['email']}' class='btnquitar'>Eliminar mesa</a></td>";

        }
    }
    }else{
        //-------------------
        $terraza=$pdo->prepare("SELECT * FROM tbl_mesas WHERE ubicacion_mesa='terraza'");
        $terraza->execute();
        $listaTerraza=$terraza->fetchAll(PDO::FETCH_ASSOC);
        //-------------------
        foreach ($listaTerraza as $mesacomedor) {
            echo "<tr>";
            echo "<td><b>{$mesacomedor['id_mesa']}</b></td>";
            echo "<td>{$mesacomedor['capacidad_mesa']} sillas</td>";
            echo"<td><a href='../../processes/modificar.php?email_usuario={$_SESSION['email']}' class='btnquitar'>Modificar mesa</a></td>";
            echo"<td><a href='../../processes/eliminar.php?email_usuario={$_SESSION['email']}' class='btnquitar'>Eliminar mesa</a></td>";

        }
    }

}else{
header("Location:../../index.php");
}
?>

</body>
</html>