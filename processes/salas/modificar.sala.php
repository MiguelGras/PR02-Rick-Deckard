<?php 

include '../../services/config.php';
include '../../services/conexion.php';

$capacidad=$_POST['capacidad'];
$ubicacion=$_POST['ubicacion'];
$id_mesa=$_GET['id_mesa'];

$insert = $pdo->prepare("UPDATE tbl_mesas SET id_mesa='{$id_mesa}', capacidad_mesa='{$capacidad}', ubicacion_mesa='{$ubicacion}' WHERE id_mesa='{$id_mesa}'");
$insert-> execute();
try{
    if(!empty($insert)){
        header("location:../../view/admin/vistaadmin.php");
    }else{
        echo '<script language="javascript">alert("No se ha podido introducir la mesa");</script>';
    }
}catch(PDOException $e){
    echo 'mal';
   echo  $e->getMessage();
}