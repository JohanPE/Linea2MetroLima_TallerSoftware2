<?php
require_once("../modelo/marcabe.class.php");
require_once("../controlador/marcascontroller.class.php");
session_start();

$idUsuario= $_POST['idUsuario'];

$obj = new MarcaController();
$item = new Marca();

$item->setIdUsuario($idUsuario);

$res = $obj->descontar($item);

//echo $recarga;
?>