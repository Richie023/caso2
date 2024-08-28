<?php 
include_once 'layoutInterno.php';
include_once '../Controller/CasasController.php';
include_once '../Controller/Alquiler.Controller.php'
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <style>
    .centered-div {
        width: 300px;
        margin: 0 auto;

    }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alquiler de Casas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
</head>

<body>
    <?php 
    MostrarNav();
    MostrarMenu();
    ?>

    <div class="centered-div">

        <div>
            <h1 class="mb-4">Alquiler de Casas</h1>
            <div />

            <form action="Alquiler.php" method="POST">
                <label for="IdCasa">Seleccione_Casa:</label>
                <select name="IdCasa" id="IdCasa" onchange="actualizarPrecio()">
                    <?php mostrarCasasDisponibles(); ?>
                </select><br>

                <label for="precioCasa">Precio_alquiler_Casa (Mensual):</label>
                <select id="Preciocasas" name="Preciocasas" onchange="actualizarPrecio()">

                    <option value="1" disabled>$190000.00</option>
                    <option value="2" disabled>$145000.00</option>
                    <option value="3" disabled>$115000.00</option>
                    <option value="4" disabled>$122000.00</option>
                    <option value="5" disabled>$105000.00</option>
                </select>

                <br>
                <label for="UsuarioAlquiler">Nombre :</label><br>
                <input type="text" name="UsuarioAlquiler" id="UsuarioAlquiler" required>
                <br>
                <br><input type="submit" style="background-color: blue; color: black;" value="Alquilar Casa"><br>
            </form>
            <div />
</body>

</html>