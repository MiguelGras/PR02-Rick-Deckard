<?php 

include '../../services/config.php';
include '../../services/conexion.php';

$fecha=$_POST['fecha'];
$horainicial=$_POST['hora'];
$nombre=$_POST['nombre'];
$id_mesa=$_GET['id_mesa'];

$horafin= strtotime ( "2 hours" , strtotime ( $horainicial ) ) ;
$horafinal= date ('H:i' , $horafin);
/*
echo $fecha;
echo "<br>";
echo $horainicial;
echo "<br>";
echo $horafinal;
echo "<br>";
echo $id_mesa;
die;
*/

$insert = $pdo->prepare("INSERT INTO tbl_reservas (id_reserva,fecha_reserva,hora_inicio_reserva,hora_fin_reserva,nombre_reserva,id_mesa) VALUES (NULL,'{$fecha}','{$horainicial}','{$horafinal}','{$nombre}','{$id_mesa}');");
print_r($insert);

try{
    $insert-> execute();
    if(!empty($insert)){
        header("location:../../view/camarero/reservamesa.php?id_mesa=$id_mesa");
    }else{
        echo '<script language="javascript">alert("No se ha podido introducir el administrador");</script>';
    }
}catch(PDOException $e){
    echo 'mal';
   echo  $e->getMessage();
}