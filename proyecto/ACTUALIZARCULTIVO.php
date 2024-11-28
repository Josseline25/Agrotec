<?php
    include("conexion.php");
    
    $id = $_GET["id"];
    $sql = "SELECT * FROM cultivo WHERE id ='$id'";
    $result = $con->query($sql);

    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Cultivo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-400 min-h-screen p-8">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Actualizar Cultivo</h1>
        <form method="POST" action="ACTUALIZARCULTIVO2.php" class="space-y-4">
            <div>
                <label for="cultivo_id" class="block text-sm font-medium text-gray-700">ID del Cultivo</label>
                <input type="text" value="<?php echo $row['id']; ?>" id="cultivo_id" readonly name="cultivo_id" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Cultivo</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="fecha_siembra" class="block text-sm font-medium text-gray-700">Fecha de Siembra</label>
                <input type="date" id="fecha_siembra" name="fecha_siembra" value="<?php echo $row['fecha_siembra']; ?>" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="fecha_cosecha" class="block text-sm font-medium text-gray-700">Fecha de Cosecha</label>
                <input type="date" id="fecha_cosecha" name="fecha_cosecha" value="<?php echo $row['fecha_cosecha']; ?>" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="tratamiento" class="block text-sm font-medium text-gray-700">Tratamiento Aplicado</label>
                <input type="text" id="tratamiento" name="tratamiento" value="<?php echo $row['tratamiento']; ?>" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-400 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Actualizar Cultivo
            </button>
        </form>
        <div class="mt-4 text-center">
            <a href="VERCULTIVOS.php" class="text-sm text-gray-700 hover:text-gray-700">Volver</a>
        </div>
    </div>
</body>
</html>