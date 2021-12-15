<?php 

include '../../services/config.php';
include '../../services/conexion.php';

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$telf=$_POST['telf'];
$contra=$_POST['contra'];

$insert = $pdo->prepare("INSERT INTO tbl_camareros (id_usuario,nombre_usuario,apellido_usuario,email_usuario,contra_usuario,telf_usuario) VALUES (NULL,'{$nombre}','{$apellido}','{$email}',MD5('{$contra}'),'{$telf}');");
/*print_r($insert);
die;*/
try{
    $insert-> execute();
    if(!empty($insert)){
        header("location:../../view/admin/camareros.php");
    }else{
        echo '<script language="javascript">alert("No se ha podido introducir el administrador");</script>';
    }
}catch(PDOException $e){
    echo 'mal';
   echo  $e->getMessage();
}