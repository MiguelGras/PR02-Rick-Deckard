<?php 

include '../../services/config.php';
include '../../services/conexion.php';

$id_admin=$_GET['id_administrador'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$telf=$_POST['telf'];
$contra=$_POST['contra'];

    /*echo $id_admin;
    echo "<br>";
    echo $nombre;
    echo "<br>";
    echo $apellido;
    echo "<br>";
    echo $telf;
    echo "<br>";
    echo $contra;
    die;*/

$insert = $pdo->prepare("UPDATE tbl_administradores SET id_administrador='{$id_admin}', nombre_admin='{$nombre}', apellido_admin='{$apellido}', email_admin='{$email}', contra_admin=MD5('{$contra}'), telf_admin='{$telf}' WHERE id_administrador='{$id_admin}'");
/*print_r($insert);
die;*/
try{
    $insert-> execute();
    if(!empty($insert)){
        header("location:../../view/admin/administradores.php");
    }else{
        echo '<script language="javascript">alert("No se ha podido introducir la mesa");</script>';
    }
}catch(PDOException $e){
    echo 'mal';
   echo  $e->getMessage();
}