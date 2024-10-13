<?php
session_start(); // Inicia la sesión para usar las variables de la sesión

$servername = "localhost";
$username = "u745190707_andrea";
$password = "185548_Test";
$dbname = "u745190707_185548_test";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados del Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('fondo.jpg'); /* Cambia esto por la URL de tu imagen */
            background-size: contain;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco semitransparente */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 80%; /* Cambia el tamaño según sea necesario */
            max-width: 600px; /* Ancho máximo */
            text-align: center;
        }

        .container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%; /* Ancho total de la tabla */
            border-collapse: collapse; /* Elimina espacios entre celdas */
        }

        th, td {
            padding: 12px; /* Espaciado interno de las celdas */
            text-align: left; /* Alineación del texto */
            border-bottom: 1px solid #ddd; /* Línea entre filas */
        }

        th {
            background-color: #000000; /* Fondo de los encabezados */
            color: white; /* Color del texto en los encabezados */
        }

        tr:hover {
            background-color: rgba(75, 14, 14, 0.5); /* Color de fondo al pasar el mouse */
        }
        button {
            padding: 10px 20px; /* Espaciado interno del botón */
            background-color: #000000; /* Fondo del botón */
            color: white; /* Color del texto */
            border: none; /* Sin borde */
            border-radius: 5px; /* Bordes redondeados */
            cursor: pointer; /* Cambia el cursor al pasar el mouse */
            font-size: 16px; /* Tamaño de la fuente */
            margin-top: 20px; /* Espacio superior */
        }

        button:hover {
            background-color: #4b0e0e; /* Color de fondo al pasar el mouse */
        }
    </style>
</head>
<body>

<?php
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; // Obtener el ID del usuario
    echo "<div class='container'>";
    echo "<h2>Resultados para el usuario:</h2>"; // Mostrar el ID

    // Consulta SQL para obtener los resultados relacionados con el usuario
    $sql = "SELECT u.id_user, u.nom_user, r.resultados, r.puntos 
            FROM usuarios u 
            JOIN resultados r ON u.id_user = r.id_usuario 
            WHERE u.id_user = ?";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("i", $user_id); // "i" indica que es un entero
    $stmt->execute();
    
    $result = $stmt->get_result(); // Obtener el resultado de la consulta

    // Verifica si hay resultados
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Resultado</th><th>Puntos</th></tr>";

        // Mostrar los resultados en la tabla
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_user"] . "</td>" . 
                 "<td>" . $row["nom_user"] . "</td>" . 
                 "<td>" . $row["resultados"] . "</td>" . 
                 "<td>" . $row["puntos"] . "</td>"; // Asegúrate de que estos nombres de columna son correctos
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No hay resultados para este usuario.";
    }
    echo "<form action='menuconsultas.php' method='get'>";
    echo "<button type='submit'>Regresar a Menú Consultas</button>";
    echo "</form>";
    echo "</div>"; // Cerrar el contenedor
    $stmt->close(); // Cierra la declaración
} else {
    echo "<div class='container'>No has iniciado sesión.</div>";
}

$conn->close(); // Cierra la conexión
?>

</body>
</html>

