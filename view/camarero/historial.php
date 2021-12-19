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
    $email=$_SESSION['email'];

?>
<br>
<marquee behavior="scroll" direction="right" scrolldelay="1">Bienvenido <?php echo $_SESSION['email']; ?></marquee>
<br>

<?php
    echo "<h2><b>Historial Reservas</b></h2>";
    $sala=$pdo->prepare("SELECT DISTINCT nombre_sala FROM tbl_salas");
    $sala->execute();
    $listaSala=$sala->fetchAll(PDO::FETCH_ASSOC);
    
    $id_mesa=$pdo->prepare("SELECT DISTINCT id_mesa FROM tbl_historial ORDER BY id_mesa ASC");
    $id_mesa->execute();
    $listaMesas=$id_mesa->fetchAll(PDO::FETCH_ASSOC);

    $fechasistema=date('Y-m-d');

echo "<div class='filtrado'>";  
    echo"<form action='historial.php' method='POST'>";
        echo"Fecha: <input type='date' name='fecha' size='60' min=$fechasistema>";
        echo" Hora: <select name='horainicial'>";
            echo" <option value=''></option>";
            echo" <option value='10:00:00'>10:00:00</option>";
            echo"<option value='11:00:00'>11:00:00</option>";
            echo"<option value='12:00:00'>12:00:00</option>";
            echo"<option value='13:00:00'>13:00:00</option>";
            echo"<option value='14:00:00'>14:00:00</option>";
            echo"<option value='15:00:00'>15:00:00</option>";
            echo"<option value='16:00:00'>16:00:00</option>";
            echo"<option value='17:00:00'>17:00:00</option>";
            echo"<option value='18:00:00'>18:00:00</option>";
            echo"<option value='19:00:00'>19:00:00</option>";
            echo"<option value='20:00:00'>20:00:00</option>";
        echo"</select>";
        echo " Nª Mesa: <select name='id_mesa'>";
        echo "<option value=''>Todo</option>";
            foreach($listaMesas as $mesa){
                echo "<option value='".$mesa['id_mesa']."'>".$mesa['id_mesa']."</option>";
            }
        echo "</select>";
        echo"<input type='submit' value='filtrar' name='filtrar'>";
    echo"</form>";
echo "</div>";



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
    $fecha=$_POST['fecha'];
    $hora=$_POST['horainicial'];
    $id_mesa=$_POST['id_mesa'];
/*  
    echo $fecha;
    echo "<br>";
    echo $hora;
    echo "<br>";
    echo $id_mesa;
    die;
*/
    //Filtro vacio
    // 0 0 0
    //------------
    if(empty($fecha=$_POST['fecha']) && empty($hora=$_POST['horainicial']) && empty($id_mesa=$_POST['id_mesa'])){
        $select=$pdo->prepare("SELECT * FROM tbl_historial ORDER BY fecha_historial ASC");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
    //------------
    foreach ($listaFiltro as $filtro) {
        echo "<tr>";
        echo "<td><b>{$filtro['id_historial']}</b></td>";
        echo "<td>{$filtro['fecha_historial']}</td>";
        echo "<td>{$filtro['hora_inicio_historial']}</td>";
        echo "<td>{$filtro['hora_fin_historial']}</td>";
        echo "<td>{$filtro['nombre_historial']}</td>";
        echo "<td>{$filtro['id_mesa']}</td>";
        echo '</tr>';
    }  
    // Id_mesa
    // 0 0 1  
    }elseif(empty($fecha=$_POST['fecha']) && empty($hora=$_POST['horainicial']) && !empty($id_mesa=$_POST['id_mesa'])){
        //------------    
        $select=$pdo->prepare("SELECT * FROM tbl_historial WHERE id_mesa=$id_mesa");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaFiltro as $filtro) {
            echo "<tr>";
            echo "<td><b>{$filtro['id_historial']}</b></td>";
            echo "<td>{$filtro['fecha_historial']}</td>";
            echo "<td>{$filtro['hora_inicio_historial']}</td>";
            echo "<td>{$filtro['hora_fin_historial']}</td>";
            echo "<td>{$filtro['nombre_historial']}</td>";
            echo "<td>{$filtro['id_mesa']}</td>";
            echo '</tr>';
        }
    // Hora
    // 0 1 0
    }elseif(empty($fecha=$_POST['fecha']) && !empty($hora=$_POST['horainicial']) && empty($id_mesa=$_POST['id_mesa'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_historial WHERE hora_inicio_historial='{$hora}'");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaFiltro as $filtro) {
            echo "<tr>";
            echo "<td><b>{$filtro['id_historial']}</b></td>";
            echo "<td>{$filtro['fecha_historial']}</td>";
            echo "<td>{$filtro['hora_inicio_historial']}</td>";
            echo "<td>{$filtro['hora_fin_historial']}</td>";
            echo "<td>{$filtro['nombre_historial']}</td>";
            echo "<td>{$filtro['id_mesa']}</td>";
            echo '</tr>';
        }
        // Hora + Id_mesa
        // 0 1 1
        }elseif(empty($fecha=$_POST['fecha']) && !empty($hora=$_POST['horainicial']) && !empty($id_mesa=$_POST['id_mesa'])){
            //------------
            $select=$pdo->prepare("SELECT * FROM tbl_historial WHERE hora_inicio_historial='{$hora}' and id_mesa=$id_mesa");
            $select->execute();
            $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
            //------------
            foreach ($listaFiltro as $filtro) {
                echo "<tr>";
                echo "<td><b>{$filtro['id_historial']}</b></td>";
                echo "<td>{$filtro['fecha_historial']}</td>";
                echo "<td>{$filtro['hora_inicio_historial']}</td>";
                echo "<td>{$filtro['hora_fin_historial']}</td>";
                echo "<td>{$filtro['nombre_historial']}</td>";
                echo "<td>{$filtro['id_mesa']}</td>";
                echo '</tr>';
            }
        // Fecha
        // 1 0 0
        }elseif(!empty($fecha=$_POST['fecha']) && empty($hora=$_POST['horainicial']) && empty($id_mesa=$_POST['id_mesa'])){
            //------------
            $select=$pdo->prepare("SELECT * FROM tbl_historial WHERE fecha_historial='{$fecha}'");
            $select->execute();
            $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
            //------------
            foreach ($listaFiltro as $filtro) {
                echo "<tr>";
                echo "<td><b>{$filtro['id_historial']}</b></td>";
                echo "<td>{$filtro['fecha_historial']}</td>";
                echo "<td>{$filtro['hora_inicio_historial']}</td>";
                echo "<td>{$filtro['hora_fin_historial']}</td>";
                echo "<td>{$filtro['nombre_historial']}</td>";
                echo "<td>{$filtro['id_mesa']}</td>";
                echo '</tr>';
            }
        // Fecha + Id_mesa
        // 1 0 1
        }elseif(!empty($fecha=$_POST['fecha']) && empty($hora=$_POST['horainicial']) && !empty($id_mesa=$_POST['id_mesa'])){
            //------------
            $select=$pdo->prepare("SELECT * FROM tbl_historial WHERE fecha_historial='{$fecha}' and id_mesa=$id_mesa");
            $select->execute();
            $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
            //------------
            foreach ($listaFiltro as $filtro) {
                echo "<tr>";
                echo "<td><b>{$filtro['id_historial']}</b></td>";
                echo "<td>{$filtro['fecha_historial']}</td>";
                echo "<td>{$filtro['hora_inicio_historial']}</td>";
                echo "<td>{$filtro['hora_fin_historial']}</td>";
                echo "<td>{$filtro['nombre_historial']}</td>";
                echo "<td>{$filtro['id_mesa']}</td>";
                echo '</tr>';
            }
        // Fecha + Hora
        // 1 1 0
        }elseif(!empty($fecha=$_POST['fecha']) && !empty($hora=$_POST['horainicial']) && empty($id_mesa=$_POST['id_mesa'])){
            //------------
            $select=$pdo->prepare("SELECT * FROM tbl_historial WHERE fecha_historial='{$fecha}' and hora_inicio_historial='{$hora}'");
            $select->execute();
            $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
            //------------
            foreach ($listaFiltro as $filtro) {
                echo "<tr>";
                echo "<td><b>{$filtro['id_historial']}</b></td>";
                echo "<td>{$filtro['fecha_historial']}</td>";
                echo "<td>{$filtro['hora_inicio_historial']}</td>";
                echo "<td>{$filtro['hora_fin_historial']}</td>";
                echo "<td>{$filtro['nombre_historial']}</td>";
                echo "<td>{$filtro['id_mesa']}</td>";
                echo '</tr>';
            }
        // Filtro lleno
        // 1 1 1
        }elseif(!empty($fecha=$_POST['fecha']) && !empty($hora=$_POST['horainicial']) && !empty($id_mesa=$_POST['id_mesa'])){
            //------------
            $select=$pdo->prepare("SELECT * FROM tbl_historial WHERE fecha_historial='{$fecha}' and hora_inicio_historial='{$hora}' and id_mesa=$id_mesa");
            $select->execute();
            $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
            //------------
            foreach ($listaFiltro as $filtro) {
                echo "<tr>";
                echo "<td><b>{$filtro['id_historial']}</b></td>";
                echo "<td>{$filtro['fecha_historial']}</td>";
                echo "<td>{$filtro['hora_inicio_historial']}</td>";
                echo "<td>{$filtro['hora_fin_historial']}</td>";
                echo "<td>{$filtro['nombre_historial']}</td>";
                echo "<td>{$filtro['id_mesa']}</td>";
                echo '</tr>';
            }
        }
        //----------------
    }else{
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_historial ORDER BY fecha_historial ASC");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaFiltro as $filtro) {
            echo "<tr>";
            echo "<td><b>{$filtro['id_historial']}</b></td>";
            echo "<td>{$filtro['fecha_historial']}</td>";
            echo "<td>{$filtro['hora_inicio_historial']}</td>";
            echo "<td>{$filtro['hora_fin_historial']}</td>";
            echo "<td>{$filtro['nombre_historial']}</td>";
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