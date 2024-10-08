<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de alumnos</title>
    <link rel="shortcut icon" href="img/CBTis.ico">
    <style>
         body {
            font-family: Arial, sans-serif;
            /*background-color: #ffe6e6;*/
            color: #333;
            margin: 0;
            padding: 20px;
            background-image: url('FONDO.jpg');
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
//INCLUIMOS EL ARCHIVO DE CONECTAR.PHP PARA ESTABLECER LA CONEXION CON LA BASE DE DATOS
include 'conectar.php';
$obj = new OperacionesBd();
$result = $obj->mostrardatos();

echo "<h2 style='color: blue;'>Registros de Estudiantes</h2>";
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
      </tr>";

while ($dato = mysqli_fetch_assoc($result)) { //El bucle while ayuda a repetir estas acciones para cada alumno en la base de datos, mostrando sus datos en la tabla. 
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
    echo "</tr>";
}

echo "</table>";
?>
</body>
</html>
