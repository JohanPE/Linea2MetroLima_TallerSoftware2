<?php
require_once("../modelo/marcabe.class.php");
    require_once("../controlador/marcascontroller.class.php");
    session_start();

    $usuarioSaldo = $_POST['usuarioSaldo'];
    
    $obj = new MarcaController();
    $item = new Marca();

    $item->setUsuario($usuarioSaldo);

    $res = $obj->retornarSaldo($item);
    //print_r($res);
    //print_r("<br><h3>Los datos son correctos!</h3><br>");
    //$lista = $obj->listarPornombre("SS");
    //print_r($lista);
    //include("mostrar.php");
?>