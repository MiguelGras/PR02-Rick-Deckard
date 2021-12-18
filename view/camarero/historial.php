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
    <a class='btnhistorial' href="comedor.php">Comedor</a>
    <a class='btnhistorial' href="terraza.php">Terraza</a>
    <a class='btnhistorial' href="sala_privada.php">Sala Privada</a>
    <a class='btnlogout' href='../../processes/logout.php'>Log Out</a>
</div>  
<br>

<?php
include '../../view/ver.php';
include '../../services/conexion.php';

session_start();

if(!empty($_SESSION['email'])){

?>
<br>
<marquee behavior="scroll" direction="right" scrolldelay="1">Bienvenido <?php echo $_SESSION['email']; ?></marquee>
<br>

<?php
    echo "<h2><b>Historial Reservas</b></h2>";
    $sala=$pdo->prepare("SELECT DISTINCT nombre_sala FROM tbl_salas");
    $sala->execute();
    $listaSala=$sala->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="filtrado">
    <form action="historial.php" method="post">
        <input class="filtradobtn2" type="text" placeholder="Capacidad mesa" name="capacidad_mesa">
        <?php
        echo "<select name='nombre_sala'>";
        echo "<option value='%%'>Todo</option>";
            foreach($listaSala as $sala){
                echo "<option value='".$sala['nombre_sala']."'>".$sala['nombre_sala']."</option>";
            }
        echo "</select>";
        ?>
        <input class="filtradobtn" type="submit" value="Filtrar" name="filtrar">
    </form>
</div>

<?php

echo "<br>";
echo "<div class='table-centrada'>";
echo "<table class='table'>";
echo "<tr>";
echo "<th>Nº Reserva</th>";
echo "<th>Fecha reserva</th>";
echo "<th>Inicio de la reserva</th>";
echo "<th>Fin de la reserva</th>";
echo "<th>Nombre Reserva</th>";
echo "<th>Nª Mesa</th>";
echo "</tr>";

//Con filtro
if(isset($_POST['filtrar'])){
    $capacidad=$_POST['capacidad_mesa'];
    $ubicacion=$_POST['ubicacion_mesa'];
    //var_dump($capacidad);
    //var_dump($ubicacion);
    //Filtrar solo por ubicacion
    //------------
    if(empty($capacidad=$_POST['capacidad_mesa']) && !empty($ubicacion=$_POST['ubicacion_mesa'])){
        $select=$pdo->prepare("SELECT * FROM tbl_historial WHERE ubicacion_mesa LIKE '%{$ubicacion}%'");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
    //------------
    foreach ($listaFiltro as $filtro) {
        echo "<td><b>{$filtro['id_historial']}</b></td>";
        echo "<td>{$filtro['id_mesa']}</td>";
        echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
        echo "<td>{$filtro['ubicacion_mesa']}</td>";  
        echo "<td>{$filtro['inicio_reserva']}</td>";
        echo "<td>{$filtro['fin_reserva']}</td>";
        echo "<td>{$filtro['email_usuario']}</td>";
        echo '</tr>';
    }
    //Filtrar solo por capacidad    
    }elseif(!empty($capacidad=$_POST['capacidad_mesa']) && empty($ubicacion=$_POST['ubicacion_mesa'])){
        //------------    
        $select=$pdo->prepare("SELECT * FROM tbl_historial WHERE capacidad_mesa>=$capacidad");
        //$select=$pdo->prepare("SELECT * FROM tbl_mesas WHERE capacidad_mesa>='{$capacidad}' order by capacidad_mesa DESC");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaFiltro as $filtro) {
            echo "<tr>";
            echo "<td><b>{$filtro['id_historial']}</b></td>";
            echo "<td>{$filtro['id_mesa']}</td>";
            echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
            echo "<td>{$filtro['ubicacion_mesa']}</td>";  
            echo "<td>{$filtro['inicio_reserva']}</td>";
            echo "<td>{$filtro['fin_reserva']}</td>";
            echo "<td>{$filtro['email_usuario']}</td>";
            echo '</tr>';
        }
    //Filtrar teniendo los 2 parametros
    }elseif(!empty($capacidad=$_POST['capacidad_mesa']) && !empty($ubicacion=$_POST['ubicacion_mesa'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_historial WHERE ubicacion_mesa LIKE '%{$ubicacion}%' and capacidad_mesa=$capacidad");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaFiltro as $filtro) {
            echo "<tr>";
            echo "<td><b>{$filtro['id_historial']}</b></td>";
            echo "<td>{$filtro['id_mesa']}</td>";
            echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
            echo "<td>{$filtro['ubicacion_mesa']}</td>";  
            echo "<td>{$filtro['inicio_reserva']}</td>";
            echo "<td>{$filtro['fin_reserva']}</td>";
            echo "<td>{$filtro['email_usuario']}</td>";
            echo '</tr>';
        }
    }
    //Filtrar sin aÃ±adir parametros
    }else{
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_reservas");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaFiltro as $filtro) {
            echo "<tr>";
            echo "<td><b>{$filtro['id_reserva']}</b></td>";
            echo "<td>{$filtro['fecha_reserva']}</td>";
            echo "<td>{$filtro['hora_inicio_reserva']}</td>";
            echo "<td>{$filtro['hora_fin_reserva']}</td>";
            echo "<td>{$filtro['nombre_reserva']}</td>";
            echo "<td>{$filtro['id_mesa']}</td>";
            echo '</tr>';
        }
    }
}else{
    header("Location:../index.php");
}
?>
</body>
</html>