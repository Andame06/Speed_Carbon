<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_registro = (isset($_POST['id_registro'])) ? $_POST['id_registro'] : "";
$precio_registro = (isset($_POST['precio_registro'])) ? $_POST['precio_registro'] : "";
$id_comprador = (isset($_POST['id_comprador'])) ? $_POST['id_comprador'] : "";
$Placa_vehiculo = (isset($_POST['Placa_vehiculo'])) ? $_POST['Placa_vehiculo'] : "";
$id_empleado = (isset($_POST['id_empleado'])) ? $_POST['id_empleado'] : "";
$Ganancia = (isset($_POST['Ganancia'])) ? $_POST['Ganancia'] : "";




$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */

                $insercionRegistro = $conn->prepare(
                "INSERT INTO registro ( id_registro, precio_registro, id_comprador, Placa_vehiculo, id_empleado, Ganancia) 
                VALUES ('$id_registro','$precio_registro','$id_comprador','$Placa_vehiculo','$id_empleado','$Ganancia')"
             );



        $insercionRegistro->execute();
        $conn->close();

        header('location: index.php');



        break;


    case 'btnEliminar':


        $eliminarRegistro = $conn->prepare(" DELETE FROM registro
        WHERE id_registro = '$id_registro' ");

        // $consultaFoto->execute();
        $eliminarRegistro->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;


}



/* Consultamos todas las Facturas  */
$consultaRegistro = $conn->prepare("SELECT * FROM registro");
$consultaRegistro->execute();
$listaRegistro = $consultaRegistro->get_result();



/* Consultamos todos los Clientes  */
$consultaCompradores = $conn->prepare("SELECT * FROM comprador");
$consultaCompradores->execute();
$listaCompradores = $consultaCompradores->get_result();





/* Consultamos todos los Empleados  */
$consultaEmpleados = $conn->prepare("SELECT * FROM empleados");
$consultaEmpleados->execute();
$listaEmpleados = $consultaEmpleados->get_result();

//$consultaTipoVehiculos = $conn->prepare("SELECT * FROM tipo_de_vehiculo");
//$consultaTipoVehiculos->execute();
//$listaTipoVehiculos = $consultaTipoVehiculos->get_result();

$consultaVehiculo = $conn->prepare("SELECT * FROM vehiculo");
$consultaVehiculo->execute();
$listaVehiculo = $consultaVehiculo->get_result();


//Al final de todas las consultas se cierra la conexion
$conn->close();