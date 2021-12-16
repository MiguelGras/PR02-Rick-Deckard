<?php 

include '../../services/config.php';
include '../../services/conexion.php';

$id_usuario=$_GET['id_usuario'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$telf=$_POST['telf'];
$contra=$_POST['contra'];

    echo $id_usuario;
    echo "<br>";
    echo $nombre;
    echo "<br>";
    echo $apellido;
    echo "<br>";
    echo $telf;
    echo "<br>";
    echo $contra;
    die;

$insert = $pdo->prepare("UPDATE tbl_camareros SET id_usuario='{$id_usuario}', nombre_usuario='{$nombre}', apellido_usuario='{$apellido}', email_usuario='{$email}', contra_usuario=MD5('{$contra}'), telf_usuario='{$telf}' WHERE id_usuario='{$id_usuario}'");
/*print_r($insert);
die;*/
try{
    $insert-> execute();
    if(!empty($insert)){
        header("location:../../view/admin/camareros.php");
    }else{
        echo '<script language="javascript">alert("No se ha podido introducir el camarero");</script>';
    }
}catch(PDOException $e){
    echo 'mal';
   echo  $e->getMessage();
}