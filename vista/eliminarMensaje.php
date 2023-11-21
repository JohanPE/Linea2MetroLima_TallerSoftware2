<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();

$idmensaje = $_POST['idmensaje'];

$obj2 = new MetroController();
$item = new Metro();

$item->setIdMensaje($idmensaje);
$res2 = $obj2->eliminarMensaje($item);

//print_r($res); // Imprimir el resultado

?>