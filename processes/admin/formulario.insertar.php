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
<div class='paddingtop'>
        <a class='btnhistorial' href='../../view/admin/vistaadmin.php'>Atras</a>
        <a class='btnlogout' href='../../processes/logout.php'>Log Out</a>
</div>
    <br>
<div class="filtrado">
    <form action="insertar.admin.php" method="POST">
        <p>Nombre: <input type="text" name="nombre" size="60" required></p>
        <p>Apellido: <input type="text" name="apellido" size="40" required></p>
        <p>Email: <input type="email" name="email" size="40" required></p>
        <p>Telefono: <input type="number" name="telf" size="40" required></p>
        <p>Contraseña: <input type="text" name="contra" size="40" required></p>
        <input type="submit" value="Enviar">
    </form>
</div>

</body>
</body>