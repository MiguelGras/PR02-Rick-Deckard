        <?php
include '../services/config.php';
include '../services/conexion.php';

$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$email=$_POST["email"];
$contra=$_POST["contraseña"];
$telf=$_POST["telefono"];

        $insert=$pdo->prepare("INSERT INTO tbl_administradores (id_administrador,nombre_admin,apellido_admin,email_admin,contra_admin,telf_admin) VALUES ('','{$nombre}','{$apellido}','{$email}','{$contra}','{$telf}');");

        try{
        $insert-> execute();
                if(empty($insert)){
                        echo 'mal';
                }else{
                        header("location:../view/administradores.php");
                }
        }catch(PDOException $e){
        echo 'mal';
        echo  $e->getMessage();
        }

?>