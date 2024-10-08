<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barra de Navegación</title>
    <link rel="stylesheet" href="styles.css">
<style>
                /* styles.css */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-around;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        nav ul li a:hover {
            background-color: #575757;
        }

    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
            <li><a href="crear.php">Crear</a></li>
            <li><a href="leer.php">Leer</a></li>
            <li><a href="actualizar.php">Actualizar</a></li>
            <li><a href="eliminar.php">Eliminar</a></li>
            <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>
