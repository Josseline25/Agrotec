<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-400 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
    <img src="logo.jpeg"  alt="Mapa de Cultivos" width="200" height="100"  style="display: block; margin-left: auto; margin-right: auto;">
        <h1 class="text-2xl font-bold mb-6 text-center">Iniciar Sesión</h1>
        <form method="POST" action="login.php" class="space-y-4">
            <input type="hidden" name="LOGIN" value="1">
            <div>
                <label for="matricula" class="block text-sm font-medium text-gray-700">Matrícula</label>
                <input type="text" id="matricula" name="matricula" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-400 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400">
                Iniciar Sesión
            </button>
        </form>
        <?php
            if(isset($_GET['error']) && $_GET['error'] == 1)
            {
                echo "
                    <p class='text-red-500 text-center'>Las credenciales son incorrectas</p>
                ";
            }
        ?>
        <div class="mt-4 text-center">
            <a href="registro.html" class="text-sm text-gray-700 hover:text-gray-700">¿No tienes cuenta? Regístrate aquí</a>
        </div>
    </div>
</body>
</html>
