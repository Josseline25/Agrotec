<?php
include("conexion.php");
$con = conectar();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $matricula = $_POST['matricula'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Comprobar si el usuario ya existe
    $sql = "SELECT * FROM usuarios WHERE matricula='$matricula'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "El usuario ya existe.";
    } else {
        // Insertar el nuevo usuario
        $sql = "INSERT INTO usuarios (matricula, password) VALUES ('$matricula', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
