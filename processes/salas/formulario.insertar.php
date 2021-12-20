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
    <title>Insertar sala</title>
</head>

<body>
    <?php
        include '../../view/ver.php';
        include '../../services/conexion.php';

        session_start();
        if(!empty($_SESSION['email'])){

            
    ?>
<div class='paddingtop'>
        <a class='btnhistorial' href='../../view/admin/salas.php'>Atras</a>
        <a class='btnlogout' href='../../processes/logout.php'>Log Out</a>
</div>
<br><br>
<h2><b>Insertar Sala</b></h2>
<?php
echo "<div>";
    echo "<center>";
        echo "<form action='insertar.sala.php' enctype='multipart/form-data'  method='POST'>";
            echo "<p class='feedback-input'>Nombre de la sala: <input type='text' name='nombre' size='60'></p>";
            echo "<p class='feedback-input'>Imagen evento: <input class='form-control' type='file' accept='image/*' name='file' id='' width='100%' required></p>";
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