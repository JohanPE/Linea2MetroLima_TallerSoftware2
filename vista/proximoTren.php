<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();

$estacion = $_POST['estacion'];
$obj = new MetroController(); // Crear una instancia de la clase
$res = $obj->proximoTren(); // Llamar al método en la instancia

//print_r($res); // Imprimir el resultado

?>
<dialog id="horarioEstacion">
<table class="table" style="text-align: center;">
    <tr style="font-size: 20px;">
        <th style="width: 30%; text-align: center;">PROXIMO TREN</th>
        <th style="width: 30%; text-align: center;">Hacia Puerto del Callao </th>
        <th style="width: 30%; text-align: center;">Hacia Municipalidad de Ate </th>
        <!-- Agrega más encabezados de columnas según tus datos -->
    </tr>
    <?php
    foreach ($res as $fila) {
        echo "<tr style='font-size: 15px;'>"; 
        echo "<td style='vertical-align: middle;'>De la Estación " . $estacion . "</td>";
        echo "<td style='vertical-align: middle;'>" . $fila['proximoTren'] . "</td>";
        echo "<td style='vertical-align: middle;'>" . $fila['proximoTren'] . "</td>";
        // Agrega más celdas de datos según tus campos en la tabla 'tarifa'
        echo "</tr>";
    }
    ?>
    <tr>
        <td colspan=3>
            <button type="button" class="btn" onclick="cerrarHorarioEstacion()">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            cerrar
            </button>
        </td>
    </tr>
</table>
</dialog>

