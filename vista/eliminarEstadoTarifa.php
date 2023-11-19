<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();

$idestadotarifa = $_POST['idestadotarifa'];

$obj2 = new MetroController();
$item = new Metro();

$item->setIdEstadoTarifa($idestadotarifa);
$res2 = $obj2->eliminarEstadoTarifa($item);

//print_r($res); // Imprimir el resultado

?>