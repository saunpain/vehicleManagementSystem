<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Propietario</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
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
            max-width: 500px;
            width: 100%;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2rem;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 1.1rem;
            color: #555;
        }

        input[type="text"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="tel"]:focus,
        select:focus {
            border-color: #3498db;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: #fff;
            font-size: 1.2rem;
            text-transform: uppercase;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Registrar Propietario</h2>
        <form action="procesar_propietario.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido">Apellido (solo para personas naturales):</label>
            <input type="text" id="apellido" name="apellido">

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required>

            <label for="tipo_propietario">Tipo de Propietario:</label>
            <select id="tipo_propietario" name="tipo_propietario" required>
                <option value="">Seleccionar Tipo</option>
                <option value="natural">Natural</option>
                <option value="juridico">Jurídico</option>
            </select>

            <input type="submit" value="Registrar Propietario">
        </form>
        <footer>
            <p>Nombre: Nadim | Apellido: García | Cédula: 4-824-817 | Grupo: 1LS131</p>
        </footer>
    </div>
</body>
</html>
