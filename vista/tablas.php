<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="estilo.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Cargo</th>
            <th>Género</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include '../config/db.php';
            include '../modelo/empleado.php';
            $database = new Database();
            $db = $database->getConnection();

            $empleado = new Empleado($db);
            $result = $empleado->obtenerTodos();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nombre']}</td>
                            <td>{$row['apellido']}</td>
                            <td>{$row['correo']}</td>
                            <td>{$row['telefono']}</td>
                            <td>{$row['cargo']}</td>
                            <td>{$row['genero']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No hay datos disponibles</td></tr>";
            }
        ?>
    </tbody>
</table>
<?php include 'includes/footer.php'; ?>
