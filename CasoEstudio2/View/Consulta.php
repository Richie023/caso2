<?php 
include_once 'layoutInterno.php';
include_once '../Controller/CasasController.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Casas</title>
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

    <div class="container mt-5">
        <h1 class="mb-4">Consulta de Casas</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Usuario Alquiler</th>
                    <th>Fecha Alquiler</th>
                </tr>
            </thead>
            <tbody>
                <?php mostrarCasas(); ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Cambiado a la versión completa -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script> <!-- Verifica que esta ruta sea correcta -->
</body>
</html>
