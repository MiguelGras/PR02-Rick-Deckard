<?php 

include '../../services/config.php';
include '../../services/conexion.php';

$nombre=$_POST['nombre'];
$img_sala="../../img/".date('j-m-y')."-".$_FILES['file']['name'];

if(move_uploaded_file($_FILES['file']['tmp_name'],$img_sala)){
    try{
        $insert = $pdo->prepare("INSERT INTO tbl_salas (id_sala, nombre_sala, img_sala) VALUES (NULL,'{$nombre}', '{$img_sala}')");
        $insert-> execute();
        if(!empty($insert)){
            header("location:../../view/admin/salas.php");
        }else{
            echo '<script language="javascript">alert("No se ha podido introducir la sala");</script>';
        }
    }catch(PDOException $e){
        echo 'mal';
    echo  $e->getMessage();
    }
}


