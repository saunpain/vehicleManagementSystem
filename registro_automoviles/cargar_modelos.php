<?php
include 'includes/Database.php';

$marca_id = $_GET['marca_id'];

// Obtener los modelos según la marca seleccionada
$modelos = $db->prepare("SELECT * FROM modelos WHERE marca_id = ?");
$modelos->execute([$marca_id]);
$result = $modelos->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $modelo) {
    echo '<option value="' . $modelo['id'] . '">' . $modelo['nombre'] . '</option>';
}
?>