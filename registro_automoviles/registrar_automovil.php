<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Automóviles</title>
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
            min-height: 100vh;
            background: linear-gradient(135deg, #ffb88c 0%, #de6262 100%);
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            margin-top: 20px;
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
        input[type="number"],
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
        input[type="number"]:focus,
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
        <h2>Registrar Automóvil</h2>
        <?php
        // Incluir la conexión a la base de datos
        include 'includes/Database.php';

        // Crear una instancia de la clase Database y obtener la conexión
        $database = new Database();
        $db = $database->getConnection();

        // Verificar si la conexión fue exitosa
        if ($db) {
            // Consultar marcas, tipos de vehículos y propietarios
            $marcas = $db->query("SELECT * FROM marcas")->fetchAll(PDO::FETCH_ASSOC);
            $tipos_vehiculo = $db->query("SELECT * FROM tipos_vehiculo")->fetchAll(PDO::FETCH_ASSOC);
            $propietarios = $db->query("SELECT * FROM propietarios")->fetchAll(PDO::FETCH_ASSOC);

            // Obtener los modelos agrupados por marca
            $modelos = $db->query("SELECT id, nombre, marca_id FROM modelos")->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "<p>Error al conectar con la base de datos.</p>";
        }
        ?>

        <!-- Formularios de Registro de Automóvil -->
        <form action="procesar_registro.php" method="post">
            <label for="placa">Placa:</label>
            <input type="text" id="placa" name="placa" required>

            <!-- Seleccionar la marca -->
            <label for="marca">Marca:</label>
            <select name="marca" id="marca" required>
                <option value="">Seleccionar Marca</option>
                <?php foreach ($marcas as $marca): ?>
                    <option value="<?= $marca['id'] ?>"><?= $marca['nombre'] ?></option>
                <?php endforeach; ?>
            </select>

            <!-- Seleccionar el modelo (se cargará dinámicamente con JavaScript) -->
            <label for="modelo">Modelo:</label>
            <select name="modelo" id="modelo" required>
                <option value="">Seleccionar Modelo</option>
                <!-- Los modelos se cargan dinámicamente mediante JavaScript -->
            </select>

            <!-- Seleccionar el tipo de vehículo -->
            <label for="tipo_vehiculo">Tipo de vehículo:</label>
            <select name="tipo_vehiculo" id="tipo_vehiculo" required>
                <option value="">Seleccionar Tipo</option>
                <?php foreach ($tipos_vehiculo as $tipo): ?>
                    <option value="<?= $tipo['id'] ?>"><?= $tipo['tipo'] ?></option>
                <?php endforeach; ?>
            </select>

            <!-- Seleccionar el propietario -->
            <label for="propietario">Propietario:</label>
            <select name="propietario" id="propietario" required>
                <option value="">Seleccionar Propietario</option>
                <?php foreach ($propietarios as $propietario): ?>
                    <option value="<?= $propietario['id'] ?>">
                        <?= $propietario['nombre'] ?> <?= $propietario['apellido'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="anio">Año:</label>
            <input type="number" id="anio" name="anio" required>

            <label for="color">Color:</label>
            <input type="text" id="color" name="color" required>

            <label for="numero_motor">Número de motor:</label>
            <input type="text" id="numero_motor" name="numero_motor" required>

            <label for="numero_chasis">Número de chasis:</label>
            <input type="text" id="numero_chasis" name="numero_chasis" required>

            <input type="submit" value="Registrar">
        </form>

        <!-- Script para manejar los modelos en función de la marca seleccionada -->
        <script>
            const modelos = <?= json_encode($modelos) ?>; // Pasamos los modelos desde PHP a JavaScript
            const marcaSelect = document.getElementById('marca');
            const modeloSelect = document.getElementById('modelo');

            // Cuando se selecciona una marca, actualiza la lista de modelos
            marcaSelect.addEventListener('change', function() {
                const marcaId = this.value;

                // Limpiar el select de modelos
                modeloSelect.innerHTML = '<option value="">Seleccionar Modelo</option>';

                // Filtrar los modelos por la marca seleccionada
                const modelosFiltrados = modelos.filter(modelo => modelo.marca_id == marcaId);

                // Añadir los modelos filtrados al select de modelos
                modelosFiltrados.forEach(function(modelo) {
                    const option = document.createElement('option');
                    option.value = modelo.id;
                    option.textContent = modelo.nombre;
                    modeloSelect.appendChild(option);
                });
            });
        </script>

        <footer>
            <p>Nombre: Nadim | Apellido: García | Cédula: 4-824-817 | Grupo: 1LS131</p>
        </footer>
    </div>
</body>
</html>
