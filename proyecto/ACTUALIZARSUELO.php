<?php
    include("conexion.php");
    
    $id = $_GET["id"];
    $sql = "SELECT * FROM suelo WHERE id ='$id'";
    $result = $con->query($sql);

    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Suelo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-400 min-h-screen p-8">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Actualizar Suelo</h1>
        <form method="POST" action="ACTUALIZARSUELO2.php" class="space-y-4">
            <div>
                <label for="suelo_id" class="block text-sm font-medium text-gray-700">ID del Suelo</label>
                <input type="text" value="<?php echo $row['id']; ?>" id="suelo_id" readonly name="suelo_id" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo de Suelo</label>
                <select id="tipo" name="tipo" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="arenoso" <?php if($row["tipo"] == "arenoso") echo "selected";?>>Arenoso</option>
                    <option value="limoso" <?php if($row["tipo"] == "limoso") echo "selected";?>>Limoso</option>
                    <option value="arcilloso" <?php if($row["tipo"] == "arcilloso") echo "selected";?>>Arcilloso</option>
                </select>
            </div>
            <div>
                <label for="ph" class="block text-sm font-medium text-gray-700">PH</label>
                <input type="number" value="<?php echo $row['ph']; ?>" step="0.1" id="ph" name="ph" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="nutrientes" class="block text-sm font-medium text-gray-700">Nutrientes</label>
                <input type="text" value="<?php echo $row['nutrientes']; ?>" id="nutrientes" name="nutrientes" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="humedad" class="block text-sm font-medium text-gray-700">Niveles de Humedad</label>
                <input type="number" value="<?php echo $row['humedad']; ?>" step="0.1" id="humedad" name="humedad" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-400 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Actualizar Suelo
            </button>
        </form>
        <div class="mt-4 text-center">
            <a href="VERSUELO.php" class="text-sm text-gray-700 hover:text-gray-700">Volver</a>
        </div>
    </div>
</body>
</html>
