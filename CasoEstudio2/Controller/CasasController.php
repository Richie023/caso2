<?php
include_once '../Model/CasasModel.php';

function mostrarCasasDisponibles() {
    $respuesta = ConsultarCasasDisponibles();

    if ($respuesta->num_rows > 0) {
        while ($row = $respuesta->fetch_assoc()) {
            echo "<option value='" . $row["IdCasa"] . "' data-precio='" . $row["PrecioCasa"] . "'>" . $row["DescripcionCasa"] . "</option>";
        }
    } else {
        echo "<option value=''>No hay casas disponibles</option>";
    }
}

function mostrarCasas() {
    $respuesta = ConsultarCasas();

    if ($respuesta->num_rows > 0) {
        while ($row = $respuesta->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["DescripcionCasa"] . "</td>";
            echo "<td>" . $row["PrecioCasa"] . "</td>";
            echo "<td>" . $row["Estado"] . "</td>";
            echo "<td>" . ($row["UsuarioAlquiler"] ?? "N/A") . "</td>";
            echo "<td>" . ($row["FechaAlquiler"] ?? "N/A") . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No se encontraron casas en el rango de precios especificado.</td></tr>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $IdCasa = $_POST['IdCasa'];
    $UsuarioAlquiler = $_POST['UsuarioAlquiler'];
    $FechaAlquiler = date('Y-m-d H:i:s');  // Fecha actual del sistema

    if (!empty($UsuarioAlquiler)) {
        // Llamar al modelo para registrar el alquiler
        $resultado = RegistrarAlquiler($IdCasa, $UsuarioAlquiler, $FechaAlquiler);
        
        if ($resultado) {
            // Redirigir al usuario a la vista de consulta después de alquilar
            header("Location: ../View/consulta.php");
            exit();
        } else {
            // Mostrar mensaje de error si no se pudo registrar el alquiler
            echo "Error al registrar el alquiler. Por favor, inténtelo de nuevo.";
        }
    } else {
        // Mostrar mensaje de error si el campo UsuarioAlquiler está vacío
        echo "Debe ingresar su nombre.";
    }
}
?>