<?php
require_once 'config/Database.php';

class Equipo {
    private $conn;
    private $table_name = 'equipos';

    public $id;
    public $nombre_equipo;
    public $tipo;
    public $marca;
    public $serial;
    public $ubicacion;
    public $estado;

    public function __construct() {
        $this->conn = (new Database())->conn;
    }

    // Crear un nuevo equipo
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nombre_equipo=:nombre_equipo, tipo=:tipo, marca=:marca, serial=:serial, ubicacion=:ubicacion, estado=:estado";

        $stmt = $this->conn->prepare($query);

        // Limpia los datos
        $this->nombre_equipo = htmlspecialchars(strip_tags($this->nombre_equipo));
        $this->tipo = htmlspecialchars(strip_tags($this->tipo));
        $this->marca = htmlspecialchars(strip_tags($this->marca));
        $this->serial = htmlspecialchars(strip_tags($this->serial));
        $this->ubicacion = htmlspecialchars(strip_tags($this->ubicacion));
        $this->estado = htmlspecialchars(strip_tags($this->estado));

        // Bind parameters
        $stmt->bindParam(':nombre_equipo', $this->nombre_equipo);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':marca', $this->marca);
        $stmt->bindParam(':serial', $this->serial);
        $stmt->bindParam(':ubicacion', $this->ubicacion);
        $stmt->bindParam(':estado', $this->estado);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Obtener todos los equipos
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Obtener un equipo por ID
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt;
    }

    // Actualizar un equipo
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nombre_equipo = :nombre_equipo, tipo = :tipo, marca = :marca, serial = :serial, ubicacion = :ubicacion, estado = :estado WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':nombre_equipo', $this->nombre_equipo);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':marca', $this->marca);
        $stmt->bindParam(':serial', $this->serial);
        $stmt->bindParam(':ubicacion', $this->ubicacion);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Eliminar un equipo
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
