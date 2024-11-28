<?php
include("conexion.php");

// Lógica para agregar un nuevo suelo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['cultivo_id'];
    $nombre = $_POST['nombre'];
    $fecha_cosecha = $_POST['fecha_cosecha'];
    $fecha_siembra = $_POST['fecha_siembra'];
    $tratamiento = $_POST['tratamiento'];

    // Actualizar el suelo en la base de datos
    $sql = "UPDATE cultivo 
            SET nombre='$nombre',
                fecha_cosecha='$fecha_cosecha',
                fecha_siembra='$fecha_siembra',
                tratamiento='$tratamiento'
            WHERE id='$id'";
    if ($con->query($sql) === TRUE) {
        $_SESSION['mensaje'] = "Cultivo actualizado exitosamente.";
    } else {
        $_SESSION['mensaje'] = "Error: " . $sql . "<br>" . $con->error;
    }

    // Redirigir de nuevo al formulario para mostrar el mensaje
    header("Location: VERCULTIVOS.php");
    exit();
}
$con->close();
?>

