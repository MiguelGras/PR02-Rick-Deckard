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
echo "<div class='filtrado'>";
    echo "<form action='insertar.sala.php' method='POST'>";
        echo "<p>Nombre de la sala: <input type='text' name='nombre' size='60'></p>";
        echo "<input type='submit' value='Enviar'>";
    echo "</form>";
echo "</div>";

}else{
    header("Location:../index.php");
}
?>
</body>
</html>