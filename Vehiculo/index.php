<?php include 'codeVehiculo.php'; ?>
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos del Vehiculo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Cuerpo del modal -->
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="txtPlaca_vehiculo">Placa</label>
                                    <input type="text" class="form-control" required name="Placa_vehiculo"
                                        id="Placa_vehiculo" placeholder="" value="<?php echo $Placa_vehiculo ?>">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="txtId_tipo_vehiculo">Identificacion del Vehiculo</label>
                                    <input type="text" class="form-control" required name="id_tipo_vehiculo"
                                        id="id_tipo_vehiculo" placeholder="" value="<?php echo $id_tipo_vehiculo ?>">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="txtModelo_vehiculo">Modelo</label>
                                    <input type="text" class="form-control" required name="modelo_vehiculo"
                                        id="modelo_vehiculo" placeholder="" value="<?php echo $modelo_vehiculo ?>">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="txtMarca_vehiculo">Marca</label>
                                    <input type="text" class="form-control" required name="marca_vehiculo"
                                        id="marca_vehiculo" placeholder="" value="<?php echo $marca_vehiculo ?>">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="txtSerie_vehiculo">Serie</label>
                                    <input type="text" class="form-control" required name="serie_vehiculo"
                                        id="serie_vehiculo" placeholder="" value="<?php echo $serie_vehiculo ?>">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="txtClasificacion_vehiculo">Clasificacion</label>
                                    <input type="text" class="form-control" required name="clasificacion_vehiculo"
                                        id="clasificacion_vehiculo" placeholder=""
                                        value="<?php echo $clasificacion_vehiculo ?>">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="txtCilindraje">Cilindraje</label>
                                    <input type="text" class="form-control" required name="cilindraje" id="cilindraje"
                                        placeholder="" value="<?php echo $cilindraje ?>">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="txtPrecio">Precio</label>
                                    <input type="text" class="form-control" required name="Precio" id="Precio"
                                        placeholder="" value="<?php echo $Precio ?>">
                                    <br>
                                </div>
                            </div>
                        </div>
                        <!-- Pie/Footer del modal -->
                        <div class="modal-footer">
                            <button value="btnAgregar" class="btn btn-success" type="submit" name="accion">Agregar</button>
                            <button value="btnModificar" class="btn btn-warning" type="submit" name="accion">Modificar
                            </button>
                            <button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar
                            </button>
                            <button value="btnCancelar" class="btn btn-primary" type="submit" name="accion">Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar
                Vehiculo</button>
        </form>
        <!-- Final del Formulario -->
        <div class="row">
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Placa</th>
                        <th scope="col">Identificacion del Vehiculo</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Serie</th>
                        <th scope="col">Clasificacion</th>
                        <th scope="col">Cilindraje</th>
                        <th scope="col">Precio</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaEmpleados tiene algun contenido */
                    if ($listaVehiculo->num_rows > 0) {

                        foreach ($listaVehiculo as $vehiculo) {

                    ?>

                            <tr>

                                

                                <td> <?php echo $vehiculo['Placa_vehiculo']        ?> </td>
                                <td> <?php echo $vehiculo['id_tipo_vehiculo']    ?> </td>
                                <td> <?php echo $vehiculo['modelo_vehiculo'] ?> </td>
                                <td> <?php echo $vehiculo['marca_vehiculo']    ?> </td>
                                <td> <?php echo $vehiculo['serie_vehiculo']    ?> </td>
                                <td> <?php echo $vehiculo['clasificacion_vehiculo']    ?> </td>
                                <td> <?php echo $vehiculo['cilindraje']    ?> </td>
                                <td> <?php echo $vehiculo['Precio']    ?> </td>



                                <form action="" method="post">

                                    <input type="hidden" name="Placa_vehiculo" value="<?php echo $vehiculo['Placa_vehiculo'];  ?>">
                                    <input type="hidden" name="id_tipo_vehiculo" value="<?php echo $vehiculo['id_tipo_vehiculo'];  ?>">
                                    <input type="hidden" name="modelo_vehiculo" value="<?php echo $vehiculo['modelo_vehiculo'];  ?>">
                                    
                                    
                                    <input type="hidden" name="marca_vehiculo" value="<?php echo $vehiculo['marca_vehiculo'];  ?>">
                                    <input type="hidden" name="serie_vehiculo" value="<?php echo $vehiculo['serie_vehiculo'];  ?>">
                                    <input type="hidden" name="clasificacion_vehiculo" value="<?php echo $vehiculo['clasificacion_vehiculo'];  ?>">
                                    <input type="hidden" name="cilindraje" value="<?php echo $vehiculo['cilindraje'];  ?>">
                                    <input type="hidden" name="Precio" value="<?php echo $vehiculo['Precio'];  ?>">

                                    <td><input type="submit" class="btn btn-info" value="Seleccionar"></td>
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