<?php 

include '../../services/config.php';
include '../../services/conexion.php';

$tipo=$_POST['tipo'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$telf=$_POST['telf'];
$contra=$_POST['contra'];


$insert = $pdo->prepare("INSERT INTO tbl_usuarios (id_usuario,tipo_usuario,nombre_usuario,apellido_usuario,email_usuario,contra_usuario,telf_usuario) VALUES (NULL,'$tipo','{$nombre}','{$apellido}','{$email}',MD5('{$contra}'),'{$telf}');");
/*
    print_r($insert);
    die;
*/
try{
    $insert-> execute();
    if(!empty($insert)){
        if($tipo=='camarero'){
            header("location:../../view/admin/camareros.php");
        }else{
            header("location:../../view/admin/administradores.php");
        }
    }
}catch(PDOException $e){
    echo 'mal';
   echo  $e->getMessage();
}