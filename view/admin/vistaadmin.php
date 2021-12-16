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
        <a class='btnlogout' href='../../processes/logout.php'>Log Out</a>
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
    <form action="vistaadmin.php" method="post">
        <!--<input class="filtradobtn2" type="text" placeholder="Capacidad mesa" name="capacidad_mesa">-->
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
</div>


<div class='centradotd'>
<?php
echo"<td><a href='../../processes/mesas/formulario.insertar.php' class='btnhistorial'>Crear mesa</a></td>";
?>
</div>

<?php
echo "<div class='table-centrada'>";
echo "<table class='table'>";
echo "<tr>";
echo "<th>Nº Mesa</th>";
echo "<th>Capacidad</th>";
echo "<th>Ubicacion</th>";
echo "<th>Modificar</th>";
echo "<th>Eliminar</th>";
echo "</tr>";

//Con filtro
if(isset($_POST['filtrar'])){
    $ubicacion=$_POST['ubicacion_mesa'];
    //Filtrar solo por ubicacion
    //------------
    if(!empty($ubicacion=$_POST['ubicacion_mesa'])){
    $select=$pdo->prepare("SELECT * FROM tbl_mesas WHERE ubicacion_mesa LIKE '%{$ubicacion}%'");
    $select->execute();
    $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
    //------------
    foreach ($listaFiltro as $filtro) {
        echo "<tr>";
        echo "<td><b>{$filtro['id_mesa']}</b></td>";
        echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
        echo "<td>{$filtro['ubicacion_mesa']}</td>"; 
        echo"<td><a href='../../processes/mesas/formulario.modificar.php?id_mesa={$filtro['id_mesa']}&capacidad_mesa={$filtro['capacidad_mesa']}&ubicacion_mesa={$filtro['ubicacion_mesa']}' class='btnquitar'>Modificar mesa</a></td>"; 
        echo"<td><a href='../../processes/mesas/eliminar.mesa.php?id_mesa={$filtro['id_mesa']}' class='btnquitar'>Eliminar mesa</a></td>";
        echo '</tr>';
    }
    //Filtrar solo por capacidad    
    }elseif(empty($ubicacion=$_POST['ubicacion_mesa'])){
            //------------    
            $select=$pdo->prepare("SELECT * FROM tbl_mesas");
            //$select=$pdo->prepare("SELECT * FROM tbl_mesas WHERE capacidad_mesa>='{$capacidad}' order by capacidad_mesa DESC");
            $select->execute();
            $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
            //------------
            foreach ($listaFiltro as $filtro) {
                echo "<tr>";
                echo "<td><b>{$filtro['id_mesa']}</b></td>";
                echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
                echo "<td>{$filtro['ubicacion_mesa']}</td>";  
                echo"<td><a href='../../processes/mesas/formulario.modificar.php?id_mesa={$filtro['id_mesa']}&capacidad_mesa={$filtro['capacidad_mesa']}&ubicacion_mesa={$filtro['ubicacion_mesa']}' class='btnquitar'>Modificar mesa</a></td>"; 
                echo"<td><a href='../../processes/mesas/eliminar.mesa.php?id_mesa={$filtro['id_mesa']}' class='btnquitar'>Eliminar mesa</a></td>";
                echo '</tr>';
            }
    //Filtrar teniendo los 2 parametros
    }
    //Filtrar sin añadir parametros
    }else{
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_mesas ORDER BY ubicacion_mesa DESC");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaFiltro as $filtro) {
            echo "<tr>";
            echo "<td><b>{$filtro['id_mesa']}</b></td>";
            echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
            echo "<td>{$filtro['ubicacion_mesa']}</td>";  
            echo"<td><a href='../../processes/mesas/formulario.modificar.php?id_mesa={$filtro['id_mesa']}&capacidad_mesa={$filtro['capacidad_mesa']}&ubicacion_mesa={$filtro['ubicacion_mesa']}' class='btnquitar'>Modificar mesa</a></td>"; 
            echo"<td><a href='../../processes/mesas/eliminar.mesa.php?id_mesa={$filtro['id_mesa']}' class='btnquitar'>Eliminar mesa</a></td>";
            echo '</tr>';
        }
    }
}else{
    header("Location:../index.php");
}


?>
</body>
</html>