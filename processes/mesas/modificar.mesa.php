<?php 

include '../../services/config.php';
include '../../services/conexion.php';

$capacidad=$_POST['capacidad'];
$ubicacion=$_POST['ubicacion'];
$id_mesa=$_GET['id_mesa'];

$id_sala = $pdo->prepare("SELECT id_sala FROM tbl_salas WHERE nombre_sala='{$ubicacion}'");
$id_sala-> execute();
$sala=$id_sala->fetchAll(PDO::FETCH_ASSOC);
foreach ($sala as $id_sala) {
    $sala2=$id_sala['id_sala'];
}

$insert = $pdo->prepare("UPDATE tbl_mesas SET id_mesa='{$id_mesa}', capacidad_mesa='{$capacidad}', ubicacion_mesa='{$ubicacion}', id_sala='{$sala2}' WHERE id_mesa='{$id_mesa}'");
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