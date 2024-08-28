<?php
include_once '../Model/Alquiler.Model.php';

if(isset($_POST["Alquilar Casa"])){

    $Seleccione_Casa = $_POST["IdCasa"];
    $Precio_alquiler_Casa =$_POST["Preciocasas"];
    $Nombre =$_POST["UsuarioAlquiler"];

    $Registro = RegistrarAlquiler($Seleccione_Casa,$Precio_alquiler_Casa,$Nombre);

    if($Registro==true){

        header("location: Consulta.php");
    }
    

    }


?>