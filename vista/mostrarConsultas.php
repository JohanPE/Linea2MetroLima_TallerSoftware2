<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();

$obj = new MetroController(); // Crear una instancia de la clase
$res = $obj->mostrarConsultas(); // Llamar al método en la instancia

//print_r($res); // Imprimir el resultado

?>
<table class="table" style="text-align: center;">
    <tr style="font-size: 20px;">

        <th style="width: 20%; text-align: center;">Id Consulta</th>
        <th style="width: 20%; text-align: center;">Persona</th>
        <th style="width: 20%; text-align: center;">Email</th>
        <th style="width: 20%; text-align: center;">Mensaje</th>
        <th style="width: 20%; text-align: center;">Eliminar</th>

        <!-- Agrega más encabezados de columnas según tus datos -->
    </tr>
    <?php
    foreach ($res as $fila) {
        //$idtarifa = $fila['idtarifa'];
        echo "<script>function eliminarMensaje(idmensaje){
                        data={idmensaje:idmensaje}
                        $.ajax({
                            data: data,
                            type: 'post',
                            url: 'eliminarMensaje.php',
                            success: function(response) {
                                //$('#carrito3').html(response);
                                location.reload(true);
                            }
                        });
                    }
                </script>";
        
            echo "<tr style='font-size: 15px;'>";
            echo "<td style='vertical-align: middle;'>" . $fila['idmensaje'] . "</td>";
            echo "<td style='vertical-align: middle;'>" . $fila['nombre_persona'] . "</td>";
            echo "<td style='vertical-align: middle;'>" . $fila['email_persona'] . "</td>";
            echo "<td style='vertical-align: middle;'>" . $fila['mensaje'] . "</td>";
    
            echo "<td> <div style='display: flex; align-items: center; justify-content: center;'>
            <button style='border-radius:50%; width:40px; height:40px; display: flex;
                    align-items: center; justify-content: center; margin-top:5px; margin-left:10px;'   type='button' class='btn' onclick='eliminarMensaje(" . $fila['idmensaje'] . ")'> 
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