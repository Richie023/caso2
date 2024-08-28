<?php

    function AbrirBaseDatos()
    {
        return mysqli_connect('127.0.0.1:3309', 'root', '', 'CasoEstudioMN');
    }

    function CerrarBaseDatos($conexion)
    {
        mysqli_close($conexion);
    }

    function AbrirBD()
    {
            return mysqli_connect('127.0.0.1:3309','root','','CasoEstudioMN');
    
    }

    function CerrarBD($Connection)
{

    /// Cerrar la base de datos///
        mysqli_close($Connection);
}
?>