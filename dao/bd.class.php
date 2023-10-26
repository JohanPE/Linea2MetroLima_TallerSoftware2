<?php
class Bd{
    public function __construct() {
    }
    public function getConnectionMYSQL(){
        $servidor="localhost";
        $usuario="root";
        $clave="";
        $basedatos="bdMetro";
        $cnx=null;
        $cnx=new mysqli($servidor,$usuario,$clave,$basedatos);
        return $cnx;
    }
}
?>