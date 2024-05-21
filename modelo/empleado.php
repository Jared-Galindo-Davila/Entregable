<?php
class Empleado {
    private $conn;
    private $table_name = "empleados";

    public $id;
    public $nombre;
    public $apellido;
    public $correo;
    public $telefono;
    public $cargo;
    public $genero;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function buscar($nombre) {
        $query = "SELECT * FROM empleados WHERE nombre LIKE ?";
        $stmt = $this->conn->prepare($query);

        $nombre = '%' . htmlspecialchars(strip_tags($nombre)) . '%';
        $stmt->bind_param('s', $nombre);

        $stmt->execute();

        return $stmt->get_result();
    }

    public function buscarPorId($id) {
        $query = "SELECT * FROM empleados WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $id = htmlspecialchars(strip_tags($id));
        $stmt->bind_param('i', $id);

        $stmt->execute();

        return $stmt->get_result();
    }

    public function crear() {
        $query = "INSERT INTO " . $this->table_name . " (nombre, apellido, correo, telefono, cargo, genero) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssssss', $this->nombre, $this->apellido, $this->correo, $this->telefono, $this->cargo, $this->genero);
        return $stmt->execute();
    }

    public function editar($id, $column, $value) {
        $allowedColumns = array('nombre', 'apellido', 'correo', 'telefono', 'cargo', 'genero');
        if (!in_array($column, $allowedColumns)) {
            return false; 
        }
    
        $query = "UPDATE " . $this->table_name . " SET " . $column . " = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bind_param('si', $value, $id);
        $result = $stmt->execute();
    
        if ($result) {
            return $value; 
        } else {
            return false; 
        }
    }
    
    

    public function eliminar($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->query($query);
        return $stmt;
    }
}
?>
