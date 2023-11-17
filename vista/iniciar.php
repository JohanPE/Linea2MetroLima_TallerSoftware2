<?php
require_once("../modelo/metrobe.class.php");
    require_once("../controlador/metrocontroller.class.php");
    session_start();

    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];

    $obj = new MetroController();
    $item = new Metro();

    $item->setUsuario($usuario);
    $item->setContrasenia($contrasenia);

    $res = $obj->validarUsuario($item);
    //print_r($res);
    //print_r("<br><h3>Los datos son correctos!</h3><br>");
    //$lista = $obj->listarPornombre("SS");
    //print_r($lista);
    //include("mostrar.php");
    
?>