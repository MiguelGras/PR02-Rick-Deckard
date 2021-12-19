<?php 

include '../../services/config.php';
include '../../services/conexion.php';
$id_sala=$_GET['id_sala'];
//echo $id_sala;
//die;

$delete = $pdo->prepare("DELETE FROM tbl_salas WHERE id_sala='{$id_sala}'");
//print_r($delete);
//die;
try{
    $delete-> execute();
    if(!empty($delete)){
        header("location:../../view/admin/salas.php");
    }else{
        echo '<script language="javascript">alert("No se ha podido eliminar la mesa");</script>';
    }
}catch(PDOException $e){
    echo 'mal';
   echo  $e->getMessage();
}