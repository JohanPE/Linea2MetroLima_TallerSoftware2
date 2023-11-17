<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();

$usuarioQR = $_POST['usuarioQR'];
$contraseniaQR = $_POST['contraseniaQR'];

$obj = new MetroController();
$item = new Metro();

$item->setUsuario($usuarioQR);
$item->setContrasenia($contraseniaQR);

$res = $obj->solicitarQR($item);
?>

