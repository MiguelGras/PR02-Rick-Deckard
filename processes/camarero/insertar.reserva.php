<?php 

include '../../services/config.php';
include '../../services/conexion.php';

$fecha=$_POST['fecha'];
$horainicial=$_POST['horainicial'];
$nombre=$_POST['nombre'];
$id_mesa=$_GET['id_mesa'];

$horafin= strtotime ( "2 hours" , strtotime ( $horainicial ) ) ;
$horafinal= date ('H:i' , $horafin);

$horame= strtotime ( "-1 hours" , strtotime ( $horainicial ) ) ;
$horamenos= date ('H:i' , $horame);
$horama= strtotime ( "1 hours" , strtotime ( $horainicial ) ) ;
$horamas= date ('H:i' , $horama);

//--------------Comprobacion de fecha del sistema para no poder hacer reservas en el pasado

$fechasistema=date('Y-m-d');
$horasistema=date('H:i');
if ($fechasistema == $fecha) {
    if ($horasistema>$horainicial) {
        exit("<script>
                    alert('No puedes escoger una hora pasada')
                    location.href='../../processes/camarero/formulario.crearreserva.php?id_mesa=$id_mesa';
               </script>");
    }else{
        $select = $pdo->prepare("SELECT id_reserva,fecha_reserva,hora_inicio_reserva,hora_fin_reserva FROM tbl_reservas WHERE fecha_reserva='{$fecha}' and hora_inicio_reserva BETWEEN '{$horamenos}' AND '{$horamas}' and id_mesa='{$id_mesa}'");
        $select-> execute();
        $listaReservas=$select->fetchAll(PDO::FETCH_ASSOC);
        /*
            print_r($select);
            die;
        */
        try {
            if(!empty($listaReservas)) {
                //header("location:../../processes/camarero/formulario.crearreserva.php?id_mesa=$id_mesa");
                exit("<script>
                            alert('Ya se ha reservado una mesa a esa hora')
                            location.href='../../processes/camarero/formulario.crearreserva.php?id_mesa=$id_mesa';
                    </script>");
            }elseif(empty($listaReservas)){
                $insert = $pdo->prepare("INSERT INTO tbl_reservas (id_reserva,fecha_reserva,hora_inicio_reserva,hora_fin_reserva,nombre_reserva,id_mesa) VALUES (NULL,'{$fecha}','{$horainicial}','{$horafinal}','{$nombre}','{$id_mesa}');");
                try{
                    $insert-> execute();
                    if(!empty($insert)){
                        header("location:../../view/camarero/reservamesa.php?id_mesa=$id_mesa");
                    }else{
                        echo '<script language="javascript">alert("No se ha podido introducir la reserva");</script>';
                    }
                }catch(PDOException $e){
                    echo 'mal';
                echo  $e->getMessage();
                }
                
            }
        } catch (PDOException $e){
            echo 'mal';
            echo  $e->getMessage();
        }
    }
}else{
    $select = $pdo->prepare("SELECT id_reserva,fecha_reserva,hora_inicio_reserva,hora_fin_reserva FROM tbl_reservas WHERE fecha_reserva='{$fecha}' and hora_inicio_reserva BETWEEN '{$horamenos}' AND '{$horamas}' and id_mesa='{$id_mesa}'");
    $select-> execute();
    $listaReservas=$select->fetchAll(PDO::FETCH_ASSOC);
    /*
        print_r($select);
        die;
    */
    try {
        if(!empty($listaReservas)) {
            //header("location:../../processes/camarero/formulario.crearreserva.php?id_mesa=$id_mesa");
            exit("<script>
                        alert('Ya se ha reservado una mesa a esa hora')
                        location.href='../../processes/camarero/formulario.crearreserva.php?id_mesa=$id_mesa';
                </script>");
        }elseif(empty($listaReservas)){
            $insert = $pdo->prepare("INSERT INTO tbl_reservas (id_reserva,fecha_reserva,hora_inicio_reserva,hora_fin_reserva,nombre_reserva,id_mesa) VALUES (NULL,'{$fecha}','{$horainicial}','{$horafinal}','{$nombre}','{$id_mesa}');");
            try{
                $insert-> execute();
                if(!empty($insert)){
                    header("location:../../view/camarero/reservamesa.php?id_mesa=$id_mesa");
                }else{
                    echo '<script language="javascript">alert("No se ha podido introducir la reserva");</script>';
                }
            }catch(PDOException $e){
                echo 'mal';
            echo  $e->getMessage();
            }
            
        }
    } catch (PDOException $e){
        echo 'mal';
        echo  $e->getMessage();
    }
}

/*
    echo $fechasistema;
    echo "<br>";
    echo $horasistema;
    die;
*/
//--------------
/*
    echo $fecha;
    echo "<br>";
    echo $horainicial;
    echo "<br>";
    echo $horafinal;
    echo "<br>";
    echo $nombre;
    echo "<br>";
    echo $id_mesa;
    die;
/*
    echo "<br>";
    echo $horamenos;
    echo "<br>";
    echo $horamas;
    die;
*/

    
    //print_r($insert);
    //die;
/*
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
*/