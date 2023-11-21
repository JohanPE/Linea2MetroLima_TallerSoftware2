<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();

$obj = new MetroController(); // Crear una instancia de la clase
$res = $obj->retornarPasajeros(); // Llamar al método en la instancia

//print_r($res); // Imprimir el resultado

?>
<table class="table" style="text-align: center;">
    <tr style="font-size: 20px;">

        <th style="width: 50%; text-align: center;">usuario</th>
        <th style="width: 50%; text-align: center;">saldo</th>
        <th style="width: 50%; text-align: center;">dni</th>

        <!-- Agrega más encabezados de columnas según tus datos -->
    </tr>
    <?php
    foreach ($res as $fila) {
        echo "<tr style='font-size: 15px;'>";
        echo "<td style='vertical-align: middle;'>" . $fila['usuario'] . "</td>";
        echo "<td style='vertical-align: middle;'>" . $fila['saldo'] . "</td>";
        echo "<td style='vertical-align: middle;'>" . $fila['dni'] . "</td>";
        // Agrega más celdas de datos según tus campos en la tabla 'tarifa'
        echo "</tr>";
    }
    ?>
</table>