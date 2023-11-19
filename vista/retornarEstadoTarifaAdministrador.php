<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();

$obj = new MetroController(); // Crear una instancia de la clase
$res = $obj->retornarEstadoTarifa(); // Llamar al método en la instancia

//print_r($res); // Imprimir el resultado

?>
<table class="table" style="text-align: center;">
    <tr style="font-size: 20px;">

        <th style="width: 50%; text-align: center;">Nombre</th>
        <th style="width: 50%; text-align: center;">Glosa</th>
        <th style="width: 50%; text-align: center;">Opcion</th>

        <!-- Agrega más encabezados de columnas según tus datos -->
    </tr>
    <?php
    foreach ($res as $fila) {

        echo "<script>function eliminarEstadoTarifa(){
            data={idestadotarifa:" . $fila['idestadotarifa'] . "}
            $.ajax({
                data: data,
                type: 'post',
                url: 'eliminarEstadoTarifa.php',
                success: function(response) {
                    //$('#carrito3').html(response);
                    location.reload(true);
                }
            });
        }</script>";

        if($fila['idestadotarifa'] <= 2){
            echo "<tr style='font-size: 15px;'>";
            echo "<td style='vertical-align: middle;'>" . $fila['nombre'] . "</td>";
            echo "<td style='vertical-align: middle;'>" . $fila['glosa'] . "</td>";

            echo "<td> <div style='display: flex; align-items: center; justify-content: center;'>
            <button style='border-radius:50%; width:40px; height:40px; display: flex;
                    align-items: center; justify-content: center; margin-top:5px; margin-left:10px;'   type='button' class='btn' onclick='recargar()'> 
                    <div><img src='imagenes\cambiar.png' alt='' style='width:25px; height:25px; ' /></div>
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
        else if($fila['idestadotarifa'] > 2){
            echo "<tr style='font-size: 15px;'>";
            echo "<td style='vertical-align: middle;'>" . $fila['nombre'] . "</td>";
            echo "<td style='vertical-align: middle;'>" . $fila['glosa'] . "</td>";

            echo "<td> <div style='display: flex; align-items: center; justify-content: center;'>
            <button style='border-radius:50%; width:40px; height:40px; display: flex;
                    align-items: center; justify-content: center; margin-top:5px; margin-left:10px;'   type='button' class='btn' onclick='editarEstadoTarifa()'> 
                    <div><img src='imagenes\cambiar.png' alt='' style='width:25px; height:25px; ' /></div>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button style='border-radius:50%; width:40px; height:40px; display: flex;
                    align-items: center; justify-content: center; margin-top:5px; margin-left:10px;'   type='button' class='btn' onclick='eliminarEstadoTarifa()'> 
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
    }
    ?>
</table>