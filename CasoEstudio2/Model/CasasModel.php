<?php
include_once 'baseDatosModel.php';

function ConsultarCasasDisponibles() {
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL ConsultarCasasDisponibles()";
    $respuesta = $conexion->query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}

function ConsultarCasas() {
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL ConsultarCasas()";
    $respuesta = $conexion->query($sentencia);
    CerrarBaseDatos($conexion);
    return $respuesta;
}

function RegistrarAlquiler($IdCasa, $UsuarioAlquiler, $FechaAlquiler) {
    $conexion = AbrirBaseDatos();
    $sentencia = "CALL RegistrarAlquiler('$IdCasa', '$UsuarioAlquiler', '$FechaAlquiler')";
    $respuesta = $conexion->query($sentencia);
    
    if ($conexion->error) {
        // Mostrar mensaje de error si hay problemas con la consulta
        echo "Error en la consulta: " . $conexion->error;
    }
    
    CerrarBaseDatos($conexion);
    return $respuesta;
}
?>