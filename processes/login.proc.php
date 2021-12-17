<?php


include '../services/config.php';
include '../services/conexion.php';
/*


$email = mysqli_real_escape_string($servidor,$email); //hace que este string no pueda tener carácteres especiales cómo comillas
#Comprobamos que el usuario y contraseña existan en la tabla ADMIN
$user = mysqli_query($servidor,"SELECT * FROM tbl_usuarios where email_usuario='$email' and contra_usuario=('{$contraseña}')");
#Realizamos la query
#Aqui guardamos el resultado, si es 1 o 0.
if (mysqli_num_rows($user) == 1) {
    // coincidencia de credenciales
    session_start();
    $_SESSION['email']=$email;
    header("location: ../view/vista.php");
} else {
    // usuario o contraseña erróneos
    header("location: ../view/login.html");
}

mysqli_free_result($user);
*/

//////////////////////////

if (isset($_POST['email']) && isset($_POST['pass'])) {
    require_once '../services/conexion.php';
    session_start();
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    //----------------
    $logincam = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE tipo_usuario='camarero' and email_usuario='$email' and contra_usuario=MD5('{$pass}')");
    //----------------
    $logincam->execute();
    $comprobacion=$logincam->fetchAll(PDO::FETCH_ASSOC);
    try {
        if (!$comprobacion=="" ) {
            print_r($comprobacion);
            $_SESSION['email']=$email;
            header("location:../view/camarero/menu.php?email=$email");
            //header("location:../view/camarero/vistacamarero.php?email=$email");
        }else {
            header("location: ../view/login.html");
            //echo "<script language='javascript'>alert('Email o contraseña incorrectos');</script>";
            
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}else{
    header("location: ../view/login.html");
}
