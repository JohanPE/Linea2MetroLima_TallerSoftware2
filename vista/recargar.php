<?php
require_once("../modelo/marcabe.class.php");
require_once("../controlador/marcascontroller.class.php");
session_start();
//var_dump($_POST);

$usuarioPagar= $_POST['usuarioPagar'];
$recarga = $_POST['recarga'];

$obj = new MarcaController();
$item = new Marca();

$item->setUsuario($usuarioPagar);
$item->setSaldo($recarga);

$res = $obj->recargar($item);
//echo $recarga;
?>

