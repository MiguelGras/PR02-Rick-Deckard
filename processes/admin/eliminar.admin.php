<?php 

include '../../services/config.php';
include '../../services/conexion.php';
$id_admin=$_GET['id_administrador'];
//echo $id_admin;
//die;

$delete = $pdo->prepare("DELETE FROM tbl_administradores WHERE id_administrador='{$id_admin}'");
//print_r($delete);
//die;
try{
    $delete-> execute();
    if(!empty($delete)){
        header("location:../../view/admin/administradores.php");
    }else{
        echo '<script language="javascript">alert("No se ha podido eliminar la mesa");</script>';
    }
}catch(PDOException $e){
    echo 'mal';
   echo  $e->getMessage();
}