<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();
//var_dump($_POST);

$nombreEstadoTarifa= $_POST['nombreEstadoTarifa'];
$glosaEstadoTarifa = $_POST['glosaEstadoTarifa'];

$obj = new MetroController();
$item = new Metro();

$item->setNombreEstadoTarifa($nombreEstadoTarifa);
$item->setGlosaEstadoTarifa($glosaEstadoTarifa);

$res = $obj->nuevoEstadoTarifa($item);
//echo $recarga;
echo "realizado";
?>

