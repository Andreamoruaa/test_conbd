<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso</title>
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
            width: 350px;
            text-align: center;
        }

        .container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #000000;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #4b0e0e;
        }

        form {
            margin-bottom: 20px;
        }

        .new-user-btn {
            background-color: #a72828;
        }

        .new-user-btn:hover {
            background-color: #882121;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ingreso</h2>
        <form action="validar.php" method="post">
            <input type="text" name="nombre" placeholder="Nombre de usuario" required> <br>
            <input type="text" name="pass" placeholder="Contraseña" required> <br>
            <button type="submit">Acceder</button>
        </form>
        <form action="nuevo.php" method="post">
            <button type="submit" name="nuevo" class="new-user-btn">Nuevo Usuario</button>
        </form>
    </div>
</body>
</html>