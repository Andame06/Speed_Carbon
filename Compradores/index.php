<?php include 'codeComprador.php'; ?>
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del Comprador</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Cuerpo del modal -->
                   <form>
                    <div class="modal-body">
                        <form id="compradorForm" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="txtId_comprador" >Id</label>
                                    <input type="text" class="form-control" require name="id_comprador" id="id_comprador" placeholder="" value="<?php echo $id_comprador ?>">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="txtNombre_comprador">Nombre(s)</label>
                                    <input type="text" class="form-control" require name="nombre_comprador" id="nombre_comprador" placeholder="" value="<?php echo $nombre_comprador ?>">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="txtApellido_comprador">Apellidos </label>
                                    <input type="text" class="form-control" require name="apellido_comprador" id="apellido_comprador" placeholder="" value="<?php echo $apellido_comprador ?>">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="txtTel_comprador">Telefono</label>
                                    <input type="text" class="form-control" require name="Tel_comprador" id="Tel_comprador" placeholder="" value="<?php echo $Tel_comprador ?>">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="txtDireccion_comprador">Direccion</label>
                                    <input type="text" class="form-control" require name="Direccion_comprador" id="Direccion_comprador" placeholder="" value="<?php echo $Direccion_comprador ?>">
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="txtEdad_comprador">Edad</label>
                                    <input type="text" class="form-control" require name="txtEdad_comprador" id="txtEdad_comprador" placeholder="" value="<?php echo $Edad_comprador ?>">
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
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Comprador

        </button>
           




        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>
                        
                        <th scope="col">Identificacion</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Edad</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaEmpleados tiene algun contenido */
                    if ($listaCompradores->num_rows > 0) {

                        foreach ($listaCompradores as $comprador) {

                    ?>

                            <tr>

                                

                                <td> <?php echo $comprador['id_comprador']        ?> </td>
                                <td> <?php echo $comprador['nombre_comprador']    ?> </td>
                                <td> <?php echo $comprador['apellido_comprador'] ?> </td>
                                <td> <?php echo $comprador['Tel_comprador']    ?> </td>
                                <td> <?php echo $comprador['Direccion_comprador']    ?> </td>
                                <td> <?php echo $comprador['Edad_comprador']    ?> </td>



                                <form action="" method="post">

                                    <input type="hidden" name="id_comprador" value="<?php echo $comprador['id_comprador'];  ?>">
                                    <input type="hidden" name="nombre_comprador" value="<?php echo $comprador['nombre_comprador'];  ?>">
                                    <input type="hidden" name="apellido_comprador" value="<?php echo $comprador['apellido_comprador'];  ?>">
                                    
                                    
                                    <input type="hidden" name="Tel_comprador" value="<?php echo $comprador['Tel_comprador'];  ?>">
                                    <input type="hidden" name="Direccion_comprador" value="<?php echo $comprador['Direccion_comprador'];  ?>">
                                    <input type="hidden" name="Edad_comprador" value="<?php echo $comprador['Edad_comprador'];  ?>">

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