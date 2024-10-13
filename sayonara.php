<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuestionario sobre Alvaro Diaz</title>
    <style>
       
        .question {
            margin-bottom: 20px;
        }
        .options {
            list-style-type: none;
            padding: 0;
        }
        .options li {
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            background-color: #753838;
            transition: background-color 0.3s;
        }
        .options li:hover {
            background-color: #e0e0e0;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
         body {
            font-family: Arial, sans-serif;
            background-image: url('fondo.jpg'); /* Cambia esto por la URL de tu imagen */
            background-size: contain;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 300vh;
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
        <h1>Cuestionario sobre Alvaro Diaz</h1>

        <form action="resultadotestbd.php" method="post">
        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
            <div class="question">
                <p>¿Cual es el titulo del tercer album de Alvaro Diaz?</p>
                <ul class="options">
                    <li><input type="radio" name="q1" value="a" required> a) Felicilandia</li>
                    <li><input type="radio" name="q1" value="b" required> b) ADDA</li>
                    <li><input type="radio" name="q1" value="c"required> c) Sayonara</li>
                    <li><input type="radio" name="q1" value="d" required> d) Diaz Antes</li>
                </ul>
            </div>

            <div class="question">
                <p>¿En que año fue lanzado el album "Sayonara"?</p>
                <ul class="options">
                    <li><input type="radio" name="q2" value="a" required> a) 2022</li>
                    <li><input type="radio" name="q2" value="b" required> b) 2023</li>
                    <li><input type="radio" name="q2" value="c" required> c) 2024</li>
                    <li><input type="radio" name="q2" value="d" required> d) 2025</li>
                </ul>
            </div>

            <div class="question">
                <p>¿Cual de los siguientes artistas NO colaboro en el album "Sayonara"?</p>
                <ul class="options">
                    <li><input type="radio" name="q3" value="a" required> a) Feid</li>
                    <li><input type="radio" name="q3" value="b" required> b) Tainy</li>
                    <li><input type="radio" name="q3" value="c" required> c) Bad Bunny</li>
                    <li><input type="radio" name="q3" value="d" required> d) Sen Senra</li>
                </ul>
            </div>

            <div class="question">
                <p>¿Cuantas canciones aproximadamente tiene el album "Sayonara"?</p>
                <ul class="options">
                    <li><input type="radio" name="q4" value="a" required> a) 10</li>
                    <li><input type="radio" name="q4" value="b" required> b) 15</li>
                    <li><input type="radio" name="q4" value="c" required> c) 20</li>
                    <li><input type="radio" name="q4" value="d" required> d) 25</li>
                </ul>
            </div>

            <div class="question">
                <p>¿Cual es el tema central del album "Sayonara" segun Alvaro Diaz?</p>
                <ul class="options">
                    <li><input type="radio" name="q5" value="a" required> a) Una fiesta sin fin</li>
                    <li><input type="radio" name="q5" value="b" required> b) Un viaje por diferentes paises</li>
                    <li><input type="radio" name="q5" value="c" required> c) Un intenso viaje emocional tras una ruptura amorosa</li>
                    <li><input type="radio" name="q5" value="d" required> d) La busqueda de la felicidad</li>
                </ul>
            </div>

            <div class="question">
                <p>¿Cual de las siguientes canciones NO forma parte del album "Sayonara"?</p>
                <ul class="options">
                    <li><input type="radio" name="q6" value="a" required> a) Te Vi En Mis Pesadillas</li>
                    <li><input type="radio" name="q6" value="b" required> b) Kawa</li>
                    <li><input type="radio" name="q6" value="c" required> c) La Noche de Anoche</li>
                    <li><input type="radio" name="q6" value="d" required> d) Fatal Fantassy</li>
                </ul>
            </div>

            <button type="submit">Enviar Respuestas</button>
            
        
        </form> <br>
        <form action='menuconsultas.php' method='get'>
            <button type='submit'>Regresar a Menú Consultas</button>
        </form> 
    </div>

</body>
</html>