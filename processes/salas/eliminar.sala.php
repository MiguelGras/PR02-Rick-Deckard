<?php 

include '../../services/config.php';
include '../../services/conexion.php';
$id_mesa=$_GET['id_mesa'];
//echo $id_mesa;
//die;

$delete = $pdo->prepare("DELETE FROM tbl_mesas WHERE id_mesa='{$id_mesa}'");
//print_r($delete);
//die;
try{
    $delete-> execute();
    if(!empty($delete)){
        header("location:../../view/admin/vistaadmin.php");
    }else{
        echo '<script language="javascript">alert("No se ha podido eliminar la mesa");</script>';
    }
}catch(PDOException $e){
    echo 'mal';
   echo  $e->getMessage();
}