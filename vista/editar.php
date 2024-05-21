<?php include 'includes/header.php'; ?>

<?php
include '../config/db.php';
include '../modelo/empleado.php';

$database = new Database();
$db = $database->getConnection();
$empleado = new Empleado($db);

$result = $empleado->obtenerTodos();

if ($result !== false) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['guardar'])) {
        if (isset($_POST['id']) && isset($_POST['column']) && isset($_POST['value'])) {
            $id = $_POST['id'];
            $column = $_POST['column'];
            $value = $_POST['value'];
            
            $result = $empleado->editar($id, $column, $value);
            
            if ($result) {
                echo "<script>alert('¡Actualización exitosa!');</script>";
            } else {
                echo "<script>alert('Error al actualizar el empleado.');</script>";
            }
        } else {
            echo "<script>alert('Datos insuficientes para actualizar el empleado.');</script>";
        }
    }
} else {
    echo "<script>alert('Error al obtener los registros de empleados.');</script>";
}
?>

<div class="content">
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
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($result !== false) {
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td class="editable" data-id="<?= $row['id'] ?>" data-column="nombre"><?= $row['nombre'] ?></td>
                        <td class="editable" data-id="<?= $row['id'] ?>" data-column="apellido"><?= $row['apellido'] ?></td>
                        <td class="editable" data-id="<?= $row['id'] ?>" data-column="correo"><?= $row['correo'] ?></td>
                        <td class="editable" data-id="<?= $row['id'] ?>" data-column="telefono"><?= $row['telefono'] ?></td>
                        <td class="editable" data-id="<?= $row['id'] ?>" data-column="cargo"><?= $row['cargo'] ?></td>
                        <td class="editable" data-id="<?= $row['id'] ?>" data-column="genero"><?= $row['genero'] ?></td>
                    </tr>
                <?php endwhile; 
            } ?>
        </tbody>
    </table>

    <div id="edit-form" style="display: none;">
        <h2>Editar Empleado</h2>
        <form id="edit-form-inner" method="post">
            <input type="hidden" id="edit-id" name="id" value="">
            <input type="hidden" id="edit-column" name="column" value="">
            <input type="text" id="edit-value" name="value" value="" required>
            <button type="submit" name="guardar">Guardar Cambios</button>
        </form>
    </div>
</div>

<script>
    var cells = document.querySelectorAll('.editable');
    cells.forEach(function(cell) {
        cell.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            var column = this.getAttribute('data-column');
            var value = this.innerText;
            var form = document.getElementById('edit-form');
            var editForm = document.getElementById('edit-form-inner');
            var editId = document.getElementById('edit-id');
            var editColumn = document.getElementById('edit-column');
            var editValue = document.getElementById('edit-value');

            editId.value = id;
            editColumn.value = column;
            editValue.value = value.replace(/"/g, '&quot;'); 

            form.style.display = 'block';
            editValue.focus();

            editForm.onsubmit = function(e) {
                e.preventDefault();
                var newValue = editValue.value;
                var formData = new FormData(editForm);
                formData.append('guardar', 'true');

                fetch('', { 
                    method: 'POST',
                    body: formData
                }).then(response => {
                    if (response.ok) {
                        console.log("¡Actualización exitosa!");
                        cell.innerText = newValue; 
                        form.style.display = 'none'; 
                    } else {
                        console.error("Error al actualizar el empleado.");
                    }
                }).catch(error => {
                    console.error("Error:", error);
                });
            };
        });
    });
</script>


<?php include 'includes/footer.php'; ?>
