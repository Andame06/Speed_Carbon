<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_tipo_vehiculo = (isset($_POST['id_tipo_vehiculo'])) ? $_POST['id_tipo_vehiculo'] : "";
$Tipo_vehiculo = (isset($_POST['Tipo_vehiculo'])) ? $_POST['Tipo_vehiculo'] : "";
$Nombre_vehiculo = (isset($_POST['Nombre_vehiculo'])) ? $_POST['Nombre_vehiculo'] : "";





$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':



    
        


                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
                $insercionTipoVehiculos = $conn->prepare(
                    "INSERT INTO tipo_de_vehiculo(id_tipo_vehiculo, Tipo_vehiculo, Nombre_vehiculo)
                    VALUES ('$id_tipo_vehiculo', '$Tipo_vehiculo', '$Nombre_vehiculo')"
                );
                $insercionTipoVehiculos ->execute();
                $conn->close();

                header('location: index.php');
               
                
        




        break;

    case 'btnModificar':

        $editarTipoVehiculos = $conn->prepare(" UPDATE tipo_de_vehiculo SET Tipo_vehiculo = '$Tipo_vehiculo' , 
        Nombre_comprador = '$Nombre_vehiculo'
        WHERE id_tipo_vehiculo = '$id_tipo_vehiculo' ");

        

        
        
        


$editarTipoVehiculos->execute();
        
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
       

        $eliminarTipoVehiculos = $conn->prepare(" DELETE FROM tipo_de_vehiculo
        WHERE id_tipo_vehiculo = '$id_tipo_vehiculo' ");

$eliminarTipoVehiculos->execute();
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
$consultaTipoVehiculos = $conn->prepare("SELECT * FROM tipo_de_vehiculo");
$consultaTipoVehiculos->execute();
$listaTipoVehiculos = $consultaTipoVehiculos->get_result();
$conn->close();