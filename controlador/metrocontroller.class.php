<?php
require_once("../dao/metrodao.class.php");
require_once("../modelo/metrobe.class.php");

class MetroController{
    public function __construct() {
        
    }
    public function listarTodos(){
        $data = new Metrodao();
        return $data->listaMarcas();
    }
    public function listarPornombre($nom){
        $data = new Metrodao();
        return $data->listaMarcasxnombre($nom);
    }
    public function obtieneMarca($id){
        $data = new Metrodao();
        return $data->obtieneMarca($id);
    }
    public function actualizaMarca($obj){
        $data = new Metrodao();
        return $data->actualizaMarca($obj);
    }
    public function eliminaMarca($obj){
        $data = new Metrodao();
        return $data->eliminaMarca($obj);
    }
    public function nuevoPasajero($obj){
        $data = new Metrodao();
        return $data->nuevoPasajero($obj);
    }
    public function nuevoTrabajador($obj){
        $data = new Metrodao();
        return $data->nuevoTrabajador($obj);
    }
    public function nuevoUsuario($obj){
        $data = new Metrodao();
        return $data->nuevoUsuario($obj);
    }
    public function nuevoUsuarioTrabajador($obj){
        $data = new Metrodao();
        return $data->nuevoUsuarioTrabajador($obj);
    }
    public function validarUsuario($obj){
        $data = new Metrodao();
        return $data->validarUsuario($obj);
    }
    public function retornarSaldo($obj){
        $data = new Metrodao();
        return $data->retornarSaldo($obj);
    }
    public function recargar($obj){
        $data = new Metrodao();
        return $data->recargar($obj);
    }
    public function descontar($obj){
        $data = new Metrodao();
        return $data->descontar($obj);
    }
    public function solicitarQR($obj){
        $data = new Metrodao();
        return $data->solicitarQR($obj);
    }
    public function retornarTarifa(){
        $data = new Metrodao();
        return $data->retornarTarifa();
    }
    public function retornarEstadoTarifa(){
        $data = new Metrodao();
        return $data->retornarEstadoTarifa();
    }
    public function nuevaTarifa($obj){
        $data = new Metrodao();
        return $data->nuevaTarifa($obj);
    }
    public function eliminarTarifa($obj){
        $data = new Metrodao();
        return $data->eliminarTarifa($obj);
    }
    public function nuevoEstadoTarifa($obj){
        $data = new Metrodao();
        return $data->nuevoEstadoTarifa($obj);
    }
    public function eliminarEstadoTarifa($obj){
        $data = new Metrodao();
        return $data->eliminarEstadoTarifa($obj);
    }
    //------------------------------------------
    public function validarUsuarioTrabajador($usr){
        $data = new Metrodao();
        return $data->validarUsuarioTrabajador($usr);
    }
    public function eliminarUsuarioTrabajador($usr){
        $data = new Metrodao();
        return $data->eliminarUsuarioTrabajador($usr);
    }
    public function actualizarUsuarioTrabajador($usr){
        $data = new Metrodao();
        return $data->actualizarUsuarioTrabajador($usr);
    }
    /*public function nuevoUsuarioTrabajador($usr){
        $data = new Metrodao();
        return $data->nuevoUsuarioTrabajador($usr);
    }*/
}
?>