<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();
//var_dump($_POST);

$idEstadoTarifa =  $_POST['idestadotarifa'];
$nombreEstadoTarifa= $_POST['nombreEstadoTarifa'];
$glosaEstadoTarifa = $_POST['glosaEstadoTarifa'];


$obj = new MetroController();
$item = new Metro();

$item->setIdEstadoTarifa($idEstadoTarifa);
$item->setNombreEstadoTarifa($nombreEstadoTarifa);
$item->setGlosaEstadoTarifa($glosaEstadoTarifa);

$res = $obj->actualizarEstadoTarifa($item);
//echo $recarga;
echo "realizado";
?>

