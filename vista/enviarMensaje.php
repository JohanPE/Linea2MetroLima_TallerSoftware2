<?php

require_once("../modelo/metrobe.class.php");
    require_once("../controlador/metrocontroller.class.php");
    session_start();
    $nombreConsulta = $_POST['nombreConsulta'];
    $emailConsulta = $_POST['emailConsulta'];
    $mensajeConsulta = $_POST['mensajeConsulta'];

    $obj = new MetroController();
    $item = new Metro();

    $item->setNombreConsulta($nombreConsulta);
    $item->setEmailConsulta($emailConsulta);
    $item->setMensajeConsulta($mensajeConsulta);


    $res = $obj->enviarMensaje($item);
    //print_r($res);
    print_r("<br><h3>Su consulta ha sido enviada exitosamente!</h3><br>");
    //$lista = $obj->listarPornombre("SS");
    //print_r($lista);
    //include("mostrar.php");
?>