<?php
// conectar con mariadb mediante las variables de entorno
$dsn = sprintf(
    'mysql:host=%s;dbname=%s;charset=utf8mb4',
    getenv('DB_HOST'),
    getenv('DB_NAME')
);

$pdo = new PDO($dsn, getenv('DB_USER'), getenv('DB_PASS'));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// preparar la inserción con parámetros con nombre
$consulta = $pdo->prepare(
    'INSERT INTO avisos (nombre, email, producto)
     VALUES (:nombre, :email, :producto)'
);

// guardar los datos enviados por el formulario
$consulta->execute([
    'nombre' => $_POST['nombre'],
    'email' => $_POST['email'],
    'producto' => $_POST['producto']
]);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaHarvest - Aviso registrado</title>
    <link rel="stylesheet" href="/css/estilos.css">
</head>
<body>
    <header>
        <img src="/img/logo.png" alt="Logotipo de NovaHarvest" width="100">
        <p>NovaHarvest</p>

        <nav>
            <a href="/">Inicio</a>
            <a href="/excedentes.php">Excedentes</a>
            <a href="/avisos.html">Avísame</a>
            <a href="/temporada.md">Temporada</a>
            <a href="/estado.php">Estado</a>
        </nav>
    </header>

    <main>
        <h1>Aviso registrado</h1>
        <p>Gracias. Te avisaremos cuando haya excedentes del producto que buscas.</p>
        <a href="/excedentes.php">Consultar excedentes disponibles</a>
    </main>

    <footer>
        <p>NovaHarvest · IES Valle del Jerte · Curso 2026-2027</p>
    </footer>
</body>
</html>