<?php include 'includes/header.php'; ?>

<div class="content">
    <?php
    include '../config/db.php';
    include '../modelo/empleado.php';

    $database = new Database();
    $db = $database->getConnection();

    $empleado = new Empleado($db);

    $result = $empleado->obtenerTodos();

    ?>

    <h2>Registros de Empleados</h2>

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
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nombre'] ?></td>
                    <td><?= $row['apellido'] ?></td>
                    <td><?= $row['correo'] ?></td>
                    <td><?= $row['telefono'] ?></td>
                    <td><?= $row['cargo'] ?></td>
                    <td><?= $row['genero'] ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <?php 
    if (isset($_POST['eliminar'])) {
        $id = $_POST['id'];
        $empleado->eliminar($id);
        header("Location: $_SERVER[PHP_SELF]");
    }
    ?>

    <h2>Eliminar Empleado por ID</h2>

    <form method="post" action="">
        <label for="id">ID del Empleado a Eliminar:</label>
        <input type="text" id="id" name="id" required>
        <button type="submit" name="eliminar">Eliminar</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
