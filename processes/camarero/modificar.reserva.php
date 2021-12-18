<?php 

include '../../services/config.php';
include '../../services/conexion.php';

    $id_mesa=$_GET['id_mesa'];
    $id_reserva=$_GET['id_reserva'];
    $fechaurl=$_GET['fecha_reserva'];
    $horaurl=$_GET['horainicial'];
    $nombreurl=$_GET['nombre'];

    $fecha=$_POST['fecha'];
    $nombre=$_POST['nombre'];
    $horainicial=$_POST['hora'];

    $horafin= strtotime ( "2 hours" , strtotime ( $horainicial ) ) ;
    $horafinal= date ('H:i' , $horafin);

    $horame= strtotime ( "-1 hours" , strtotime ( $horainicial ) ) ;
    $horamenos= date ('H:i' , $horame);
    $horama= strtotime ( "1 hours" , strtotime ( $horainicial ) ) ;
    $horamas= date ('H:i' , $horama);

    
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
$fechasistema=date('Y-m-d');
$horasistema=date('H:i');

if ($fechasistema == $fecha) {
    if ($horasistema>$horainicial) {
        exit("<script>
                    alert('No puedes escoger una hora pasada')
                    location.href='formulario.modificarreserva.php?id_mesa=$id_mesa&id_reserva=$id_reserva&fecha_reserva=$fechaurl&horainicial=$horaurl&nombre=$nombreurl';
                    </script>");
    }else{
        $select = $pdo->prepare("SELECT id_reserva,fecha_reserva,hora_inicio_reserva,hora_fin_reserva FROM tbl_reservas WHERE fecha_reserva='{$fecha}' and hora_inicio_reserva BETWEEN '{$horamenos}' AND '{$horamas}' and id_mesa='{$id_mesa}'");
        $select-> execute();
        $listaReservas=$select->fetchAll(PDO::FETCH_ASSOC);
        /*
            print_r($update);
            die;
        */
        try {
            if(!empty($listaReservas)) {
                //header("location:../../processes/camarero/formulario.crearreserva.php?id_mesa=$id_mesa");
                exit("<script>
                            alert('Ya se ha reservado una mesa a esa hora')
                            location.href='formulario.modificarreserva.php?id_mesa=$id_mesa&id_reserva=$id_reserva&fecha_reserva=$fechaurl&horainicial=$horaurl&nombre=$nombreurl';
                    </script>");
            }elseif(empty($listaReservas)){
                $update = $pdo->prepare("UPDATE tbl_reservas SET id_reserva='{$id_reserva}', fecha_reserva='{$fecha}', hora_inicio_reserva='{$horainicial}', hora_fin_reserva='{$horafinal}', nombre_reserva='{$nombre}', id_mesa='{$id_mesa}' WHERE id_reserva='{$id_reserva}'");
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
            print_r($update);
            die;
        */
        try {
            if(!empty($listaReservas)) {
                //header("location:../../processes/camarero/formulario.crearreserva.php?id_mesa=$id_mesa");
                exit("<script>
                            alert('Ya se ha reservado una mesa a esa hora')
                            location.href='formulario.modificarreserva.php?id_mesa=$id_mesa&id_reserva=$id_reserva&fecha_reserva=$fechaurl&horainicial=$horaurl&nombre=$nombreurl';
                    </script>");
            }elseif(empty($listaReservas)){
                $update = $pdo->prepare("UPDATE tbl_reservas SET id_reserva='{$id_reserva}', fecha_reserva='{$fecha}', hora_inicio_reserva='{$horainicial}', hora_fin_reserva='{$horafinal}', nombre_reserva='{$nombre}', id_mesa='{$id_mesa}' WHERE id_reserva='{$id_reserva}'");
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
            }
            } catch (PDOException $e){
                echo 'mal';
                echo  $e->getMessage();
            }
        }