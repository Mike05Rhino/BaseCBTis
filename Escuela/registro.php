<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conn = new mysqli("b0kl9kqpu46hx0w4u5xx-mysql.services.clever-cloud.com", "u3lurhkt11zbcbie", "VHWkyz2YG7ehVx4juroY", "b0kl9kqpu46hx0w4u5xx");
//servidor,usuario,contraseña,database
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "INSERT INTO usuarios (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "Registro Exitoso";
        echo "<script type='text/javascript'>
                        Swal.fire({
                            title: 'Alerta',
                            text: '$mensaje',
                            icon: 'warning',
                            confirmButtonText: 'Aceptar'
                        });
                    </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

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
<form method="post" action="registro.php">
    Usuario: <input type="text" name="username" required><br>
    Contraseña: <input type="password" name="password" required><br>
    <input type="submit" value="Registrar">
</form>
