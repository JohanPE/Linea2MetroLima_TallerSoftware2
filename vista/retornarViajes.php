<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();

$usuario = $_POST['usuario'];


$obj = new MetroController();
$item = new Metro();

$item->setUsuario($usuario);

$res = $obj->retornarViajes($item); // Llamar al método en la instancia

//print_r($res); // Imprimir el resultado

?>
<table class="table" style="text-align: center;">
    <tr style="font-size: 20px;">

        <th style="width: 50%; text-align: center;">Gasto</th>
        <th style="width: 50%; text-align: center;">Fecha y hora</th>

        <!-- Agrega más encabezados de columnas según tus datos -->
    </tr>
    <?php
    foreach ($res as $fila) {
        echo "<tr style='font-size: 15px;'>";
        echo "<td style='vertical-align: middle;'>" . $fila['gastos'] . "</td>";
        echo "<td style='vertical-align: middle;'>" . $fila['fecha_viaje'] . "</td>";
        // Agrega más celdas de datos según tus campos en la tabla 'tarifa'
        echo "</tr>";
    }
    ?>
</table>