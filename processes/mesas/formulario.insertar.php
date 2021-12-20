<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/vista.css">
    <link rel="shortcut icon" type="image/png" href="../../img/icono.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../js/modalbox.js"></script>
    <script src="../../js/login.js"></script>
    <title>Insertar mesa</title>
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
<br><br>
<h2><b>Insertar Mesa</b></h2>
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
echo "<div>";
    echo "<center>";
        echo "<form action='insertar.mesa.php?id_mesa' method='POST'>";
            echo "<p class='feedback-input'>Capacidad: <input type='number' name='capacidad' size='60' required></p>";
            echo "<p class='feedback-input'>Ubicacion: <select name='ubicacion' required>";
            echo "<option value='$ubicacion'>$ubicacion</option>";
                $contador=0;
                foreach($listaSalas as $salassql){
                    $contador++;
                    echo "<option value='".$salassql['nombre_sala']."'>".$contador.".-".$salassql['nombre_sala']."</option>";
                }
            echo "</select></p>";
            echo "<input type='submit' value='Enviar' class='btnhistorial'>";
        echo "</form>";
    echo "</center>";
echo "</div>";

}else{
    header("Location:../index.php");
}
?>
</body>
</html>