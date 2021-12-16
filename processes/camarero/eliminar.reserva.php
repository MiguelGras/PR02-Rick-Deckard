<?php 

include '../../services/config.php';
include '../../services/conexion.php';
$id_reserva=$_GET['id_reserva'];
$id_mesa=$_GET['id_mesa'];

/*
echo $id_mesa;
echo "<br>";
echo $id_reserva;
die;
*/

$delete = $pdo->prepare("DELETE FROM tbl_reservas WHERE id_reserva='{$id_reserva}'");
//print_r($delete);
//die;
try{
    $delete-> execute();
    if(!empty($delete)){
        header("location:../../view/camarero/reservamesa.php?id_mesa=$id_mesa");
    }else{
        echo '<script language="javascript">alert("No se ha podido eliminar la reserva");</script>';
    }
}catch(PDOException $e){
    echo 'mal';
   echo  $e->getMessage();
}