<!DOCTYPE html>
<html>
<title>CREAR PERSONA</title>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/vista.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../js/modalbox.js"></script>
    <script src="../../js/login.js"></script>
    <title>Vista Proyecto RICK-DECKARD21</title>
</head>

<body>
    <?php
        include '../../view/ver.php';
        include '../../services/conexion.php';

        session_start();
        if(!empty($_SESSION['email'])){

            
    ?>
<div class='paddingtop'>
        <a class='btnhistorial' href='../../view/admin/vistaadmin.php'>Atras</a>
        <a class='btnlogout' href='../../processes/logout.php'>Log Out</a>
</div>
<h2><b>Administrar mesas</b></h2>
<?php
/*------------------
$ubicacionsql=$pdo->prepare("SELECT DISTINCT ubicacion_mesa FROM tbl_mesas");
$ubicacionsql->execute();
$listaUbicacion=$ubicacionsql->fetchAll(PDO::FETCH_ASSOC);
*///------------------
$salassql=$pdo->prepare("SELECT nombre_sala FROM tbl_salas");
$salassql->execute();
$listaSalas=$salassql->fetchAll(PDO::FETCH_ASSOC);
//------------------
echo "<div class='filtrado'>";
    echo "<form action='insertar.mesa.php?id_mesa' method='POST'>";
        echo "<p>Capacidad: <input type='number' name='capacidad' size='60'></p>";
        //echo "<p>Ubicacion: <input type='text' name='ubicacion' size='40' value='{$ubicacion}'></p>";
        echo "<p>Ubicacion: <select name='ubicacion'>";
        echo "<option value='$ubicacion'>$ubicacion</option>";
            $contador=0;
            foreach($listaSalas as $salassql){
                $contador++;
                echo "<option value='".$salassql['nombre_sala']."'>".$contador.".-".$salassql['nombre_sala']."</option>";
            }
        echo "</select></p>";
        echo "<input type='submit' value='Enviar'>";
    echo "</form>";
echo "</div>";

}else{
    header("Location:../index.php");
}
?>
</body>
</html>