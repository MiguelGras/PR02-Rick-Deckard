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
    <title>Sala Privada</title>
</head>
<body>
<div class='paddingtop'>
        <a class='btnhistorial' href="terraza.php">Terraza</a>
        <a class='btnhistorial' href="comedor.php">Comedor</a>
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
    $capacidad=$pdo->prepare("SELECT DISTINCT capacidad_mesa FROM tbl_mesas WHERE ubicacion_mesa='Sala_Privada'");
    $capacidad->execute();
    $listaCapacidad=$capacidad->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="filtrado">
    <form action="sala_privada.php" method="post">
        <?php
        echo "<select name='capacidad_mesa'>";
        echo "<option value=''>Todo</option>";
            foreach($listaCapacidad as $capacidad){
                echo "<option value='".$capacidad['capacidad_mesa']."'>".$capacidad['capacidad_mesa']."</option>";
            }
        echo "</select>";
        ?>
        <input class="filtradobtn" type="submit" value="Filtrar" name="filtrar">
    </form>
</div>
<?php
echo "<div class='centradotd'";
echo"<td><a href='../../view/camarero/historial.php' class='btnhistorial'>Historial</a></td>";
echo "</div>";

echo "<div class='table-centrada'>";
echo "<table class='table'>";
echo "<tr>";
echo "<th>Nº Mesa</th>";
echo "<th>Capacidad</th>";
echo "<th>Ubicación</th>";
echo "<th>Reservar/Quitar reserva</th>";
echo "</tr>";



//Con filtro
if(isset($_POST['filtrar'])){
    $capacidad=$_POST['capacidad_mesa'];
    //Filtrar solo por ubicacion
    //------------
    if(empty($capacidad=$_POST['capacidad_mesa'])){
    $select=$pdo->prepare("SELECT * FROM tbl_mesas WHERE ubicacion_mesa='Sala_Privada' ORDER BY capacidad_mesa DESC");
    $select->execute();
    $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
    //------------
    
    //------------
    foreach ($listaFiltro as $filtro) {
        echo "<tr>";
            echo "<td><b>{$filtro['id_mesa']}</b></td>";
            echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
            echo "<td>{$filtro['ubicacion_mesa']}</td>";  
            echo "<td><a href='reservamesa.php?id_mesa={$filtro['id_mesa']}' class='btnreservar'>Detalles</a></td>";
        echo '</tr>';
    }
    //Filtrar solo por capacidad    
    }elseif(!empty($capacidad=$_POST['capacidad_mesa'])){
            //------------
            $select=$pdo->prepare("SELECT * FROM tbl_mesas WHERE capacidad_mesa=$capacidad and ubicacion_mesa='Sala_Privada' ORDER BY capacidad_mesa DESC");
            //$select=$pdo->prepare("SELECT * FROM tbl_mesas WHERE capacidad_mesa>='{$capacidad}' order by capacidad_mesa DESC");
            $select->execute();
            $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
            //------------
            foreach ($listaFiltro as $filtro) {
                echo "<tr>";
                    echo "<td><b>{$filtro['id_mesa']}</b></td>";
                    echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
                    echo "<td>{$filtro['ubicacion_mesa']}</td>";  
                    echo "<td><a href='reservamesa.php?id_mesa={$filtro['id_mesa']}' class='btnreservar'>Detalles</a></td>";
                echo '</tr>';
            }
    }
    //Filtrar sin añadir parametros
    }else{
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_mesas WHERE ubicacion_mesa='Sala_Privada' ORDER BY capacidad_mesa DESC");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaFiltro as $filtro) {
            echo "<tr>";
                echo "<td><b>{$filtro['id_mesa']}</b></td>";
                echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
                echo "<td>{$filtro['ubicacion_mesa']}</td>";  
                echo "<td><a href='reservamesa.php?id_mesa={$filtro['id_mesa']}' class='btnreservar'>Detalles</a></td>";
            echo '</tr>';
        }
    }
}else{
    header("Location:../index.php");
}
?>
</body>
</html>