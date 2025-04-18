<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();

$obj = new MetroController(); // Crear una instancia de la clase
$res = $obj->retornarEstadoTarifa(); // Llamar al método en la instancia

//print_r($res); // Imprimir el resultado
echo "<dialog id='ventanaEditarEstado' >
        <p></p>
        <table class='table' style='text-align: center;'>
            <th colspan='3' style='text-align: center;'>Actualizar Estado Tarifa</th>
            <tr>
                <td>Nuevo nombre de estado tarifa</td>
                <td></td>
                <td><input type='text' name='' id='nombreEstadoTarifa'></td>
            </tr>
            <tr>
                <td>Nueva glosa de estado tarifa</td>
                <td></td>
                <td><input type='text' name='' id='glosaEstadoTarifa'></td>
            </tr>
            <tr>
                <td>
                <button type='button' class='btn' id='actualizarEstado'>Actualizar
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                </td>
                <td></td>
                <td>
                <button type='button' class='btn' onclick='cerrar()'>Cerrar
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                </td>
            </tr>
        </table>
    </dialog>";
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

        echo "<script>function eliminarEstadoTarifa(idestadotarifa){
                        data={idestadotarifa:idestadotarifa}
                        $.ajax({
                            data: data,
                            type: 'post',
                            url: 'eliminarEstadoTarifa.php',
                            success: function(response) {
                                //$('#carrito3').html(response);
                                location.reload(true);
                            }
                        });
                    }
                    function editarEstadoTarifa(idestadotarifa){
                        //document.getElementById('ventanaEditarEstado').showModal();
                        //alert(idestadotarifa);
                        dialogo = document.getElementById('ventanaEditarEstado');

                        dialogo.querySelector('#nombreEstadoTarifa').value = '';
                        dialogo.querySelector('#glosaEstadoTarifa').value = '';

                        // Mostrar el diálogo
                        dialogo.showModal();

                        // Configurar el contenido del diálogo con el valor de i
                        dialogo.querySelector('p').innerText = 'Valor de idestadotarifa: ' + idestadotarifa;

                        var actualizarEstadoButton = dialogo.querySelector('#actualizarEstado');
                        actualizarEstadoButton.replaceWith(actualizarEstadoButton.cloneNode(true));

                        // Configurar el evento de clic para el botón de guardar
                        dialogo.querySelector('#actualizarEstado').addEventListener('click', function() {
                            // Obtener los valores de los inputs
                            var nombreEstadoTarifa = dialogo.querySelector('#nombreEstadoTarifa').value;
                            var glosaEstadoTarifa = dialogo.querySelector('#glosaEstadoTarifa').value;

                            data={idestadotarifa:idestadotarifa, nombreEstadoTarifa: nombreEstadoTarifa, glosaEstadoTarifa: glosaEstadoTarifa}
                            $.ajax({
                                data: data,
                                type: 'post',
                                url: 'actualizarEstadoTarifa.php',
                                success: function(response) {
                                    //$('#resultadoError').html(response);
                                    location.reload(true);
                                }
                            });


                            // Mostrar una alerta con los valores
                            
                            cerrar();
                        });
                    }
                    function cerrar(){
                        document.getElementById('ventanaEditarEstado').close();
                    }
        </script>";
        if($fila['idestadotarifa'] <= 2){
            echo "<tr style='font-size: 15px;'>";
            echo "<td style='vertical-align: middle;'>" . $fila['nombre'] . "</td>";
            echo "<td style='vertical-align: middle;'>" . $fila['glosa'] . "</td>";

            echo "<td> <div style='display: flex; align-items: center; justify-content: center;'>
            <button style='border-radius:50%; width:40px; height:40px; display: flex;
                    align-items: center; justify-content: center; margin-top:5px; margin-left:10px;'   type='button' class='btn' onclick='editarEstadoTarifa(" . $fila['idestadotarifa'] . ")'> 
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
                    align-items: center; justify-content: center; margin-top:5px; margin-left:10px;'   type='button' class='btn' onclick='editarEstadoTarifa(" . $fila['idestadotarifa'] . ")'> 
                    <div><img src='imagenes\cambiar.png' alt='' style='width:25px; height:25px; ' /></div>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button style='border-radius:50%; width:40px; height:40px; display: flex;
                    align-items: center; justify-content: center; margin-top:5px; margin-left:10px;'   type='button' class='btn' onclick='eliminarEstadoTarifa(" . $fila['idestadotarifa'] . ")'> 
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