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
    <a class='btnhistorial' href='../../view/camarero/vistacamarero.php'>Atras</a>
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

include '../../view/ver.php';
include '../../services/conexion.php';

session_start();

if(!empty($_SESSION['email'])){

?>
<br>
<marquee behavior="scroll" direction="right" scrolldelay="1">Bienvenido <?php echo $_SESSION['email']; ?></marquee>
<br>

<!--<div class="table-centrada">
    <a href='camareros.php'>Camareros</a>
    <a href='administradores.php'>Administradores</a>
    <a href='vista.php'>Vista mesas</a>
</div>-->
<?php
    echo "<h2><b>Administrar mesas</b></h2>";
    $ubicacion=$pdo->prepare("SELECT DISTINCT ubicacion_mesa FROM tbl_mesas");
    $ubicacion->execute();
    $listaUbicacion=$ubicacion->fetchAll(PDO::FETCH_ASSOC);
?>

<!--<div class="filtrado">
    <form action="vistacamarero.php" method="post">
        <input class="filtradobtn2" type="text" placeholder="Capacidad mesa" name="capacidad_mesa">
        <?php
        echo "<select name='ubicacion_mesa'>";
        echo "<option value='%%'>Ubicación</option>";
            foreach($listaUbicacion as $ubicacion){
                echo "<option value='".$ubicacion['ubicacion_mesa']."'>".$ubicacion['ubicacion_mesa']."</option>";
            }
        echo "</select>";
        ?>
        <input class="filtradobtn" type="submit" value="Filtrar" name="filtrar">
    </form>
</div>-->
<?php
$id_mesa=$_GET['id_mesa'];
echo "<div class='centradotd'";
echo"<td><a href='../../processes/camarero/formulario.crearreserva.php?id_mesa=$id_mesa' class='btnhistorial'>Crear Reserva para mesa $id_mesa</a></td>";
echo "</div>";

echo "<div class='table-centrada'>";
echo "<table class='table'>";
echo "<tr>";
echo "<th>Nº Reserva</th>";
echo "<th>Fecha reserva</th>";
echo "<th>Inicio de la reserva</th>";
echo "<th>Fin de la reserva</th>";
echo "<th>Nombre Reserva</th>";
echo "<th>Nª Mesa</th>";
echo "<th>Modificar Reserva</th>";
echo "<th>Eliminar Reserva</th>";
echo "</tr>";


//Con filtro
/*if(isset($_POST['filtrar'])){
    $capacidad=$_POST['capacidad_mesa'];
    $ubicacion=$_POST['ubicacion_mesa'];
    //var_dump($capacidad);
    //var_dump($ubicacion);
    //Filtrar solo por ubicacion
    //------------
    if(empty($capacidad=$_POST['capacidad_mesa']) && !empty($ubicacion=$_POST['ubicacion_mesa'])){
    $select=$pdo->prepare("SELECT * FROM tbl_mesas WHERE ubicacion_mesa LIKE '%{$ubicacion}%'");
    $select->execute();
    $listaReservas=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaReservas as $reserva) {
            echo "<tr>";
            echo "<td><b>{$reserva['id_reserva']}</b></td>";
            echo "<td>{$reserva['fecha_reserva']}</td>";
            echo "<td>{$reserva['hora_inicio_reserva']}</td>";  
            echo "<td>{$reserva['hora_fin_reserva']}</td>";
            echo "<td>{$reserva['id_mesa']}</td>";
            echo '</tr>';
        }
    //Filtrar solo por capacidad    
    }elseif(!empty($capacidad=$_POST['capacidad_mesa']) && empty($ubicacion=$_POST['ubicacion_mesa'])){
            //------------    
            $select=$pdo->prepare("SELECT * FROM tbl_mesas WHERE capacidad_mesa>=$capacidad");
            //$select=$pdo->prepare("SELECT * FROM tbl_mesas WHERE capacidad_mesa>='{$capacidad}' order by capacidad_mesa DESC");
            $select->execute();
            $listaReservas=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaReservas as $reserva) {
            echo "<tr>";
            echo "<td><b>{$reserva['id_reserva']}</b></td>";
            echo "<td>{$reserva['fecha_reserva']}</td>";
            echo "<td>{$reserva['hora_inicio_reserva']}</td>";  
            echo "<td>{$reserva['hora_fin_reserva']}</td>";
            echo "<td>{$reserva['id_mesa']}</td>";
            echo '</tr>';
        }
    //Filtrar teniendo los 2 parametros
    }elseif(!empty($capacidad=$_POST['capacidad_mesa']) && !empty($ubicacion=$_POST['ubicacion_mesa'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_mesas WHERE ubicacion_mesa LIKE '%{$ubicacion}%' and capacidad_mesa=$capacidad");
        $select->execute();
        $listaReservas=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaReservas as $reserva) {
            echo "<tr>";
            echo "<td><b>{$reserva['id_reserva']}</b></td>";
            echo "<td>{$reserva['fecha_reserva']}</td>";
            echo "<td>{$reserva['hora_inicio_reserva']}</td>";  
            echo "<td>{$reserva['hora_fin_reserva']}</td>";
            echo "<td>{$reserva['id_mesa']}</td>";
            echo '</tr>';
        }
    }
    //Filtrar sin añadir parametros
    }else{*/
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_reservas WHERE id_mesa=$id_mesa ORDER BY fecha_reserva ASC,hora_inicio_reserva ASC ");
        $select->execute();
        $listaReservas=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaReservas as $reserva) {
            echo "<tr>";
            echo "<td><b>{$reserva['id_reserva']}</b></td>";
            echo "<td>{$reserva['fecha_reserva']}</td>";
            echo "<td>{$reserva['hora_inicio_reserva']}</td>";  
            echo "<td>{$reserva['hora_fin_reserva']}</td>";
            echo "<td>{$reserva['nombre_reserva']}</td>";
            echo "<td>{$reserva['id_mesa']}</td>";
            echo "<td><a href='../../processes/camarero/formulario.modificarreserva.php?id_mesa={$reserva['id_mesa']}&id_reserva={$reserva['id_reserva']}&fecha_reserva={$reserva['fecha_reserva']}&hora={$reserva['hora_inicio_reserva']}&nombre={$reserva['nombre_reserva']}' class='btnquitar'>Modificar reserva</a></td>";
            echo "<td><a href='../../processes/camarero/eliminar.reserva.php?id_mesa={$reserva['id_mesa']}&id_reserva={$reserva['id_reserva']}' class='btnquitar'>Eliminar reserva</a></td>";
            echo '</tr>';
        }
    }
/*}else{
    header("Location:../index.php");
}*/
?>
</body>
</html>
</html>