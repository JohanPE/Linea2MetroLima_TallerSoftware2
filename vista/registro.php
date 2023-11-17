<?php

require_once("../modelo/metrobe.class.php");
    require_once("../controlador/metrocontroller.class.php");
    session_start();
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipoDocumento = $_POST['tipoDocumento'];
    $dni = $_POST['dni'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $estudiante = $_POST['estudiante'];
    $email = $_POST['email'];
    $distrito = $_POST['distrito'];
    $domicilio = $_POST['domicilio'];
    $telefono = $_POST['telefono'];

    $obj = new MetroController();
    $item = new Metro();

    $item->setTipoDocumento($tipoDocumento);
    $item->setNombre($nombre);
    $item->setApellido($apellido);
    $item->setDni($dni);
    $item->setFechaNacimiento($fechaNacimiento);
    $item->setEstudiante($estudiante);
    $item->setEmail($email);
    $item->setDistrito($distrito);
    $item->setDomicilio($domicilio);
    $item->setTelefono($telefono);

    $res = $obj->nuevoPasajero($item);
    //print_r($res);
    print_r("<br><h3>Los datos han sido agregados exitosamente!</h3><br>");
    //$lista = $obj->listarPornombre("SS");
    //print_r($lista);
    //include("mostrar.php");
?>