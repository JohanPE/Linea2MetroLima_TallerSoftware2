<?php
require_once("../dao/bd.class.php");
require_once("../modelo/metrobe.class.php");

class Metrodao{
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
        $sql2 = "INSERT INTO pasajeros (idtipodoc, N_identificacion, nombre, apellido, email, id_distrito, domicilio, telefono, fechanac, estudiante, id_tarifa) ";
        $sql2 = $sql2. "VALUES ('$tipoDocumento', '$dni', '$nombre', '$apellido', '$email', '$distrito', '$domicilio', '$telefono', '$fechaNacimiento', '$estudiante', '$idTarifa')";
    
        $res2 = $conexion->query($sql2);
    
        return $res2;
    }
    
    public function nuevoTrabajador($obj) {
        $nombre = $obj->getNombre();
        $apellido = $obj->getApellido();
        $tipoDocumento = $obj->getTipoDocumento();
        $dni = $obj->getDni();
        $fechaNacimiento = $obj->getFechaNacimiento();
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

        // Insertar los datos del pasajero
        $sql2 = "INSERT INTO trabajador (idtipodoc, N_identificacion, nombre, apellido, email, id_distrito, domicilio, telefono, fechanac) ";
        $sql2 = $sql2. "VALUES ('$tipoDocumento', '$dni', '$nombre', '$apellido', '$email', '$distrito', '$domicilio', '$telefono', '$fechaNacimiento')";
    
        $res2 = $conexion->query($sql2);
    
        return $res2;
    }
    
    public function nuevaTarifa($obj) {
        $nombreTarifa = $obj->getNombreTarifa();
        $precioTarifa = $obj->getPrecioTarifa();
        $idEstadoTarifa = $obj->getIdEstadoTarifa();

        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();

        /*
        // Insertar el tipo de documento
        $sql1 = "INSERT INTO tipodedocumento (nombre_tipodoc, glosa_tipodoc) VALUES ('$tipoDocumento', '$tipoDocumento')";
        $res1 = $conexion->query($sql1);
    
        // Obtener el ID del tipo de documento recién insertado
        */
        $sqlRetorna = "SELECT MAX(idtarifa) AS max_id FROM tarifa";
        $resRetorna = $conexion->query($sqlRetorna);
        $row = $resRetorna->fetch_assoc();
        $idtarifa = $row['max_id'];
        
        // Determinar el ID de la tarifa

        // Insertar los datos del pasajero
        $sql2 = "INSERT INTO tarifa (idtarifa, nombre, precio, idestadotarifa) ";
        $sql2 = $sql2. "VALUES ($idtarifa + 1, '$nombreTarifa', '$precioTarifa', $idEstadoTarifa)";
    
        $res2 = $conexion->query($sql2);
    
        return $res2;
    }

    public function nuevoEstadoTarifa($obj) {
        $nombreEstadoTarifa = $obj->getNombreEstadoTarifa();
        $glosaEstadoTarifa = $obj->getGlosaEstadoTarifa();

        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();

        /*
        // Insertar el tipo de documento
        $sql1 = "INSERT INTO tipodedocumento (nombre_tipodoc, glosa_tipodoc) VALUES ('$tipoDocumento', '$tipoDocumento')";
        $res1 = $conexion->query($sql1);
    
        // Obtener el ID del tipo de documento recién insertado
        */
        $sqlRetorna = "SELECT MAX(idestadotarifa) AS max_id FROM estadotarifa";
        $resRetorna = $conexion->query($sqlRetorna);
        $row = $resRetorna->fetch_assoc();
        $idestadotarifa = $row['max_id'];
        
        // Determinar el ID de la tarifa

        // Insertar los datos del pasajero
        $sql2 = "INSERT INTO estadotarifa (idestadotarifa, nombre, glosa) ";
        $sql2 = $sql2. "VALUES ($idestadotarifa + 1, '$nombreEstadoTarifa', '$glosaEstadoTarifa')";
    
        $res2 = $conexion->query($sql2);
    
        return $res2;
    }


    public function actualizarEstadoTarifa($obj){
        $idEstadoTarifa = $obj -> getIdEstadoTarifa();
        $nombreEstadoTarifa = $obj->getNombreEstadoTarifa();
        $glosaEstadoTarifa = $obj->getGlosaEstadoTarifa();

        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();

        /*
        // Insertar el tipo de documento
        $sql1 = "INSERT INTO tipodedocumento (nombre_tipodoc, glosa_tipodoc) VALUES ('$tipoDocumento', '$tipoDocumento')";
        $res1 = $conexion->query($sql1);
    
        // Obtener el ID del tipo de documento recién insertado
        */
        /*$sqlRetorna = "SELECT MAX(idestadotarifa) AS max_id FROM estadotarifa";
        $resRetorna = $conexion->query($sqlRetorna);
        $row = $resRetorna->fetch_assoc();
        $idestadotarifa = $row['max_id'];*/
        
        // Determinar el ID de la tarifa

        // Insertar los datos del pasajero
        $sql2 = "UPDATE estadotarifa
        SET nombre = '$nombreEstadoTarifa', glosa = '$glosaEstadoTarifa'
        WHERE idestadotarifa = $idEstadoTarifa;
         ";
    
        $res2 = $conexion->query($sql2);
    
        return $res2;
    }

    public function actualizarTarifa($obj){
        $idTarifa = $obj -> getIdTarifa();
        $nombreTarifa = $obj->getNombreTarifa();
        $precioTarifa = $obj->getPrecioTarifa();
        $idEstadoTarifa = $obj->getIdEstadoTarifa();

        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();

        /*
        // Insertar el tipo de documento
        $sql1 = "INSERT INTO tipodedocumento (nombre_tipodoc, glosa_tipodoc) VALUES ('$tipoDocumento', '$tipoDocumento')";
        $res1 = $conexion->query($sql1);
    
        // Obtener el ID del tipo de documento recién insertado
        */
        /*$sqlRetorna = "SELECT MAX(idestadotarifa) AS max_id FROM estadotarifa";
        $resRetorna = $conexion->query($sqlRetorna);
        $row = $resRetorna->fetch_assoc();
        $idestadotarifa = $row['max_id'];*/
        
        // Determinar el ID de la tarifa

        // Insertar los datos del pasajero
        $sql2 = "UPDATE tarifa
        SET nombre = '$nombreTarifa', precio = '$precioTarifa', idestadotarifa = $idEstadoTarifa
        WHERE idtarifa = $idTarifa;
         ";
    
        $res2 = $conexion->query($sql2);
    
        return $res2;
    }

    public function nuevoUsuario($obj) {
        $usuario = $obj->getUsuario();
        $contrasenia = $obj->getContrasenia();
        $dni = $obj->getDni();

        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();
    
        /*$sql1 = "select N_identificacion FROM pasajeros WHERE numero_pasajero = (SELECT MAX(numero_pasajero) FROM pasajeros)";
        $res1 = $conexion->query($sql1);
        $fila = $res1->fetch_object();
        $item1 = new Marca();
        $item1->setDni($fila->N_identificacion);
    
        // Escapar las variables para evitar la inyección de SQL
        $usuario = $conexion->real_escape_string($usuario);
        $contrasenia = $conexion->real_escape_string($contrasenia);
        $dni = $conexion->real_escape_string($item1->getDni());*/
    
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
    
    public function nuevoUsuarioTrabajador($obj) {
        $usuariotrabajador = $obj->getUsuarioTrabajador();
        $clave = $obj->getClave();
        $idRol = $obj->getIdRol();
        $dni = $obj->getDni();
    
        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();
    
        /*$sql1 = "select N_identificacion FROM pasajeros WHERE numero_pasajero = (SELECT MAX(numero_pasajero) FROM pasajeros)";
        $res1 = $conexion->query($sql1);
        $fila = $res1->fetch_object();
        $item1 = new Marca();
        $item1->setDni($fila->N_identificacion);
    
        // Escapar las variables para evitar la inyección de SQL
        $usuario = $conexion->real_escape_string($usuario);
        $contrasenia = $conexion->real_escape_string($contrasenia);
        $dni = $conexion->real_escape_string($item1->getDni());*/

        $sqlRetorna = "select idtrabajador from trabajador where N_identificacion = $dni;";
        $resRetorna = $conexion->query($sqlRetorna);
        $row = $resRetorna->fetch_assoc();
        $idtrabajador = $row['idtrabajador'];
    
        $sql = "insert into usuariotrabajador (idtrabajador, usuario, clave, idrol) ";
        $sql=$sql." values ($idtrabajador,'$usuariotrabajador', '$clave',$idRol)";
        $res = $conexion->query($sql);

        //-------------------------------------------------------------------------
        
        
        $sql3="select * FROM usuariotrabajador WHERE usuario = '$usuariotrabajador' AND clave = '$clave'";

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

    public function validarUsuarioTrabajador($obj){
        $usuariotrabajador = $obj->getUsuarioTrabajador();
        $clave = $obj->getClave();

        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();
        //$sql="select idrol FROM usuariotrabajador WHERE usuario = '$usuariotrabajador' AND clave = '$clave'";

        //$res = $conexion->query($sql);
        
        /*$filas=mysqli_num_rows($res);

        if ($filas) {
            echo "OK";
        } else {
            echo "<br><h3>DATOS ERRONEOS!</h3>";
        }*/


        $sqlRetorna = "select idrol FROM usuariotrabajador WHERE usuario = '$usuariotrabajador' AND clave = '$clave'";
        $resRetorna = $conexion->query($sqlRetorna);
        $row = $resRetorna->fetch_assoc();
        $idrol = $row['idrol'];

        if($idrol == 1){
            echo "1";
            //echo "window.location.href = 'paginaAdministrador.html?Usuario=' + $usuariotrabajador;";
        }else if($idrol == 2){
            echo "2";
            //echo "<script>window.location.href = 'paginaTrabajador.html?Usuario=' + $usuariotrabajador;</script>";
        }

        
        //return $idrol;
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
        $sql = "select * from tarifa";
        $res = $conexion->query($sql);
    
        if ($res) {
            return $res->fetch_all(MYSQLI_ASSOC);
        } else {
            return array(); // Devuelve un array vacío si no hay resultados o hay un error
        }
    }

    public function eliminarTarifa($obj){
        $idtarifa= $obj->getIdTarifa();
        $lista = array();
        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();

        /*$sqlidusuario = "select idusuario from usuario where nombreusuario = '$usuario'";
        $residresultado = $conexion->query($sqlidresultado);
        $row = $residresultado->fetch_assoc();
        $idusuario = $row['idusuario'];*/

        $sql = "delete from tarifa where idtarifa = $idtarifa;";
        $res = $conexion->query($sql);
        /*if ($res) {
            return $res->fetch_all(MYSQLI_ASSOC);
        } else {
            return array(); // Devuelve un array vacío si no hay resultados o hay un error
        }*/
        return $res;
    }

    public function retornarEstadoTarifa(){
        $lista = array();
        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();
        $sql = "select * from estadotarifa";
        $res = $conexion->query($sql);
    
        if ($res) {
            return $res->fetch_all(MYSQLI_ASSOC);
        } else {
            return array(); // Devuelve un array vacío si no hay resultados o hay un error
        }
    }

    public function eliminarEstadoTarifa($obj){
        $idestadotarifa= $obj->getIdEstadoTarifa();
        $lista = array();
        $base = new Bd();
        $conexion = $base->getConnectionMYSQL();

        /*$sqlidusuario = "select idusuario from usuario where nombreusuario = '$usuario'";
        $residresultado = $conexion->query($sqlidresultado);
        $row = $residresultado->fetch_assoc();
        $idusuario = $row['idusuario'];*/

        $sql = "delete from estadotarifa where idestadotarifa = $idestadotarifa;";
        $res = $conexion->query($sql);
        /*if ($res) {
            return $res->fetch_all(MYSQLI_ASSOC);
        } else {
            return array(); // Devuelve un array vacío si no hay resultados o hay un error
        }*/
        return $res;
    }
    //-------------------------------------------------------

    /*public function nuevoUsuarioTrabajador($usr){

    }*/
    public function actualizarUsuarioTrabajador($usr){

    }
    public function eliminarUsuarioTrabajador($usr){
        
    }
    
    public function getUsuarioTrabajador($nomusuario){

    }
    public function getUsuariosTrabajador(){

    }
}
?>