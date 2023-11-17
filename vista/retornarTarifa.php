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
        <th style="width: 50%; text-align: center;">Opcion</th>

        <!-- Agrega más encabezados de columnas según tus datos -->
    </tr>
    <?php
    foreach ($res as $fila) {
        echo "<tr style='font-size: 15px;'>";
        echo "<td style='vertical-align: middle;'>" . $fila['nombre'] . "</td>";
        echo "<td style='vertical-align: middle;'>" . $fila['precio'] . "</td>";

        echo "<td> <div style='display: flex; align-items: center; justify-content: center;'>
        <button style='border-radius:50%; width:40px; height:40px; display: flex;
                align-items: center; justify-content: center; margin-top:5px; margin-left:10px;'   type='button' class='btn' onclick='recargar()'> 
                <div><img src='imagenes\cambiar.png' alt='' style='width:25px; height:25px; ' /></div>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </button>
            <button style='border-radius:50%; width:40px; height:40px; display: flex;
                align-items: center; justify-content: center; margin-top:5px; margin-left:10px;'   type='button' class='btn' onclick='recargar()'> 
                <div><img src='imagenes\basura.png' alt='' style='width:25px; height:25px; ' /></div>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
            
            </td>";
        // Agrega más celdas de datos según tus campos en la tabla 'tarifa'
        echo "</tr>";
    }
    ?>
</table>