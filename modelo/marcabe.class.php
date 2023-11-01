<?php
class Marca{
    private $tipoDocumento;
    private $fechaNacimiento;
    private $estudiante;
    private $dni;
    private $nombre;
    private $apellido;
    private $email;
    private $distrito;
    private $domicilio;
    private $telefono;
    private $usuario;
    private $contrasenia;
    private $saldo;
    private $idUsuario;

    private $idTrabajador;
    private $usuarioTrabajador;
    private $clave;
    private $idRol;

    public function __construct() {
        
    }
    
    public function getDni(){
        return $this->dni;
    }    
    public function getNombre(){
        return $this->nombre;
    }    
    public function getApellido(){
        return $this->apellido;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getDistrito(){
        return $this->distrito;
    }
    public function getDomicilio(){
        return $this->domicilio;
    }    
    public function getTelefono(){
        return $this->telefono;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function getContrasenia(){
        return $this->contrasenia;
    }
    public function getTipoDocumento(){
        return $this->tipoDocumento;
    }
    public function getFechaNacimiento(){
        return $this->fechaNacimiento;
    }
    public function getEstudiante(){
        return $this->estudiante;
    }
    public function getSaldo(){
        return $this->saldo;
    }
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function getIdTrabajador(){
        return $this->idTrabajador;
    }
    public function getUsuarioTrabajador(){
        return $this->usuarioTrabajador;
    }
    public function getClave(){
        return $this->clave;
    }
    public function getIdRol(){
        return $this->idRol;
    }

    //----------------------------
    
    public function setDni($dni){
        $this->dni=$dni;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function setDistrito($distrito){
        $this->distrito=$distrito;
    }
    public function setDomicilio($domicilio){
        $this->domicilio=$domicilio;
    }
    public function setTelefono($telefono){
        $this->telefono=$telefono;
    }
    public function setUsuario($usuario){
        $this->usuario=$usuario;
    }
    public function setContrasenia($contrasenia){
        $this->contrasenia=$contrasenia;
    }
    public function setTipoDocumento($tipoDocumento){
        $this->tipoDocumento=$tipoDocumento;
    }
    public function setFechaNacimiento($fechaNacimiento){
        $this->fechaNacimiento=$fechaNacimiento;
    }
    public function setEstudiante($estudiante){
        $this->estudiante=$estudiante;
    }
    public function setSaldo($saldo){
        $this->saldo=$saldo;
    }
    public function setIdUsuario($idUsuario){
        $this->idUsuario=$idUsuario;
    }
    public function setIdTrabajador($idTrabajador){
        $this->idTrabajador=$idTrabajador;
    }
    public function setUsuarioTrabajador($usuarioTrabajador){
        $this->usuarioTrabajador=$usuarioTrabajador;
    }
    public function setClave($clave){
        $this->clave=$clave;
    }
    public function setIdRol($idRol){
        $this->idRol=$idRol;
    }

}
?>