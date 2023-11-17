<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();

$obj = new MetroController(); // Crear una instancia de la clase
$res = $obj->retornarTarifa(); // Llamar al método en la instancia

//print_r($res); // Imprimir el resultado

?>
<table class="table" style="text-align: center;">
    <tr style="font-size: 20px;">

        <th style="width: 50%; text-align: center;">Tarifario</th>
        <th style="width: 50%; text-align: center;">Precio</th>

        <!-- Agrega más encabezados de columnas según tus datos -->
    </tr>
    <?php
    foreach ($res as $fila) {
        echo "<tr style='font-size: 15px;'>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['precio'] . "</td>";
        // Agrega más celdas de datos según tus campos en la tabla 'tarifa'
        echo "</tr>";
    }
    ?>
</table>