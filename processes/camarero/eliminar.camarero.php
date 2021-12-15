<?php 

include '../../services/config.php';
include '../../services/conexion.php';
$id_cam=$_GET['id_usuario'];
//echo $id_cam;
//die;

$delete = $pdo->prepare("DELETE FROM tbl_camareros WHERE id_usuario='{$id_cam}'");
//print_r($delete);
//die;
try{
    $delete-> execute();
    if(!empty($delete)){
        header("location:../../view/admin/camareros.php");
    }else{
        echo '<script language="javascript">alert("No se ha podido eliminar la mesa");</script>';
    }
}catch(PDOException $e){
    echo 'mal';
   echo  $e->getMessage();
}