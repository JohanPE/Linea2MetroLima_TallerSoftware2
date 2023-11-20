<?php
require_once("../modelo/metrobe.class.php");
require_once("../controlador/metrocontroller.class.php");
session_start();

$obj = new MetroController(); // Crear una instancia de la clase
$res = $obj->retornarTarifa(); // Llamar al método en la instancia

//print_r($res); // Imprimir el resultado
echo "<dialog id='ventanaEditarTarifa' >
        <p></p>
        <table class='table' style='text-align: center;'>
            <th colspan='3' style='text-align: center;'>Actualizar Tarifa</th>
            <tr>
                <td>Nuevo nombre de tarifa</td>
                <td></td>
                <td><input type='text' name='' id='nombreTarifa'></td>
            </tr>
            <tr>
                <td>Nuevo precio tarifa</td>
                <td></td>
                <td><input type='text' name='' id='precioTarifa'></td>
            </tr>
            <tr>
                <td>Nuevo Id de estado</td>
                <td></td>
                <td><input type='number' name='' id='idEstadoTarifa'></td>
            </tr>
            <tr>
                <td>
                <button type='button' class='btn' id='actualizarTarifa'>Actualizar
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

        <th style="width: 30%; text-align: center;">Tarifario</th>
        <th style="width: 30%; text-align: center;">Precio</th>
        <th style="width: 30%; text-align: center;">ID estado</th>
        <th style="width: 30%; text-align: center;">Opcion</th>

        <!-- Agrega más encabezados de columnas según tus datos -->
    </tr>
    <?php
    foreach ($res as $fila) {
        //$idtarifa = $fila['idtarifa'];
        echo "<script>function eliminarTarifa(idtarifa){
                        data={idtarifa:idtarifa}
                        $.ajax({
                            data: data,
                            type: 'post',
                            url: 'eliminarTarifa.php',
                            success: function(response) {
                                //$('#carrito3').html(response);
                                location.reload(true);
                            }
                        });
                    }
                    function editarTarifa(idtarifa){
                        //document.getElementById('ventanaEditarTarifa').showModal();
                        //alert(idtarifa);
                        dialogo = document.getElementById('ventanaEditarTarifa');

                        dialogo.querySelector('#nombreTarifa').value = '';
                        dialogo.querySelector('#precioTarifa').value = '';

                        // Mostrar el diálogo
                        dialogo.showModal();

                        // Configurar el contenido del diálogo con el valor de i
                        dialogo.querySelector('p').innerText = 'Id de la tarifa: ' + idtarifa;

                        var actualizarTarifaButton = dialogo.querySelector('#actualizarTarifa');
                        actualizarTarifaButton.replaceWith(actualizarTarifaButton.cloneNode(true));

                        // Configurar el evento de clic para el botón de guardar
                        dialogo.querySelector('#actualizarTarifa').addEventListener('click', function() {
                            // Obtener los valores de los inputs
                            var nombreTarifa = dialogo.querySelector('#nombreTarifa').value;
                            var precioTarifa = dialogo.querySelector('#precioTarifa').value;
                            var idEstadoTarifa = dialogo.querySelector('#idEstadoTarifa').value;

                            data={idtarifa:idtarifa, nombreTarifa: nombreTarifa, precioTarifa: precioTarifa, idEstadoTarifa: idEstadoTarifa}
                            $.ajax({
                                data: data,
                                type: 'post',
                                url: 'actualizarTarifa.php',
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
                        document.getElementById('ventanaEditarTarifa').close();
                    }
                </script>";
        if($fila['idtarifa'] <= 2){
            echo "<tr style='font-size: 15px;'>";
            echo "<td style='vertical-align: middle;'>" . $fila['nombre'] . "</td>";
            echo "<td style='vertical-align: middle;'>" . $fila['precio'] . "</td>";
            echo "<td style='vertical-align: middle;'>" . $fila['idestadotarifa'] . "</td>";
    
            echo "<td> <div style='display: flex; align-items: center; justify-content: center;'>
            <button style='border-radius:50%; width:40px; height:40px; display: flex;
                    align-items: center; justify-content: center; margin-top:5px; margin-left:10px;'   type='button' class='btn' onclick='editarTarifa(" . $fila['idtarifa'] . ")'> 
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
        else if($fila['idtarifa'] > 2){
            echo "<tr style='font-size: 15px;'>";
            echo "<td style='vertical-align: middle;'>" . $fila['nombre'] . "</td>";
            echo "<td style='vertical-align: middle;'>" . $fila['precio'] . "</td>";
            echo "<td style='vertical-align: middle;'>" . $fila['idestadotarifa'] . "</td>";

            echo "<td> <div style='display: flex; align-items: center; justify-content: center;'>
            <button style='border-radius:50%; width:40px; height:40px; display: flex;
                    align-items: center; justify-content: center; margin-top:5px; margin-left:10px;'   type='button' class='btn' onclick='editarTarifa(" . $fila['idtarifa'] . ")'> 
                    <div><img src='imagenes\cambiar.png' alt='' style='width:25px; height:25px; ' /></div>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button style='border-radius:50%; width:40px; height:40px; display: flex;
                    align-items: center; justify-content: center; margin-top:5px; margin-left:10px;'   type='button' class='btn' onclick='eliminarTarifa(" . $fila['idtarifa'] . ")'> 
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