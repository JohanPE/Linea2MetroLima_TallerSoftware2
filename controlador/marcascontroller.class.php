<?php
require_once("../dao/marcadao.class.php");
require_once("../modelo/marcabe.class.php");

class MarcaController{
    public function __construct() {
        
    }
    public function listarTodos(){
        $data = new Marcadao();
        return $data->listaMarcas();
    }
    public function listarPornombre($nom){
        $data = new Marcadao();
        return $data->listaMarcasxnombre($nom);
    }
    public function obtieneMarca($id){
        $data = new Marcadao();
        return $data->obtieneMarca($id);
    }
    public function actualizaMarca($obj){
        $data = new Marcadao();
        return $data->actualizaMarca($obj);
    }
    public function eliminaMarca($obj){
        $data = new Marcadao();
        return $data->eliminaMarca($obj);
    }
    public function nuevoPasajero($obj){
        $data = new Marcadao();
        return $data->nuevoPasajero($obj);
    }
    public function nuevoUsuario($obj){
        $data = new Marcadao();
        return $data->nuevoUsuario($obj);
    }
    public function validarUsuario($obj){
        $data = new Marcadao();
        return $data->validarUsuario($obj);
    }
    public function retornarSaldo($obj){
        $data = new Marcadao();
        return $data->retornarSaldo($obj);
    }
    public function recargar($obj){
        $data = new Marcadao();
        return $data->recargar($obj);
    }
    public function descontar($obj){
        $data = new Marcadao();
        return $data->descontar($obj);
    }
    public function solicitarQR($obj){
        $data = new Marcadao();
        return $data->solicitarQR($obj);
    }
}
?>