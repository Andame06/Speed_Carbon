<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$Placa_vehiculo = (isset($_POST['Placa_vehiculo'])) ? $_POST['Placa_vehiculo'] : "";
$id_tipo_vehiculo = (isset($_POST['id_tipo_vehiculo'])) ? $_POST['id_tipo_vehiculo'] : "";
$modelo_vehiculo = (isset($_POST['modelo_vehiculo'])) ? $_POST['modelo_vehiculo'] : "";
$marca_vehiculo = (isset($_POST['marca_vehiculo'])) ? $_POST['marca_vehiculo'] : "";
$serie_vehiculo = (isset($_POST['serie_vehiculo'])) ? $_POST['serie_vehiculo'] : "";
$clasificacion_vehiculo = (isset($_POST['clasificacion_vehiculo'])) ? $_POST['clasificacion_vehiculo'] : "";
$cilindraje = (isset($_POST['cilindraje'])) ? $_POST['cilindraje'] : "";
$Precio = (isset($_POST['Precio'])) ? $_POST['Precio'] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':



    
        


                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
                $insercionVehiculo = $conn->prepare(
                    "INSERT INTO vehiculo(Placa_vehiculo, id_tipo_vehiculo, modelo_vehiculo, marca_vehiculo, serie_vehiculo, clasificacion_vehiculo, cilindraje, Precio)
                    VALUES ('$Placa_vehiculo', '$id_tipo_vehiculo', '$modelo_vehiculo', '$marca_vehiculo', '$serie_vehiculo', '$clasificacion_vehiculo', '$cilindraje', '$Precio')"
                );



                $insercionVehiculo->execute();
                $conn->close();

                header('location: index.php');
               
               
        




        break;

    case 'btnModificar':

        $editarVehiculo = $conn->prepare(" UPDATE vehiculo SET id_tipo_vehiculo = '$id_tipo_vehiculo' , 
        modelo_vehiculo = '$modelo_vehiculo', marca_vehiculo = '$marca_vehiculo',  serie_vehiculo = '$serie_vehiculo',  clasificacion_vehiculo = '$clasificacion_vehiculo', cilindraje = '$cilindraje', Precio = '$Precio'
        WHERE Placa_vehiculo = '$Placa_vehiculo' ");

        

        
        
        


        $editarVehiculo->execute();
        
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
       

        $eliminarVehiculo = $conn->prepare(" DELETE FROM vehiculo
        WHERE Placa_vehiculo = $Placa_vehiculo' ");

$eliminarVehiculo->execute();
$conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;

    default:
        # code...
        break;


    }



/* Consultamos todos los empleados  */
$consultaVehiculo = $conn->prepare("SELECT * FROM vehiculo");
$consultaVehiculo->execute();
$listaVehiculo = $consultaVehiculo->get_result();
$conn->close();
