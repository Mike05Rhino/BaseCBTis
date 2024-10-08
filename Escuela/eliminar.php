<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/CBTis.ico">
    <title>Control de alumnos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 20px;
            background-image: url('img/FONDO.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        h2 {
            color: #cc0000;
        }
        input[type="submit"] {
            background-color: #cc0000;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #b30000;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border: 1px solid gray;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            border: 1px solid gray;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: red;
            color: white;
        }
        table tr:first-child th:first-child {
            border-top-left-radius: 10px;
        }
        table tr:first-child th:last-child {
            border-top-right-radius: 10px;
        }
        table tr:last-child td:first-child {
            border-bottom-left-radius: 10px;
        }
        table tr:last-child td:last-child {
            border-bottom-right-radius: 10px;
        }
    </style>
</head>
<body>
<?php include 'nav.php'; ?>
<?php
include 'conectar.php';
$obj = new OperacionesBd();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_alumno'])) {
    $id_alumno = $_POST['id_alumno'];
    $obj->eliminarRegistro($id_alumno);
}

$result = $obj->mostrardatos();

echo "<h2 >Registros de Estudiantes</h2>";
echo "<table>";
echo "<tr>
        <th>ID Alumno</th>
        <th>Numero de Control</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Especialidad</th>
        <th>Semestre</th>
        <th>Turno</th>
        <th>Sexo</th>
        <th>Acciones</th>
      </tr>";

while ($dato = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $dato['id_alumno'] . "</td>";
    echo "<td>" . $dato['numero_control'] . "</td>";
    echo "<td>" . $dato['nombre'] . "</td>";
    echo "<td>" . $dato['ap'] . "</td>";
    echo "<td>" . $dato['am'] . "</td>";
    echo "<td>" . $dato['especialidad'] . "</td>";
    echo "<td>" . $dato['semestre'] . "</td>";
    echo "<td>" . $dato['turno'] . "</td>";
    echo "<td>" . $dato['sexo'] . "</td>";
    echo "<td>
            <form method='POST'>
                <input type='hidden' name='id_alumno' value='" . $dato['id_alumno'] . "'>
                <input type='submit' value='Eliminar'>
            </form>
          </td>";
    echo "</tr>";
}

echo "</table>";
?>
</body>
</html>
