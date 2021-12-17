<?php 

include '../../services/config.php';
include '../../services/conexion.php';

    $id_mesa=$_GET['id_mesa'];
    $id_reserva=$_GET['id_reserva'];

    $fecha=$_POST['fecha'];

    $horainicial=$_POST['hora'];
    $horafin= strtotime ( "2 hours" , strtotime ( $horainicial ) ) ;
    $horafinal= date ('H:i' , $horafin);

    $nombre=$_POST['nombre'];
/*
    echo $id_mesa;
    echo "<br>";
    echo $id_reserva;
    echo "<br>";
    echo $fecha;
    echo "<br>";
    echo $horainicial;
    echo "<br>";
    echo $horafinal;
    echo "<br>";
    echo $nombre;
    die;
*/
$update = $pdo->prepare("UPDATE tbl_reservas SET id_reserva='{$id_reserva}', fecha_reserva='{$fecha}', hora_inicio_reserva='{$horainicial}', hora_fin_reserva='{$horafinal}', nombre_reserva='{$nombre}', id_mesa='{$id_mesa}' WHERE id_reserva='{$id_reserva}'");
/*print_r($update);
die;*/
try{
    $update-> execute();
    if(!empty($update)){
        header("location:../../view/camarero/reservamesa.php?id_mesa=$id_mesa");
    }else{
        echo '<script language="javascript">alert("No se ha podido introducir la reserva");</script>';
    }
}catch(PDOException $e){
    echo 'mal';
   echo  $e->getMessage();
}