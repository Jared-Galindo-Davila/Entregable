<?php
include '../config/db.php';
include '../modelo/Empleado.php';

$database = new Database();
$db = $database->getConnection();
$empleado = new Empleado($db);

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == 'buscar') {
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    header("Location: ../vista/buscar.php?search={$search}");
} elseif ($action == 'crear') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $empleado->nombre = $_POST['nombre'];
        $empleado->apellido = $_POST['apellido'];
        $empleado->correo = $_POST['correo'];
        $empleado->telefono = $_POST['telefono'];
        $empleado->cargo = $_POST['cargo'];
        $empleado->genero = $_POST['genero'];

        if ($empleado->crear()) {
            header("Location: ../vista/crear.php?status=success");
        } else {
            header("Location: ../vista/crear.php?status=error");
        }
    }
} 
?>
