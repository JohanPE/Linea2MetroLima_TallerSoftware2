<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();

$idtarifa = $_POST['idtarifa'];

$obj2 = new MetroController();
$item = new Metro();

$item->setIdTarifa($idtarifa);
$res2 = $obj2->eliminarTarifa($item);

//print_r($res); // Imprimir el resultado

?>