<?php
include 'includes/Database.php';

// Inicializar la conexión a la base de datos
$database = new Database();
$db = $database->getConnection();

// Obtener los datos del formulario
$nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
$apellido = filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_STRING);
$telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
$tipo_propietario = filter_input(INPUT_POST, 'tipo_propietario', FILTER_SANITIZE_STRING);

// Validar que los datos sean correctos y no estén vacíos
if ($nombre && $telefono && $tipo_propietario) {
    // Preparar la inserción en la base de datos
    $query = $db->prepare("INSERT INTO propietarios (nombre, apellido, telefono, tipo_propietario) 
                           VALUES (?, ?, ?, ?)");
    
    // Ejecutar la consulta con los datos del formulario
    if ($query->execute([$nombre, $apellido, $telefono, $tipo_propietario])) {
        // Redirigir a una página de éxito si se inserta correctamente
        header('Location: registro_exitoso_propietario.php');
    } else {
        echo "Error al registrar el propietario. Por favor, inténtelo de nuevo.";
    }
} else {
    echo "Por favor, complete todos los campos obligatorios.";
}
?>
