<?php
    include("conexion.php");

    // Eliminar el registro si se recibe una solicitud POST
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
        $id = $_POST["id"];
        $sql = "DELETE FROM cultivo WHERE id = '$id'";
        $result = $con->query($sql);
    }

    // Obtener cultivos registrados
    $sql = "SELECT id, nombre, fecha_siembra, fecha_cosecha, tratamiento FROM cultivo";
    $result = $con->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Cultivos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function confirmarEliminacion(id) {
            if (confirm("¿Estás seguro de que deseas eliminar este cultivo?")) {
                fetch(window.location.href, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({ id: id })
                }).then(response => {
                    if (response.ok) {
                        window.location.reload();
                    } else {
                        alert("Error al eliminar el cultivo");
                    }
                });
            }
        }
    </script>
</head>
<body class="bg-green-400 min-h-screen p-8">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Cultivos Registrados</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b">Id</th>
                        <th class="py-2 px-4 border-b">Nombre</th>
                        <th class="py-2 px-4 border-b">Fecha de Siembra</th>
                        <th class="py-2 px-4 border-b">Fecha de Cosecha</th>
                        <th class="py-2 px-4 border-b">Tratamiento</th>
                        <th class="py-2 px-4 border-b">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Mostrar datos de cada fila
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='py-2 px-4 border-b'>" . $row["id"] . "</td>";
                        echo "<td class='py-2 px-4 border-b'>" . $row["nombre"] . "</td>";
                        echo "<td class='py-2 px-4 border-b'>" . $row["fecha_siembra"] . "</td>";
                        echo "<td class='py-2 px-4 border-b'>" . $row["fecha_cosecha"] . "</td>";
                        echo "<td class='py-2 px-4 border-b'>" . $row["tratamiento"] . "</td>";
                        echo "<td class='py-2 px-4 border-b text-center'>";
                        echo "<a href='ACTUALIZARCULTIVO.php?id=" . $row["id"] . "' class='inline-block bg-blue-400 hover:bg-blue-500 text-white font-bold py-1 px-2 rounded m-1'>Editar</a>";
                        echo "<a href='#' onclick='confirmarEliminacion(" . $row["id"] . ")' class='inline-block bg-red-400 hover:bg-red-500 text-white font-bold py-1 px-2 rounded m-1'>Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center py-4'>No hay cultivos disponibles</td></tr>";
                }
                $con->close();
                ?>

                </tbody>
            </table>
        </div>
        <div class="mt-8 text-center">
            <a href="menu.html" class="inline-block bg-green-400 hover:bg-green-400 text-white font-bold py-2 px-4 rounded">
                Volver al Menú
            </a>
        </div>
    </div>
</body>
</html>