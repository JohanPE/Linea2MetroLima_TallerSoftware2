<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();
//var_dump($_POST);

$idTarifa =  $_POST['idtarifa'];
$nombreTarifa= $_POST['nombreTarifa'];
$precioTarifa = $_POST['precioTarifa'];
$idEstadoTarifa = $_POST['idEstadoTarifa'];


$obj = new MetroController();
$item = new Metro();

$item->setIdTarifa($idTarifa);
$item->setNombreTarifa($nombreTarifa);
$item->setPrecioTarifa($precioTarifa);
$item->setIdEstadoTarifa($idEstadoTarifa);

$res = $obj->actualizarTarifa($item);
//echo $recarga;
echo "realizado";
?>

