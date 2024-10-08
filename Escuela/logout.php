<?php
session_start();
session_destroy();
echo "<script>alert('Cerrando sesión'); window.location.href = 'login.php';</script>";
exit();
?>
