<?php
$servername = "localhost";
$username = "u745190707_andrea";
$password = "185548_Test";
$dbname = "u745190707_185548_test";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$nomb = $_POST['nom'];
$nom_user = $_POST['nom_user'];
$pass= $_POST['pass'];


$sql = "INSERT INTO usuarios (nom_user,pass_user, nom,tipo) VALUES ('$nom_user', '$pass', '$nomb','1')";
				if ($conn->query($sql) === TRUE) {
				 header("Location: principal.php");
				} else {
				 echo "Error: " . $sql . "<br>" . $conn->error;
				}

$stmt->close();
$conn->close();
?>