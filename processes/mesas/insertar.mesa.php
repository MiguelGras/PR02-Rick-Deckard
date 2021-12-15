<?php 

include '../../services/config.php';
include '../../services/conexion.php';

$capacidad=$_POST['capacidad'];
$ubicacion=$_POST['ubicacion'];

$insert = $pdo->prepare("INSERT INTO tbl_mesas (id_mesa, capacidad_mesa, ubicacion_mesa) VALUES (NULL,'{$capacidad}','{$ubicacion}')");
//print_r($insert);
try{
    $insert-> execute();
    if(!empty($insert)){
        header("location:../../view/admin/vistaadmin.php");
    }else{
        echo '<script language="javascript">alert("No se ha podido introducir la mesa");</script>';
    }
}catch(PDOException $e){
    echo 'mal';
   echo  $e->getMessage();
}