<?php
class Automovil {
    public $placa;
    public $marca_id;          // Ahora se usa el ID de la marca
    public $modelo_id;         // Ahora se usa el ID del modelo
    public $anio;
    public $color;
    public $numero_motor;
    public $numero_chasis;
    public $tipo_vehiculo_id;  // Ahora se usa el ID del tipo de vehículo
    public $propietario_id;    // Ahora se usa el ID del propietario
    private $conn;
    private $table_name = "automoviles";

    // Constructor para inicializar la conexión a la base de datos
    public function __construct($db){
        $this->conn = $db;
    }

    // Método para registrar un automóvil en la base de datos
    public function registrar(){
        $query = "INSERT INTO " . $this->table_name . " 
                  (placa, marca_id, modelo_id, anio, color, numero_motor, numero_chasis, tipo_vehiculo_id, propietario_id) 
                  VALUES (:placa, :marca_id, :modelo_id, :anio, :color, :numero_motor, :numero_chasis, :tipo_vehiculo_id, :propietario_id)";
        $stmt = $this->conn->prepare($query);

        // Sanitizar los datos antes de insertarlos
        $this->placa = htmlspecialchars(strip_tags($this->placa));
        $this->marca_id = htmlspecialchars(strip_tags($this->marca_id));
        $this->modelo_id = htmlspecialchars(strip_tags($this->modelo_id));
        $this->anio = htmlspecialchars(strip_tags($this->anio));
        $this->color = htmlspecialchars(strip_tags($this->color));
        $this->numero_motor = htmlspecialchars(strip_tags($this->numero_motor));
        $this->numero_chasis = htmlspecialchars(strip_tags($this->numero_chasis));
        $this->tipo_vehiculo_id = htmlspecialchars(strip_tags($this->tipo_vehiculo_id));
        $this->propietario_id = htmlspecialchars(strip_tags($this->propietario_id));

        // Vincular los parámetros a la consulta preparada
        $stmt->bindParam(':placa', $this->placa);
        $stmt->bindParam(':marca_id', $this->marca_id);
        $stmt->bindParam(':modelo_id', $this->modelo_id);
        $stmt->bindParam(':anio', $this->anio);
        $stmt->bindParam(':color', $this->color);
        $stmt->bindParam(':numero_motor', $this->numero_motor);
        $stmt->bindParam(':numero_chasis', $this->numero_chasis);
        $stmt->bindParam(':tipo_vehiculo_id', $this->tipo_vehiculo_id);
        $stmt->bindParam(':propietario_id', $this->propietario_id);

        // Ejecutar la consulta y verificar si se insertó correctamente
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para buscar un automóvil por su placa
    public function buscarPorPlaca($placa) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE placa = :placa LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':placa', $placa);
        
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        return false;
    }
}
?>
