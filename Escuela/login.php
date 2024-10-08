<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];



    $conn = new mysqli("localhost", "root", "", "cbtis");

    if ($conn->connect_error) {
        //CONEXION CON LA BASE DE DATOS
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM usuarios WHERE username='$username'";
    //INSTRUCCION PARA ENCONTRAR EL USUARIO Y SU CONTRASEÑA
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //VERIFICACION DE LA CONTRASEÑA
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header('Location:menu.php');
        } else {
            echo "Contraseña incorrecta";
            
        }
    } else {
        echo "Usuario no encontrado";
    }

    $conn->close();
}
?>
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
        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }
        input[type="text"], input[type="submit"],input[type="password"],select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"]:hover {
            background-color: #b30000;
        }
</style>
<form method="post" action="login.php">
    Usuario: <input type="text" name="username" required><br>
    Contraseña: <input type="password" name="password" required><br>
    <input type="submit" value="Iniciar Sesión">
    No tienes cuenta <a href="registro.php">Registrate</a>
</form>
