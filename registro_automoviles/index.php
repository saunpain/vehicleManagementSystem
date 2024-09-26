<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Automóviles</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #74ebd5 0%, #acb6e5 100%);
        }

        .container {
            text-align: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        h1 {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-direction: column;
        }

        a {
            display: inline-block;
            background-color: #3498db;
            color: #fff;
            padding: 12px 25px;
            font-size: 1.2rem;
            text-transform: uppercase;
            border-radius: 6px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            width: 100%;
            text-align: center;
        }

        a:hover {
            background-color: #2980b9;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 2rem;
            }

            a {
                font-size: 1rem;
                padding: 10px 20px;
            }

            .button-container {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido al Sistema de Gestión de Automóviles</h1>
        <div class="button-container">
            <a href="registrar_automovil.php">Registrar un nuevo automóvil</a>
            <a href="registrar_propietario.php">Registrar un nuevo propietario</a>
            <a href="buscar_automovil.php">Buscar un automóvil</a>
        </div>
    </div>
</body>
</html>
