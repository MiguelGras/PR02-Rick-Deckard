<?php 

include '../../services/config.php';
include '../../services/conexion.php';

$id_sala=$_GET['id_sala'];
$nombre=$_POST['nombre'];
$img_sala="../../img/".date('j-m-y')."-".$_FILES['file']['name'];
/*
    echo $id_sala;
    echo "<br>";
    echo $nombre;
    echo "<br>";
    echo $img_sala;
    die;
*/
if(move_uploaded_file($_FILES['file']['tmp_name'],$img_sala)){
    try{
        $update = $pdo->prepare("UPDATE tbl_salas SET id_sala='{$id_sala}', nombre_sala='{$nombre}', img_sala='{$img_sala}' WHERE id_sala='{$id_sala}'");
        $update-> execute();
            if(!empty($update)){
                header("location:../../view/admin/salas.php");
            }else{
                echo '<script language="javascript">alert("No se ha podid actualizar la sala");</script>';
            }
    }catch(PDOException $e){
        echo 'mal';
    echo  $e->getMessage();
    }
}

