<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="estilo.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<h2>Formulario de Empleados</h2>
<form method="POST" action="/controlador/empleadocontroller.php?action=crear">
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="cargo">Cargo:</label>
        <select id="cargo" name="cargo" class="form-control" required>
            <option value="" disabled selected>Selecciona un cargo</option>
            <option value="Gerente">Gerente</option>
            <option value="Analista">Analista</option>
            <option value="Desarrollador">Desarrollador</option>
            <option value="Diseñador">Diseñador</option>
        </select>
    </div>

    <div class="form-group">
        <label for="genero">Género:</label>
        <select id="genero" name="genero" class="form-control" required>
            <option value="" disabled selected>Selecciona el género</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
</form>
<?php include 'includes/footer.php'; ?>
