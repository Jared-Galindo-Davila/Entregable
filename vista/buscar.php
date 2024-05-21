<?php 
include 'includes/header.php'; 

if (isset($_GET['search'])) {
    include '../config/db.php';
    include '../modelo/empleado.php';

    $database = new Database();
    $db = $database->getConnection();

    $empleado = new Empleado($db);

    if (is_numeric($_GET['search'])) {
        $result = $empleado->buscarPorId($_GET['search']);
    } else {
        $result = $empleado->buscar($_GET['search']);
    }

    if ($result->num_rows > 0) {
?>
        <h3>Resultados de la Búsqueda:</h3>
        <table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Cargo</th>
                <th>Género</th>
            </tr>
<?php   while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nombre'] ?></td>
                <td><?= $row['apellido'] ?></td>
                <td><?= $row['correo'] ?></td>
                <td><?= $row['telefono'] ?></td>
                <td><?= $row['cargo'] ?></td>
                <td><?= $row['genero'] ?></td>
            </tr>
<?php   endwhile; ?>
        </table>
<?php 
    } else {
?>
        <p>No se encontraron resultados para la búsqueda.</p>
<?php 
    }
}
?>

<h2>Buscar por Nombre o ID</h2>
<form method="GET" action="buscar.php">
    <div class="form-group">
        <label for="search">Buscar por Nombre o ID:</label>
        <input type="text" id="search" name="search" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>

<?php include 'includes/footer.php'; ?>
