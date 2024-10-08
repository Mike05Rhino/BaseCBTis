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
    <title>Control de alumnos</title>
    <link rel="shortcut icon" href="img/CBTis.ico">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            /*background-color: #ffe6e6;*/
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
        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #cc0000;
        }
        input[type="text"], input[type="submit"],input[type="number"],select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
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
    </style>
</head>
<body>
    <?php include 'nav.php'; ?>
    <h2 align="center"><img src="img/dgti.jpg" width="200" alt="">Formulario de Ingreso de Datos <img src="img/cbtis.jpg" width="200" alt=""></h2>
    <form action="crear.php" method="post">
        <label for="numero_control">Número de control:</label>
        <input type="number" id="numero_control" name="numero_control" min="0" oninput="this.value = this.value.slice(0, 14)" required><br><br>

        <label for="nombre">Nombre(s):</label>
        <input type="text" id="nombre" name="nombre" pattern="[A-Za-z\s]+" maxlength="45" required><br><br>

        <label for="ap">Apellido Paterno:</label>
        <input type="text" id="ap" name="ap" pattern="[A-Za-z\s]+" maxlength="45"  required><br><br>

        <label for="am">Apellido Materno:</label>
        <input type="text" id="am" name="am" pattern="[A-Za-z\s]+" maxlength="45" required><br><br>

        <label for="especialidad">Especialidad:</label>
        <p>Elige una opción:</p>
        <select id="opciones" name="especialidad" >
            <option value="Técnico en Administración de Recursos Humanos">Técnico en Administración de Recursos Humanos</option>
            <option value="Técnico en Construcción">Técnico en Construcción</option>
            <option value="Técnico en Electricidad">Técnico en Electricidad</option>
            <option value="Técnico en Electrónica">Técnico en Electrónica</option>
            <option value="Técnico Laboratorista Químico">Técnico Laboratorista Químico</option>
            <option value="Técnico en Programación">Técnico en Programación</option>
        </select>

        <label for="semestre">Semestre:</label>
        <p>Elige una opción:</p>
        <select id="opciones" name="semestre" placeholder="Elige una opción:">
            <option value="1">1° Semestre</option>
            <option value="2">2° Semestre</option>
            <option value="3">3° Semestre</option>
            <option value="4">4° Semestre</option>
            <option value="5">5° Semestre</option>
            <option value="6">6° Semestre</option>
        </select>

        <label for="turno">Turno:</label>
        <p>Elige una opción:</p>
        <select id="opciones" name="turno" placeholder="Elige una opción:">
            <option value="Matutino">Matutino</option>
            <option value="Vespertino">Vespertino</option>
        </select>

        <label for="sexo">Sexo:</label>
        <p>Elige una opción:</p>
        <select id="opciones" name="sexo">
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'conectar.php';
        $obj = new OperacionesBd;
        $numero_control = $_POST['numero_control'];
        $nombre = $_POST['nombre'];
        $ap = $_POST['ap'] ;
        $am = $_POST['am'];
        $especialidad =$_POST['especialidad'];
        $semestre =$_POST['semestre'];
        $turno =$_POST['turno'];
        $sexo =$_POST['sexo'];

        $sql = "INSERT INTO alumnos (numero_control, nombre, ap, am, especialidad, semestre, turno, sexo) VALUES ('$numero_control', '$nombre', '$ap', '$am', '$especialidad', '$semestre', '$turno', '$sexo')";
        $obj->guardardatos($sql);

        $mensaje = "Tu informacion ha sido enviada";

// Imprimir el script de JavaScript con SweetAlert
        echo "<script type='text/javascript'>
                Swal.fire({
                    title: 'Alerta',
                    text: '$mensaje',
                    icon: 'warning',
                    confirmButtonText: 'Aceptar'
                });
            </script>";

    }
 ?>
 <?php
//session_destroy();
//header("Location: login.php");
//exit();
?>