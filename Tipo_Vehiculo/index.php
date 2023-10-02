<?php include 'codeTipoVehiculo.php'; ?>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del Vehiculo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Cuerpo del modal -->
            <form>
                <div class="modal-body">
                    <form id="compradorForm" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="txtId_TipoVehiculo" >Identificacion del Vehiculo</label>
                                <input type="text" class="form-control" require name="id_tipo_vehiculo" id="id_tipo_vehiculo" placeholder="" value="<?php echo $id_tipo_vehiculo ?>">
                                <br>
                            </div>
                            <div class="form-group col-md-12">
                                
                                <label for="txtTipo_Vehiculo" >Tipo de Vehiculo</label>
                                <!-- Aplica estilos CSS para cambiar el tamaño de fuente del elemento select -->
                                <select name="Tipo_vehiculo" class="form-control" require style="font-size: 14px;">
                                    <option value="Automovil">Automovil</option>
                                    <option value="Motocicleta">Motocicleta</option>
                                    <option value="Cuatrimoto">Cuatrimoto</option>
                                    <option value="Camioneta">Camioneta</option>
                                </select>
                                <br>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="txtNombre_vehiculo">Referencia Vehiculo </label>
                                <input type="text" class="form-control" require name="Nombre_vehiculo" id="Nombre_vehiculo" placeholder="" value="<?php echo $Nombre_vehiculo ?>">
                                <br>
                            </div>
                        </div>
                    </div>
                    <!-- Pie/Footer del modal -->
                    <div class="modal-footer">
                        <button value="btnAgregar" class="btn btn-success" type="submit" name="accion">Agregar</button>
                        <button value="btnModificar" class="btn btn-warning" type="submit" name="accion">Modificar</button>
                        <button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button>
                        <button value="btnCancelar" class="btn btn-primary" type="submit" name="accion">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Tipo de Vehiculo

        </button>
           




        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>
                        
                        <th scope="col">Identificacion Del Vehiculo</th>
                        <th scope="col">Tipo de Vehiculo</th>
                        <th scope="col">Referencia del Vehiculo</th>
                        

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaEmpleados tiene algun contenido */
                    if ($listaTipoVehiculos->num_rows > 0) {

                        foreach ($listaTipoVehiculos as $TipoVehiculo) {

                    ?>

                            <tr>

                                

                                <td> <?php echo $TipoVehiculo['id_tipo_vehiculo']        ?> </td>
                                <td> <?php echo $TipoVehiculo['Tipo_vehiculo']    ?> </td>
                                <td> <?php echo $TipoVehiculo['Nombre_vehiculo'] ?> </td>
                               


                                <form action="" method="post">

                                    <input type="hidden" name="id_tipo_vehiculo" value="<?php echo $TipoVehiculo['id_tipo_vehiculo'];  ?>">
                                    <input type="hidden" name="Tipo_vehiculo" value="<?php echo $TipoVehiculo['Tipo_vehiculo'];  ?>">
                                    <input type="hidden" name="Nombre_vehiculo" value="<?php echo $TipoVehiculo['Nombre_vehiculo'];  ?>">
                                    
                                    
                                   
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