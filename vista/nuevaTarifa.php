<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();
//var_dump($_POST);

$nombreTarifa= $_POST['nombreTarifa'];
$precioTarifa = $_POST['precioTarifa'];
$idEstadoTarifa =  $_POST['idEstadoTarifa'];

$obj = new MetroController();
$item = new Metro();

$item->setNombreTarifa($nombreTarifa);
$item->setPrecioTarifa($precioTarifa);
$item->setIdEstadoTarifa($idEstadoTarifa);

$res = $obj->nuevaTarifa($item);
//echo $recarga;
echo "realizado";
?>

