<?php
// Lógica para manejar el inicio de sesión
    $matricula = $_POST['matricula'];
    $password = $_POST['password'];

    // Iniciar la sesión
    session_start();  
    
    $_SESSION['matricula'] = $matricula;

    include('conexion.php');

    $sql = "SELECT * FROM usuario WHERE matricula='$matricula' and password='$password'";

    $resultado = mysqli_query($con, $sql);

    if(mysqli_num_rows($resultado) > 0) {
        header("Location: menu.html");
    }
    else {
        header("Location: LOGINPrincipal.php?error=1");
    }

    mysqli_free_result($resultado);
    mysqli_close($con);
?>
