<?php
include("conexion.php");

// Lógica para agregar un nuevo suelo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipo = $_POST['tipo'];
    $ph = $_POST['ph'];
    $nutrientes = $_POST['nutrientes'];
    $humedad = $_POST['humedad'];

    // Insertar el nuevo suelo en la base de datos
    $sql = "INSERT INTO suelo (tipo, ph, nutrientes, humedad) VALUES ('$tipo', '$ph', '$nutrientes', '$humedad')";
    if ($con->query($sql) === TRUE) {
        $_SESSION['mensaje'] = "Suelo agregado exitosamente.";
    } else {
        $_SESSION['mensaje'] = "Error: " . $sql . "<br>" . $con->error;
    }

    // Redirigir de nuevo al formulario para mostrar el mensaje
    header("Location: VERSUELO.php");
    exit();
}
$con->close();
?>

