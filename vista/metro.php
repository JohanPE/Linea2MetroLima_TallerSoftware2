<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();

$idUsuario= $_POST['idUsuario'];

$obj = new MetroController();
$item = new Metro();

$item->setIdUsuario($idUsuario);

$res = $obj->descontar($item);

//echo $recarga;
?>