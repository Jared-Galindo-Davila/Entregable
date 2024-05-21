<?php
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "ProyectoMVC";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            die("Connection error: " . $e->getMessage());
        }

        return $this->conn;
    }
}
?>
