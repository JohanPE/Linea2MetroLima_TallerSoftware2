<?php
require_once("../modelo/marcabe.class.php");
require_once("../controlador/marcascontroller.class.php");
session_start();

$usuarioQR = $_POST['usuarioQR'];
$contraseniaQR = $_POST['contraseniaQR'];

$obj = new MarcaController();
$item = new Marca();

$item->setUsuario($usuarioQR);
$item->setContrasenia($contraseniaQR);

$res = $obj->solicitarQR($item);
?>

