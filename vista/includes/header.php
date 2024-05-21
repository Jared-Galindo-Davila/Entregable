<!-- header.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto MVC</title>
    <link rel="stylesheet" href="/vista/estilo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header>
        <h1>Proyecto MVC</h1>
        <nav>
            <ul>
                <li><a href="/vista/index.php">Inicio</a></li>
                <li class="dropdown">
                    <a href="">Gestiones</a>
                    <ul class="dropdown-content">
                        <li><a href="/vista/buscar.php">Buscar</a></li>
                        <li><a href="/vista/crear.php">Formularios</a></li>
                        <li><a href="/vista/tablas.php">Tablas</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="">Modificaciones</a>
                    <ul class="dropdown-content">
                        <li><a href="/vista/editar.php">Editar</a></li>
                        <li><a href="/vista/eliminar.php">Eliminar</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <main>
