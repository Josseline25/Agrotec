<?php
include("conexion.php");

// Lógica para agregar un nuevo cultivo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $fecha_siembra = $_POST['fecha_siembra'];
    $fecha_cosecha = $_POST['fecha_cosecha'];
    $tratamiento = $_POST['tratamiento'];

    // Insertar el nuevo cultivo en la base de datos
    $sql = "INSERT INTO cultivo (nombre, fecha_siembra, fecha_cosecha, tratamiento) VALUES ('$nombre', '$fecha_siembra', '$fecha_cosecha', '$tratamiento')";
    if ($con->query($sql) === TRUE) {
        $_SESSION['mensaje'] = "Cultivo agregado exitosamente.";
    } else {
        $_SESSION['mensaje'] = "Error: " . $sql . "<br>" . $con->error;
    }
    // Redirigir de nuevo al formulario para mostrar el mensaje
    header("Location: VERCULTIVOS.php");
    exit();
}
$con->close();
?>
