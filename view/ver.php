<?php

include '../services/config.php';
include '../services/conexion.php';
include '../processes/mesa.php';
//include '../processes/usuarios.php';
$sentencia=$pdo->prepare("SELECT * FROM tbl_mesas");
$sentencia->execute();
$listaMesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia2=$pdo->prepare("SELECT * FROM tbl_historial");
$sentencia2->execute();
$listaHistorial=$sentencia2->fetchAll(PDO::FETCH_ASSOC);