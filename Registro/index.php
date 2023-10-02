<?php include 'codeRegistro.php'; ?>

<?php include("../paginas/head.php") ?>

<div class="container">
    <div class="row">
        <form action="" method="post">
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- cabecera del modal -->
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Registro</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>  
                        <!-- Cuerpo del modal -->
                        <div class="modal-body">
                            <div class="form-row">
                                <!-- Selector de EMPLEADOS -->
                                <div class="form-group col-md-12">
                                    <label for="id">Empleado</label>
                                    <select name="id" id="id" class="form-control">
                                        <?php
                                        if ($listaEmpleados->num_rows > 0) {
                                            foreach ($listaEmpleados as $empleado) {
                                                echo " <option value='' hidden > Seleccione el Empleado</option> ";
                                                echo " <option value='{$empleado['id']}'> {$empleado['id']} {$empleado['nombre']} {$empleado['apellidoP']} {$empleado['apellidoM']} {$empleado['correo']} </option> ";
                                            }
                                        } else {
                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- FIN SELECTOR EMPLEADO -->
                                <!-- INICIO SELECTOR CLIENTE -->
                                <div class="form-group col-md-12">
                                    <label for="id_comprador">Comprador</label>
                                    <select name="id_comprador" id="id_comprador" class="form-control">
                                        <?php
                                        if ($listaComprador->num_rows > 0) {
                                            foreach ($listaComprador as $comprador) {
                                                echo " <option value='' hidden > Seleccione el Comprador</option> ";
                                                echo " <option value='{$comprador['id_cliente']}'> {$comprador['id_comprador']} {$comprador['nombre_comprador']} {$comprador['apellido_comprador']} {$comprador['Tel_comprador']} {$comprador['Direccion_comprador']} {$comprador['Edad_comprador']} </option> ";
                                            }
                                        } else {
                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- FIN SELECTOR CLIENTE -->
                                <div class="form-group col-md-12">
                                    <label for="id_tipo_vehiculo">Tipo de Vehiculo</label>
                                    <select name="id_tipo_vehiculo" id="id_tipo_vehiculo" class="form-control">
                                        <?php
                                        if ($listaTipoVehiculo->num_rows > 0) {
                                            foreach ($listaTipoVehiculo as $TipoVehiculo) {
                                                echo " <option value='' hidden > Seleccione el Tipo de Vehiculo</option> ";
                                                echo " <option value='{$TipoVehiculo['id_tipo_vehiculo']}'> {$TipoVehiculo['TipoVehiculo']} {$TipoVehiculo['Nombre_vehiculo']}  </option> ";
                                            }
                                        } else {
                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="id_vehiculo">Vehiculo</label>
                                    <select name="id_vehiculo" id="id_vehiculo" class="form-control">
                                        <?php
                                        if ($listaVehiculo->num_rows > 0) {
                                            foreach ($listaVehiculo as $vehiculo) {
                                                echo " <option value='' hidden > Seleccione el Vehiculo</option> ";
                                                echo " <option value='{$vehiculo['Placa_vehiculo']}'> {$vehiculo['id_tipo_vehiculo']} {$vehiculo['modelo_vehiculo']} {$vehiculo['marca_vehiculo']} {$vehiculo['serie_vehiculo']} {$vehiculo['clasificacion_vehiculo']} {$vehiculo['cilindraje']} {$vehiculo['Precio']}  </option> ";
                                            }
                                        } else {
                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- FIN SELECTOR CLIENTE -->
                                <div class="form-group col-md-12">
                                    <label for="detalle">Detalle</label>
                                    <input type="text" class="form-control" require name="detalle" id="detalle" placeholder="Detalle de la factura" value="<?php echo $detalle ?>">
                                    <br>
                                </div>
                            </div>
                        </div>
                        <!-- Pie/Footer del modal -->
                        <div class="modal-footer btn-group">
                            <div class="btn-group col-md-12">
                                <button value="btnAgregar" class="btn btn-success col-md-6 " type="submit" name="accion">Agregar</button>
                                <button value="btnCancelar" class="btn btn-primary col-md-6 " type="submit" name="accion">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Boton del modal -->
            <button type="button" class="btn btn-primary col-md-12" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar Factura
            </button>
        </form>
        <!-- Final del Formulario -->
        <div class="row">
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Numero de Factura</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Empleado</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Placa Vehiculo</th>
                        <th scope="col">Ganancia</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    /* Prefunto que si la variable listaClientes tiene algun contenido */
                    if ($listaRegistro->num_rows > 0) {
                        foreach ($listaRegistro as $registro) {
                    ?>
                            <tr>
                                <td> <?php echo $registro['id_registro']  ?> </td>
                                <td> <?php echo $registro['fecha']       ?> </td>
                                <td> <?php echo $registro['precio_registro'] ?> </td>
                                <td> <?php echo $registro['id_comprador']  ?> </td>
                                <td> <?php echo $registro['Placa_vehiculo']     ?> </td>
                                <td> <?php echo $registro['id_empleado']     ?> </td>
                                <td> <?php echo $registro['Ganancia']     ?> </td>
                                <!-- Este Formulario se utiliza para editar los registros -->
                                <form action="" method="post">
                                    <input type="hidden" name="id_registro" value="<?php echo $registro['id_registro'];  ?>">
                                    <input type="hidden" name="fecha" value="<?php echo $registroa['fecha'];  ?>">
                                    <input type="hidden" name="precio_registro" value="<?php echo $registro['precio_registro'];  ?>">
                                    <input type="hidden" name="id_comprador" value="<?php echo $registro['id_comprador'];  ?>">
                                    <input type="hidden" name="Placa_vehiculo" value="<?php echo $registro['Placa_vehiculo'];  ?>">
                                    <input type="hidden" name="id_empleado" value="<?php echo $registro['id_empleado'];  ?>">
                                    <input type="hidden" name="Ganancia" value="<?php echo $registro['Ganancia'];  ?>">
                                    <td><button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button></td>
                                </form>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<h2> No tenemos resultados </h2>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("../paginas/footer.php") ?>
