<?php


include '../services/config.php';
include '../services/conexion.php';

//////////////////////////

if (isset($_POST['email']) && isset($_POST['pass'])) {
    require_once '../services/conexion.php';
    session_start();
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    //----------------
    $loginadmin = $pdo->prepare("SELECT * FROM tbl_administradores WHERE email_admin='$email' and contra_admin=MD5('{$pass}')");
    //----------------
    $loginadmin->execute();
    $comprobacion=$loginadmin->fetchAll(PDO::FETCH_ASSOC);
    print_r($comprobacion);
    try {
        if (!$comprobacion=="") {
            print_r($comprobacion);
            $_SESSION['email']=$email;
            //header("location:../view/vista.php?email=$email");
            header("location:../view/vistaadmin.php");
        }else {
            header("location:../view/loginadmin.html");
            //echo '<script language="javascript">alert("Email o contraseña incorrectos");</script>';
            
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}else{
    header("location:../view/loginadmin.html");
}
