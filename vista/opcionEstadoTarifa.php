<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();

$obj = new MetroController(); // Crear una instancia de la clase
$res = $obj->retornarEstadoTarifa(); // Llamar al método en la instancia

//print_r($res); // Imprimir el resultado
echo "<select id='estado' name='documento'>";
    echo "<option value=''></option>";
    foreach ($res as $fila) {

        echo "<option value='".$fila['idestadotarifa']."'>" . $fila['nombre'] . "</option>";
        // Agrega más celdas de datos según tus campos en la tabla 'tarifa'
        
        
    }
echo "</select>";

?>
