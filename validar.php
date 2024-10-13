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

$nombre = $_POST['nombre'];
$pass = $_POST['pass'];

// Imprimir para depurar
echo "Nombre ingresado: " . $nombre; 

// Consulta SQL para buscar al usuario
$sql = "SELECT id_user, pass_user FROM usuarios WHERE nom_user=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nombre); // "s" indica que es una cadena
$stmt->execute();
$result = $stmt->get_result(); // Obtener el resultado de la consulta

// Verifica si el usuario existe
if (!$result) {
    die("Error en la consulta: " . $conn->error);
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); // Obtener los datos del usuario
    $stored_password = $row['pass_user']; // Obtener la contraseña almacenada
    $user_id = $row['id_user']; // Obtener el ID del usuario

    // Imprimir para depurar
    echo "Contraseña almacenada: " . $stored_password; 

    // Si la contraseña es correcta, guardar el ID del usuario en la sesión
        $_SESSION['user_id'] = $user_id;

        // Redirigir a una página HTML
        header("Location: menuconsultas.php");
        exit(); // Asegúrate de salir después de la redirección
    } else {
    echo "Nombre de usuario o contraseña incorrectos.";
}

// Cierra la conexión
$stmt->close();
$conn->close();
?>

