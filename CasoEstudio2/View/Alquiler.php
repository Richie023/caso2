<?php 
include_once 'layoutInterno.php';
include_once '../Controller/CasasController.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
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
      <form action="Alquiler.php" method="POST">
        <label for="IdCasa">Seleccione la Casa:</label>
        <select name="IdCasa" id="IdCasa" onchange="actualizarPrecio()">
            <?php mostrarCasasDisponibles(); ?>
        </select><br>

        <label for="PrecioCasa">Precio Mensual:</label>
        <input type="text" name="PrecioCasa" id="PrecioCasa" readonly><br>

        <label for="UsuarioAlquiler">Su Nombre:</label>
        <input type="text" name="UsuarioAlquiler" id="UsuarioAlquiler" required><br>

        <input type="submit" value="Alquilar Casa">
    </form>

    <script>
        // Función para actualizar el precio de la casa seleccionada
        function actualizarPrecio() {
            var idCasa = document.getElementById("IdCasa").value;
            if (idCasa) {
                // Llamada AJAX para obtener el precio de la casa seleccionada
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "obtenerPrecio.php?IdCasa=" + idCasa, true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        document.getElementById("PrecioCasa").value = xhr.responseText;
                    }
                };
                xhr.send();
            } else {
                document.getElementById("PrecioCasa").value = "";
            }
        }
    </script>
</body>
</html>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script> <!-- Verifica que esta ruta sea correcta -->
</body>
</html>
