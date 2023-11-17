<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();
//var_dump($_POST);

$usuarioPagar= $_POST['usuarioPagar'];
$recarga = $_POST['recarga'];

$obj = new MetroController();
$item = new Metro();

$item->setUsuario($usuarioPagar);
$item->setSaldo($recarga);

$res = $obj->recargar($item);
//echo $recarga;
?>

