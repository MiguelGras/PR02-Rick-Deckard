<?php 

include '../services/config.php';
include '../services/conexion.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear</title>
</head>
<body>
    <center><h1>Crear usuario</h1></center>
    <br>
    <div class="form-group align-items-center">
    <form action="insertarUsuario.php" method="post">
        <label for="Nombre">Nombre:</label>
        <input type="text" class="form-control" name="nombre" id="nombre">
        <br>
        <label for="Apellido">Apellido:</label>
        <input type="text" class="form-control" name="apellido" id="apellido">
        <br>
        <label for="Email">Email:</label>
        <input type="text" class="form-control" name="email" id="email">
        <br>
        <label for="Contraseña">Contraseña:</label>
        <input type="text" class="form-control" name="contraseña" id="contraseña">
        <br>
        <label for="Telefono">Telefono:</label>
        <input type="text" class="form-control" name="telefono" id="telefono">
        <br>
        <input type="submit" class="btn btn-success" value="Crear">
    </form>
    </div>
</body>
</html>