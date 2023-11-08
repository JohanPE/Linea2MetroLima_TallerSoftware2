<?php
require_once("../dao/bd.class.php");
require_once("../modelo/marcabe.class.php");

class Marcadao{
    public function __construct() {
        
    }
    public function nuevoPasajero($obj) {
        $nombre = $obj->getNombre();
        $apellido = $obj->getApellido();
        $tipoDocumento = $obj->getTipoDocumento();
        $dni = $obj->getDni();
        $fechaNacimiento = $obj->getFechaNacimiento();
        $estudiante = $obj->getEstudiante();
        $email = $obj->getEmail();
        $distrito = $obj->getDistrito();
        $domicilio = $obj->getDomicilio();
        $telefono = $obj->getTelefono();
    
        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();

        /*
        // Insertar el tipo de documento
        $sql1 = "INSERT INTO tipodedocumento (nombre_tipodoc, glosa_tipodoc) VALUES ('$tipoDocumento', '$tipoDocumento')";
        $res1 = $conexion->query($sql1);
    
        // Obtener el ID del tipo de documento recién insertado
        $sqlRetorna = "SELECT MAX(idtipodoc) AS max_id FROM tipodedocumento";
        $resRetorna = $conexion->query($sqlRetorna);
        $row = $resRetorna->fetch_assoc();
        $idTipoDocumento = $row['max_id'];
        */
        // Determinar el ID de la tarifa
        if ($estudiante == "No") {
            $sqlRetorna2 = "SELECT idtarifa FROM tarifa WHERE nombre = 'Tarifa General'";
        } else {
            $sqlRetorna2 = "SELECT idtarifa FROM tarifa WHERE nombre = 'Tarifa Estudiante'";
        }
    
        $resRetorna2 = $conexion->query($sqlRetorna2);
        $row2 = $resRetorna2->fetch_assoc();
        $idTarifa = $row2['idtarifa'];
    
        // Insertar los datos del pasajero
        $sql2 = "INSERT INTO pasajeros (N_identificacion, nombre, apellido, email, distrito, domicilio, telefono, fechanac, estudiante, idtipodoc, id_tarifa) ";
        $sql2 .= "VALUES ('$dni', '$nombre', '$apellido', '$email', '$distrito', '$domicilio', '$telefono', '$fechaNacimiento', '$estudiante', '$idTipoDocumento', '$idTarifa')";
    
        $res2 = $conexion->query($sql2);
    
        return $res2;
    }
    

    public function nuevoUsuario($obj) {
        $usuario = $obj->getUsuario();
        $contrasenia = $obj->getContrasenia();
    
        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();
    
        $sql1 = "select N_identificacion FROM pasajeros WHERE numero_pasajero = (SELECT MAX(numero_pasajero) FROM pasajeros)";
        $res1 = $conexion->query($sql1);
        $fila = $res1->fetch_object();
        $item1 = new Marca();
        $item1->setDni($fila->N_identificacion);
    
        // Escapar las variables para evitar la inyección de SQL
        $usuario = $conexion->real_escape_string($usuario);
        $contrasenia = $conexion->real_escape_string($contrasenia);
        $dni = $conexion->real_escape_string($item1->getDni());
    
        $sql = "insert into usuario (id_usuario, usuario, contrasenia, saldo, dni) ";
        $sql=$sql." values (CONCAT('$usuario', '$contrasenia', '$dni'),'$usuario', '$contrasenia', 0.00,'$dni')";
        $res = $conexion->query($sql);

        //-------------------------------------------------------------------------
        
        
        $sql3="select * FROM usuario WHERE usuario = '$usuario' AND contrasenia = '$contrasenia'";

        $res3 = $conexion->query($sql3);
        
        $filas=mysqli_num_rows($res3);

        if ($filas) {
            echo "OK";
        } else {
            echo "<br><h3>DATOS ERRONEOS!</h3>";
        }

        //return $res;
    }
    
    public function validarUsuario($obj){
        $usuario = $obj->getUsuario();
        $contrasenia = $obj->getContrasenia();

        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();
        $sql="select * FROM usuario WHERE usuario = '$usuario' AND contrasenia = '$contrasenia'";

        $res = $conexion->query($sql);
        
        $filas=mysqli_num_rows($res);

        if ($filas) {
            echo "OK";
        } else {
            echo "<br><h3>DATOS ERRONEOS!</h3>";
        }
        //return $res;
    }
    

    
    public function cantidad(){
        $lista = array();
        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();
        $sql="select count(*) from marca";
        $res = $conexion->query($sql);     
        return $res;
    }

    public function retornarSaldo($obj){
        $usuario = $obj->getUsuario();
        $lista = array();
        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();
        $sql="select saldo from usuario where usuario = '$usuario';";
        $res = $conexion->query($sql);

        if ($res) {
            $row = $res->fetch_assoc();
            $saldo = $row['saldo'];
            echo "$saldo";
        }

        //return $res;
    }

    public function recargar($obj){
        $usuario = $obj->getUsuario();
        $saldo = $obj->getSaldo();
        $lista = array();
        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();
        $sql="UPDATE usuario SET saldo = saldo + $saldo WHERE usuario = '$usuario';";
        $res = $conexion->query($sql);

    }
    public function descontar($obj){
        $idUsuario = $obj->getIdUsuario();
        $lista = array();
        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();
    
        // Obtener el id_tarifa del pasajero asociado al usuario
        $sqlIdTarifa = "SELECT id_tarifa
                       FROM pasajeros
                       WHERE N_identificacion = (SELECT dni FROM usuario WHERE id_usuario = '$idUsuario')";
        $resIdTarifa = $conexion->query($sqlIdTarifa);
        $rowIdTarifa = $resIdTarifa->fetch_assoc();
        $idTarifa = $rowIdTarifa['id_tarifa'];
    
        // Obtener el precio de la tarifa
        $sqlPrecioTarifa = "SELECT precio FROM tarifa WHERE idtarifa = $idTarifa";
        $resPrecioTarifa = $conexion->query($sqlPrecioTarifa);
        $rowPrecioTarifa = $resPrecioTarifa->fetch_assoc();
        $precioTarifa = $rowPrecioTarifa['precio'];

    
        // Insertar el registro en la tabla recorrido
        $sqlRecorrido = "INSERT INTO recorrido (gastos, fecha_viaje, id_usuario, id_tarifa) ";
        $sqlRecorrido .= "VALUES ($precioTarifa, NOW(), '$idUsuario', $idTarifa)";
        $resRecorrido = $conexion->query($sqlRecorrido);

        $sqlDescuento="UPDATE usuario SET saldo = saldo - $precioTarifa WHERE id_usuario = '$idUsuario';";
        $resDescuento = $conexion->query($sqlDescuento);
    
        echo "Realizado";
    }
    public function solicitarQR($obj){
        $usuarioQR = $obj->getUsuario();
        $contraseniaQR = $obj->getContrasenia();
        $lista = array();
        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();
        $sql="SELECT id_usuario
        FROM usuario
        WHERE contrasenia = '$contraseniaQR' AND usuario = '$usuarioQR';";
        $res = $conexion->query($sql);
        $rowIDQR = $res->fetch_assoc();
        $IDQR = $rowIDQR['id_usuario'];
        echo $IDQR;
    }
    public function retornarTarifa(){
        $lista = array();
        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();
        $sql = "select nombre, precio from tarifa";
        $res = $conexion->query($sql);
    
        if ($res) {
            return $res->fetch_all(MYSQLI_ASSOC);
        } else {
            return array(); // Devuelve un array vacío si no hay resultados o hay un error
        }
    }
    //-------------------------------------------------------

    public function nuevoUsuarioTrabajador($usr){

    }
    public function actualizarUsuarioTrabajador($usr){

    }
    public function eliminarUsuarioTrabajador($usr){
        
    }
    public function validarUsuarioTrabajador($obj){
        /*$login=$usr->getUsuario();
        $clave=$usr->getClave();

        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();

        $sql = "select count(1) registros from usuariotrabajador where usuario='$login' and clave=md5('$clave')";

        $res = $conexion->query($sql);
        while ($fila = $res->fetch_object()){
            $cod=$fila->registros;
        }
        return $cod;*/
        $usuario = $obj->getUsuarioTrabajador();
        $contrasenia = $obj->getClave();

        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();
        $sql="select * FROM usuariotrabajador WHERE usuario = '$usuario' AND clave = md5('$contrasenia')";

        $res = $conexion->query($sql);
        
        $filas=mysqli_num_rows($res);

        if ($filas) {
            echo "OK";
        } else {
            echo "<br><h3>DATOS ERRONEOS!</h3>";
        }
    }
    public function getUsuarioTrabajador($nomusuario){

    }
    public function getUsuariosTrabajador(){

    }
}
?>