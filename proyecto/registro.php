<?php

// Iniciar la sesión
session_start();

// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "Josseline25";
$dbname = "sistema_cultivos";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Lógica para registrar un nuevo usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $matricula = mysqli_real_escape_string($conn, $_POST['matricula']);
    $password = $_POST['password'];

    // Comprobar si el usuario ya existe
    $sql = "SELECT * FROM usuario WHERE matricula='$matricula'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "La matrícula ya está registrada.";
    } else {
        // Insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO usuario (nombre, matricula, password) VALUES ('$nombre', '$matricula', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso. Ahora puedes iniciar sesión.";
            // Redirigir a la página de inicio de sesión
            header("Location: LOGINPrincipal.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Cerrar la conexión
$conn->close();
?>
