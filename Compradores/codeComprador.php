<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_comprador = (isset($_POST['id_comprador'])) ? $_POST['id_comprador'] : "";
$nombre_comprador = (isset($_POST['nombre_comprador'])) ? $_POST['nombre_comprador'] : "";
$apellido_comprador = (isset($_POST['apellido_comprador'])) ? $_POST['apellido_comprador'] : "";
$Tel_comprador = (isset($_POST['Tel_comprador'])) ? $_POST['Tel_comprador'] : "";
$Direccion_comprador = (isset($_POST['Direccion_comprador'])) ? $_POST['Direccion_comprador'] : "";
$Edad_comprador = (isset($_POST['Edad_comprador'])) ? $_POST['Edad_comprador'] : "";



$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':



    
        


                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
                $insercionComprador = $conn->prepare(
                    "INSERT INTO comprador(id_comprador, nombre_comprador, apellido_comprador, Tel_comprador, Direccion_comprador, Edad_comprador)
                    VALUES ('$id_comprador', '$nombre_comprador', '$apellido_comprador', '$Tel_comprador', '$Direccion_comprador', '$Edad_comprador')"
                );



                $insercionComprador->execute();
                $conn->close();

                header('location: index.php');
               
               
        




        break;

    case 'btnModificar':

        $editarCompradores = $conn->prepare(" UPDATE comprador SET nombre_comprador = '$nombre_comprador' , 
        apellido_comprador = '$apellido_comprador', Tel_comprador = '$Tel_comprador',  Direccion_comprador = '$Direccion_comprador',  Edad_comprador = '$Edad_comprador'
        WHERE id_comprador = '$id_comprador' ");

        

        
        
        


        $editarCompradores->execute();
        
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
       

        $eliminarCompradores = $conn->prepare(" DELETE FROM comprador
        WHERE id_comprador = $id_comprador' ");

$eliminarCliente->execute();
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
$consultaCompradores = $conn->prepare("SELECT * FROM comprador");
$consultaCompradores->execute();
$listaCompradores = $consultaCompradores->get_result();
$conn->close();
