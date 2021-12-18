<?php 

include '../../services/config.php';
include '../../services/conexion.php';

$nombre=$_POST['nombre'];

$insert = $pdo->prepare("INSERT INTO tbl_salas (id_sala, nombre_sala) VALUES (NULL,'{$nombre}')");
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