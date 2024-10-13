<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados del Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('fondo.jpg'); /* Cambia esto por la URL de tu imagen */
            background-size: contain; /* Cambiar a 'cover' para que cubra toda la pantalla */
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
            width: 350px;
            text-align: center;
        }

        .container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .container h3 {
            margin-bottom: 20px;
            color: #555;
        }

        button {
            padding: 10px;
            background-color: #000000;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        button:hover {
            background-color: #4b0e0e;
        }
    </style>
</head>
<body>
        
</body>
</html>
<?php
session_start(); // Iniciar la sesión

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

// Obtener respuestas del formulario
$r[0] = $_POST['q1'];
$r[1] = $_POST['q2'];
$r[2] = $_POST['q3'];
$r[3] = $_POST['q4'];
$r[4] = $_POST['q5'];
$r[5] = $_POST['q6'];
$resultado = 0;
$res;

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; // Obtener el ID del usuario
    echo "<div class='container'>";

    // Contar respuestas correctas
    if ($r[0] == 'c') $resultado++;
    if ($r[1] == 'c') $resultado++;
    if ($r[2] == 'c') $resultado++;
    if ($r[3] == 'a') $resultado++;
    if ($r[4] == 'c') $resultado++;
    if ($r[5] == 'c') $resultado++;

    echo "<h2>Resultado: $resultado</h2>";

    // Determinar el mensaje basado en el resultado
    if ($resultado == 6) {
        $res = "Eres un verdadero sadvarito";
    } else if ($resultado >= 4 && $resultado < 6) {
        $res = "Conoces bien la música de Alvarito";
    } else if ($resultado >= 2 && $resultado < 4) {
        $res = "Te falta saberle más";
    } else {
        $res = "No sabes mucho sobre Alvarito";
    }

    echo "<h3>$res</h3>";
    echo"<form action='menuconsultas.php'>
            <button type='submit'>Regresar a Menu Consultas</button>
        </form>";
    
    var_dump($user_id, $res, $resultado);
    // Insertar resultados en la base de datos usando sentencias preparadas
$sql = "INSERT INTO resultados (id_usuario, resultados, puntos) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

// Vincular parámetros
$stmt->bind_param("isi", $user_id, $res, $resultado);

// Ejecutar la declaración
if ($stmt->execute()) {
    echo "Nueva encuesta realizada";
} else {
    echo "Error al insertar: " . $stmt->error; // Esto te ayudará a depurar
}

$stmt->close(); // Cerrar la declaración

    $stmt->close(); // Cerrar la declaración
} else {
    echo "No has iniciado sesión.";
}

$conn->close(); // Cerrar la conexión

?>