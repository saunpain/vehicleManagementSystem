<?php
include 'includes/Database.php';
include 'includes/Automovil.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $placa = filter_input(INPUT_POST, 'placa', FILTER_SANITIZE_STRING);
    $marca_id = filter_input(INPUT_POST, 'marca', FILTER_VALIDATE_INT); // Marca es ahora un ID
    $modelo_id = filter_input(INPUT_POST, 'modelo', FILTER_VALIDATE_INT); // Modelo es un ID
    $anio = filter_input(INPUT_POST, 'anio', FILTER_VALIDATE_INT);
    $color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);
    $numero_motor = filter_input(INPUT_POST, 'numero_motor', FILTER_SANITIZE_STRING);
    $numero_chasis = filter_input(INPUT_POST, 'numero_chasis', FILTER_SANITIZE_STRING);
    $tipo_vehiculo_id = filter_input(INPUT_POST, 'tipo_vehiculo', FILTER_VALIDATE_INT); // Tipo de vehículo es un ID
    $propietario_id = filter_input(INPUT_POST, 'propietario', FILTER_VALIDATE_INT); // Propietario es un ID

    // Validar que todos los campos han sido enviados
    if ($placa && $marca_id && $modelo_id && $anio && $color && $numero_motor && $numero_chasis && $tipo_vehiculo_id && $propietario_id) {
        $database = new Database();
        $db = $database->getConnection();

        $automovil = new Automovil($db);

        // Asignar valores al objeto Automovil
        $automovil->placa = $placa;
        $automovil->marca_id = $marca_id;
        $automovil->modelo_id = $modelo_id;
        $automovil->anio = $anio;
        $automovil->color = $color;
        $automovil->numero_motor = $numero_motor;
        $automovil->numero_chasis = $numero_chasis;
        $automovil->tipo_vehiculo_id = $tipo_vehiculo_id;
        $automovil->propietario_id = $propietario_id;

        // Intentar registrar el automóvil en la base de datos
        if ($automovil->registrar()) {
            // Redirigir a la página de éxito si el registro fue exitoso
            header("Location: registro_exitoso.php");
            exit(); // Asegurarse de que el script se detenga después de redirigir
        } else {
            echo "Error al registrar el automóvil. Por favor, inténtelo de nuevo.";
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
