<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();

$usuario = $_POST['crearUsuario'];
$contrasenia = $_POST['crearContrasenia'];
$dni = $_POST['dni'];

$obj = new MetroController();
$item = new Metro();

$item->setUsuario($usuario);
$item->setContrasenia($contrasenia);
$item->setDni($dni);

$res = $obj->nuevoUsuario($item);

?>