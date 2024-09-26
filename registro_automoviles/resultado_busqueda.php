<?php
include 'includes/Database.php';
include 'includes/Automovil.php';

if (isset($_GET['placa'])) {
    $placa = filter_input(INPUT_GET, 'placa', FILTER_SANITIZE_STRING);

    if ($placa) {
        $database = new Database();
        $db = $database->getConnection();

        // Modificar la consulta SQL con JOIN para obtener los nombres de marca, modelo, tipo de vehículo y propietario
        $query = "
            SELECT 
                a.placa, a.anio, a.color, a.numero_motor, a.numero_chasis,
                m.nombre AS marca, mo.nombre AS modelo, t.tipo AS tipo_vehiculo,
                p.nombre AS propietario_nombre, p.apellido AS propietario_apellido, p.telefono AS propietario_telefono
            FROM automoviles a
            JOIN marcas m ON a.marca_id = m.id
            JOIN modelos mo ON a.modelo_id = mo.id
            JOIN tipos_vehiculo t ON a.tipo_vehiculo_id = t.id
            JOIN propietarios p ON a.propietario_id = p.id
            WHERE a.placa = :placa
            LIMIT 1
        ";
        
        $stmt = $db->prepare($query);
        $stmt->bindParam(':placa', $placa);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $automovil = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>

            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Resultado de Búsqueda</title>
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
                    .result-container {
                        background-color: #fff;
                        padding: 40px;
                        border-radius: 12px;
                        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
                        max-width: 600px;
                        width: 100%;
                    }
                    h2 {
                        text-align: center;
                        margin-bottom: 20px;
                    }
                    .result-item {
                        margin-bottom: 10px;
                    }
                    a {
                        display: block;
                        margin-top: 20px;
                        padding: 12px;
                        background-color: #3498db;
                        color: white;
                        text-align: center;
                        text-decoration: none;
                        border-radius: 6px;
                    }
                    a:hover {
                        background-color: #2980b9;
                    }
                </style>
            </head>
            <body>
                <div class="result-container">
                    <h2>Detalles del Automóvil</h2>
                    <div class="result-item"><strong>Placa:</strong> <?php echo htmlspecialchars($automovil['placa']); ?></div>
                    <div class="result-item"><strong>Marca:</strong> <?php echo htmlspecialchars($automovil['marca']); ?></div>
                    <div class="result-item"><strong>Modelo:</strong> <?php echo htmlspecialchars($automovil['modelo']); ?></div>
                    <div class="result-item"><strong>Año:</strong> <?php echo htmlspecialchars($automovil['anio']); ?></div>
                    <div class="result-item"><strong>Color:</strong> <?php echo htmlspecialchars($automovil['color']); ?></div>
                    <div class="result-item"><strong>Número de motor:</strong> <?php echo htmlspecialchars($automovil['numero_motor']); ?></div>
                    <div class="result-item"><strong>Número de chasis:</strong> <?php echo htmlspecialchars($automovil['numero_chasis']); ?></div>
                    <div class="result-item"><strong>Tipo de vehículo:</strong> <?php echo htmlspecialchars($automovil['tipo_vehiculo']); ?></div>

                    <h2>Propietario del Automóvil</h2>
                    <div class="result-item"><strong>Nombre:</strong> <?php echo htmlspecialchars($automovil['propietario_nombre'] . " " . $automovil['propietario_apellido']); ?></div>
                    <div class="result-item"><strong>Teléfono:</strong> <?php echo htmlspecialchars($automovil['propietario_telefono']); ?></div>

                    <a href="buscar_automovil.php">Volver a la búsqueda</a>
                </div>
            </body>
            </html>

            <?php
        } else {
            echo "<script>alert('No se encontró un automóvil con esa placa'); window.location.href = 'buscar_automovil.php';</script>";
        }
    } else {
        echo "Por favor, ingrese una placa válida.";
    }
} else {
    echo "Por favor, ingrese una placa.";
}
