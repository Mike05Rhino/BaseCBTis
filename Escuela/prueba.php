<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            padding: 50px;
            background-image: url('img/FONDO.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            margin-top: 50px; /* Ajuste para la barra de navegación fija */
        }
        h1 {
            color: #333;
        }
        .links a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            background-color: #cc0000;
            border-radius: 5px;
        }
        .links a:hover {
            background-color: #cc0010;
        }
    </style>
</head>
<body>
    <?php include('nav.php'); ?>
    <h1>Bienvenido a la Base de datos de CBTis 187</h1>
    <div class="links">
        <a href="crear.php">Crear</a>
        <a href="leer.php">Leer</a>
        <a href="actualizar.php">Actualizar</a>
        <a href="eliminar.php">Eliminar</a>
        <a href="logout.php">Cerrar sesión</a>
    </div>
</body>
</html>
