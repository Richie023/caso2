<?php
include_once '../Controller/CasasController.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alquiler de Casas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Alquiler de Casas</h2>
        <form method="POST" action="../Controller/CasasController.php">
            <div class="form-group">
                <label for="IdCasa">Casa:</label>
                <select class="form-control" id="IdCasa" name="IdCasa" required onchange="actualizarPrecio()">
                    <option value="">Seleccione una casa</option>
                    <?php mostrarCasasDisponibles(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="PrecioCasa">Precio mensual:</label>
                <input type="text" class="form-control" id="PrecioCasa" readonly>
            </div>
            <div class="form-group">
                <label for="UsuarioAlquiler">Usuario:</label>
                <input type="text" class="form-control" id="UsuarioAlquiler" name="UsuarioAlquiler" required>
            </div>
            <button type="submit" class="btn btn-primary">Alquilar</button>
        </form>
    </div>

    <script>
    function actualizarPrecio() {
        var select = document.getElementById('IdCasa');
        var precioInput = document.getElementById('PrecioCasa');
        var selectedOption = select.options[select.selectedIndex];
        var precio = selectedOption.getAttribute('data-precio');
        precioInput.value = precio ? parseFloat(precio).toFixed(2) : '';
    }
    </script>
</body>
</html>