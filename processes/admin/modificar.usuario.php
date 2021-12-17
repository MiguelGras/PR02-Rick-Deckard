<?php 

include '../../services/config.php';
include '../../services/conexion.php';

$id_usuario=$_GET['id_usuario'];
$tipo_usuario=$_GET['tipo_usuario'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$telf=$_POST['telf'];
$contra=$_POST['contra'];

/*
    echo $id_usuario;
    echo "<br>";
    echo $nombre;
    echo "<br>";
    echo $apellido;
    echo "<br>";
    echo $telf;
    echo "<br>";    
    echo $contra;
    die;
*/

$update = $pdo->prepare("UPDATE tbl_usuarios SET id_usuario='{$id_usuario}', tipo_usuario='{$tipo_usuario}', nombre_usuario='{$nombre}', apellido_usuario='{$apellido}', email_usuario='{$email}', contra_usuario=MD5('{$contra}'), telf_usuario='{$telf}' WHERE id_usuario='{$id_usuario}'");
/*
    print_r($update);
    die;
*/
try{
    $update-> execute();
    if(!empty($update)){
        if($tipo_usuario=='admin'){
            header("location:../../view/admin/administradores.php"); 
        }else{
            header("location:../../view/admin/camareros.php");
        }
        
    }else{
        echo '<script language="javascript">alert("No se ha podido introducir la mesa");</script>';
    }
}catch(PDOException $e){
    echo 'mal';
   echo  $e->getMessage();
}