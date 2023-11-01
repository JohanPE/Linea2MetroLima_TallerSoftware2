<?php
/*
require_once("../modelo/marcabe.class.php");
require_once("../controlador/marcascontroller.class.php");
session_start();

$usuarioTrabajador = $_POST['usuarioTrabajador'];
$claveTrabajador = $_POST['claveTrabajador'];

$usr = new MarcaController();
$item = new Marca();

$item->setUsuarioTrabajador($usuarioTrabajador);
$item->setClave($claveTrabajador);

$res = $usr->validarUsuarioTrabajador($item);

if($res > 0){
    $_SESSION['usuario']=$login;
    header ('Location: paginaInicio2.html');
}else{
    header('Location: metro.html');
}*/

require_once("../modelo/marcabe.class.php");
    require_once("../controlador/marcascontroller.class.php");
    session_start();

    $usuario = $_POST['usuarioTrabajador'];
    $contrasenia = $_POST['claveTrabajador'];

    $obj = new MarcaController();
    $item = new Marca();

    $item->setUsuarioTrabajador($usuario);
    $item->setClave($contrasenia);

    $res = $obj->validarUsuarioTrabajador($item);
    //print_r($res);
    //print_r("<br><h3>Los datos son correctos!</h3><br>");
    //$lista = $obj->listarPornombre("SS");
    //print_r($lista);
    //include("mostrar.php");
    

?>