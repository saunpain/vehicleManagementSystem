<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda de Automóvil por Placa</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #ffb88c 0%, #de6262 100%);
        }

        .form-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        label, input[type="text"], input[type="submit"], a {
            width: 100%;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        input[type="submit"] {
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        a {
            display: inline-block;
            padding: 12px;
            background-color: #7f8c8d;
            color: white;
            border: none;
            border-radius: 6px;
            text-decoration: none;
        }

        a:hover {
            background-color: #636e72;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Buscar Automóvil por Placa</h2>
        <form action="resultado_busqueda.php" method="get">
            <label for="placa">Ingrese la Placa:</label>
            <input type="text" id="placa" name="placa" required>
            <input type="submit" value="Buscar">
        </form>
        <a href="index.php">Volver al inicio</a>
    </div>
</body>
</html>
