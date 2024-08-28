<?php
include_once '../Model/baseDatosModel.php';

function RegistrarAlquilar($Seleccione_Casa, $Precio_alquiler_Casa, $Nombre)
{
    //Abrimos la connection //
    $Connection = AbrirBD();
 // Llamado a la base de datos, se pone "call y el nombre del procedimeinto almacenado"//
    $judgment = "CALL RegistrarAlquiler('$Seleccione_Casa','$Precio_alquiler_Casa','$Nombre')";
    //Procesa el procedimiento almacenado.
    $respuesta = $Connection ->query($judgment);
    //Cierro la BD
    CerrarBD($Connection);
    
    return  $respuesta;
    
}

?>