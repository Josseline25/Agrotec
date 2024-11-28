<?php
include("conexion.php");

// Lógica para agregar un nuevo suelo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['suelo_id'];
    $tipo = $_POST['tipo'];
    $ph = $_POST['ph'];
    $nutrientes = $_POST['nutrientes'];
    $humedad = $_POST['humedad'];

    // Actualizar el suelo en la base de datos
    $sql = "UPDATE suelo 
            SET tipo='$tipo',
                ph='$ph',
                nutrientes='$nutrientes',
                humedad='$humedad'
            WHERE id='$id'";
    if ($con->query($sql) === TRUE) {
        $_SESSION['mensaje'] = "Suelo actualizado exitosamente.";
    } else {
        $_SESSION['mensaje'] = "Error: " . $sql . "<br>" . $con->error;
    }

    // Redirigir de nuevo al formulario para mostrar el mensaje
    header("Location: VERSUELO.php");
    exit();
}
$con->close();
?>

