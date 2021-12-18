<?php 

include '../../services/config.php';
include '../../services/conexion.php';

$capacidad=$_POST['capacidad'];
$ubicacion=$_POST['ubicacion'];

$id_sala = $pdo->prepare("SELECT id_sala FROM tbl_salas WHERE nombre_sala='{$ubicacion}'");
$id_sala-> execute();
$sala=$id_sala->fetchAll(PDO::FETCH_ASSOC);
foreach ($sala as $id_sala) {
    $sala2=$id_sala['id_sala'];
}

$insert = $pdo->prepare("INSERT INTO tbl_mesas (id_mesa, capacidad_mesa, ubicacion_mesa, id_sala) VALUES (NULL,'{$capacidad}','{$ubicacion}','{$sala2}')");
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