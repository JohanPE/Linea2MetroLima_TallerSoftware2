<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();

$usuariotrabajador = $_POST['crearUsuario'];
$clave = $_POST['crearContrasenia'];
$idRol = $_POST['idRol'];
$dni = $_POST['dni'];

$obj = new MetroController();
$item = new Metro();

$item->setUsuarioTrabajador($usuariotrabajador);
$item->setClave($clave);
$item->setIdRol($idRol);
$item->setDni($dni);

$res = $obj->nuevoUsuarioTrabajador($item);

?>