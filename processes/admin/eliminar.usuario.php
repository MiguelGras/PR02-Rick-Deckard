<?php 

include '../../services/config.php';
include '../../services/conexion.php';

$id_usuario=$_GET['id_usuario'];
$tipo_usuario=$_GET['tipo_usuario'];
/*
    echo $id_usuario;
    echo $tipo_usuario;
    die;
*/
$delete = $pdo->prepare("DELETE FROM tbl_usuarios WHERE id_usuario='{$id_usuario}' and tipo_usuario='{$tipo_usuario}'");
/*
    print_r($delete);
    die;
*/

try{
    $delete-> execute();
    if(!empty($delete)){
        if($tipo_usuario=='camarero'){
            header("location:../../view/admin/camareros.php");
        }else{
            header("location:../../view/admin/administradores.php");
        }
    }
}catch(PDOException $e){
    echo 'mal';
   echo  $e->getMessage();
}